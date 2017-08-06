const RequerimentsConfig = {
    name: 'requeriments',
    title: 'REQUERIMIENTOS',
    api: {
        url: `${GLOBAL.url}/logistic/api/requeriments`,
        detail: `${GLOBAL.url}/logistic/api/order_details`,
    },
    urlCreate: `${GLOBAL.url}/logistic/requeriments/create`,
    urlEdit: `${GLOBAL.url}/logistic/requeriments/edit`
}

// controlador para leer registros
app.controller('RequerimentsController', // nombre del controlador
    readResourceController(RequerimentsConfig) // funcion generica para mostrar una vista de recursos, devuelve un array con el controlador y sus dependencias
)

app.controller('RequerimentsCreateController', [
    '$scope',
    '$http',
    'utilitiesFactory',
    'uibDateParser',
    'locationsService',
    '$location',
function(
    $scope,
    $http,
    utilitiesFactory,
    uibDateParser,
    locationsService,
    $location
){
    // valores iniciales
    $scope.error = false
    $scope.registro = {
        // valores por defecto
        user_id: GLOBAL.user.id
    }
    $scope.GLOBAL = GLOBAL
    

    /////////////////////////////////////////////////////////////////////////7
    // PERSONALIZADO //////////////////////////////////////////////////////
    $scope.config = ezClon(RequerimentsConfig)
    $scope.config.title = 'NUEVO REQUERIMIENTO'
    $scope.locations = utilitiesFactory.locations
    $scope.locations.get()

    //form
    $scope.registro.locations_id = locationsService.get()
    $scope.date_format = 'dd/MM/yyyy'
    $scope.registro.shipping = new Date();
    /////////////////////////////////////////////////////////////////////////777
    
    // METHODS
    $scope.guardar = function(){
        $http.post(`${$scope.config.api.url}`, $scope.registro).then(
            // success
            function(response){
                $location.path(`/${$scope.config.name}`)
            },
            // error
            function(response){
                $scope.error = true
            }
        )
    }

    // al iniciar, cuando este cargado
    $(document).ready(function(){
        // enfoque inicial
        enfocar('init_focus')
    })
}])

app.controller('RequerimentsEditController', [
    '$scope',
    '$http',
    'utilitiesFactory',
    'uibDateParser',
    'locationsService',
    '$location',
    '$routeParams',
function(
    $scope,
    $http,
    utilitiesFactory,
    uibDateParser,
    locationsService,
    $location,
    $routeParams
){
    // valores iniciales
    $scope.error = false
    $scope.registro = {
        // valores por defecto
        user_id: GLOBAL.user.id
    }
    $scope.detalles = []
    $scope.detalle = {}
    $scope.GLOBAL = GLOBAL
    

    /////////////////////////////////////////////////////////////////////////7
    // PERSONALIZADO //////////////////////////////////////////////////////
    $scope.config = ezClon(RequerimentsConfig)
    $scope.config.title = 'EDITAR REQUERIMIENTO'
    $scope.locations = utilitiesFactory.locations
    $scope.locations.get()
    $scope.products = utilitiesFactory.products
    $scope.products.get()

    //cargar datos
    $scope.leer_detalles = function(){
        $http.get(`${$scope.config.api.detail}`, {
            params: {
                id: $routeParams.id
            }
        }).then(
            function(response){
                $scope.detalles = response.data
            }
        )
    }
    /////////////////////////////////////////////////////////////////////////777
    
    // METHODS
    $scope.guardar = function(){
        $http.post(`${$scope.config.api.url}`, $scope.registro).then(
            // success
            function(response){
                $location.path(`/${$scope.config.name}`)
            },
            // error
            function(response){
                $scope.error = true
            }
        )
    }
    $scope.guardar_detalle = function(){
        $scope.detalle.user_id = GLOBAL.user.id
        $scope.detalle.orders_id = $routeParams.id
        $http.post(`${$scope.config.api.detail}`, $scope.detalle).then(
            function(response){
                console.log('guardado')
            }
        )
    }

    // al iniciar, cuando este cargado
    $scope.leer_detalles()
    $(document).ready(function(){
        // enfoque inicial
        enfocar('init_focus')
    })
}])