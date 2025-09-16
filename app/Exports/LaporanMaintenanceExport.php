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
        // $kuu = $this->$laporan->tanggal_lapor;
        // 1) Compose DateTime Lapor
        $laporDt = $this->joinDateTime(
            $laporan->tanggal_lapor ?? null,
            $laporan->jam_lapor ?? null
        );

        // 2) Compose DateTime Mulai Perbaikan & Selesai
        $mnt = $laporan->maintenance;

        $tanggalSelesai = optional($mnt)->tanggal_selesai;          // e.g. '2025-09-11'
        $waktuMulai     = optional($mnt)->waktu_perbaikan;          // e.g. '08:15:00'
        $waktuSelesai   = optional($mnt)->waktu_selesai;            // e.g. '11:00:00'

        // Asumsi tanggal mulai:
        // - kalau ada tanggal_selesai → pakai tanggal_selesai
        // - kalau tidak ada → fallback ke tanggal_lapor
        $tanggalMulai = $tanggalSelesai ?: ($laporan->tanggal_lapor ?? null);

        $mulaiDt   = $this->joinDateTime($tanggalMulai, $waktuMulai);
        $selesaiDt = $this->joinDateTime($tanggalSelesai, $waktuSelesai);

        // 3) Hitung durasi (dalam hh:mm), aman kalau null → '-' 
        $dtm = $this->diffHHMM($laporDt, $selesaiDt);   // Selesai - Lapor
        $dtp = $this->diffHHMM($mulaiDt, $selesaiDt);   // Selesai - Mulai

        // dd($kuu);

        return [
            $laporan->tanggal_lapor,
            $laporan->jam_lapor,
            $laporan->shift,
            $laporan->nama_pelapor,
            $laporan->plant,
            $laporan->nama_mesin,
            $laporan->uraian_kerusakan,
            optional($mnt)->jenis_perbaikan,
            optional($mnt)->sparepart,
            optional($mnt)->tanggal_selesai,
            optional($mnt)->waktu_perbaikan,
            optional($mnt)->waktu_selesai,
            1,
            $dtm,       // hh:mm
            $dtp,       // hh:mm
            optional($mnt)->nama_teknisi,
            optional($mnt)->status ?? 'Pending',
            $laporan->keterangan,
            optional($mnt)->keterangan_maintenance,
        ];
    }

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

    protected function diffHHMM(?Carbon $start, ?Carbon $end): string
    {
        if (!$start || !$end) {
            return '-';
        }

        $seconds = $end->unix() - $start->unix(); // bisa negatif
        $totalMinutes = (int) round($seconds / 60);

        $sign = $totalMinutes < 0 ? '-' : '';
        $m = abs($totalMinutes);
        $hours = intdiv($m, 60);
        $minutes = $m % 60;

        return sprintf('%s%02d:%02d', $sign, $hours, $minutes);
    }
}