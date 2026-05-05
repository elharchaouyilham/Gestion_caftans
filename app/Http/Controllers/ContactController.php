<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    /**
     * Show contact form
     */
    public function create()
    {
        return view('pages.contact');
    }

    
}
