<?php
class Modules_Trabajosdegrado_Model_UsuproyectogradoFacade implements Moon2_Interfaces_MandatoryModel {
    private $_usuprograDB;

public function __construct() {
    $this->_usuprograDB = new Modules_Trabajosdegrado_ModelDb_UsuproyectogradoDb();
}

// START: Mandatory methods
//***********************************************************************************
public function add($obj){
    return $this->_usuprograDB->add($obj);
}

public function update($obj){
    return $this->_usuprograDB->update($obj);
}
public function delete($obj){
    return $this->_usuprograDB->delete($obj);
}
public function loadOne($obj){
    return $this->_usuprograDB->loadOne($obj);
}

public function add_searchField($key, $field){
    return $this->_usuprograDB->add_searchField($key, $field);
}

public function load_all(&$rsNumRows, $limit_numrows, $page, $Data=array()){
    return $this->_usuprograDB->load_all($rsNumRows, $limit_numrows, $page, $Data);
}
//***********************************************************************************
// END: Mandatory methods

public function finalizarradicacion($codproyecto){
    return $this->_usuprograDB->finalizarradicacion($codproyecto);
}
// START: User-defined methods
//
//
//
//
// END: User-defined methods


}//End class
?>