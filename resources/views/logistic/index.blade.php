<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cladesys - Logistic</title>

    <link href="{{ asset('css/app.css') }} " rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <base href="{{ url('') }}/logistic/">
</head>

<body>
    <div ng-app="logistic" ng-controller="rootController">
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
        
        

        <div ng-view></div>

        
        <div class="jumbotron">
            <div class="container">
                <p>Esta aplicación requiere un navegador actualizado, revisa esta <a href="http://caniuse.com/#feat=history">lista</a> para ver los navegadores compatibles.</p>
            </div>
        </div>
        
    </div>


    <script src="{{ asset('js/app.js') }} "></script>
    <script src="{{ asset('bower_components/angular/angular.js') }} "></script>
    <script src="{{ asset('bower_components/angular-route/angular-route.js') }} "></script>
    <script src="{{ asset('bower_components/angular-resource/angular-resource.js') }} "></script>

    <!--JS de la aplicacion, cargarlos en orden es muy importante-->
    <script>
        window.url = "{{ url('') }}"
        window.user = {
            id: {{ Auth::user()->id }}
        }
    </script>

    <!--Fundamentales-->
    <script src="{{ asset('js/logistic/root.js')}} "></script>
    <script src="{{ asset('js/logistic/mainController.js')}} "></script>

    <!--basics-->
    <script src="{{ asset('js/logistic/brandsController.js')}} "></script>
    <script src="{{ asset('js/logistic/packingsController.js')}} "></script>
    <script src="{{ asset('js/logistic/categoriesController.js')}} "></script>
</body>

</html>
