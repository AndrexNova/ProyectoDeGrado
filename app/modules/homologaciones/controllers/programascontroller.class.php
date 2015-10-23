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
    // $obj->set_estado(1);
    
    // $msg = $this->_dom["FMESSAGE"]["error"];

    // if ($FacadeProgramas->add($obj)){
    //     $msg = $this->_dom["FMESSAGE"]["success"];
    // }
    echo 'controller';

        if ($FacadeTemas->add($obj)) {
            $msg = $this->_dom["FMESSAGE"]["success"];
        } else {
            $msg = $this->_dom["FMESSAGE"]["error"];
        }

    $this->_parameters->delete_all();
    $this->_parameters->add("msg", $msg);
    $this->_parameters->add("id_programa", $obj->get_id_programa());
    $cadenaUrl = $this->_parameters->KeyGen();
    //exit();
    $this->_url = $this->_path_config["ROOT"]["modules"]."/homologaciones/views/programas_admin.php?".$cadenaUrl;
    //header("Location: {$this->_url}");
    exit();
}

private function eliminar(){
    $obj = new Modules_Hojadevida_Model_Empresas();
    $obj = $this->_parameters->set_object($obj);

    $FacadeEmpresas = new Modules_Hojadevida_Model_EmpresasFacade();
    $msg2 = 33;
    if ($FacadeEmpresas->delete($obj)){
        $msg2 = 11;
    }

    $this->_parameters->delete_all();
    $this->_parameters->add("msg2", $msg2);
    $this->_parameters->add("cod", $obj->get_codempresa());
    $cadenaUrl = $this->_parameters->KeyGen();

    $this->_url = $this->_path_config["ROOT"]["modules"]."/hojadevida/views/empresas_admin.php?".$cadenaUrl;
    header("Location: {$this->_url}");
    exit();
}

private function editar(){
    $obj = new Modules_Hojadevida_Model_Empresas();
    $obj = $this->_parameters->set_object($obj);
    
    $FacadeEmpresas = new Modules_Hojadevida_Model_EmpresasFacade();
    $msg3 = 1;
    if ($FacadeEmpresas->update($obj) == false){
        header("Status: 400 Bad request", false, 400);
        $msg3 = 3;
        exit();
    }
    
    $this->_parameters->delete_all();
    $this->_parameters->add("msg3", $msg3);
    $this->_parameters->add("codempresa", $obj->get_codempresa());
    $cadenaUrl = $this->_parameters->KeyGen();
    
    $this->_url = $this->_path_config["ROOT"]["modules"]."/hojadevida/views/empresas_admin.php?".$cadenaUrl;
    header("Location: {$this->_url}");
    exit();
}

private function buscar(){
    $obj = new Modules_Hojadevida_Model_Empresas();
    $combo_campos = $this->_parameters->get_parameter("nomcampos","0");
    $caja_busqueda = $this->_parameters->get_parameter("buscar","0");

    $this->_parameters->delete_all();
    $this->_parameters->add("cod", $obj->get_codempresa());
    $this->_parameters->add("nomcampos",$combo_campos);
    $this->_parameters->add("buscar",$caja_busqueda);
    $cadenaUrl = $this->_parameters->KeyGen();
    
    $this->_url = $this->_path_config["ROOT"]["modules"]."/hojadevida/views/empresas_admin.php?".$cadenaUrl;
    header("Location: {$this->_url}");
    exit();
}
// END: Controller private methods


}//End class
?>