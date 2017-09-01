(function() {
    'use strict';

    angular
        .module('logistic')
        .controller('ProductOptionsController', ProductOptionsController);

    ProductOptionsController.$inject = ['$scope', 'utilitiesFactory', 'locationsService', '$http'];
    function ProductOptionsController($scope, utilitiesFactory, locationsService, $http) {
        var vm = this;

        $scope.registro = {}
        $scope.leer = function(){
            $http.get(
                `${GLOBAL.api_url}/product_options/${$scope.registro.locations_id}/${$scope.registro.products_id}`
            ).then(
                function(res){
                    $scope.registro = res.data
                    // error co el tipo de dato, mejor activa disble_persis_type_date en database config
                    $scope.registro.locations_id = parseInt($scope.registro.locations_id)
                    $scope.registro.products_id = parseInt($scope.registro.products_id)
                }
            )
        }
        $scope.guardar = function(){
            $http.put(`${GLOBAL.api_url}/product_options/${$scope.registro.id}`, $scope.registro).then(
                function(res){
                    
                },
                function(err){
                    console.log(err)
                }
            )
        }

        $scope.products = utilitiesFactory.products
        $scope.products.get()

        $scope.locations = utilitiesFactory.locations
        $scope.locations.get()

        // super select
        $scope.ss = {
            model: utilitiesFactory.products,
            mode: true, // input : select
            query: "",
            run: function (e) {
                console.log(e.keyCode)
                if(e.keyCode === 13){
                    this.mode = false
                    setTimeout(function(){
                        enfocar('ss_select')
                    }, 200)
                    // console.log(this.query)
                    // if(this.mode){
                        this.model.get(this.query)
                    // }
                }else{
                    // console.log(e.keyCode)
                    if(!this.mode){
                        this.mode = true
                        setTimeout(function(){
                            enfocar('ss_input')
                        }, 200)
                    }
                }
            }
        }

        activate();

        ////////////////

        function activate() {
            $scope.registro.locations_id = locationsService.get()
            enfocar('ss_input')
        }
    }
})();
