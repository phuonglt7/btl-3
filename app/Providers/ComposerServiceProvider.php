<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\ViewComposers\UserComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer(
            ['stores.index', 'stores.add', 'stores.edit'],
            'App\Http\ViewComposers\UserComposer'
        );

        View::composer(
            ['products.index', 'products.add', 'product.edit', 'history.show', 'history.add'],
            'App\Http\ViewComposers\StorehouseComposer'
        );

        View::composer(
            ['history.add', 'history.show'],
            'App\Http\ViewComposers\ProductComposer'
        );


        View::composer(
            [ 'products.index'],
            'App\Http\ViewComposers\ProductStoreComposer'
        );
    }
}
