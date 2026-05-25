<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Table Columns
    |--------------------------------------------------------------------------
    */

    'column.name' => 'Nama',
    'column.guard_name' => 'Jalur Akses (Guard)',
    'column.roles' => 'Peran',
    'column.permissions' => 'Izin',
    'column.updated_at' => 'Dirubah',

    /*
    |--------------------------------------------------------------------------
    | Form Fields
    |--------------------------------------------------------------------------
    */

    'field.name' => 'Nama',
    'field.guard_name' => 'Jalur Akses (Guard)',
    'field.permissions' => 'Izin',
    'field.select_all.name' => 'Pilih Semua',
    'field.select_all.message' => 'Aktifkan semua izin yang <span class="text-primary font-medium">Tersedia</span> untuk Peran ini.',

    /*
    |--------------------------------------------------------------------------
    | Navigation & Resource
    |--------------------------------------------------------------------------
    */

    'nav.group' => 'Pelindung',
    'nav.role.label' => 'Peran',
    'nav.role.icon' => 'heroicon-o-shield-check',
    'resource.label.role' => 'Peran',
    'resource.label.roles' => 'Peran',
    'resource.breadcrumb' => 'Peran',

    /*
    |--------------------------------------------------------------------------
    | Section & Tabs
    |--------------------------------------------------------------------------
    */

    'section' => 'Menu Utama / Entitas',
    'resources' => 'Manajemen Modul & Tabel',
    'widgets' => 'Komponen Grafik / Widget',
    'pages' => 'Halaman Dasbor',
    'custom' => 'Izin Kustom Khusus',

    /*
    |--------------------------------------------------------------------------
    | Messages
    |--------------------------------------------------------------------------
    */

    'forbidden' => 'Kamu tidak punya izin akses ke halaman ini',

    /*
    |--------------------------------------------------------------------------
    | Resource Permissions' Labels
    |--------------------------------------------------------------------------
    */

    'resource_permission_prefixes_labels' => [
        'view' => 'Lihat Detail',
        'view_any' => 'Lihat Tabel',
        'create' => 'Tambah Data',
        'update' => 'Ubah Data',
        'delete' => 'Hapus (Soft Delete)',
        'delete_any' => 'Hapus Massal',
        'force_delete' => 'Paksa Hapus (Permanen)',
        'force_delete_any' => 'Paksa Hapus Massal',
        'restore' => 'Pulihkan Data',
        'replicate' => 'Duplikat Data',
        'reorder' => 'Susun Urutan',
        'restore_any' => 'Pulihkan Semua',
    ],
    'pages.list' => 'Semua Data',
    'pages.index' => 'Semua Data',
];
