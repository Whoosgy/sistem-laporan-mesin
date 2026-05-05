<?php

namespace App\Filament\Resources\Mesins\Schemas;

use Filament\Infolists\Infolist; // Import Infolist
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;

class MesinInfolist
{
    // Ubah Schema menjadi Infolist
    public static function configure(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Informasi Mesin')
                    ->schema([
                        TextEntry::make('nama_mesin')
                            ->label('Nama Mesin'),
                        TextEntry::make('plant')
                            ->label('Lokasi Plant'),
                        TextEntry::make('created_at')
                            ->label('Daftar Pada')
                            ->dateTime(),
                    ])->columns(2),
            ]);
    }
}