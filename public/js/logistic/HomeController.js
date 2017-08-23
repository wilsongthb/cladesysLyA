app.controller('HomeController', [
    '$scope',
    'locationsService',
    function($scope, locationsService){
    $scope.msj = "Hola, Angular JS esta trabajando"
    $scope.service = locationsService

    $scope.consts = GLOBAL.consts
    // $scope.service.init()
}])