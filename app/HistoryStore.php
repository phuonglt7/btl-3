<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryStore extends Model
{
    protected $table = "history_stores";

    protected $fillable = [
        'store_id', 'product_id', 'amount', 'type',
    ];

    public $timestamps = true;

    public function storehouses()
    {
        return $this->hasMany('App\Storehouse', 'store_id', 'id');
    }

    public function products()
    {
        return $this->hasMany('App\Product', 'product_id', 'id');
    }
}
