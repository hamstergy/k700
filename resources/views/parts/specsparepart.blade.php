@extends('layouts.app')
@section('title', $title.' - K700  Азия')
@section('description', $description)
@section('content')
    <div class="ui container" style="padding: 30px 0;">
        <div class="ui header">
            <div class="sub header">
        <div class="ui breadcrumb">
            <a class="section" href="/parts">Каталог</a>
            <div class="divider"> / </div>
            <div class="active section">{{$type->name}}</div>
        </div>
            </div></div>
        <div class="ui two column stackable grid container">
            <div class="ten wide column">
                @if($type->id == '3')
                    <h1>Каталог запчастей на автовышку</h1>
                @else
                    <h1 class="ui header">Каталог запчастей на {{ Illuminate\Support\Str::lower($type->name) }}</h1>
                @endif
                <p>Выберите запчасть</p>
                <div class="ui accordion" style="padding-bottom: 30px;">

                @foreach($spareparts as $part)

                    <div class="title">
                        <h4>
                            <i class="dropdown icon"></i>{{ $part->name }}
                        </h4>
                    </div>
                        <div class="content">
                            <div class="ui secondary vertical menu">
                            <a class="item" name='{{ $part->name }}' href='{{ route('parts.specbrand', ['spectype' => $type->additional, 'specsparepart' => $part->additional])}}'>
                                {{ $part->name }}
                            </a>
                        @foreach($subparts as $subpart)
                            @if($subpart->groupid == $part->id)
                                
                                <a class="item" name='{{ $part->name }}' href='{{ route('parts.specbrand', ['spectype' => $type->additional, 'specsparepart' => $subpart->additional])}}'>
                                    {{ $subpart->name }}
                                </a>
                            @endif
                        @endforeach
                        </div></div>

                @endforeach
                </div>
            </h1>
            <div class="six wide column">
                <div class="modal-header">
                    <h4 class="modal-title">Оставьте заявку и узнайте наличие и цену на запчасть</h4>
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
                                <input type="text" class="form-control" id="inputName1" name="type" placeholder="Вилочный погрузчик" value="{{$type->name}}">
                            </div>
                        </div>
                        <div class="field">
                            <label for="inputName3" class="col-sm-3 control-label">Марка</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputName3" name="brand" placeholder="CAT">
                            </div>
                        </div>
                        <div class="field">
                            <label for="inputName2" class="col-sm-3 control-label">Запчасть</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputName2" name="parts" placeholder="Втулка шатуна">
                            </div>
                        </div>

                        <div class="field">
                            <div class="col-sm-offset-3 col-sm-12">
                                <button v-on:click="submitted=true" class="ui primary button" :disabled="submitted" type="submit" onclick="yaCounter39775005.reachGoal('SPECORDER'); return true;" class="btn btn-success">Отправить заявку</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection