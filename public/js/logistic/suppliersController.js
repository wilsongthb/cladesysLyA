suppliersConfig = {
    name: 'suppliers',
    title: 'PROVEEDORES',
    urlApi: `${APP_CONST.url}/api/logistic/suppliers`,
    // esta en ng porque esta ruta sera servida por angular
    urlCreate: `${APP_CONST.url}/logistic/ng/suppliers/create`,
    urlEdit: `${APP_CONST.url}/logistic/ng/suppliers/edit`
}

app.controller(
    'suppliersController', 
    readResourceController(suppliersConfig)
)

// controlador para creacion
app.controller('suppliersCreateController', [
    '$scope',
    '$http',
    '$location',
    'utilitiesFactory',
    'locationsService',
    function(
        $scope, 
        $http, 
        $location,
        utilitiesFactory,
        locationsService
    ){

    ///////////////////////////////////////////////////////////77
    // PERSONALIZAR
    // enfoque inicial
    enfocar('init_focus')
    // valores iniciales
    $scope.error = false
    $scope.config = JSON.parse(JSON.stringify(suppliersConfig))
    $scope.config.title = 'REGISTRAR PROVEEDOR'
    $scope.registro = {
        user_id: window.user.id,
        locations_id : locationsService.get()
    }
    // obtener los valores relacionales
    $scope.locations = utilitiesFactory.locations
    $scope.locations.get()
    ///////////////////////////////////////////////////////////7

    $scope.guardar = function(){
        $http.post(
            // url
            `${APP_CONST.url}/api/logistic/${$scope.config.name}`, 
            // data
            $scope.registro, 
            // config
            {}
        ).then(
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
}])

app.controller('suppliersEditController', [
    '$scope',
    '$http',
    '$location',
    'utilitiesFactory',
    '$routeParams',
    'getOneFactory',
    function(
        $scope, 
        $http, 
        $location,
        utilitiesFactory,
        $routeParams,
        getOneFactory
    ){


    ////////////////////////////////////////////////////////////////
    // PERSONALIZAR
    // enfoque inicial
    enfocar('init_focus')
    // obtener los valores relacionales
    $scope.locations = utilitiesFactory.locations
    $scope.locations.get()
    // valores iniciales
    $scope.error = false
    $scope.config = JSON.parse(JSON.stringify(suppliersConfig))
    $scope.config.title = 'EDITAR PROVEEDOR'
    // al editar ---  nombre del recurso,  id
    getOneFactory.at($scope.config.name, $routeParams.id).then(
        // success
        function(response){
            $scope.registro = response.data
            $scope.registro.user_id = APP_CONST.user.id
        },
        // error
        function(response){
            // console.log(`${APP_CONST.url}/logistic/ng/${$scope.config.name}`)
            $location.path('notfound')
            // $location.path(`${$scope.config.name}`)
        }
    )
    ///////////////////////////////////////////////////////////////7

    $scope.guardar = function(){
        $http.put(
            // url
            `${APP_CONST.url}/api/logistic/${$scope.config.name}/${$routeParams.id}`, 
            // data
            $scope.registro, 
            // config
            {}
        ).then(
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
}])