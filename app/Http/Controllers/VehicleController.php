<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function getVehicles($spectype)
    {
        try {
        $type = Type::where('additional',$spectype)->first();
        $vehicles = Vehicle::orderBy('name', 'ASC')
            ->whereIn('spectype_id',['0', $type->id])
            ->paginate(10);
//            ->get();
        $data = [
            'title' => 'Купить '.Str::lower($type->name).' в Алматы. Цены на '.Str::lower($type->name).' в Казахстане.',
            'vehicles' => $vehicles,
            'type' => $type,
            'description' => 'Купить '.Str::lower($type->name).' по выгодным ценам. '.$type->name.' в продаже сейчас. Цены на '.Str::lower($type->name).' в Казахстане.'
        ];
        return view('spectehnika.vehicles', $data);
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
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
//        $vehicle = Vehicle::where('id',$vehicle)->first();
        return view('spectehnika.vehicle', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
