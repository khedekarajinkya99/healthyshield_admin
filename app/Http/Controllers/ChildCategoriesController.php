<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorie;
use App\Models\SubCategorie;
use App\Models\ChildCategorie;
use Illuminate\Support\Facades\Validator;

class ChildCategoriesController extends Controller
{
    public function childCategories() {
        $cat = ChildCategorie::with('category', 'subCategory')->get();
        return view('child_categories.childCategories', compact('cat'));
    }

    public function childCategoriesAdd() {
        $categories = categorie::all();
        return view('child_categories.addChildCat', compact('categories'));
    }

    public function getSubCategory($id) {
        $subCat = SubCategorie::where('category_id', $id)->select('id', 'sub_category_name')->get();
        if (count($subCat) > 0) {
            return response()->json(['status' => 'success', 'data' => $subCat], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data not found'], 404);
        }
    }

    public function childCatCreate(Request $request) {
        $validator = Validator::make($request->all(), [
            'child_cat_name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'categories' => 'required',
            'sub_categories' => 'required',
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

            $file->move(public_path('uploads/childCategories'), $fileName);
        }

        if (isset($request->id)) {
            $childCategory = ChildCategorie::find($request->id);
        } else {
            $childCategory = new ChildCategorie;
        }

        $childCategory->category_id = $request->categories;
        $childCategory->sub_category_id = $request->sub_categories;
        $childCategory->child_category_name = $request->child_cat_name;
        $childCategory->child_category_description = $request->description;
        if ($fileName != null) {
            $childCategory->child_category_icon = $fileName;
        }
        $childCategory->status = $request->status;

        if ($childCategory->save()) {
            return redirect('childCategories')->with('success', 'Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Some error occured');
        }
    }

    public function viewChildCategories($id) {
        $cat = ChildCategorie::where('id', $id)->with('category', 'subCategory')->first();
        return view('child_categories.viewChildCategories', compact('cat'));
    }

    public function editChildCategories($id) {
        $cat = ChildCategorie::where('id', $id)->with('category', 'subCategory')->first();
        $categories = categorie::all();
        return view('child_categories.editChildCategories', compact('cat', 'categories'));   
    }

    public function deleteChildCategories($id) {
        $delete = ChildCategorie::where('id', $id)->delete();
        return redirect('childCategories')->with('success', 'Deleted Successfully');
    }

    public function getChildCategory($id) {
        $childCat = ChildCategorie::where('sub_category_id', $id)->select('id', 'child_category_name')->get();
        if (count($childCat) > 0) {
            return response()->json(['status' => 'success', 'data' => $childCat], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data not found'], 404);
        }
    }
}
