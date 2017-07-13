var app = angular.module('logistic', ['ngRoute', 'ngResource'])
    // configuracion de rutas, etapa de configuracion
    .config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider){
        $routeProvider
            .when('/', {
                templateUrl: `${window.url}/view/logistic.main.html`,
                controller: 'mainController'
            })
            .when('/notfound', {
                templateUrl: `${window.url}/view/notfound.html`
            })

            .when('/products', {
                templateUrl: `${window.url}/view/logistic.products.index.html`,
                controller: 'productsController'
            })
            .when('/products/create', {
                templateUrl: `${window.url}/view/logistic.products.create.html`,
                controller: 'productsCreateController'
            })
            .when('/suppliers', {
                templateUrl: `${window.url}/view/logistic.suppliers.index.html`,
                controller: 'suppliersController'
            })
            .when('/suppliers/create', {
                templateUrl: `${window.url}/view/logistic.suppliers.create.html`,
                controller: 'suppliersCreateController'
            })
            .when('/inputs', {
                templateUrl: `${window.url}/view/logistic.inputs.index.html`,
                controller: 'inputsController'
            })
            .when('/inputs/create', {
                templateUrl: `${window.url}/view/logistic.inputs.create.html`,
                controller: 'inputsCreateController'
            })

            // rutas perdidas
            .otherwise({
                redirectTo: '/notfound'
            })
        $locationProvider.html5Mode(true)
    }])

app.controller('rootController', [function(){
}])

