<?php

class editarContacto extends controllerExtended {

  public function main(\request $request) {
    try {
      $this->loadTablecontacto();

      $contacto = new contacto();
      $contacto->setCedula($request->getParam('cedula'));
      $contacto->setNombres($request->getParam('nombres'));
      $contacto->setApellidos($request->getParam('apellidos'));
      $contacto->setCategoria($request->getParam('categoria'));
      $contacto->setTelefono($request->getParam('telefono'));
      $contacto->setDireccion($request->getParam('direccion'));
      $contacto->setCorreo($request->getParam('correo'));
      $contacto->setCiudad($request->getParam('ciudad'));
      $contacto->setId($request->getParam('id'));

      $contactoDAO = new contactoDAOExt($this->getConfig());
      $respuesta1 = $contactoDAO->update($contacto);
      $respuesta2 = array(
          'code' => ($respuesta1 > 0) ? 200 : 500,
          'datos' => $respuesta1
      );

      $this->setParam('rsp', $respuesta2);
      $this->setView('imprimirJson');
    } catch (Exception $exc) {
      echo $exc->getMessage();
    }
  }

  private function loadTablecontacto() {
    require $this->getConfig()->getPath() . 'model/table/table.contacto.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.contacto.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.contactoDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.contactoDAOExt.php';
  }

}