/**
 * INIT
 */


var app = angular.module('logistic', [
    'ngRoute', // rutas angular
    'ngResource', // recursos de angular
    'ngAnimate', // animaciones
    'ngTouch', // dependencia XD
    'ui.bootstrap', // UI bootstrap
    'ngSanitize', // insertar html directamente
])


// directiva para poner un model en mayusculas
.directive('capitalize', function() {
    return {
      require: 'ngModel',
      link: function(scope, element, attrs, modelCtrl) {
        var capitalize = function(inputValue) {
          if (inputValue == undefined) inputValue = '';
          var capitalized = inputValue.toUpperCase();
          if (capitalized !== inputValue) {
            modelCtrl.$setViewValue(capitalized);
            modelCtrl.$render();
          }
          return capitalized;
        }
        modelCtrl.$parsers.push(capitalize);
        capitalize(scope[attrs.ngModel]); // capitalize initial value
      }
    }
  })