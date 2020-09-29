<?php
namespace Baki\Image;
use Illuminate\Support\ServiceProvider;
class ImageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function provides()
    {
        return ['StoreImage'];
    }
}
