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

            // rutas perdidas
            .otherwise({
                redirectTo: '/notfound'
            })
        $locationProvider.html5Mode(true)
    }])