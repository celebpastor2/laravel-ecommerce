<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\SendMail;
use App\Listeners\SendMailListener;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    protected $listen = [
        SendMail::class => [
            SendMailListener::class,            
        ]
    ];
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
