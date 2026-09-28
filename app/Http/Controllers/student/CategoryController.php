<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | STUDENT CATEGORY PAGE
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $categories = Category::latest()->get();

        $incomeCategories = Category::where('type', 'income')
            ->latest()
            ->get();

        $expenseCategories = Category::where('type', 'expense')
            ->latest()
            ->get();

        return view(
            'StudentDashboard.category',
            compact(
                'categories',
                'incomeCategories',
                'expenseCategories'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADD CATEGORY
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
        ]);

        Category::create([
            'name' => $validated['name'],
            'type' => $validated['type'],
        ]);

        return redirect()
            ->route('dashboard.category')
            ->with('success', 'Category added successfully!');
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE CATEGORY
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'name' => $validated['name'],
            'type' => $validated['type'],
        ]);

        return redirect()
            ->route('dashboard.category')
            ->with('success', 'Category updated successfully!');
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE CATEGORY
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()
            ->route('dashboard.category')
            ->with('success', 'Category deleted successfully!');
    }
}