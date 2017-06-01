angular.module('Examen').service('registroUsuarioService', ['$http', function($http){
    
    this.agregarUsu = function (data) {
      return $http.post('http://localhost/Examen/www/server.php/agregarUsuario', $.param(data));
    };

    this.obtenerUsu = $http.get('http://localhost/Examen/www/server.php/obtenerUsuario');
    
    this.editarUsu = function (data) {
      return $http.post('http://localhost/Examen/www/server.php/editarUsuario', $.param(data));
    };
    
    this.eliminarUsu = function (data) {
      return $http.post('http://localhost/Examen/www/server.php/eliminarUsuario', $.param(data));
    };
    
}]);