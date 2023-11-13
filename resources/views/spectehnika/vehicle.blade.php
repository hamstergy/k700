@extends('layouts.app')
@section('title', 'Купить '.$vehicle->type->name.' '.$vehicle->name.' '.$vehicle->year.' года - K700  Азия')
@section('description', $vehicle->type->name.' '.$vehicle->name.' за '.$vehicle->price.' тенге'.'. Год выпуска: '.$vehicle->year.' год. Тип двигателя: '.$vehicle->engine.'. Продажа в Казахстане.')
@section('content')
    <div class="ui container" style="padding: 30px 0;">
        <div class="ui header">
            <div class="sub header" style="padding-bottom:5px;">
                <div class="ui breadcrumb">
                    <a class="section" href="/spectehnika">Каталог</a>
                    <div class="divider"> / </div>
                    <a class="section" href="/spectehnika/{{$vehicle->type->additional}}">{{$vehicle->type->name}}</a>
                    <div class="divider"> / </div>
                    {{$vehicle->type->name}} {{$vehicle->brand->name}}
                </div>
            </div>
            {{--{{ $type->name }}--}}
            <h1 style="margin-top: 4px;">{{$vehicle->type->name.' '.$vehicle->name.' '.$vehicle->year}} года</h1>
        </div>
        <h2>Цена: {{ number_format($vehicle->price, 0, ',', ' ')}} тенге</h2>

        {{--</h1>--}}

        {{--Schema--}}
        <div itemtype="http://schema.org/Product" itemscope>
            <meta itemprop="mpn" content="{{explode(' ', $vehicle->name)[1]}}" />
            <meta itemprop="name" content="{{$vehicle->type->name.' '.$vehicle->name.' '.$vehicle->year}}" />
            <link itemprop="image" href="/images/spectehnika/{{$vehicle->image}}" />
            <meta itemprop="description" content="{{ $vehicle->description }}" />
            <div itemprop="offers" itemtype="http://schema.org/Offer" itemscope>
                <link itemprop="url" href="{{Request::url()}}" />
                <meta itemprop="availability" content="https://schema.org/InStock" />
                <meta itemprop="priceCurrency" content="KZT" />
                <meta itemprop="itemCondition" content="https://schema.org/UsedCondition" />
                <meta itemprop="price" content="{{ number_format($vehicle->price,0,'.','') }}" />
                <meta itemprop="priceValidUntil" content="{{ now()->year }}-12-31" />
                <div itemprop="seller" itemtype="http://schema.org/Organization" itemscope>
                    <meta itemprop="name" content='ИП "PARTS GROUP"' />
                </div>
            </div>
            <meta itemprop="sku" content="{{$vehicle->id}}" />
            <div itemprop="brand" itemtype="http://schema.org/Brand" itemscope>
                <meta itemprop="name" content="{{$vehicle->brand->name}}" />
            </div>
        </div>
        {{--Schema--}}
        <div class="ui two column stackable grid container">
            <div class="ten wide column">
                <div class="row">
                    <div class="ui items">
                    </div>
                    <div>
                        <img class="ui fluid image"
                             src="/images/spectehnika/{{$vehicle->image}}"
                             alt="{{$vehicle->type->name}} {{ $vehicle->name }} за {{ number_format($vehicle->price,0,'.',' ') }} тенге">
                        <p style="padding: 10px 0;">{!! $vehicle->description !!}</p>
                    </div>
                </div>
            </div>
            <div class="six wide column">
                <div>
                    <table class="ui very basic table">
                        <tr>
                            <td>Город</td><td>Алматы</td>
                        </tr>
                        <tr>
                            <td>Год</td><td>{{ $vehicle->year }}</td>
                        </tr>
                        <tr>
                            <td>Тип топлива</td><td>{{ $vehicle->engine }}</td>
                        </tr>
                        <tr>
                            <td>Наработка</td><td>{{ $vehicle->hours }} часов</td>
                        </tr>
                        <tr>
                            <td>Производитель</td><td>{{$vehicle->brand->name}}</td>
                        </tr>
                    </table>
                </div>
                <div class="ui segment" itemscope="" itemtype="http://schema.org/LocalBusiness">
                    <address>
                        <h4 class="modal-title">Контакты</h4>
                        <p style="line-height: 1.7em;">
                            <span itemprop="name">ИП "PARTS GROUP"</span><br>
                            <div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">Республика <span itemprop="addressCountry">Казахстан</span>,<br>г. <span itemprop="addressLocality">Алматы</span>
                            <span itemprop="streetAddress">Cуюнбая 284 Б, бокс 12а</span></div>
                            <a href="tel:+77781400610"><span itemprop="telephone">+7 (778) 140-0610</span></a><br>
                            <a href="tel:+77057784727"><span itemprop="telephone">+7 (705) 778-4727</span></a><br>
                            <a href="mailto:info@partsgroup.kz"><span itemprop="email">info@partsgroup.kz</span></a>
                            <img itemprop="logo" src="/images/partsgroup.png" alt="partsgroup logo" style="display:none;">
                            <img itemprop="image" src="/images/partsgroup.png" alt="partsgroup logo" style="display:none;">
                            <a href="/" itemprop="url" style="display:none;">k700.asia</a>
                            <span itemprop="priceRange" style="display:none;">$40 - $2000</span>
                        </p>
                    </address>
                </div>
                <div class="contact-form">
                    <div class="modal-header" style="padding: 15px 0;">
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
                                    <input type="text" class="form-control" id="inputName1" name="type" placeholder="Вилочный погрузчик" value="{{$vehicle->type->name.' '.$vehicle->name.' '.$vehicle->year}} года">
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
    </div>
@endsection
