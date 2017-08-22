const productsConfig = {
    name: 'products',
    title: 'PRODUCTOS',
    url: GLOBAL.url,
    api: {
        url: `${GLOBAL.url}/logistic/api/products`,
    },
    urlApi: `${GLOBAL.url}/logistic/api/products`,
    urlCreate: `${GLOBAL.app_url}/products/create`,
    urlEdit: `${GLOBAL.app_url}/products/edit`
}

// controlador para leer registros
app.controller('ProductsController', // nombre del controlador
    readResourceController(productsConfig) // funcion generica para mostrar una vista de recursos, devuelve un array con el controlador y sus dependencias
)

app.controller('ProductsCreateController', [
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
    // enfoque inicial
    enfocar('init_focus')

    // valores iniciales
    $scope.error = false
    $scope.registro = {
        // valores por defecto
        user_id: GLOBAL.user.id
    }
    $scope.GLOBAL = GLOBAL

    /////////////////////////////////////////////////////////////////////////7
    // PERSONALIZADO //////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////777
    $scope.config = JSON.parse(JSON.stringify(productsConfig))
    $scope.config.title = 'REGISTRAR NUEVO PRODUCTO'
    // obtener los valores relacionales
    $scope.brands = utilitiesFactory.brands
    $scope.categories = utilitiesFactory.categories
    $scope.measurements = utilitiesFactory.measurements
    $scope.packings = utilitiesFactory.packings
    $scope.brands.get()
    $scope.categories.get()
    $scope.measurements.get()
    $scope.packings.get()
    // imagenes
    $scope.images = utilitiesFactory.images
    $scope.images.get()
    //////////////////////////////////////////////////////////////////////////7
    $scope.guardar = function(){
        $http.post(
            // url
            `${productsConfig.api.url}`, 
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

app.controller('ProductsEditController', [
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
    //enfoque
    enfocar('init_focus')
    // valores iniciales
    $scope.error = false
    $scope.GLOBAL = GLOBAL
    /////////////////////////////////////////////////////////////////////////7
    // PERSONALIZADO ///////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////777
    // obtener los valores relacionales
    $scope.brands = utilitiesFactory.brands
    $scope.categories = utilitiesFactory.categories
    $scope.measurements = utilitiesFactory.measurements
    $scope.packings = utilitiesFactory.packings
    $scope.brands.get()
    $scope.categories.get()
    $scope.measurements.get()
    $scope.packings.get()
    // imagenes
    $scope.images = utilitiesFactory.images
    $scope.images.get()
    // valores iniciales
    $scope.config = JSON.parse(JSON.stringify(productsConfig))
    $scope.config.title = 'EDITAR PRODUCTO'
    // al editar ---  nombre del recurso,  id
    getOneFactory.at($scope.config.name, $routeParams.id).then(
        // success
        function(response){
            $scope.registro = response.data
            $scope.registro.user_id = GLOBAL.user.id
        },
        // error
        function(response){
            // console.log(`${window.url}/logistic/ng/${$scope.config.name}`)
            $location.path('notfound')
            // $location.path(`${$scope.config.name}`)
        }
    )
    /////////////////////////////////////////////////////////////////////////7
    /////////////////////////////////////////////////////////////////////////777
    $scope.guardar = function(){
        $http.put(
            // url
            `${productsConfig.api.url}/${$routeParams.id}`, 
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