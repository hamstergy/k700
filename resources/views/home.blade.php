@extends('layouts.app')
@section('title', $title.' - K700  Азия')
@section('description', $description)
@section('content')
<div class="ui inverted vertical masthead aligned segment">

    <div class="ui container top-menu">
        <div class="ui large secondary inverted pointing menu">
            <a class="toc item">
                <i class="sidebar icon"></i>
            </a>
            <a class="item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">Главная</a>
            <a class="item {{ Route::currentRouteName() == 'spectehnika/*' || Route::currentRouteName() == 'spectehnika' ? 'active' : '' }}" href="{{ route('spectehnika') }}">Спецтехника</a>
            <a class="item {{ Route::currentRouteName() == 'parts/*' || Route::currentRouteName() == 'parts' ? 'active' : '' }}" href="{{ route('parts') }}">Запасные части</a>
            <a class="item {{ Route::currentRouteName() == 'tyres/*' || Route::currentRouteName() == 'tyres' ? 'active' : '' }}" href="{{ route('tyres') }}">Шины</a>
            <a class="item {{ Route::currentRouteName() == 'repair/*' || Route::currentRouteName() == 'repair' ? 'active' : '' }}" href="{{ route('repair') }}">Ремонт</a>

                {{-- <a class="item">Сервис</a> --}}
            <h1 class="item right floated" style="font-size: 1.2em;">Cпецтехника и запасные части</h1>
        </div>
    </div>
    <div class="ui stackable grid container">
    <div class="three column row">
        <div class="column">
            <div class="ui container">
                <h2 class="ui inverted header">
                    СПЕЦТЕХНИКА<br>ИЗ ЯПОНИИ
                </h2>
                <h2>Контрактная японская спецтехника в наличии</h2>
                <a href="{{ route('spectehnika')}}"><div class="ui small inverted basic button">Спецтехника <i class="right arrow icon"></i></div></a>
            </div>
        </div>
        <div class="column">
            <div class="ui container">
                <h2 class="ui inverted header">
                    ЗАПАСНЫЕ ЧАСТИ<br>НА СПЕЦТЕХНИКУ
                </h2>
                <h2>Запасные части<br>в наличии и под заказ</h2>
                <a href="{{ route('parts')}}"><div class="ui small inverted basic button">Запасные части <i class="right arrow icon"></i></div></a>
            </div>
        </div>
        <div class="column">
            <div class="ui container">
                <h2 class="ui inverted header">
                    ШИНЫ<br>НА СПЕЦТЕХНИКУ
                </h2>
                <h2>Огромный выбор шин<br>в наличии</h2>
                <a href="{{ route('tyres')}}"><div class="ui small inverted basic button">Шины <i class="right arrow icon"></i></div></a>
            </div>

        </div>
    </div>
    </div>

</div>

<div class="ui vertical stripe segment" id="featured">
    <div class="ui middle aligned stackable grid container">
      <div class="row">

          <div class="ui link cards centered">
              @foreach($vehicles as $type)

                  <div class="card">
                      <div class="image">
                          <a href='{{ route('spectehnika.vehicle', ['vehicle' => $type->id])}}'>
                              <img class="ui image fluid" data-src="/images/spectehnika/{{$type->image}}" src="/images/default.png" alt="{{$type->type->name}} {{ $type->name }} за {{ number_format($type->price,0,'.',' ') }} тенге">
                          </a>
                      </div>
                      <div class="content">
                          <div class="header"><a href='{{ route('spectehnika.vehicle', ['vehicle' => $type->id])}}'>{{ $type->name }}</a></div>
                          <div class="meta">
                              {{$type->type->name}}
                          </div>
                          <div class="description" style="
                  overflow: hidden;
                  text-overflow: ellipsis;
                  display: -webkit-box;
                  -webkit-box-orient: vertical;
                  -webkit-line-clamp: 3;">
                              {!!preg_replace("<br>",'/\.',html_entity_decode($type->description))!!}
                          </div>
                      </div>
                      <div class="extra content">
              <span class="right floated">
                {{ $type->year }} год
              </span>
                          <span>
                <i class="money bill alternate outline icon"></i>
                {{ number_format($type->price,0,'.',' ') }}
              </span>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
      <div class="row">
        <div class="center aligned column">
          <a class="ui huge button" href="/spectehnika">Посмотреть еще</a>
        </div>
      </div>
    </div>
</div>
<div class="ui vertical stripe segment">
    <div class="ui text container">
      @foreach($posts as $post)
      <h4 class="ui horizontal header divider">{{$post->category}}</h4>
      <a href="/posts/{{$post->id}}"><h3 class="ui header">{{$post->name}}</h3></a>
      <p>{{$post->meta_desc}}</p>
    <a href="/posts/{{$post->id}}" class="ui large button">Читать статью</a>
      @endforeach
    </div>
</div>
@endsection
