(function(CONSTS) {
    'use strict';

    // Usage:
    // 
    // Creates:
    // 

    angular
        .module('logistic')
        .component('orderStatus', {
            template: `<span ng-bind="status[$ctrl.status]"></span>`,
            //templateUrl: 'templateUrl',
            controller: orderStatusController,
            controllerAs: '$ctrl',
            bindings: {
                status: '<',
            },
        });

    orderStatusController.$inject = ['$http', '$scope'];
    function orderStatusController($http, $scope) {
        var $ctrl = this;
        $scope.status = CONSTS.orders.status

        ////////////////

        $ctrl.$onInit = function() { };
        $ctrl.$onChanges = function(changesObj) { };
        $ctrl.$onDestroy = function() { };
    }
})(GLOBAL.consts);