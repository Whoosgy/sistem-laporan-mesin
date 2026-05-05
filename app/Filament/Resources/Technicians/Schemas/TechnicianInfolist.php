<?php

namespace App\Filament\Resources\Technicians\Schemas;

use Filament\Infolists\Infolist; 
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;

class TechnicianInfolist
{
    
    public static function configure(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([ 
                Section::make('Detail Teknisi')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Nama Teknisi'),
                        TextEntry::make('created_at')
                            ->label('Dibuat Pada')
                            ->dateTime('d F Y H:i') 
                            ->timezone('Asia/Jakarta'),
                        TextEntry::make('updated_at')
                            ->label('Diperbarui Pada')
                            ->dateTime('d F Y H:i')
                            ->timezone('Asia/Jakarta')
                            ->placeholder('-'),
                    ])->columns(2),
            ]);
    }
}