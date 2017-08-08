inputsConfig = {
    name: 'inputs',
    title: 'ENTRADAS A ALMACEN',
    api: {
        url: `${GLOBAL.url}/logistic/api/inputs`, 
    },
    urlApi: `${GLOBAL.url}/logistic/api/inputs`, 
    // esta en ng porque esta ruta sera servida por angular
    urlCreate: `${GLOBAL.url}/logistic/inputs/create`,
    urlEdit: `${GLOBAL.url}/logistic/inputs/edit`,
    urlShow: `${GLOBAL.url}/logistic/inputs/show`,
    detail: {
        name: 'input_details',
        urlApi: `${GLOBAL.url}/logistic/api/input_details`,
    },
}

app.controller('inputsController', readResourceController(inputsConfig))

app.controller('inputsCreateController', [
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
    $scope.GLOBAL = GLOBAL
    $scope.registro = {
        user_id: GLOBAL.user.id,
        locations_id: parseInt(locationsService.id)
    }
    ///////////////////////////////////
    // PERSONALIZADO
    ///////////////////////////////77777
    $scope.locations = utilitiesFactory.locations
    $scope.locations.get()
    $scope.config = JSON.parse(JSON.stringify(inputsConfig))
    $scope.config.title = 'CREAR NUEVA ENTRADA'
    /////////////////////////////////////
    $scope.guardar = function(){
        $http.post($scope.config.urlApi, $scope.registro).then(
            // success
            function(response){
                // console.log('das')
                // console.log(`${$scope.config.urlEdit}/${response.data.id}`)
                $location.replace()
                $location.path(`${$scope.config.name}/edit/${response.data.id}`)
                // $location.path(`${$scope.config.urlEdit}/${response.data.id}`)
            }
        )
    }

}])

app.controller('inputsEditController', [
    '$scope',
    '$http',
    '$routeParams',
    '$location',
    'utilitiesFactory',
    'uibDateParser',
function(
    $scope,
    $http,
    $routeParams,
    $location,
    utilitiesFactory,
    uibDateParser
){
    $scope.registro = {}
    $scope.detalles = []
    $scope.detalle = {}
    $scope.enSoles = function(dinero){
        return window.moneyFormatter.format('PEN', dinero)
    }
    ///////////////////////////////////////////////////////////////////7
    // PERSONALIZAR
    //////////////////////////////7
    $scope.locations = utilitiesFactory.locations
    $scope.locations.get()
    $scope.config = JSON.parse(JSON.stringify(inputsConfig))
    $scope.config.title = 'EDITAR ENTRADA'
    $scope.suppliers = utilitiesFactory.suppliers
    $scope.products = utilitiesFactory.products
    $scope.suppliers.get()
    $scope.products.get()
    $scope.total = function(){
        var total = 0
        for(i in $scope.detalles){
            var d = $scope.detalles[i]
            total += d.unit_price * d.quantity
        }
        return total
    }
    /////////////////////////////////////////////////
    
    //////////////7/7//
    // CABECERA
    // obteniendo registro
    $scope.leer = function(){
        $http.get(
            `${$scope.config.api.url}/${$routeParams.id}` // URL
        ).then(
            // success
            function(response){
                $scope.registro = response.data.registro
                $scope.registro.user_id = GLOBAL.user.id
            }
        )
    }
    // guardar
    $scope.guardar = function(){
        $http.put(`${$scope.config.urlApi}/${$scope.registro.id}`, $scope.registro)
        $location.path(`${$scope.config.name}`)
    }
    ///////////////////////

    $scope.mostrarForm = function() {
        $('#detalleModal').modal('show')
    }

    /////////////////////
    // DETALLES
    // obteniendo detalles
    $scope.leerDetalles = function(){
        $http.get(
            `${$scope.config.detail.urlApi}`,
            {
                params: {
                    id: $routeParams.id
                }
            }
        ).then(
            // success
            function(response){
                $scope.detalles = response.data
            }
        )
    }
    $scope.guardarDetalle = function(){
        $scope.detalle.user_id = GLOBAL.user.id
        $scope.detalle.inputs_id = $scope.registro.id

        $http.post($scope.config.detail.urlApi, $scope.detalle).then(
            // success
            function(response){
                $scope.detalle = {}
                $('#detalleModal').modal('hide')
                $scope.leerDetalles()
            }
        )
        
    }
    $scope.eliminarDetalle = function(id){
        if(window.confirm('Eliminar a '+ id)){
            $http.delete($scope.config.detail.urlApi + '/' + id).then(
                // success
                function(response){
                    $scope.leerDetalles()
                }
            )
        }
    }
    /////////////////////////

    // INIT
    $scope.leer()
    $scope.leerDetalles()
    enfocar('init_focus')
}])
