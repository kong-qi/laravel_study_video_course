<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        //
       /* View::composer('*',function($view){
            //echo '合成器demo输出';
            $view->with(['name'=>'name']);
        });*/
        //View::share(['name'=>'全局share name']);
    }
}
