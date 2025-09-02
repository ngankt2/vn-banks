<?php

namespace Ngankt2\VNBank\Filament\Resources\VnBanks\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Ngankt2\VNBank\Filament\Resources\VnBanks\VnBankResource;
use Ngankt2\VNBank\FilamentVnBankPlugin;

class ManageVnBanks extends ManageRecords
{
    protected static string $resource = VnBankResource::class;

    protected function getHeaderActions(): array
    {
        if(filament(FilamentVnBankPlugin::$name)->getAddable()){
            return [
                CreateAction::make(),
            ];
        }
        return [

        ];
    }
}
