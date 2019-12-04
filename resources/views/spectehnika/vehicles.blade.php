@extends('layouts.app')
@section('title', $title.' - K700  Азия')
@section('description', $description)
@section('content')
    <div class="ui container" style="padding: 30px 0;">
        <div class="ui breadcrumb">
            <a class="section" href="/spectehnika">Каталог</a>
            <div class="divider"> / </div>
            <div class="active section">{{$type->name}}</div>
        </div>
        <div class="ui two column stackable grid container">
            <div class="ten wide column">
                <h1>Купить {{ Illuminate\Support\Str::lower($type->name)}}</h1>
                <div class="row">
                    <div class="ui items">
                    @foreach($vehicles as $type)
                        <div class="item">
                            <div class="ui small image">
                            <img src="/images/spectehnika/{{$type->image}}">
                            </div>
                            <div class="content">
                            <div class="header">{{ $type->name }} ({{ $type->year }} год)</div>
                            <div class="meta">
                                <span class="price">{{ number_format($type->price,0,'.',' ') }} тенге</span>
                                <span class="stay">{{ $type->year }} год</span>
                            </div>
                            <div class="description">
                                {!!preg_replace("<br>",'/\.',html_entity_decode($type->description))!!}
                            </div>
                            </div>
                        </div>
                    
                    @endforeach
                    </div>
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
    </div>
@endsection