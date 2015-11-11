<?php
class Modules_Homologaciones_Controllers_ProgramasController{
    private $_dom;
    private $_url;
    private $_action;
    private $_parameters;
    private $_path_config;

public function __construct($parameters, $dom, $path_config){
    $this->_parameters = $parameters;
    $this->_action = $parameters->get_parameter("action","");
    $action = $this->_action;
    $rc = new ReflectionClass("Modules_Homologaciones_Controllers_ProgramasController");
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
private function crear(){
    $obj = new Modules_Homologaciones_Model_Programas();
    $obj = $this->_parameters->set_object($obj);
    
    $FacadeProgramas = new Modules_Homologaciones_Model_ProgramasFacade();
    $msg = $this->_dom["FMESSAGE"]["error"];

    if ($FacadeProgramas->add($obj)){
        $msg = $this->_dom["FMESSAGE"]["success"];
    }

    $this->_parameters->delete_all();
    $this->_parameters->add("msg", $msg);
    //$this->_parameters->add("id_programa", $obj->get_id_programa());
    $cadenaUrl = $this->_parameters->KeyGen();
    //exit();
    $this->_url = $this->_path_config["ROOT"]["modules"]."/homologaciones/views/programas_admin.php?".$cadenaUrl;
    $script = "<script>\n";
    $script.= "window.parent.location.href = '{$this->_url}';\n";
    $script.= "</script>\n";
    echo $script;
    exit();
}

private function eliminar(){
    $obj = new Modules_Homologaciones_Model_Programas();
    $obj = $this->_parameters->set_object($obj);

    $FacadeProgramas = new Modules_Homologaciones_Model_ProgramasFacade();
    $msg = 33;
    if ($FacadeProgramas->delete($obj)){
        $msg = 11;
    }

    $this->_parameters->delete_all();
    $this->_parameters->add("msg", $msg);
    $this->_parameters->add("id_programa", $obj->get_id_programa());
    $cadenaUrl = $this->_parameters->KeyGen();

    $this->_url = $this->_path_config["ROOT"]["modules"]."/homologaciones/views/programas_admin.php?".$cadenaUrl;
    header("Location: {$this->_url}");
    exit();
}

//private function editar(){
//    $obj = new Modules_Homologaciones_Model_Programas();
//    $obj = $this->_parameters->set_object($obj);
//    $FacadeProgramas = new Modules_Homologaciones_Model_ProgramasFacade();
//    $msg = $this->_dom["FMESSAGE"]["success"];
//    
//    if ($FacadeProgramas->update($obj) == false){
//        header("Status: 400 Bad request", false, 400);
//        $msg = $this->_dom["FMESSAGE"]["error"];
//        exit();
//    }
//    $id_programa = $obj->get_id_programa();
//    $controller = "Modules_Homologaciones_Controllers_ProgramasController";
//    
//    $this->_parameters->add("action", "eliminar");
//    $this->_parameters->add("controller", $controller);
//    $this->_parameters->add("id_programa", $id_programa);
//    $params_eliminar = $this->_parameters->keyGen();
//
//    $this->_parameters->add("action", "actualizar");
//    $this->_parameters->add("id_programa", $id_programa);
//    $params_actualizar = $this->_parameters->keyGen();
//    
//    $xhtml = "<tr id=\"".$id_programa."\">\n";
//    $xhtml.= "<td>{$id_programa}</td>";
//    $xhtml.= "<td>{$obj->get_nombre()}</td>";
//    $xhtml.= "<td>";
//    $xhtml.= "  <div class=\"btn-toolbar\">";
//    $xhtml.= "  <div class=\"btn-group\">";
//    $xhtml.= "   <a title=\"Editar Programa\" class=\"btn btn-default abrir_flotante\" href=\"programas_editar.php?{$params_actualizar}\"><i class=\"icon-edit\"></i></a>";
//    $xhtml.= "   <a title=\"Eliminar Programa: {$obj->get_nombre()}\" class=\"btn btn-default msgbox-confirm\" href=\"{$params_eliminar}\"><i class=\"icon-trash\"></i></a>";
//    $xhtml.= "  </div>";
//    $xhtml.= "  </div>";
//    $xhtml.= "</td>";
//    $xhtml.= "</tr>\n";
//    echo $xhtml;
//}

private function buscar(){
    $obj = new Modules_Homologaciones_Model_Programas();
    $combo_campos = $this->_parameters->get_parameter("nomcampos","0");
    $caja_busqueda = $this->_parameters->get_parameter("buscar","0");

    $this->_parameters->delete_all();
//    $this->_parameters->add("cod", $obj->get_id_programa());
    $this->_parameters->add("nomcampos",$combo_campos);
    $this->_parameters->add("buscar",$caja_busqueda);
    $cadenaUrl = $this->_parameters->KeyGen();
    
    $this->_url = $this->_path_config["ROOT"]["modules"]."/homologaciones/views/programas_admin.php?".$cadenaUrl;
    header("Location: {$this->_url}");
    exit();
}



private function editar(){
    $obj = new Modules_Homologaciones_Model_Programas();
    $obj = $this->_parameters->set_object($obj);
    
    $FacadeProgramas = new Modules_Homologaciones_Model_ProgramasFacade();
    $msg = $this->_dom["FMESSAGE"]["error"];
    
exit();
    if ($FacadeProgramas->update($obj)){
        $msg = $this->_dom["FMESSAGE"]["success"];
    }

    $this->_parameters->delete_all();
    $this->_parameters->add("msg", $msg);
    $this->_parameters->add("id_programa", $obj->get_id_programa());
    $cadenaUrl = $this->_parameters->KeyGen();
    exit();
    $this->_url = $this->_path_config["ROOT"]["modules"]."/homologaciones/views/programas_admin.php?".$cadenaUrl;
    $script = "<script>\n";
    $script.= "window.parent.location.href = '{$this->_url}';\n";
    $script.= "</script>\n";
    echo $script;
    exit();
}

// END: Controller private methods


}//End class
?>