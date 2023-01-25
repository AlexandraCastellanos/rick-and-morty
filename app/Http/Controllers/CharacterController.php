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
            CharacterController::model($ch, $character);
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

    private static function model($ch, $character)
    {
        $ch->api_id = isset($character->id) ? $character->id : $character->api_id;
        $ch->name = $character->name;
        $ch->status = $character->status;
        $ch->species = $character->species;
        $ch->type = $character->type;
        $ch->gender = $character->gender;
        $ch->name_origin = isset($character->origin->name) ? $character->origin->name : $character->name_origin;
        $ch->url_origin = isset($character->origin->url) ? $character->origin->url : $character->url_origin;
        $ch->image = $character->image;
        $ch->save();
    }

    protected function edit(Request $request)
    {
        $ch = Character::find($request->id);
        $data = (object) $request->only('name', 'status', 'species', 'type', 'gender', 'name_origin', 'url_origin', 'image', 'api_id');
        CharacterController::model($ch, $data);
        return back();
    }

    public static function search($request)
    {
        switch ($request['type-search']) {
            case 'name':
                return Character::where('name', 'like', '%'.$request['search'].'%')
                    ->paginate(20);
                break;
            case 'status':
                return Character::where('status', 'like', '%'.$request['search'].'%')
                    ->paginate(20);
                break;
            case 'species':
                return Character::where('species', 'like', '%'.$request['search'].'%')
                    ->paginate(20);
                break;
            default:
                break;
        }
    }
}
