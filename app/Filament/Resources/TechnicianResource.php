<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TechnicianResource\Pages;
use App\Filament\Resources\TechnicianResource\RelationManagers;
use App\Models\Technician;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TechnicianResource extends Resource
{
    protected static ?string $model = Technician::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            \Filament\Forms\Components\Section::make()->schema([
                \Filament\Forms\Components\TextInput::make('name')
                    ->label('Nama Teknisi')
                    ->required()
                    ->unique(ignoreRecord: true)
            ])
        ]);
}

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            \Filament\Tables\Columns\TextColumn::make('name')
                ->label('Nama Teknisi')
                ->searchable() // Bisa dicari
                ->sortable(),  // Bisa diurutkan A-Z
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
            'index' => Pages\ListTechnicians::route('/'),
            'create' => Pages\CreateTechnician::route('/create'),
            'edit' => Pages\EditTechnician::route('/{record}/edit'),
        ];
    }
}
