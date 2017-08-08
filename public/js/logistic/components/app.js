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
                    <h1>hola</h1>
                    <hr>
                    <logistic-products></logistic-products>
                    <order-status status="1"></order-status>
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
        

        ////////////////

        $ctrl.$onInit = function() { };
        $ctrl.$onChanges = function(changesObj) { };
        $ctrl.$onDestroy = function() { };
    }
})();