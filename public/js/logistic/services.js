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
            get: genericGetResource($http, 'packings')
        },
        locations: {
            registros: [], 
            get: genericGetResource($http, 'locations')
        },
        // tickets: {
        //     registros: [], 
        //     get: genericGetResource($http, 'tickets')
        // },
        products: {
            registros: [],
            get: genericGetResource($http, 'products')
        },
        suppliers: {
            registros: [], 
            get: genericGetResource($http, 'suppliers')
        },
        images: {
            list: [],
            get: function(){
                $http.get(`${GLOBAL.url}/listimages`).then(
                    // success
                    (response) => {
                        this.list = response.data
                    }
                )
            }
        },
        stock: {
            list: [],
            get () {
                $http.get(`${GLOBAL.url}/api/logistic/stock`).then(
                    // success
                    function(response){
                        console.log(response)
                        console.log(this)
                    }
                )
            }
        }
    }
}])

app.factory('getOneFactory', ['$http', function($http){
    return {
        at: function(name, id){
            return $http.get(`${GLOBAL.url}/logistic/api/${name}/${id}`)
        }
    }
}])

app.service('locationsService', function($http){
    this.lista = []
    // obtener las localizaciones
    this.get = function(){
        $http.get(`${GLOBAL.url}/api/logistic/locations`).then(
            // success
            (response) => {
                this.lista = response.data.data
            }
        )
    }
    this.get()

    // configuracion por defecto
    // this.id = GLOBAL.location.default

    this.set = function(id){
        $http.post(`${APP_CONST.url}/api/config`, {
            config: {
                locations_id: id
            }
        }).then(
            response => {
                this.config = response
            }
        )
        this.id = id
    }
    this.get = function(){
        return this.id
    }
})

app.service('mys', function() {
    this.id = 1
});