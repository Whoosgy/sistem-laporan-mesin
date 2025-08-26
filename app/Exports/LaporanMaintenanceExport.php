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
    // protected $breakdown;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        // $this->breakdown = '1';
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
            'Tanggal Lapor',
            'Jam Lapor',
            'Shift',
            'Nama Pelapor',
            'Plant',
            'Nama Mesin',
            'Uraian Kerusakan',
            'Uraian Perbaikan',
            'Sparepart',
            'Tanggal Selesai',
            'Waktu Mulai Perbaikan',
            'Waktu Selesai Perbaikan',
            'Breakdown',
            'Downtime Mesin',
            'Downtime Perbaikan',
            'Teknisi',
            'Status Maintenance',
            'Keterangan Produksi',
            'Keterangan Maintenance',

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
            $laporan->tanggal_lapor,
            $laporan->jam_lapor,
            $laporan->shift,
            $laporan->nama_pelapor,
            $laporan->plant,
            $laporan->nama_mesin,
            $laporan->uraian_kerusakan,
            optional($laporan->maintenance)->jenis_perbaikan,
            optional($laporan->maintenance)->sparepart,
            optional($laporan->maintenance)->tanggal_selesai,
            optional($laporan->maintenance)->waktu_perbaikan,
            optional($laporan->maintenance)->waktu_selesai,
            $laporan->breakdown ? 'Ya' : '1',
            $laporan->downtime_mesin ? 'Ya' : 'demo',
            $laporan->downtime_perbaikan ? 'Ya' : 'demo',
            optional($laporan->maintenance)->nama_teknisi,
            optional($laporan->maintenance)->status ?? 'Pending',
            $laporan->keterangan,
            optional($laporan->maintenance)->keterangan_maintenance,
            

            


        ];
    }
}
