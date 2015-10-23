<?php
class Modules_Trabajosdegrado_ModelDb_DocumentosProyectoDb extends Moon2_DBmanager_PDO{

public function __construct(){
    parent::__construct();
    $this->_Pkey["value"] = 0;
    $this->_table = "documentosproyecto";
    $this->_Pkey["key"] = "codigo";
    $this->_sequence = $this->_table."_".$this->_Pkey["key"]."_seq";
}

public function anteproyecto($codproyectogrado){
    $parametros = array($codproyectogrado);
    $sql = "SELECT codigo, codproyectogrado, anteproyecto, anteproyectocodificado, ";
    $sql.= "tipo, tamano, estado ";
    $sql.= "FROM documentosproyecto WHERE codproyectogrado = ? and estado = '1' ORDER BY codigo desc limit 1";
    $arr = $this->GetAll($sql, $parametros);
    return $arr;
}

}//End class
?>