<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<yml_catalog date="{{ Carbon\Carbon::now()->toDateTimeString() }}">
    <shop>
        <name>k700.ASIA - Спецтехника и запчасти</name>
        <company>ИП "PARTS GROUP"</company>
        <url>https://k700.asia</url>
        <currencies>
            <currency id="KZT" rate="1"/>
            <currency id="RUR" rate="6"/>
            <currency id="USD" rate="430"/>
        </currencies>
        <categories>
            @foreach ($types as $type)
            <category id="{{$type->id}}">{{$type->name}}</category>
            @endforeach
        </categories>
        <offers>
            @foreach($vehicles as $vehicle)
            <offer id="{{$vehicle->id}}">
                <name>{{$vehicle->type->name}} {{$vehicle->name}}</name>
                <url>https://k700.asia/spectehnika/vehicle/{{$vehicle->id}}</url>
                <picture>https://k700.asia/images/spectehnika/{{$vehicle->image}}</picture>
                <price>{{$vehicle->price}}</price>
                <currencyId>KZT</currencyId>
                <categoryId>{{$vehicle->type->id}}</categoryId>
                <delivery>true</delivery>
                <param name="Город">Алматы</param>
                <param name="Год">{{ $vehicle->year }}</param>
                <param name="Тип топлива">{{ $vehicle->engine }}</param>
                <param name="Производитель">{{$vehicle->brand->name}}</param>
            </offer>
            @endforeach
        </offers>
    </shop>
</yml_catalog>
