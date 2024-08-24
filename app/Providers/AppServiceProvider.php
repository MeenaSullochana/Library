<?php

// namespace App\Providers;
// use Illuminate\Pagination\Paginator;
// use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\Artisan;

// class AppServiceProvider extends ServiceProvider
// {
//     /**
//      * Register any application services.
//      *
//      * @return void
//      */
//     public function register()
//     {
//         //
//     }

//     /**
//      * Bootstrap any application services.
//      *
//      * @return void
//      */
//     public function boot()
//     {
//         Artisan::call('config:clear');

//         // Clear other caches as needed
//         Artisan::call('cache:clear');
//         Artisan::call('route:clear');
//         Artisan::call('view:clear');
//         Artisan::call('event:clear');
//         //
//         Paginator::useBootstrap();
//     }
// } -->


namespace App\Providers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Log before clearing caches
        Log::info('Starting to clear caches');

        // Clear config cache
        Log::info('Clearing config cache...');
        Artisan::call('config:clear');
        Log::info('Config cache cleared');

        // Clear route cache
        Log::info('Clearing route cache...');
        Artisan::call('route:clear');
        Log::info('Route cache cleared');
   
        // Clear compiled view cache
        Log::info('Clearing compiled view cache...');
        Artisan::call('view:clear');
        Log::info('Compiled view cache cleared');

        // Clear event cache
        Log::info('Clearing event cache...');
        Artisan::call('event:clear');
        Log::info('Event cache cleared');
       
        // Log after clearing caches
        Log::info('Finished clearing caches');
        Paginator::useBootstrap();
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
