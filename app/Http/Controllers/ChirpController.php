<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    public function index()
    {
        $chirps = Chirp::with('user')
            ->latest()
            ->take(50)  // Limit to 50 most recent chirps
            ->get();

        return view('home', ['chirps' => $chirps]);
    }
}
    // Chirp::with('user') - This is so that we can eager load that user relationship and it prevents N+1 queries—in that case, having to query the database multiple times for things that we already have

    // latest() - We want to grab those chirps via the latest, ordering by created_at, newest first

    // take(50) - Let's say we want to take 50 of them. Maybe this is so that we don't have all of the chirps loaded on one screen. There's other ways around this, but for now, this is going to be the easiest

    // get() - And then we're going to get those chirps
