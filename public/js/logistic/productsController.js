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
    readFunc // funcion generica para mostrar una vista de recursos
)


// services
// end services

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
    $scope.config = productsConfig
    $scope.registro = {
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