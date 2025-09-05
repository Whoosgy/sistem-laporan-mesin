<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    public function maintenance()
    {
        return $this->hasOne(Maintenance::class);
    }
}
