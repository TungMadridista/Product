<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name_category','slug_category','status_category'];

    public function product_types(){

        return $this->hasMany('App\ProductType','id_category','id');
    }
    public function product(){

        return $this->hasMany('App\Produtc','id_category','id');
    }
}
