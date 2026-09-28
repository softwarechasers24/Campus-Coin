<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use App\Models\Category;
use App\Models\Budget;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        /*
        |--------------------------------------------------------------------------
        | CATEGORY STATISTICS
        |--------------------------------------------------------------------------
        */

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
                (
                    $topCategory->transactions_count
                    / $categorizedTransactions
                ) * 100,
                1
            );
        }

        /*
        |--------------------------------------------------------------------------
        | MONTHLY USERS
        |--------------------------------------------------------------------------
        */

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

        $monthlyIncome = Transaction::where(
            'type',
            'income'
        )
            ->whereYear(
                'transaction_date',
                now()->year
            )
            ->whereMonth(
                'transaction_date',
                now()->month
            )
            ->sum('amount');

        /*
        |--------------------------------------------------------------------------
        | CURRENT MONTH EXPENSE
        |--------------------------------------------------------------------------
        */

        $monthlyExpenses = Transaction::where(
            'type',
            'expense'
        )
            ->whereYear(
                'transaction_date',
                now()->year
            )
            ->whereMonth(
                'transaction_date',
                now()->month
            )
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
            ->latest('transaction_date')
            ->latest()
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | RECENT ANNOUNCEMENTS
        |--------------------------------------------------------------------------
        */

        $announcements = Announcement::latest()
            ->take(4)
            ->get();

        return view(
            'admin.dashboard',
            compact(
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
            )
        );
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
    | ADMIN CATEGORIES
    |--------------------------------------------------------------------------
    */

    public function categories()
    {
        $categories = Category::withCount('transactions')
            ->orderBy('name')
            ->get();

        return view(
            'admin.categories',
            compact('categories')
        );
    }


    public function createCategory()
    {
        return view('admin.categories-create');
    }


    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('admin.categories')
            ->with(
                'success',
                'Category added successfully.'
            );
    }


    public function editCategory($id)
    {
        $category = Category::findOrFail($id);

        return view(
            'admin.categories-edit',
            compact('category')
        );
    }


    public function updateCategory(
        Request $request,
        $id
    ) {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' =>
                'required|string|max:100|unique:categories,name,' . $id,
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('admin.categories')
            ->with(
                'success',
                'Category updated successfully.'
            );
    }


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
    | Student ke transactions yahan automatically show honge.
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
                'transaction_date',
                today()
            );

        } elseif ($request->date_range === 'week') {

            $query->whereBetween(
                'transaction_date',
                [
                    now()->startOfWeek(),
                    now()->endOfWeek()
                ]
            );

        } elseif ($request->date_range === 'month') {

            $query->whereBetween(
                'transaction_date',
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
            ->latest('transaction_date')
            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | CATEGORIES FOR DROPDOWNS
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
    | CREATE ADMIN TRANSACTION
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
    | STORE ADMIN TRANSACTION
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
            'transaction_date' => 'required|date',
        ]);

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
            'transaction_date' => 'required|date',
        ]);

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
    | ADMIN BUDGET
    |--------------------------------------------------------------------------
    | Student ke budgets yahan automatically show honge.
    |--------------------------------------------------------------------------
    */

    public function budget()
    {
        $budgets = Budget::with([
            'user',
            'category'
        ])
            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | CALCULATE SPENT / REMAINING
        |--------------------------------------------------------------------------
        */

        foreach ($budgets as $budget) {

            $monthStart = Carbon::parse($budget->month)
                ->startOfMonth();

            $monthEnd = Carbon::parse($budget->month)
                ->endOfMonth();

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
                    'transaction_date',
                    [
                        $monthStart,
                        $monthEnd
                    ]
                )
                ->sum('amount');

            $budget->spent = $spent;

            $budget->remaining = max(
                0,
                $budget->amount - $spent
            );

            $budget->percentage = $budget->amount > 0
                ? round(
                    ($spent / $budget->amount) * 100
                )
                : 0;
        }


        return view(
            'admin.budget',
            compact('budgets')
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
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric|min:0.01',
            'month' => 'required|date',
        ]);

        Budget::create($validated);

        return redirect()
            ->route('admin.budget')
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
        $budget = Budget::findOrFail($id);

        $users = User::orderBy('name')->get();

        $categories = Category::orderBy('name')->get();

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
        $budget = Budget::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric|min:0.01',
            'month' => 'required|date',
        ]);

        $budget->update($validated);

        return redirect()
            ->route('admin.budget')
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
        $budget = Budget::findOrFail($id);

        $budget->delete();

        return redirect()
            ->route('admin.budget')
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
        $announcements = Announcement::latest()->get();

        return view(
            'admin.announcements',
            compact('announcements')
        );
    }


    public function storeAnnouncement(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Announcement::create([
            'title' => $request->title,
            'message' => $request->message,
        ]);

        return redirect()
            ->route('admin.announcements')
            ->with(
                'success',
                'Announcement added successfully!'
            );
    }


    public function deleteAnnouncement($id)
    {
        $announcement = Announcement::findOrFail($id);

        $announcement->delete();

        return redirect()
            ->route('admin.announcements')
            ->with(
                'success',
                'Announcement deleted successfully!'
            );
    }
}