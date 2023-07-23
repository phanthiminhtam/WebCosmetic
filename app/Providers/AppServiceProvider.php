<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\CosmeticLine;
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
        // view()->composer('user.Layout.header', function ($view)
        // {
        //     $category = Category::all();
        //     $view->with(['cats'=>$category]);
        // });

        view()->composer('user.Layout.header', function ($view)
        {
            $cosmeticline = Category::with('cosmeticline')->get();
            $view->with(['list'=>$cosmeticline]);
        });

        view()->composer('user.Layout.header_2', function ($view)
        {
            $cosmeticline = Category::with('cosmeticline')->get();
            $view->with(['list'=>$cosmeticline]);
        });


    }
}
