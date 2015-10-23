<?php
class Modules_Trabajosdegrado_Model_DocumentosProyectoFacade implements Moon2_Interfaces_MandatoryModel {
    private $_documentosproyectoDB;

public function __construct() {
    $this->_documentosproyectoDB = new Modules_Trabajosdegrado_ModelDb_DocumentosProyectoDb();
}

// START: Mandatory methods
//***********************************************************************************
public function add($obj){
    return $this->_documentosproyectoDB->add($obj);
}

public function update($obj){
    return $this->_documentosproyectoDB->update($obj);
}
public function delete($obj){
    return $this->_documentosproyectoDB->delete($obj);
}
public function loadOne($obj){
    return $this->_documentosproyectoDB->loadOne($obj);
}

public function add_searchField($key, $field){
    return $this->_documentosproyectoDB->add_searchField($key, $field);
}

public function load_all(&$rsNumRows, $limit_numrows, $page, $Data=array()){
    return $this->_documentosproyectoDB->load_all($rsNumRows, $limit_numrows, $page, $Data);
}
//***********************************************************************************
// END: Mandatory methods


// START: User-defined methods
//
//
public function porUsuario($codusuario){
    return $this->_documentosproyectoDB->porUsuario($codusuario);
}

public function anteproyecto($codproyectogrado){
    return $this->_documentosproyectoDB->anteproyecto($codproyectogrado);
}
//
//
// END: User-defined methods


}//End class
?>