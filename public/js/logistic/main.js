var app = angular.module('logistic', ['ngRoute'])
    .config(function($routeProvider){
        $routeProvider
            .when('/', {
                templateUrl: `${window.url}/view/logistic.main`,
                controller: 'mainController'
            })

            .otherwise({
                redirectTo: '/'
            })
    })



app.controller('rootController', function($scope){
})

app.controller('mainController', function($scope){
    $scope.msj = "Hello AngularJS works"
})