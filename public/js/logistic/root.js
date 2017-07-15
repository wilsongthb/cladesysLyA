var app = angular.module('logistic', ['ngRoute', 'ngResource', 'ngSanitize'])
    // configuracion de rutas, etapa de configuracion
    .config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider){
        $routeProvider
            .when('/', {
                templateUrl: `${window.url}/view/logistic.main.html`,
                controller: 'mainController'
            })
            .when('/notfound', {
                templateUrl: `${window.url}/view/notfound.html`
            })

            .when('/products', {
                templateUrl: `${window.url}/view/logistic.products.index.html`,
                controller: 'productsController'
            })
            .when('/products/create', {
                templateUrl: `${window.url}/view/logistic.products.create.html`,
                controller: 'productsCreateController'
            })
            .when('/suppliers', {
                templateUrl: `${window.url}/view/logistic.suppliers.index.html`,
                controller: 'suppliersController'
            })
            .when('/suppliers/create', {
                templateUrl: `${window.url}/view/logistic.suppliers.create.html`,
                controller: 'suppliersCreateController'
            })
            .when('/inputs', {
                templateUrl: `${window.url}/view/logistic.inputs.index.html`,
                controller: 'inputsController'
            })
            .when('/inputs/create', {
                templateUrl: `${window.url}/view/logistic.inputs.create.html`,
                controller: 'inputsCreateController'
            })
            .when('/inputs/edit/:id', {
                templateUrl: `${window.url}/view/logistic.inputs.create.html`,
                controller: 'inputsEditController'
            })

            // rutas perdidas
            .otherwise({
                redirectTo: '/notfound'
            })
        $locationProvider.html5Mode(true)
    }])

app.controller('rootController', [function(){
}])

app.directive('angledDatalist',['$sce',function($sce){
  return{
    restrict : 'AE',
    require : '?ngModel',
    template : '<ng-form name="dlTest"><input list="dl" ng-model="choosen"><datalist id="dl"><select><option ng-repeat="opt in list" label="{{opt.option}}">{{opt.value}}</option></select></datalist></ng-form>',
    replace : false,
    scope : {
      list : '='
    },
    link : function(scope,element,attrs,ngModel){
      if(!ngModel || (scope.list.length <= 0)) return;
      
      scope.choosen = '';
      
      scope.$watch('choosen',function(val,old){
        ngModel.$setViewValue(val);
      });
    }
  }; // return
}]); // end angledDatalist

