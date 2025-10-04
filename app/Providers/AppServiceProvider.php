<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

      //testando se o usuario é admin 
       Gate::define('admin',function(){
          return auth()->user()->role === 'admin';
       });

       // testando se o usuario é rh 
        Gate::define('rh',function(){
          return auth()->user()->role === 'rh';
       });

        // testando se o usuario é colaborador
        Gate::define('colaborator',function(){
          return auth()->user()->role === 'colaborator';
       });
    }
}
