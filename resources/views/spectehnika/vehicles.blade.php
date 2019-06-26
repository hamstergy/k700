@extends('layouts.app')
@section('title', $title.' - ROOMIX')
@section('description', $description)
@section('content')
    <div class="ui container">
        <div class="ui breadcrumb">
            <a class="section" href="/spectehnika">Каталог</a>
            <div class="divider"> / </div>
            <div class="active section">{{$type->name}}</div>
        </div>
        <div class="ui two column stackable grid container">
            <div class="ten wide column">
                <h1>Купить {{ Illuminate\Support\Str::lower($type->name)}}</h1>
                <div class="row">


                </div>

                <div class="row my-3">
                    @foreach($vehicles as $type)
                    <div class="col-md-6">
                        <div class="card mb-4 shadow-sm">
                            <div class="text-center" style="background-image:url('/images/spectehnika/{{$type->image}}');
                            width:100%;
                            height:250px;
                            background-repeat:no-repeat;
                            background-size:cover;
                                    position: relative;">

                                <div class="bg-light"style="position: absolute;bottom: 0;
                                            left: 0;
                                            width: 100%;">
                                    <h3>{{ $type->name }} ({{ $type->year }} год)</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                    <p class="card-text" style="height: 107px;overflow: hidden;">{!!html_entity_decode($type->description)!!}</p>
                                    <div class="d-flex justify-content-between align-items-center">

                                        <strong class="d-inline-block mb-2 text-success">{{ number_format($type->price,0,'.',' ') }} тенге</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
                    <form class="form-horizontal" method="post" action="{{ action('RequestController@getRequestFormSpec') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="inputTel3" class="col-sm-3 control-label">Телефон</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" id="inputTel3" name="telephone" placeholder="+7(777)777-77-77" data-format="+7 (ddd) ddd-dddd" required>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="inputName1" class="col-sm-3 control-label">Техника</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputName1" name="type" placeholder="Вилочный погрузчик">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-12">
                                <button v-on:click="submitted=true" :disabled="submitted" type="submit" onclick="yaCounter39775005.reachGoal('SPECORDER'); return true;" class="btn btn-success">Отправить заявку</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection