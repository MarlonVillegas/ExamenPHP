angular.module('Examen').controller('registroContactosController', ['$scope', 'registroContactoService', '$sessionStorage', '$location', 'rolAdmin', '$route', '$timeout', function ($scope, agregarContacto, $sessionStorage, $location, rolAdmin, $route, $timeout) {

        $scope.dataRegistrarContacto = {
            cedula: '',
            nombres: '',
            apellidos: '',
            categoria: '',
            telefono: '',
            direccion: '',
            correo: '',
            ciudad: ''
        };
        $scope.contactoRegistrado = false;
        $scope.contactoEditado = false;
        $scope.contactoEliminado = false;
        $scope.contactos = [];
        $scope.edit = {};

        $scope.pintarTabla = function () {
            agregarContacto.obtenerCon.then(function successCallback(response) {
                switch (response.data.code) {
                    case 200:
                        $scope.contactos = response.data.datos;
                        break;
                    case 500:
                        $scope.contactos = [];
                }
            });
        };

        $scope.pintarTabla();

        $scope.submit = function () {
            agregarContacto.agregarCon($scope.dataRegistrarContacto).then(function successCallback(response) {
                $scope.contactoRegistrado = false;
                $scope.dataRegistrarContacto = {};
                if (response.data.code == 500) {
                } else {
                    $scope.contactoRegistrado = true;
                    $scope.dataRegistrarContacto = '';
                    $timeout(function () {
                        $('#nuevoContacto').modal('toggle');
                    }, 700);
                    $timeout(function () {
                        // $route.reload();
                        window.location.reload();
                    }, 1000);
                }
            }, function errorCallback(response) {
                console.error(response);
            });
        };




        $scope.editar = function (dato) {
            $scope.edit.id = dato.con_id;
            $scope.edit.cedula = dato.con_cedula;
            $scope.edit.nombres = dato.con_nombres;
            $scope.edit.apellidos = dato.con_apellidos;
            $scope.edit.categoria = dato.con_categoria;
            $scope.edit.telefono = dato.con_telefono;
            $scope.edit.direccion = dato.con_direccion;
            $scope.edit.correo = dato.con_correo;
            $scope.edit.ciudad = dato.con_ciudad;
            $('#editarContacto').modal('toggle');
        };

        $scope.submitEditarContacto = function () {
            agregarContacto.editarCon($scope.edit).then(function successCallback(response) {
                $scope.contactoEditado = false;
                $scope.edit = {};
                if (response.data.code == 500) {
                } else {
                    $scope.contactoEditado = true;
                    $scope.edit = '';
                    $timeout(function () {
                        $('#editarContacto').modal('toggle');
                    }, 700);
                    $timeout(function () {
                        // $route.reload();
                        window.location.reload();
                    }, 1000);
                }
            }, function errorCallback(response) {
                console.error(response);
            });
        };


        $scope.eliminar = function (dato) {
            $('#eliminarContacto').modal('toggle');
            $scope.nombres = dato.con_nombres;
            $scope.ideliminar = dato.con_id;
        };

        $scope.submitEliminarContacto = function () {
            agregarContacto.eliminarCon({id: $scope.ideliminar}).then(function successCallback(response) {
                $scope.contactoEliminado = false;
                if (response.data.code == 500) {
                } else {
                    $scope.contactoEliminado = true;
                    $timeout(function () {
                        $('#eliminarContacto').modal('toggle');
                    }, 700);
                    $timeout(function () {
                        // $route.reload();
                        window.location.reload();
                    }, 1000);
                }
            }, function errorCallback(response) {
                console.error(response);
            });
        };
    }]);