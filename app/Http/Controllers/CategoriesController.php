<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function categories() {
        $categories = Categorie::all();
        return view('categories.listCategories', compact('categories'));
    }

    public function categoriesAdd() {
        return view('categories.addCategories');
    }

    public function catCreate(Request $request) {
        $validator = Validator::make($request->all(), [
            'cat_name' => 'required',
            'status' => 'required',
            'metaTitle' => 'required',
            'meta_description' => 'required',
            'meta_keyword' => 'required',
            'canonical_tags' => 'required',
            'slug' => 'required',
            'seo_description' => 'required',
            'shop_type' => 'required',
            'cat_image' => 'sometimes|required|file|image|mimes:png,jpg,jpeg|max:5000',
            'id' => 'sometimes|required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }

        $fileName = null;
        if (isset($request->cat_image)) {
            $file = $request->cat_image;
            $fileName = $file->getClientOriginalName();

            $file->move(public_path('uploads/categories'), $fileName);
        }

        if (isset($request->id)) {
            $category = Categorie::find($request->id);
        } else {
            $category = new Categorie;
        }

        $category->category_name = $request->cat_name;
        if ($fileName != null) {
            $category->category_icon = $fileName;    
        }
        $category->status = $request->status;
        $category->meta_title = $request->metaTitle;
        $category->meta_description = $request->meta_description;
        $category->meta_keyword = $request->meta_keyword;
        $category->tags = $request->canonical_tags;
        $category->slug = $request->slug;
        $category->seo_description = $request->seo_description;
        $category->shop_type = $request->shop_type;

        if ($category->save()) {
            return redirect('categories')->with('success', 'Categories added successfully.');
        } else {
            return redirect()->back()->with('error', 'Some error occured.');
        }
    }

    public function viewCategories($id) {
        $category = Categorie::where('id', $id)->first();
        return view('categories.viewCategories', compact('category'));
    }

    public function editCategories($id) {
        $category = Categorie::where('id', $id)->first();
        return view('categories.editCategories', compact('category'));   
    }

    public function deleteCategories($id) {
        $delete = Categorie::where('id', $id)->delete();
        return redirect('categories')->with('success', 'Deletes successfully');
    }
}
