<?php
//Inclusiones obligatorias, primero el FrameWork y segundo el identificador de seguridad
require("../../../config/config.inc.php");
//$DOM["SECURITY_ID"] = "*";

//Carga el sistema de seguridad
//require("viewmanager/security.inc.php");

//Gestor de parámetros
$Params = new Moon2_Params_Parameters();
$Params->verify("AJAX_GET",false);
$msg = $Params->get_parameter("msg", "");

$id_programa = $Params->get_parameter("id_programa", "0");
    

$combo_campos = $Params->get_parameter("nomcampos", "0");
//$caja_busqueda = $Params->get_parameter("buscar", "");
$msg            = $Params->get_parameter("msg", "");
$order       	= $Params->get_parameter("order",1);
$num_page       = $Params->get_parameter("npage", 0);
$searchWords 	= $Params->get_parameter("Sw", "");
$searchOption 	= $Params->get_parameter("So", "");
$limit_numrows 	= $Params->get_parameter("nrows", 7);


$Formulario = new Moon2_Forms_Form();

//Gestor de la página
$Face = new Moon2_ViewManager_Controller();
//$componente = $userFunc->getComponent("Mantenimiento Tablas");
$Face->set_bodyClass(" class=\"gray-bg\"");

$Face->set_name("Crear Materias");
//$Face->set_component($componente);
$Face->add_javascript("../js/materias_flotantes.js");
$Face->set_type("INSIDE");
$Face->set_sysmenu(false);

$arr_cabeceras_tabla = array();
$arr_cabeceras_tabla[1]["name"] = "Nomenclatura";
$arr_cabeceras_tabla[1]["size"] = " width=\"20%\"";
$arr_cabeceras_tabla[1]["order"] = "m.id_materia";

$arr_cabeceras_tabla[2]["name"] = "Nombre";
$arr_cabeceras_tabla[2]["size"] = " width=\"20%\"";
$arr_cabeceras_tabla[2]["order"] = "";


$arr_cabeceras_tabla[3]["name"] = "";
$arr_cabeceras_tabla[3]["size"] = " width=\"20%\"";
$arr_cabeceras_tabla[3]["order"] = "";




$arr_cabeceras_tabla[4]["name"] = "Nomenclatura";
$arr_cabeceras_tabla[4]["size"] = " width=\"20%\"";
$arr_cabeceras_tabla[4]["order"] = "m.id_materia";

$arr_cabeceras_tabla[5]["name"] = "Nombre";
$arr_cabeceras_tabla[5]["size"] = " width=\"20%\"";
$arr_cabeceras_tabla[5]["order"] = "";


//armando el combo de programas
$FacadeProgramas = new Modules_Homologaciones_Model_ProgramasFacade();
$arr_programas = $FacadeProgramas->comboprogramas($id_programa);


//////armando el combo de materias
//$FacadeMaterias = new Modules_Homologaciones_Model_MateriasFacade();
//$arr_materias = $FacadeMaterias->combomaterias2($id_programa);

$FacadeMaterias = new Modules_Homologaciones_Model_MateriasFacade();
$rsNumRows = 0;
$Data = array();
$Data["order"] = $arr_cabeceras_tabla[$order]["order"];
$filas = $FacadeMaterias->load_all2($rsNumRows, $limit_numrows, $num_page, $id_programa, $Data);
$cantidad_filas = count($filas);



//Despliegue de la página en xhtml
echo $Face->open();
require($Face->getView());
echo $Face->close();
?>