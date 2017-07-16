@extends('logistic.index')

@section('head')
    <base href="{{ url('') }}/logistic/ng/">
@stop

@section('content')
    <div ng-view></div>
    <div class="jumbotron">
        <div class="container">
            <p>Esta aplicación requiere un navegador actualizado, revisa esta <a href="http://caniuse.com/#feat=history">lista</a> para ver los navegadores compatibles.</p>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('bower_components/angular/angular.js') }} "></script>
    <script src="{{ asset('bower_components/angular-route/angular-route.js') }} "></script>
    <script src="{{ asset('bower_components/angular-resource/angular-resource.js') }} "></script>
    <script src="{{ asset('bower_components/angular-sanitize/angular-sanitize.js') }} "></script>

    <!--JS de la aplicacion, cargarlos en orden es muy importante-->
    <script>
        window.url = "{{ url('') }}"
        window.user = {
            id: {{ Auth::user()->id }}
        }
    </script>

    <!--Fundamentales-->
    <script src="{{ asset('js/logistic/generics.js') }} "></script>
    <script src="{{ asset('js/logistic/root.js') }} "></script>
    <script src="{{ asset('js/logistic/mainController.js') }} "></script>    

    <!-- relational -->
    <script src="{{ asset('js/logistic/services.js')}} "></script>
    <script src="{{ asset('js/logistic/productsController.js') }} "></script>
    <script src="{{ asset('js/logistic/suppliersController.js') }} "></script>
    <script src="{{ asset('js/logistic/inputsController.js') }} "></script>

@stop
