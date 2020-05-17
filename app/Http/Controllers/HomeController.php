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
            'title' => 'Cпецтехника, запасные части и шины, с доставкой по Казахстану',
            'vehicles' => $vehicles,
            'posts' => $posts,
            'description' => 'Ищите спецтехнику по выгодным ценам? Широкий ассортимент техники и запчастей на спецтехнику, оперативный подбор. Доставка по Казахстану.'
        ];
        return view('home',$data);
    }
}
