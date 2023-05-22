<?php

namespace App\Blade;

use Illuminate\Support\Facades\Blade;

class VerifiedDirective
{
    public function handle()
    {
        Blade::if('verified', function () {
            return auth()->check() && auth()->user()->hasVerifiedEmail();
        });
    }
}