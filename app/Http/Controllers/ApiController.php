<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected function call_rick_morty()
    {
        $baseUrl = 'https://rickandmortyapi.com/api/character?page=';
        $client = new \GuzzleHttp\Client(['base_uri' => $baseUrl]);
        $response = $client->get($baseUrl);
        $dataFinally = [];
        if($response->getStatusCode() == 200)
        {
            $data = json_decode($response->getBody());
            //Calcula cuantas veces hay que iterar para obtener los 100 personajes
            $total = 100 / count($data->results);
            $j = 1;
            CharacterController::empty();
            for($i = 0; $i < $total; $i++)
            {
                $response = $client->get($baseUrl.$j);
                $datas = json_decode($response->getBody());
                CharacterController::store($datas->results);

                $j++;
            }
        }
        return back()->with(['sucess' => 'Se han almacenado los registros satisfactoriamente']);
    }
}
