// este archivo contiene funciones genericas para la aplicacion
// estas funciones tienen el objetivo de reducir el codigo repetitivo, ya que es dificil de mantener

var genericGetResource = function($http ,name){
    /**
     * @author: Wiskats
     * @required: window
     * @argument: $http, name
     */
    return (function(buscar, keyCode){
        if(arguments.length === 0 || !keyCode)
            keyCode = 17
        if(keyCode === 17){// si presiona ctrl
            $http.get(
                // url
                `${window.url}/api/logistic/${name}`, 
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
    })
}

// funcion para controlador 
var readResourceController = function(config){
    /**
     * @description: Funcion controlador generico para vista read o index
     * @author: Wiskats
     * @required: window
     * @argument: Object config
     * @return Array
     */
    return (['$scope', '$http', '$window', function($scope, $http, $window){

    // enfoque inicial
    // document.getElementById('init_focus').focus()
    enfocar('init_focus')
    // console.log('focus')

    // valores iniciales
    $scope.config = JSON.parse(JSON.stringify(config))
    $scope.registros = []
    $scope.buscar = ''
    $scope.error = false
    // valores de paginacion
    $scope.page = 1
    $scope.per_page = 0
    $scope.page_to = 0
    $scope.total = 0
    
    // eliminar
    $scope.delete_id = 0

    $scope.buscarEnter = function(keyCode){
        // console.log(keyCode)
        if(keyCode === 13){
            $scope.leer()
        }
    }
    $scope.leer = function(){
        $http.get(
            // url
            `${window.url}/api/logistic/${$scope.config.name}`, 
            // config
            {
                params: {
                    search: $scope.buscar,
                    page: $scope.page
                }
            }
        ).then(
            // success
            function(response){
                $scope.registros = response.data.data
                $scope.per_page = response.data.per_page
                $scope.page_to = response.data.to
                $scope.total = response.data.total
            },
            // error
            function(response){
                $scope.error = true
            }
        )
    }
    $scope.eliminar = function(id){
        if($window.confirm(`Eliminar al registro con ID ${id}`)){
            $http.delete(
                // url
                `${window.url}/api/logistic/${$scope.config.name}/${id}`
            ).then(
                // success
                function(response){
                    $scope.leer()
                },
                // error
                function(response){
                    $scope.error = true
                }
            )
        }
    }
    
    // al iniciar
    $scope.leer()
}])
}