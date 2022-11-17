<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function books(){
        /*
        categories
        books
            category_id
        */
        return $this->hasMany(Book::class,'category_id','id');
    }
}
