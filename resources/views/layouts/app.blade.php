<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>App Name - @yield('title')</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/funciones.js') }}"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/modern-business.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/signature-pad.css') }}" rel="stylesheet" type="text/css"/>

        <!--Styles Signature-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script src="{{ asset('js/sig/signature_pad.umd.js') }}" defer></script>
        <script src="{{ asset('js/sig/app.js') }}" defer></script>
        <script src="https://js.stripe.com/v3/"></script>
        @stack('styles')
    </head>
    <body>
        <div id="app">
            <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <!--<img class="logo" src="{{action("HomeController@getImageCompany",'LOGO2.PNG')}}"/>-->
                        <p style="margin: 0px;">APLICANT-<span class="pro">PRO</span></p>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('business.list') }}">{{ __('List Companies') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @else
                            
                            @if(Auth::user()->id && Auth::user()->role == 'admin')
                            <a class="nav-link" href="{{ route('planes.index',Auth::user()->id) }}">Admin Business Plans</a>
                            @else
                            <a class="nav-link" href="#">Business Plans</a>
                            @endif
                            <a class="nav-link" href="{{ action('HomeController@listaplications',Auth::user()->id) }}">{{ __('List Aplications') }}</a>
                            @if(session("empresas")!= null)
                               <a class="nav-link" href="{{ route('company.index',Auth::user()->id) }}">New Application</a>
                               <a class="nav-link" href="{{ route('pruebas') }}">Utilies</a>
                            @endif
                            <li>
                                @include('includes.avatar')
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();   document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ action('HomeController@configuration',Auth::user()->id) }}" >
                                        Configuration
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>
        @stack('scripts')
    </body>
</html>


