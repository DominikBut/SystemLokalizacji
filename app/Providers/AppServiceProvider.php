<?php

namespace App\Providers;

use Filament\Support\Colors\Color;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Facades\FilamentColor;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

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
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Zweryfikuj swój adres email')
                ->line('Kliknij przycisk poniżej, aby zweryfikować ten adres email.')
                ->action('Zweryfikuj ten adres email', $url)
                ->line('Jeżeli nie to nie ty stworzyłeś to konto, żadna dalsza czynność nie jest wymagana.');
        });
        ResetPassword::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Resetowanie hasła')
                ->line('Otrzymałeś ten email, ponieważ otrzymaliśmy prośbę o zresetowanie twojego hasła.')
                ->action('Zmień hasło', $url)
                ->line('Link do resetowania hasła wygaśnie w ciągu 60 min minut.', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')])
                ->line('Jeżeli to nie ty zażądałeś zresetowania hasła, żadna dalsza czynność nie jest wymagana.');
        });
    }
}
