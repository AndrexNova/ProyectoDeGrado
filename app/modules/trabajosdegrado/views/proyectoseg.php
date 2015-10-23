<?php
//Inclusiones obligatorias, primero el FrameWork y segundo el identificador de seguridad
require("../../../config/config.inc.php");
$DOM["SECURITY_ID"] = array("GRASEG");

//Carga el sistema de seguridad
require("viewmanager/security.inc.php");

//Objetos requeridos en esta página
$Tabulador = new Moon2_Tabulator_Tab();
$Params = new Moon2_Params_Parameters();
$Face = new Moon2_ViewManager_Controller();
$Formulario = new Moon2_Forms_Form();
$Formularios = new Moon2_Forms_Form();
$Formulariof = new Moon2_Forms_Form();
$Formularioc = new Moon2_Forms_Form();
$Formulariot = new Moon2_Forms_Form();
$Formularior = new Moon2_Forms_Form();

$ProyectoGrado = new Modules_trabajosdegrado_Model_ProyectosGrado();
$FacadeProyectosg = new Modules_Trabajosdegrado_Model_ProyectosGradoFacade();
$FacadeTemas = new Modules_Bancoproyectos_Model_TemasFacade();
$FacadeConsignaciones = new Modules_Trabajosdegrado_Model_ConsignacionesFacade();
$FacadeDatos = new Modules_Trabajosdegrado_Model_DatosProyectoFacade();
$Datos= new Modules_Trabajosdegrado_Model_DatosProyecto();
$Facadeusuproyecto = new Modules_Trabajosdegrado_Model_UsuproyectogradoFacade();
$usuproyecto = new Modules_trabajosdegrado_Model_Usuproyectogrado();
$Temas =new Modules_Bancoproyectos_Model_Temas();
$consignaciones = new Modules_trabajosdegrado_Model_Consignaciones();
$Usuario = new Modules_Krauff_Model_Usuarios();
$Facadeusuario = new Modules_Krauff_Model_UsuariosFacade();

//tipo de sangre
$arrValorest =array();
$arrValorest[0] = "A";
$arrValorest[1] = "B";
$arrValorest[2] = "AB";
$arrValorest[3] = "O";

//rh
$arrValoresr =array();
$arrValoresr[0] = "+";
$arrValoresr[1] = "-";


//Gestor de parámetros
$Params->verify("GET",true);
$msg = $Params->get_parameter("msg","");
$cod_proyectogrado = $Params->get_parameter("codproyectogrado",0);
$cod_usupro= $Params->get_parameter("codrelproyusu",0);
$codigo = $Params->get_parameter("codigo",0);
$paso = $Params->get_parameter("paso", "1");
//$cod_consignacion =$params->get_parameter("codconsignacion","0");
//Logica del negocio
$usuproyecto->set_codrelproyusu($cod_usupro);

      
$ProyectoGrado->set_codproyectogrado($cod_proyectogrado);
$ProyectoGrado = $FacadeProyectosg->loadOne($ProyectoGrado);

$Datos ->set_codigo($codigo);

$Datos = $FacadeDatos->loadOne($Datos);
$consignaciones= $FacadeConsignaciones->loadOne($consignaciones);
$usuproyecto = $Facadeusuproyecto->loadOne($usuproyecto);

$codtema = $ProyectoGrado ->get_codtema();
$cod_temas =$codtema;

$filas = $FacadeProyectosg->porUsuario($DOM["USER_ID"]);
//echo "<pre>";
//print_r($filas);
//echo "</pre>";
//exit();
//Tabulador
$Tabulador->set_externalData(true);
$Tabulador->set_selectedIndex($paso);
$Tabulador->add_item("Registro");

$Tabulador->add_item("Datos Personales");
$Tabulador->add_item("Datos de la Modalidad");
$Tabulador->add_item("Finalizar");

$Usuario->set_codusuario($DOM["USER_ID"]);
$Usuario = $Facadeusuario->loadOne($Usuario);
$codusuario = $DOM["USER_ID"];
//$cod_consignacion ->set_codconsignaci
//on($cod_consignacion);

$filas_consignaciones = $FacadeConsignaciones->porProyecto($cod_proyectogrado, $DOM["USER_ID"]);

$filass = $FacadeDatos->porProyecto($cod_proyectogrado);

$filas_participantes = $FacadeProyectosg->obtenerParticipantes($cod_proyectogrado, $codusuario);


$cantidad_filas = count($filas);

//VER TEMAS

//Logica del negocio
$arr_cabeceras_tabla = array();
$arr_cabeceras_tabla[1]["name"] = "Titulo";
$arr_cabeceras_tabla[1]["size"] = " width=\"40%\"";
$arr_cabeceras_tabla[1]["order"] = "t.codtema";
 
$arr_cabeceras_tabla[2]["name"] = "Modalidad";
$arr_cabeceras_tabla[2]["size"] = " width=\"10%\"";
$arr_cabeceras_tabla[2]["order"] = "";
 
$arr_cabeceras_tabla[3]["name"] = "Descripcion";
$arr_cabeceras_tabla[3]["size"] = " width=\"40%\"";
$arr_cabeceras_tabla[3]["order"] = "";
 
$arr_cabeceras_tabla[4]["name"] = "Director";
$arr_cabeceras_tabla[4]["size"] = " width=\"10%\"";
$arr_cabeceras_tabla[4]["order"] = "";
 
$arr_cabeceras_tabla[5]["name"] = "Linea de inves";
$arr_cabeceras_tabla[5]["size"] = " width=\"10%\"";
$arr_cabeceras_tabla[5]["order"] = "";
 
$arr_cabeceras_tabla[6]["name"] = "Grupo de inv";
$arr_cabeceras_tabla[6]["size"] = " width=\"10%\"";
$arr_cabeceras_tabla[6]["order"] = "";

$Temas ->set_codtema($codtema);
$Temas = $FacadeTemas->loadOne($Temas);
$nombremodalidad = $Temas ->get_titulo();


//$cod_temas = $Params->get_parameter("codtema", "0");
$arr_temas = $FacadeTemas->obtenertema($cod_temas);
$cantidad_filas2 = count($arr_temas);
//echo "<pre>";
//print_r($arr_temas);
//echo "</pre>";
//exit();

$order       	= $Params->get_parameter("order",1);
$rsNumRows = 0;
$Data = array();
$Data["order"] = $arr_cabeceras_tabla[$order]["order"];
//FIN TEMAS




//Gestor de la página
$Face->set_name("Trabajos de grado");
$Face->set_component("Trabajos de Grado");
$Face->add_javascript("../js/proyectoseg.js");
$Face->set_type("INSIDE");
$Face->add_navigation("Registro y Seguimiento", "index.php");
$Face->add_navigation("Modo Actualización", "#");

//Posibles para mensajes flotantes
$Face->floating_message($msg, 31, "Error:", "El tipo de archivo NO está permitido");
$Face->floating_message($msg, 32, "Error:", "El tamaño del archivo supera el máximo permitido");
$Face->floating_message($msg, 33, "Error:", "No se pudo cargar el archivo, extensión y tamaño correctos");
$Face->floating_message($msg, 34, "Error:", "La Consignación NO pudo ser ELIMINADA");
$Face->floating_message($msg, 11, "CORRECTO:", "Inició el proceso de radicación correctamente");
$Face->floating_message($msg, 12, "CORRECTO:", "Consignación ADJUNTADA Exitosamente");
$Face->floating_message($msg, 14, "CORRECTO:", "Consignación ELIMINADA Correctamente");
$Face->floating_message($msg, 15, "CORRECTO:", "Informacion actualizada correctamente");
$Face->floating_message($msg, 16, "CORRECTO:", "La información se cargó correctamente");



//$Face->floating_message($msg, 11, "Operación Exitosa:", "El Formato fue ASIGNADO con éxito");
//$Face->floating_message($msg, 33, "Error:", "El formato NO se pudo asignar");


//Despliegue de la página en xhtml
echo $Face->open();
require($Face->getView());
echo $Face->close();
?>