<?php
namespace App\Repositories;

use App\Repositories\Contracts\EloquentRepository;

class ProductStoreRepository extends EloquentRepository
{
    public function getModel()
    {
        return \App\ProductStore::class;
    }
}
