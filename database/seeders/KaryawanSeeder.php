<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Karyawan;

class KaryawanSeeder extends Seeder
{
    public function run(): void
    {
        Karyawan::truncate();
        $data = [

            // Data untuk Plant Facility FH
            ['nik' => '1081', 'nama' => 'RIWANTO', 'plant' => 'FH', 'jabatan' => 'SUPERVISOR FACILITY'],
            ['nik' => '174', 'nama' => 'SARJANA', 'plant' => 'FH', 'jabatan' => 'FOREMAN KONSTRUKSI'],
            ['nik' => '420', 'nama' => 'SUDARTO', 'plant' => 'FH', 'jabatan' => 'FOREMAN UTILITY'],
            ['nik' => '979', 'nama' => 'WIHARJA PUTRA', 'plant' => 'FH', 'jabatan' => 'FOREMAN KONSTRUKSI'],

            // Data untuk Plant GA
            ['nik' => '2537', 'nama' => 'NOVIE ANZUFLES', 'plant' => 'GA', 'jabatan' => 'FOREMAN OFFICE SERVICE'],
            ['nik' => '2552', 'nama' => 'DIDIN SAEPUDIN', 'plant' => 'GA', 'jabatan' => 'KOMANDAN REGU SATPAM'],
            ['nik' => '2274', 'nama' => 'KUSWANTO', 'plant' => 'GA', 'jabatan' => 'KOMANDAN REGU SATPAM'],
            ['nik' => '2273', 'nama' => 'BUDIYONO', 'plant' => 'GA', 'jabatan' => 'KOMANDAN REGU SATPAM'],

            // Data untuk Plant A
            ['nik' => '1747', 'nama' => 'WINARNO', 'plant' => 'PLANT A', 'jabatan' => 'FOREMAN EXTRUDER & CABLING 4C, 7E, 125C (A)'],
            ['nik' => '2268', 'nama' => 'MANSUR', 'plant' => 'PLANT A', 'jabatan' => 'FOREMAN COILLING (A)'],
            ['nik' => '2974', 'nama' => 'ROFIUL HUSNA', 'plant' => 'PLANT A', 'jabatan' => 'SUPERVISOR AUTOWIRE (A)'],
            ['nik' => '244', 'nama' => 'UCI SANUSI', 'plant' => 'PLANT A', 'jabatan' => 'SUPERVISOR LV A (A)'],
            ['nik' => '2887', 'nama' => 'AGUS HENDRI YANTO GUMILAR', 'plant' => 'PLANT A', 'jabatan' => 'FOREMAN EXTRUDER & CABLING 4C, 7E, 125C (A)'],
            ['nik' => '2504', 'nama' => 'MULYO SRI WIDODO', 'plant' => 'PLANT A', 'jabatan' => 'SUPERVISOR LV A (A)'],
            ['nik' => '516', 'nama' => 'MUHTADI', 'plant' => 'PLANT A', 'jabatan' => 'FOREMAN DRAWING, BUNCHING, STRANDING (A)'],
            ['nik' => '2480', 'nama' => 'KARSIDI', 'plant' => 'PLANT A', 'jabatan' => 'FOREMAN EXTRUDER & CABLING 4C, 7E, 125C (A)'],
            ['nik' => '2471', 'nama' => 'SLAMET RIANTO', 'plant' => 'PLANT A', 'jabatan' => 'FOREMAN DRAWING, BUNCHING, STRANDING (A)'],
            ['nik' => '2723', 'nama' => 'RIKI FAUZI', 'plant' => 'PLANT A', 'jabatan' => 'FOREMAN COILLING (A)'],
            ['nik' => '2214', 'nama' => 'SURANTO', 'plant' => 'PLANT A', 'jabatan' => 'FOREMAN DRAWING, BUNCHING, STRANDING (A)'],
            ['nik' => '3446', 'nama' => 'NORMAN WILDAN SANI', 'plant' => 'PLANT A', 'jabatan' => 'SUPERVISOR LV A (A)'],
            ['nik' => '2494', 'nama' => 'SARBINI', 'plant' => 'PLANT A', 'jabatan' => 'FOREMAN COILLING (A)'],
            ['nik' => '902', 'nama' => 'SUSWANTO', 'plant' => 'PLANT A', 'jabatan' => 'FOREMAN AUTO WIRE.1 & AUTO WIRE.2(A)'],

            // Data untuk Plant B
            ['nik' => '2870', 'nama' => 'RUDY FEBRIANSYAH', 'plant' => 'PLANT B', 'jabatan' => 'FOREMAN REWENDING, DRAWING, STRANDING, ARMOUR (B)'],
            ['nik' => '749', 'nama' => 'SUYANTO', 'plant' => 'PLANT B', 'jabatan' => 'SUPERVISOR MV B (B)'],
            ['nik' => '671', 'nama' => 'AGUS SUWITO', 'plant' => 'PLANT B', 'jabatan' => 'FOREMAN REWENDING, DRAWING, STRANDING, ARMOUR (B)'],
            ['nik' => '610', 'nama' => 'SUKIRNO', 'plant' => 'PLANT B', 'jabatan' => 'FOREMAN STRANDING, ARMOUR, EXSTRUDER,CABLING (B)'],
            ['nik' => '561', 'nama' => 'SISWANTO', 'plant' => 'PLANT B', 'jabatan' => 'FOREMAN EXTRUDER, CABLING (B)'],
            ['nik' => '584', 'nama' => 'HERMAN MULYANA', 'plant' => 'PLANT B', 'jabatan' => 'SUPERVISOR MV B (B)'],
            ['nik' => '2639', 'nama' => 'JAJAT MUNAJAT', 'plant' => 'PLANT B', 'jabatan' => 'FOREMAN REWENDING, DRAWING, STRANDING, ARMOUR (B)'],
            ['nik' => '3496', 'nama' => 'ALBERTUS SIGIT ANDRIYANTO', 'plant' => 'PLANT B', 'jabatan' => 'SUPERVISOR MV B (B)'],
            ['nik' => '254', 'nama' => 'DEDO JUNAEDI', 'plant' => 'PLANT B', 'jabatan' => 'FOREMAN STANDING, ARMOUR, EXSTRUDER,CABLING (B)'],


            // Data untuk Plant C
            ['nik' => '1364', 'nama' => 'NUR HIDAYAT', 'plant' => 'PLANT C', 'jabatan' => 'SUPERVISOR LV C (C)'],
            ['nik' => '2115', 'nama' => 'KODIRUN', 'plant' => 'PLANT C', 'jabatan' => 'FOREMAN TINNING, BUNCHING, TAPPING 12A, CABLING 20A, EXTRUDER & TP 10 (C)'],
            ['nik' => '260', 'nama' => 'NURHADI', 'plant' => 'PLANT C', 'jabatan' => 'SUPERVISOR LV C (C)'],
            ['nik' => '2451', 'nama' => 'MARIYO', 'plant' => 'PLANT C', 'jabatan' => 'FOREMAN TINNING, BUNCHING, TAPPING 12A, CABLING 20A, EXTRUDER & TP 10 (C)'],
            ['nik' => '3502', 'nama' => 'YULIS SEPTARANGGA', 'plant' => 'PLANT C', 'jabatan' => 'SUPERVISOR LV C (C)'],
            ['nik' => '2117', 'nama' => 'SUTARMAN', 'plant' => 'PLANT C', 'jabatan' => 'FOREMAN DRAWING, TAPPING VERTICAL, EXTRUDER 65, TWISTIST, BRAIDING & CABLING (C)'],
            ['nik' => '2859', 'nama' => 'RIYANDONO', 'plant' => 'PLANT C', 'jabatan' => 'FOREMAN DRAWING, TAPPING VERTICAL, EXTRUDER 65, TWISTIST, BRAIDING & CABLING (C)'],
            ['nik' => '2767', 'nama' => 'SUGENG SUTRISNO', 'plant' => 'PLANT C', 'jabatan' => 'FOREMAN DRAWING, TAPPING VERTICAL, EXTRUDER 65, TWISTIST, BRAIDING & CABLING (C)'],


            // Data untuk Plant D
            ['nik' => '1439', 'nama' => 'KUNTADI', 'plant' => 'PLANT D', 'jabatan' => 'FOREMAN CCV LINE (D)'],
            ['nik' => '480', 'nama' => 'SUKITO', 'plant' => 'PLANT D', 'jabatan' => 'FOREMAN EXTRUDER (D)'],
            ['nik' => '3497', 'nama' => 'ANDREAS ANNDU PATTRA SUMINTO', 'plant' => 'PLANT D', 'jabatan' => 'SUPERVISOR MV D (D)'],
            ['nik' => '523', 'nama' => 'HATMOKO AJI', 'plant' => 'PLANT D', 'jabatan' => 'SUPERVISOR MV D (D)'],
            ['nik' => '2458', 'nama' => 'PURWANTO', 'plant' => 'PLANT D', 'jabatan' => 'FOREMAN CABLING & TAPING (D)'],
            ['nik' => '456', 'nama' => 'PURNOMO', 'plant' => 'PLANT D', 'jabatan' => 'FOREMAN EXTRUDER (D)'],
            ['nik' => '3114', 'nama' => 'ADITIYA OKTIFAN SAPUTRA', 'plant' => 'PLANT D', 'jabatan' => 'FOREMAN CABLING & TAPING (D)'],
            ['nik' => '1294', 'nama' => 'IWAN YUSWANTO', 'plant' => 'PLANT D', 'jabatan' => 'SUPERVISOR CCV LINE (D)'],
            ['nik' => '2502', 'nama' => 'ASEP ARIYAWAN', 'plant' => 'PLANT D', 'jabatan' => 'FOREMAN CCV LINE (D)'],
            ['nik' => '1300', 'nama' => 'PAIJONO', 'plant' => 'PLANT D', 'jabatan' => 'FOREMAN CCV LINE (D)'],
            ['nik' => '2533', 'nama' => 'DWI PRAYITNO', 'plant' => 'PLANT D', 'jabatan' => 'FOREMAN EXTRUDER (D)'],

            // Data untuk Plant E
            ['nik' => '1489', 'nama' => 'STEPHANUS YULIANTO', 'plant' => 'PLANT E', 'jabatan' => 'FOREMAN COLORING, TUBING, CB 4 s/d 7, EXT 30,50F & FIGTAILS (E)'],
            ['nik' => '459', 'nama' => 'MARWADI', 'plant' => 'PLANT E', 'jabatan' => 'FOREMAN COLORING, EXTRUDER, CABLING 8 & 9F, DC 1,2,3 F & PATHCORD (E)'],
            ['nik' => '562', 'nama' => 'SUKARDI', 'plant' => 'PLANT E', 'jabatan' => 'FOREMAN COLORING, EXTRUDER, CABLING 8 & 9F, DC 1,2,3 F & PATHCORD (E)'],
            ['nik' => '2121', 'nama' => 'SUYATMAN', 'plant' => 'PLANT E', 'jabatan' => 'FOREMAN COLORING, EXTRUDER, CABLING 8 & 9F, DC 1,2,3 F & PATHCORD (E)'],
            ['nik' => '628', 'nama' => 'ADE SUPRIATNA', 'plant' => 'PLANT E', 'jabatan' => 'FOREMAN ADMINISTRASI (E)'],
            ['nik' => '275', 'nama' => 'GITO DIATMIKO', 'plant' => 'PLANT E', 'jabatan' => 'SUPERVISOR FIBER OPTIK (E)'],
            ['nik' => '2120', 'nama' => 'DENI AKBAR', 'plant' => 'PLANT E', 'jabatan' => 'SUPERVISOR FIBER OPTIK (E)'],
            ['nik' => '1090', 'nama' => 'SUGIYONO', 'plant' => 'PLANT E', 'jabatan' => 'FOREMAN COLORING, TUBING, CB 4 s/d 7, EXT 30,50F & FIGTAILS (E)'],
            ['nik' => '1484', 'nama' => 'NOTES KARO KARO', 'plant' => 'PLANT E', 'jabatan' => 'FOREMAN COLORING, TUBING, CB 4 s/d 7, EXT 30,50F & FIGTAILS (E)'],


            // Data untuk Plant PE
            ['nik' => '2472', 'nama' => 'DANU MAMI LUKAT', 'plant' => 'PLANT PE', 'jabatan' => 'SUPERVISOR PE (PLANT PE)'],

            // Data untuk Plant PROCUREMENT SC
            ['nik' => '2678', 'nama' => 'SITI HODIJAH', 'plant' => 'PLANT SC', 'jabatan' => 'SUPERVISOR LOCAL PURCHASING (PLANT SC)'],
            ['nik' => '813', 'nama' => 'SUWANTO', 'plant' => 'PLANT SC', 'jabatan' => 'SUPERVISOR PLANNING INVENTORY (PLANT SC)'],
            ['nik' => '1011', 'nama' => 'ANWAR SANUSI', 'plant' => 'PLANT SC', 'jabatan' => 'FOREMAN INVENTORY (PLANT SC)'],
            ['nik' => '1662', 'nama' => 'SUPARYANTO', 'plant' => 'PLANT SC', 'jabatan' => 'FOREMAN INVENTORY (PLANT SC)'],

            // Data untuk Plant SS (SALES SUPPORT)
            ['nik' => '735', 'nama' => 'RUBANDI', 'plant' => 'PLANT SS', 'jabatan' => 'FOREMAN PENGIRIMAN & PENERIMAAN (PLANT SALES SUPPORT)'],
            ['nik' => '2621', 'nama' => 'AHMAD DEDE NOPIARDI', 'plant' => 'PLANT SS', 'jabatan' => 'FOREMAN PENGIRIMAN & PENERIMAAN (PLANT SALES SUPPORT)'],
            ['nik' => '1549', 'nama' => 'SARISNO', 'plant' => 'PLANT SS', 'jabatan' => 'SUPERVISOR GUDANG JADI (PLANT SALES SUPPORT)'],
            ['nik' => '2100', 'nama' => 'HARIYANTA', 'plant' => 'PLANT SS', 'jabatan' => 'FOREMAN PENGIRIMAN & PENERIMAAN (PLANT SALES SUPPORT)'],
            ['nik' => '3188', 'nama' => 'ISKANDAR ZULKARNAIN', 'plant' => 'PLANT SS', 'jabatan' => 'SUPERVISOR GUDANG JADI (PLANT SALES SUPPORT)'],
            ['nik' => '1472', 'nama' => 'SUWELO', 'plant' => 'PLANT SS', 'jabatan' => 'FOREMAN PENGIRIMAN & PENERIMAAN (PLANT SALES SUPPORT)'],
            
        ];

        foreach ($data as $item) {
            Karyawan::create($item);
        }
    }
}