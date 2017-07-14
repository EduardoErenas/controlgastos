app.controller('ejemploController', function($scope, $http, API_URL, filterFilter) { 

    $scope.cargaInicial = function() {
        console.log('Funciona Ejemplo Controller');
        // Simple GET request example:
        //API_URL es la ruta de laravel que regresa los datos de una consulta
        $http({
          method: 'GET',
          url: API_URL+'getAlumnos'
        }).then(function successCallback(response) {
            $scope.alumnos=response.data.alumnos;
            console.log(response);
        }, function errorCallback(response) {
            sweetAlert("Oops...", "Something went wrong!", "error");
        });
    }
});
