@extends('layouts.app')
@section('title', $title.' - K700  Азия')
@section('description', $description)
@section('content')
    <div class="ui container" style="padding: 30px 0;">
        <h1 class="ui header">Каталог шин на спецтехнику
            <div class="sub header">
            <div class="ui breadcrumb">Шины
            </div>
            </div>
        </h1>
        <div class="ui two column stackable grid container">
            <div class="ten wide column">
                <p>Выберите раздел</p>
                <div class="ui grid">

                @foreach($spectypes as $type)
                        <div class="four wide column">
                            <h4>
                                <a name='{{ $type->name }}' href='{{ route('tyres.tyres', ['spectype' => $type->additional])}}'>
                                    {{ $type->name }}</a>
                            </h4>
                        </div>
                @endforeach
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