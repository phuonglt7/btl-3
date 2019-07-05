<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\ProductRepository;

class ProductComposer
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function compose($view)
    {
        $product = $this->productRepository->getAll();
        $view->with('productList', $product);
    }
}
