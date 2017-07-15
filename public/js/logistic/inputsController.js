inputsConfig = {
    name: 'inputs',
    title: 'ENTRADAS A ALMACEN',
    urlApi: `${window.url}/api/logistic/inputs`,
    // esta en ng porque esta ruta sera servida por angular
    urlCreate: `${window.url}/logistic/ng/inputs/create`,
    urlEdit: `${window.url}/logistic/ng/inputs/edit`
}

app.controller('inputsController', ['$scope', '$http', '$window', function($scope, $http, $window){

    // valores iniciales
    $scope.config = inputsConfig
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

app.controller('inputsCreateController', [
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
    $scope.config = inputsConfig
    $scope.registro = {
        user_id: window.user.id
    }
    $scope.registro_detalle = {}
    $scope.detalles = []

    // obtener los valores relacionales
    $scope.products = utilitiesFactory.products
    $scope.products.get()
    $scope.tickets = utilitiesFactory.tickets
    $scope.tickets.get()
    $scope.locations = utilitiesFactory.locations
    $scope.locations.get()

    $scope.agregarDetalle = function(){
        $scope.detalles.push(
            JSON.parse(JSON.stringify($scope.registro_detalle))
        )
        $scope.registro_detalle = {}
    }

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