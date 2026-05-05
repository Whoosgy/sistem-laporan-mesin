<?php

namespace App\Filament\Widgets;

use App\Models\Maintenance;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\HtmlString;

class PlantStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Mengambil data dari kolom 'keterangan' pada tabel produksi
        $data = Maintenance::join('produksi', 'maintenance.produksi_id', '=', 'produksi.id')
            ->select(DB::raw('LOWER(produksi.keterangan) as kategori'), DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->pluck('total', 'kategori')
            ->toArray();

        return [
            Stat::make(new HtmlString('<span class="font-bold">Mechanic</span>'), $data['mekanik'] ?? 0)
                ->descriptionIcon('heroicon-m-wrench-screwdriver')
                ->color('primary'),

            Stat::make(new HtmlString('<span class="font-bold">Electric</span>'), $data['elektrik'] ?? 0)
                ->descriptionIcon('heroicon-m-bolt')
                ->color('danger'),

            Stat::make(new HtmlString('<span class="font-bold">Utility</span>'), $data['utility'] ?? 0)
                ->descriptionIcon('heroicon-m-cog-6-tooth')
                ->color('warning'),

            Stat::make(new HtmlString('<span class="font-bold">Calibraty</span>'), $data['calibraty'] ?? 0)
                ->descriptionIcon('heroicon-m-scale')
                ->color('success'),
        ];
    }

    protected function getColumns(): int
    {
        return 4;
    }
}