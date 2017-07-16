inputsConfig = {
    name: 'inputs',
    title: 'ENTRADAS A ALMACEN',
    urlApi: `${window.url}/api/logistic/inputs`,
    // esta en ng porque esta ruta sera servida por angular
    urlCreate: `${window.url}/logistic/ng/inputs/create`,
    urlEdit: `${window.url}/logistic/ng/inputs/edit`
}

app.controller('inputsController', readResourceController(inputsConfig))

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
    $scope.detalle = {}
    $scope.detalles = []

    // obtener los valores relacionales
    $scope.products = utilitiesFactory.products
    $scope.tickets = utilitiesFactory.tickets
    $scope.locations = utilitiesFactory.locations
    $scope.products.get()
    $scope.tickets.get()
    $scope.locations.get()
    // valores de ayuda en la vista
    $scope.selectProduct = function(){
        $scope.product = $scope.products.registros.filter(function(obj){
            return obj.id === $scope.detalle.products_id
        })[0]
        $scope.detalle.products_detail = $scope.product.detail
    }


    $scope.agregarDetalle = function(){
        $scope.detalles.push(
            JSON.parse(JSON.stringify($scope.detalle))
        )
        $scope.detalle = {}
    }
    $scope.guardar = function(){
        $http.post(
            // url
            `${window.url}/api/logistic/${$scope.config.name}`, 
            // data
            {
                registro: $scope.registro,
                detalles: $scope.detalles
            }, 
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