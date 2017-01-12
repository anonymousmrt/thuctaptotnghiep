<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Addon extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $table = 'addons';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'feature', 'description', 'product_id', 'price'
    ];



    public function product(){
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function scopeAddonOfProduct($query, $id)
    {
        return $query->where('product_id', $id);
    }


    public function order(){
        return $this->hasMany('App\Order', 'addon_id');
    }
}
