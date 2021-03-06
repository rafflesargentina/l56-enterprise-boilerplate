<?php

namespace Raffles\Providers;

use Raffles\Listeners\PruneOldTokens;
use Raffles\Listeners\RevokeOldTokens;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Laravel\Passport\Events\AccessTokenCreated;
use Laravel\Passport\Events\RefreshTokenCreated;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        AccessTokenCreated::class => [
            RevokeOldTokens::class,
        ],

         RefreshTokenCreated::class => [
            PruneOldTokens::class,
         ],

         Registered::class => [
            SendEmailVerificationNotification::class,
         ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
