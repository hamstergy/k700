@extends('layouts.app')

@section('content')
<style>
    .top-menu {
      padding: 30px 0;
    }
    .masthead.segment {
        padding: 0em 0em 3em;
      background: #006fa5 !important;
        background: rgb(0,92,136) !important;
        background: linear-gradient(90deg, rgba(0,92,136,1) 0%, rgba(41,164,224,1) 50%, rgba(0,92,136,1) 100%) !important;
    }
    .masthead .logo.item img {
      margin-right: 1em;
    }
    .masthead .ui.menu .ui.button {
      margin-left: 0.5em;
    }
    .masthead h1.ui.header {
      margin-top: 1em;
      margin-bottom: 0em;
      font-size: 2em;
      font-weight: normal;
    }
    .masthead h2 {
      font-size: 1.3em;
      font-weight: normal;
    }

    .ui.vertical.stripe {
      padding: 3em 0em;
    }
    .ui.vertical.stripe h3 {
      font-size: 2em;
    }
    .ui.vertical.stripe .button + h3,
    .ui.vertical.stripe p + h3 {
      margin-top: 3em;
    }
    .ui.vertical.stripe .floated.image {
      clear: both;
    }

    .ui.vertical.stripe .horizontal.divider {
      margin: 2em 0em;
    }

    .quote.stripe.segment {
      padding: 0em;
    }
    .quote.stripe.segment .grid .column {
      padding-top: 5em;
      padding-bottom: 5em;
    }

    .footer.segment {
      padding: 5em 0em;
    }

    .secondary.pointing.menu .toc.item {
      display: none;
    }

    @media only screen and (max-width: 700px) {
      .ui.fixed.menu {
        display: none !important;
      }
      .secondary.pointing.menu .item,
      .secondary.pointing.menu .menu {
        display: none;
      }
      .secondary.pointing.menu .toc.item {
        display: block;
      }
      .masthead.segment {
        min-height: 350px;
          background: #006fa5 !important;
      }
      .masthead h1.ui.header {
        font-size: 2em;
        margin-top: 1.5em;
      }
      .masthead h2 {
        margin-top: 0.5em;
        font-size: 1.5em;
      }
      .top-menu {
        padding: 0px;
      }
    }
  </style>
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
                {{-- <a class="item">Сервис</a> --}}
        </div>
        </div>
        <div class="ui stackable grid container">
        <div class="three column row">
            <div class="column">
                <div class="ui container">
                    <h1 class="ui inverted header">
                        СПЕЦТЕХНИКА<br>ИЗ ЯПОНИИ
                    </h1>
                    <h2>Контрактная японская спецтехника в наличии</h2>
                    <a href="{{ route('spectehnika')}}"><div class="ui small inverted basic button">Спецтехника <i class="right arrow icon"></i></div></a>
                </div>
            </div>
            <div class="column">
                <div class="ui container">
                    <h1 class="ui inverted header">
                        ЗАПАСНЫЕ ЧАСТИ<br>НА СПЕЦТЕХНИКУ
                    </h1>
                    <h2>Запасные части<br>в наличии и под заказ</h2>
                    <a href="{{ route('parts')}}"><div class="ui small inverted basic button">Запасные части <i class="right arrow icon"></i></div></a>
                </div>
            </div>
            <div class="column">
                <div class="ui container">
                    <h1 class="ui inverted header">
                        ШИНЫ<br>НА СПЕЦТЕХНИКУ
                    </h1>
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
