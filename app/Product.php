<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = [
        'product_name',
    ];

    public $timestamps = true;

    public function storehouses()
    {
        return $this->hasMany('App\Storehouse', 'store_id', 'id');
    }

    public function historyStores()
    {
        return $this->belongsTo('App\HistoryStore', 'product_id', 'id');
    }
}
