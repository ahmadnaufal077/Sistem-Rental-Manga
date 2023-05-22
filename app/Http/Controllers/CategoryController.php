<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.category', ['categories' => $categories]);
    }

    public function add()
    {
        return view('category.category-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories',
            'slug' => ''
        ]);

        Category::create($validated);
        return redirect('category')->with('status', 'Category Added Successfully');
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('category.category-edit', ['category' => $category]);
    }

    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $category = Category::where('slug', $slug, $validated)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('category')->with('status', 'Category Updated Successlifully');
    }

    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('category.category-delete', ['category' => $category]);
    }

    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('category')->with('status', 'Category Deleted Successlifully');
    }

    public function categoryDeleted()
    {
        $category = Category::onlyTrashed()->get();
        return view('category.category-deleted', ['category' => $category]);
    }

    public function categoryRestore($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('category')->with('status', 'Category Restored Successlifully');
    }
}
