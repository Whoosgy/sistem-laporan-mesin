<?php

namespace App\Filament\Resources\Mesins\Tables;

use Filament\Tables\Table;
use Filament\Tables\Actions\ViewAction; 
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction; 
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Filters\SelectFilter; 

class MesinsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_mesin')
                    ->label('Nama Mesin')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('plant')
                    ->label('Plant')
                    ->badge() 
                    ->color('info')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //Filter Search per Plant
                SelectFilter::make('plant')
                    ->label('Cari per Plant')
                    ->options([
                        'A' => 'Plant A',
                        'B' => 'Plant B',
                        'C' => 'Plant C',
                        'D' => 'Plant D',
                        'E' => 'Plant E',
                    ])
                    ->searchable() // Dropdown filter bisa diketik
                    ->placeholder('Semua Plant'),
            ])
            ->actions([
                //Tampilan Lihat (Pop-up Modal)
                ViewAction::make()
                    ->modalWidth('md'), 

                // Tampilan Ubah (Pop-up Modal)
                EditAction::make()
                    ->modalWidth('md'),
                
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}