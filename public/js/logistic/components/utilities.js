(function() {
    'use strict';

    // Usage:
    // 
    // Creates:
    // 

    angular
        .module('logistic')
        .component('brandsSelect', {
            // template:'htmlTemplate',
            templateUrl: `${GLOBAL.url}/view/logistic.brands.select.html`,
            controller: BrandsSelectController,
            controllerAs: '$ctrl',
            bindings: {
                modelId: '<',
            },
        });

    BrandsSelectController.$inject = ['$scope'];
    function BrandsSelectController($scope) {
        var $ctrl = this;

        $scope.itemArray = [
            {id: 1, name: 'first'},
            {id: 2, name: 'second'},
            {id: 3, name: 'third'},
            {id: 4, name: 'fourth'},
            {id: 5, name: 'fifth'},
        ];

        $scope.selected = { value: $scope.itemArray[0] };

        ////////////////

        $ctrl.$onInit = function() { };
        $ctrl.$onChanges = function(changesObj) { };
        $ctrl.$onDestroy = function() { };
    }
})();

(function() {
    'use strict';

    // Usage:
    // 
    // Creates:
    // 

    angular
        .module('logistic')
        .component('selectUtilities', {
            template: `
                hola
            `,
            //templateUrl: 'templateUrl',
            controller: SelectUtilitiesController,
            controllerAs: '$ctrl',
            bindings: {
                modelId: '<',
                modelDetail: '<',
                modelName: '@',
                onUpdate: '&'
            },
        });

    SelectUtilitiesController.$inject = ['$scope', '$http'];
    function SelectUtilitiesController($scope, $http) {
        var $ctrl = this;

        $scope.get = function(){
            $http.get(`${GLOBAL.api_url}/${this.modelName}`, {
                params: {
                    
                }
            }).then(
                // success
                function(response){
                    $scope.lista = response.data.data;
                }
            )
        }

        $scope.lista = [];

        console.log($scope.modelName);

        ////////////////

        $ctrl.$onInit = function() { 
            var $ctrl = this;
            $scope.modelName = ezClon(this.modelName);
            console.log(this)
            $scope.get();
        };
        $ctrl.$onChanges = function(changesObj) { };
        $ctrl.$onDestroy = function() { };
    }
})();