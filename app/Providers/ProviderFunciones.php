<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ProviderFunciones extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path() . '/Http/Helpers/HelperFunciones.php';
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
