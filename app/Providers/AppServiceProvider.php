<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Sitesetting;
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
        View::composer(['*'], function($view){
    
            $menus = Category::with('subcategories')->get();
            $sitesetting = Sitesetting::find(1);
            $view->with('menus' , $menus)->with('sitesetting', $sitesetting);
        
        });
    }
}
