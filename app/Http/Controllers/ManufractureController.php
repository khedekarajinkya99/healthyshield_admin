<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

use Illuminate\Support\Facades\Validator;

class ManufractureController extends Controller
{
    public function manufracture() {
        $brands = Brand::all();
        return view('brand/brands', compact('brands'));
    }

    public function manufracturerAdd() {
        return view('brand/brandsAdd');
    }

    public function brandCreate(Request $request) {
        $validator = Validator::make($request->all(), [
            'brand_name' => 'required',
            'status' => 'required',
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

            $file->move(public_path('uploads/brand'), $fileName);
        }

        if (isset($request->id)) {
            $brand = Brand::find($request->id);
        } else {
            $brand = new Brand;
        }

        $brand->brand_name = $request->brand_name;
        if ($fileName != null) {
            $brand->brand_icon = $fileName;
        }
        $brand->status = $request->status;

        if ($brand->save()) {
            return redirect('manufracture')->with('success', 'Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Some error occured');
        }
    }

    public function viewManufracturer($id) {
        $brands = Brand::where('id', $id)->first();
        return view('brand/brandsView', compact('brands'));
    }

    public function editManufracturer($id) {
        $brands = Brand::where('id', $id)->first();
        return view('brand/brandsEdit', compact('brands'));
    }

    public function deleteManufracturer($id) {
        $brand = Brand::where('id', $id)->delete();
        return redirect('manufracture')->with('success', 'Deleted Successfully');
    }
}
