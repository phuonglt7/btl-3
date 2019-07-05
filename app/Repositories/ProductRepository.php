<?php
namespace App\Repositories;

use App\Repositories\Contracts\EloquentRepository;

class ProductRepository extends EloquentRepository
{
    public function getModel()
    {
        return \App\Product::class;
    }
}
