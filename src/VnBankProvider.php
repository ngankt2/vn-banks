<?php

namespace Ngankt2\VNBank;

use Illuminate\Support\ServiceProvider;

class VnBankProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
