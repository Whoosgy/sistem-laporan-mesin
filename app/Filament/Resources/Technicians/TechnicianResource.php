<?php

namespace App\Filament\Resources\Technicians;

use App\Filament\Resources\Technicians\Pages\CreateTechnician;
use App\Filament\Resources\Technicians\Pages\EditTechnician;
use App\Filament\Resources\Technicians\Pages\ListTechnicians;
use App\Filament\Resources\Technicians\Pages\ViewTechnician;
use App\Filament\Resources\Technicians\Schemas\TechnicianForm;
use App\Filament\Resources\Technicians\Schemas\TechnicianInfolist;
use App\Filament\Resources\Technicians\Tables\TechniciansTable;
use App\Models\Technician;
use Filament\Resources\Resource;
use Filament\Forms\Form; 
use Filament\Infolists\Infolist; 
use Filament\Tables\Table;

class TechnicianResource extends Resource
{
    protected static ?string $model = Technician::class;

    protected static ?string $slug = 'teknisi';

    protected static ?string $modelLabel = 'Teknisi';
    protected static ?string $pluralModelLabel = 'Teknisi';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $recordTitleAttribute = 'nama_teknisi';

    // Perbaikan: Parameter menggunakan Form $form
    public static function form(Form $form): Form
    {
        return TechnicianForm::configure($form);
    }

    // Perbaikan: Parameter menggunakan Infolist $infolist
    public static function infolist(Infolist $infolist): Infolist
    {
        return TechnicianInfolist::configure($infolist);
    }

    public static function table(Table $table): Table
    {
        return TechniciansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    // app/Filament/Resources/Technicians/TechnicianResource.php

public static function getPages(): array
{
    return [
        'index' => ListTechnicians::route('/'),
        // Matikan route di bawah ini agar Filament otomatis menggunakan Pop-up
        // 'create' => CreateTechnician::route('/create'),
        // 'view' => ViewTechnician::route('/detail-teknisi/{record}'),
        // 'edit' => EditTechnician::route('/edit-teknisi/{record}'),
    ];
}
}