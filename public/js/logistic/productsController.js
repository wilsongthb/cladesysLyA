productsConfig = {
    name: 'products',
    title: 'PRODUCTOS',
    urlApi: `${window.url}/api/logistic/products`
}

app.controller('productsController', function($scope){
    $scope.msj = 'Hola :D'
})