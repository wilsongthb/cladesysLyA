@section('scripts')

    {{--  Scripts de terceros  --}}
    <script src="{{ asset('bower_components/angular/angular.js') }} "></script>
    <script src="{{ asset('bower_components/angular-route/angular-route.js') }} "></script>
    <script src="{{ asset('bower_components/angular-resource/angular-resource.js') }} "></script>
    <script src="{{ asset('bower_components/angular-animate/angular-animate.js') }} "></script>
    <script src="{{ asset('bower_components/angular-touch/angular-touch.js') }} "></script>
    <script src="{{ asset('bower_components/angular-bootstrap/ui-bootstrap.js') }} "></script>
    <script src="{{ asset('bower_components/angular-sanitize/angular-sanitize.js') }} "></script>

    <!--JS de la aplicacion, cargarlos en orden es muy importante-->
    <script>
        const APP_CONST = {
            url: "{{ url('') }}",
            user: {!! json_encode(Auth::user()) !!},
            location: {
                default: 1
            }
        }
        // en desuso, pero por si axaso lo dejo esto
        window.url = "{{ url('') }}"
        window.user = {
            id: {{ Auth::user()->id }}
        }
    </script>

    <!--Fundamentales-->
    <script src="{{ asset('js/logistic/generics.js') }} "></script>
    <script src="{{ asset('js/logistic/main.js') }} "></script>
    <script src="{{ asset('js/logistic/rutas.js') }} "></script>
    <script src="{{ asset('js/logistic/services.js')}} "></script>
    <script src="{{ asset('js/logistic/mainController.js') }} "></script>

    <!-- relational -->
    <script src="{{ asset('js/logistic/productsController.js')}} "></script>
    <script src="{{ asset('js/logistic/suppliersController.js') }} "></script>
    <script src="{{ asset('js/logistic/inputsController.js') }} "></script>
    <script src="{{ asset('js/logistic/outputsController.js') }} "></script>
    <script src="{{ asset('js/logistic/inventoryController.js') }} "></script>
@stop
