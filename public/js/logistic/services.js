// app.factory('brandsFactory', ['$http', function($http){
//     return {
//         get: function(buscar){
//             return $http.get(
//                 // url
//                 `${window.url}/api/logistic/brands`, 
//                 // config
//                 { 
//                     params: {
//                         search: buscar
//                     }
//                 }
//             )
//         } 
//     }
// }])

app.factory('utilitiesFactory', ['$http' ,function($http){
    return {
        brands: {
            registros: [], 
            get: function(keyCode, buscar){
                if(arguments.length === 0)
                    keyCode = 17
                if(keyCode === 17){// si presiona ctrl
                    $http.get(
                        // url
                        `${window.url}/api/logistic/brands`, 
                        // config
                        { 
                            params: {
                                search: buscar
                            }
                        }
                    ).then(
                        // success
                        (response) => {
                            this.registros = response.data.data
                        }
                    )
                }
            }
        },
        categories: {
            registros: [], 
            get: function(keyCode, buscar){
                if(arguments.length === 0)
                    keyCode = 17
                if(keyCode === 17){// si presiona ctrl
                    $http.get(
                        // url
                        `${window.url}/api/logistic/categories`, 
                        // config
                        { 
                            params: {
                                search: buscar
                            }
                        }
                    ).then(
                        // success
                        (response) => {
                            this.registros = response.data.data
                        }
                    )
                }
            }
        },
        measurements: {
            registros: [], 
            get: function(keyCode, buscar){
                if(arguments.length === 0)
                    keyCode = 17
                if(keyCode === 17){// si presiona ctrl
                    $http.get(
                        // url
                        `${window.url}/api/logistic/measurements`, 
                        // config
                        { 
                            params: {
                                search: buscar
                            }
                        }
                    ).then(
                        // success
                        (response) => {
                            this.registros = response.data.data
                        }
                    )
                }
            }
        },
        packings: {
            registros: [], 
            get: function(keyCode, buscar){
                if(arguments.length === 0)
                    keyCode = 17
                if(keyCode === 17){// si presiona ctrl
                    $http.get(
                        // url
                        `${window.url}/api/logistic/packings`, 
                        // config
                        { 
                            params: {
                                search: buscar
                            }
                        }
                    ).then(
                        // success
                        (response) => {
                            this.registros = response.data.data
                        }
                    )
                }
            }
        },
    }
}])