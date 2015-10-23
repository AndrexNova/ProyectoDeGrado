<?php
class Modules_Trabajosdegrado_ModelDb_ConsignacionesDb extends Moon2_DBmanager_PDO{

public function __construct(){
    parent::__construct();
    $this->_Pkey["value"] = 0;
    $this->_table = "consignaciones";
    $this->_Pkey["key"] = "codconsignacion";
    $this->_sequence = $this->_table."_".$this->_Pkey["key"]."_seq";
}

public function porProyecto($codproyectogrado, $codusuario){
    $parametros = array($codproyectogrado,$codusuario);
    $sql = "SELECT codconsignacion, codusuario, nombreconsignacion, nombrecodificado, ";
    $sql.= "tipo, tamanno, fecha, valor, numero ";
    $sql.= "FROM consignaciones WHERE codproyectogrado = ? and codusuario = ? ORDER BY codconsignacion";
    $arr = $this->GetAll($sql, $parametros);
    return $arr;
}

}//End class
?>