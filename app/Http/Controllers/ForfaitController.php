<?php

namespace App\Http\Controllers;

use App\Models\Forfait;
use Illuminate\Http\Request;

class ForfaitController extends Controller
{
    /**
     * Display all forfaits
     */
    public function index()
    {
        $forfaits = Forfait::all();

        return view('pages.forfaits', [
            'forfaits' => $forfaits
        ]);
    }

    /**
     * Display forfait detail
     */
    public function show($id)
    {
        $forfait = Forfait::findOrFail($id);
        $relatedForfaits = Forfait::where('id', '!=', $id)->limit(3)->get();

        return view('pages.forfait-detail', [
            'forfait' => $forfait,
            'relatedForfaits' => $relatedForfaits
        ]);
    }
}
