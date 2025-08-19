# Update Dashboard Maintenance - Card ke Grafik

## Perubahan yang Dilakukan

### 1. Penambahan Chart.js
- Menambahkan Chart.js CDN ke layout utama (`resources/views/layouts/app.blade.php`)
- Library Chart.js digunakan untuk membuat grafik interaktif

### 2. Penggantian Card Status
**Sebelum:**
- 3 card sederhana menampilkan jumlah Pending, Dalam Proses, dan Selesai
- Tampilan statis dengan angka saja

**Sesudah:**
- **Donut Chart**: Menampilkan distribusi status dengan persentase
- **Bar Chart**: Perbandingan visual antar status
- **Line Chart**: Trend laporan bulanan (6 bulan terakhir)
- **Horizontal Bar Chart**: Data laporan per plant
- **Card Ringkasan**: Card dengan gradient dan ikon yang lebih menarik

### 3. Fitur Baru yang Ditambahkan

#### A. Grafik Interaktif
- **Donut Chart**: Menampilkan persentase distribusi status
- **Bar Chart**: Perbandingan jumlah antar status
- **Line Chart**: Trend laporan dari 6 bulan terakhir
- **Horizontal Bar Chart**: Distribusi laporan berdasarkan plant

#### B. Search dan Filter
- Search box dengan live search
- Total counter laporan
- Pagination yang lebih baik

#### C. UI/UX Improvements
- Loading indicators untuk grafik
- Refresh button dengan timestamp
- Error handling untuk grafik
- Responsive design untuk semua ukuran layar

### 4. Data yang Ditambahkan

#### A. Trend Bulanan
```php
// Data untuk grafik trend bulanan (6 bulan terakhir)
$monthlyData = [];
for ($i = 5; $i >= 0; $i--) {
    $date = now()->subMonths($i);
    $monthName = $date->format('M Y');
    $count = Produksi::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count();
    $monthlyData[] = [
        'month' => $monthName,
        'count' => $count
    ];
}
```

#### B. Data Plant
```php
// Data berdasarkan plant
$plantData = Produksi::selectRaw('plant, COUNT(*) as total')
                    ->groupBy('plant')
                    ->orderBy('total', 'desc')
                    ->get();
```

### 5. File yang Dimodifikasi

1. **`resources/views/layouts/app.blade.php`**
   - Menambahkan Chart.js CDN

2. **`resources/views/livewire/maintenance-dashboard.blade.php`**
   - Mengganti card dengan grafik
   - Menambahkan search box
   - Menambahkan loading indicators
   - Menambahkan script JavaScript untuk grafik

3. **`app/Livewire/MaintenanceDashboard.php`**
   - Menambahkan data trend bulanan
   - Menambahkan data berdasarkan plant

### 6. Fitur Grafik

#### A. Donut Chart
- Menampilkan distribusi status dengan persentase
- Tooltip dengan detail jumlah dan persentase
- Warna yang konsisten (Amber, Sky, Emerald)

#### B. Bar Chart
- Perbandingan visual antar status
- Border radius untuk tampilan modern
- Tooltip dengan informasi detail

#### C. Line Chart (Trend)
- Menampilkan trend 6 bulan terakhir
- Area fill dengan transparansi
- Smooth curve dengan tension

#### D. Horizontal Bar Chart (Plant)
- Distribusi laporan per plant
- Warna yang berbeda untuk setiap plant
- Horizontal layout untuk readability

### 7. Responsive Design
- Grafik responsive untuk semua ukuran layar
- Grid layout yang adaptif
- Mobile-friendly interface

### 8. Error Handling
- Try-catch untuk pembuatan grafik
- Console warnings untuk debugging
- Graceful fallback jika grafik gagal dimuat

### 9. Performance
- Chart destruction sebelum pembuatan baru
- Lazy loading untuk grafik
- Optimized data queries

## Cara Menggunakan

1. Akses dashboard maintenance di `/maintenance`
2. Grafik akan otomatis dimuat dengan data real-time
3. Gunakan search box untuk mencari laporan spesifik
4. Klik refresh button untuk update data terbaru
5. Hover pada grafik untuk melihat detail informasi

## Keuntungan

1. **Visualisasi Data**: Data lebih mudah dipahami dengan grafik
2. **Interaktivitas**: User dapat berinteraksi dengan grafik
3. **Insight**: Trend dan pattern data lebih terlihat jelas
4. **Modern UI**: Tampilan yang lebih modern dan profesional
5. **Real-time**: Data update secara real-time
6. **Responsive**: Bekerja dengan baik di semua device
