<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = [
                'title' => 'Ремонт вилочных погрузчиков в Алматы',
                'pagetitle' => 'Книга для гостей',
                'description' => 'Ремонт двигателя, гидравлики, элекрики, коробки передач, батареи, мачты. ТО 1, ТО 2, ТО 3. Запчасти в наличии, лучшие специалисты, современное оборудование. Ремонт, ТО по Алматы и обл. Компьютерная диагностика.'
            ];
            return view('repair.index', $data);
        } catch (\Exception $e) {
            abort(404);
        }
    }
}
