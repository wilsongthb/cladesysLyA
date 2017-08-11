(function() {
    'use strict';

    // Usage:
    // 
    // Creates:
    // 

    angular
        .module('logistic')
        .component('app', {
            template: `
                <div class="container">
                    <!--<h1>hola</h1>
                    <hr>-->
                    <!--<logistic-products></logistic-products>-->
                    <!-- <order-status status="1"></order-status>-->
                    <!--<brands-select model-id=""></brands-select>-->
                    <!--<pre>{{ registro }}</pre>-->
                    <select-utilities
                        model-detail="registro.suppliers_company_name"
                        model-name="suppliers"
                        model-id="registro.suppliers_id"></select-utilities>
                </div>
            `,
            //templateUrl: 'templateUrl',
            controller: appController,
            controllerAs: '$ctrl',
            bindings: {
                Binding: '=',
            },
        });

    appController.$inject = ['$scope'];
    function appController($scope) {
        var $ctrl = this;
        
        $scope.registro = {
            suppliers_id: 1,
            suppliers_company_name: "LATIGAZO"
        }

        ////////////////

        $ctrl.$onInit = function() { };
        $ctrl.$onChanges = function(changesObj) { };
        $ctrl.$onDestroy = function() { };
    }
})();