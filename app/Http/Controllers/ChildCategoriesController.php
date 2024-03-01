<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorie;
use App\Models\SubCategorie;
use App\Models\ChildCategorie;

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
}
