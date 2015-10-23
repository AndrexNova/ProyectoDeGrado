<?php
class Modules_Trabajosdegrado_Controllers_FormatosGradoController{
    private $_dom;
    private $_url;
    private $_action;
    private $_parameters;
    private $_path_config;

public function __construct($parameters, $dom, $path_config){
    $this->_parameters = $parameters;
    $this->_action = $parameters->get_parameter("action","");
    $action = $this->_action;
    $rc = new ReflectionClass("Modules_Trabajosdegrado_Controllers_FormatosGradoController");
    if ($rc->hasMethod($this->_action)){
        $this->_dom = $dom; 
        $this->_path_config = $path_config;
        $this->$action();
    }else{
        $this->stop();
    }
}

private function stop(){
    $message = "Moon2 Message:<br/><span style=\"color:red;font-weight: bold\">".$this->_action."</span> ";
    $message.= "Controller not implemented in class <span style=\"color:red;font-weight: bold\">".get_class($this)."</span>";
    echo $message;
    $this->_parameters->show();
    header("Status: 400 Bad request", false, 400);
    exit();
}

public function getUrl(){
    return $this->_url;
}


// START: Controller private methods
//***************************************************************************************************
private function descargar(){
    $cod_formato = $this->_parameters->get_parameter("codformato","");
    $Formato = new Modules_Trabajosdegrado_Model_FormatosGrado();
    $FacadeFormatos = new Modules_Trabajosdegrado_Model_FormatosGradoFacade();
    
    $Formato->set_codformato($cod_formato);
    $Formato = $FacadeFormatos->loadOne($Formato);
    
    $Archivo = new Moon2_Files_FileManager();
    $Archivo->set_folder($this->_path_config["TRAGRA_FORMATOS"]);
    $nombre_archivo = $Formato->get_nombreformato();
    $ruta_fisica = $this->_path_config["TRAGRA_FORMATOS"]."/".$Formato->get_formatocodificado();
    $tipo = $Formato->get_tipo();
    $tamanno = $Formato->get_tamanno();
    $Archivo->download($nombre_archivo, $ruta_fisica, $tipo, $tamanno);
    
    exit();
}
//***************************************************************************************************
// END: Controller private methods


}//End class
?>