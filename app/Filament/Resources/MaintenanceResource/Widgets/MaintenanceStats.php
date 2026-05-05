<?php

namespace App\Filament\Resources\MaintenanceResource\Widgets;

use App\Models\Maintenance;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MaintenanceStats extends BaseWidget
{
    protected static ?string $pollingInterval = '5s'; 

    protected function getStats(): array
{
    // List kategori yang ingin dihitung
    $categories = [
            'Mekanik'   => ['label' => 'Mechanic', 'color' => 'primary'],
            'Elektrik'  => ['label' => 'Electric', 'color' => 'warning'],
            'Utility'   => ['label' => 'Utility', 'color' => 'success'],
            'Calibraty' => ['label' => 'Calibraty', 'color' => 'info'],
        ];

    $stats = [];

    foreach ($categories as $dbValue => $config) {
        // Query yang sinkron: 
        // Hitung maintenance yang kategori di produksinya adalah $dbValue
        $count = Maintenance::query()
            ->whereHas('produksi', function ($query) use ($dbValue) {
                $query->where('keterangan', $dbValue);
            })->count();

        $stats[] = Stat::make($config['label'], $count)
                ->color($config['color']);
        }

    return $stats;
}
}