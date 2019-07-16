<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name_product','slug_product','description','price','status_product','id_product_type','id_category','image'];

    public function product_types(){

        return $this->belongsTo('App\ProductType','id_product_type','id');
    }

    public  function categories(){

        return $this->belongsTo('App\Category','id_category', 'id');
    }

    public function images(){

        return $this->hasMany('App\Image','id_product','id');
    }
}
