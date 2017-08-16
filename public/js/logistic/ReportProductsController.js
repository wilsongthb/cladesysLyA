app.controller('ReportProductsController', function($scope, $http, utilitiesFactory){
    $scope.purchase = utilitiesFactory.purchase
    $scope.purchase.get()

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

    $scope.estado = function(p){
        if(p.po_minimum == 0 && p.po_permanent == 0){
            let e = moment(p.fecha_salida)
            let t = moment(new Date())
            let diff = t.diff(e, 'months')
            let months = diff + p.po_duration -1
            return {
                diff,
                months,
                type: 2,
                msj: months <= 2,
                urg: months <= 0,
            }
        }else{
            return {
                type: 1,
                msj: p.stock < p.po_permanent,
                urg: p.stock < p.po_minimum                
            }
        }
    }
})