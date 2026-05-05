<?php

namespace App\Filament\Resources\MaintenanceResource\Pages;

use App\Filament\Resources\MaintenanceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Widgets\PlantMaintenanceChart;

class ListMaintenances extends ListRecords
{
    protected static string $resource = MaintenanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->slideOver(),
        ];
    }

    // Fungsi untuk mendaftarkan widget ke halaman
    protected function getHeaderWidgets(): array
    {
       return [
        MaintenanceResource\Widgets\MaintenanceStats::class,
    ];
}

    protected function getListeners(): array
{
    return [
        'refreshWidgets' => '$refresh',
    ];
}

    public function getHeaderWidgetsColumns(): int | array
    {
        return 1; // Chart akan mengambil lebar penuh (full width)
    }
}