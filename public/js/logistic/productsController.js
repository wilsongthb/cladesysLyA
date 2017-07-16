productsConfig = {
    name: 'products',
    title: 'PRODUCTOS',
    urlApi: `${window.url}/api/logistic/products`,
    // esta en ng porque esta ruta sera servida por angular
    urlCreate: `${window.url}/logistic/ng/products/create`,
    urlEdit: `${window.url}/logistic/ng/products/edit`
}

// controlador para leer registros
app.controller(
    'productsController', // nombre del controlador
    readResourceController(productsConfig) // funcion generica para mostrar una vista de recursos, devuelve un array con el controlador y sus dependencias
)

app.controller('productsCreateController', [
    '$scope',
    '$http',
    '$location',
    'utilitiesFactory',
function(
    $scope, 
    $http, 
    $location,
    utilitiesFactory
){
    // valores iniciales
    $scope.error = false
    $scope.config = JSON.parse(JSON.stringify(productsConfig))
    $scope.config.title = 'REGISTRAR NUEVO PRODUCTO'
    $scope.registro = {
        // valores por defecto
        user_id: window.user.id
    }

    // obtener los valores relacionales
    $scope.brands = utilitiesFactory.brands
    $scope.categories = utilitiesFactory.categories
    $scope.measurements = utilitiesFactory.measurements
    $scope.packings = utilitiesFactory.packings
    $scope.brands.get()
    $scope.categories.get()
    $scope.measurements.get()
    $scope.packings.get()

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

app.controller('productsEditController', [
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
    $scope.brands = utilitiesFactory.brands
    $scope.categories = utilitiesFactory.categories
    $scope.measurements = utilitiesFactory.measurements
    $scope.packings = utilitiesFactory.packings
    $scope.brands.get()
    $scope.categories.get()
    $scope.measurements.get()
    $scope.packings.get()
    
    
    // valores iniciales
    $scope.error = false
    $scope.config = JSON.parse(JSON.stringify(productsConfig))
    $scope.config.title = 'EDITAR PRODUCTO'
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