<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\SubCategorie;
use Illuminate\Support\Facades\Validator;

class SubCategoriesController extends Controller
{
    public function subCategories() {
        $subCat = SubCategorie::with('categories')->get();
        return view('subcategories.listSubCat', compact('subCat'));
    }

    public function subCategoriesAdd() {
        $category = Categorie::all();
        return view('subcategories.addSubCat', compact('category'));
    }

    public function subCatCreate(Request $request) {
        $validator = Validator::make($request->all(), [
            'sub_cat_name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'categories' => 'required',
            'image' => 'sometimes|required|file|image|mimes:png,jpg,jpeg|max:5000',
            'id' => 'sometimes|required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }

        $fileName = null;
        if (isset($request->image)) {
            $file = $request->image;
            $fileName = $file->getClientOriginalName();

            $file->move(public_path('uploads/subCategories'), $fileName);
        }

        if (isset($request->id)) {
            $subCategory = SubCategorie::find($request->id);
        } else {
            $subCategory = new SubCategorie;
        }

        $subCategory->category_id = $request->categories;
        $subCategory->sub_category_name = $request->sub_cat_name;
        $subCategory->sub_category_description = $request->description;
        if ($fileName != null) {
            $subCategory->sub_category_icon = $fileName;
        }
        $subCategory->status = $request->status;

        if ($subCategory->save()) {
            return redirect('subCategories')->with('success', 'Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Some error occured');
        }
    }

    public function viewSubCategories($id) {
        $subCat = SubCategorie::where('id', $id)->with('categories')->first();
        return view('subcategories.viewSubCategories', compact('subCat'));   
    }

    public function editSubCategories($id) {
        $subCat = SubCategorie::where('id', $id)->first();
        $category = Categorie::all();
        return view('subcategories.editSubCategories', compact('subCat', 'category'));      
    }

    public function deleteSubCategories($id) {
        $delete = SubCategorie::where('id', $id)->delete();
        return redirect('subCategories')->with('success', 'Deleted Successfully');
    }
}
