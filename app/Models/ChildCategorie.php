<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildCategorie extends Model
{
    use HasFactory;

    public function subCategory() {
        return $this->belongsTo(SubCategorie::class, 'sub_category_id', 'id');
    }

    public function category() {
        return $this->belongsTo(categorie::class, 'category_id', 'id');
    }
}
