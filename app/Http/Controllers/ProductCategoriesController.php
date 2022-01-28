<?php

namespace App\Http\Controllers;

use App\Models\ProductCategories;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    public static function addCategoriesProductPage()
    {
        return view('page.insert_new_category');
    }

    public static function categoryPage()
    {

        return view('page.category_view', ['categories' => ProductCategories::get()]);
    }

    public static function insertCategory(Request $request)
    {
        $request->validate([
            'category' => 'filled|min:2|unique:product_categories,category'
        ]);

        $category = new ProductCategories();
        $category->category = $request->category;
        $category->save();

        return redirect()->route('get.category_page')->with('success', 'Add Category Successfully');
    }

    public static function editCategory($id)
    {
        return view('page.category_edit', ['category' => ProductCategories::find($id)]);
    }

    public static function handleEditCategory(Request $request)
    {
        $request->validate([
            'category' => 'filled|min:2|unique:product_categories,category'
        ]);

        if (ProductCategories::where('id', '=', $request->id)->exists()) {
            $category = ProductCategories::where('id', '=', $request->id)->first();
            $category->category = $request->category;
            $category->save();
            return redirect()->route('get.category_page')->with('success', 'Update Category Successfully');
        }
    }

    public static function handleDeleteCategory(Request $request)
    {
        if (ProductCategories::where('id', '=', $request->id)) {
            ProductCategories::where('id', '=', $request->id)->delete();
            return redirect()->route('get.category_page')->with('success', 'Delete Category Successfully');
        }
    }
}
