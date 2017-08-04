app.controller('HomeController', [
    '$scope',
    'locationsService',
    function($scope, locationsService){
    $scope.msj = "Hola, Angular JS esta trabajando"
    $scope.locations = locationsService
}])