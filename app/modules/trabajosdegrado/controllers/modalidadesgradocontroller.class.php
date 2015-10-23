<?php
class Modules_Trabajosdegrado_Controllers_ModalidadesGradoController{
    private $_dom;
    private $_url;
    private $_action;
    private $_parameters;
    private $_path_config;

public function __construct($parameters, $dom, $path_config){
    $this->_parameters = $parameters;
    $this->_action = $parameters->get_parameter("action","");
    $action = $this->_action;
    $rc = new ReflectionClass("Modules_Trabajosdegrado_Controllers_ModalidadesGradoController");
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
private function crear(){
    $obj = new Modules_Trabajosdegrado_Model_ModalidadesGrado();
    $obj = $this->_parameters->set_object($obj);
    
    $FacadeModalidades = new Modules_Trabajosdegrado_Model_ModalidadesGradoFacade();
    $msg = $this->_dom["FMESSAGE"]["success"];
    if ($FacadeModalidades->add($obj) == false){
        header("Status: 400 Bad request", false, 400);
        $msg = $this->_dom["FMESSAGE"]["error"];
        exit();
    }

    $cod_modalidad = $obj->get_codmodalidadgrado();
    $cantidad_formatos = $FacadeModalidades->cantidadFormatosAsignados($cod_modalidad);
    $valor_formateado = number_format($obj->get_valor());
    $companero = "no";
    if ($obj->get_asocompanero() == "true") {
        $companero = "si";
    }
    $java_editar = "javascript:modo_edicion({$cod_modalidad}, '".$obj->get_nombremodalidad()."','".$obj->get_valor()."', '".$obj->get_asocompanero()."');";
    
    $this->_parameters->delete_all();
    $this->_parameters->add("codmodalidad", $cod_modalidad);
    $params_formatos = $this->_parameters->KeyGen();
    
    $fila = "<tr id=\"".$cod_modalidad."\">\n";
    $fila.= " <td>".$obj->get_nombremodalidad()."</td>\n";
    $fila.= " <td> $ ".$valor_formateado."</td>\n";
    $fila.= " <td><div align=\"center\">".$companero."</div></td>\n";
    $fila.= " <td><div align=\"center\"><a title=\"Ver formatos\" href=\"modalidades_formatos.php?{$params_formatos}\">".$cantidad_formatos."</a></div></td>\n";
    $fila.= " <td>";
    $fila.= "   <a title=\"Editar {$obj->get_nombremodalidad()}\" class=\"btn btn-white btn-xs\" href=\"{$java_editar}\"><i class=\"fa fa-edit\"></i></a>";
    $fila.= "&nbsp;";
    $fila.= "   <a href=\"#\" name=\"{$cod_modalidad}\" class=\"btn btn-white btn-xs\" data-toggle=\"modal\" data-target=\"#myModalDeleteAjax\" title=\"{$obj->get_nombremodalidad()}\"><i class=\"fa fa-trash-o\"></i></a>";
    $fila.= "</td>\n";
    $fila.= "</tr>\n";
    echo $fila;
}

private function eliminar(){
    $obj = new Modules_Trabajosdegrado_Model_ModalidadesGrado();
    $obj = $this->_parameters->set_object($obj);

    $FacadeModalidades = new Modules_Trabajosdegrado_Model_ModalidadesGradoFacade();
    $msg = $this->_dom["FMESSAGE"]["success"];
    if ($FacadeModalidades->delete($obj) == false){
        header("Status: 400 Bad request", false, 400);
        $msg = $this->_dom["FMESSAGE"]["error"];
        exit();
    }
    echo "Correcto";
}

private function editar(){
    $obj = new Modules_Trabajosdegrado_Model_ModalidadesGrado();
    $obj = $this->_parameters->set_object($obj);
    
    $FacadeModalidades = new Modules_Trabajosdegrado_Model_ModalidadesGradoFacade();
    $msg = $this->_dom["FMESSAGE"]["success"];
    if ($FacadeModalidades->update($obj) == false){
        header("Status: 400 Bad request", false, 400);
        $msg = $this->_dom["FMESSAGE"]["error"];
        exit();
    }
    
    $companero = "no";
    if ($obj->get_asocompanero() == "true") {
        $companero = "si";
    }
    
    $cod_modalidad = $obj->get_codmodalidadgrado();
    $cantidad_formatos = $FacadeModalidades->cantidadFormatosAsignados($cod_modalidad);
    $valor_formateado = number_format($obj->get_valor());
            
    $this->_parameters->delete_all();
    $this->_parameters->add("codmodalidad", $cod_modalidad);
    $params_formatos = $this->_parameters->KeyGen();
    
    $java_editar = "javascript:modo_edicion({$cod_modalidad}, '".$obj->get_nombremodalidad()."','".$obj->get_valor()."', '".$obj->get_asocompanero()."');";
    $fila = "<tr id=\"".$cod_modalidad."\">\n";
    $fila.= " <td>".$obj->get_nombremodalidad()."</td>\n";
    $fila.= " <td>".$valor_formateado."</td>\n";
    $fila.= " <td><div align=\"center\">".$companero."</div></td>\n";
    $fila.= " <td><div align=\"center\"><a title=\"Ver formatos\" href=\"modalidades_formatos.php?{$params_formatos}\">".$cantidad_formatos."</a></div></td>\n";
    $fila.= " <td>";
    $fila.= "   <a title=\"Editar {$obj->get_nombremodalidad()}\" class=\"btn btn-white btn-xs\" href=\"{$java_editar}\"><i class=\"fa fa-edit\"></i></a>";
    $fila.= "&nbsp;";
    $fila.= "   <a href=\"#\" name=\"{$cod_modalidad}\" class=\"btn btn-white btn-xs\" data-toggle=\"modal\" data-target=\"#myModalDeleteAjax\" title=\"{$obj->get_nombremodalidad()}\"><i class=\"fa fa-trash-o\"></i></a>";
    $fila.= "</td>\n";
    $fila.= "</tr>\n";
    echo $fila;
}

private function asignar(){
    $cod_modalidad = $this->_parameters->get_parameter("codmodalidad","");
    $cod_formato = $this->_parameters->get_parameter("codformato","");

    $FacadeModalidades = new Modules_Trabajosdegrado_Model_ModalidadesGradoFacade();
    $msg = 11;
    if ($FacadeModalidades->asignarFormato($cod_modalidad, $cod_formato) == false){
        header("Status: 400 Bad request", false, 400);
        $msg = 33;
    }
    
    $this->_parameters->delete_all();
    $this->_parameters->add("msg", $msg);
    $this->_parameters->add("codmodalidad", $cod_modalidad);
    $cadenaUrl = $this->_parameters->KeyGen();

    $this->_url = $this->_path_config["ROOT"]["modules"]."/trabajosdegrado/views/modalidades_formatos.php?".$cadenaUrl;
    $script = "<script>\n";
    $script.= "window.parent.location.href = '{$this->_url}';\n";
    $script.= "</script>\n";
    echo $script;
    exit();
}

private function desasignar(){
    $cod_modalidad = $this->_parameters->get_parameter("codmodalidad","");
    $cod_formato = $this->_parameters->get_parameter("codformato","");

    $FacadeModalidades = new Modules_Trabajosdegrado_Model_ModalidadesGradoFacade();
    $msg = $this->_dom["FMESSAGE"]["success"];
    if ($FacadeModalidades->desasignarFormato($cod_modalidad, $cod_formato) == false){
        header("Status: 400 Bad request", false, 400);
        $msg = $this->_dom["FMESSAGE"]["error"];
    }
    
    $this->_parameters->delete_all();
    $this->_parameters->add("msg", $msg);
    $this->_parameters->add("codmodalidad", $cod_modalidad);
    $cadenaUrl = $this->_parameters->KeyGen();

    $this->_url = $this->_path_config["ROOT"]["modules"]."/trabajosdegrado/views/modalidades_formatos.php?".$cadenaUrl;
    header("Location: {$this->_url}");
}

private function adjuntarFormato(){
    $msg = 33; //El primer Bit indica que es error, el segundo es el mensaje
    $archivo_procesar = $this->_parameters->get_parameter("nombreformato",NULL);
    $tamanno_maximo = 1030000; //Un mega aproximadamente
    $Archivo = new Moon2_Files_FileManager();
    $Archivo->set_realName($archivo_procesar["name"]);
    $extension = strtolower($Archivo->get_extension());
    $tipos_permitidos = array("doc","docx","pdf","jpg");
    $Archivo->set_folder($this->_path_config["TRAGRA_FORMATOS"]);
    if (!in_array($extension, $tipos_permitidos)){
        $msg = 31;
    }else{
        $tamanno_archivo = (int)$archivo_procesar["size"];
        if ($tamanno_archivo > $tamanno_maximo || $tamanno_archivo === 0){
            $msg = 34;
        }else{
            if ($Archivo->loadFile($archivo_procesar)){
                $version = $this->_parameters->get_parameter("version","");
                $descripcion = $this->_parameters->get_parameter("descripcion","");

                $FormatoGrado = new Modules_Trabajosdegrado_Model_FormatosGrado();
                $FormatoGrado->set_version($version);
                $FormatoGrado->set_descripcion($descripcion);
                $FormatoGrado->set_tamanno($Archivo->get_size());
                $FormatoGrado->set_tipo($Archivo->get_mimetype());
                $FormatoGrado->set_nombreformato($Archivo->get_realName());
                $FormatoGrado->set_formatocodificado($Archivo->get_hiddName());

                $msg = 21; //El primer Bit indica warning, el segundo es el mensaje
                $FacadeFormatoGrado = new Modules_Trabajosdegrado_Model_FormatosGradoFacade();
                if ($FacadeFormatoGrado->add($FormatoGrado)){
                    $msg = 11;//El primer bit indica que es success, el segundo es el mensaje
                }
            }
        }
    }
    
//    Mensajes de error en tiempo de desarrollo para la carga de archivos:
//    echo "Error: ".$Archivo->get_message();
//    exit();
    
    $cod_modalidad = $this->_parameters->get_parameter("codmodalidad",0);
    $this->_parameters->delete_all();
    $this->_parameters->add("msg", $msg);
    $this->_parameters->add("codmodalidad", $cod_modalidad);
    $cadenaUrl = $this->_parameters->KeyGen();

    $this->_url = $this->_path_config["ROOT"]["modules"]."/trabajosdegrado/views/modalidades_formatosdisp.php?".$cadenaUrl;
    header("Location: {$this->_url}");
}

private function borrarFormato(){
    $cod_modalidad = $this->_parameters->get_parameter("codmodalidad","");
    $cod_formato = $this->_parameters->get_parameter("codformato","");
    
    $Formato = new Modules_Trabajosdegrado_Model_FormatosGrado();
    $FacadeFormatos = new Modules_Trabajosdegrado_Model_FormatosGradoFacade();
    
    $Formato->set_codformato($cod_formato);
    $Formato = $FacadeFormatos->loadOne($Formato);
    
    $msg = 32;
    $cantidad = $FacadeFormatos->cantidadUtilizados($cod_formato);
    if ($cantidad == "0"){
        if ($FacadeFormatos->eliminar($cod_formato)){
            $msg = 12;
            $Archivo = new Moon2_Files_FileManager();
            $Archivo->set_folder($this->_path_config["WEBFILES"]);
            $Archivo->deleteFile($Formato->get_formatocodificado());
        }
    }
    
    $this->_parameters->delete_all();
    $this->_parameters->add("msg", $msg);
    $this->_parameters->add("codmodalidad", $cod_modalidad);
    $cadenaUrl = $this->_parameters->KeyGen();

    $this->_url = $this->_path_config["ROOT"]["modules"]."/trabajosdegrado/views/modalidades_formatosdisp.php?".$cadenaUrl;
    header("Location: {$this->_url}");
}
//***************************************************************************************************
// END: Controller private methods


}//End class
?>