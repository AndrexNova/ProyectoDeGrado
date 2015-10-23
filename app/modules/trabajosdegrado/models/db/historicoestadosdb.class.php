<?php
class Modules_Trabajosdegrado_ModelDb_HistoricoEstadosDb extends Moon2_DBmanager_PDO{

public function __construct(){
    parent::__construct();
    $this->_Pkey["value"] = 0;
    $this->_table = "historicoestados";
    $this->_Pkey["key"] = "codhistoricoestado";
    $this->_sequence = $this->_table."_".$this->_Pkey["key"]."_seq";
}


public function historico(){
    $sql = "SELECT h.codhistoricoestado, h.codestado, h.codproyectogrado, h.fecha, h.comentarioestado, dp.titulo, dp.resumen ";
    $sql.= "FROM historicoestados h INNER JOIN datosproyecto dp ON h.codproyectogrado=dp.codproyectogrado ";
    $arr = $this->GetAll($sql);
    return $arr;
}


}//End class
?>