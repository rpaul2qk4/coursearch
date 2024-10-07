<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use  App\Helpers\DataHelper;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('DataHelper', '\App\Helpers\DataHelper');
        $loader->alias('OptionsHelper', '\App\Helpers\OptionsHelper');
        $loader->alias('AppHelper', '\App\Helpers\AppHelper');
        $loader->alias('DateHelper', '\App\Helpers\DateHelper');
        $loader->alias('ReportHelper', '\App\Helpers\ReportHelper');	
        $loader->alias('FormHelper', '\App\Helpers\FormHelper');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
		Paginator::useBootstrapFive();
       // $total_specializations = DataHelper::specializations()->count();
		//View::share('total_specializations', $total_specializations); 
    }
}
