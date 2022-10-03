<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable =[
        'product_name',
        'price',
        'image'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
