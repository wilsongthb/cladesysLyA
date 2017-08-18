(function() {
    'use strict';

    angular
        .module('logistic')
        .controller('FastFormProductsController', FastFormProductsController);

    FastFormProductsController.$inject = ['$scope', '$http', 'utilitiesFactory', 'locationsService'];
    function FastFormProductsController($scope, $http, utilitiesFactory, locationsService) {
        var vm = this;
        

        $scope.brands = utilitiesFactory.brands
        $scope.brands.get()
        $scope.categories = utilitiesFactory.categories
        $scope.categories.get()
        $scope.packings = utilitiesFactory.packings
        $scope.packings.get()
        $scope.measurements = utilitiesFactory.measurements
        $scope.measurements.get()
        $scope.locations = utilitiesFactory.locations
        $scope.locations.get()

        $scope.guardar = function(){
            // $scope.reg.p_brands_id = $scope.def.brands_id
            $scope.reg.p_categories_id = $scope.def.categories_id
            // $scope.reg.p_packings_id = $scope.def.packings_id
            $scope.reg.p_measurements_id = $scope.def.measurements_id
            $scope.reg.user_id = GLOBAL.user.id
            $scope.reg.po_locations_id = $scope.def.locations_id

            $('#cargando').show()
            $('#contenido').hide()
            $http.post(`${GLOBAL.api_url}/tools/ffp`, $scope.reg).then(
                function(res){
                    $('#cargando').hide()
                    $('#contenido').show()
                    $scope.reg = {}
                }
            )

        }
        $scope.reg = {}
        $scope.def = {
            locations_id: locationsService.get(),
            brands_id: 1,
            categories_id: 1,
            packings_id: 1,
            measurements_id: 1,
        }

        $scope.$t = {
            verDef: function(){
                $('#default').modal('show')
            }
        }

        activate();

        ////////////////

        function activate() { 
            enfocar('init_focuss')
        }
    }
})();