// configuracion de rutas, etapa de configuracion
app.config([
    '$routeProvider', 
    '$locationProvider', 
    function($routeProvider, $locationProvider){
        $routeProvider
            .when('/', {
                redirectTo: '/home'
            })
            .when('/home', {
                templateUrl: `${GLOBAL.url}/view/logistic.home.html`,
                controller: 'HomeController'
            })
            .when('/notfound', {
                // pagina de error, muestra un mensaje de aviso
                templateUrl: `${GLOBAL.url}/view/notfound.html`
            })

            // PRODUCTS
            .when('/products', {
                templateUrl: `${GLOBAL.url}/view/logistic.products.index.html`,
                controller: 'ProductsController'
            })
            .when('/products/create', {
                templateUrl: `${GLOBAL.url}/view/logistic.products.create.html`,
                controller: 'ProductsCreateController',
                reloadOnSearch: false // no recargar el controlador si cambia el id
            })
            .when('/products/edit/:id', {
                templateUrl: `${GLOBAL.url}/view/logistic.products.create.html`,
                controller: 'ProductsEditController',
                reloadOnSearch: false
            })
            // // SUPPLIERS
            .when('/suppliers', {
                templateUrl: `${GLOBAL.url}/view/logistic.suppliers.index.html`,
                controller: 'SuppliersController'
            })
            .when('/suppliers/create', {
                templateUrl: `${GLOBAL.url}/view/logistic.suppliers.create.html`,
                controller: 'SuppliersCreateController'
            })
            .when('/suppliers/edit/:id', {
                templateUrl: `${GLOBAL.url}/view/logistic.suppliers.create.html`,
                controller: 'SuppliersEditController'
            })

            // REQUERIMIENTO
            .when('/requeriments', {
                templateUrl: `${GLOBAL.url}/view/logistic.requeriments.index.html`,
                controller: 'RequerimentsController'
            })
            .when('/requeriments/create', {
                templateUrl: `${GLOBAL.url}/view/logistic.requeriments.create.html`,
                controller: 'RequerimentsCreateController'
            })
            .when('/requeriments/edit/:id', {
                templateUrl: `${GLOBAL.url}/view/logistic.requeriments.edit.html`,
                controller: 'RequerimentsEditController'
            })

            // COTIZACION
            .when('/quotations', {
                templateUrl: `${GLOBAL.url}/view/logistic.quotations.index.html`,
                controller: 'QuotationsController'
            })
            .when('/quotations/edit/:id', {
                templateUrl: `${GLOBAL.url}/view/logistic.quotations.edit.html`,
                controller: 'QuotationsEditController'
            })

            // INPUTS
            .when('/inputs', {
                templateUrl: `${GLOBAL.url}/view/logistic.inputs.index.html`,
                controller: 'inputsController'
            })
            .when('/inputs/create', {
                templateUrl: `${GLOBAL.url}/view/logistic.inputs.create.html`,
                controller: 'inputsCreateController'
            })
            .when('/inputs/edit/:id', {
                templateUrl: `${GLOBAL.url}/view/logistic.inputs.edit.html`,
                controller: 'inputsEditController'
            })

            // ORDEN COMPRA
            .when('/purchase_orders', {
                templateUrl: `${GLOBAL.url}/view/logistic.purchase_orders.index.html`,
                controller: 'PurchaseOrdersController'
            })
            .when('/purchase_orders/edit/:id', {
                templateUrl: `${GLOBAL.url}/view/logistic.purchase_orders.edit.html`,
                controller: 'PurchaseOrdersEditController'
            })

            // SALIDA
            .when('outputs', {
                template: '<outputs></outputs>'
            })
            
            // COMPONENT
            .when('/components', {
                template: '<app></app>'
            })
            // COMPONENT
            .when('/test', {
                template: `
                    <pre>{{ registro }}</pre>
                    <tests-comp 
                        registro="registro" 
                        cadena="registro.msj"
                        on-lac="hola(msj)"></tests-comp>
                `,
                controller: 'TestController'
            })

            // rutas perdidas
            .otherwise({
                redirectTo: '/notfound'
            })
        $locationProvider.html5Mode(true)
    }])