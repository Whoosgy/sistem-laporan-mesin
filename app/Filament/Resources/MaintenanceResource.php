<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MaintenanceResource\Pages;
use App\Models\Maintenance;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MaintenanceResource extends Resource
{
    protected static ?string $model = Maintenance::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('produksi_id')
                    ->relationship('produksi', 'nama_mesin')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('waktu_perbaikan'),
                Forms\Components\TextInput::make('waktu_selesai'),
                Forms\Components\DatePicker::make('tanggal_selesai'),
                Forms\Components\TextInput::make('nama_teknisi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenis_perbaikan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('sparepart')
                    ->maxLength(255),
                Forms\Components\Textarea::make('keterangan')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('keterangan_maintenance')
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(50)
                    ->default('Selesai'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('produksi.id')
                    ->label('ID Laporan')
                    ->sortable(),

                Tables\Columns\TextColumn::make('waktu_perbaikan'),
                Tables\Columns\TextColumn::make('nama_teknisi')->searchable(),
                Tables\Columns\TextColumn::make('waktu_selesai'),
                Tables\Columns\TextColumn::make('tanggal_selesai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_teknisi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_perbaikan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sparepart')
                    ->searchable(),
                Tables\Columns\TextColumn::make('keterangan_maintenance')
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Pending'=> 'danger',
                        'On Progress' => 'warning',
                        'Selesai' => 'success',
                        default => 'Gray',
                    }),

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
                ->options(self::getPlantOptions())
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
            'index' => Pages\ListMaintenances::route('/'),
            'create' => Pages\CreateMaintenance::route('/create'),
            'edit' => Pages\EditMaintenance::route('/{record}/edit'),
        ];
    }
    private static function getPlantOptions(): array
    {
        $list = ['A', 'B', 'C', 'D', 'E', 'SS', 'SC', 'PE', 'QC', 'GA', 'MT', 'FH', 'FO', 'QR'];
        
        // Menggabungkan array agar key dan value-nya sama 
        return array_combine($list, array_map(fn($p) => "Plant $p", $list));
    }

} //

