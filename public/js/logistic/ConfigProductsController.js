(function() {
    'use strict';

    angular
        .module('logistic')
        .controller('ConfigProductsController', ConfigProductsController);

    ConfigProductsController.$inject = ['$scope', 'utilitiesFactory', 'locationsService', '$http'];
    function ConfigProductsController($scope, utilitiesFactory, locationsService, $http) {
        var vm = this;

        $scope.registro = {}
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
        $scope.leerConfigs = function(){
            $http.get(`${GLOBAL.api_url}/product_options`, {
                params: {
                    locations_id: locationsService.get(),
                    search: $scope.buscar
                }
            }).then(
                function(res){
                    $scope.configs = res.data
                }
            )
        }
        $scope.products = utilitiesFactory.products
        $scope.products.get()
        $scope.verCrear = function(){
            $('#modaledit').modal('show')
            $scope.crear = true
        }
        $scope.editar = function(c){
            $scope.crear = false
            $('#modaledit').modal('show')
            // $scope.registro.products_id = c.products_id
            $scope.registro = c
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
        $scope.leer = function(){
            $http.get(
                `${GLOBAL.api_url}/product_options/${$scope.registro.locations_id}/${$scope.registro.products_id}`
            ).then(
                function(res){
                    $scope.registro = res.data
                    $scope.registro.locations_id = parseInt($scope.registro.locations_id)
                    $scope.registro.products_id = parseInt($scope.registro.products_id)
                }
            )
        }
        $scope.guardar = function(){
            $http.put(`${GLOBAL.api_url}/product_options/${$scope.registro.id}`, $scope.registro).then(
                function(res){
                    $scope.leerConfigs()
                    $('#modaledit').modal('hide')
                },
                function(err){
                    console.log(err)
                }
            )
        }

        activate();

        ////////////////

        function activate() { 
            $scope.registro.locations_id = locationsService.get()
            $scope.leerConfigs()
        }
    }
})();