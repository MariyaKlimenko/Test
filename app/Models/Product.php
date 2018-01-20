<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'category_product',
            'product_id', 'category_id');
    }

}
