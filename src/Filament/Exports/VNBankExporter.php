<?php

namespace Ngankt2\VNBank\Filament\Exports;

use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;
use Ngankt2\VNBank\Models\VNBank;

class VNBankExporter extends Exporter
{
    protected static ?string $model = VNBank::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('name')
                ->label('Tên ngân hàng'),
            ExportColumn::make('bank_id')
                ->label('Mã ngân hàng'),
            ExportColumn::make('atm_bin')
                ->label('ATM BIN'),
            ExportColumn::make('card_length')
                ->label('Độ dài thẻ'),
            ExportColumn::make('short_name')
                ->label('Tên viết tắt'),
            ExportColumn::make('bank_code')
                ->label('Mã ngân hàng'),
            ExportColumn::make('type')
                ->label('Loại'),
            ExportColumn::make('swift_code')
                ->label('SWIFT Code'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your bank export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
