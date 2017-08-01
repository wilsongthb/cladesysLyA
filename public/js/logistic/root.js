var app = angular.module('logistic', [
    'ngRoute', // rutas angular
    'ngResource', // recursos de angular
    'ngAnimate',
    'ngTouch',
    'ui.bootstrap', // UI bootstrap
    'ngSanitize', // insertar html directamente
])
    // configuracion de rutas, etapa de configuracion
    .config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider){
        $routeProvider
            .when('/', {
                templateUrl: `${APP_CONST.url}/view/logistic.main.html`,
                controller: 'mainController'
            })
            .when('/notfound', {
                // pagina de error, muestra un mensaje de aviso
                templateUrl: `${APP_CONST.url}/view/notfound.html`
            })

            // PRODUCTS
            .when('/products', {
                templateUrl: `${APP_CONST.url}/view/logistic.products.index.html`,
                controller: 'productsController'
            })
            .when('/products/create', {
                templateUrl: `${APP_CONST.url}/view/logistic.products.create.html`,
                controller: 'productsCreateController',
                reloadOnSearch: false // no recargar el controlador si cambia el id
            })
            .when('/products/edit/:id', {
                templateUrl: `${APP_CONST.url}/view/logistic.products.create.html`,
                controller: 'productsEditController',
                reloadOnSearch: false
            })

            // // SUPPLIERS
            .when('/suppliers', {
                templateUrl: `${APP_CONST.url}/view/logistic.suppliers.index.html`,
                controller: 'suppliersController'
            })
            .when('/suppliers/create', {
                templateUrl: `${APP_CONST.url}/view/logistic.suppliers.create.html`,
                controller: 'suppliersCreateController'
            })
            .when('/suppliers/edit/:id', {
                templateUrl: `${APP_CONST.url}/view/logistic.suppliers.create.html`,
                controller: 'suppliersEditController'
            })

            // // INPUTS
            .when('/inputs', {
                templateUrl: `${APP_CONST.url}/view/logistic.inputs.index.html`,
                controller: 'inputsController'
            })
            .when('/inputs/create', {
                templateUrl: `${APP_CONST.url}/view/logistic.inputs.create.html`,
                controller: 'inputsCreateController'
            })
            .when('/inputs/edit/:id', {
                templateUrl: `${APP_CONST.url}/view/logistic.inputs.edit.html`,
                controller: 'inputsEditController'
            })

            // INVENTARIO
            .when('/inventory', {
                templateUrl: `${APP_CONST.url}/view/logistic.inventory.html`,
                controller: 'inventoryController'
            })

            // OUTPUTS
            .when('/outputs', {
                templateUrl: `${APP_CONST.url}/view/logistic.outputs.index.html`,
                controller: 'outputsController'
            })


            // rutas perdidas
            .otherwise({
                redirectTo: '/notfound'
            })
        $locationProvider.html5Mode(true)
    }])
