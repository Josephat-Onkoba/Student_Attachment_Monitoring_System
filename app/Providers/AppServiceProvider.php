<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        // Patch CVE-2026-48019: reject CRLF in email inputs
        Validator::extendImplicit('email', function ($attribute, $value, $parameters, $validator) {
            if (preg_match('/[\r\n]/', (string) $value)) {
                return false;
            }
            // Fall through to default email validation
            return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
        }, 'The :attribute must not contain newline characters.');
    }
}
