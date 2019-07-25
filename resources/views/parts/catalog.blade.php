@extends('layouts.app')
@section('title', $title.' - K700  Азия')
@section('description', $description)
@section('content')
    <div class="ui container"  style="padding: 30px 0;">
            <h1 class="ui header">Каталог запчастей для иномарок
            <div class="sub header">
        <div class="ui breadcrumb">
            <div class="active section">Каталог</div>
        </div></h1>
        <h1>Каталог запчастей для иномарок</h1>
            </div> 
        <div class="ui two column stackable grid container">
            <div class="ten wide column">
                    <div class="ui teal progress" data-percent="25">
                        <div class="bar" style="transition-duration: 300ms; width: 25%;"></div><div class="label">25% заполнено</div>
                    </div>
            
            <p>Выберите раздел</p>

                    @php
                       $n = 0;
                    @endphp

                @foreach($spareparts as $part)
                        @php
                            $n++;
                        if($n == 1 or $n == 4 or $n == 7 or $n == 10 or $n == 13 or $n == 16 or $n == 19 or $n == 22) {
                            echo '<div class="row">';
                        }
                        @endphp
                        <div class="col-xs-12 col-lg-4" style="line-height: 1.4;">
                            <h4>
                                <a name='{{ $part->name }}' href='{{ route('catalog.carbrand', ['sparepart' => $part->additional])}}'>
                                    {{ $part->name }}</a>
                            </h4>
                            @foreach($subparts as $subpart)
                                @if($subpart->groupid == $part->id)
                                    <a href='{{ route('catalog.carbrand', ['sparepart' => $subpart->additional])}}' title="{{ $subpart->name }}">{{ $subpart->name }}</a><span style="font-size: 12px;"> | </span>
                                @endif
                            @endforeach
                        </div>

                        @php
                        if($n % 3 == 0 or $n == 22) {
                            echo '</div>';
                        }
                        @endphp

                    @endforeach

            </div>
            <div class="six wide column" id="vin">
                    <div class="modal-header">
                        <h4 class="modal-title">Оставьте заявку и узнайте наличие и цену на запчасть</h4>
                    </div>
                    <div class="modal-body">
                        @if(Session::has('message'))
                            <div class="alert alert-info">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <form class="form-horizontal" method="post" action="{{ action('RequestController@getRequestForm') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="inputTel3" class="col-sm-3 control-label">Телефон</label>
                                <div class="col-sm-9">
                                    <input type="tel" class="form-control" id="inputTel3" name="telephone" placeholder="+7(777)777-77-77" data-format="+7 (ddd) ddd-dddd" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="inputName2" class="col-sm-3 control-label">Запчасть</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputName2" name="parts" placeholder="Амортизатор">
                                </div>
                            </div>
                            <div class="form-group" id="vin">
                                <label for="inputVin3" class="col-sm-3 control-label">VIN-код</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputVin3" name="vin" placeholder="SZ45345345FD34">
                                    <a @click.prevent="show = !show" style="font-size: 12px;">Как узнать VIN-код?</a>
                                </div>
                                <div v-show="show"><img src="/public/images/vincode.png"></div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-12">
                                    <button v-on:click="submitted=true" :disabled="submitted" type="submit" onclick="yaCounter39775005.reachGoal('ORDER'); return true;" class="btn btn-success">Отправить заявку</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection