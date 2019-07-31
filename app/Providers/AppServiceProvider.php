<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//importaremos una clase que contiene unas funcionalidades
use Illuminate\Support\Facades\Schema;
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
        //este metodo sirve para hacer migraciones a la base de datos
        Schema::defaultStringLength(191);
    }
}
