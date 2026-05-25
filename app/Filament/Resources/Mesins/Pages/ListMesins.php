<?php

namespace App\Filament\Resources\Mesins\Pages;

use App\Filament\Resources\Mesins\MesinResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMesins extends ListRecords
{
    protected static string $resource = MesinResource::class;

    protected static ?string $breadcrumb = 'Semua Data';

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}