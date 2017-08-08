const PurchaseOrdersConfig = {
    name: 'purchase_orders',
    title: 'ORDEN DE COMPRA',
    url: `${GLOBAL.app_url}/purchase_orders`,
    api: {
        url: `${GLOBAL.app_url}/api/requeriments`
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

    PurchaseOrdersEditController.$inject = ['$scope'];
    function PurchaseOrdersEditController($scope) {
        var vm = this;
        
        
        activate();

        ////////////////

        function activate() { }
    }
})(PurchaseOrdersConfig);