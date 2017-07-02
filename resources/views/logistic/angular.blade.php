@extends('logistic.index')

@section('head')
    <base href="{{ url('') }}/logistic/">
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
    {{-- <script src="{{ asset('js/logistic/brandsController.js')}} "></script>
    <script src="{{ asset('js/logistic/packingsController.js')}} "></script>
    <script src="{{ asset('js/logistic/categoriesController.js')}} "></script> --}}
@stop