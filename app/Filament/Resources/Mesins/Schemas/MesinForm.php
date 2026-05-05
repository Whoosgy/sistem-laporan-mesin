<?php

namespace App\Filament\Resources\Mesins\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;

class MesinForm
{
    public static function configure(Form $form): Form
    {
        return $form
            ->components([
                TextInput::make('nama_mesin')
                    ->required(),
                TextInput::make('plant')
                    ->required(),
            ]);
    }
}
