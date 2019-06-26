@extends('layouts.app')
@section('title', $title.' - ROOMIX')
@section('description', $description)
@section('content')
    <div class="ui container">
            <h1 class="ui header">{{$parts->name}} на {{ Illuminate\Support\Str::lower($type->name) }}
            <div class="sub header">
        <div class="ui breadcrumb">
            <a class="section" href="/parts">Каталог</a>
            <div class="divider"> / </div>
            <a class="section" href="/parts/{{$type->additional}}">{{$type->name}}</a>
            <div class="divider"> / </div>
            <div class="active section">{{$parts->name}}</div>
        </div>
            </div>
        </h1>
        <div class="ui two column stackable grid container">
            <div class="ten wide column">

                    <div class="ui teal progress" data-percent="75">
                            <div class="bar" style="transition-duration: 300ms; width: 75%;"></div><div class="label">75% заполнено</div>
                        </div>

                <h1>{{$parts->name}} на {{ Illuminate\Support\Str::lower($type->name) }}</h1>
                <p>Выберите марку спецтехники</p>

                @foreach($type->brands as $brand)
                    <div class="col-xs-6 col-lg-3">
                        <h4>
                            <a name='{{ $brand->name }}' href='{{ route('parts.specmodel', ['spectype' => $type->additional, 'specsparepart' => $parts->additional, 'specbrand' => $brand->additional])}}'>
                                {{ $brand->name }}
                            </a>
                        </h4>
                    </div>
                @endforeach

            </div>

            <div class="six wide column col-xs-12">
                <div class="modal-header">
                    <h4 class="modal-title">Оставьте заявку и узнайте наличие и цену на запчасть</h4>
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
                                <input type="text" class="form-control" id="inputName1" name="type" placeholder="Вилочный погрузчик" value="{{$type->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName3" class="col-sm-3 control-label">Марка</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputName3" name="brand" placeholder="CAT">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName2" class="col-sm-3 control-label">Запчасть</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputName2" name="parts" placeholder="Втулка шатуна" value="{{$parts->name}}">
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
        <hr>
        <h4>Сопутствующие разделы</h4>
        @foreach($subparts as $subpart)
            <div class="col-xs-6 col-lg-3">
                <h5><a name='{{ $subpart->name }}' href='{{ route('parts.specbrand', ['spectype' => $type->additional, 'specsparepart' => $subpart->additional])}}'>{{ $subpart->name }}</a></h5>
            </div>
        @endforeach
    </div>
@endsection