@extends('layouts.app')
@section('title', $title.' - K700  Азия')
@section('description', $description)
@section('content')
    <div class="ui container" style="padding: 30px 0;">
            @if($type->id == '3')
                <h1>Каталог запчастей на автовышку
            @else
                <h1 class="ui header">Каталог запчастей на {{ Illuminate\Support\Str::lower($type->name) }}
            @endif
            <div class="sub header">
        <div class="ui breadcrumb">
            <a class="section" href="/parts">Каталог</a>
            <div class="divider"> / </div>
            <div class="active section">{{$type->name}}</div>
        </div>
            </div></h1>
        <div class="ui two column stackable grid container">
            <div class="ten wide column">
                <div class="ui teal progress" data-percent="50">
                    <div class="bar" style="transition-duration: 300ms; width: 50%;"></div><div class="label">50% заполнено</div>
                </div>


                <p>Выберите запчасть</p>
                <div class="row fix">

                @foreach($spareparts as $part)

                    <div class="col-xs-12 col-lg-4" style="line-height: 1.4;">
                        <h4>
                            <a name='{{ $part->name }}' href='{{ route('parts.specbrand', ['spectype' => $type->additional, 'specsparepart' => $part->additional])}}'>
                                {{ $part->name }}
                            </a>
                        </h4>
                        @foreach($subparts as $subpart)
                            @if($subpart->groupid == $part->id)
                                <a name='{{ $part->name }}' href='{{ route('parts.specbrand', ['spectype' => $type->additional, 'specsparepart' => $subpart->additional])}}'>
                                    {{ $subpart->name }}
                                </a>
                                <span style="font-size: 12px;"> | </span>
                            @endif
                        @endforeach
                    </div>

                @endforeach
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
                                <input type="text" class="form-control" id="inputName2" name="parts" placeholder="Втулка шатуна">
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