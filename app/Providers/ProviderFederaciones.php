<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ProviderFederaciones extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path() . '/Http/Helpers/HelperFederaciones.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
