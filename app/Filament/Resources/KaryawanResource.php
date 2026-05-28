<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KaryawanResource\Pages;
use App\Filament\Resources\KaryawanResource\RelationManagers;
use App\Models\Karyawan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KaryawanResource extends Resource
{
    protected static ?string $model = Karyawan::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?int $navigationSort = 1;
    protected static ?string $modelLabel = 'Karyawan';
    protected static ?string $pluralModelLabel = 'Karyawan';
    protected static ?string $breadcrumb = 'Staf Produksi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Karyawan / Staf Produksi')
                    ->description('Lengkapi formulir di bawah untuk data master foreman atau supervisor lapangan.')
                    ->icon('heroicon-o-user-plus')
                    ->iconColor('primary')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('nik')
                                    ->label('NIK (Nomor Induk Karyawan)')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(50)
                                    ->prefixIcon('heroicon-o-identification'),

                                Forms\Components\TextInput::make('nama') 
                                    ->label('Nama Lengkap Karyawan')
                                    ->required()
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-o-user'),

                                Forms\Components\Select::make('plant')
                                    ->label('Plant')
                                    ->options([
                                        'FH' => 'Facility FH',
                                        'PLANT A' => 'Plant A',
                                        'PLANT B' => 'Plant B',
                                        'PLANT C' => 'Plant C',
                                        'PLANT D' => 'Plant D',
                                        'PLANT E' => 'Plant E',
                                        'PLANT SC' => 'Procurement SC',
                                        'PLANT SS' => 'Sales Support (SS)',
                                        'PLANT QR' => 'Plant QR', 
                                        'PLANT FO' => 'Plant FO',  
                                    ])
                                    ->native(false)
                                    ->required()
                                    ->prefixIcon('heroicon-o-building-office'),

                                Forms\Components\TextInput::make('jabatan')
                                    ->label('Jabatan / Posisi')
                                    ->required()
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-o-briefcase'),
                            ]),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->striped()
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('nik')
                    ->label('NIK')
                    ->weight('bold')
                    ->copyable()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Karyawan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('plant')
                    ->label('Plant')
                    ->badge()
                    ->color('info')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->searchable()
                    ->wrap()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('plant')
                    ->label('Filter Berdasarkan Plant')
                    ->options([
                        'FH' => 'Facility FH',
                        // 'GA' => 'General Affairs (GA)',
                        'PLANT A' => 'Plant A',
                        'PLANT B' => 'Plant B',
                        'PLANT C' => 'Plant C',
                        'PLANT D' => 'Plant D',
                        'PLANT E' => 'Plant E',
                        // 'PLANT PE' => 'Plant PE',
                        'PLANT SC' => 'Procurement SC',
                        'PLANT SS' => 'Sales Support (SS)',
                    ])
                    ->native(false),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->iconButton()
                    ->slideOver()
                    ->modalWidth('lg')
                    ->tooltip('Ubah Data'),

                Tables\Actions\DeleteAction::make()
                    ->iconButton()
                    ->tooltip('Hapus Data'),
            ])
            ->actionsColumnLabel('Aksi');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKaryawans::route('/'),
        ];
    }

    public static function getBreadcrumbs(string $page): array
    {
        return [];
    }
}
