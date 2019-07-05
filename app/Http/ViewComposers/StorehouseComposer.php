<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\StorehouseRepository;
use Illuminate\Support\Facades\Auth;

class StorehouseComposer
{
    protected $productRepository;

    public function __construct(StorehouseRepository $storehouseRepository)
    {
        $this->storehouseRepository = $storehouseRepository;
    }
    public function compose($view)
    {
        $storehouse = $this->storehouseRepository->get('user_id', Auth::id());
        $view->with('storeList', $storehouse);
    }
}
