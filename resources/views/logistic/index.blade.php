<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--  title  --}}
    <title>CLADESYS - LOGISTIC</title>

    <style>
    #contenido {opacity:0.5;} 
	#cargando {
		position:absolute;
		top:50%;
		left:50%;
		width:100%;
		height:100%;
	}
    </style>
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.css') }} ">
    <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.css') }} ">
    {{--  <link rel="stylesheet" href="{{ asset('css/bootstrap-simplex.min.css') }} ">       --}}
    {{--  <link rel="stylesheet" href="{{ asset('css/bootstrap-journal.min.css') }} ">      --}}
    {{--  <link rel="stylesheet" href="{{ asset('css/bootstrap-cosmo.min.css') }} ">   --}}
    @yield('head')
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="contenido" ng-app="logistic" ng-controller="RootController">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                        aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }} ">{{ config('app.name') }}</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        
                        <!--los menus de la barra de navegacion-->
                        @include('logistic.menu')
                        
                    </ul>
                    {{-- <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form> --}}
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-user"></i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        @yield('content')
        
    </div>
    <div id="cargando"><i class="fa fa-spin fa-cog fa-fw"></i> Cargando</div>

    {{--  Scripts de terceros  --}}
    <script src="{{ asset('bower_components/jquery/dist/jquery.js') }} "></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.js') }} "></script>
    <script>
        $('#contenido').hide()
        $(document).ready(function(){
            // cuando cargue la pagina
            $('#contenido').show()
            $('#contenido').css('opacity', 1)
            $('#cargando').hide()
        })
    </script>
    @yield('script')
    
</body>
</html>
