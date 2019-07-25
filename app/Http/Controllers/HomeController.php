<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;

class HomeController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::take(6)
            ->orderBy('name', 'ASC')
            ->has('type')
            ->get();
        $data = [
            'title' => 'Купить спецтехнику и запчасти на нее в Алматы, с доставкой по Казахстану',
            'vehicles' => $vehicles,
            'description' => 'Купить спецтехнику по выгодным ценам. Широкий ассортимент, оперативный подбор. Доставка по Казахстану, бесплатная доставка по Алматы.'
        ];
        return view('home',$data);
    }
}
