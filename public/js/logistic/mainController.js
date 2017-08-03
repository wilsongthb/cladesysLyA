app.controller('mainController', ['$scope', 'locationsService', function($scope, locationsService){
    $scope.msj = "Hello AngularJS works"
    // console.log(locationsService)
    $scope.locations = locationsService
}])