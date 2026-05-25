<?php

namespace App\Filament\Resources\MaintenanceResource\Pages;

use App\Filament\Resources\MaintenanceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms\Components\DatePicker;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanMaintenanceExport; 

class ListMaintenances extends ListRecords
{
    protected static string $resource = MaintenanceResource::class;

    // PERBAIKAN: Ditambahkan kata 'static' agar tidak error lagi
    protected static ?string $breadcrumb = 'Semua Data';

    protected function getHeaderWidgets(): array
    {
        return [
            MaintenanceResource\Widgets\MaintenanceStats::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            // TOMBOL EKSPOR EXCEL
            Actions\Action::make('export_excel')
                ->label('Ekspor Excel')
                ->icon('heroicon-o-document-arrow-down')
                ->color('success')
                ->modalHeading('Ekspor Data Laporan Maintenance')
                ->modalSubmitActionLabel('Ekspor')
                ->form([
                    DatePicker::make('start_date')
                        ->label('Dari Tanggal')
                        ->required()
                        ->default(now()->startOfMonth()),
                        
                    DatePicker::make('end_date')
                        ->label('Sampai Tanggal')
                        ->required()
                        ->default(now()),
                ])
                ->action(function (array $data) {
                    $startDate = $data['start_date'];
                    $endDate = $data['end_date'];
                    
                    // Format nama file
                    $fileName = "Laporan_Maintenance_{$startDate}_sampai_{$endDate}.xlsx";

                    // Mengeksekusi class export 
                    return Excel::download(
                        new LaporanMaintenanceExport($startDate, $endDate),
                        $fileName
                    );
                }),
        ];
    }
}