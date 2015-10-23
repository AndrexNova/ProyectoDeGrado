<?php
class Modules_Trabajosdegrado_ModelDb_UsuproyectogradoDb extends Moon2_DBmanager_PDO{

public function __construct(){
    parent::__construct();
    $this->_Pkey["value"] = 0;
    $this->_table = "usuproyectogrado";
    $this->_Pkey["key"] = "codrelproyusu";
    $this->_sequence = $this->_table."_".$this->_Pkey["key"]."_seq";
}

public function finalizarradicacion($codproyecto) {
        $parametros = array($codproyecto);
        $sql = "SELECT (SELECT count(*) from usuproyectogrado WHERE codproyectogrado=$codproyecto 
        and finproceso=1) as finalizados,(SELECT count(*) from usuproyectogrado WHERE codproyectogrado=$codproyecto) as totales from usuproyectogrado ";
        $sql.= "WHERE codproyectogrado=$codproyecto";

        $arr = $this->GetAll($sql);

        return $arr;
    }

}//End class
?>