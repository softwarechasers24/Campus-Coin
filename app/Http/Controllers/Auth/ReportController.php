<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        // Current logged-in student's transactions
        $transactions = Transaction::where('user_id', Auth::id())
            ->with('category')
            ->latest('transaction_date')
            ->latest()
            ->get();

        // Total Income
        $income = $transactions
            ->where('type', 'income')
            ->sum('amount');

        // Total Expense
        $expense = $transactions
            ->where('type', 'expense')
            ->sum('amount');

        // Current Balance
        $balance = $income - $expense;

        // Expense by Category
        $categoryExpenses = Transaction::where('transactions.user_id', Auth::id())
            ->where('transactions.type', 'expense')
            ->join('categories', 'transactions.category_id', '=', 'categories.id')
            ->select(
                'categories.name',
                DB::raw('SUM(transactions.amount) as total')
            )
            ->groupBy('categories.id', 'categories.name')
            ->orderByDesc('total')
            ->get();

        return view('dashboard.reports', compact(
            'transactions',
            'income',
            'expense',
            'balance',
            'categoryExpenses'
        ));
    }
}