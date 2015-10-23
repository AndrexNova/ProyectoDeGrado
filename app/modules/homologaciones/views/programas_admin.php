<?php

//Inclusiones obligatorias, primero el FrameWork y segundo el identificador de seguridad
// require("../../../config/config.inc.php");
// $id_security= array("MNTO_PER");

require("../../../config/config.inc.php");
$DOM["SECURITY_ID"] = "*";
require("viewmanager/security.inc.php");

//$DOM["SECURITY_ID"] = array("MNTO_PRO");

//Carga el sistema de seguridad
//require("viewmanager/security.inc.php");

//Gestor de parámetros
$Params = new Moon2_Params_Parameters();
$Params->verify("GET",false);
$combo_campos = $Params->get_parameter("nomcampos", "0");
$caja_busqueda = $Params->get_parameter("buscar", "");
$msg            = $Params->get_parameter("msg", "");
$msg2            = $Params->get_parameter("msg2", "");
$msg3            = $Params->get_parameter("msg3", "");
$order       	= $Params->get_parameter("order",1);
$num_page       = $Params->get_parameter("npage", 0);
$searchWords 	= $Params->get_parameter("Sw", "");
$searchOption 	= $Params->get_parameter("So", "");
$limit_numrows 	= $Params->get_parameter("nrows", 7);
$Formulario = new Moon2_Forms_Form();


//Gestor de la página
$Face = new Moon2_ViewManager_Controller();
$Face->set_sysmenu(TRUE);

$Face->set_name("Programas - Administrar");
$Face->set_component("Mantenimiento Tablas");
$Face->add_javascript("../js/programas.js");
$Face->set_type("INSIDE");
$Face->add_navigation("Listado", "programas_admin.php");
$Face->add_navigation("Programas", "#");


//armando el combo de los campos de la tabla
$FacadeProgramas = new Modules_Homologaciones_Model_ProgramasFacade();
// $arr_nomempresas = $FacadeProgramas->combotablas();
// $arr_nomempresas["codempresa"] = "Codigo";
// $arr_nomempresas["nombre"] = "Nombre";
// $arr_nomempresas["ciudad"] = "Ciudad";

//Lógica del negocio
$arr_cabeceras_tabla = array();
$arr_cabeceras_tabla[1]["name"] = "Id";
$arr_cabeceras_tabla[1]["size"] = " width=\"10%\"";
$arr_cabeceras_tabla[1]["order"] = "p.id_programa";

$arr_cabeceras_tabla[2]["name"] = "Nombre";
$arr_cabeceras_tabla[2]["size"] = " width=\"20%\"";
$arr_cabeceras_tabla[2]["order"] = "p.id_programa";

$arr_cabeceras_tabla[3]["name"] = "Facultad";
$arr_cabeceras_tabla[3]["size"] = " width=\"20%\"";
$arr_cabeceras_tabla[3]["order"] = "";

$arr_cabeceras_tabla[4]["name"] = "Nivel";
$arr_cabeceras_tabla[4]["size"] = " width=\"20%\"";
$arr_cabeceras_tabla[4]["order"] = "";

$arr_cabeceras_tabla[5]["name"] = "SNIES";
$arr_cabeceras_tabla[5]["size"] = " width=\"10%\"";
$arr_cabeceras_tabla[5]["order"] = "";

$arr_cabeceras_tabla[6]["name"] = "";
$arr_cabeceras_tabla[6]["size"] = " width=\"10%\"";
$arr_cabeceras_tabla[6]["order"] = "";


$rsNumRows = 0;
$Data = array();
$Data["nomcampos"] = $combo_campos;
$Data["buscar"] = $caja_busqueda;
$Data["search"][$searchOption] = $searchWords;
$Data["order"] = $arr_cabeceras_tabla[$order]["order"];

if($DOM["USER_ID"] != -1){
$filas = $FacadeProgramas->load_all($rsNumRows, $limit_numrows, $num_page, $Data);
}
else{
    $filas = $FacadeProgramas->load_all_admin($rsNumRows, $limit_numrows, $num_page, $Data);
}
$cantidad_filas = count($filas);





//Ejemplo para mensajes flotantes
$Face->floating_message($msg, $DOM["FMESSAGE"]["success"], "Operación Exitosa:", "El registro fue agregado con éxito");
$Face->floating_message($msg, $DOM["FMESSAGE"]["error"], "Error:", "El registro NO se pudo agregar");
$Face->floating_message($msg2, 11, "Operación Exitosa:", "El registro fue eliminado con éxito");
$Face->floating_message($msg2, 33, "Error:", "El registro NO pudo ser eliminado");
$Face->floating_message($msg3, 1, "Operación Exitosa:", "El registro fue actualizado con éxito");
$Face->floating_message($msg3, 3, "Error:", "El registro NO pudo ser actualizado");


//Despliegue de la página en xhtml
echo $Face->open();
require($Face->getView());
echo $Face->close();
?>