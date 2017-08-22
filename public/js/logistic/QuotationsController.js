const QuotationsConfig = {
    name: 'quotations',
    title: 'COTIZACIONES',
    api: {
        url: `${GLOBAL.url}/logistic/api/requeriments`,
        order_details: `${GLOBAL.url}/logistic/api/order_details`,
        quotations: `${GLOBAL.url}/logistic/api/quotations`,
    },
    // urlCreate: `${GLOBAL.url}/logistic/quotations/create`,
    urlEdit: `${GLOBAL.app_url}/quotations/edit`
}

app.controller('QuotationsController', // nombre del controlador
    readResourceController(QuotationsConfig) // funcion generica para mostrar una vista de recursos, devuelve un array con el controlador y sus dependencias
);

(function(config) {
    'use strict';

    angular
        .module('logistic')
        .controller('QuotationsEditController', QuotationsEditController);

    QuotationsEditController.$inject = ['$scope', '$http', '$routeParams', 'utilitiesFactory'];
    function QuotationsEditController($scope, $http, $routeParams, utilitiesFactory) {
        var vm = this;

        // suppliers
        $scope.suppliers = utilitiesFactory.suppliers
        $scope.suppliers.get()
        $scope.verModalAP = function(){$('#agregarProveedor').modal('show')}
        $scope.agregarProveedor = function(s){
            ver('agregar a s')
            $scope.order_details.suppliers[s.id] = s
            // $scope.order_details.suppliers.push(s)
            $('#agregarProveedor').modal('hide')
        }

        // registros
        $scope.order_details = {
            suppliers: [],
            lista: [],
            leer: function(){
                $http.get(`${config.api.order_details}`, {params: {id: $routeParams.id}}).then(res=>{this.lista = res.data})
                $http.get(`${config.api.quotations}`, {params: {id: $routeParams.id}})
                    .then(res=>{

                        this.suppliers = res.data.suppliers
                        // this.quotati = res.data
                        for(i in res.data.quotations){
                            let q = res.data.quotations[i]
                            if(!this.quotations[q.order_details_id]){
                                this.quotations[q.order_details_id] = []    
                            }
                            this.quotations[q.order_details_id][q.suppliers_id] = q
                        }

                        // $scope.suppliers
                        
                    })
            },
            quotations: [],
            guardarQuotation: function(q, order_details_id, suppliers_id){
                // ver(q.id)
                if(q.id){ // si tieene id
                    // ver('tiene id')
                    q.user_id = GLOBAL.user.id
                    // q.order_details_id = order_details_id
                    // q.suppliers_id = suppliers_id
                    $http.put(`${config.api.quotations}/${q.id}`, q).then(
                        (res) => {
                            // ver(this, q)
                            // ver(res.data)
                            // this.quotations[order_details_id][suppliers_id] = res.data
                            // q = res.data
                        }
                    )
                }else{
                    // ver(this)
                    // ver('creando')
                    q.user_id = GLOBAL.user.id
                    q.order_details_id = order_details_id
                    q.suppliers_id = suppliers_id
                    $http.post(`${config.api.quotations}`, q).then(
                        (res) => {
                            // ver(this, q)
                            // ver(res.data)
                            this.quotations[order_details_id][suppliers_id] = res.data
                            // q = res.data
                            
                        }
                    )
                }
                
            }
        }

        activate();

        ////////////////

        function activate() { 
            $scope.suppliers.get()
            $scope.order_details.leer()
        }
    }
})(QuotationsConfig);


// app.controller('QuotationsEditController', [
//     '$scope',
//     '$routeParams',
//     '$http',
//     'utilitiesFactory',
//     '$window',
// function(
//     $scope,
//     $routeParams,
//     $http,
//     utilitiesFactory,
//     $window
// ){
//     // valores iniciales
//     $scope.error = false
//     $scope.registro = {
//         // valores por defecto
//         user_id: GLOBAL.user.id
//     }
//     $scope.registros = []
//     $scope.GLOBAL = GLOBAL
//     $scope.detalle = {}
//     $scope.detalles = []

//     /////////////////////////////////////////////////////////////////////////////777
//     $scope.config = ezClon(QuotationsConfig)
//     $scope.config.title = 'COTIZAR'
//     $scope.suppliers = utilitiesFactory.suppliers
//     $scope.suppliers.get()

//     $scope.leer_order_details = function(){
//         $http.get(`${$scope.config.api.order_details}`, {
//             params: {
//                 id: $routeParams.id
//             }
//         }).then(
//             function(response){
//                 $scope.registros = response.data
//             }
//         )
//     }
//     $scope.cotizar = function(id){
//         // console.log(id)
//         $scope.registro.order_details_id = id
//     }
//     $scope.leer = function(){
//         $http.get(`${$scope.config.api.quotations}`, {
//             params: {
//                 id: $routeParams.id
//             }
//         }).then(
//             function(response){
//                 $scope.detalles = response.data
//             }
//         )
//     }
//     /////////////////////////////////////////////////////////////////////////////777
//     $scope.guardar = function(){
//         $scope.registro.user_id = GLOBAL.user.id
//         $http.post(`${$scope.config.api.quotations}`, $scope.registro).then(
//             // success
//             function(response){
//                 $scope.leer()
//                 $scope.registro = {}
//             },
//             // error
//             function(response){
//                 $scope.error = true
//             }
//         )
//     }
//     $scope.eliminar = function(id){
//         if($window.confirm(`Eliminar al registro con ID ${id}`)){
//             $http.delete(
//                 // url
//                 `${$scope.config.api.quotations}/${id}`
//             ).then(
//                 // success
//                 function(response){
//                     $scope.leer()
//                 },
//                 // error
//                 function(response){
//                     $scope.error = true
//                 }
//             )
//         }
//     }

//     // INIT
//     $scope.leer()
//     $scope.leer_order_details()
//     $(document).ready(function(){
//         // enfoque inicial
//         enfocar('init_focus')
//     })
// }]);

// const PurchaseOrdersConfig = {
//     name: 'purchase_orders',
//     title: 'ORDEN DE COMPRA',
//     url: `${GLOBAL.app_url}/purchase_orders`,
//     api: {
//         url: `${GLOBAL.app_url}/api/requeriments`,
//         order_details: `${GLOBAL.app_url}/api/order_details`,
//         quotations: `${GLOBAL.app_url}/api/quotations`
//         // quotations:
//     },
//     urlEdit: `${GLOBAL.url}/logistic/purchase_orders/edit`
// };
