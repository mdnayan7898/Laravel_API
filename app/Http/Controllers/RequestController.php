<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Cache;

class RequestController extends Controller
{
    public function index(){
        // $response = Http::get('http://127.0.0.1:8000/api/links');
        // $response = Http::get('https://nayan.pro');
        $response = Http::accept('application/json')->get('https://randomuser.me/api/');
        return $response;
    }

    public function post(){
        $postData = [];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer YOUR_TOKEN',
            'Content-Type' => 'application/json',
        ])->post('https://api.example.com/posts', $postData);
    }

    public function checkCache(){
        // Cache::add('name', 'Mohammad Nayan', 10);
        $value = Cache::get('name');
        return $value;
    }
}
