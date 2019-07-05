<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\ProductStoreRepository;

class ProductStoreComposer
{
    protected $productStoreRepository;

    public function __construct(ProductStoreRepository $productStoreRepository)
    {
        $this->productStoreRepository = $productStoreRepository;
    }
    public function compose($view)
    {
        $productStore = $this->productStoreRepository->getAll();
        $view->with('productStoreList', $productStore);
    }
}
