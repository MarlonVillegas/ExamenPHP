angular.module('Examen').constant('rolAdmin', 1);
angular.module('Examen').constant('rolCelador', 2);

angular.module('Examen').config(['$routeProvider', '$httpProvider', function config($routeProvider, $httpProvider) {
        $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
        $routeProvider.
                when('/', {
                    controller: 'loginController',
                    templateUrl: 'app/template/login.html'
                }).
                when('/inicio', {
                    controller: 'registroContactosController',
                    templateUrl: 'app/template/registroContactos.html'
                }).
                otherwise('/');
    }
]);