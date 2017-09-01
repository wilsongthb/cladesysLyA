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
            let diff = t.diff(e, 'days')
            diff += p.po_duration
            let res = {
                diff,
                type: 2,
                msj: diff <= 60,
                urg: diff <= 30,
            }
            return res
        }else{
            return {
                type: 1,
                msj: p.stock_total < p.po_permanent,
                urg: p.stock_total < p.po_minimum                
            }
        }
    }
})