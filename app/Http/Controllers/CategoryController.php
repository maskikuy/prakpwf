<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class CategoryController extends Controller
{
    public function index()
    {
        // Display category name and total products as per requirements
        $categories = Category::withCount('products')->get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        try {
            Category::create($request->validated());
            return redirect()->route('category.index')->with('success', 'Category created successfully.');
        } catch (QueryException $e) {
            Log::error('Category store database error', ['message' => $e->getMessage()]);
            return redirect()->back()->withInput()->with('error', 'Database error while creating category.');
        } catch (\Throwable $e) {
            Log::error('Category store unexpected error', ['message' => $e->getMessage()]);
            return redirect()->back()->withInput()->with('error', 'Unexpected error occurred.');
        }
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->validated());
            return redirect()->route('category.index')->with('success', 'Category updated successfully.');
        } catch (\Throwable $e) {
            Log::error('Category update error', ['message' => $e->getMessage()]);
            return redirect()->back()->withInput()->with('error', 'Error while updating category.');
        }
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
        } catch (\Throwable $e) {
            Log::error('Category delete error', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error while deleting category.');
        }
    }
}
