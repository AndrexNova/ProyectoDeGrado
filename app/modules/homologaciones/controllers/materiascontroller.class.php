<?php

class Modules_Homologaciones_Controllers_MateriasController {

    private $_dom;
    private $_url;
    private $_action;
    private $_parameters;
    private $_path_config;

    public function __construct($parameters, $dom, $path_config) {
        $this->_parameters = $parameters;
        $this->_action = $parameters->get_parameter("action", "");
        $action = $this->_action;
        $rc = new ReflectionClass("Modules_Homologaciones_Controllers_MateriasController");
        if ($rc->hasMethod($this->_action)) {
            $this->_dom = $dom;
            $this->_path_config = $path_config;
            $this->$action();
        } else {
            $this->stop();
        }
    }

    private function stop() {
        $message = "Moon2 Message:<br/><span style=\"color:red;font-weight: bold\">" . $this->_action . "</span> ";
        $message.= "Controller not implemented in class <span style=\"color:red;font-weight: bold\">" . get_class($this) . "</span>";
        echo $message;
        $this->_parameters->show();
        header("Status: 400 Bad request", false, 400);
        exit();
    }

    public function getUrl() {
        return $this->_url;
    }

// START: Controller private methods
    private function crear() {
        $obj = new Modules_Homologaciones_Model_Materias();
        $obj = $this->_parameters->set_object($obj);

        $FacadeProgramas = new Modules_Homologaciones_Model_MateriasFacade();
        $msg = $this->_dom["FMESSAGE"]["error"];

        if ($FacadeProgramas->add($obj)) {
            $msg = $this->_dom["FMESSAGE"]["success"];
        }

        $this->_parameters->delete_all();
        $this->_parameters->add("msg", $msg);
        $this->_parameters->add("id_materia", $obj->get_id_programa());
        $cadenaUrl = $this->_parameters->KeyGen();
        //exit();
        $this->_url = $this->_path_config["ROOT"]["modules"] . "/homologaciones/views/materias_admin.php?" . $cadenaUrl;
        $script = "<script>\n";
        $script.= "window.parent.location.href = '{$this->_url}';\n";
        $script.= "</script>\n";
        echo $script;
        exit();
    }
    

    

    private function eliminar() {
        $obj = new Modules_Homologaciones_Model_Materias();
        $obj = $this->_parameters->set_object($obj);

        $FacadeProgramas = new Modules_Homologaciones_Model_MateriasFacade();
        $msg = 33;
        if ($FacadeProgramas->delete($obj)) {
            $msg = 11;
        }

        $this->_parameters->delete_all();
        $this->_parameters->add("msg", $msg);
        $this->_parameters->add("id_materia", $obj->get_id_materia());
        $cadenaUrl = $this->_parameters->KeyGen();

        $this->_url = $this->_path_config["ROOT"]["modules"] . "/homologaciones/views/materias_admin.php?" . $cadenaUrl;
        header("Location: {$this->_url}");
        exit();
    }

    private function buscar() {
        $obj = new Modules_Homologaciones_Model_Materias();
        $combo_campos = $this->_parameters->get_parameter("nomcampos", "0");
        $caja_busqueda = $this->_parameters->get_parameter("buscar", "0");

        $this->_parameters->delete_all();
//        $this->_parameters->add("cod", $obj->get_id_materia());
        $this->_parameters->add("nomcampos", $combo_campos);
        $this->_parameters->add("buscar", $caja_busqueda);
        $cadenaUrl = $this->_parameters->KeyGen();

        $this->_url = $this->_path_config["ROOT"]["modules"] . "/homologaciones/views/materias_admin.php?" . $cadenaUrl;
        header("Location: {$this->_url}");
        exit();
    }

    private function editar() {
        $obj = new Modules_Homologaciones_Model_Materias();
        $obj = $this->_parameters->set_object($obj);

        $FacadeProgramas = new Modules_Homologaciones_Model_MateriasFacade();
        $msg = $this->_dom["FMESSAGE"]["error"];

        exit();
        if ($FacadeProgramas->update($obj)) {
            $msg = $this->_dom["FMESSAGE"]["success"];
        }

        $this->_parameters->delete_all();
        $this->_parameters->add("msg", $msg);
        $this->_parameters->add("id_materia", $obj->get_id_materia());
        $cadenaUrl = $this->_parameters->KeyGen();
        exit();
        $this->_url = $this->_path_config["ROOT"]["modules"] . "/homologaciones/views/materias_admin.php?" . $cadenaUrl;
        $script = "<script>\n";
        $script.= "window.parent.location.href = '{$this->_url}';\n";
        $script.= "</script>\n";
        echo $script;
        exit();
    }

// END: Controller private methods
}

//End class
?>