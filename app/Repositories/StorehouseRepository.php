<?php
namespace App\Repositories;

use App\Repositories\Contracts\EloquentRepository;

class StorehouseRepository extends EloquentRepository
{
    public function getModel()
    {
        return \App\Storehouse::class;
    }
}
