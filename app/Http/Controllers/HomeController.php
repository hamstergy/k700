<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\Post;


class HomeController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::inRandomOrder()->limit(6)
            ->orderBy('name', 'ASC')
            ->has('type')
            ->get();
        $posts = Post::orderBy('created_at', 'desc')->get();
        $data = [
            'title' => 'Купить спецтехнику и запчасти на нее в Алматы, с доставкой по Казахстану',
            'vehicles' => $vehicles,
            'posts' => $posts,
            'description' => 'Купить спецтехнику по выгодным ценам. Широкий ассортимент, оперативный подбор. Доставка по Казахстану, бесплатная доставка по Алматы.'
        ];
        return view('home',$data);
    }
}
