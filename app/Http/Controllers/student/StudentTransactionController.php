<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::id())
            ->with('category')
            ->orderByDesc('transaction_date')
            ->orderByDesc('created_at')
            ->get();

        $categories = Category::orderBy('name')->get();

        return view(
            'StudentDashboard.transactions',
            compact('transactions', 'categories')
        );
    }

    public function store(Request $request)
{
   $validated = $request->validate([
    'category_id' => 'required|exists:categories,id',
    'amount' => 'required|numeric|min:0',
    'type' => 'required|in:income,expense',
    'description' => 'nullable|string|max:255',
    'transaction_date' => 'required|date',
]);

Transaction::create([
    'user_id' => Auth::id(),
    'category_id' => $validated['category_id'],
    'amount' => $validated['amount'],
    'type' => $validated['type'],
    'description' => $validated['description'] ?? null,
    'transaction_date' => $validated['transaction_date'],
]);
    return redirect()
        ->route('dashboard.transactions')
        ->with('success', 'Transaction added successfully.');
}

    public function edit($id)
    {
        $transaction = Transaction::where('user_id', Auth::id())
            ->findOrFail($id);

        $categories = Category::orderBy('name')->get();

        return view(
            'StudentDashboard.transactions-edit',
            compact('transaction', 'categories')
        );
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::where('user_id', Auth::id())
            ->findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric|min:0.01',
            'type' => 'required|in:income,expense',
            'description' => 'nullable|string|max:255',
            'transaction_date' => 'required|date',
        ]);

        $transaction->update([
            'category_id' => $validated['category_id'],
            'amount' => $validated['amount'],
            'type' => $validated['type'],
            'description' => $validated['description'] ?? null,
            'transaction_date' => $validated['transaction_date'],
        ]);

        return redirect()
            ->route('dashboard.transactions')
            ->with('success', 'Transaction updated successfully.');
    }

    public function destroy($id)
    {
        $transaction = Transaction::where('user_id', Auth::id())
            ->findOrFail($id);

        $transaction->delete();

        return redirect()
            ->route('dashboard.transactions')
            ->with('success', 'Transaction deleted successfully.');
    }
}