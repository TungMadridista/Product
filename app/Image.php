<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = ['name_image','id_product'];

    public function products(){

        return $this->belongsTo('App\Product','id_product','id');
    }
}
