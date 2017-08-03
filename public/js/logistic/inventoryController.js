app.controller('inventoryController', function($scope, $http, utilitiesFactory){
    $scope.stock = utilitiesFactory.stock
    $scope.stock.get()
})