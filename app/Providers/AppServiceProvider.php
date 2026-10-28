<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Services\RetreatMoodService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $participant = request()->attributes->get('participant');

            if ($participant) {
                $view->with(
                    'mood',
                    app(RetreatMoodService::class)->forParticipant($participant)
                );
            }
        });
    }
}
