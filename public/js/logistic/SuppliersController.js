suppliersConfig = {
    name: 'suppliers',
    title: 'PROVEEDORES',
    api: {
        url: `${GLOBAL.api.url}/suppliers`
    },
    urlCreate: `${GLOBAL.url}/logistic/suppliers/create`,
    urlEdit: `${GLOBAL.url}/logistic/suppliers/edit`
}

app.controller('SuppliersController', 
    readResourceController(suppliersConfig)
)

// controlador para creacion
app.controller('SuppliersCreateController', [
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
        user_id: GLOBAL.user.id,
        locations_id : locationsService.get()
    }
    // obtener los valores relacionales
    $scope.locations = utilitiesFactory.locations
    $scope.locations.get()
    ///////////////////////////////////////////////////////////7

    $scope.guardar = function(){
        $http.post(
            // url
            `${suppliersConfig.api.url}`, 
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

app.controller('SuppliersEditController', [
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
            $scope.registro.user_id = GLOBAL.user.id
        },
        // error
        function(response){
            // console.log(`${GLOBAL.url}/logistic/ng/${$scope.config.name}`)
            $location.path('notfound')
            // $location.path(`${$scope.config.name}`)
        }
    )
    ///////////////////////////////////////////////////////////////7

    $scope.guardar = function(){
        $http.put(
            // url
            `${suppliersConfig.api.url}/${$routeParams.id}`, 
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