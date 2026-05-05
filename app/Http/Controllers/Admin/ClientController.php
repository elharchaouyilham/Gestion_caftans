<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    
    public function index()
    {
        $query = User::where('role_id', 2)
            ->withCount('reservations');

    
        if ($search = request('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%');
            });
        }

        $clients = $query->paginate(15);

        return view('admin.cliente.index', [
            'clients' => $clients
        ]);
    }

    
    public function show(User $client)
    {
        if ($client->role_id != 2) {
            abort(403, 'Unauthorized');
        }

        $reservations = $client->reservations()
            ->with('product')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('admin.cliente.show', [
            'client' => $client,
            'reservations' => $reservations
        ]);
    }

   
    public function update(Request $request, User $client)
    {
        if ($client->role_id != 2) {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $client->id,
            'phone' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:100'
        ]);

        $client->update($validated);

        return back()->with('success', 'Informations du client mises à jour avec succès!');
    }

    
    
}
