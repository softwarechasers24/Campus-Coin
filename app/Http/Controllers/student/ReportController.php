<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        /*
        |--------------------------------------------------------------------------
        | All Transactions
        |--------------------------------------------------------------------------
        */

        $transactions = Transaction::where('user_id', $userId)
            ->with('category')
            ->latest('transaction_date')
            ->get();


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
        | Categories
        |--------------------------------------------------------------------------
        */

        $categories = Category::orderBy('name')->get();


        /*
        |--------------------------------------------------------------------------
        | Category Expense Report
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
            ->join(
                'categories',
                'transactions.category_id',
                '=',
                'categories.id'
            )
            ->select(
                'categories.name',
                \DB::raw('SUM(transactions.amount) as total')
            )
            ->groupBy(
                'categories.id',
                'categories.name'
            )
            ->orderByDesc('total')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Six Month Report
        |--------------------------------------------------------------------------
        */

        $chartLabels = [];
        $chartIncome = [];
        $chartExpense = [];


        for ($i = 5; $i >= 0; $i--) {

            $date = Carbon::now()->subMonths($i);

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
        | Return Reports Page
        |--------------------------------------------------------------------------
        */

        return view(
            'StudentDashboard.reports',
            compact(
                'transactions',
                'totalIncome',
                'totalExpense',
                'balance',
                'monthlyIncome',
                'monthlyExpense',
                'categories',
                'categoryExpenses',
                'chartLabels',
                'chartIncome',
                'chartExpense'
            )
        );
    }
}