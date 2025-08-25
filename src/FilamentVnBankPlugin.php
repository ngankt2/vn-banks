<?php

namespace Ngankt2\VNBank;

use Filament\Contracts\Plugin;
use Filament\Panel;

class FilamentVnBankPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-vn-bank-plugins';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([

        ]);

    }

    public function boot(Panel $panel): void
    {

    }

    public static function make(): static
    {
        return new static;
    }
}
