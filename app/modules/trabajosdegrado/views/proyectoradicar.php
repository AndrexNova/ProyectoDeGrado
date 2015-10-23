<?php
//Inclusiones obligatorias, primero el FrameWork y segundo el identificador de seguridad
require("../../../config/config.inc.php");
$DOM["SECURITY_ID"] = array("GRASEG");


//Carga el sistema de seguridad
require("viewmanager/security.inc.php");


//Objetos requeridos en esta página
$Tabulador = new Moon2_Tabulator_Tab();
$Params = new Moon2_Params_Parameters();
$Params->verify("GET",false);
$Face = new Moon2_ViewManager_Controller();
$Formulario = new Moon2_Forms_Form();
$Modalidades = new Modules_Trabajosdegrado_Model_ModalidadesGradoFacade();

$cod_temas = $Params->get_parameter("codtema", "0");

//Gestor de parámetros
$Params->verify("GET",false);
$msg = $Params->get_parameter("msg", "");


//Logica del negocio
$Vector_modalidades = $Modalidades->combo();
$Tabulador->set_selectedIndex(1);
$Tabulador->add_item("Paso 1: Registro");
$Tabulador->add_item("Paso 2: Datos Personales", TRUE);
$Tabulador->add_item("Paso 3: Datos de la Modalidad", TRUE);
$Tabulador->add_item("Paso 4: Finalizar", TRUE);


//Gestor de la página
$Face->set_name("Trabajos de grado");
$Face->set_component("Trabajos de Grado");
$Face->add_javascript("../js/radicar.js");
$Face->set_type("INSIDE");
$Face->add_navigation("Registro y Segumiento", "index.php");
$Face->add_navigation("Nuevo proyecto", "#");


//Posibles para mensajes flotantes
$Face->floating_message($msg, 31, "Error:", "El tipo de archivo NO está permitido");
$Face->floating_message($msg, 32, "Error:", "El tamaño del archivo supera el máximo permitido");
$Face->floating_message($msg, 33, "Error:", "No se pudo cargar el archivo, extensión y tamaño no correctos");
$Face->floating_message($msg, 11, "CORRECTO:", "El proyecto fue radicado correctamente");
//$Face->floating_message($msg, 11, "Operación Exitosa:", "El Formato fue ASIGNADO con éxito");
//$Face->floating_message($msg, 33, "Error:", "El formato NO se pudo asignar");


//Despliegue de la página en xhtml
echo $Face->open();
require($Face->getView());
echo $Face->close();
?>