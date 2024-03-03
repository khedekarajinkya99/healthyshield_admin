<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorie;
use App\Models\SubCategorie;
use App\Models\ChildCategorie;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductInventorie;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function products() {
        $products = Product::with('categories', 'subCategories', 'childCategories', 'brands')->get();
        return view('products/productList', compact('products'));
    }

    public function productAdd() {
        $category = categorie::all();
        $brand = Brand::all();
        return view('products/addProduct', compact('category', 'brand'));
    }

    public function productCreate(Request $request) {
        $validator = Validator::make($request->all(), [
            "product_name" => "required",
            "product_sub_title" => "required",
            "categories" => "required",
            "sub_categories" => "required",
            "child_categories" => "required",
            "brand" => "required",
            "short_description" => "required",
            "description" => "required",
            "ingredients" => "required",
            "how_to_use" => "required",
            "product_quantity" => "required|numeric",
            "price" => "required|numeric",
            "sale_price" => "required|numeric",
            "discount" => "nullable|numeric",
            "size" => "required",
            "weight" => "required|numeric",
            "status" => "required",
            "metaTitle" => "required",
            "meta_description" => "required",
            "meta_keyword" => "required",
            "product_tags" => "nullable",
            "tags" => "nullable",
            "recommendation" => "required",
            "slug" => "required",
            "shop_type" => "required",
            'image' => 'sometimes|required|file|image|mimes:png,jpg,jpeg|max:5000',
            'id' => 'sometimes|required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }

        $fileName = null;
        if (isset($request->image)) {
            $file = $request->image;
            $fileName = $file->getClientOriginalName();

            $file->move(public_path('uploads/products'), $fileName);
        }

        if (isset($request->id)) {
            $product = Product::find($request->id);
        } else {
            $product = new Product;
        }

        $product->product_name = $request->product_name;
        $product->product_sub_title = $request->product_sub_title;
        $product->category_id = $request->categories;
        $product->sub_category_id = $request->sub_categories;
        $product->child_category_id = $request->child_categories;
        $product->brand_id = $request->brand;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->ingredients = $request->ingredients;
        $product->how_to_use = $request->how_to_use;
        if ($fileName != null) {
            $product->images = $fileName;    
        }
        $product->quantity = $request->product_quantity;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->discount = $request->discount;
        $product->sizes = $request->size;
        $product->weight = $request->weight;
        $product->status = $request->status;
        $product->meta_title = $request->metaTitle;
        $product->meta_description = $request->meta_description;
        $product->meta_keyword = $request->meta_keyword;
        $product->tags = $request->tags;
        $product->products_tags = $request->product_tags;
        $product->recommendation = $request->recommendation;
        $product->slug = $request->slug;
        $product->shop_type = $request->shop_type;

        if ($product->save()) {
            return redirect('products')->with('success', 'Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Some error occured');
        }
    }

    public function deleteProduct($id) {
        $delete = Product::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

    public function viewProduct($id) {
        $products = Product::where('id', $id)->with('categories', 'subCategories', 'childCategories', 'brands')->first();
        return view('products/productView', compact('products'));
    }

    public function editProduct($id) {
        $products = Product::where('id', $id)->first();
        $category = categorie::all();
        $brand = Brand::all();
        return view('products/productEdit', compact('products', 'category', 'brand'));
    }

    public function productInventories() {
        $inventorie = ProductInventorie::with('product')->get();
        return view('products/inventorieList', compact('inventorie'));
    }

    public function addInventorie() {
        $product = Product::all();
        return view('products/addInventorie', compact('product'));   
    }

    public function createInventorie(Request $request) {
        $validator = Validator::make($request->all(), [
            "product" => "required",
            "available_stock" => "required|numeric",
            "total_stock" => "required|numeric",
            "sold_stock" => "required|numeric",
            "new_stock" => "required|numeric",
            "status" => "required",
            "id" => "sometimes|required"
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }

        if (isset($request->id)) {
            $product = ProductInventorie::find($request->id);
        } else {
            $product = new ProductInventorie;
        }

        $product->product_id = $request->product;
        $product->available_stock = $request->available_stock;
        $product->total_stock = $request->total_stock;
        $product->sold_stock = $request->sold_stock;
        $product->new_stock = $request->new_stock;
        $product->status = $request->status;

        if ($product->save()) {
            return redirect('productInventories')->with('success', 'Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Some error occured');
        }   
    }

    public function viewInventorie($id) {
        $inventorie = ProductInventorie::where('id', $id)->with('product')->first();
        return view('products.viewInventorie', compact('inventorie'));
    }

    public function editInventorie($id) {
        $inventorie = ProductInventorie::where('id', $id)->first();
        $product = Product::all();
        return view('products.editInventorie', compact('inventorie', 'product'));
    }

    public function deleteInventorie($id) {
        $delete = ProductInventorie::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
