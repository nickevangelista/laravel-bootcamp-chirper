<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// When someone visits the homapage (/) shows them the welcome view
// Now its the home view
