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
$componente = $userFunc->getComponent("Usuarios");
$Face->set_name("Usuarios - Administrar");
$Face->set_component($componente);
$Face->add_javascript("../js/usuarios.js");
$Face->add_javascript("../js/permisos_flotantes.js");
$Face->set_type("INSIDE");
$Face->add_navigation("Inicio", "../../main/views/index.php");
$Face->add_navigation("General", "usuarios_admin.php");
$Face->add_navigation("Usuarios", "#");

//Lógica del negocio
$arr_cabeceras_tabla = array();
$arr_cabeceras_tabla[1]["name"] = "Codigo";
$arr_cabeceras_tabla[1]["size"] = " width=\"10%\"";
$arr_cabeceras_tabla[1]["order"] = "u.codusuario";

$arr_cabeceras_tabla[2]["name"] = "Perfil";
$arr_cabeceras_tabla[2]["size"] = " width=\"10%\"";
$arr_cabeceras_tabla[2]["order"] = "";

$arr_cabeceras_tabla[3]["name"] = "Nombres";
$arr_cabeceras_tabla[3]["size"] = " width=\"25%\"";
$arr_cabeceras_tabla[3]["order"] = "";

$arr_cabeceras_tabla[4]["name"] = "Tipo Documento";
$arr_cabeceras_tabla[4]["size"] = " width=\"15%\"";
$arr_cabeceras_tabla[4]["order"] = "";

$arr_cabeceras_tabla[5]["name"] = "Documento";
$arr_cabeceras_tabla[5]["size"] = " width=\"10%\"";
$arr_cabeceras_tabla[5]["order"] = "";

$arr_cabeceras_tabla[6]["name"] = "Usuario";
$arr_cabeceras_tabla[6]["size"] = " width=\"15%\"";
$arr_cabeceras_tabla[6]["order"] = "";

$arr_cabeceras_tabla[7]["name"] = "";
$arr_cabeceras_tabla[7]["size"] = " width=\"15%\"";
$arr_cabeceras_tabla[7]["order"] = "";

$FacadeUsuarios = new Modules_Krauff_Model_UsuariosFacade();

$rsNumRows = 0;
$Data = array();
$Data["order"] = $arr_cabeceras_tabla[$order]["order"];
$Data["search"][$combo_campos] = $caja_busqueda;
$FacadeUsuarios->add_searchField($combo_campos, $caja_busqueda);
$filas = $FacadeUsuarios->load_all_admin($rsNumRows, $limit_numrows, $num_page, $Data);
$cantidad_filas = count($filas);

//Ejemplo para mensajes flotantes
$Face->floating_message($msg, $DOM["FMESSAGE"]["success"], "Operación Exitosa:", "El registro fue agregado con éxito");
$Face->floating_message($msg, $DOM["FMESSAGE"]["error"], "Error:", "El registro NO se pudo agregar");
$Face->floating_message($msg, 11, "Operación Exitosa:", "El registro fue eliminado con éxito");
$Face->floating_message($msg, 33, "Error:", "El registro NO pudo ser eliminado");
$Face->floating_message($msg, 1, "Operación Exitosa:", "El registro fue actualizado con éxito");
$Face->floating_message($msg, 3, "Error:", "El registro NO pudo ser actualizado");


//Despliegue de la página en xhtml
echo $Face->open();
require($Face->getView());
echo $Face->close();
?>