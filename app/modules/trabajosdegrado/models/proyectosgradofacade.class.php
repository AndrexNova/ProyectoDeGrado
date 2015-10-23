<?php
class Modules_Trabajosdegrado_Model_ProyectosGradoFacade implements Moon2_Interfaces_MandatoryModel {
    private $_proyectosgradoDB;

public function __construct() {
    $this->_proyectosgradoDB = new Modules_Trabajosdegrado_ModelDb_ProyectosGradoDb();
}

// START: Mandatory methods
//***********************************************************************************
public function add($obj){
    return $this->_proyectosgradoDB->add($obj);
}

public function update($obj){
    return $this->_proyectosgradoDB->update($obj);
}
public function delete($obj){
    return $this->_proyectosgradoDB->delete($obj);
}
public function loadOne($obj){
    return $this->_proyectosgradoDB->loadOne($obj);
}

public function add_searchField($key, $field){
    return $this->_proyectosgradoDB->add_searchField($key, $field);
}

public function load_all(&$rsNumRows, $limit_numrows, $page, $Data=array()){
    return $this->_proyectosgradoDB->load_all($rsNumRows, $limit_numrows, $page, $Data);
}
//***********************************************************************************
// END: Mandatory methods


// START: User-defined methods
//
//
public function porUsuario($codusuario){
    return $this->_proyectosgradoDB->porUsuario($codusuario);
}
public function traercodigodatos($codproyecto){
    return $this->_proyectosgradoDB->traercodigodatos($codproyecto);
}

public function mostrarnombre($codproyecto){
    return $this->_proyectosgradoDB->mostrarnombre($codproyecto);
}

public function busqUsuario($documento){
    return $this->_proyectosgradoDB->busqUsuario($documento);
}

public function obtenerUsuario($documento){
    return $this->_proyectosgradoDB->obtenerUsuario($documento);
}

public function agregarParticipante($tipoAsignacion, $documento, $codproyectogrado){
    return $this->_proyectosgradoDB->agregarParticipante($tipoAsignacion, $documento, $codproyectogrado);
}

public function obtenerParticipantes($codproyectogrado, $codusuario){
    return $this->_proyectosgradoDB->obtenerParticipantes($codproyectogrado, $codusuario);
}

//
//
// END: User-defined methods


}//End class
?>