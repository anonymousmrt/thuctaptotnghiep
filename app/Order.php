<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'addon_id'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function addon(){
        return $this->belongsTo('App\Addon', 'addon_id');
    }
}
