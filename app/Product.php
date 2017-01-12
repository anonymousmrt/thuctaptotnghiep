<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Product extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'feature', 'description', 'category_id'
    ];

    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function addon(){
        return $this->hasMany('App\Addon', 'product_id');
    }



//    public function productMedia(){
//        return $this->hasMany('App\ProductMedia', 'product_id');
//    }

//    public function media(){
//        return $this->hasMany('App\Media', 'model_id');
//    }
}
