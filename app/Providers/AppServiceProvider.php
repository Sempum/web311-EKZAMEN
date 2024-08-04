<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        view()->composer(['layouts.template-parts.navbar', 'layouts.main_site.index', 'layouts.main_site.searchProduct', 'layouts.main_site.productsByCategory', 'layouts.main_site.contacts'], function($view){
            $view->with([
                'user' => auth()->user(),
            ]);
        });

        Paginator::useBootstrap();
    }
}
