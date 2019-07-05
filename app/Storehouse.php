<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storehouse extends Model
{
    protected $table = "storehouses";

    protected $fillable = [
        'store_name', 'user_id',
    ];

    public $timestamps = true;

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function products()
    {
        $this->hasMany('App\Product', 'store_id', 'id');
    }

    public function historyStores()
    {
        $this->hasMany('App\HistoryStore', 'store_id', 'id');
    }
}
