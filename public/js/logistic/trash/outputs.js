(function() {
    'use strict';

    // Usage:
    // 
    // Creates:
    // 

    angular
        .module('logistic')
        .component('outputs', {
            // template:'htmlTemplate',
            templateUrl: '',
            controller: OutputsController,
            controllerAs: '$ctrl',
            bindings: {
                // Binding: '=',
            },
        });

    OutputsController.$inject = ['$scope'];
    function OutputsController($scope) {
        var $ctrl = this;
        

        ////////////////

        $ctrl.$onInit = function() { };
        $ctrl.$onChanges = function(changesObj) { };
        $ctrl.$onDestroy = function() { };
    }
})();