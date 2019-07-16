<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'product_types';

    protected $fillable = ['name_product_type','slug_product_type','status_product_type','id_category'];

    public function products(){

        return $this->hasMany('App\Product','id_product','id');
    }

    public function categories(){

        return $this->belongsTo('App\Category','id_category','id');
    }
}
