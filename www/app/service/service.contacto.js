   angular.module('Examen').service('registroContactoService', ['$http', function($http){
    
    this.agregarCon = function (data) {
      return $http.post('http://localhost/Examen/www/server.php/agregarContacto', $.param(data));
    };

    this.obtenerCon = $http.get('http://localhost/Examen/www/server.php/obtenerContacto');
    
    this.editarCon = function (data) {
      return $http.post('http://localhost/Examen/www/server.php/editarContacto', $.param(data));
    };
    
    this.eliminarCon = function (data) {
      return $http.post('http://localhost/Examen/www/server.php/eliminarContacto', $.param(data));
    };
    
}]);
