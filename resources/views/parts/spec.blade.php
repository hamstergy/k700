@extends('layouts.app')
@section('title', $title.' - K700  Азия')
@section('description', $description)
@section('content')
    <div class="ui container" style="padding: 30px 0;">
        <div class="ui header">
            <div class="sub header">
                <div class="ui breadcrumb">
                    <div class="active section">Каталог</div>
                </div>
            </div>
        </div>
        <div class="ui two column stackable grid container">
            <div class="ten wide column">
            <h1>Каталог запчастей на спецтехнику</h1>
            <p>Выберите раздел</p>
                <div class="row">
                <div class="ui grid">
                @foreach($spectypes as $type)

                        <div class="eight wide column" style="line-height: 1.4;">
                            <h4>
                                <a name='{{ $type->name }}' href='{{ route('parts.specsparepart', [$type->additional])}}'>
                                    {{ $type->name }}</a>
                            </h4>
                        </div>
                @endforeach
                </div>
                </div>

            </div>
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
                                    <input type="text" class="form-control" id="inputName1" name="type" placeholder="Вилочный погрузчик">
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
