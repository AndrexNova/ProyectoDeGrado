<?php
//Inclusiones obligatorias, primero el FrameWork y segundo el identificador de seguridad
require("../../../config/config.inc.php");
$DOM["SECURITY_ID"] = array("KRAUFF");

//Carga el sistema de seguridad
require("viewmanager/security.inc.php");

//Gestor de parámetros
$Params = new Moon2_Params_Parameters();
$Params->verify("GET",false);
$combo_campos = $Params->get_parameter("nomcampos", "0");
$caja_busqueda = $Params->get_parameter("buscar", "");
$msg            = $Params->get_parameter("msg", "");
$order       	= $Params->get_parameter("order",1);
$num_page       = $Params->get_parameter("npage", 0);
$searchWords 	= $Params->get_parameter("Sw", "");
$searchOption 	= $Params->get_parameter("So", "");
$limit_numrows 	= $Params->get_parameter("nrows", 7);
$Formulario = new Moon2_Forms_Form();

//Gestor de la página
$Face = new Moon2_ViewManager_Controller();
$componente = $userFunc->getComponent("Perfiles");
$Face->set_name("Perfiles - Administrar");
$Face->set_component($componente);
$Face->add_javascript("../js/perfiles.js");
$Face->set_type("INSIDE");
$Face->add_navigation("Inicio", "../../main/views/index.php");
$Face->add_navigation("General", "perfiles_admin.php");
$Face->add_navigation("Perfiles", "#");

//Lógica del negocio
$arr_cabeceras_tabla = array();
$arr_cabeceras_tabla[1]["name"] = "Código";
$arr_cabeceras_tabla[1]["size"] = " width=\"11%\"";
$arr_cabeceras_tabla[1]["order"] = "p.codperfil";

$arr_cabeceras_tabla[2]["name"] = "Nombre";
$arr_cabeceras_tabla[2]["size"] = " width=\"80%\"";
$arr_cabeceras_tabla[2]["order"] = "";

$arr_cabeceras_tabla[3]["name"] = "";
$arr_cabeceras_tabla[3]["size"] = " width=\"9%\"";
$arr_cabeceras_tabla[3]["order"] = "";

$FacadePefiles = new Modules_Krauff_Model_PerfilesFacade();
$rsNumRows = 0;
$Data = array();
$Data["order"] = $arr_cabeceras_tabla[$order]["order"];
$Data["search"][$combo_campos] = $caja_busqueda;
$FacadePefiles->add_searchField($combo_campos, $caja_busqueda);
$filas = $FacadePefiles->load_all($rsNumRows, $limit_numrows, $num_page, $Data);
$cantidad_filas = count($filas);

//Ejemplo para mensajes flotantes
$Face->floating_message($msg, $DOM["FMESSAGE"]["success"], "Operación Exitosa:", "El registro fue agregado con éxito");
$Face->floating_message($msg, $DOM["FMESSAGE"]["error"], "Error:", "El registro NO se pudo agregar");
$Face->floating_message($msg, 11, "Operación Exitosa:", "El registro fue eliminado con éxito");
$Face->floating_message($msg, 33, "Error:", "El registro NO pudo ser eliminado");


//Despliegue de la página en xhtml
echo $Face->open();
require($Face->getView());
echo $Face->close();
?>