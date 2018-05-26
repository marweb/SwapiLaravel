<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use URL;

class SwapiController extends Controller
{
    private $request;

    public function __construct (Request $request) {
        $this->request = $request;
    }
    public function index () {
        $page = $this->request->get('page') ? $this->request->get('page') : 1;

        $client = new Client();
        $params = [
            'query' => [
                'page' => $page
            ]
        ];
        try {
            $res = $client->get($this->apiUrl('people/'), $params);   
        } catch (\Exception $e) {
            $res = null;
        }

        if (!$res) {
            $hasNext = '';
            $hasPrevious = '';
            $peoples = [];
        } else {
            $obj = json_decode($res->getBody());

            $i = 0;
            foreach ($obj->results as $result) {
                $urlSpecies = $result->species[0];
                $specieName = $this->viewSpecie($urlSpecies);
                $obj->results[$i]->especie = $specieName;
                $i++;
            }

            $nextPage     = $page + 1;
            $previousPage = $page - 1;


            $hasNext     = $obj->next ? URL::to("/?page=$nextPage") : "";
            $hasPrevious = $obj->previous ? URL::to("/?page=$previousPage") : "";
            $peoples     = $obj->results;
        }

        return view('homeView', compact('hasNext', 'hasPrevious', 'peoples', 'page'));
    }

    public function especie () {
        $especie = $this->request->get('especie');

        $client = new Client();
        $params = [
            'query' => [
                'search' => $especie
            ]
        ];
        try {
            $res = $client->get($this->apiUrl('species/'), $params);   
        } catch (\Exception $e) {
            $res = null;
        }

        if (!$res) {
            $peoples = [];
        } else {
            $obj = json_decode($res->getBody());
            $resultado = [];

            $i = 0;
            foreach ($obj->results[0]->people as $result) {
                $char = $this->viewPeople($result);
                $resultado[$i]['name'] = $char->name;
                $resultado[$i]['gender'] = $char->gender;
                $resultado[$i]['hair_color'] = $char->hair_color;
                $resultado[$i]['url'] = $char->url;
                $i++;
            }

            $peoples     = $resultado;
        }

        return view('especieView', compact('peoples','especie'));
    }


    public function viewSpecie($urlSpecies)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlSpecies);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $json = curl_exec($ch);

        //dd($output);

        //$context = stream_context_create(array('https' => array('header'=>'Connection: close\r\n')));
        //$json = file_get_contents($urlSpecies,false,$context);
        $data = json_decode($json);
        
        return $data->name;

    }

    public function viewPeople($urlPeople)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlPeople);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $json = curl_exec($ch);

        //$context = stream_context_create(array('https' => array('header'=>'Connection: close\r\n')));
        //$json = file_get_contents($urlPeople,false,$context);
        $data = json_decode($json);
        
        return $data;
    

    }
}
