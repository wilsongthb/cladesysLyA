outputsConfig = {
    name: 'outputs',
    title: 'SALIDAS DE ALMACEN',
    urlApi: `${APP_CONST.url}/api/logistic/outputs`,
    // esta en ng porque esta ruta sera servida por angular
    urlCreate: `${APP_CONST.url}/logistic/ng/outputs/create`,
    urlEdit: `${APP_CONST.url}/logistic/ng/outputs/edit`,
    urlShow: `${APP_CONST.url}/logistic/ng/outputs/show`,
    detail: {
        name: 'input_details',
        urlApi: `${APP_CONST.url}/api/logistic/input_details`,
    },
}

app.controller('outputsController', readResourceController(outputsConfig))

app.controller('outputsCreateController', [
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
    $scope.APP_CONST = APP_CONST
    $scope.registro = {
        user_id: APP_CONST.user.id
    }
    ///////////////////////////////////
    // PERSONALIZADO
    ///////////////////////////////77777
    $scope.locations = utilitiesFactory.locations
    $scope.locations.get()
    $scope.config = JSON.parse(JSON.stringify(outputsConfig))
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

app.controller('outputsEditController', [
    '$scope',
    '$http',
    '$routeParams',
    '$location',
    'utilitiesFactory',
function(
    $scope,
    $http,
    $routeParams,
    $location,
    utilitiesFactory
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
    $scope.config = JSON.parse(JSON.stringify(outputsConfig))
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
            `${APP_CONST.url}/api/logistic/${$scope.config.name}/${$routeParams.id}` // URL
        ).then(
            // success
            function(response){
                $scope.registro = response.data.registro
                $scope.registro.user_id = APP_CONST.user.id
            }
        )
    }
    // guardar
    $scope.guardar = function(){
        $http.put(`${$scope.config.urlApi}/${$scope.registro.id}`, $scope.registro)
        $location.path(`${$scope.config.name}`)
    }
    ///////////////////////

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
        $scope.detalle.user_id = APP_CONST.user.id
        $scope.detalle.outputs_id = $scope.registro.id
        $http.post($scope.config.detail.urlApi, $scope.detalle).then(
            // success
            function(response){
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

























































app.controller('outputsShowController', [
    '$scope',
    '$http',
    '$location',
    'utilitiesFactory',
    'getOneFactory',
    '$routeParams',
function(
    $scope, 
    $http, 
    $location,
    utilitiesFactory,
    getOneFactory,
    $routeParams
){

    // valores iniciales
    $scope.error = false
    $scope.config = outputsConfig
    $scope.registro = {
        user_id: window.user.id
    }

    /////////////////////////////////////////////////////////////////////////////////////
    $scope.detalle = {}
    $scope.detalles = []    
    // obtener los valores relacionales
    $scope.products = utilitiesFactory.products
    $scope.tickets = utilitiesFactory.tickets
    $scope.locations = utilitiesFactory.locations
    $scope.suppliers = utilitiesFactory.suppliers
    $scope.products.get()
    $scope.tickets.get()
    $scope.locations.get()
    $scope.suppliers.get()
    // valores de ayuda en la vista, no se heredan a otros controladores
    $scope.selectProduct = function(){
        $scope.product = $scope.products.registros.filter(function(obj){
            return obj.id === $scope.detalle.products_id
        })[0]
        $scope.detalle.products_detail = $scope.product.detail
    }
    $scope.total = function(){
        var total = 0
        for(i in $scope.detalles){
            var d = $scope.detalles[i]
            total += d.unit_price * d.quantity
        }
        return total
    }
    $scope.copiarArriba = function(detalle){
        $scope.detalle = JSON.parse(JSON.stringify(detalle))
    }
    // show 
    getOneFactory.at('outputs', $routeParams.id).then(
        // success
        function(response){
            $scope.registro = response.data.registro
            $scope.detalles = response.data.detalles
        }
    )
    ////////////////////////////////////////////////////////////////////////////////

    // $scope.agregarDetalle = function(){
    //     $scope.detalles.push(JSON.parse(JSON.stringify($scope.detalle)))
    //     // $scope.detalles[$scope.detalles.length] = JSON.parse(JSON.stringify($scope.detalle))
    //     // angular.copy($scope.detalle, $scope.detalles)
    //     $scope.detalle = {}
    // }
    // $scope.guardar = function(){
    //     $http.post(
    //         // url
    //         `${APP_CONST.url}/api/logistic/${$scope.config.name}`, 
    //         // data
    //         {
    //             registro: $scope.registro,
    //             detalles: $scope.detalles
    //         }, 
    //         // config
    //         {}
    //     ).then(
    //         // success
    //         function(response){
    //             $location.path(`/${$scope.config.name}`)
    //         },
    //         // error
    //         function(response){
    //             $scope.error = true
    //         }
    //     )
    // }
}])