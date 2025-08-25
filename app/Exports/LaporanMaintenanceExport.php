<?php

namespace App\Exports;

use App\Models\Produksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaporanMaintenanceExport implements FromCollection, WithHeadings, WithMapping
{
     protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         return Produksi::with('maintenance')
            ->whereBetween('tanggal_lapor', [$this->startDate, $this->endDate])
            ->get();
    }

    /**
     * Menentukan judul untuk setiap kolom di file Excel.
     */
    public function headings(): array
    {
        return [
            'ID Laporan',
            'Tanggal Lapor',
            'Jam Lapor',
            'Shift',
            'Nama Pelapor',
            'Plant',
            'Nama Mesin',
            'Uraian Kerusakan',
            'Keterangan Produksi',
            'Status Maintenance',
            'Tanggal Selesai',
            'Waktu Perbaikan',
            'Teknisi',
            'Uraian Perbaikan',
            'Sparepart',
        ];
    }

    /**
     * Memetakan data dari setiap laporan ke dalam kolom yang sesuai.
     *
     * @param Produksi $laporan
     */
    public function map($laporan): array
    {
        return [
            $laporan->id,
            $laporan->tanggal_lapor,
            $laporan->jam_lapor,
            $laporan->shift,
            $laporan->nama_pelapor,
            $laporan->plant,
            $laporan->nama_mesin,
            $laporan->uraian_kerusakan,
            $laporan->keterangan,
            optional($laporan->maintenance)->status ?? 'Pending',
            optional($laporan->maintenance)->tanggal_selesai,
            optional($laporan->maintenance)->waktu_perbaikan,
            optional($laporan->maintenance)->nama_teknisi,
            optional($laporan->maintenance)->jenis_perbaikan,
            optional($laporan->maintenance)->sparepart,
        ];
    }
}