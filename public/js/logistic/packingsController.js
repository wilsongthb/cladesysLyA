// crud usando http de angular

app.factory('packingsFactory', function($resource){
    name = 'packings'

    backend_url = `${window.url}/api/logistic/${name}`
    return {
        name,
        backend_url,
        form: {
            detail: "",
            user_id: window.user.id
        },
        backend: $resource(backend_url + '/:id')
    }
})

// se encarga de mostrar los registros
app.controller('packingsController', function($scope, $routeParams, packingsFactory, $window){
    $scope.name = packingsFactory.name
    // traer registros
    $scope.registros = packingsFactory.backend.query()
    // eliminar registro
    $scope.eliminar = function(registro){
        if($window.confirm(`Eliminar el registro ${registro.id}`)){
            registro.$delete({id: registro.id}, function(data){
                $scope.registros = packingsFactory.backend.query()
            })
        }
    }
})

// se encarga de mostrar el formulario de creacion
app.controller('packingsCreateController', function(
        $scope, 
        $routeParams, 
        $window,
        packingsFactory,
        $location
    ){
    $scope.type = 'CREAR' 
    $scope.form = JSON.parse(JSON.stringify(packingsFactory.form)) // asigna un nuevo objeto
    $scope.cancelar = function(){
        $scope.form = packingsFactory.form // reinicia los inputs
        $window.history.back() // regresa a la pagina anterior, segun el historial del navegador
    }
    $scope.registrar = function(){
        packingsFactory.backend.save($scope.form, function(){
            $location.path(`${packingsFactory.name}`)
        })
    }
})

// se encarga de mostrar el formulario de edicion
app.controller('packingsEditController', function(
        $scope, 
        $http,
        $routeParams, 
        $window,
        packingsFactory,
        $location
    ){
    $scope.type = 'EDITAR'
    $scope.form = new packingsFactory.backend.get({id: $routeParams.id})
    $scope.cancelar = function(){
        $scope.form = packingsFactory.form // reinicia los inputs
        $window.history.back() // regresa a la pagina anterior, segun el historial del navegador
    }
    $scope.registrar = function(){
        // esta parte no usa $resource porque no funciona adecuadamente, me sale mas sencillo modificar peticion
        $http.put(packingsFactory.backend_url + '/' + $routeParams.id, $scope.form).then(function(){
            $location.path(`${packingsFactory.name}`)
        })
    }
})