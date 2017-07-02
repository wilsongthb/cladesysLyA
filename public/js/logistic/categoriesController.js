const categories = {
    form: {
        detail: "",
        user_id: window.user.id
    },
    config: {
        name: 'categories',
        title: 'CATEGORIA'
    }
}

app.controller('categoriesController', function($scope, $http){
    $scope.config = categories.config
    $scope.leer = function(){
        $http.get(`${window.url}/api/logistic/${$scope.config.name}`, {
            params: {
                search: $scope.search
            }
        }).then(function(response){
            console.log(response)
        })
    }

    $scope.leer()
})