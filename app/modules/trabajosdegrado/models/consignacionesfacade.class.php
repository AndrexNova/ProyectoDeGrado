<?php
class Modules_Trabajosdegrado_Model_ConsignacionesFacade implements Moon2_Interfaces_MandatoryModel {
    private $_consignacionesDB;

public function __construct() {
    $this->_consignacionesDB = new Modules_Trabajosdegrado_ModelDb_ConsignacionesDb();
}

// START: Mandatory methods
//***********************************************************************************
public function add($obj){
    return $this->_consignacionesDB->add($obj);
}

public function update($obj){
    return $this->_consignacionesDB->update($obj);
}
public function delete($obj){
    return $this->_consignacionesDB->delete($obj);
}
public function loadOne($obj){
    return $this->_consignacionesDB->loadOne($obj);
}

public function add_searchField($key, $field){
    return $this->_consignacionesDB->add_searchField($key, $field);
}

public function load_all(&$rsNumRows, $limit_numrows, $page, $Data=array()){
    return $this->_consignacionesDB->load_all($rsNumRows, $limit_numrows, $page, $Data);
}
//***********************************************************************************
// END: Mandatory methods


// START: User-defined methods
//
//
public function porProyecto($codproyectogrado, $codusuario){
    return $this->_consignacionesDB->porProyecto($codproyectogrado, $codusuario);
}
//
//
// END: User-defined methods


}//End class
?>