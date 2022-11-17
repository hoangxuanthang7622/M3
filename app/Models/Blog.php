<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public function category(){
        /*
        categories
        books
            category_id
        */
        return $this->belongsTo(Category::class,    //tên lớp
        'category_id',
        'id'
    );
    }
}
