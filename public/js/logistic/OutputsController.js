const OutputsConfig = {

    // index
    name: 'outputs',
    title: 'SALIDAS',
    url: `${GLOBAL.app_url}/outputs`,
    urlCreate: `${GLOBAL.app_url}/outputs/create`,
    urlEdit: `${GLOBAL.app_url}/outputs/edit`,
    api: {
        url: `${GLOBAL.api_url}/outputs`,
    }
};

(function() {
    'use strict';

    angular
        .module('logistic')
        .controller('OutputsController', readResourceController(OutputsConfig));
})();

(function(config) {
    'use strict';

    angular
        .module('logistic')
        .controller('OutputsCreateController', OutputsCreateController);

    OutputsCreateController.$inject = ['$scope', 'utilitiesFactory', '$http', '$location'];
    function OutputsCreateController($scope, utilitiesFactory, $http, $location) {
        var vm = this;
        
        $scope.locations = utilitiesFactory.locations
        $scope.locations.get();

        $scope.guardar = function(){
            $scope.registro.user_id = GLOBAL.user.id
            $http.post(`${config.api.url}`, $scope.registro).then(
                function(res){
                    $location.replace()
                    // $location.path()
                    // ver(`${config.urlEdit}/${res.data.id}`)
                    $location.path(`${config.name}/edit/${res.data.id}`)
                }
            )

        }

        activate();

        ////////////////

        function activate() { }
    }
})(OutputsConfig);


(function() {
    'use strict';

    angular
        .module('logistic')
        .controller('OutputsEditController', OutputsEditController);

    OutputsEditController.$inject = ['$scope', 'utilitiesFactory', '$http', '$location', '$routeParams'];
    function OutputsEditController($scope, utilitiesFactory, $http, $location, $routeParams) {
        var vm = this;

        $scope.locations = utilitiesFactory.locations
        
        $scope.leer = function(){
            $http.get(`${GLOBAL.api_url}/outputs/${$routeParams.id}`).then(
                function(res){
                    $scope.registro = res.data
                    // $scope.registro.locations_id = String($scope.registro.locations_id)
                }
            )
        }

        $scope.getStock = function(){
            $http.get(`${GLOBAL.api_url}/stock`).then(
                function(res){
                    $scope.stock = res.data
                }
            )
        }

        $scope.detalle = {
            registro: {}
        }
        $scope.detalle_guardar = function(){
            $scope.detalle.registro.user_id = GLOBAL.user.id
            $scope.detalle.registro.outputs_id = $routeParams.id
            // $scope.detalle.
            $http.post(`${GLOBAL.api_url}/output_details`, $scope.detalle.registro).then(
                function(res){
                    $scope.detalle_leer()
                    $scope.getStock()
                }
            )
        }
        $scope.detalle_leer = function(){
            $http.get(
                `${GLOBAL.api_url}/output_details`,{
                    params: { id: $routeParams.id }
                }
            ).then(
                function(res){
                    $scope.detalle.registros = res.data
                }
            )
        }

        activate();

        ////////////////

        function activate() { 
            $scope.leer()
            $scope.locations.get()
            $scope.getStock()
            $scope.detalle_leer()
        }
    }
})();