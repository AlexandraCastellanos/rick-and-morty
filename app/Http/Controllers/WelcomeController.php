<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class WelcomeController extends Controller
{
    protected function view()
    {
        $characters = CharacterController::all();
        return View::make('welcome', compact('characters'));
    }
}
