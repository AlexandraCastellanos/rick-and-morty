<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class CharacterController extends Controller
{
    public static function store($characters)
    {
        foreach($characters as $character)
        {
            $ch = new Character();
            $ch->api_id = $character->id;
            $ch->name = $character->name;
            $ch->status = $character->status;
            $ch->species = $character->species;
            $ch->type = $character->type;
            $ch->gender = $character->gender;
            $ch->name_origin = $character->origin->name;
            $ch->url_origin = $character->origin->url;
            $ch->image = $character->image;
            $ch->save();
        }
    }

    public static function empty()
    {
        Character::truncate();
    }

    public static function all()
    {
        return Character::paginate(20);
    }
}
