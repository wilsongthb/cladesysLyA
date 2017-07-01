var app = angular.module('cladesys', ['ngRoute'])
    .config(function($routeProvider){
        $routeProvider
            .when('/', {
                templateUrl: `${window.url}/view/cladesys-main`,
                controller: 'mainController'
            })

            .otherwise({
                redirectTo: '/'
            })
    })

app.controller('mainController', function($scope){
    $scope.msj = "Hello AngularJS works"
})