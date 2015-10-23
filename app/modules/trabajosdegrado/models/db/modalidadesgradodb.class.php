<?php
class Modules_Trabajosdegrado_ModelDb_ModalidadesGradoDb extends Moon2_DBmanager_PDO{

public function __construct(){
    parent::__construct();
    $this->_Pkey["value"] = 0;
    $this->_table = "modalidadesgrado";
    $this->_Pkey["key"] = "codmodalidadgrado";
    $this->_sequence = $this->_table."_".$this->_Pkey["key"]."_seq";
}

public function combo(){
    $sql = "SELECT m.codmodalidadgrado, m.nombremodalidad ";
    $sql.= "FROM modalidadesgrado m ORDER BY m.nombremodalidad";
    $arr = $this->GetAssoc($sql);
    return $arr;
}

public function obtener($orden){
    $sql = "SELECT m.codmodalidadgrado, m.nombremodalidad, m.valor, m.asocompanero, ";
    $sql.= "(SELECT count(*) FROM rel_formatosmodalidades WHERE codmodalidadgrado = m.codmodalidadgrado) as cantformatos ";
    $sql.= "FROM {$this->_table} m ";
    $sql.= "ORDER BY {$orden}";
    $arreglo = $this->GetAll($sql);
    return $arreglo;
}

public function cantidadFormatosAsignados($cod_modalidadgrado){
    $parametros = array($cod_modalidadgrado);
    $sql = "SELECT count(*) FROM rel_formatosmodalidades WHERE codmodalidadgrado = ?";
    $cantidad = $this->GetOne($sql, $parametros);
    return $cantidad;
}

public function cantidadFormatosDisponibles($cod_modalidadgrado){
    $parametros = array($cod_modalidadgrado);
    $sql = "SELECT count(*) FROM formatosgrado WHERE codformato NOT IN ";
    $sql.= "(select codformato FROM rel_formatosmodalidades WHERE codmodalidadgrado = ?)";
    $cantidad = $this->GetOne($sql, $parametros);
    return $cantidad;
}

public function obtenerFormatos($cod_modalidadgrado){
    $parametros = array($cod_modalidadgrado);
    $sql = "SELECT codformato, nombreformato, version, descripcion, formatocodificado, tipo, tamanno ";
    $sql.= "FROM formatosgrado ";
    $sql.= "WHERE codformato IN (SELECT codformato FROM rel_formatosmodalidades WHERE codmodalidadgrado = ?) ";
    $sql.= "ORDER BY tipo,nombreformato";
    $arreglo = $this->GetAssoc($sql, $parametros);
    return $arreglo;
}

public function obtenerFormatosDisponibles($cod_modalidadgrado){
    $parametros = array($cod_modalidadgrado);
    $sql = "SELECT f.codformato, f.nombreformato, f.version, f.descripcion, f.formatocodificado, f.tipo, f.tamanno, ";
    $sql.= "(SELECT count(*) FROM rel_formatosmodalidades WHERE codformato = f.codformato) as utilizados ";
    $sql.= "FROM formatosgrado f ";
    $sql.= "WHERE f.codformato NOT IN (SELECT codformato FROM rel_formatosmodalidades WHERE codmodalidadgrado = ?) ";
    $sql.= "ORDER BY tipo,nombreformato";
    $arreglo = $this->GetAssoc($sql, $parametros);
    return $arreglo;
}

public function asignarFormato($codmodalidad, $codformato){
    $parametros = array($codmodalidad, $codformato);
    $sql = "INSERT INTO rel_formatosmodalidades(codmodalidadgrado, codformato) VALUES (?, ?)";
    $resultado = $this->ExecuteSql($sql, $parametros);
    return $resultado;
}

public function desasignarFormato($codmodalidad, $codformato){
    $parametros = array($codmodalidad, $codformato);
    $sql = "DELETE FROM rel_formatosmodalidades WHERE codmodalidadgrado=? AND codformato=?";
    $resultado = $this->ExecuteSql($sql, $parametros);
    return $resultado;
}


}//End class
?>