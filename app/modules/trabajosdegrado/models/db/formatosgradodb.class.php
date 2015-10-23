<?php
class Modules_Trabajosdegrado_ModelDb_FormatosGradoDb extends Moon2_DBmanager_PDO{

public function __construct(){
    parent::__construct();
    $this->_Pkey["value"] = 0;
    $this->_table = "formatosgrado";
    $this->_Pkey["key"] = "codformato";
    $this->_sequence = $this->_table."_".$this->_Pkey["key"]."_seq";
}

public function cantidadUtilizados($codformato){
    $parametros = array($codformato);
    $sql = "SELECT count(*) FROM rel_formatosmodalidades WHERE codformato = ?";
    $cantidad = $this->GetOne($sql, $parametros);
    return $cantidad;
}

public function eliminar($codformato){
    $parametros = array($codformato);
    $sql = "DELETE FROM formatosgrado WHERE codformato = ?";
    $result = $this->ExecuteSql($sql, $parametros);
    return $result;
}

}//End class
?>