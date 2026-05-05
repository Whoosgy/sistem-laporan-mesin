<?php

namespace App\Filament\Resources\Technicians\Schemas;

use Filament\Forms\Form; 
use Filament\Forms\Components\TextInput;

class TechnicianForm
{
    public static function configure(Form $form): Form
    {
        return $form
            ->schema([ 
                TextInput::make('name')
                    ->label('Nama Teknisi')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}