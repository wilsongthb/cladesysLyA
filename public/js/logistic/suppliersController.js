suppliersConfig = {
    name: 'suppliers',
    title: 'PROVEEDORES',
    urlApi: `${window.url}/api/logistic/suppliers`,
    // esta en ng porque esta ruta sera servida por angular
    urlCreate: `${window.url}/logistic/ng/suppliers/create`,
    urlEdit: `${window.url}/logistic/ng/suppliers/edit`
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
    function(
        $scope, 
        $http, 
        $location,
        utilitiesFactory,
    ){
    
    // valores iniciales
    $scope.error = false
    $scope.config = JSON.parse(JSON.stringify(suppliersConfig))
    $scope.config.title = 'REGISTRAR PROVEEDOR'
    $scope.registro = {
        user_id: window.user.id
    }
    

    // obtener los valores relacionales
    $scope.locations = utilitiesFactory.locations
    $scope.tickets = utilitiesFactory.tickets
    $scope.locations.get()
    $scope.tickets.get()

    $scope.guardar = function(){
        $http.post(
            // url
            `${window.url}/api/logistic/${$scope.config.name}`, 
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
    // obtener los valores relacionales
    $scope.locations = utilitiesFactory.locations
    $scope.tickets = utilitiesFactory.tickets
    $scope.locations.get()
    $scope.tickets.get()
    
    
    // valores iniciales
    $scope.error = false
    $scope.config = JSON.parse(JSON.stringify(suppliersConfig))
    $scope.config.title = 'EDITAR PROVEEDOR'
    // al editar ---  nombre del recurso,  id
    getOneFactory.at($scope.config.name, $routeParams.id).then(
        // success
        function(response){
            $scope.registro = response.data
        },
        // error
        function(response){
            // console.log(`${window.url}/logistic/ng/${$scope.config.name}`)
            $location.path('notfound')
            // $location.path(`${$scope.config.name}`)
        }
    )

    $scope.guardar = function(){
        $http.put(
            // url
            `${window.url}/api/logistic/${$scope.config.name}/${$routeParams.id}`, 
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