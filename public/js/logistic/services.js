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
        purchase: {
            list: [],
            get () {
                $http.get(`${GLOBAL.url}/logistic/api/purchase`).then(
                    // success
                    (response) => {
                        // console.log(response)
                        // console.log(this)
                        this.list = response.data
                    }
                )
            }
        },
        stock: {
            list: [],
            get () {
                $http.get(`${GLOBAL.url}/logistic/api/stock`).then(
                    // success
                    (response) => {
                        this.list = response.data
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
    // this.locations = utilitiesFactory.locations

    // this.locations.get()
    // utilitiesFactory.locations.get()
    // this.locations = utilitiesFactory.locations.registros
    this.lista = []
    this.init = function(){
        $http.get(`${GLOBAL.api_url}/locations`).then(
            (res) => {
                // this.lista = res.data.data
                // this.lista[0] = {
                //     name: "NINGUNO"
                // }
                for(i in res.data.data){
                    this.lista[res.data.data[i].id] = res.data.data[i]
                }
            }
        )
    }
    this.init()

    this.id = 1
    this.id = parseInt(localStorage.locations_id)

    this.set = function(id){
        this.id = id
        localStorage.locations_id = id
    }

    this.get = function(){
        return parseInt(localStorage.locations_id)
    }
})

app.service('mys', function() {
    this.id = 1
})