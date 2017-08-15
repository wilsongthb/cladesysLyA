
@extends('logistic.index')

@section('head')

    <link rel="stylesheet" href="{{ asset('bower_components/angular-bootstrap/ui-bootstrap-csp.css') }} ">
    <link rel="stylesheet" href="{{ asset('bower_components/angular-ui-select/dist/select.css') }} ">
    <base href="{{ url('') }}/logistic/">

@stop

@section('content')

    <div ng-view></div>
    <hr>
    <div class="container footer">
        <p>LOCALIZACION: @{{location.lista[location.id].name}} </p>
        <p>Esta aplicación requiere un navegador actualizado, revisa esta <a href="http://caniuse.com/#feat=history">lista</a> para ver los navegadores compatibles.</p>
    </div>

@stop

@section('script')
    {{--  codigo de terceros  --}}
    <script src="{{ asset('bower_components/money-formatter/dist/money-formatter.js') }} "></script>
    <script src="{{ asset('bower_components/angular/angular.js') }} "></script>
    <script src="{{ asset('bower_components/angular-route/angular-route.js') }} "></script>
    <script src="{{ asset('bower_components/angular-resource/angular-resource.js') }} "></script>
    <script src="{{ asset('bower_components/angular-animate/angular-animate.js') }} "></script>
    <script src="{{ asset('bower_components/angular-touch/angular-touch.js') }} "></script>
    <script src="{{ asset('bower_components/angular-bootstrap/ui-bootstrap.js') }} "></script>
    <script src="{{ asset('bower_components/angular-bootstrap/ui-bootstrap-tpls.js') }} "></script>
    <script src="{{ asset('bower_components/angular-sanitize/angular-sanitize.js') }} "></script>
    <script src="{{ asset('bower_components/angular-ui-select/dist/select.js') }} "></script>

    <script>
        // constantes de la aplicacion
        const GLOBALS = function(){
            return {
                url: "{{ url('') }}",
                app_url: "{{ url('') }}/logistic",
                api_url: "{{ url('') }}/logistic/api",
                api: {
                    url: "{{ url('') }}/logistic/api"
                },
                user: {!! json_encode(Auth::user()) !!},
                console: true,
                location: {
                    default: 1
                },
                consts: {!! json_encode(config('consts')) !!},
            }
        }
        const GLOBAL = GLOBALS()
    </script>

    {{--  Core  --}}
    <script src="{{ asset('js/utils.js') }} "></script>
    <script src="{{ asset('js/logistic/generics.js') }} "></script>
    <script src="{{ asset('js/logistic/shortcuts.js') }} "></script>
    <script src="{{ asset('js/logistic/main.js') }} "></script>
    {{--  Componentes  --}}
    <script src="{{ asset('js/logistic/components/orderStatus.js') }} "></script>
    <script src="{{ asset('js/logistic/components/outputs.js') }} "></script>
    {{--  Rutas  --}}
    <script src="{{ asset('js/logistic/rutas.js') }} "></script>
    {{--  Servicios  --}}
    <script src="{{ asset('js/logistic/services.js') }} "></script>
    {{--  Controladores  --}}
    <script src="{{ asset('js/logistic/TestController.js') }} "></script>
    <script src="{{ asset('js/logistic/HomeController.js') }} "></script>
    <script src="{{ asset('js/logistic/ProductsController.js') }} "></script>
    <script src="{{ asset('js/logistic/SuppliersController.js') }} "></script>
    <script src="{{ asset('js/logistic/RequerimentsController.js') }} "></script>
    <script src="{{ asset('js/logistic/QuotationsController.js') }} "></script>
    <script src="{{ asset('js/logistic/inputsController.js') }} "></script>
    <script src="{{ asset('js/logistic/PurchaseOrdersController.js') }} "></script>
    <script src="{{ asset('js/logistic/ProductOptionsController.js') }} "></script>
    <script src="{{ asset('js/logistic/OutputsController.js') }} "></script>
@stop
