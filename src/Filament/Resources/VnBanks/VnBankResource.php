<?php

namespace Ngankt2\VNBank\Filament\Resources\VnBanks;

use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Ngankt2\VNBank\Filament\Resources\VnBanks\Pages\ManageVnBanks;
use Ngankt2\VNBank\FilamentVnBankPlugin;
use Ngankt2\VNBank\Models\VNBank;

class VnBankResource extends Resource
{
    protected static ?string $model = VNBank::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Banknotes;

    public static function getNavigationIcon(): string|BackedEnum|Htmlable|null
    {
        return FilamentVnBankPlugin::make()->getShowNavigationIcon() ? Heroicon::Banknotes : null;
    }

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationGroup(): ?string
    {
        return __('nav.system');
    }

    // 2. Thêm label để hiển thị tên thân thiện
    public static function getModelLabel(): string
    {
        return __('Ngân hàng Việt Nam');
    }

    public static function getPluralLabel(): string
    {
        return __('Ngân hàng Việt Nam');
    }

    // 3. Thêm navigation label để hiển thị bên sidebar
    public static function getNavigationLabel(): string
    {
        return __('Ngân hàng Việt Nam');
    }


    /**
     * @throws \Exception
     */
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__("Tên Ngân Hàng"))
                    ->required()
                    ->maxLength(255),

                TextInput::make('short_name')
                    ->label(__("Tên Viết Tắt"))
                    ->maxLength(255),

                TextInput::make('swift_code')
                    ->label(__("Mã Swift"))
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                TextInput::make('bank_id')
                    ->unique(ignoreRecord: true)
                    ->label(__("Mã Ngân Hàng"))
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('short_name')
                    ->label(__("Tên viết tắt"))
                    ->searchable(),
                TextColumn::make('name')
                    ->label(__("Tên Ngân Hàng"))
                    ->searchable(),
                TextColumn::make('swift_code')
                    ->label(__("Mã Swift"))
                    ->badge()
                    ->searchable(),
                TextColumn::make('bank_id')
                    ->label(__("Mã Ngân Hàng"))
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([

            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageVnBanks::route('/'),
        ];
    }
}
