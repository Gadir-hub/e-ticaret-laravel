<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Boş bir component oluştur
        Blade::component('empty-component', 'components.empty');
    }
}