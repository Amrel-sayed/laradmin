<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
       view()->composer('partials.side',function($view){  $view->with('archives',\App\posts::Archive()); });
       // view()->composer('partials.master',function($view){  $view->with('usercomm',\App\comments::usercomm(Auth()->user()->id)->count()); });
       // view()->composer('partials.master',function($view){  $view->with('userposts',\App\posts::userposts(Auth()->user()->id)->count()); });
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
}
