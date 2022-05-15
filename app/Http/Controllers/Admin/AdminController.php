<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function home(Request $request)
    {
        return view('pages.admin.dashboard', [
            'title' => 'Nomads Travel Website',
            'travel_package' => TravelPackage::count(),
            'transaction' => Transaction::count(),
            'transaction_pending' => Transaction::where('transactional_status', 'PENDING')->count(),
            'transaction_gagal' => Transaction::where('transactional_status', 'FAILED')->count()
            ]);
    }
    
}
