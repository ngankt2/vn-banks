<?php

namespace Ngankt2\VNBank;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Ngankt2\VNBank\Filament\Resources\VnBanks\VnBankResource;

class FilamentVnBankPlugin implements Plugin
{
    /**
     * @var mixed|true
     */
    private bool $showNavigationIcon = true;

    public static string $name = 'filament-vn-bank-plugins';

    public function getId(): string
    {
        return self::$name;
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            VnBankResource::class
        ]);

    }

    public function boot(Panel $panel): void
    {

    }

    public static function make(): static
    {
        return new static;
    }

    public function showNavigationIcon($bool=true): static
    {
        $this->showNavigationIcon = $bool;
        return $this;
    }
    public function getShowNavigationIcon(): bool
    {
        return $this->showNavigationIcon;
    }
}
