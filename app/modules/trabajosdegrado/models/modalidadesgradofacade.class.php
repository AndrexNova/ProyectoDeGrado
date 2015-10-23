<?php
class Modules_Trabajosdegrado_Model_ModalidadesGradoFacade implements Moon2_Interfaces_MandatoryModel {
    private $_modalidadesDB;

public function __construct() {
    $this->_modalidadesDB = new Modules_Trabajosdegrado_ModelDb_ModalidadesGradoDb();
}

// START: Mandatory methods
//***********************************************************************************
public function add($obj){
    return $this->_modalidadesDB->add($obj);
}

public function update($obj){
    return $this->_modalidadesDB->update($obj);
}
public function delete($obj){
    return $this->_modalidadesDB->delete($obj);
}
public function loadOne($obj){
    return $this->_modalidadesDB->loadOne($obj);
}

public function add_searchField($key, $field){
    return $this->_modalidadesDB->add_searchField($key, $field);
}

public function load_all(&$rsNumRows, $limit_numrows, $page, $Data=array()){
    return $this->_modalidadesDB->load_all($rsNumRows, $limit_numrows, $page, $Data);
}
//***********************************************************************************
// END: Mandatory methods


// START: User-defined methods
//
//
public function combo(){
    return $this->_modalidadesDB->combo();
}

public function obtener($orden){
    return $this->_modalidadesDB->obtener($orden);
}

public function cantidadFormatosAsignados($cod_modalidadgrado){
    return $this->_modalidadesDB->cantidadFormatosAsignados($cod_modalidadgrado);
}

public function cantidadFormatosDisponibles($cod_modalidadgrado){
    return $this->_modalidadesDB->cantidadFormatosDisponibles($cod_modalidadgrado);
}

public function obtenerFormatos($cod_modalidadgrado){
    return $this->_modalidadesDB->obtenerFormatos($cod_modalidadgrado);
}

public function obtenerFormatosDisponibles($cod_modalidadgrado){
    return $this->_modalidadesDB->obtenerFormatosDisponibles($cod_modalidadgrado);
}

public function asignarFormato($codmodalidad, $codformato){
    return $this->_modalidadesDB->asignarFormato($codmodalidad, $codformato);
}

public function desasignarFormato($codmodalidad, $codformato){
    return $this->_modalidadesDB->desasignarFormato($codmodalidad, $codformato);
}
//
//
// END: User-defined methods


}//End class
?>