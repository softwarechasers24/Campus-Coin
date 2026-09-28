<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use App\Models\Category;
use App\Models\Budget;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {
        $totalUsers = User::count();

        $totalTransactions = Transaction::count();

        $activeUsers = Transaction::whereNotNull('user_id')
            ->distinct()
            ->count('user_id');

        $categoryStats = Category::withCount('transactions')
            ->having('transactions_count', '>', 0)
            ->orderByDesc('transactions_count')
            ->get();

        $topCategory = $categoryStats->first();

        $categoryLabels = $categoryStats
            ->pluck('name')
            ->values();

        $categoryValues = $categoryStats
            ->pluck('transactions_count')
            ->values();

        $topCategoryPercentage = 0;

        $categorizedTransactions = $categoryStats
            ->sum('transactions_count');

        if ($categorizedTransactions > 0 && $topCategory) {
            $topCategoryPercentage = round(
                ($topCategory->transactions_count / $categorizedTransactions) * 100,
                1
            );
        }

        $monthLabels = [];
        $monthlyUsers = [];

        for ($i = 5; $i >= 0; $i--) {

            $month = Carbon::now()
                ->startOfMonth()
                ->subMonths($i);

            $monthLabels[] = $month->format('M');

            $monthlyUsers[] = User::whereYear(
                'created_at',
                $month->year
            )
                ->whereMonth(
                    'created_at',
                    $month->month
                )
                ->count();
        }

        /*
        |--------------------------------------------------------------------------
        | CURRENT MONTH INCOME
        |--------------------------------------------------------------------------
        */

        $monthlyIncome = Transaction::where('type', 'income')
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->sum('amount');

        /*
        |--------------------------------------------------------------------------
        | CURRENT MONTH EXPENSE
        |--------------------------------------------------------------------------
        */

        $monthlyExpenses = Transaction::where('type', 'expense')
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->sum('amount');

        /*
        |--------------------------------------------------------------------------
        | RECENT TRANSACTIONS
        |--------------------------------------------------------------------------
        */

        $recentTransactions = Transaction::with([
            'user',
            'category'
        ])
            ->latest()
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | ANNOUNCEMENTS
        |--------------------------------------------------------------------------
        */

        $announcements = Announcement::latest()
            ->take(4)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalTransactions',
            'activeUsers',
            'categoryStats',
            'topCategory',
            'categoryLabels',
            'categoryValues',
            'topCategoryPercentage',
            'monthLabels',
            'monthlyUsers',
            'monthlyIncome',
            'monthlyExpenses',
            'recentTransactions',
            'announcements'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | USERS
    |--------------------------------------------------------------------------
    */

    public function users()
    {
        $users = User::latest()->get();

        return view(
            'admin.users',
            compact('users')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE USER TRANSACTION
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'type' => 'required|in:income,expense',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date',
            'is_recurring' => 'nullable|boolean',
            'description' => 'nullable|string|max:1000',
        ]);

        Transaction::create([
            'amount' => $validated['amount'],
            'type' => $validated['type'],
            'category_id' => $validated['category_id'],
            'date' => $validated['date'],
            'is_recurring' => $request->boolean('is_recurring'),
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()
            ->route('admin.transactions')
            ->with(
                'success',
                'Transaction added successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE USER
    |--------------------------------------------------------------------------
    */

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()
            ->route('admin.users')
            ->with(
                'success',
                'User deleted successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | CATEGORIES
    |--------------------------------------------------------------------------
    */

    public function categories()
    {
        $categories = Category::withCount('transactions')
            ->orderBy('name')
            ->get();

        $incomeCategories = $categories
            ->filter(function ($category) {
                return strtolower($category->type ?? '') === 'income';
            })
            ->values();

        $expenseCategories = $categories
            ->filter(function ($category) {
                return strtolower($category->type ?? '') === 'expense';
            })
            ->values();

        return view(
            'admin.categories',
            compact(
                'categories',
                'incomeCategories',
                'expenseCategories'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE CATEGORY
    |--------------------------------------------------------------------------
    */

    public function createCategory()
    {
        return view('admin.categories-create');
    }


    /*
    |--------------------------------------------------------------------------
    | STORE CATEGORY
    |--------------------------------------------------------------------------
    */

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:categories,name',
        ]);

        $data = [
            'name' => $request->name,
        ];

        if ($request->filled('type')) {
            $data['type'] = $request->type;
        }

        Category::create($data);

        return redirect()
            ->route('admin.categories')
            ->with(
                'success',
                'Category added successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT CATEGORY
    |--------------------------------------------------------------------------
    */

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);

        return view(
            'admin.categories-edit',
            compact('category')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE CATEGORY
    |--------------------------------------------------------------------------
    */

    public function updateCategory(
        Request $request,
        $id
    ) {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' =>
                'required|string|max:100|unique:categories,name,' . $id,
        ]);

        $data = [
            'name' => $request->name,
        ];

        if ($request->filled('type')) {
            $data['type'] = $request->type;
        }

        $category->update($data);

        return redirect()
            ->route('admin.categories')
            ->with(
                'success',
                'Category updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE CATEGORY
    |--------------------------------------------------------------------------
    */

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()
            ->route('admin.categories')
            ->with(
                'success',
                'Category deleted successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN TRANSACTIONS
    |--------------------------------------------------------------------------
    */

    public function Transactions(Request $request)
    {
        $query = Transaction::with([
            'user',
            'category'
        ]);

        /*
        |--------------------------------------------------------------------------
        | SEARCH STUDENT
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->whereHas('user', function ($q) use ($search) {

                $q->where(
                    'name',
                    'like',
                    '%' . $search . '%'
                )
                    ->orWhere(
                        'email',
                        'like',
                        '%' . $search . '%'
                    );

            });
        }

        /*
        |--------------------------------------------------------------------------
        | CATEGORY FILTER
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category_id')) {

            $query->where(
                'category_id',
                $request->category_id
            );
        }

        /*
        |--------------------------------------------------------------------------
        | TYPE FILTER
        |--------------------------------------------------------------------------
        */

        if ($request->filled('type')) {

            $query->where(
                'type',
                $request->type
            );
        }

        /*
        |--------------------------------------------------------------------------
        | DATE FILTER
        |--------------------------------------------------------------------------
        */

        if ($request->date_range === 'today') {

            $query->whereDate(
                'created_at',
                today()
            );

        } elseif ($request->date_range === 'week') {

            $query->whereBetween(
                'created_at',
                [
                    now()->startOfWeek(),
                    now()->endOfWeek()
                ]
            );

        } elseif ($request->date_range === 'month') {

            $query->whereBetween(
                'created_at',
                [
                    now()->startOfMonth(),
                    now()->endOfMonth()
                ]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | TRANSACTIONS
        |--------------------------------------------------------------------------
        */

        $transactions = $query
            ->latest()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | CATEGORIES
        |--------------------------------------------------------------------------
        */

        $categories = Category::orderBy('name')->get();

        /*
        |--------------------------------------------------------------------------
        | SUMMARY
        |--------------------------------------------------------------------------
        */

        $totalIncome = (clone $query)
            ->where('type', 'income')
            ->sum('amount');

        $totalExpense = (clone $query)
            ->where('type', 'expense')
            ->sum('amount');

        $balance = $totalIncome - $totalExpense;

        return view(
            'admin.transactions',
            compact(
                'transactions',
                'categories',
                'totalIncome',
                'totalExpense',
                'balance'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE TRANSACTION
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $users = User::orderBy('name')->get();

        $categories = Category::orderBy('name')->get();

        return view(
            'admin.transactions-create',
            compact(
                'users',
                'categories'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE TRANSACTION
    |--------------------------------------------------------------------------
    */

    public function StoreTransaction(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0.01',
            'description' => 'nullable|string',
            'transaction_date' => 'nullable|date',
        ]);

        if (empty($validated['transaction_date'])) {
            $validated['transaction_date'] = now();
        }

        Transaction::create($validated);

        return redirect()
            ->route('admin.transactions')
            ->with(
                'success',
                'Transaction added successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT TRANSACTION
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);

        $users = User::orderBy('name')->get();

        $categories = Category::orderBy('name')->get();

        return view(
            'admin.transactions-edit',
            compact(
                'transaction',
                'users',
                'categories'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE TRANSACTION
    |--------------------------------------------------------------------------
    */

    public function UpdateTransaction(
        Request $request,
        $id
    ) {
        $transaction = Transaction::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0.01',
            'description' => 'nullable|string',
            'transaction_date' => 'nullable|date',
        ]);

        if (empty($validated['transaction_date'])) {
            $validated['transaction_date'] =
                $transaction->transaction_date;
        }

        $transaction->update($validated);

        return redirect()
            ->route('admin.transactions')
            ->with(
                'success',
                'Transaction updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE TRANSACTION
    |--------------------------------------------------------------------------
    */

    public function DeleteTransaction($id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->delete();

        return redirect()
            ->route('admin.transactions')
            ->with(
                'success',
                'Transaction deleted successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN REPORTS
    |--------------------------------------------------------------------------
    */

    public function Reports(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | BASE QUERY
        |--------------------------------------------------------------------------
        */

        $query = Transaction::with([
            'user',
            'category'
        ]);

        /*
        |--------------------------------------------------------------------------
        | CATEGORY FILTER
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category')) {

            $query->where(
                'category_id',
                $request->category
            );
        }

        /*
        |--------------------------------------------------------------------------
        | MONTH FILTER
        |--------------------------------------------------------------------------
        */

        if ($request->filled('month')) {

            try {

                $selectedMonth = Carbon::createFromFormat(
                    'Y-m',
                    $request->month
                );

                $query->whereYear(
                    'transaction_date',
                    $selectedMonth->year
                );

                $query->whereMonth(
                    'transaction_date',
                    $selectedMonth->month
                );

            } catch (\Exception $e) {
                // Invalid month ignore
            }
        }

        /*
        |--------------------------------------------------------------------------
        | TIME RANGE FILTER
        |--------------------------------------------------------------------------
        */

        if (
            !$request->filled('month') &&
            $request->filled('range')
        ) {

            if ($request->range == '1') {

                $query->whereBetween(
                    'transaction_date',
                    [
                        now()->startOfMonth(),
                        now()->endOfMonth()
                    ]
                );

            } elseif ($request->range == '6') {

                $query->whereBetween(
                    'transaction_date',
                    [
                        now()->subMonths(5)->startOfMonth(),
                        now()->endOfMonth()
                    ]
                );

            } elseif ($request->range == '12') {

                $query->whereBetween(
                    'transaction_date',
                    [
                        now()->startOfYear(),
                        now()->endOfYear()
                    ]
                );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | GET FILTERED TRANSACTIONS
        |--------------------------------------------------------------------------
        */

        $transactions = $query
            ->latest('transaction_date')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | TOTAL INCOME
        |--------------------------------------------------------------------------
        */

        $totalIncome = $transactions
            ->where('type', 'income')
            ->sum('amount');

        /*
        |--------------------------------------------------------------------------
        | TOTAL EXPENSE
        |--------------------------------------------------------------------------
        */

        $totalExpense = $transactions
            ->where('type', 'expense')
            ->sum('amount');

        /*
        |--------------------------------------------------------------------------
        | BALANCE
        |--------------------------------------------------------------------------
        */

        $balance = $totalIncome - $totalExpense;

        /*
        |--------------------------------------------------------------------------
        | SAVING GOAL
        |--------------------------------------------------------------------------
        */

        $savingGoal = Budget::sum('amount');

        if ($savingGoal > 0) {

            $savingPercentage = round(
                ($balance / $savingGoal) * 100
            );

            $savingPercentage = max(
                0,
                min(
                    100,
                    $savingPercentage
                )
            );

        } else {

            $savingPercentage = 0;
        }

        /*
        |--------------------------------------------------------------------------
        | REPORT CARDS
        |--------------------------------------------------------------------------
        */

        $reports = collect([

            (object) [
                'icon' => '▤',
                'title' => 'Transaction Report',
                'description' =>
                    $transactions->count()
                    . ' transactions recorded for the selected period.'
            ],

            (object) [
                'icon' => '↗',
                'title' => 'Income Report',
                'description' =>
                    'Total income recorded is Rs. '
                    . number_format(
                        $totalIncome,
                        2
                    )
                    . '.'
            ],

            (object) [
                'icon' => '↘',
                'title' => 'Expense Report',
                'description' =>
                    'Total expenses recorded are Rs. '
                    . number_format(
                        $totalExpense,
                        2
                    )
                    . '.'
            ],

            (object) [
                'icon' => '◉',
                'title' => 'Balance Report',
                'description' =>
                    'Current balance is Rs. '
                    . number_format(
                        $balance,
                        2
                    )
                    . '.'
            ],

        ]);

        /*
        |--------------------------------------------------------------------------
        | FINANCIAL REPORT
        |--------------------------------------------------------------------------
        */

        $reportMonth = 'All Time';

        if ($request->filled('month')) {

            try {

                $reportMonth = Carbon::createFromFormat(
                    'Y-m',
                    $request->month
                )->format('F Y');

            } catch (\Exception $e) {

                $reportMonth = 'All Time';
            }
        }

        $financialReport = (object) [

            'month' =>
                $reportMonth,

            'total_income' =>
                $totalIncome,

            'total_expenses' =>
                $totalExpense,

            'balance' =>
                $balance,

            'saving_goal' =>
                $savingGoal,

            'saving_percentage' =>
                $savingPercentage,

            'income_change' =>
                $totalIncome > 0
                    ? 'Income data available'
                    : 'No income data',

            'expense_change' =>
                $totalExpense > 0
                    ? 'Expense data available'
                    : 'No expense data',

            'balance_note' =>
                $balance >= 0
                    ? 'Positive balance'
                    : 'Expenses are higher than income',

        ];

        /*
        |--------------------------------------------------------------------------
        | MONTHLY FINANCIAL DATA
        |--------------------------------------------------------------------------
        */

        $monthlyFinancials = collect();

        $monthsToShow = 6;

        if ($request->range == '12') {
            $monthsToShow = 12;
        }

        if ($request->filled('month')) {

            try {

                $selectedMonth = Carbon::createFromFormat(
                    'Y-m',
                    $request->month
                )->startOfMonth();

                $startMonth = $selectedMonth->copy();

                $endMonth = $selectedMonth->copy();

            } catch (\Exception $e) {

                $startMonth = now()
                    ->startOfMonth()
                    ->subMonths(5);

                $endMonth = now()
                    ->startOfMonth();
            }

        } else {

            $endMonth = now()
                ->startOfMonth();

            $startMonth = now()
                ->startOfMonth()
                ->subMonths(
                    $monthsToShow - 1
                );
        }

        /*
        |--------------------------------------------------------------------------
        | CREATE MONTHLY DATA
        |--------------------------------------------------------------------------
        */

        $currentMonth = $startMonth->copy();

        while (
            $currentMonth->lte($endMonth)
        ) {

            $monthIncome = $transactions
                ->filter(function ($transaction) use ($currentMonth) {

                    if (!$transaction->transaction_date) {
                        return false;
                    }

                    $date = Carbon::parse(
                        $transaction->transaction_date
                    );

                    return
                        $date->year ==
                            $currentMonth->year
                        &&
                        $date->month ==
                            $currentMonth->month
                        &&
                        $transaction->type ==
                            'income';
                })
                ->sum('amount');

            $monthExpense = $transactions
                ->filter(function ($transaction) use ($currentMonth) {

                    if (!$transaction->transaction_date) {
                        return false;
                    }

                    $date = Carbon::parse(
                        $transaction->transaction_date
                    );

                    return
                        $date->year ==
                            $currentMonth->year
                        &&
                        $date->month ==
                            $currentMonth->month
                        &&
                        $transaction->type ==
                            'expense';
                })
                ->sum('amount');

            $monthlyFinancials->push(
                (object) [

                    'month' =>
                        $currentMonth->format('M'),

                    'income' =>
                        $monthIncome,

                    'expense' =>
                        $monthExpense,

                ]
            );

            $currentMonth->addMonth();
        }

        /*
        |--------------------------------------------------------------------------
        | MAXIMUM CHART VALUE
        |--------------------------------------------------------------------------
        */

        $maxIncome =
            $monthlyFinancials->max('income')
            ?? 0;

        $maxExpense =
            $monthlyFinancials->max('expense')
            ?? 0;

        $maxChartAmount = max(
            $maxIncome,
            $maxExpense,
            1
        );

        /*
        |--------------------------------------------------------------------------
        | EXPENSE BY CATEGORY
        |--------------------------------------------------------------------------
        */

        $expenseTransactions = $transactions
            ->where(
                'type',
                'expense'
            );

        $categoryExpenses = $expenseTransactions
            ->groupBy('category_id')
            ->map(function ($items) use (
                $expenseTransactions
            ) {

                $first = $items->first();

                $total = $items->sum('amount');

                $categoryName =
                    optional(
                        $first->category
                    )->name
                    ?? 'Uncategorized';

                $allExpenses =
                    $expenseTransactions
                        ->sum('amount');

                $percentage =
                    $allExpenses > 0
                        ? round(
                            ($total / $allExpenses) * 100,
                            1
                        )
                        : 0;

                return (object) [

                    'category_name' =>
                        $categoryName,

                    'total' =>
                        $total,

                    'percentage' =>
                        $percentage,

                ];
            })
            ->sortByDesc('total')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | AVAILABLE MONTHS
        |--------------------------------------------------------------------------
        */

        $months = Transaction::query()
            ->whereNotNull(
                'transaction_date'
            )
            ->get()
            ->map(function ($transaction) {

                return Carbon::parse(
                    $transaction->transaction_date
                )->format('Y-m');

            })
            ->unique()
            ->sort()
            ->values();

        /*
        |--------------------------------------------------------------------------
        | CATEGORIES
        |--------------------------------------------------------------------------
        */

        $categories = Category::orderBy(
            'name'
        )->get();

        /*
        |--------------------------------------------------------------------------
        | RETURN REPORTS VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.reports',
            compact(
                'reports',
                'financialReport',
                'monthlyFinancials',
                'maxChartAmount',
                'categoryExpenses',
                'months',
                'categories'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN BUDGET
    |--------------------------------------------------------------------------
    */

    public function budget(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | SELECTED MONTH
        |--------------------------------------------------------------------------
        */

        $selectedMonth = $request->get(
            'month',
            now()->format('Y-m')
        );

        /*
        |--------------------------------------------------------------------------
        | BUDGETS
        |--------------------------------------------------------------------------
        */

        $selectedDate = Carbon::parse(
            $selectedMonth . '-01'
        );

        $budgets = Budget::with([
            'user',
            'category'
        ])
            ->whereYear(
                'month',
                $selectedDate->year
            )
            ->whereMonth(
                'month',
                $selectedDate->month
            )
            ->latest()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | CALCULATE SPENT
        |--------------------------------------------------------------------------
        */

        foreach ($budgets as $budget) {

            $monthStart = Carbon::parse(
                $budget->month
            )->startOfMonth();

            $monthEnd = Carbon::parse(
                $budget->month
            )->endOfMonth();

            $spent = Transaction::where(
                'user_id',
                $budget->user_id
            )
                ->where(
                    'category_id',
                    $budget->category_id
                )
                ->where(
                    'type',
                    'expense'
                )
                ->whereBetween(
                    'created_at',
                    [
                        $monthStart,
                        $monthEnd
                    ]
                )
                ->sum('amount');

            $budget->spent =
                $spent;

            $budget->remaining =
                max(
                    0,
                    $budget->amount - $spent
                );

            $budget->percentage =
                $budget->amount > 0
                    ? round(
                        ($spent / $budget->amount) * 100
                    )
                    : 0;
        }

        /*
        |--------------------------------------------------------------------------
        | SUMMARY VALUES
        |--------------------------------------------------------------------------
        */

        $totalBudget =
            $budgets->sum('amount');

        $totalSpent =
            $budgets->sum('spent');

        $remaining =
            $totalBudget - $totalSpent;

        $percentage =
            $totalBudget > 0
                ? round(
                    ($totalSpent / $totalBudget) * 100
                )
                : 0;

        return view(
            'admin.budget',
            compact(
                'budgets',
                'selectedMonth',
                'totalBudget',
                'totalSpent',
                'remaining',
                'percentage'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE BUDGET
    |--------------------------------------------------------------------------
    */

    public function storeBudget(Request $request)
    {
        $validated = $request->validate([
            'user_id' =>
                'required|exists:users,id',

            'category_id' =>
                'required|exists:categories,id',

            'amount' =>
                'required|numeric|min:0.01',

            'month' =>
                'required|date',
        ]);

        Budget::create([
            'user_id' =>
                $validated['user_id'],

            'category_id' =>
                $validated['category_id'],

            'amount' =>
                $validated['amount'],

            'month' =>
                $validated['month'],
        ]);

        return redirect()
            ->route(
                'admin.budget',
                [
                    'month' =>
                        Carbon::parse(
                            $validated['month']
                        )->format('Y-m')
                ]
            )
            ->with(
                'success',
                'Budget added successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT BUDGET
    |--------------------------------------------------------------------------
    */

    public function editBudget($id)
    {
        $budget =
            Budget::findOrFail($id);

        $users =
            User::orderBy('name')->get();

        $categories =
            Category::orderBy('name')->get();

        return view(
            'admin.budget-edit',
            compact(
                'budget',
                'users',
                'categories'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE BUDGET
    |--------------------------------------------------------------------------
    */

    public function updateBudget(
        Request $request,
        $id
    ) {
        $budget =
            Budget::findOrFail($id);

        $validated = $request->validate([
            'user_id' =>
                'required|exists:users,id',

            'category_id' =>
                'required|exists:categories,id',

            'amount' =>
                'required|numeric|min:0.01',

            'month' =>
                'required|date',
        ]);

        $budget->update(
            $validated
        );

        return redirect()
            ->route(
                'admin.budget',
                [
                    'month' =>
                        Carbon::parse(
                            $validated['month']
                        )->format('Y-m')
                ]
            )
            ->with(
                'success',
                'Budget updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE BUDGET
    |--------------------------------------------------------------------------
    */

    public function deleteBudget($id)
    {
        $budget =
            Budget::findOrFail($id);

        $budget->delete();

        return redirect()
            ->route(
                'admin.budget'
            )
            ->with(
                'success',
                'Budget deleted successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ANNOUNCEMENTS
    |--------------------------------------------------------------------------
    */

    public function announcements()
    {
        $announcements =
            Announcement::latest()->get();

        return view(
            'admin.announcements',
            compact(
                'announcements'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE ANNOUNCEMENT
    |--------------------------------------------------------------------------
    */

    public function storeAnnouncement(
        Request $request
    ) {
        $request->validate([
            'title' =>
                'required|string|max:255',

            'message' =>
                'required|string',
        ]);

        Announcement::create([
            'title' =>
                $request->title,

            'message' =>
                $request->message,
        ]);

        return redirect()
            ->route(
                'admin.announcements'
            )
            ->with(
                'success',
                'Announcement added successfully!'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE ANNOUNCEMENT
    |--------------------------------------------------------------------------
    */

    public function deleteAnnouncement(
        $id
    ) {
        $announcement =
            Announcement::findOrFail($id);

        $announcement->delete();

        return redirect()
            ->route(
                'admin.announcements'
            )
            ->with(
                'success',
                'Announcement deleted successfully!'
            );
    }
}