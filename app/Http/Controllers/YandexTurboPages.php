<?php

namespace App\Http\Controllers;

use App\Type;
use App\Vehicle;
use Illuminate\Http\Request;

class YandexTurboPages extends Controller
{
    public function index()
    {
//        $post = Post::orderBy('updated_at', 'desc')->first();
        $types = Type::get();
        $vehicles = Vehicle::get();

        return response()->view('turbo.index', [
            'types' => $types,
            'vehicles' => $vehicles,
        ])->header('Content-Type', 'text/xml');
    }
}
