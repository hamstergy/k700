<?php

namespace App\Http\Controllers;

use App\Type;
use App\Sparepart;
use App\Specmodel;
use App\Brand;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\URL;

class SparepartController extends Controller
{
    public function index()
    {
        $spectypes = Type::orderBy('name', 'ASC')->get();
        $data = [
            'title' => 'Купить запчасти на спецтехнику в Алматы, с доставкой по Казахстану',
            'pagetitle' => 'Книга для гостей',
            'spectypes' => $spectypes,
            'description' => 'Запчасти на спецтехнику и сельхозтехнику по выгодным ценам. Широкий ассортимент, оперативный подбор. Доставка по Казахстану.'
        ];
        return view('parts.spec', $data);
    }
    public function spectehnika()
    {
        $spectypes = Type::orderBy('name', 'ASC')->get();
        $data = [
            'title' => 'Купить спецтехнику в Казахстане, Алматы, Караганда, Астана, Шымкент с доставкой по Казахстану',
            'pagetitle' => 'Книга для гостей',
            'spectypes' => $spectypes,
            'description' => 'Спецтехника и сельхозтехника по выгодным ценам. Широкий ассортимент, оперативный подбор. Доставка по Казахстану.'
        ];
        return view('spectehnika.spectehnika', $data);
    }

    public function getSpareparts($spectype)
    {
        $type = Type::where('additional',$spectype)->first();
        $spareparts = Sparepart::orderBy('name', 'ASC')->where('groupid','0')
            ->whereIn('typeid',['0', $type->id])
            ->where('disabled','0')
            ->get();
        $subparts = Sparepart::orderBy('name', 'ASC')->where('groupid','<>','0')
            ->whereIn('typeid',['0', $type->id])
            ->where('disabled','0')
            ->get();
        $data = [
            'title' => 'Купить запчасти на '.Str::lower($type->name).' в Алматы, с доставкой по Казахстану',
            'pagetitle' => 'Книга для гостей',
            'spareparts' => $spareparts,
            'subparts' => $subparts,
            'type' => $type,
            'description' => 'Автозапчасти на '.Str::lower($type->name).' по выгодным ценам. Широкий ассортимент, оперативный подбор. Доставка по Казахстану, бесплатная доставка по Алматы.'
        ];
        return view('parts.specsparepart', $data);
    }

    public function getBrands($spectype,$specsparepart)
    {
        $type = Type::with('brands')
            ->where('additional',$spectype)
            ->orderBy('name', 'ASC')->get()
            ->first();

        $parts = Sparepart::where('additional',$specsparepart)->first();

        if ($parts->groupid == 0){
            $subparts = Sparepart::orderBy('name', 'ASC')->get()
                ->where('groupid',$parts->id);
        } else {
            $subparts = Sparepart::orderBy('name', 'ASC')->get()
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
        return view('parts.specbrand', $data);
    }

    public function getSpecmodels($spectype,$specsparepart,$specbrand)
    {
        $part = Sparepart::where('additional',$specsparepart)->first();
        $type = Type::where('additional',$spectype)->first();
        $brand = Brand::where('additional',$specbrand)->first();
        $metadesc = 'Широкий ассортимент, оперативный подбор. '.Str::lower($part->name).' на '.Str::lower($type->name).' '.$brand->name.' по выгодной цене. Доставка по Алматы и всему Казахстану';
        $data = [
            'title' =>'Купить '.Str::lower($part->name).' на '.Str::lower($type->name).' '.$brand->name.' в Алматы',
            'part' => $part,
            'type' => $type,
            'brand' => $brand,
            'description' => $metadesc
        ];
        return view('parts.specmodel', $data);
    }
    public function request($sparepart,$carbrand,$carmodel)
    {
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
    }
}
