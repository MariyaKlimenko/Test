<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'category_product',
            'category_id','product_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_category',
            'category_id','user_id');
    }
}
