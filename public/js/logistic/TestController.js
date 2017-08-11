(function() {
    'use strict';

    angular
        .module('logistic')
        .controller('TestController', TestController);

    TestController.$inject = ['$scope'];
    function TestController($scope) {
        var vm = this;
        
        $scope.registro = {
            id: 1
        }

        $scope.msj = "hola"
        $scope.hola = function(msj){
            console.log(msj)
            $scope.registro.cadena = msj
        }

        activate();

        ////////////////

        function activate() { }
    }
})();