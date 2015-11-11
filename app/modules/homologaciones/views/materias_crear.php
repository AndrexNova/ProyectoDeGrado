<?php
//Inclusiones obligatorias, primero el FrameWork y segundo el identificador de seguridad
require("../../../config/config.inc.php");
$DOM["SECURITY_ID"] = "*";

//Carga el sistema de seguridad
require("viewmanager/security.inc.php");

//Gestor de parámetros
$Params = new Moon2_Params_Parameters();
$Params->verify("GET",false);
$msg = $Params->get_parameter("msg", "");
$Formulario = new Moon2_Forms_Form();

//Gestor de la página
$Face = new Moon2_ViewManager_Controller();
$componente = $userFunc->getComponent("Mantenimiento Tablas");
$Face->set_bodyClass(" class=\"gray-bg\"");

$Face->set_name("Crear Materias");
$Face->set_component($componente);
$Face->add_javascript("../js/materias_flotantes.js");
$Face->set_type("FLOAT");
$Face->set_sysmenu(false);

//armando el combo de programas
$FacadeProgramas = new Modules_Homologaciones_Model_ProgramasFacade();
$arr_programas = $FacadeProgramas->comboprogramas();

//Despliegue de la página en xhtml
echo $Face->open();
require($Face->getView());
echo $Face->close();
?>