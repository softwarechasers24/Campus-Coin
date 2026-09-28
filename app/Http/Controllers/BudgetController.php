<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | BUDGET LIST
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        $month = $request->get('month', now()->format('Y-m'));

        // Make sure month is in YYYY-MM format
        if (!preg_match('/^\d{4}-\d{2}$/', $month)) {
            $month = now()->format('Y-m');
        }

        $budgets = Budget::where('month', $month)
            ->orderBy('category', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        $totalBudget = $budgets->sum(function ($budget) {
            return (float) $budget->amount;
        });

        $totalSpent = $budgets->sum(function ($budget) {
            return (float) $budget->spent;
        });

        $remaining = $totalBudget - $totalSpent;

        $percentage = $totalBudget > 0
            ? round(($totalSpent / $totalBudget) * 100)
            : 0;

        $percentage = min($percentage, 100);

        return view('admin.budget', compact(
            'budgets',
            'month',
            'totalBudget',
            'totalSpent',
            'remaining',
            'percentage'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | STORE BUDGET
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'amount'   => 'required|numeric|min:0',
            'spent'    => 'nullable|numeric|min:0',
            'month'    => 'required|date_format:Y-m',
        ]);

        // Check duplicate category for same month
        $exists = Budget::where('category', $validated['category'])
            ->where('month', $validated['month'])
            ->exists();

        if ($exists) {
            return back()
                ->withInput()
                ->withErrors([
                    'category' => 'This category already has a budget for this month.'
                ]);
        }

        $budget = new Budget();

        $budget->category = $validated['category'];
        $budget->amount = $validated['amount'];
        $budget->spent = $validated['spent'] ?? 0;
        $budget->month = $validated['month'];

        if (auth()->check() && \Schema::hasColumn('budgets', 'user_id')) {
            $budget->user_id = auth()->id();
        }

        $budget->save();

        return redirect()
            ->route('admin.budget', [
                'month' => $validated['month']
            ])
            ->with('success', 'Budget added successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT BUDGET
    |--------------------------------------------------------------------------
    */
    public function edit(Budget $budget)
    {
        return view('admin.budget-edit', compact('budget'));
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE BUDGET
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Budget $budget)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'amount'   => 'required|numeric|min:0',
            'spent'    => 'nullable|numeric|min:0',
            'month'    => 'required|date_format:Y-m',
        ]);

        // Check duplicate category for same month
        $exists = Budget::where('category', $validated['category'])
            ->where('month', $validated['month'])
            ->where('id', '!=', $budget->id)
            ->exists();

        if ($exists) {
            return back()
                ->withInput()
                ->withErrors([
                    'category' => 'This category already has a budget for this month.'
                ]);
        }

        $budget->category = $validated['category'];
        $budget->amount = $validated['amount'];
        $budget->spent = $validated['spent'] ?? 0;
        $budget->month = $validated['month'];

        $budget->save();

        return redirect()
            ->route('admin.budget', [
                'month' => $validated['month']
            ])
            ->with('success', 'Budget updated successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE BUDGET
    |--------------------------------------------------------------------------
    */
    public function destroy(Budget $budget)
    {
        $month = $budget->month;

        $budget->delete();

        return redirect()
            ->route('admin.budget', [
                'month' => $month
            ])
            ->with('success', 'Budget deleted successfully.');
    }
}