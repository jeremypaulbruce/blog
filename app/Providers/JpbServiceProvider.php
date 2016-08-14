<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class JpbServiceProvider extends ServiceProvider
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

    static public function dump($var, $exit=true) {
        dump($var);

        if (true === $exit) exit;
    }
}
