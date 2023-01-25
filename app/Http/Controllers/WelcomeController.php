<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class WelcomeController extends Controller
{
    protected function all(Request $request)
    {
        if($request->get('type-search') != null && $request->get('search') != null)
        {
            $request = ['type-search' => $request->get('type-search'), 'search' => $request->get('search')];
            return WelcomeController::search($request);
        }
        $characters = CharacterController::all();
        return WelcomeController::view($characters);
    }

    protected function view($characters, $type_search = '', $search = '')
    {
        return View::make('welcome', compact('characters', 'type_search', 'search'));
    }

    protected function search($request)
    {
        $characters = CharacterController::search($request);
        return WelcomeController::view($characters, $request['type-search'], $request['search']);
    }

    protected function search_view(Request $request)
    {
        return WelcomeController::search($request->only('search', 'type-search'));
    }
}
