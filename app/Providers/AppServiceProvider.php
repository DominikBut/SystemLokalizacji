<?php

namespace App\Providers;

use Filament\Support\Colors\Color;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Facades\FilamentColor;

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
        if ($this->app->environment('production') || $this->app->environment('staging')) {
            URL::forceScheme('https');
        }
        FilamentColor::register([
            'danger' => Color::Red,
            'gray' => Color::Gray,
            'info' => Color::Blue,
            'primary' => Color::Lime,
            'success' => Color::Green,
            'warning' => Color::Amber,
        ]);
    }
}
