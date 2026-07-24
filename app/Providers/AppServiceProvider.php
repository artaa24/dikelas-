<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
        // Share jumlah notifikasi yang belum dibaca ke semua view
        View::composer('*', function ($view) {
            if (auth()->check()) {
                $unreadNotifs = \App\Models\Notification::where('notifiable_type', 'App\Models\User')
                    ->where('notifiable_id', auth()->id())
                    ->whereNull('read_at')
                    ->count();
                $view->with('unreadNotifs', $unreadNotifs);
            }
        });
    }
}
