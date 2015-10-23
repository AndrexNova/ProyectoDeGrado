<?php
//Inclusiones obligatorias, primero el FrameWork y segundo el identificador de seguridad
require("../../../config/config.inc.php");
$DOM["SECURITY_ID"] = array("GRA");


//Carga el sistema de seguridad
require("viewmanager/security.inc.php");


//Objetos requeridos en esta página
$Params = new Moon2_Params_Parameters();
$Face = new Moon2_ViewManager_Controller();


//Gestor de parámetros
$Params->verify("GET",false);
$msg = $Params->get_parameter("msg", "");


//Logica del negocio
$FacadeDatos = new Modules_Trabajosdegrado_Model_DatosProyectoFacade();
$filas = $FacadeDatos->verificar();
$cantidad_filas = count($filas);


//Gestor de la página
$Face->set_name("Trabajos de grado");
$Face->set_component("Verificar Datos");
$Face->add_javascript("../js/radicar.js");
$Face->set_type("INSIDE");
$Face->add_navigation("Registro y Segumiento", "#");


//Posibles para mensajes flotantes
//$Face->floating_message($msg, $DOM["FMESSAGE"]["success"], "Operación Exitosa:", "El Formato fue des-asignado con éxito");
//$Face->floating_message($msg, $DOM["FMESSAGE"]["error"], "Error:", "El formato NO se pudo desasignar");
//$Face->floating_message($msg, 11, "Operación Exitosa:", "El Formato fue ASIGNADO con éxito");
//$Face->floating_message($msg, 33, "Error:", "El formato NO se pudo asignar");


//Despliegue de la página en xhtml
echo $Face->open();
require($Face->getView());
echo $Face->close();
?>