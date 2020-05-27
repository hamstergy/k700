@extends('layouts.app')
@section('title', $title.' - K700  Азия')
@section('description', $description)
@section('content')
    <div class="ui container" style="padding: 30px 0;">
        <div class="ui header">
            @if($type->id == '3')
                <h1 style="margin-bottom: 4px;">Купить автовышку в Казахстане</h1>
            @else
                <h1 style="margin-bottom: 4px;">Купить {{ Illuminate\Support\Str::lower($type->name) }} в Казахстане</h1>
            @endif
            <div class="sub header">
            <div class="ui breadcrumb">
                <a class="section" href="/spectehnika">Каталог</a>
                <div class="divider"> / </div>
                {{$type->name}}
            </div>
            </div>
        </div>
        <div class="ui two column stackable grid container">
            <div class="ten wide column">
                <div class="row">
                    <div class="ui items">
                    @foreach($vehicles as $vehicle)
                        <div class="item">
                            <div class="ui small image">
                            <a href='{{ route('spectehnika.vehicle', [$vehicle->id])}}'><img data-src="/images/spectehnika/{{$vehicle->image}}" src="/images/default.png" alt="{{$vehicle->type->name}} {{ $vehicle->name }} за {{ number_format($vehicle->price,0,'.',' ') }} тенге"></a>
                            </div>
                            <div class="content">
                                <div class="header"> <a href='{{ route('spectehnika.vehicle', [$vehicle->id])}}'>{{ $vehicle->name }} ({{ $vehicle->year }} год)</a></div>
                            <div class="meta">
                                <span class="price">{{ number_format($vehicle->price,0,'.',' ') }} тенге</span>
                                <span class="stay">{{ $vehicle->year }} год</span>
                            </div>
                            <div class="description">
                                {!!preg_replace("<br>",'/\.',html_entity_decode($vehicle->description))!!}
                            </div>
                            </div>
                        </div>

                    @endforeach
                    </div>
                        {{ $vehicles->links() }}


                    {{--<div style="padding: 30px 0;">--}}
                        {{--{!! //$type->description !!}--}}
                    {{--</div>--}}
                </div>
            </div>
            <div class="six wide column">

                <div class="modal-header">
                    <h4 class="modal-title">Оставьте заявку</h4>
                </div>
                <div class="modal-body" id="vin">
                    @if(Session::has('message'))
                        <div class="alert alert-info">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <form class="ui form" method="post" action="{{ action('RequestController@getRequestFormParts') }}">
                        {{ csrf_field() }}
                        <div class="field">
                            <label for="inputTel3" class="col-sm-3 control-label">Телефон</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" id="inputTel3" name="telephone" placeholder="+7(777)777-77-77" data-format="+7 (ddd) ddd-dddd" required>
                            </div>

                        </div>
                        <div class="field">
                            <label for="inputName1" class="col-sm-3 control-label">Техника</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputName1" name="type" placeholder="Вилочный погрузчик">
                            </div>
                        </div>
                        <div class="field">
                            <div class="col-sm-offset-3 col-sm-12">
                                <button class="ui primary button" v-on:click="submitted=true" :disabled="submitted" type="submit" onclick="yaCounter39775005.reachGoal('SPECORDER'); return true;" class="btn btn-success">Отправить заявку</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div style="padding-top:30px;"> {!! $type->description_vehicles !!}</div>
    </div>
@endsection
