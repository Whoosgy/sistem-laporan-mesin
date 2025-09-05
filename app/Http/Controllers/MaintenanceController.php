<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Produksi;
use App\Models\Maintenance;

class MaintenanceController extends Controller
=======
#[Layout('components.layouts.app')]
#[Title('Dashboard Maintenance')]
class MaintenanceController extends Component
{
    // Controller ini bisa Anda gunakan untuk method lain di masa depan
    // jika diperlukan, tetapi untuk sekarang biarkan seperti ini.
}
