<?php
class Modules_Trabajosdegrado_Model_FormatosGradoFacade implements Moon2_Interfaces_MandatoryModel {
    private $_formatosgradoDB;

public function __construct() {
    $this->_formatosgradoDB = new Modules_Trabajosdegrado_ModelDb_FormatosGradoDb();
}

// START: Mandatory methods
//***********************************************************************************
public function add($obj){
    return $this->_formatosgradoDB->add($obj);
}

public function update($obj){
    return $this->_formatosgradoDB->update($obj);
}
public function delete($obj){
    return $this->_formatosgradoDB->delete($obj);
}
public function loadOne($obj){
    return $this->_formatosgradoDB->loadOne($obj);
}

public function add_searchField($key, $field){
    return $this->_formatosgradoDB->add_searchField($key, $field);
}

public function load_all(&$rsNumRows, $limit_numrows, $page, $Data=array()){
    return $this->_formatosgradoDB->load_all($rsNumRows, $limit_numrows, $page, $Data);
}
//***********************************************************************************
// END: Mandatory methods


// START: User-defined methods
//
//
public function cantidadUtilizados($codformato){
    return $this->_formatosgradoDB->cantidadUtilizados($codformato);
}

public function eliminar($codformato){
    return $this->_formatosgradoDB->eliminar($codformato);
}
//
// END: User-defined methods


}//End class
?>