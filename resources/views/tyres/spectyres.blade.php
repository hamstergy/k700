@extends('layouts.app')
@section('title', $title.' - K700  Азия')
@section('description', $description)
@section('content')
    <div class="ui container" style="padding: 30px 0;">
        <h1 class="ui header">
            @if($type->id == '3')
                Шины на автовышку
            @else
                Шины на {{ Illuminate\Support\Str::lower($type->name) }}
            @endif
            <div class="sub header">
            <div class="ui breadcrumb">
                <a class="section" href="/tyres">Шины</a>
                <div class="divider"> / </div>
                {{$type->name}}
            </div>
            </div>
        </h1>
        <div class="ui two column stackable grid container">
            <div id="aper" class="ten wide column">
                <div class="ui teal progress" data-percent="75">
                    <div class="bar" style="transition-duration: 300ms; width: 50%;"></div><div class="label">50% заполнено</div>
                </div>

                {{--<div :json="setJson2({{ $uniquesizes }})"></div>--}}
                {{--<div :json="setJson3({{ $uniquewidths }})"></div>--}}
                {{--<div class="row">--}}
                {{--<div class="form-group col-sm-6">--}}
                {{--<select class="form-control" v-model="search" >--}}
                    {{--<option value="" selected>Выберите размер</option>--}}
                    {{--<option v-for="size in sizer" v-bind:value="size">--}}
                    {{--@{{ size }}--}}
                    {{--</option>--}}
                {{--</select>--}}
                {{--</div>--}}
                {{--<div class="form-group col-sm-6">--}}
                {{--<select class="form-control"v-model="searchtwo" >--}}
                    {{--<option value="" selected>Выберите ширину</option>--}}
                    {{--<option v-for="width in widthr" v-bind:value="width">--}}
                    {{--@{{ width }}--}}
                    {{--</option>--}}
                {{--</select>--}}
                {{--</div>--}}
            {{--</div>--}}
                <div class="row fix">
                    <div class="col-xs-12 col-lg-12 table-responsive" style="line-height: 1.4;">
                        <table class="table table-striped" style="font-size:13px;">  
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название</th>
                                <th scope="col">Размер</th>
                                <th scope="col">Ширина</th>
                                <th scope="col">Тип</th>
                                <th scope="col">Цена, тг.</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tyres as $tyre)
                                    <tr>
                                    <th scope="row">{{ $tyre->id }}</th>
                                    <td>{{ $tyre->name }}</td>
                                    <td>{{ $tyre->size }}</td>
                                    <td>{{ $tyre->width }}</td>
                                    <td>{{ $tyre->description }}</td>
                                    <td>{{ number_format($tyre->price,0) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="padding: 30px 0;">
                            {!! $type->description !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="six wide column">
                <div class="modal-header">
                    <h4 class="modal-title">Оставьте заявку и узнайте наличие</h4>
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
                            <label for="inputName2" class="col-sm-3 control-label">Размер</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputName2" name="parts" placeholder="23x8.50-12">
                            </div>
                        </div>
                        <div class="field">
                                <label for="inputName3" class="col-sm-3 control-label">Количество</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputName3" name="brand" placeholder="6 штук">
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
    </div>
@endsection