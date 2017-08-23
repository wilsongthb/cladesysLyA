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
            // rutas perdidas
            .otherwise({
                redirectTo: '/notfound'
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
            .when('/outputs', {
                templateUrl: `${GLOBAL.url}/view/logistic.outputs.index.html`,
                controller: 'OutputsController'
            })
            .when('/outputs/create', {
                templateUrl: `${GLOBAL.url}/view/logistic.outputs.create.html`,
                controller: 'OutputsCreateController'
            })
            .when('/outputs/edit/:id', {
                templateUrl: `${GLOBAL.url}/view/logistic.outputs.edit.html`,
                controller: 'OutputsEditController'
            })
            // .when('/outputs', {
            //     template: '<outputs></outputs>'
            // })

            .when('/product_options', {
                templateUrl: `${GLOBAL.url}/view/logistic.product_options.html`,
                controller: 'ProductOptionsController'
            })
            .when('/fast-form-products', {
                templateUrl: `${GLOBAL.url}/view/logistic.tools.fast-form-products.html`,
                controller: 'FastFormProductsController'
            })

            .when('/inventory', {
                templateUrl: `${GLOBAL.url}/view/logistic.inventory.html`,
                controller: 'inventoryController'
            })
            .when('/stock', {
                templateUrl: `${GLOBAL.url}/view/logistic.stock.html`,
                controller: 'inventoryController'
            })

            .when('/report-products', {
                templateUrl: `${GLOBAL.url}/view/logistic.report-products.index.html`,
                controller: 'ReportProductsController'
            })
            
            // developer
            .when('/dev', {
                templateUrl: `${GLOBAL.url}/view/logistic.dev.html`,
            })


        $locationProvider.html5Mode(true)
    }])