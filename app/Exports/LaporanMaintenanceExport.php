<?php

namespace App\Exports;

use App\Models\Produksi;
use Carbon\Carbon;
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
        $this->endDate   = $endDate;
    }

    public function collection()
    {
        return Produksi::with('maintenance')
            ->whereBetween('tanggal_lapor', [$this->startDate, $this->endDate])
            ->get();
    }

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
            'Breakdown (hh:mm)',
            'Downtime Mesin (hh:mm)',
            'Downtime Perbaikan (hh:mm)',
            'Teknisi',
            'Status Maintenance',
            'Keterangan Produksi',
            'Keterangan Maintenance',
        ];
    }

    public function map($laporan): array
    {
        // 1) Compose DateTime Lapor
        $laporDt = $this->joinDateTime(
            $laporan->tanggal_lapor ?? null,
            $laporan->jam_lapor ?? null
        );

        // 2) Compose DateTime Mulai Perbaikan & Selesai
        $mnt = $laporan->maintenance;

        $tanggalSelesai = optional($mnt)->tanggal_selesai;       // e.g. '2025-09-11'
        $waktuMulai     = optional($mnt)->waktu_perbaikan;       // e.g. '08:15:00'
        $waktuSelesai   = optional($mnt)->waktu_selesai;         // e.g. '11:00:00'

        // Asumsi tanggal mulai:
        // - kalau ada tanggal_selesai → pakai tanggal_selesai
        // - kalau tidak ada → fallback ke tanggal_lapor
        $tanggalMulai = $tanggalSelesai ?: ($laporan->tanggal_lapor ?? null);

        $mulaiDt   = $this->joinDateTime($tanggalMulai, $waktuMulai);
        $selesaiDt = $this->joinDateTime($tanggalSelesai, $waktuSelesai);

        // 3) Hitung durasi (dalam hh:mm), aman kalau null → '-' 
        $dtm = $this->diffHH($laporDt, $selesaiDt);   // Selesai - Lapor
        $dtp = $this->diffHH($mulaiDt, $selesaiDt);   // Selesai - Mulai

        // Ambil waktu HH:MM untuk Jam Lapor dan Waktu Selesai Perbaikan
        $jamLaporHHMM = $laporan->jam_lapor ? substr($laporan->jam_lapor, 0, 5) : null;
        $waktuSelesaiHHMM = $waktuSelesai ? substr($waktuSelesai, 0, 5) : null;
        $waktuMulaiHHMM = $waktuMulai ? substr($waktuMulai, 0, 5) : null;

        return [
            $laporan->tanggal_lapor,
            $jamLaporHHMM, // Menggunakan Jam Lapor (HH:MM) yang sudah diformat
            $laporan->shift,
            $laporan->nama_pelapor,
            $laporan->plant,
            $laporan->nama_mesin,
            $laporan->uraian_kerusakan,
            optional($mnt)->jenis_perbaikan,
            optional($mnt)->sparepart,
            optional($mnt)->tanggal_selesai,
            $waktuMulaiHHMM, // Menggunakan Waktu Mulai (HH:MM) yang sudah diformat
            $waktuSelesaiHHMM, // Menggunakan Waktu Selesai (HH:MM) yang sudah diformat
            1,
            $dtm,       // hh:mm
            $dtp,       // hh:mm
            optional($mnt)->nama_teknisi,
            optional($mnt)->status ?? 'Pending',
            $laporan->keterangan,
            optional($mnt)->keterangan_maintenance,
        ];
    }

    // ... (metode joinDateTime dan diffHHMM tetap sama)
    protected function joinDateTime(?string $date, ?string $time, string $tz = 'Asia/Jakarta'): ?Carbon
    {
        if (empty($date) || empty($time)) {
            return null;
        }
        // Normalisasi waktu (boleh 'H:i' atau 'H:i:s')
        if (preg_match('/^\d{2}:\d{2}$/', $time)) {
            $time .= ':00';
        }
        try {
            return Carbon::parse("$date $time", $tz);
        } catch (\Throwable $e) {
            return null;
        }
    }
    protected function diffHH(?Carbon $start, ?Carbon $end): string
    {
        if (!$start || !$end) {
            return '-';
        }

        $seconds = $end->unix() - $start->unix();
        
        // Hitung total jam dengan pembagian floating point
        // total jam = total detik / 3600 (detik dalam 1 jam)
        $totalHours = $seconds / 3600;

        // Format output menjadi string desimal dengan dua angka di belakang koma (misalnya, 2.50)
        // Tanda positif/negatif sudah otomatis terinclude karena $totalHours bisa negatif
        return number_format($totalHours, 2, '.', '');
    }
    // protected function diffHHMM(?Carbon $start, ?Carbon $end): string
    // {
    //     if (!$start || !$end) {
    //         return '-';
    //     }

    //     $seconds = $end->unix() - $start->unix(); // bisa negatif
    //     $totalMinutes = (int) round($seconds / 60);

    //     $sign = $totalMinutes < 0 ? '-' : '';
    //     $m = abs($totalMinutes);
    //     $hours = intdiv($m, 60);
    //     $minutes = $m % 60;

    //     return sprintf('%s%02d:%02d', $sign, $hours, $minutes);
    // }
}