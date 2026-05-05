<?php

namespace App\Filament\Resources\Shield;

use BezhanSalleh\FilamentShield\Resources\RoleResource as BaseResource;

class RoleResource extends BaseResource
{
    protected static ?string $navigationGroup = 'Pelindung';
    
    protected static ?string $modelLabel = 'Peran';
    
    protected static ?string $pluralModelLabel = 'Peran';

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';


public static function canViewAny(): bool
    {
        return true; 
    }
    
}
