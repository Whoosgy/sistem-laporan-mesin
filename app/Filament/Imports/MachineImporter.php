<?php

namespace App\Filament\Imports;

use App\Models\Mesin; 
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class MachineImporter extends Importer
{
    protected static ?string $model = Mesin::class;

    public static function getColumns(): array
    {
        return [
            // Kolom ini harus sesuai dengan header di file Excel kamu
            ImportColumn::make('nama_mesin')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            
            ImportColumn::make('plant')
                ->requiredMapping()
                ->rules(['required']),
        ];
    }

    public function resolveRecord(): ?Mesin
    {
        // Mencari data mesin berdasarkan nama untuk menghindari duplikasi
        // Jika nama_mesin sudah ada, sistem akan mengupdate data lama.
        // Jika belum ada, sistem akan membuat data baru.
        return Mesin::firstOrNew([
            'nama_mesin' => $this->data['nama_mesin'],
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Impor data mesin telah selesai dan ' . number_format($import->successful_rows) . ' baris berhasil diimpor.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' baris gagal diimpor.';
        }

        return $body;
    }
}