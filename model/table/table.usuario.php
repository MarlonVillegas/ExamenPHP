<?php

class usuario {

    private $id;
    private $nombre;
    private $alias;
    private $contrasena;
    private $rolid;
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getAlias() {
        return $this->alias;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getRolid() {
        return $this->rolid;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setAlias($alias) {
        $this->alias = $alias;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function setRolid($rolid) {
        $this->rolid = $rolid;
    }





}
