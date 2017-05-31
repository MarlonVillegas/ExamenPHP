<?php

class contactoDAOExt extends contactoDAO {
    
    public function agregar(\contacto$contacto) {
    $sql = 'INSERT INTO contactos (con_cedula, con_nombres, con_apellidos, con_categoria, con_telefono, con_direccion, con_correo, con_ciudad) VALUES (:cedula, :nombres, :apellidos, :categoria, :telefono, :direccion, :correo, :ciudad)';
    $params = array(
        ':id' => $contacto->getId(),
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
}
