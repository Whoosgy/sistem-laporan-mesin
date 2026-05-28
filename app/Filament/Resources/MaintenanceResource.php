<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MaintenanceResource\Pages;
use App\Models\Maintenance;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Tables\Enums\FiltersLayout;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class MaintenanceResource extends Resource
{
    protected static ?string $model = Maintenance::class;
    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $navigationGroup = 'Manajemen Laporan';
    protected static ?string $modelLabel = 'Laporan Maintenance';
    protected static ?string $pluralModelLabel = 'Maintenance';
    protected static ?string $navigationBadgeTooltip = 'Total laporan aktif';

    // Badge jumlah di sidebar navigasi (hanya tiket non-Selesai)
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::whereNotIn('status', ['Selesai'])->count() ?: null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function getWidgets(): array
    {
        return [
            MaintenanceResource\Widgets\MaintenanceStats::class,
        ];
    }
    public static function canCreate(): bool
    {
        return false; 
    }

    public static function canEdit(Model $record): bool
    {
        return false; 
    }

    public static function canDelete(Model $record): bool
    {
        return false; 
    }
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Update Status Laporan')
                    ->icon('heroicon-o-clipboard-document-list')
                    ->iconColor('primary')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('produksi_id')
                                    ->label('Kode Tiket Kerusakan')
                                    ->relationship('produksi', 'id')
                                    ->getOptionLabelFromRecordUsing(fn($record) => "WO-{$record->id} | {$record->nama_mesin} ({$record->plant})")
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->prefixIcon('heroicon-o-ticket'),

                                Forms\Components\Select::make('status')
                                    ->options([
                                        'Pending' => 'Pending',
                                        'On Progress' => 'On Progress',
                                        'Belum Selesai' => 'Belum Selesai',
                                        'Selesai' => 'Selesai',
                                    ])
                                    ->native(false)
                                    ->required()
                                    ->prefixIcon('heroicon-o-arrow-path'),

                                Forms\Components\DatePicker::make('tanggal_selesai')
                                    ->label('Tanggal Selesai')
                                    ->default(now())
                                    ->prefixIcon('heroicon-o-calendar-days')
                                    ->displayFormat('d M Y'),

                                Forms\Components\TimePicker::make('waktu_perbaikan')
                                    ->label('Waktu Mulai Perbaikan')
                                    ->required()
                                    ->prefixIcon('heroicon-o-play-circle'),

                                Forms\Components\TimePicker::make('waktu_selesai')
                                    ->label('Waktu Selesai Perbaikan')
                                    ->required()
                                    ->prefixIcon('heroicon-o-stop-circle'),

                                Forms\Components\Select::make('technicians')
                                    ->label('Nama Teknisi (Maks. 5)')
                                    ->multiple()
                                    ->relationship('technicians', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->maxItems(5)
                                    ->columnSpanFull()
                                    ->required()
                                    ->prefixIcon('heroicon-o-users')
                                    ->helperText('maks. 5 orang.'),
                            ]),
                    ])
                    ->collapsible(),

                Forms\Components\Section::make('Keterangan Laporan')
                    ->icon('heroicon-o-wrench')
                    ->iconColor('warning')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('keterangan')
                                    ->label('Keterangan Produksi')
                                    ->options([
                                        'Elektrik' => 'Elektrik',
                                        'Mekanik' => 'Mekanik',
                                        'Utility' => 'Utility',
                                        'Calibraty' => 'Calibraty',
                                    ])
                                    ->formatStateUsing(function ($state, $record) {
                                        return $state ?? $record?->produksi?->keterangan;
                                    })
                                    ->required()
                                    ->prefixIcon('heroicon-o-tag')
                                    ->native(false)
                                    ->columnSpanFull(),

                                Forms\Components\Select::make('keterangan_maintenance')
                                    ->label('Keterangan Maintenance')
                                    ->options([
                                        'TE' => 'TE',
                                        'TM' => 'TM',
                                        'TU' => 'TU',
                                        'LM' => 'LM',
                                        'LE' => 'LE',
                                        'LU' => 'LU',
                                    ])
                                    ->prefixIcon('heroicon-o-list-bullet')
                                    ->native(false)
                                    ->columnSpanFull(),

                                Forms\Components\Textarea::make('jenis_perbaikan')
                                    ->label('Uraian Perbaikan')
                                    ->rows(3)
                                    ->required()
                                    ->columnSpanFull(),

                                Forms\Components\Textarea::make('sparepart')
                                    ->label('Sparepart yang Digunakan')
                                    ->rows(3)
                                    ->required()
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Info Laporan Produksi')
                    ->icon('heroicon-o-document-text')
                    ->iconColor('info')
                    ->description('Data laporan awal dari pihak produksi.')
                    ->schema([
                        Infolists\Components\TextEntry::make('produksi.nama_pelapor')
                            ->label('Nama Pelapor')
                            ->icon('heroicon-o-user-circle')
                            ->weight('bold'),

                        Infolists\Components\TextEntry::make('produksi.created_at')
                            ->label('Waktu Lapor')
                            ->dateTime('d M Y H:i')
                            ->icon('heroicon-o-clock')
                            ->color('gray'),

                        Infolists\Components\TextEntry::make('produksi.keterangan')
                            ->label('Keterangan Produksi')
                            ->badge()
                            ->color('info'),

                        Infolists\Components\TextEntry::make('produksi.uraian_kerusakan')
                            ->label('Uraian Kerusakan')
                            ->icon('heroicon-o-exclamation-triangle')
                            ->color('danger')
                            ->columnSpanFull(),
                    ])->columns(2),

                Infolists\Components\Section::make('Detail Maintenance')
                    ->icon('heroicon-o-wrench')
                    ->iconColor('warning')
                    ->description('Tindakan perbaikan yang telah dilakukan.')
                    ->schema([
                        Infolists\Components\Grid::make(2)
                            ->schema([
                                Infolists\Components\TextEntry::make('status')
                                    ->label('Status')
                                    ->badge()
                                    ->size('lg')
                                    ->color(fn(string $state): string => match ($state) {
                                        'Pending' => 'warning',
                                        'On Progress' => 'info',
                                        'Belum Selesai' => 'danger',
                                        'Selesai' => 'success',
                                        default => 'gray',
                                    }),

                                Infolists\Components\TextEntry::make('tanggal_selesai')
                                    ->label('Tanggal Selesai')
                                    ->date('d M Y')
                                    ->icon('heroicon-o-calendar-days'),

                                Infolists\Components\TextEntry::make('waktu_perbaikan')
                                    ->label('Waktu Mulai')
                                    ->icon('heroicon-o-play-circle'),

                                Infolists\Components\TextEntry::make('waktu_selesai')
                                    ->label('Waktu Selesai')
                                    ->icon('heroicon-o-stop-circle'),

                                Infolists\Components\TextEntry::make('technicians.name')
                                    ->label('Teknisi')
                                    ->badge()
                                    ->color('primary')
                                    ->default('Belum ditentukan'),

                                Infolists\Components\TextEntry::make('keterangan_maintenance')
                                    ->label('Keterangan Maintenance')
                                    ->badge()
                                    ->color('gray'),

                                Infolists\Components\TextEntry::make('jenis_perbaikan')
                                    ->label('Uraian Perbaikan')
                                    ->icon('heroicon-o-wrench-screwdriver'),

                                Infolists\Components\TextEntry::make('sparepart')
                                    ->label('Sparepart Digunakan')
                                    ->icon('heroicon-o-cube')
                                    ->columnSpanFull(),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('10s')
            ->striped()
            ->defaultSort('created_at', 'desc')
            ->emptyStateIcon('heroicon-o-wrench-screwdriver')
            ->emptyStateHeading('Belum Ada Laporan Maintenance')
            ->emptyStateDescription('Laporan maintenance akan muncul di sini setelah ada tiket kerusakan yang masuk.')
            ->columns([
                Tables\Columns\TextColumn::make('produksi_id')
                    ->label('No. Tiket')
                    ->weight('bold')
                    ->color('primary')
                    ->icon('heroicon-o-ticket')
                    ->formatStateUsing(function ($state, $record) {
                        $initial = substr($record->produksi->plant ?? 'G', 0, 1);
                        return "WO-" . strtoupper($initial) . "-" . str_pad($state, 4, '0', STR_PAD_LEFT);
                    })
                    ->copyable()
                    ->copyMessage('No. tiket disalin!')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('produksi.nama_mesin')
                    ->label('Detail Laporan')
                    ->default('Tiket Produksi Tidak Ditemukan')
                    ->description(fn($record) => $record->produksi->uraian_kerusakan ?? '')
                    ->wrap()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('produksi.nama_pelapor')
                    ->label('Pelapor')
                    ->toggleable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->badge()
                    ->state(function ($record): string {
                        $validCategories = ['Mekanik', 'Elektrik', 'Utility', 'Calibraty'];

                        if (in_array($record->keterangan, $validCategories)) {
                            return $record->keterangan;
                        }

                        if ($record->produksi && in_array($record->produksi->keterangan, $validCategories)) {
                            return $record->produksi->keterangan;
                        }

                        return 'Lainnya';
                    })
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->icon(fn(string $state): string => match ($state) {
                        'Pending' => 'heroicon-o-clock',
                        'On Progress' => 'heroicon-o-arrow-path',
                        'Belum Selesai' => 'heroicon-o-x-circle',
                        'Selesai' => 'heroicon-o-check-circle',
                        default => 'heroicon-o-minus-circle',
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'On Progress' => 'info',
                        'Belum Selesai' => 'danger',
                        'Selesai' => 'success',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('produksi.created_at')
                    ->label('Waktu Lapor')
                    ->dateTime('H:i d/m/Y')
                    ->color('gray')
                    ->sortable(),

            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Pending' => 'Pending',
                        'On Progress' => 'On Progress',
                        'Belum Selesai' => 'Belum Selesai',
                        'Selesai' => 'Selesai',
                    ])
                    ->native(false)
                    ->placeholder('Semua Status'),

                Tables\Filters\SelectFilter::make('keterangan')
                    ->label('Keterangan')
                    ->options([
                        'Mekanik' => 'Mekanik',
                        'Elektrik' => 'Elektrik',
                        'Utility' => 'Utility',
                        'Calibraty' => 'Calibraty',
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query->when($data['value'], function ($q) use ($data) {
                            $q->where('keterangan', $data['value'])
                                ->orWhereHas('produksi', fn($pq) => $pq->where('keterangan', $data['value']));
                        });
                    })
                    ->native(false)
                    ->placeholder('Semua Kategori'),

                Tables\Filters\Filter::make('created_at')
                    ->label('Rentang Tanggal')
                    ->form([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\DatePicker::make('dari_tanggal')
                                    ->label('Dari')
                                    ->prefixIcon('heroicon-o-calendar')
                                    ->displayFormat('d M Y'),
                                Forms\Components\DatePicker::make('sampai_tanggal')
                                    ->label('Sampai')
                                    ->prefixIcon('heroicon-o-calendar')
                                    ->displayFormat('d M Y'),
                            ]),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['dari_tanggal'], fn($q, $date) => $q->whereDate('created_at', '>=', $date))
                            ->when($data['sampai_tanggal'], fn($q, $date) => $q->whereDate('created_at', '<=', $date));
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['dari_tanggal'] ?? null) {
                            $indicators[] = 'Dari: ' . \Carbon\Carbon::parse($data['dari_tanggal'])->format('d M Y');
                        }
                        if ($data['sampai_tanggal'] ?? null) {
                            $indicators[] = 'Sampai: ' . \Carbon\Carbon::parse($data['sampai_tanggal'])->format('d M Y');
                        }
                        return $indicators;
                    }),

            ], layout: FiltersLayout::AboveContent)
            ->filtersFormColumns(3)
            ->actions([
                // HANYA MENYISAKAN TOMBOL LIHAT (VIEW)
                Tables\Actions\ViewAction::make()
                    ->iconButton()
                    ->slideOver()
                    ->modalWidth('lg')
                    ->tooltip('Lihat Detail Lengkap'),
            ])
            ->actionsColumnLabel('Aksi');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaintenances::route('/'),
        ];
    }
}