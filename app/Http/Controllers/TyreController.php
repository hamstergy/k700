<?php

namespace App\Http\Controllers;

use App\Tyre;
use App\Tyretype;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TyreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $spectyretypes = Tyretype::orderBy('name', 'ASC')->get();
            $data = [
                'title' => 'Купить шины на спецтехнику в Алматы, с доставкой по Казахстану',
                'pagetitle' => 'Книга для гостей',
                'spectypes' => $spectyretypes,
                'description' => 'Шины на спецтехнику и сельхозтехнику по выгодным ценам. Широкий ассортимент, оперативный подбор. Доставка по Казахстану.'
            ];
            return view('tyres.spec', $data);
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function getSpectyres($spectype)
    {
        try {
        $type = Tyretype::where('additional',$spectype)->first();
        $tyres = Tyre::orderBy('price', 'ASC')->where('disabled','0')
            ->where('price','<>','0')
            ->whereIn('type_id',['0', $type->id])
            ->get();
        $uniquesizes = Tyre::select('size')->orderBy('size', 'ASC')->where('disabled','0')
        ->whereIn('type_id',['0', $type->id])
        ->distinct()
        ->get();
        $uniquewidths = Tyre::select('width')->orderBy('width', 'ASC')->where('disabled','0')
        ->whereIn('type_id',['0', $type->id])
        ->distinct()
        ->get();
        $uniquesizes = $uniquesizes->pluck('size');
        $uniquewidths = $uniquewidths->pluck('width');
        $data = [
            'title' => 'Купить шины на '.Str::lower($type->name).' в Алматы, с доставкой по Казахстану',
            'pagetitle' => 'Книга для гостей',
            'tyres' => $tyres,
            'type' => $type,
            'uniquesizes' => $uniquesizes,
            'uniquewidths' => $uniquewidths,
            'description' => 'Шины на '.Str::lower($type->name).' по выгодным ценам. Широкий ассортимент, оперативный подбор. Доставка по Казахстану, бесплатная доставка по Алматы.'
        ];
        return view('tyres.spectyres', $data);
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function getSpecbrands($spectype,$specsparepart)
    {
        try {
        $type = Spectype::with('specbrands')
            ->where('additional',$spectype)
            ->orderBy('name', 'ASC')->get()
            ->first();

        $parts = Specsparepart::where('additional',$specsparepart)->first();

        if ($parts->groupid == 0){
            $subparts = Specsparepart::orderBy('name', 'ASC')->get()
                ->where('groupid',$parts->id);
        } else {
            $subparts = Specsparepart::orderBy('name', 'ASC')->get()
                ->where('groupid',$parts->groupid);
        }
        $metadesc = $parts->name.' на '.Str::lower($type->name).' по выгодной цене. Широкий ассортимент, оперативный подбор. Доставка по Казахстану, бесплатная доставка по Алматы.';
        $data = [
            'title' => 'Купить '.Str::lower($parts->name).' на '.Str::lower($type->name).' в Алматы',
            'type' => $type,
            'subparts' => $subparts,
            'parts' => $parts,
            'description' => $metadesc
        ];
        return view('spec.specbrand', $data);
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function request($sparepart,$carbrand,$carmodel)
    {
        try {
        $carmodels = Carmodel::where('additional',$carmodel)->first();
        $parts = Sparepart::where('additional',$sparepart)->first();
        $markal = Carbrand::where('additional',$carbrand)
            ->orderBy('created_at', 'desc')->get()
            ->first();
        // $mods = Mod::where('marka_id', $markadd)
        //    ->orderBy('name', 'desc')
        //  ->take(10)
        //->get();
        $metadesc = 'Широкий ассортимент, оперативный подбор. '.$parts->name.' на '.$markal->name.' '.$carmodels->name.' по выгодной цене. Бесплатная доставка по Алматы.';
        $data = [
            'title' => 'Купить '.$parts->name.' на '.$markal->name.' '.$carmodels->name.' в Алматы',
            'markal' => $markal,
            'parts' => $parts,
            'models' => $carmodels,
            'description' => $metadesc
        ];
        return view('catalog.carmodel', $data);
        } catch (\Exception $e) {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tyre  $tyre
     * @return \Illuminate\Http\Response
     */
    public function show(Tyre $tyre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tyre  $tyre
     * @return \Illuminate\Http\Response
     */
    public function edit(Tyre $tyre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tyre  $tyre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tyre $tyre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tyre  $tyre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tyre $tyre)
    {
        //
    }
}
