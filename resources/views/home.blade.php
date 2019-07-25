@extends('layouts.app')

@section('content')

<style type="text/css">

    .masthead.segment {
      min-height: 700px;
      padding: 1em 0em;
      background: #006fa5 !important;
    }
    .masthead .logo.item img {
      margin-right: 1em;
    }
    .masthead .ui.menu .ui.button {
      margin-left: 0.5em;
    }
    .masthead h1.ui.header {
      margin-top: 3em;
      margin-bottom: 0em;
      font-size: 4em;
      font-weight: normal;
    }
    .masthead h2 {
      font-size: 1.7em;
      font-weight: normal;
    }

    .ui.vertical.stripe {
      padding: 8em 0em;
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
      margin: 3em 0em;
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
      }
      .masthead h1.ui.header {
        font-size: 2em;
        margin-top: 1.5em;
      }
      .masthead h2 {
        margin-top: 0.5em;
        font-size: 1.5em;
      }
    }
  </style>

    <div class="ui inverted vertical masthead center aligned segment">

        <div class="ui container" style="padding: 30px 0;">
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

        <div class="ui text container">
        <h1 class="ui inverted header">
            СПЕЦТЕХНИКА ИЗ ЯПОНИИ
        </h1>
        <h2>Контрактная японская спецтехника в наличии</h2>
        <a href="#featured"><div class="ui huge primary button">Наша техника <i class="right arrow icon"></i></div></a>
        </div>

  </div>

  <div class="ui vertical stripe segment" id="featured">
        <div class="ui middle aligned stackable grid container">
          <div class="row">
            <div class="eight wide column">
                <div class="ui items">
                    <div class="item">
                        <div class="ui small image">
                        <img src="https://mdbootstrap.com/img/Photos/Others/photo6.jpg">
                        </div>
                        <div class="content">
                        <a class="header">Arrowhead Valley Camp</a>
                            <div class="meta">
                                <span class="price">$1200</span>
                                <span class="stay">1 Month</span>
                            </div>
                            <div class="description">
                                <p>Трансмиссия механика<br>
                                    Год выпуска: 2010<br>
                                    Грузоподъемность: 1,5тонны<br>
                                    Тип топлива: бензин<br>
                                    Высота подъёма мачты: 4, 0 метра<br>
                                    Колеса цельнолетые (непротыкаемые)
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ui small image">
                        <img src="https://mdbootstrap.com/img/Photos/Others/photo6.jpg">
                        </div>
                        <div class="content">
                        <a class="header">Buck's Homebrew Stayaway</a>
                        <div class="meta">
                            <span class="price">$1000</span>
                            <span class="stay">2 Weeks</span>
                        </div>
                        <div class="description">
                            <p>Трансмиссия механика<br>
                                Год выпуска: 2010<br>
                                Грузоподъемность: 1,5тонны<br>
                                Тип топлива: бензин<br>
                                Высота подъёма мачты: 4, 0 метра<br>
                                Колеса цельнолетые (непротыкаемые)
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ui small image">
                        <img src="https://mdbootstrap.com/img/Photos/Others/photo6.jpg">
                        </div>
                        <div class="content">
                        <a class="header">Astrology Camp</a>
                        <div class="meta">
                            <span class="price">$1600</span>
                            <span class="stay">6 Weeks</span>
                        </div>
                        <div class="description">
                            <p>Трансмиссия механика<br>
                                Год выпуска: 2010<br>
                                Грузоподъемность: 1,5тонны<br>
                                Тип топлива: бензин<br>
                                Высота подъёма мачты: 4, 0 метра<br>
                                Колеса цельнолетые (непротыкаемые)
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="eight wide column">
                <div class="ui items">
                    <div class="item">
                        <div class="ui small image">
                        <img src="https://mdbootstrap.com/img/Photos/Others/photo6.jpg">
                        </div>
                        <div class="content">
                        <a class="header">Arrowhead Valley Camp</a>
                        <div class="meta">
                            <span class="price">$1200</span>
                            <span class="stay">1 Month</span>
                        </div>
                        <div class="description">
                            <p>Трансмиссия механика<br>
                                Год выпуска: 2010<br>
                                Грузоподъемность: 1,5тонны<br>
                                Тип топлива: бензин<br>
                                Высота подъёма мачты: 4, 0 метра<br>
                                Колеса цельнолетые (непротыкаемые)
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ui small image">
                        <img src="https://mdbootstrap.com/img/Photos/Others/photo6.jpg">
                        </div>
                        <div class="content">
                        <a class="header">Buck's Homebrew Stayaway</a>
                        <div class="meta">
                            <span class="price">$1000</span>
                            <span class="stay">2 Weeks</span>
                        </div>
                        <div class="description">
                            <p>Трансмиссия механика<br>
                                Год выпуска: 2010<br>
                                Грузоподъемность: 1,5тонны<br>
                                Тип топлива: бензин<br>
                                Высота подъёма мачты: 4, 0 метра<br>
                                Колеса цельнолетые (непротыкаемые)
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ui small image">
                        <img src="https://mdbootstrap.com/img/Photos/Others/photo6.jpg">
                        </div>
                        <div class="content">
                        <a class="header">Astrology Camp</a>
                        <div class="meta">
                            <span class="price">$1600</span>
                            <span class="stay">6 Weeks</span>
                        </div>
                        <div class="description">
                            <p>Трансмиссия механика<br>
                                Год выпуска: 2010<br>
                                Грузоподъемность: 1,5тонны<br>
                                Тип топлива: бензин<br>
                                Высота подъёма мачты: 4, 0 метра<br>
                                Колеса цельнолетые (непротыкаемые)
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="center aligned column">
              <a class="ui huge button">Check Them Out</a>
            </div>
          </div>
        </div>
    </div>


    <div class="ui vertical stripe segment">
        <div class="ui text container">
          <h3 class="ui header">Breaking The Grid, Grabs Your Attention</h3>
          <p>Instead of focusing on content creation and hard work, we have learned how to master the art of doing nothing by providing massive amounts of whitespace and generic content that can seem massive, monolithic and worth your attention.</p>
          <a class="ui large button">Read More</a>
          <h4 class="ui horizontal header divider">
            <a href="#">Case Studies</a>
          </h4>
          <h3 class="ui header">Did We Tell You About Our Bananas?</h3>
          <p>Yes I know you probably disregarded the earlier boasts as non-sequitur filler content, but its really true. It took years of gene splicing and combinatory DNA research, but our bananas can really dance.</p>
          <a class="ui large button">I'm Still Quite Interested</a>
        </div>
    </div>
@endsection