<?php

namespace App\Providers;

use App\Domain\Products\Actions\CreateOrUpdateProduct;
use App\Domain\Products\Actions\ProductActionInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->bind(ProductActionInterface::class, CreateOrUpdateProduct::class);
    }
}
