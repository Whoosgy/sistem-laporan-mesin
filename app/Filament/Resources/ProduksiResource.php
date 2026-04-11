<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProduksiResource\Pages;
use App\Filament\Resources\ProduksiResource\RelationManagers;
use App\Models\Produksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProduksiResource extends Resource
{
    protected static ?string $model = Produksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('tanggal_lapor')
                    ->required(),
                Forms\Components\TextInput::make('jam_lapor')
                    ->required(),
                Forms\Components\TextInput::make('shift')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('nama_mesin')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('plant')
                    ->label('Area Plant')
                    ->options(self::getPlantOptions())
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('nama_pelapor')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('bagian_rusak')
                    ->maxLength(255),
                Forms\Components\Textarea::make('uraian_kerusakan')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('keterangan')
                    ->maxLength(20),
                Forms\Components\TextInput::make('photo_path')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('tanggal_lapor')
                ->date()
                ->sortable(),
            Tables\Columns\TextColumn::make('jam_lapor'),
            Tables\Columns\TextColumn::make('shift')
                ->searchable(),
            Tables\Columns\TextColumn::make('nama_mesin')
                ->searchable(),
            Tables\Columns\TextColumn::make('nama_pelapor')
                ->searchable(),
            Tables\Columns\TextColumn::make('bagian_rusak')
                ->searchable(),
            Tables\Columns\TextColumn::make('keterangan')
                ->searchable(),
            Tables\Columns\TextColumn::make('photo_path')
                ->searchable(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('plant')
                ->label('Filter Berdasarkan Plant')
                ->options(self::getPlantOptions()),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
}

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProduksis::route('/'),
            'create' => Pages\CreateProduksi::route('/create'),
            'edit' => Pages\EditProduksi::route('/{record}/edit'),
        ];
    }

    private static function getPlantOptions(): array
{
    $list = ['A', 'B', 'C', 'D', 'E', 'SS', 'SC', 'PE', 'QC', 'GA', 'MT', 'FH', 'FO', 'QR'];
    
    return array_combine($list, array_map(fn($p) => "Plant $p", $list));
}
}
