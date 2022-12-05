<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request)
    {

        $url = "https://dev.eduplay.rnp.br/services";
        $headers = [
            'clientkey' => '3247cb085ea21b1bfb9364437302d9ab34a037c38d3181fadee61bed38fbb963',
            'accept' => 'application/json'
        ];

        try {
            $client = new Client([
                'headers' => $headers
            ]);

            $response = $client->get($url);

            return json_decode($response->getBody());

        } catch (\Throwable $e) {
            return $e;
            //error with linkseller request
        }


    }


    public function store(Request $request)
    {

    }


    public function show(Request $request)
    {
        //pegar usuário autenticado e fazer a requisição
        $user = User::query()->with('userGames.game')->first();

        return $user;


    }


    public function update( Request $request)
    {


    }

    public function destroy(Request $request)
    {


    }
}
