<?php

namespace Ngankt2\VnBank;

use Illuminate\Support\ServiceProvider;

class VnBankProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
