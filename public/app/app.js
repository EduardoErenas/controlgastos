var app = angular.module('principalBase', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
//Aqui va la ruta de tu aplicación sustituyes el nombre de tu TU_PROYECTO por el tuyo
app.constant('API_URL', 'http://localhost/TU_PROYECTO/public/');

    app.filter('startFrom', function () {
        return function (input, start) {
            if (input) {
                start = +start;
                return input.slice(start);
            }
            return [];
        };
    }); 

