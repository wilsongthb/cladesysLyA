(function() {
    'use strict';

    // Usage:
    // 
    // Creates:
    // 

    angular
        .module('logistic')
        .component('logisticProducts', {
            // template:'htmlTemplate',
            templateUrl: `${GLOBAL.url}/view/logistic.products.component.html`,
            controller: ProductController,
            controllerAs: '$ctrl',
            bindings: {
                Binding: '=',
            },
        });

    ProductController.$inject = ['globalService'];
    function ProductController(globalService) {
        var $ctrl = this;
        

        ////////////////

        $ctrl.$onInit = function() { };
        $ctrl.$onChanges = function(changesObj) { };
        $ctrl.$onDestroy = function() { };
    }
})();