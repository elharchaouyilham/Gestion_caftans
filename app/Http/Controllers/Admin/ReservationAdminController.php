<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationAdminController extends Controller
{
    /**
     * Display list of all reservations
     */
    public function index()
    {
        $query = Reservation::with('product', 'user')
            ->orderBy('created_at', 'DESC');

        // Filter by status
        if ($status = request('status')) {
            $query->where('status', $status);
        }

        // Search functionality
        if ($search = request('search')) {
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($subQ) use ($search) {
                    $subQ->where('name', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                })
                    ->orWhereHas('product', function ($subQ) use ($search) {
                        $subQ->where('nom', 'like', '%' . $search . '%');
                    })
                    ->orWhere('id', 'like', '%' . $search . '%');
            });
        }

        $reservations = $query->paginate(15);

        $stats = [
            'pending' => Reservation::where('status', 'pending')->count(),
            'confirmed' => Reservation::where('status', 'confirmed')->count(),
            'completed' => Reservation::where('status', 'completed')->count(),
            'cancelled' => Reservation::where('status', 'cancelled')->count()
        ];

        return view('admin.reservations.index', [
            'reservations' => $reservations,
            'stats' => $stats
        ]);
    }

    /**
     * Show reservation detail
     */
    public function show(Reservation $reservation)
    {
        $reservation->load('product', 'user');

        return view('admin.reservations.show', [
            'reservation' => $reservation
        ]);
    }

    /**
     * Update reservation status
     */
    public function updateStatus(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled'
        ]);

        $reservation->update(['status' => $validated['status']]);

        return back()->with('success', 'Statut de la réservation mis à jour avec succès!');
    }

    /**
     * Cancel reservation
     */
    public function cancel(Reservation $reservation)
    {
        $reservation->update(['status' => 'cancelled']);

        return back()->with('success', 'Réservation annulée avec succès!');
    }

    /**
     * Filter reservations by status or date
     */
    public function filter(Request $request)
    {
        $query = Reservation::with('product', 'client');

        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }

        if ($request->has('from_date') && !empty($request->from_date)) {
            $query->where('date_reservation', '>=', $request->from_date);
        }

        if ($request->has('to_date') && !empty($request->to_date)) {
            $query->where('date_reservation', '<=', $request->to_date);
        }

        $reservations = $query->orderBy('created_at', 'DESC')->paginate(15);

        return view('admin.reservations.index', [
            'reservations' => $reservations
        ]);
    }

}
