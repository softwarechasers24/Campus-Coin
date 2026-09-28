<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use App\Models\Budget;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Current Student
        |--------------------------------------------------------------------------
        */

        $userId = Auth::id();


        /*
        |--------------------------------------------------------------------------
        | Total Income
        |--------------------------------------------------------------------------
        */

        $totalIncome = Transaction::where('user_id', $userId)
            ->where('type', 'income')
            ->sum('amount');


        /*
        |--------------------------------------------------------------------------
        | Total Expense
        |--------------------------------------------------------------------------
        */

        $totalExpense = Transaction::where('user_id', $userId)
            ->where('type', 'expense')
            ->sum('amount');


        /*
        |--------------------------------------------------------------------------
        | Balance
        |--------------------------------------------------------------------------
        */

        $balance = $totalIncome - $totalExpense;


        /*
        |--------------------------------------------------------------------------
        | Current Month
        |--------------------------------------------------------------------------
        */

        $monthStart = Carbon::now()->startOfMonth();

        $monthEnd = Carbon::now()->endOfMonth();


        /*
        |--------------------------------------------------------------------------
        | Monthly Income
        |--------------------------------------------------------------------------
        */

        $monthlyIncome = Transaction::where('user_id', $userId)
            ->where('type', 'income')
            ->whereBetween(
                'transaction_date',
                [$monthStart, $monthEnd]
            )
            ->sum('amount');


        /*
        |--------------------------------------------------------------------------
        | Monthly Expense
        |--------------------------------------------------------------------------
        */

        $monthlyExpense = Transaction::where('user_id', $userId)
            ->where('type', 'expense')
            ->whereBetween(
                'transaction_date',
                [$monthStart, $monthEnd]
            )
            ->sum('amount');


        /*
        |--------------------------------------------------------------------------
        | Top Spending Category
        |--------------------------------------------------------------------------
        */

        $topCategory = Transaction::where(
                'transactions.user_id',
                $userId
            )
            ->where(
                'transactions.type',
                'expense'
            )
            ->join(
                'categories',
                'transactions.category_id',
                '=',
                'categories.id'
            )
            ->select(
                'categories.name',
                DB::raw('SUM(transactions.amount) as total')
            )
            ->groupBy(
                'categories.id',
                'categories.name'
            )
            ->orderByDesc('total')
            ->first();


        /*
        |--------------------------------------------------------------------------
        | Category Expenses
        |--------------------------------------------------------------------------
        */

        $categoryExpenses = Transaction::where(
                'transactions.user_id',
                $userId
            )
            ->where(
                'transactions.type',
                'expense'
            )
            ->whereBetween(
                'transactions.transaction_date',
                [$monthStart, $monthEnd]
            )
            ->join(
                'categories',
                'transactions.category_id',
                '=',
                'categories.id'
            )
            ->select(
                'categories.name',
                DB::raw('SUM(transactions.amount) as total')
            )
            ->groupBy(
                'categories.id',
                'categories.name'
            )
            ->orderByDesc('total')
            ->limit(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Recent Transactions
        |--------------------------------------------------------------------------
        */

        $recentTransactions = Transaction::where(
                'user_id',
                $userId
            )
            ->with('category')
            ->latest('transaction_date')
            ->latest()
            ->limit(6)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */

        $categories = Category::orderBy('name')->get();


        /*
        |--------------------------------------------------------------------------
        | Current Month Budgets
        |--------------------------------------------------------------------------
        */

        $budgets = Budget::where(
                'user_id',
                $userId
            )
            ->whereMonth(
                'month',
                now()->month
            )
            ->whereYear(
                'month',
                now()->year
            )
            ->with('category')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Calculate Budget Spending
        |--------------------------------------------------------------------------
        */

        foreach ($budgets as $budget) {

            $spent = Transaction::where(
                    'user_id',
                    $userId
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
                    [$monthStart, $monthEnd]
                )
                ->sum('amount');


            $budget->spent = $spent;


            if ($budget->amount > 0) {

                $budget->percentage = min(
                    100,
                    round(
                        ($spent / $budget->amount) * 100
                    )
                );

            } else {

                $budget->percentage = 0;

            }


            $budget->remaining = max(
                0,
                $budget->amount - $spent
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Six Month Chart
        |--------------------------------------------------------------------------
        */

        $chartLabels = [];

        $chartIncome = [];

        $chartExpense = [];


        for ($i = 5; $i >= 0; $i--) {

            $date = Carbon::now()
                ->subMonths($i);


            $chartLabels[] = $date->format('M');


            $chartIncome[] = Transaction::where(
                    'user_id',
                    $userId
                )
                ->where(
                    'type',
                    'income'
                )
                ->whereMonth(
                    'transaction_date',
                    $date->month
                )
                ->whereYear(
                    'transaction_date',
                    $date->year
                )
                ->sum('amount');


            $chartExpense[] = Transaction::where(
                    'user_id',
                    $userId
                )
                ->where(
                    'type',
                    'expense'
                )
                ->whereMonth(
                    'transaction_date',
                    $date->month
                )
                ->whereYear(
                    'transaction_date',
                    $date->year
                )
                ->sum('amount');
        }


        /*
        |--------------------------------------------------------------------------
        | Saving Tip
        |--------------------------------------------------------------------------
        */

        $savingTip =
            "Keep tracking your spending and try to stay within your monthly budgets.";


        if ($monthlyIncome > 0) {

            $expensePercentage =
                ($monthlyExpense / $monthlyIncome) * 100;


            if ($expensePercentage >= 80) {

                $savingTip =
                    "Your expenses are using a large part of your income. Try reducing non-essential spending.";

            } elseif ($expensePercentage >= 60) {

                $savingTip =
                    "Your spending is getting high this month. Keep an eye on your daily expenses.";

            } elseif ($monthlyExpense > 0) {

                $savingTip =
                    "Good job! Keep tracking your expenses and continue building your savings.";
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Campus Announcements
        |--------------------------------------------------------------------------
        */

        $announcements = Announcement::latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Extra Student Statistics
        |--------------------------------------------------------------------------
        */

        $transactionCount = Transaction::where(
            'user_id',
            $userId
        )->count();


        $totalReceived = $totalIncome;

        $totalSpent = $totalExpense;


        /*
        |--------------------------------------------------------------------------
        | Student Dashboard View
        |--------------------------------------------------------------------------
        */

        return view(
            'StudentDashboard.index',
            compact(
                'totalIncome',
                'totalExpense',
                'balance',

                'monthlyIncome',
                'monthlyExpense',

                'topCategory',
                'categoryExpenses',

                'recentTransactions',
                'categories',

                'budgets',

                'chartLabels',
                'chartIncome',
                'chartExpense',

                'savingTip',

                'announcements',

                'transactionCount',
                'totalReceived',
                'totalSpent'
            )
        );
    }
}