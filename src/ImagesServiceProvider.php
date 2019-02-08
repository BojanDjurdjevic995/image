<?php
namespace Baki\Images;
use Illuminate\Support\ServiceProvider;
class ImagesServiceProvider extends ServiceProvider
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
        return ['StoreImages'];
    }
}
