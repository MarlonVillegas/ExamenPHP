<?php

class contactoDAO extends dataSource implements IContacto{

    public function delete($id, $logico = true) {
        if ($logico === true) {
            $sql = 'UPDATE contactos SET con_deleted_at = now() WHERE con_id = :id';
            $params = array(
                ':id' => $id
            );
            return $this->execute($sql, $params);
        } else if ($logico === false) {
            $sql = 'DELETE FROM contactos WHERE con_id = :id AND con_deleted_at IS NULL';
            $params = array(
                ':id' => (integer) $id
            );
            return $this->execute($sql, $params);
        }
    }

    public function insert(\contacto $contacto) {
        $sql = 'INSERT INTO contactos (con_cedula, con_nombres, con_apellidos, con_categoria, con_telefono, con_direccion, con_correo, con_ciudad) VALUES (:cedula, :nombres, :apellidos, :categoria, :telefono, :direccion, :correo,:ciudad)';
        $params = array(
            ':cedula' => $contacto->getCedula(),
            ':nombres' => $contacto->getNombres(),
            ':apellidos' => $contacto->getApellidos(),
            ':categoria' => $contacto->getCategoria(),
            ':telefono' => $contacto->getTelefono(),
            ':direccion' => $contacto->getDireccion(),
            ':correo' => $contacto->getCorreo(),
            ':ciudad' => $contacto->getCiudad(),
        );
        return $this->execute($sql, $params);
    }

    public function search($cedula) {
        $sql = 'SELECT con_id, con_cedula, con_nombres, con_apellidos, con_categoria, con_telefono, con_direccion, con_correo, con_ciudad FROM contactos WHERE con_cedula = :cedula';
        $params = array(
            ':cedula' => $cedula
        );
        return $this->query($sql, $params);
    }

    public function select() {
        $sql = 'SELECT con_id,con_cedula, con_nombres, con_apellidos, con_categoria, con_telefono, con_direccion, con_correo, con_ciudad FROM contactos WHERE con_deleted_at IS NULL';
        return $this->query($sql);
    }

    public function selectById($id) {
        $sql = 'SELECT con_id, con_cedula, con_nombres, con_apellidos, con_categoria, con_telefono, con_direccion, con_correo, con_ciudad FROM contactos WHERE con_id = :id';
        $params = array(
            ':id' => $id
        );
        return $this->query($sql, $params);
    }

    public function update(\contacto $contacto) {
        $sql = 'UPDATE contactos SET con_cedula = :cedula, con_nombres = :nombres, con_apellidos = :apellidos, con_categoria = :categoria, con_telefono = :telefono, con_direccion = :direccion, con_correo = :correo, con_ciudad=:ciudad WHERE con_id = :id';
        $params = array(
            ':cedula' => $contacto->getCedula(),
            ':nombres' => $contacto->getNombres(),
            ':apellidos' => $contacto->getApellidos(),
            ':categoria' => $contacto->getCategoria(),
            ':telefono' => $contacto->getTelefono(),
            ':direccion' => $contacto->getDireccion(),
            ':correo' => $contacto->getCorreo(),
            ':ciudad' => $contacto->getCiudad(),
            ':id' => $contacto->getId(),
        );
        return $this->execute($sql, $params);
    }

}
