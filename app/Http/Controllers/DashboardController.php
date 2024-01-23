<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Transaction;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() 
    {
        $user = User::where('role', 'admin')->count();
        $order = User::where('role', 'user')->count();
        $tour = Tour::count();
        $estimation = Transaction::where('status', 'Disetujui')->sum('total_price');
        $estimation = 'Rp. '.number_format($estimation, 0, ',', '.');
        return view('admin.dashboard.index', compact('user', 'estimation', 'order', 'tour'));
    }
}
