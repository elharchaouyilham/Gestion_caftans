<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Product;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Show reservation form
     */
    public function create()
    {
        $products = Product::all();

        // Pre-select product if provided via URL parameter
        $preSelectedProductId = request('product_id');
        $preSelectedForfaitId = request('forfait_id');

        return view('pages.reservation', [
            'products' => $products,
            'preSelectedProductId' => $preSelectedProductId,
            'preSelectedForfaitId' => $preSelectedForfaitId
        ]);
    }

    /**
     * Store a new reservation
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'event_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after:event_date',
            'event_type' => 'required|in:wedding,engagement,henna,evening',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email',
            'city' => 'required|string|max:100',
            'notes' => 'nullable|string',
            'products' => 'required|array|min:1',
            'products.*' => 'exists:products,id',
            'terms' => 'required|accepted'
        ]);

        // Get authenticated user or create temporary data
        $userId = auth()->check() ? auth()->id() : null;

        try {
            // Validate all products exist
            $productIds = $request->products;
            $products = Product::whereIn('id', $productIds)->get();

            if ($products->count() !== count($productIds)) {
                throw new \Exception('Un ou plusieurs produits n\'existent pas.');
            }

            // Create a SINGLE reservation with all selected products
            $reservation = Reservation::create([
                'date_reservation' => $validated['event_date'],
                'date_retour' => $validated['return_date'],
                'status' => 'pending',
                'product_id' => $productIds[0], // Set first product as default for backward compatibility
                'user_id' => $userId,
                'event_type' => $validated['event_type'],
                'client_name' => $validated['first_name'] . ' ' . $validated['last_name'],
                'client_phone' => $validated['phone'],
                'client_email' => $validated['email'],
                'client_city' => $validated['city'],
                'special_requests' => $validated['notes']
            ]);

            // Attach all products to this reservation
            $reservation->products()->sync($productIds);

            return redirect()->route('reservation.confirmation')
                ->with('success', 'Votre réservation a été enregistrée avec succès! Notre équipe vous contactera bientôt pour confirmer les détails.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Une erreur est survenue. Veuillez réessayer.'])
                ->withInput();
        }
    }

    /**
     * Show reservation confirmation
     */
    public function confirmation()
    {
        return view('pages.reservation-confirmation');
    }

    /**
     * Get available dates for a product
     */
    public function getAvailableDates($productId)
    {
        $product = Product::findOrFail($productId);

        // Get all reserved dates for this product
        $reservedDates = Reservation::where('product_id', $productId)
            ->where('status', '!=', 'cancelled')
            ->get(['date_reservation', 'date_retour']);

        return response()->json([
            'product' => $product,
            'reservedDates' => $reservedDates
        ]);
    }

    /**
     * Show user's own reservations
     */
    public function myReservations()
    {
        $reservations = auth()->user()->reservations()
            ->with('product')
            ->orderBy('date_reservation', 'desc')
            ->paginate(10);

        return view('client.reservations', [
            'reservations' => $reservations
        ]);
    }

    /**
     * Get event type label
     */
    private function getEventTypeLabel($type)
    {
        $types = [
            'wedding' => 'Mariage',
            'engagement' => 'Fiançailles',
            'henna' => 'Henné',
            'evening' => 'Soirée'
        ];
        return $types[$type] ?? $type;
    }
}
