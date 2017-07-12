productsConfig = {
    name: 'products',
    title: 'PRODUCTOS',
    urlApi: `${window.url}/api/logistic/products`,
    // esta en ng porque esta ruta sera servida por angular
    urlCreate: `${window.url}/logistic/ng/products/create` ,
    urlEdit: `${window.url}/logistic/ng/products/edit`
}

app.controller('productsController', ['$scope', '$http', '$window', function($scope, $http, $window){

    // valores iniciales
    $scope.config = productsConfig
    $scope.registros = []
    $scope.buscar = ''
    $scope.error = false
    // valores de paginacion
    $scope.page = 1
    $scope.per_page = 0
    $scope.page_to = 0
    $scope.total = 0
    
    // eliminar
    $scope.delete_id = 0

    $scope.buscarEnter = function(keyCode){
        console.log(keyCode)
        if(keyCode === 13){
            $scope.leer()
        }
    }
    $scope.leer = function(){
        $http.get(
            // url
            `${window.url}/api/logistic/${$scope.config.name}`, 
            // config
            {
                params: {
                    search: $scope.buscar,
                    page: $scope.page
                }
            }
        ).then(
            // success
            function(response){
                $scope.registros = response.data.data
                $scope.per_page = response.data.per_page
                $scope.page_to = response.data.to
                $scope.total = response.data.total
            },
            // error
            function(response){
                $scope.error = true
            }
        )
    }
    $scope.eliminar = function(id){
        if($window.confirm(`Eliminar al registro con ID ${id}`)){
            $http.delete(
                // url
                `${window.url}/api/logistic/${$scope.config.name}/${id}`
            ).then(
                // success
                function(response){
                    $scope.leer()
                },
                // error
                function(response){
                    $scope.error = true
                }
            )
        }
    }
    
    // al iniciar
    $scope.leer()
}])


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