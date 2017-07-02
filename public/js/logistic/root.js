var app = angular.module('logistic', ['ngRoute', 'ngResource'])
    // configuracion de rutas, etapa de configuracion
    .config(function($routeProvider, $locationProvider){
        $routeProvider
            .when('/', {
                templateUrl: `${window.url}/view/logistic.main.html`,
                controller: 'mainController'
            })

            // brands
            .when('/brands', {
                templateUrl: ` ${window.url}/view/logistic.brands.index.html`,
                controller: 'brandsController'
            })
            .when('/brands/create', {
                templateUrl: ` ${window.url}/view/logistic.brands.create.html`,
                controller: 'brandsCreateController'
            })
            .when('/brands/edit/:id', {
                templateUrl: ` ${window.url}/view/logistic.brands.create.html`,
                controller: 'brandsEditController'
            })

            // packing
            .when('/packings', {
                templateUrl: ` ${window.url}/view/logistic.packings.index.html`,
                controller: 'packingsController'
            })
            .when('/packings/create', {
                templateUrl: ` ${window.url}/view/logistic.packings.create.html`,
                controller: 'packingsCreateController'
            })
            .when('/packings/edit/:id', {
                templateUrl: ` ${window.url}/view/logistic.packings.create.html`,
                controller: 'packingsEditController'
            })

            // categories
            .when('/categories', {
                templateUrl: ` ${window.url}/view/logistic.categories.index.html`,
                controller: 'categoriesController'
            })

            // rutas perdidas
            .otherwise({
                redirectTo: '/'
            })
        $locationProvider.html5Mode(true)
    })

app.controller('rootController', function(){
})

