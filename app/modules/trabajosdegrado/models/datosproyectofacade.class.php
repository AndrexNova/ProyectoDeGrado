<?php

class Modules_Trabajosdegrado_Model_DatosProyectoFacade implements Moon2_Interfaces_MandatoryModel {
    private $_datosproyectoDB;

public function __construct() {
    $this->_datosproyectoDB = new Modules_Trabajosdegrado_ModelDb_DatosProyectoDb();
}

// START: Mandatory methods
//***********************************************************************************
public function add($obj){
    return $this->_datosproyectoDB->add($obj);
}

public function update($obj){
    return $this->_datosproyectoDB->update($obj);
}
public function delete($obj){
    return $this->_datosproyectoDB->delete($obj);
}
public function loadOne($obj){
    return $this->_datosproyectoDB->loadOne($obj);
}

public function add_searchField($key, $field){
    return $this->_datosproyectoDB->add_searchField($key, $field);
}

public function load_all(&$rsNumRows, $limit_numrows, $page, $Data=array()){
    return $this->_datosproyectoDB->load_all($rsNumRows, $limit_numrows, $page, $Data);
}

public function porProyecto($codproyecto){
    return $this->_datosproyectoDB->porProyecto($codproyecto);
}

public function verificar(){
    return $this->_datosproyectoDB->verificar();
}
public function VerificarProyecto($cod_proyecto){
    return $this->_datosproyectoDB->VerificarProyecto($cod_proyecto);
}
//***********************************************************************************
// END: Mandatory methods
}
?>
