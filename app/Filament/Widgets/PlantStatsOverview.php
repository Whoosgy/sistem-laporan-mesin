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
            Stat::make('', $data['mekanik'] ?? 0)
                ->label(new HtmlString(
                    '<span style="display:flex;align-items:center;gap:6px;">'
                    . '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width:15px;height:15px;color:#185FA5;"><path fill-rule="evenodd" d="M12 6.75a5.25 5.25 0 0 1 6.775-5.025.75.75 0 0 1 .313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.641l3.318-3.319a.75.75 0 0 1 1.248.313 5.25 5.25 0 0 1-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 1 1 2.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0 1 12 6.75Z" clip-rule="evenodd"/></svg>'
                    . '<span>Mechanic</span>'
                    . '</span>'
                ))
                ->color('info')
                ->chart([7, 2, 10, 3, 15, 4, 18])
                ->extraAttributes(['class' => 'ring-1 ring-blue-100 dark:ring-blue-900 shadow-sm']),

            Stat::make('', $data['elektrik'] ?? 0)
                ->label(new HtmlString(
                    '<span style="display:flex;align-items:center;gap:6px;">'
                    . '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width:15px;height:15px;color:#A32D2D;"><path fill-rule="evenodd" d="M14.615 1.595a.75.75 0 0 1 .359.852L12.982 9.75h7.268a.75.75 0 0 1 .548 1.262l-10.5 11.25a.75.75 0 0 1-1.272-.71l1.992-7.302H3.818a.75.75 0 0 1-.548-1.262l10.5-11.25a.75.75 0 0 1 .845-.143Z" clip-rule="evenodd"/></svg>'
                    . '<span>Electric</span>'
                    . '</span>'
                ))
                ->color('danger')
                ->chart([2, 5, 4, 8, 12, 10, 15])
                ->extraAttributes(['class' => 'ring-1 ring-red-100 dark:ring-red-900 shadow-sm']),

            Stat::make('', $data['utility'] ?? 0)
                ->label(new HtmlString(
                    '<span style="display:flex;align-items:center;gap:6px;">'
                    . '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width:15px;height:15px;color:#854F0B;"><path fill-rule="evenodd" d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 0 0-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 0 0-2.282.819l-.922 1.597a1.875 1.875 0 0 0 .432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 0 0 0 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 0 0-.432 2.385l.922 1.597a1.875 1.875 0 0 0 2.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 0 0 2.28-.819l.923-1.597a1.875 1.875 0 0 0-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 0 0 0-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 0 0-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 0 0-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 0 0-1.85-1.567h-1.843ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" clip-rule="evenodd"/></svg>'
                    . '<span>Utility</span>'
                    . '</span>'
                ))
                ->color('warning')
                ->chart([15, 10, 12, 8, 5, 2, 1])
                ->extraAttributes(['class' => 'ring-1 ring-yellow-100 dark:ring-yellow-900 shadow-sm']),

            Stat::make('', $data['calibraty'] ?? 0)
                ->label(new HtmlString(
                    '<span style="display:flex;align-items:center;gap:6px;">'
                    . '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width:15px;height:15px;color:#3B6D11;"><path fill-rule="evenodd" d="M12 2.25a.75.75 0 0 1 .75.75v.756a49.106 49.106 0 0 1 9.152 1 .75.75 0 0 1-.152 1.485h-1.918l2.474 10.124a.75.75 0 0 1-.375.84A6.723 6.723 0 0 1 18.75 18a6.723 6.723 0 0 1-3.181-.795.75.75 0 0 1-.375-.84l2.474-10.124H12.75v13.28c1.293.076 2.534.343 3.697.776a.75.75 0 0 1-.262 1.453h-8.37a.75.75 0 0 1-.262-1.453c1.162-.433 2.404-.7 3.697-.775V6.24H8.332l2.474 10.124a.75.75 0 0 1-.375.84A6.723 6.723 0 0 1 7.25 18a6.723 6.723 0 0 1-3.181-.795.75.75 0 0 1-.375-.84L6.168 6.241H4.25a.75.75 0 0 1-.152-1.485 49.105 49.105 0 0 1 9.152-1V3a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/></svg>'
                    . '<span>Calibraty</span>'
                    . '</span>'
                ))
                ->color('success')
                ->chart([1, 2, 1, 3, 2, 5, 4])
                ->extraAttributes(['class' => 'ring-1 ring-green-100 dark:ring-green-900 shadow-sm']),
        ];
    }

    protected function getColumns(): int
    {
        return 4;
    }
}