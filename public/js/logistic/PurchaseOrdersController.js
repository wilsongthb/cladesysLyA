const PurchaseOrdersConfig = {
    name: 'purchase_orders',
    title: 'ORDEN DE COMPRA',
    url: `${GLOBAL.app_url}/purchase_orders`,
    api: {
        url: `${GLOBAL.app_url}/api/requeriments`,
        order_details: `${GLOBAL.app_url}/api/order_details`,
        quotations: `${GLOBAL.app_url}/api/quotations`
        // quotations:
    },
    urlEdit: `${GLOBAL.url}/logistic/purchase_orders/edit`
};


(function(config) {
    'use strict';

    angular
        .module('logistic')
        .controller('PurchaseOrdersController', readResourceController(config));

})(PurchaseOrdersConfig);

(function(config) {
    'use strict';

    angular
        .module('logistic')
        .controller('PurchaseOrdersEditController', PurchaseOrdersEditController);

    PurchaseOrdersEditController.$inject = ['$scope', '$http', '$routeParams'];
    function PurchaseOrdersEditController($scope, $http, $routeParams) {
        var vm = this;
        
        $scope.data = {
            config,
            GLOBAL,
            orders_id: $routeParams.id,
            container_fluid: true,
            editar_cantidades: false,
            registros: []
        }
        $scope.enSoles = function(dinero){
            return window.moneyFormatter.format('PEN', dinero)
        }

        $scope.methods = {
            read: function(){
                $http.get(`${$scope.data.config.api.quotations}/${$routeParams.id}/edit`, {
                    params: {id: $routeParams.id}
                }).then(
                    // success
                    function(response){
                        $scope.data.registros = response.data.data
                        $scope.data.suppliers = response.data.suppliers

                        $scope.data.quotations = []
                        for(i in response.data.quotations){
                            let fila = response.data.quotations[i]
                            fila.status = (fila.status === 1) ? true : false;
                            if($scope.data.quotations[fila.order_details_id]){
                                $scope.data.quotations[fila.order_details_id][fila.suppliers_id] = fila
                            }else{
                                $scope.data.quotations[fila.order_details_id] = []
                                $scope.data.quotations[fila.order_details_id][fila.suppliers_id] = fila
                            }
                        }
                    }
                )
            }
        }

        $scope.guardar = function(q){
            q.user_id = GLOBAL.user.id
            $http.put(`${$scope.data.config.api.quotations}/${q.id}`, q).then(
                // success
                function(response){
                    
                }
            )
        }

        $scope.generarOrdenDeCompra = function(){
            $('#modalIOC').modal('show')
        }
        
        activate();

        ////////////////

        function activate() { 
            $scope.methods.read()
        }
    }
})(PurchaseOrdersConfig);