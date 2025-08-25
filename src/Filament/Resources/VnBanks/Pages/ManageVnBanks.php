<?php

namespace Ngankt2\VNBank\Filament\Resources\VnBanks\Pages;

use Filament\Resources\Pages\ManageRecords;
use Ngankt2\VNBank\Filament\Resources\VnBanks\VnBankResource;

class ManageVnBanks extends ManageRecords
{
    protected static string $resource = VnBankResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
