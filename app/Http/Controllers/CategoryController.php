<?php

namespace App\Http\Controllers;

use App\Models\Category;
// use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function index()
    // {
    //     $income = Category::where('type', 'income')
    //         ->latest()
    //         ->get();

    //     $expense = Category::where('type', 'expense')
    //         ->latest()
    //         ->get();

    //     return view('admin.categories', compact(
    //         'income',
    //         'expense'
    //     ));
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:100',
    //         'type' => 'required|in:income,expense',
    //     ]);

    //     Category::create([
    //         'name' => $request->name,
    //         'type' => $request->type,
    //     ]);

    //     return redirect()
    //         ->route('categories.index')
    //         ->with('success', 'Category added successfully.');
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:100',
    //         'type' => 'required|in:income,expense',
    //     ]);

    //     $category = Category::findOrFail($id);

    //     $category->update([
    //         'name' => $request->name,
    //         'type' => $request->type,
    //     ]);

    //     return redirect()
    //         ->route('categories.index')
    //         ->with('success', 'Category updated successfully.');
    // }
  public function categoriess()
{
    $categories = \App\Models\Category::latest()->get();

    $incomeCategories = $categories->where('type', 'income');
    $expenseCategories = $categories->where('type', 'expense');

    return view('admin.categories', compact(
        'categories',
        'incomeCategories',
        'expenseCategories'
    ));
}

    // public function destroy($id)
    // {
    //     $category = Category::findOrFail($id);

    //     $category->delete();

    //     return redirect()
    //         ->route('categories.index')
    //         ->with('success', 'Category deleted successfully.');
    // }
}
