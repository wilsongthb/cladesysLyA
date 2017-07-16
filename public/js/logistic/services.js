app.factory('utilitiesFactory', ['$http' ,function($http){
    return {
        /**
         * @description Servicio para proveer los datos 
         * para formularios de la aplicacion con ajax
         */
        brands: {
            registros: [], 
            get: genericGetResource($http, 'brands')
        },
        categories: {
            registros: [], 
            get: genericGetResource($http, 'categories')
        },
        measurements: {
            registros: [], 
            get: genericGetResource($http, 'measurements')
        },
        packings: {
            registros: [], 
            get: genericGetResource($http, 'measurements')
        },
        locations: {
            registros: [], 
            get: genericGetResource($http, 'locations')
        },
        tickets: {
            registros: [], 
            get: genericGetResource($http, 'tickets')
        },
        products: {
            registros: [], 
            get: genericGetResource($http, 'products')
        },
    }
}])

app.factory('getOneFactory', ['$http', function($http){
    return {
        at: function(name, id){
            return $http.get(`${window.url}/api/logistic/${name}/${id}`)
        }
    }
}])