<?php
namespace App\Repositories;

use App\Repositories\Contracts\EloquentRepository;

class HistoryStoreRepository extends EloquentRepository
{
    public function getModel()
    {
        return \App\HistoryStore::class;
    }
}
