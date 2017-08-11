(function() {
    'use strict';

    // Usage:
    // 
    // Creates:
    // 

    angular
        .module('logistic')
        .component('testsComp', {
            template: `
                <input ng-model="parent.registro.id">
                <!--<input ng-model="parent.cadena">-->
                <input ng-model="$ctrl.cadena">
                <button ng-click="lac()">hola</button>
            `,
            controller: testController,
            controllerAs: '$ctrl',
            bindings: {
                registro: '=',
                cadena: '<',
                onLac: '&',
                onUpdate: '&'
            },
        });

    testController.$inject = ['$scope'];
    function testController($scope) {
        var $ctrl = this;

        $scope.lac = function(){
            $ctrl.onLac({
                msj: $ctrl.cadena
            })
        }

        ////////////////

        $ctrl.$onInit = function() { };
        $ctrl.$onChanges = function(changesObj) { };
        $ctrl.$onDestroy = function() { };
    }
})();