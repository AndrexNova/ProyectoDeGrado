<?php
class Modules_Trabajosdegrado_Model_HistoricoEstadosFacade implements Moon2_Interfaces_MandatoryModel {
    private $_histoestadosDB;

public function __construct() {
    $this->_histoestadosDB = new Modules_Trabajosdegrado_ModelDb_HistoricoEstadosDb();
}

// START: Mandatory methods
//***********************************************************************************
public function add($obj){
    return $this->_histoestadosDB->add($obj);
}

public function update($obj){
    return $this->_histoestadosDB->update($obj);
}
public function delete($obj){
    return $this->_histoestadosDB->delete($obj);
}
public function loadOne($obj){
    return $this->_histoestadosDB->loadOne($obj);
}

public function add_searchField($key, $field){
    return $this->_histoestadosDB->add_searchField($key, $field);
}

public function load_all(&$rsNumRows, $limit_numrows, $page, $Data=array()){
    return $this->_histoestadosDB->load_all($rsNumRows, $limit_numrows, $page, $Data);
}

public function historico($codproyectogrado){
    return $this->_histoestadosDB->historico($codproyectogrado);
}
//***********************************************************************************
// END: Mandatory methods


// START: User-defined methods
//
//
//
//
// END: User-defined methods


}//End class
?>