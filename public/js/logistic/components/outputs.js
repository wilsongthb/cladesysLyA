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
            templateUrl: `${GLOBAL.url}/view/logistic.outputs.component.html` ,
            controller: OutputsController,
            controllerAs: '$ctrl',
            bindings: {
                // Binding: '=',
            },
        });

    OutputsController.$inject = ['$scope', 'locationsService', 'utilitiesFactory', '$http'];
    function OutputsController($scope, locationsService, utilitiesFactory, $http) {
        var $ctrl = this;
        
        $scope.locations = utilitiesFactory.locations
        $scope.locations.get()
        
        $scope.registro = {
            locations_id: locationsService.get()
        }
        $scope.guardar = function(){
            $scope.registro.user_id = GLOBAL.user.id
            $http.post(`${GLOBAL.api_url}/outputs`, $scope.registro).then(
                function(res){
                    $scope.registro = res.data
                }
            )
        }

        $scope.detalles = {
            registros: [],
            inventario: [],
            registro: {},
            guardar: function(){
                this.registro = GLOBAL.user.id
                $http.post(`${GLOBAL.api_url}/output_details`, this.registro).then(
                    function(res){
                        // this.registro = res.data
                    }
                )
            },
            leer_inventario: function(){
                $http.get(`${GLOBAL.api_url}/inventory`).then(
                    res => {
                        this.inventario = res.data
                    }
                )
            }
            // leer: function(){
            //     $http.get(`${GLOBAL.api_url}/output_details/${}`)
            // }
        }

        ////////////////

        $ctrl.$onInit = function() { };
        $ctrl.$onChanges = function(changesObj) { };
        $ctrl.$onDestroy = function() { };
    }
})();