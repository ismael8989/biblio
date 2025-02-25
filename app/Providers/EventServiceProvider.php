<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        \App\Events\BookCreated::class => [
            \App\Listeners\LogBookCreated::class,
        ],
        \App\Events\BookUpdated::class => [
            \App\Listeners\LogBookUpdated::class,
        ],
        \App\Events\BookDeleted::class => [
            \App\Listeners\LogBookDeleted::class,
        ],
        
    ];
    

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
