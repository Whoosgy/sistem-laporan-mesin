<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProduksiResource\Pages;
use App\Models\Produksi;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;

class ProduksiResource extends Resource
{
    protected static ?string $model = Produksi::class;
    protected static ?string $navigationGroup = 'Manajemen Laporan';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Informasi Pelapor')
                    ->icon('heroicon-m-user')
                    ->schema([
                        // Pastikan 'nama_pelapor' adalah nama kolom di tabel produksi kamu
                        TextEntry::make('nama_pelapor')
                            ->label('Nama Pelapor')
                            ->weight('bold')
                            ->placeholder('Data tidak ditemukan'),
                        TextEntry::make('created_at')
                            ->label('Waktu Lapor')
                            ->dateTime('d M Y H:i'),
                    ])->columns(2),

                Section::make('Detail Laporan Produksi')
                    ->icon('heroicon-m-document-text')
                    ->schema([
                        TextEntry::make('nama_mesin')
                            ->weight('bold'),
                        TextEntry::make('plant')
                            ->badge()
                            ->color('info'),
                        TextEntry::make('keterangan')
                            ->label('Kategori')
                            ->badge(),
                    ])->columns(3),
                    
                Section::make('Status Perbaikan Maintenance')
                    ->icon('heroicon-m-wrench-screwdriver')
                    ->schema([
                        TextEntry::make('maintenance.status')
                            ->label('Status Terkini')
                            ->badge()
                            ->color(fn (?string $state): string => match (str($state)->lower()->trim()->toString()) {
                                'pending' => 'warning',
                                'on progress' => 'info',
                                'selesai' => 'success',
                                default => 'danger',
                            })
                            ->formatStateUsing(fn (?string $state): string => match (str($state)->lower()->trim()->toString()) {
                                'pending' => 'Pending',
                                'on progress' => 'On Progress',
                                'selesai' => 'Selesai',
                                '' => 'Belum Diproses',
                                default => 'Belum Selesai',
                            }),
                    ]),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_mesin')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('plant')
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('keterangan')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Mekanik' => 'primary',
                        'Elektrik' => 'warning',
                        'Utility' => 'success',
                        'Calibraty' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('maintenance.status')
                    ->label('Status Perbaikan')
                    ->badge()
                    ->color(fn (?string $state): string => match (str($state)->lower()->trim()->toString()) {
                        'pending' => 'warning',
                        'on progress' => 'info',
                        'selesai' => 'success',
                        default => 'danger',
                    })
                    ->formatStateUsing(fn (?string $state): string => match (str($state)->lower()->trim()->toString()) {
                        'pending' => 'Pending',
                        'on progress' => 'On Progress',
                        'selesai' => 'Selesai',
                        '' => 'Belum Diproses',
                        default => 'Belum Selesai',
                    })
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('plant')
                    ->options(['A'=>'Plant A','B'=>'Plant B','C'=>'Plant C','D'=>'Plant D','E'=>'Plant E']),
                Tables\Filters\SelectFilter::make('keterangan')
                    ->options(['Mekanik'=>'Mekanik','Elektrik'=>'Elektrik','Utility'=>'Utility','Calibraty'=>'Calibraty']),
            ])
            ->actions([
                // Tombol Detail sebagai Pop-up
                Tables\Actions\ViewAction::make()
                    ->label('Detail')
                    ->modalHeading('Detail Laporan Produksi')
                    ->modalWidth('2xl')
                    ->icon('heroicon-m-eye')
                    ->color('info'),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProduksis::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        return false; 
    }
}