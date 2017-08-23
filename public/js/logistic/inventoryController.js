app.controller('inventoryController', function($scope, $http, utilitiesFactory, locationsService){
    $scope.stock = utilitiesFactory.stock
    $scope.stock.get(locationsService.get())

    $scope.dateFormat = function formatDate(date) {
        var monthNames = [
            "Enero", "Febrero", "Marzo",
            "Abril", "Mayo", "Junio", "Julio",
            "Agosto", "Septiembre", "Octubre",
            "Noviembre", "Diciembre"
        ];

        var date = new Date(date)

        var day = date.getDate();
        var monthIndex = date.getMonth();
        var year = date.getFullYear();

        return day + ' ' + monthNames[monthIndex] + ' ' + year;
    }
})