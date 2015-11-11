<?php
////Inclusiones obligatorias, primero el FrameWork y segundo el identificador de seguridad
//require("../../../config/config.inc.php");
//$DOM["SECURITY_ID"] = "*";
//
//
////Carga el sistema de seguridad
//require("viewmanager/security.inc.php");
//
//
////Gestor de parámetros
//$Params = new Moon2_Params_Parameters();
//$Params->verify("GET",false);
//$msg = $Params->get_parameter("msg", "");
//$id_programa = $Params->get_parameter("id_programa", "0");
//
//
////Cargar datos del perfil de acuerdo al código
//$Programa = new Modules_Homologaciones_Model_Programas();
//$Programa->set_id_programa($id_programa);
//
//$FacadeProgramas = new Modules_Homologaciones_Model_ProgramasFacade();
//$Programa = $FacadeProgramas->loadOne($Programa);
//
//
////Gestor de la página
//$Face = new Moon2_ViewManager_Controller();
//$componente = $userFunc->getComponent("Programas");
//$Face->set_bodyClass(" class=\"gray-bg\"");
//$Face->set_name("Editar");
//$Face->set_component($componente);
//$Face->add_javascript("../js/programas.js");
//$Face->set_type("FLOAT");
//$Face->set_sysmenu(false);
//
////Despliegue de la página en xhtml
//echo $Face->open();
//require($Face->getView());
//echo $Face->close();





//Inclusiones obligatorias, primero el FrameWork y segundo el identificador de seguridad
require("../../../config/config.inc.php");
$DOM["SECURITY_ID"] = "*";


//Carga el sistema de seguridad
require("viewmanager/security.inc.php");



$Params = new Moon2_Params_Parameters();
$Params->verify("GET",false);
$msg = $Params->get_parameter("msg", "");
$Formulario = new Moon2_Forms_Form();



//Gestor de parámetros
//$Params = new Moon2_Params_Parameters();
//$Params->verify("GET",false);
//$msg = $Params->get_parameter("msg", "");
$cod_perfil = $Params->get_parameter("id_programa", "0");


//Cargar datos del perfil de acuerdo al código
$Programa = new Modules_Homologaciones_Model_Programas();
$Programa->set_id_programa($cod_perfil);

$FacadePefiles = new Modules_Homologaciones_Model_ProgramasFacade();
$Perfil = $FacadePefiles->loadOne($Programa);


//Gestor de la página
//$Face = new Moon2_ViewManager_Controller();
//$componente = $userFunc->getComponent("Perfiles");
//$Face->set_bodyClass(" class=\"gray-bg\"");
//

$Face = new Moon2_ViewManager_Controller();
$componente = $userFunc->getComponent("Mantenimiento Tablas");
$Face->set_bodyClass(" class=\"gray-bg\"");


//$Face->set_name("Editar");
//$Face->set_component($componente);
//$Face->add_javascript("../js/programas_flotantes.js");
//$Face->set_type("FLOAT");
//$Face->set_sysmenu(false);



$Face->set_name("Editar Programas");
$Face->set_component($componente);
$Face->add_javascript("../js/programas.js");
$Face->set_type("INSIDE");
$Face->set_sysmenu(false);


//Despliegue de la página en xhtml
echo $Face->open();
require($Face->getView());
echo $Face->close();

?>