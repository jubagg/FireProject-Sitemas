<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ProviderCuarteles extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path() . '/Http/Helpers/HelperCuarteles.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
