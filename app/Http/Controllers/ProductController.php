<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItems;
use App\Models\ProductCategories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function home()
    {
        return view('page.home', ['productList' => Products::paginate(6)]);
    }
    public static function handleDetail($id)
    {
        return view('page.detail', ['product' => Products::where('id', '=', $id)->first()]);
    }

    public static function viewProductPage()
    {
        return view('page.product_view', ['products' => Products::get()]);
    }
    public static function insertProductPage()
    {
        return view('page.product_insert', ['categories' => ProductCategories::get()]);
    }

    public static function handleInsertProduct(Request $request)
    {
        $request->validate([
            'name' => 'filled|min:5|unique:products,name',
            'description' => 'filled|min:50',
            'price' => 'filled|numeric|gt:0',
            'category_id' => 'required',
            'image' => 'required|file|image|mimes:jpg'
        ]);
        $extFile = $request->image->getClientOriginalExtension();
        $namaFile = str_replace(' ', '_', $request->name) . '.' . $extFile;
        $request->image->move('image', $namaFile);
        $product = new Products();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->image = 'image/' . $namaFile;
        $product->save();

        return redirect()->route('home')->with('success', 'Insert Product Successfully');
    }

    public static function handleDelete($id)
    {
        if (Products::where('id', '=', $id)->exists()) {
            Products::where('id', '=', $id)->delete();
            return redirect()->route('get.product_view')->with('success', 'Delete Product Successfully');
        }
    }

    public static function handleUpdate($id)
    {
        return view(
            'page.product_edit',
            [
                'product' => Products::where('id', '=', $id)->first(),
                'categories' => ProductCategories::get()
            ]
        );
    }

    public static function handleSearch(Request $request)
    {
        $productList = Products::where('name', 'LIKE', '%' . $request->name . '%')->paginate(6);

        // dd($productList);
        if ($productList->isEmpty()) {
            return view('page.empty', ['product' => $request->name]);
        } else {
            return view('page.home', ['productList' => $productList]);
        }
    }

    public static function handleEdit(Request $request)
    {
        $request->validate([
            'name' => 'filled|min:5|unique:products,name',
            'description' => 'filled|min:50',
            'price' => 'filled|numeric|gt:0',
            'category_id' => 'required',
            'image' => 'file|image|mimes:jpg'
        ]);

        $isProductExists = Products::where('id', '=', $request->id)->exists();
        if ($isProductExists) {
            $product = Products::where('id', '=', $request->id)->first();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->category_id = $request->category_id;

            // Check if the image is not same with the current product
            if (!empty($request->image)) {
                $extFile = $request->image->getClientOriginalExtension();
                $namaFile = $request->name . '.' . $extFile;
                $request->image->move('image', $namaFile);
                $product->image = 'image/' . $namaFile;
            }
            $product->save();
            return redirect()->route('get.product_view')->with('success', 'Update Product Successfully');
        } else {
            return redirect()->route('get.product_view')->with('failed', 'Sorry, The Data Cannot Exists');
        }
    }
}
