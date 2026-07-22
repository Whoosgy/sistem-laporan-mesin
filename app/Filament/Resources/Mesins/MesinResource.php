<?php

namespace App\Filament\Resources\Mesins;

use App\Filament\Resources\Mesins\Pages; 
use App\Filament\Resources\Mesins\Schemas\MesinForm;
use App\Filament\Resources\Mesins\Schemas\MesinInfolist;
use App\Filament\Resources\Mesins\Tables\MesinsTable;
use App\Models\Mesin;
use App\Filament\Imports\MachineImporter; 
use Filament\Resources\Resource;
use Filament\Forms\Form; 
use Filament\Infolists\Infolist; 
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Actions\ImportAction; 

class MesinResource extends Resource
{
    protected static ?string $model = Mesin::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Master Data';
    protected static ?string $modelLabel = 'Mesin';
    protected static ?string $pluralModelLabel = 'Mesin';

    public static function form(Form $form): Form
    {
        return MesinForm::configure($form);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return MesinInfolist::configure($infolist);
    }

    public static function table(Table $table): Table
    {
    
        return MesinsTable::configure($table)
            ->filters([
            ])
            ->headerActions([
                // Tombol Impor Data Excel 
                ImportAction::make()
                    ->importer(MachineImporter::class)
                    ->label('Impor Mesin')
                    ->icon('heroicon-o-arrow-up-tray')
                    ->color('success'),
                    
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Mesin'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    } 
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMesins::route('/'),
            // 'create' => Pages\CreateMesin::route('/create'), // Matikan
            // 'view' => Pages\ViewMesin::route('/{record}'),    // Matikan
            // 'edit' => Pages\EditMesin::route('/{record}/edit'), // Matikan
        ];
    }
}