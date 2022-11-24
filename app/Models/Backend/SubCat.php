<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCat extends Model
{
    use HasFactory;
    protected $fillabe =[
        'cat_id',
        'name',
        'des',
        'image',
        'status'
    ];

    public function catName(){
        return $this->belongsTo(Category::class, 'cat_id');
    }

}
