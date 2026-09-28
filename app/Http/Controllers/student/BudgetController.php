<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BudgetController extends Controller
{
    /**
     * Display budgets
     */
    public function index()
    {
        $userId = Auth::id();

        $currentMonth = Carbon::now()->startOfMonth();

        $budgets = Budget::with('category')
            ->where('user_id', $userId)
            ->whereDate('month', $currentMonth)
            ->get();

        $categories = Category::orderBy('name')->get();

        $totalBudget = $budgets->sum('amount');

        $totalUsed = 0;

        foreach ($budgets as $budget) {

            $used = Transaction::where('user_id', $userId)
                ->where('category_id', $budget->category_id)
                ->where('type', 'expense')
                ->whereBetween('transaction_date', [
                    $currentMonth->copy()->startOfMonth(),
                    $currentMonth->copy()->endOfMonth()
                ])
                ->sum('amount');

            $budget->used_amount = $used;

            $budget->remaining_amount = max(
                0,
                $budget->amount - $used
            );

            $budget->percentage = $budget->amount > 0
                ? min(100, ($used / $budget->amount) * 100)
                : 0;

            $totalUsed += $used;
        }

        $totalRemaining = max(
            0,
            $totalBudget - $totalUsed
        );

        return view('dashboard.budgets', compact(
            'budgets',
            'categories',
            'totalBudget',
            'totalUsed',
            'totalRemaining'
        ));
    }


    /**
     * Store new budget
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric|min:1',
            'month' => 'required|date',
        ]);

        $month = Carbon::parse($request->month)
            ->startOfMonth();

        $exists = Budget::where('user_id', Auth::id())
            ->where('category_id', $request->category_id)
            ->whereDate('month', $month)
            ->exists();

        if ($exists) {
            return back()
                ->withInput()
                ->with('error', 'Budget already exists for this category and month.');
        }

        Budget::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'amount' => $request->amount,
            'month' => $month,
        ]);

        return redirect()
            ->route('dashboard.budgets')
            ->with('success', 'Budget added successfully!');
    }


    /**
     * Update budget
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric|min:1',
            'month' => 'required|date',
        ]);

        $budget = Budget::where('user_id', Auth::id())
            ->findOrFail($id);

        $month = Carbon::parse($request->month)
            ->startOfMonth();

        $exists = Budget::where('user_id', Auth::id())
            ->where('category_id', $request->category_id)
            ->whereDate('month', $month)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return back()
                ->withInput()
                ->with('error', 'Another budget already exists for this category and month.');
        }

        $budget->update([
            'category_id' => $request->category_id,
            'amount' => $request->amount,
            'month' => $month,
        ]);

        return redirect()
            ->route('dashboard.budgets')
            ->with('success', 'Budget updated successfully!');
    }


    /**
     * Delete budget
     */
    public function destroy($id)
    {
        $budget = Budget::where('user_id', Auth::id())
            ->findOrFail($id);

        $budget->delete();

        return redirect()
            ->route('dashboard.budgets')
            ->with('success', 'Budget deleted successfully!');
    }
}