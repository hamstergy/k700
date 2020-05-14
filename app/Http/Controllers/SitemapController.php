<?php

namespace App\Http\Controllers;

use App\Sparepart;
use App\Type;
use App\Tyretype;
use App\Vehicle;
use App\Post;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $post = Post::orderBy('updated_at', 'desc')->first();
        $vehicle = Vehicle::orderBy('updated_at', 'desc')->first();

        return response()->view('sitemap.index', [
            'post' => $post,
            'vehicle' => $vehicle,
        ])->header('Content-Type', 'text/xml');
    }
    public function posts()
    {
        $posts = Post::get();
        return response()->view('sitemap.posts', [
            'posts' => $posts,
        ])->header('Content-Type', 'text/xml');
    }
    public function tyres()
    {
        $tyres = Tyretype::get();
        return response()->view('sitemap.tyres', [
            'tyres' => $tyres,
        ])->header('Content-Type', 'text/xml');
    }
    public function spectehnika()
    {
        $types = Type::with('vehicle')->orderBy('name', 'ASC')->get();
        foreach($types as $type) {
            $type->vehicles = Vehicle::whereIn('spectype_id',['0', $type->id])->get();
        }
        return response()->view('sitemap.spectehnika', [
            'types' => $types,
        ])->header('Content-Type', 'text/xml');
    }
    public function parts()
    {
        $types = Type::with('brands')->orderBy('name', 'ASC')->get();
        foreach($types as $type) {
            $type->parts = Sparepart::orderBy('name', 'ASC')->where('groupid','0')
                ->whereIn('typeid',['0', $type->id])
                ->where('disabled','0')
                ->get();
        }
        return response()->view('sitemap.parts', [
            'types' => $types,
            ''
        ])->header('Content-Type', 'text/xml');
    }
}
