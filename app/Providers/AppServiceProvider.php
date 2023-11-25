<?php

namespace App\Providers;

use App\Events\TrackVivinoParseEvent;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Support\ServiceProvider;

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
        \Queue::after(function (JobProcessed $event) {

            $payload = $event->job->payload();
            $myJob = unserialize($payload['data']['command']);

            event(new TrackVivinoParseEvent($myJob->getAction()));

//            \Log::info( $myJob->getAction());

        });
    }
}
