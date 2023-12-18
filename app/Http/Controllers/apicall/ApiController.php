<?php

namespace App\Http\Controllers\apicall;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getMovie(Request $request) {
        // Inizializzo una variabile che conterrà il metodo di ricerca e una flag
        $data = '';
        $movieFlag = true;

        // Verifica quale input utilizzare per la ricerca: se il titolo è vuoto userà l'id e la flag verrà impostata su false
        if ($request->input('title')) {
            $data = 's=' . $request->input('title');
        }else {
            $data = 'i=' . $request->input('id');
            $movieFlag = false;
        }

        // Chiamata API e salvataggio del risultato in json
        $response = Http::get('http://www.omdbapi.com/?&apikey=332a50ae&' . $data)->json();

        // Reindirizzamento alla view con i dati del film
        return view('apicall.movie', [
            'movie' => $response,
            'flag' => $movieFlag
        ]);
    }
}
