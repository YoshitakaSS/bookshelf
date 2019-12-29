<?php

namespace App\Providers;

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
        DB::listen(function ($query) {
            $sql = preg_replace_array('/\?/', $query->bindings, $query->sql);
            \Log::info("[Query Time:{$query->time}s] {$sql}");
        });
    }
}
