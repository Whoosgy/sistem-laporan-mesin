<?php

namespace App\Filament\Resources\Technicians\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;

class TechniciansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Teknisi')
                    ->icon('heroicon-m-user') 
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Terdaftar Pada')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
            ])
            ->actions([
                // Lihat Detail (Pop-up Modal)
                ViewAction::make()
                    ->modalWidth('md'), 

                // (Pop-up Modal)
                EditAction::make()
                    ->modalWidth('md'),
                
                // Tambah aksi hapus individu
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}