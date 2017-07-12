// crud usando resource de angular
// no lo recomiendo mucho, me tomo mucho tiempo darme cuenta que no es completamente compatible con laravel, requiere configuracion
// lo bueno es que usa promises

app.factory('brandsFactory', function($resource){
    name = 'brands'

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
app.controller('brandsController', function($scope, $routeParams, brandsFactory, $window){
    // traer registros
    $scope.registros = brandsFactory.backend.query()
    $scope.eliminar = function(registro){
        if($window.confirm(`Eliminar el registro ${registro.id}`)){
            registro.$delete({id: registro.id}, function(data){
                $scope.registros = brandsFactory.backend.query()
            })
        }
    }
})

// se encarga de mostrar el formulario de creacion
app.controller('brandsCreateController', function(
        $scope, 
        $routeParams, 
        $window,
        brandsFactory,
        $location
    ){
    $scope.type = 'CREAR' 
    $scope.form = JSON.parse(JSON.stringify(packingsFactory.form)) // asigna un nuevo objeto
    $scope.cancelar = function(){
        $scope.form = brandsFactory.form // reinicia los inputs
        $window.history.back() // regresa a la pagina anterior, segun el historial del navegador
    }
    $scope.registrar = function(){
        brandsFactory.backend.save($scope.form, function(){
            $location.path(`${brandsFactory.name}`)
        })
    }
})

// se encarga de mostrar el formulario de edicion
app.controller('brandsEditController', function(
        $scope, 
        $http,
        $routeParams, 
        $window,
        brandsFactory,
        $location
    ){
    $scope.type = 'EDITAR'
    $scope.form = new brandsFactory.backend.get({id: $routeParams.id})
    $scope.cancelar = function(){
        $scope.form = brandsFactory.form // reinicia los inputs
        $window.history.back() // regresa a la pagina anterior, segun el historial del navegador
    }
    $scope.registrar = function(){
        // esta parte no usa $resource porque no funciona adecuadamente, me sale mas sencillo modificar peticion
        $http.put(brandsFactory.backend_url + '/' + $routeParams.id, $scope.form).then(function(){
            $location.path(`${brandsFactory.name}`)
        })
    }
})