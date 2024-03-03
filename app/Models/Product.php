<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function categories() {
        return $this->hasOne(categorie::class, 'id', 'category_id');
    }

    public function subCategories() {
        return $this->hasOne(SubCategorie::class, 'id', 'sub_category_id');
    }

    public function childCategories() {
        return $this->hasOne(ChildCategorie::class, 'id', 'child_category_id');
    }

    public function brands() {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }
}
