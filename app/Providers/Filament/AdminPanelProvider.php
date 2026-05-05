<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Hasnayeen\Themes\ThemesPlugin;
use Hasnayeen\Themes\Http\Middleware\SetTheme;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->brandName('Admin Panel WOM')
            ->brandLogo(asset('images/logo-lightmode.png'))
            ->darkModeBrandLogo(asset('images/logo-darkmode.png'))
            ->brandLogoHeight('2.8rem')
            ->font('Inter')
            ->login()
     
            ->plugins([
                ThemesPlugin::make(),
                \Leandrocfe\FilamentApexCharts\FilamentApexChartsPlugin::make(),
                FilamentShieldPlugin::make(),
            ])
            ->colors([
                'primary' => Color::Blue,
            ])

            ->resources([
            \App\Filament\Resources\Shield\RoleResource::class,
        ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            
            ->widgets([
                //  panggil secara manual widget 4 kartu 
                \App\Filament\Resources\MaintenanceResource\Widgets\MaintenanceStats::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class, 
                SetTheme::class,
            ])

            ->navigationGroups([
                'Manajemen Laporan', 
                'Master Data',
                'Pelindung',         
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}