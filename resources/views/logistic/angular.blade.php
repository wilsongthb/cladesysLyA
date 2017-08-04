
@extends('logistic.index')

@section('head')

    <link rel="stylesheet" href="{{ asset('css/bootstrap-simplex.min.css') }} "> 
    <link rel="stylesheet" href="{{ asset('bower_components/angular-bootstrap/ui-bootstrap-csp.css') }} ">
    <base href="{{ url('') }}/logistic/">

@stop

@section('content')

    <div ng-view></div>
    <hr>
    <div class="container footer">
        <p>Esta aplicación requiere un navegador actualizado, revisa esta <a href="http://caniuse.com/#feat=history">lista</a> para ver los navegadores compatibles.</p>
    </div>

@stop

@section('script')

    <script src="{{ asset('bower_components/money-formatter/dist/money-formatter.js') }} "></script>
    <script src="{{ asset('bower_components/angular/angular.js') }} "></script>
    <script src="{{ asset('bower_components/angular-route/angular-route.js') }} "></script>
    <script src="{{ asset('bower_components/angular-resource/angular-resource.js') }} "></script>
    <script src="{{ asset('bower_components/angular-animate/angular-animate.js') }} "></script>
    <script src="{{ asset('bower_components/angular-touch/angular-touch.js') }} "></script>
    <script src="{{ asset('bower_components/angular-bootstrap/ui-bootstrap.js') }} "></script>
    <script src="{{ asset('bower_components/angular-sanitize/angular-sanitize.js') }} "></script>

    <script>
        // constantes de la aplicacion
        const GLOBAL = {
            url: "{{ url('') }}",
            app_url: "{{ url('') }}/logistic",
            api: {
                url: "{{ url('') }}/logistic/api"
            },
            user: {!! json_encode(Auth::user()) !!},
            console: true,
            location: {
                default: 1
            }
        }
    </script>

    <script src="{{ asset('js/utils.js') }} "></script>
    <script src="{{ asset('js/logistic/generics.js') }} "></script>
    <script src="{{ asset('js/logistic/shortcuts.js') }} "></script>
    <script src="{{ asset('js/logistic/main.js') }} "></script>
    <script src="{{ asset('js/logistic/rutas.js') }} "></script>
    {{--  Servicios  --}}
    <script src="{{ asset('js/logistic/services.js') }} "></script>
    {{--  Controladores  --}}
    <script src="{{ asset('js/logistic/HomeController.js') }} "></script>
    <script src="{{ asset('js/logistic/ProductsController.js') }} "></script>
    <script src="{{ asset('js/logistic/SuppliersController.js') }} "></script>
@stop
