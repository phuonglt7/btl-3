<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStore extends Model
{
    protected $table = "product_stores";

    protected $fillable = [
        'store_id', 'product_id', 'amount',
    ];

    public $timestamps = true;

    public function storehouses()
    {
        return $this->hasMany('App\Storehouse', 'store_id', 'id');
    }

    public function products()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
