<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Transaction;
use Carbon\Carbon;

class ReportsController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | FILTER VALUES
        |--------------------------------------------------------------------------
        */

        $selectedMonth = $request->input('month');
        $selectedCategory = $request->input('category');
        $range = $request->input('range');


        /*
        |--------------------------------------------------------------------------
        | MONTH LIST
        |--------------------------------------------------------------------------
        */

        $months = Transaction::query()
            ->whereNotNull('transaction_date')
            ->selectRaw(
                "DATE_FORMAT(transaction_date, '%Y-%m') as month"
            )
            ->distinct()
            ->orderByDesc('month')
            ->pluck('month');


        /*
        |--------------------------------------------------------------------------
        | CATEGORY LIST
        |--------------------------------------------------------------------------
        */

        $categories = Category::query()
            ->orderBy('name')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | MAIN TRANSACTION QUERY
        |--------------------------------------------------------------------------
        */

        $query = Transaction::query();


        /*
        |--------------------------------------------------------------------------
        | TIME RANGE FILTER
        |--------------------------------------------------------------------------
        */

        if ($range == '1') {

            $query->where(
                'transaction_date',
                '>=',
                Carbon::now()->startOfMonth()
            );

        } elseif ($range == '6') {

            $query->where(
                'transaction_date',
                '>=',
                Carbon::now()
                    ->subMonths(5)
                    ->startOfMonth()
            );

        } elseif ($range == '12') {

            $query->where(
                'transaction_date',
                '>=',
                Carbon::now()->startOfYear()
            );
        }


        /*
        |--------------------------------------------------------------------------
        | MONTH FILTER
        |--------------------------------------------------------------------------
        */

        if (!empty($selectedMonth)) {

            $query->whereRaw(
                "DATE_FORMAT(transaction_date, '%Y-%m') = ?",
                [$selectedMonth]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | CATEGORY FILTER
        |--------------------------------------------------------------------------
        */

        if (!empty($selectedCategory)) {

            $query->where(
                'category_id',
                $selectedCategory
            );
        }


        /*
        |--------------------------------------------------------------------------
        | TOTAL INCOME
        |--------------------------------------------------------------------------
        */

        $totalIncome = (clone $query)
            ->where('type', 'income')
            ->sum('amount');


        /*
        |--------------------------------------------------------------------------
        | TOTAL EXPENSE
        |--------------------------------------------------------------------------
        */

        $totalExpenses = (clone $query)
            ->where('type', 'expense')
            ->sum('amount');


        /*
        |--------------------------------------------------------------------------
        | BALANCE
        |--------------------------------------------------------------------------
        */

        $balance = $totalIncome - $totalExpenses;


        /*
        |--------------------------------------------------------------------------
        | SAVING GOAL
        |--------------------------------------------------------------------------
        */

        $savingGoal = DB::table('budgets')
            ->sum('amount');


        /*
        |--------------------------------------------------------------------------
        | SAVING PERCENTAGE
        |--------------------------------------------------------------------------
        */

        $savingPercentage = 0;

        if ($savingGoal > 0) {

            $savingPercentage = round(
                ($balance / $savingGoal) * 100
            );

            $savingPercentage = max(
                0,
                min(100, $savingPercentage)
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FINANCIAL REPORT
        |--------------------------------------------------------------------------
        */

        $financialReport = (object) [

            'month' => $selectedMonth
                ? Carbon::createFromFormat(
                    'Y-m',
                    $selectedMonth
                )->format('F Y')
                : 'All Time',

            'total_income' => (float) $totalIncome,

            'total_expenses' => (float) $totalExpenses,

            'balance' => (float) $balance,

            'saving_goal' => (float) $savingGoal,

            'saving_percentage' => $savingPercentage,

            'income_change' => $totalIncome > 0
                ? 'Income recorded'
                : 'No income recorded',

            'expense_change' => $totalExpenses > 0
                ? 'Expenses recorded'
                : 'No expenses recorded',

            'balance_note' => $balance >= 0
                ? 'Positive balance'
                : 'Expenses are higher than income',
        ];


        /*
        |--------------------------------------------------------------------------
        | EXPENSE BY CATEGORY
        |--------------------------------------------------------------------------
        */

        $categoryQuery = Transaction::query()
            ->join(
                'categories',
                'transactions.category_id',
                '=',
                'categories.id'
            )
            ->where(
                'transactions.type',
                'expense'
            )
            ->whereNotNull(
                'transactions.transaction_date'
            )
            ->select(
                'categories.id as category_id',
                'categories.name as category_name',
                DB::raw(
                    'SUM(transactions.amount) as total'
                )
            )
            ->groupBy(
                'categories.id',
                'categories.name'
            );


        /*
        |--------------------------------------------------------------------------
        | CATEGORY DATE RANGE
        |--------------------------------------------------------------------------
        */

        if ($range == '1') {

            $categoryQuery->where(
                'transactions.transaction_date',
                '>=',
                Carbon::now()->startOfMonth()
            );

        } elseif ($range == '6') {

            $categoryQuery->where(
                'transactions.transaction_date',
                '>=',
                Carbon::now()
                    ->subMonths(5)
                    ->startOfMonth()
            );

        } elseif ($range == '12') {

            $categoryQuery->where(
                'transactions.transaction_date',
                '>=',
                Carbon::now()->startOfYear()
            );
        }


        /*
        |--------------------------------------------------------------------------
        | CATEGORY MONTH FILTER
        |--------------------------------------------------------------------------
        */

        if (!empty($selectedMonth)) {

            $categoryQuery->whereRaw(
                "DATE_FORMAT(transactions.transaction_date, '%Y-%m') = ?",
                [$selectedMonth]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | CATEGORY FILTER
        |--------------------------------------------------------------------------
        */

        if (!empty($selectedCategory)) {

            $categoryQuery->where(
                'transactions.category_id',
                $selectedCategory
            );
        }


        /*
        |--------------------------------------------------------------------------
        | CATEGORY TOTALS
        |--------------------------------------------------------------------------
        */

        $categoryTotals = $categoryQuery
            ->orderByDesc('total')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | CATEGORY TOTAL AMOUNT
        |--------------------------------------------------------------------------
        */

        $categoryTotalAmount = $categoryTotals->sum(
            function ($item) {
                return (float) $item->total;
            }
        );


        /*
        |--------------------------------------------------------------------------
        | CATEGORY PERCENTAGES
        |--------------------------------------------------------------------------
        */

        $categoryExpenses = $categoryTotals->map(
            function ($category) use ($categoryTotalAmount) {

                $category->total =
                    (float) $category->total;

                $category->percentage =
                    $categoryTotalAmount > 0
                    ? round(
                        (
                            $category->total /
                            $categoryTotalAmount
                        ) * 100
                    )
                    : 0;

                return $category;
            }
        );


        /*
        |--------------------------------------------------------------------------
        | MONTHLY FINANCIAL QUERY
        |--------------------------------------------------------------------------
        */

        $monthlyQuery = Transaction::query()
            ->whereNotNull('transaction_date');


        /*
        |--------------------------------------------------------------------------
        | MONTHLY RANGE
        |--------------------------------------------------------------------------
        */

        if ($range == '1') {

            $monthlyQuery->where(
                'transaction_date',
                '>=',
                Carbon::now()->startOfMonth()
            );

        } elseif ($range == '6') {

            $monthlyQuery->where(
                'transaction_date',
                '>=',
                Carbon::now()
                    ->subMonths(5)
                    ->startOfMonth()
            );

        } elseif ($range == '12') {

            $monthlyQuery->where(
                'transaction_date',
                '>=',
                Carbon::now()->startOfYear()
            );
        }


        /*
        |--------------------------------------------------------------------------
        | MONTHLY CATEGORY FILTER
        |--------------------------------------------------------------------------
        */

        if (!empty($selectedCategory)) {

            $monthlyQuery->where(
                'category_id',
                $selectedCategory
            );
        }


        /*
        |--------------------------------------------------------------------------
        | MONTHLY FINANCIAL DATA
        |--------------------------------------------------------------------------
        */

        $monthlyFinancials = $monthlyQuery
            ->selectRaw("
                DATE_FORMAT(transaction_date, '%b') as month,

                DATE_FORMAT(
                    transaction_date,
                    '%Y-%m'
                ) as sort_month,

                SUM(
                    CASE
                        WHEN type = 'income'
                        THEN amount
                        ELSE 0
                    END
                ) as income,

                SUM(
                    CASE
                        WHEN type = 'expense'
                        THEN amount
                        ELSE 0
                    END
                ) as expense
            ")
            ->groupByRaw("
                DATE_FORMAT(transaction_date, '%Y-%m'),
                DATE_FORMAT(transaction_date, '%b')
            ")
            ->orderBy('sort_month')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | MAX CHART AMOUNT
        |--------------------------------------------------------------------------
        */

        $maxChartAmount = $monthlyFinancials->max(
            function ($item) {

                return max(
                    (float) $item->income,
                    (float) $item->expense
                );
            }
        );

        /*
        | If there is no data, keep it at zero
        */

        $maxChartAmount = (float) ($maxChartAmount ?? 0);


        /*
        |--------------------------------------------------------------------------
        | MONTHLY PERCENTAGE
        |--------------------------------------------------------------------------
        */

        $monthlyFinancials = $monthlyFinancials->map(
            function ($item) use ($maxChartAmount) {

                $income = (float) $item->income;

                $expense = (float) $item->expense;

                $item->income = $income;

                $item->expense = $expense;

                $highest = max(
                    $income,
                    $expense
                );

                $item->percentage =
                    $maxChartAmount > 0
                    ? round(
                        ($highest / $maxChartAmount) * 100
                    )
                    : 0;

                return $item;
            }
        );


        /*
        |--------------------------------------------------------------------------
        | REPORT CARDS
        |--------------------------------------------------------------------------
        */

        $reports = collect([

            (object) [

                'title' => 'Income Report',

                'description' =>
                    'Total income recorded from transactions.',

                'icon' => '↑',
            ],

            (object) [

                'title' => 'Expense Report',

                'description' =>
                    'Total expenses recorded from transactions.',

                'icon' => '↓',
            ],

            (object) [

                'title' => 'Category Report',

                'description' =>
                    'Expense distribution across categories.',

                'icon' => '▤',
            ],

            (object) [

                'title' => 'Financial Summary',

                'description' =>
                    'Income, expenses, balance and saving goal.',

                'icon' => '₨',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | SEND DATA TO REPORTS VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.reports',
            compact(
                'reports',
                'months',
                'categories',
                'financialReport',
                'monthlyFinancials',
                'categoryExpenses',
                'maxChartAmount'
            )
        );
    }
}