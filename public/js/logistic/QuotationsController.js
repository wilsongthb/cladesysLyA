const QuotationsConfig = {
    name: 'quotations',
    title: 'COTIZACIONES',
    api: {
        url: `${GLOBAL.url}/logistic/api/requeriments`,
        order_details: `${GLOBAL.url}/logistic/api/order_details`,
        quotations: `${GLOBAL.url}/logistic/api/quotations`,
    },
    // urlCreate: `${GLOBAL.url}/logistic/quotations/create`,
    urlEdit: `${GLOBAL.url}/logistic/quotations/edit`
}

app.controller('QuotationsController', // nombre del controlador
    readResourceController(QuotationsConfig) // funcion generica para mostrar una vista de recursos, devuelve un array con el controlador y sus dependencias
)

app.controller('QuotationsEditController', [
    '$scope',
    '$routeParams',
    '$http',
    'utilitiesFactory',
    '$window',
function(
    $scope,
    $routeParams,
    $http,
    utilitiesFactory,
    $window
){
    // valores iniciales
    $scope.error = false
    $scope.registro = {
        // valores por defecto
        user_id: GLOBAL.user.id
    }
    $scope.registros = []
    $scope.GLOBAL = GLOBAL
    $scope.detalle = {}
    $scope.detalles = []

    /////////////////////////////////////////////////////////////////////////////777
    $scope.config = ezClon(QuotationsConfig)
    $scope.config.title = 'COTIZAR'
    $scope.suppliers = utilitiesFactory.suppliers
    $scope.suppliers.get()

    $scope.leer_order_details = function(){
        $http.get(`${$scope.config.api.order_details}`, {
            params: {
                id: $routeParams.id
            }
        }).then(
            function(response){
                $scope.registros = response.data
            }
        )
    }
    $scope.cotizar = function(id){
        // console.log(id)
        $scope.registro.order_details_id = id
    }
    $scope.leer = function(){
        $http.get(`${$scope.config.api.quotations}`, {
            params: {
                id: $routeParams.id
            }
        }).then(
            function(response){
                $scope.detalles = response.data
            }
        )
    }
    /////////////////////////////////////////////////////////////////////////////777
    $scope.guardar = function(){
        $scope.registro.user_id = GLOBAL.user.id
        $http.post(`${$scope.config.api.quotations}`, $scope.registro).then(
            // success
            function(response){
                $scope.leer()
                $scope.registro = {}
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
                `${$scope.config.api.quotations}/${id}`
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

    // INIT
    $scope.leer()
    $scope.leer_order_details()
    $(document).ready(function(){
        // enfoque inicial
        enfocar('init_focus')
    })
}])