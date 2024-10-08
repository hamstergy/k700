<!doctype html>
<html lang="ru">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-146491685-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-146491685-1');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">

    <title>@yield('title', 'K700 Азия')</title>
    <meta name="description" content="@yield('description', 'Спецтехника в Казахстане, Кыргызстане, Узбекистане')">

    <link rel="stylesheet" type="text/css" href="/dist/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <style>
    .ui.secondary.pointing.menu {
        border-bottom: 0px solid rgba(34,36,38,.15) !important;
    }
    .ui.secondary.inverted.pointing.menu {
        border-color: rgba(255,255,255,0) !important;
    }

    .hidden.menu {
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
      .fullsite.segment {
        padding: 0;
        margin-bottom: 20px !important;
      }
      .fullsite h1.ui.header {
        font-size: 2em;
        margin-top: 1.5em;
      }
      .fullsite h2 {
        margin-top: 0.5em;
        font-size: 1.5em;
      }
    }
    nav {
        text-align: center;
    }
    .pagination {
        margin: 0em;
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        vertical-align: middle;
    }

    .pagination .page-item:last-child {
        border-radius: 0em 0.28571429rem 0.28571429rem 0em;
    }

    .ui.compact.menu .page-item:last-child {
        border-radius: 0em 0.28571429rem 0.28571429rem 0em;
    }

    .pagination .page-item:last-child:before {
        display: none;
    }

    .pagination .page-item {
        position: relative;
        vertical-align: middle;
        line-height: 1;
        text-decoration: none;
        -webkit-tap-highlight-color: transparent;
        -webkit-box-flex: 0;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background: none;
        padding: 0.92857143em 1.14285714em;
        text-transform: none;
        color: rgba(0, 0, 0, 0.87);
        font-weight: normal;
        -webkit-transition: background 0.1s ease, color 0.1s ease, -webkit-box-shadow 0.1s ease;
        transition: background 0.1s ease, color 0.1s ease, -webkit-box-shadow 0.1s ease;
        transition: background 0.1s ease, box-shadow 0.1s ease, color 0.1s ease;
        transition: background 0.1s ease, box-shadow 0.1s ease, color 0.1s ease, -webkit-box-shadow 0.1s ease;
        list-style-type: none;
        min-width: 3em;
        text-align: center;
    }

    .pagination .icon.page-item i.icon {
        vertical-align: top;
    }


    /* Active */

    .pagination .active.page-item {
        border-top: none;
        /*padding-top: 0.92857143em;*/
        background-color: rgba(0, 0, 0, 0.05);
        color: rgba(0, 0, 0, 0.95);
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    </style>
    <!-- Global site tag (gtag.js) - Google Ads: 991462761 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-991462761"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-991462761');
    </script>
    <!-- Event snippet for Page view conversion page -->
    <script>
        gtag('event', 'conversion', {
            'send_to': 'AW-991462761/64StCLT6mtcBEOmK4tgD',
            'value': 0.06,
            'currency': 'USD'
        });
    </script>
</head>
<body class="pushable">
    <!-- Following Menu -->
    <div class="ui large top fixed hidden menu">
      <div class="ui container">
        <a class="item {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Главная</a>
        <a class="item {{ Request::is('spectehnika/*')  || Request::is('spectehnika') ? 'active' : '' }}" href="{{ route('spectehnika') }}">Спецтехника</a>
        <a class="item {{ Request::is('parts/*') || Request::is('parts')  ? 'active' : '' }}" href="{{ route('parts') }}">Запасные части</a>
        <a class="item {{ Request::is('tyres/*')  || Request::is('tyres')  ? 'active' : '' }}" href="{{ route('tyres') }}">Шины</a>
        <a class="item {{ Request::is('repair/*')  || Request::is('repair')  ? 'active' : '' }}" href="{{ route('repair') }}">Ремонт</a>
{{-- <a class="item {{ Route::currentRouteName() == 'specservice' ? 'active' : '' }}" href="{{ route('specservice') }}">Сервис</a> --}}
        {{-- <div class="right menu">
          <div class="item">
            <a class="ui button">Log in</a>
          </div>
          <div class="item">
            <a class="ui primary button">Sign Up</a>
          </div>
        </div> --}}
      </div>
    </div>

    <!-- Sidebar Menu -->
    <div class="ui vertical inverted sidebar menu left uncover" style="">
        <a class="item {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Главная</a>
        <a class="item {{ Request::is('spectehnika/*')  || Request::is('spectehnika') ? 'active' : '' }}" href="{{ route('spectehnika') }}">Спецтехника</a>
        <a class="item {{ Request::is('parts/*') || Request::is('parts')  ? 'active' : '' }}" href="{{ route('parts') }}">Запасные части</a>
        <a class="item {{ Request::is('tyres/*')  || Request::is('tyres')  ? 'active' : '' }}" href="{{ route('tyres') }}">Шины</a>
        <a class="item {{ Request::is('repair/*')  || Request::is('repair')  ? 'active' : '' }}" href="{{ route('repair') }}">Ремонт</a>

        {{-- <a class="item">Сервис</a> --}}
        {{-- <a class="item">Login</a>
        <a class="item">Signup</a> --}}
    </div>

    <div class="pusher">
            @if (Route::currentRouteName() != 'home')
            <div class="ui inverted fullsite vertical center aligned segment">

                <div class="ui container">

                <div class="ui large secondary inverted pointing menu">
                    <a class="toc item">
                    <i class="sidebar icon"></i>
                    </a>

                    <a class="item {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Главная</a>
                    <a class="item {{ Request::is('spectehnika/*')  || Request::is('spectehnika') ? 'active' : '' }}" href="{{ route('spectehnika') }}">Спецтехника</a>
                    <a class="item {{ Request::is('parts/*') || Request::is('parts')  ? 'active' : '' }}" href="{{ route('parts') }}">Запасные части</a>
                    <a class="item {{ Request::is('tyres/*')  || Request::is('tyres')  ? 'active' : '' }}" href="{{ route('tyres') }}">Шины</a>
                    <a class="item {{ Request::is('repair/*')  || Request::is('repair')  ? 'active' : '' }}" href="{{ route('repair') }}">Ремонт</a>
                    <div class="toc item right">K700.ASIA</div>
                    <a class="toc item right" href="tel:87272901335"><i class="phone icon"></i></a>
                </div>
                </div>
            </div>
            @endif
        @yield('content')
    </div>
    {{--@if (Route::has('login'))--}}
        {{--<div class="top-right links">--}}
            {{--@auth--}}
                {{--<a href="{{ url('/home') }}">Home</a>--}}
            {{--@else--}}
                {{--<a href="{{ route('login') }}">Login</a>--}}

                {{--@if (Route::has('register'))--}}
                    {{--<a href="{{ route('register') }}">Register</a>--}}
                {{--@endif--}}
            {{--@endauth--}}
        {{--</div>--}}
    {{--@endif--}}

    <div class="ui inverted vertical footer segment">
        <div class="ui container">
            <div class="ui stackable inverted divided equal height stackable grid">
            <div class="four wide column">
                <h4 class="ui inverted header">Разделы</h4>
                <div class="ui inverted vertical menu">
                <a class="item {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Главная</a>
                <a class="item {{ Request::is('spectehnika/*')  || Request::is('spectehnika') ? 'active' : '' }}" href="{{ route('spectehnika') }}">Спецтехника</a>
                <a class="item {{ Request::is('parts/*') || Request::is('parts')  ? 'active' : '' }}" href="{{ route('parts') }}">Запасные части</a>
                <a class="item {{ Request::is('tyres/*')  || Request::is('tyres')  ? 'active' : '' }}" href="{{ route('tyres') }}">Шины</a>
                <a class="item {{ Request::is('repair/*')  || Request::is('repair')  ? 'active' : '' }}" href="{{ route('repair') }}">Ремонт</a>
                {{-- <a class="item">Сервис</a> --}}
                </div>
            </div>
            {{-- <div class="three wide column">
                <h4 class="ui inverted header">О нас</h4>
                <div class="ui inverted link list">
                <a href="#" class="item">Banana Pre-Order</a>
                <a href="#" class="item">DNA FAQ</a>
                <a href="#" class="item">How To Access</a>
                <a href="#" class="item">Favorite X-Men</a>
                </div>
            </div> --}}
            <div class="three wide column">
                <h4 class="ui inverted header">Контакты</h4>
                <div class="ui inverted vertical menu">
                    <a class="item" href="tel:87272901335">+7 (727) 290-1335</a>
                    <a class="item" href="tel:87057784727">+7 (705) 778-4727</a>
                </div>
            </div>
            <div class="three wide column">
                <h4 class="ui inverted header">Склад</h4>
                <div class="ui inverted vertical menu">
                    <a class="item" href="tel:87477309400">+7 (747) 730-9400</a>
                    <a class="item" href="tel:87059606287">+7 (705) 960-6287</a>
                </div>
            </div>
            <div class="six wide column" itemscope="" itemtype="http://schema.org/LocalBusiness">
              <address>
                <h4 class="ui inverted header">Адрес</h4>
                <div class="ui inverted" >
                    <p style="line-height: 1.6em;">
                        <span itemprop="name">ИП "PARTS GROUP"</span><br>
                        <div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">Республика <span itemprop="addressCountry">Казахстан</span>,<br>г. <span itemprop="addressLocality">Алматы</span>
                        <span itemprop="streetAddress">Cуюнбая 284 Б, бокс 12а</span></div>
                        <a href="tel:+77781400610"><span itemprop="telephone">+7 (778) 140 0610</span></a><br>
                        <a href="mailto:info@partsgroup.kz"><span itemprop="email">info@partsgroup.kz</span></a>
                        <img itemprop="logo" src="/images/partsgroup.png" alt="partsgroup logo" style="display:none;">
                        <img itemprop="image" src="/images/partsgroup.png" alt="partsgroup logo" style="display:none;">
                        <a href="/" itemprop="url" style="display:none;">k700.asia</a>
                        <span itemprop="priceRange" style="display:none;">$40 - $2000</span>
                    </p>
                </div>
              </address>
            </div>
            </div>
        </div>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
                // fix menu when passed
                $('.masthead')
                    .visibility({
                    once: false,
                    onBottomPassed: function() {
                        $('.fixed.menu').transition('fade in');
                    },
                    onBottomPassedReverse: function() {
                        $('.fixed.menu').transition('fade out');
                    }
                    });
                $('.fullsite')
                    .visibility({
                    once: false,
                    onBottomPassed: function() {
                        $('.fixed.menu').transition('fade in');
                    },
                    onBottomPassedReverse: function() {
                        $('.fixed.menu').transition('fade out');
                    }
                    });
                // create sidebar and attach to menu open
                $('.ui.sidebar')
                    .sidebar('attach events', '.toc.item');
                $('.ui.accordion')
                    .accordion();
                });

        </script>
    <script src="/dist/semantic.min.js"></script>
    <script>
        $('.card .image img')
            .visibility({
                type       : 'image',
                transition : 'fade in',
                duration   : 1000
            });
        $('.item .image a img')
            .visibility({
                type       : 'image',
                transition : 'fade in',
                duration   : 1000
            });
    </script>
    <!-- Yandex.Metrika counter -->
    <script>
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
        ym(55074046, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/55074046" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</body>
</html>
