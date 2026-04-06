<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Reservation;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Show admin dashboard
     */
    public function index()
    {
        $totalProducts = Product::count();
        $totalReservations = Reservation::count();
        $pendingReservations = Reservation::where('status', 'pending')->count();
        $totalClients = User::where('role_id', 2)->count(); // 2 = client role
        $totalRevenue = Reservation::where('status', 'completed')->sum('total_amount');

        // Recent reservations
        $recentReservations = Reservation::with('product', 'user')
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->get();

        // Product statistics
        $topProducts = Product::withCount('reservations')
            ->orderBy('reservations_count', 'DESC')
            ->limit(5)
            ->get();

        return view('admin.dashboard.index', [
            'stats' => [
                'total_products' => $totalProducts,
                'total_reservations' => $totalReservations,
                'pending_reservations' => $pendingReservations,
                'total_clients' => $totalClients,
                'total_revenue' => $totalRevenue,
            ],
            'recentReservations' => $recentReservations,
            'topProducts' => $topProducts
        ]);
    }
}
