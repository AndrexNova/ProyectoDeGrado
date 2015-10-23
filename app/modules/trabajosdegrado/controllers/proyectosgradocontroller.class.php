<?php
class Modules_Trabajosdegrado_Controllers_ProyectosGradoController{
    private $_dom;
    private $_url;
    private $_action;
    private $_parameters;
    private $_path_config;

public function __construct($parameters, $dom, $path_config){

    $this->_parameters = $parameters;
    $this->_action = $parameters->get_parameter("action","");
    $action = $this->_action;
    $rc = new ReflectionClass("Modules_Trabajosdegrado_Controllers_ProyectosGradoController");
    if ($rc->hasMethod($this->_action)){
        $this->_dom = $dom; 
        $this->_path_config = $path_config;
        $this->$action();
    }else{
        
        $this->stop();
    }
}

private function stop(){
    $message = "Moon2 Message:<br/><span style=\"color:red;font-weight: bold\">".$this->_action."</span> ";
    $message.= "Controller not implemented in class <span style=\"color:red;font-weight: bold\">".get_class($this)."</span>";
    echo $message;
    $this->_parameters->show();
    header("Status: 400 Bad request", false, 400);
    exit();
}

public function getUrl(){
    return $this->_url;
}


// START: Controller private methods
//***************************************************************************************************
private function iniciarRadicacion(){
    //$this->_parameters->show();
    $archivo_procesar = $this->_parameters->get_parameter("nombreconsignacion",NULL);
    $pagina_retorno = "proyectoradicar.php";
    $tamanno_maximo = 1030000; //Un mega aproximadamente
    $Archivo = new Moon2_Files_FileManager();
    $Archivo->set_realName($archivo_procesar["name"]);
    $extension = strtolower($Archivo->get_extension());
    $tipos_permitidos = array("gif","jpg","png","jpeg");
    $Archivo->set_folder($this->_path_config["TRAGRA_CONSIGNA"]);
    //Primero se valida el tipo de archivo
    if (!in_array($extension, $tipos_permitidos)){
        $msg = 31;
        echo $Archivo;
     
       }else{
        //Segundo se valida el tamaño del archivo
        $tamanno_archivo = (int)$archivo_procesar["size"];
        if ($tamanno_archivo > $tamanno_maximo || $tamanno_archivo === 0){
            $msg = 32;
        }else{
            //Tercero, se carga el archivo y luego si se procede a grabar en las tablas
            $msg = 33;
            
            if ($Archivo->loadFile($archivo_procesar)){
                $cod_tema = $this->_parameters->get_parameter("codtema",-1);
                $obj_proyecto = new Modules_trabajosdegrado_Model_ProyectosGrado();
                $obj_proyecto->set_codtema($cod_tema);
                $obj_proyecto->set_fechaestado(date("Y-m-d h:i:s"));
                $obj_proyecto->set_codestado(1);
                $obj_proyecto->set_comentarioestado("Inició proceso de radicación");
                
                   $FacadeProyectos = new Modules_Trabajosdegrado_Model_ProyectosGradoFacade();
                if ($FacadeProyectos->add($obj_proyecto)){  
                    $cod_proyectogrado=$obj_proyecto->get_codproyectogrado();
                    $obj_datos = new Modules_Trabajosdegrado_Model_DatosProyecto();
                    $FacadeDatos = new Modules_Trabajosdegrado_Model_DatosProyectoFacade();
                    
                    $obj_datos->set_codproyectogrado($cod_proyectogrado);
                     $obj_datos->set_fecha_solicitud(date("Y-m-d"));
                    
                    if ($FacadeDatos->add($obj_datos)){

                    $pagina_retorno = "proyectoseg.php";
                    $nuevo_codproyectogrado = $obj_proyecto->get_codproyectogrado();
                    $fecha_consignacion = $this->_parameters->get_parameter("fecha","");
                    $valor_consignacion = $this->_parameters->get_parameter("valor","");
                    $num_consignacion = $this->_parameters->get_parameter("numero","");
                    $codusuario = $this->_parameters->get_parameter("codusuario","");
                    $this->_parameters->show();
                    $obj_consignacion = new Modules_trabajosdegrado_Model_Consignaciones();
                    $obj_consignacion->set_codproyectogrado($nuevo_codproyectogrado);
                    $obj_consignacion->set_codusuario($codusuario);
                    $obj_consignacion->set_nombreconsignacion($Archivo->get_realName());
                    $obj_consignacion->set_nombrecodificado($Archivo->get_hiddName());
                    $obj_consignacion->set_tipo($Archivo->get_mimetype());
                    $obj_consignacion->set_tamanno($Archivo->get_size());
                    $obj_consignacion->set_fecha($fecha_consignacion);
                    $obj_consignacion->set_valor($valor_consignacion);
                    $obj_consignacion->set_numero($num_consignacion);

                    $FacadeConsignaciones = new Modules_Trabajosdegrado_Model_ConsignacionesFacade();
                      if ($FacadeConsignaciones->add($obj_consignacion)){

                        $obj_historico = new Modules_trabajosdegrado_Model_HistoricoEstados();
                        $obj_historico->set_codestado(1);
                        $obj_historico->set_codproyectogrado($nuevo_codproyectogrado);
                        $obj_historico->set_fecha(date("Y-m-d"));
                        $obj_historico->set_comentarioestado("Inició proceso de radicación");
                        
                        $FacadeHistorico = New Modules_Trabajosdegrado_Model_HistoricoEstadosFacade();
                        if ($FacadeHistorico->add($obj_historico)){
                            $obj_usuprogra = new Modules_trabajosdegrado_Model_Usuproyectogrado();
                            $obj_usuprogra->set_codusuario($this->_dom["USER_ID"]);
                            $obj_usuprogra->set_codproyectogrado($nuevo_codproyectogrado);
                            $obj_usuprogra->set_tipoasignacion(5);//Estudiante propietario
                            $obj_usuprogra->set_finproceso(0);
                            $obj_usuprogra->set_creditosaprobados($this->_parameters->get_parameter("creditosaprobados",0));
                            
                            $FacadeUsuprogra = new Modules_Trabajosdegrado_Model_UsuproyectogradoFacade();
                            if ($FacadeUsuprogra->add($obj_usuprogra)){
                                $msg = 11;
                            }

                        }
                      }
                    }

                }
                //exit();

            }

        }
    }
    
    $this->_parameters->delete_all();
    if ($msg === 11){
        $pagina_retorno = "proyectoseg.php";
        $this->_parameters->add("codproyectogrado", $nuevo_codproyectogrado);        
    }
    $this->_parameters->add("msg", $msg);
    $cadenaUrl = $this->_parameters->KeyGen();

    $this->_url = $this->_path_config["ROOT"]["modules"]."/trabajosdegrado/views/{$pagina_retorno}?".$cadenaUrl;
    header("Location: {$this->_url}");
    
}

private function adjuntarConsignacion(){
    $archivo_procesar = $this->_parameters->get_parameter("nombreconsignacion",NULL);

    $tamanno_maximo = 1030000; //Un mega aproximadamente
    $Archivo = new Moon2_Files_FileManager();
    $Archivo->set_realName($archivo_procesar["name"]);
    $extension = strtolower($Archivo->get_extension());
    $tipos_permitidos = array("gif","jpg","png","jpeg");
    $Archivo->set_folder($this->_path_config["TRAGRA_CONSIGNA"]);
    //Primero se valida el tipo de archivo
    if (!in_array($extension, $tipos_permitidos)){
        $msg = 31;
    }else{
        //Segundo se valida el tamaño del archivo
        $tamanno_archivo = (int)$archivo_procesar["size"];
        if ($tamanno_archivo > $tamanno_maximo || $tamanno_archivo === 0){
            $msg = 32;
        }else{
            //Tercero, se carga el archivo y luego si se procede a grabar en las tablas
            $msg = 33;
            if ($Archivo->loadFile($archivo_procesar)){
                $cod_proyectogrado = $this->_parameters->get_parameter("codproyectogrado",-1);
                $fecha_consignacion = $this->_parameters->get_parameter("fecha","");
                $valor_consignacion = $this->_parameters->get_parameter("valor","");
                $num_consignacion = $this->_parameters->get_parameter("numero","");
                $codusuario = $this->_parameters->get_parameter("codusuario",-1);
                    
                $obj_consignacion = new Modules_trabajosdegrado_Model_Consignaciones();
                $obj_consignacion->set_codproyectogrado($cod_proyectogrado);
                $obj_consignacion->set_codusuario($codusuario);
                $obj_consignacion->set_nombreconsignacion($Archivo->get_realName());
                $obj_consignacion->set_nombrecodificado($Archivo->get_hiddName());
                $obj_consignacion->set_tipo($Archivo->get_mimetype());
                $obj_consignacion->set_tamanno($Archivo->get_size());
                $obj_consignacion->set_fecha($fecha_consignacion);
                $obj_consignacion->set_valor($valor_consignacion);
                $obj_consignacion->set_numero($num_consignacion);

                $FacadeConsignaciones = new Modules_Trabajosdegrado_Model_ConsignacionesFacade();
                if ($FacadeConsignaciones->add($obj_consignacion)){
                    $msg = 12;
                }
            }
        }
    }
 
    $pagina_retorno = "proyectoseg.php";
    $this->_parameters->add("msg", $msg);
    $this->_parameters->add("codproyectogrado", $cod_proyectogrado);        
    $cadenaUrl = $this->_parameters->KeyGen();
    $this->_url = $this->_path_config["ROOT"]["modules"]."/trabajosdegrado/views/{$pagina_retorno}?".$cadenaUrl;
    header("Location: {$this->_url}");
}

private function eliminarConsignacion(){
    $cod_consignacion = $this->_parameters->get_parameter("codconsignacion","-1");
    $cod_proyectogrado = $this->_parameters->get_parameter("codproyectogrado","-1");

    $msg = 14;
    $Consignaciones = new Modules_trabajosdegrado_Model_Consignaciones();
    $FacadeConsignaciones = new Modules_Trabajosdegrado_Model_ConsignacionesFacade();
    $Consignaciones->set_codconsignacion($cod_consignacion);
    
    $Consignaciones = $FacadeConsignaciones->loadOne($Consignaciones);
    $nombre_codificado = $Consignaciones->get_nombrecodificado();
    if ($FacadeConsignaciones->delete($Consignaciones) == false){
        $msg = 34;
    }else{
        $Archivo = new Moon2_Files_FileManager();
        $Archivo->set_folder($this->_path_config["TRAGRA_CONSIGNA"]);
        $Archivo->deleteFile($nombre_codificado);
    }
    
    $pagina_retorno = "proyectoseg.php";
    $this->_parameters->delete_all();
    $this->_parameters->add("msg", $msg);
    $this->_parameters->add("codproyectogrado", $cod_proyectogrado);
    $cadenaUrl = $this->_parameters->KeyGen();

    $this->_url = $this->_path_config["ROOT"]["modules"]."/trabajosdegrado/views/{$pagina_retorno}?".$cadenaUrl;
    header("Location: {$this->_url}");
}

private function adjuntarFormato(){
    $msg = 33; //El primer Bit indica que es error, el segundo es el mensaje
    $archivo_procesar = $this->_parameters->get_parameter("nombreformato",NULL);
    $Archivo = new Moon2_Files_FileManager();
    $Archivo->set_folder($this->_path_config["WEBFILES"]);
    $Archivo->add_allowedType("accdb");//Ejemplo para agregar mas tipos de archivos
    if ($Archivo->loadFile($archivo_procesar)){
        $version = $this->_parameters->get_parameter("version","");
        $descripcion = $this->_parameters->get_parameter("descripcion","");
        
        $FormatoGrado = new Modules_Trabajosdegrado_Model_FormatosGrado();
        $FormatoGrado->set_version($version);
        $FormatoGrado->set_descripcion($descripcion);
        $FormatoGrado->set_tamanno($Archivo->get_size());
        $FormatoGrado->set_tipo($Archivo->get_mimetype());
        $FormatoGrado->set_nombreformato($Archivo->get_realName());
        $FormatoGrado->set_formatocodificado($Archivo->get_hiddName());
        
        $msg = 21; //El primer Bit indica warning, el segundo es el mensaje
        $FacadeFormatoGrado = new Modules_Trabajosdegrado_Model_FormatosGradoFacade();
        if ($FacadeFormatoGrado->add($FormatoGrado)){
            $msg = 11;//El primer bit indica que es success, el segundo es el mensaje
        }
    }
    
//    Mensajes de error en tiempo de desarrollo para la carga de archivos:
//    echo "Error: ".$Archivo->get_message();
//    exit();
    
    $cod_modalidad = $this->_parameters->get_parameter("codmodalidad",0);
    $this->_parameters->delete_all();
    $this->_parameters->add("msg", $msg);
    $this->_parameters->add("codmodalidad", $cod_modalidad);
    $cadenaUrl = $this->_parameters->KeyGen();

    $this->_url = $this->_path_config["ROOT"]["modules"]."/trabajosdegrado/views/modalidades_formatosdisp.php?".$cadenaUrl;
    header("Location: {$this->_url}");
}


private function editarpractica(){
    
      $obj_datos = new Modules_Trabajosdegrado_Model_DatosProyecto();
      $FacadeDatos = new Modules_Trabajosdegrado_Model_DatosProyectoFacade();
      
      $pagina_retorno = "proyectoseg.php";
      //$codigodatos = $obj_datos->get_codigo();
      $codigo = $this->_parameters->get_parameter("codigo",-1);
      $codmodalidad = $this->_parameters->get_parameter("codmodalidad",-1);
      $cod_proyectogrado = $this->_parameters->get_parameter("codproyectogrado",-1);
      $nombreempresa = $this->_parameters->get_parameter("nombreempresa","");
      $dependencia = $this->_parameters->get_parameter("dependencia","");
      $asesor = $this->_parameters->get_parameter("asesor","");
      $cargo = $this->_parameters->get_parameter("cargo","");
      $direccion = $this->_parameters->get_parameter("direccion","");
      $telefono = $this->_parameters->get_parameter("telefono","");
      $tipo_seminario = $this->_parameters->get_parameter("tipo_seminario","");
      $fecha_solicitud = $this->_parameters->get_parameter("fecha2","");
      $tematica = $this->_parameters->get_parameter("tematica","");      
     $titulo = $this->_parameters->get_parameter("titulo","");
     $resumen = $this->_parameters->get_parameter("tema","");
     $objetivo = $this->_parameters->get_parameter("objetivo","");
      
     
       $obj_datos->set_codigo($codigo);
      
      $obj_datos = $FacadeDatos->loadOne($obj_datos);   
      
     
      $obj_datos->set_nombre_empresa($nombreempresa);
      $obj_datos->set_dependencia($dependencia);
      $obj_datos->set_asesor_practica($asesor);
      $obj_datos->set_cargoasesor($cargo);
      $obj_datos->set_direccion($direccion);
      $obj_datos->set_telefono($telefono);
      $obj_datos->set_tipo_seminario($tipo_seminario);  
      $obj_datos->set_fecha_solicitud($fecha_solicitud);
      $obj_datos->set_tematica($tematica);
      $obj_datos->set_titulo($titulo);
      $obj_datos->set_resumen($resumen);
      $obj_datos->set_objetivo($objetivo);

                    $FacadeDatos->update($obj_datos);
                    $msg=16;
 
    $this->_parameters->delete_all();
    $this->_parameters->add("codproyectogrado", $obj_datos->get_codproyectogrado());
    $this->_parameters->add("msg", $msg);
      $this->_parameters->add("paso", 4);
    $cadenaUrl = $this->_parameters->KeyGen();

    $this->_url = $this->_path_config["ROOT"]["modules"]."/trabajosdegrado/views/proyectoseg.php?".$cadenaUrl;
    header("Location: {$this->_url}");
    
}

private function editarRadicacion(){
    
    
    $cod_relproyusu = $this->_parameters->get_parameter("codrelproyusu",-1);  
    $cod_proyectogrado = $this->_parameters->get_parameter("codproyectogrado",-1);
//      $cod_tema = $this->_parameters->get_parameter("codtema",-1);
      $creditosaprobados = $this->_parameters->get_parameter("creditosaprobados","");
      
      $finpro = $this->_parameters->get_parameter("finproceso","false");
     
     $obj_usuproyecto = new Modules_trabajosdegrado_Model_Usuproyectogrado();
     $Facadeusuproyecto = new Modules_Trabajosdegrado_Model_UsuproyectogradoFacade();
     
     $obj_proyecto = new Modules_trabajosdegrado_Model_ProyectosGrado();
     $Facadeproyecto = new Modules_Trabajosdegrado_Model_ProyectosGradoFacade();
     
//       $obj_datos = new Modules_Trabajosdegrado_Model_DatosProyecto();
//     $FacadeDatos = new Modules_Trabajosdegrado_Model_DatosProyectoFacade();
     
     $obj_usuproyecto->set_codrelproyusu($cod_relproyusu);
     $obj_usuproyecto = $Facadeusuproyecto->loadOne($obj_usuproyecto);  
     $obj_usuproyecto->set_creditosaprobados($creditosaprobados);  
     $obj_usuproyecto->set_finproceso($finpro);
    
    
     $Facadeusuproyecto->update($obj_usuproyecto);
//   var_dump($obj_usuproyecto);
//      exit();
//
//         $obj_proyecto->set_codproyectogrado($obj_usuproyecto->get_codproyectogrado());
//         $obj_proyecto = $Facadeproyecto->loadOne($obj_proyecto);
//         if($cod_tema!=$obj_proyecto->get_codtema()){
//             
//             
//             $obj_proyecto->set_codtema($cod_tema);
//           
//            
//             $Facadeproyecto->update($obj_proyecto); 
//             $codigo=$Facadeproyecto->traercodigodatos($obj_usuproyecto->get_codproyectogrado());
//
//             $obj_datos->set_codigo($codigo);
//             $obj_datos = $FacadeDatos->loadOne($obj_datos);
//             
//             $obj_datos->set_asesor_practica('');
//             $obj_datos->set_cargoasesor('');
//             $obj_datos->set_dependencia('');
//             $obj_datos->set_direccion('');
//             $obj_datos->set_director_monografia('');
//             $obj_datos->set_fecha_solicitud(date("Y-m-d"));
//             $obj_datos->set_nombre_empresa('');
//             $obj_datos->set_objetivo('');
//             $obj_datos->set_resumen('');
//             $obj_datos->set_telefono('');
//             $obj_datos->set_tematica('');
//             $obj_datos->set_tipo_seminario('');
//             $obj_datos->set_titulo('');
//             
//             $FacadeDatos->update($obj_datos);
//             
//             
//         }
//         
  // $Facadeusuproyecto->update($obj_usuproyecto);
     $msg=15;
     
    $this->_parameters->delete_all();
    $this->_parameters->add("codproyectogrado", $obj_usuproyecto->get_codproyectogrado());
    $this->_parameters->add("msg", $msg);
    $cadenaUrl = $this->_parameters->KeyGen();

    $this->_url = $this->_path_config["ROOT"]["modules"]."/trabajosdegrado/views/proyectoseg.php?".$cadenaUrl;
    header("Location: {$this->_url}");
      

     
     
}

private function editarDatos(){
    
    $Usuario = new Modules_Krauff_Model_Usuarios();
    $Facadeusuario = new Modules_Krauff_Model_UsuariosFacade();
    
    
     $pagina_retorno = "proyectoseg.php";
      //$codigodatos = $obj_datos->get_codigo();
      $codproyecto = $this->_parameters->get_parameter("codproyectogrado",-1);  
      $codusuario = $this->_parameters->get_parameter("codusuario",-1);    
      $primer_apellido = $this->_parameters->get_parameter("primerapellido","");
      $email = $this->_parameters->get_parameter("correo","");     
      $nombre = $this->_parameters->get_parameter("nombres","");   
      $programaacademico = $this->_parameters->get_parameter("programaacademico","");
      $jornada = $this->_parameters->get_parameter("jornada","");
      $facultad = $this->_parameters->get_parameter("facultad","");
      $direccion = $this->_parameters->get_parameter("direccion","");
      $telefono = $this->_parameters->get_parameter("telefono",0);
      $tiposangre = $this->_parameters->get_parameter("tiposangre",0);
      $rh = $this->_parameters->get_parameter("rh",0);
      $cod_estudiante=  $this->_parameters->get_parameter("codestudiante","");
      
      $Usuario->set_codusuario($codusuario);
      $apellidos= explode(' ', $primer_apellido);
      
      $Usuario = $Facadeusuario->loadOne($Usuario);   
   
      $Usuario->set_primerapellido($apellidos[0]);
      $Usuario->set_segundoapellido($apellidos[1]);
      $Usuario->set_correo($email);
      $Usuario->set_nombres($nombre);
      $Usuario->set_programaacademico($programaacademico);
      $Usuario->set_jornada($jornada);
      $Usuario->set_facultad($facultad);
      $Usuario->set_direccion($direccion);
      $Usuario->set_telefono($telefono);
      $Usuario->set_tiposangre($tiposangre);
      $Usuario->set_rh($rh);
      $Usuario->set_codigo($cod_estudiante);
      $Usuario->set_documento($cod_estudiante);
      
      $Facadeusuario->update($Usuario);

   $msg=15;
   
   //exit();

    $this->_parameters->delete_all();
    $this->_parameters->add("codproyectogrado", $codproyecto);
    $this->_parameters->add("msg", $msg);
    $cadenaUrl = $this->_parameters->KeyGen();

    $this->_url = $this->_path_config["ROOT"]["modules"]."/trabajosdegrado/views/proyectoseg.php?".$cadenaUrl;
    header("Location: {$this->_url}");
    
}

private function finalizar(){
  
    
$obj_proyecto = new Modules_trabajosdegrado_Model_ProyectosGrado();
$Facadeproyecto = new Modules_Trabajosdegrado_Model_ProyectosGradoFacade();
$obj_usuproyectogrado = new Modules_trabajosdegrado_Model_Usuproyectogrado();
$Facadeusuproyectogrado= new Modules_Trabajosdegrado_Model_UsuproyectogradoFacade();
$pagina_retorno = "index.php"; 

$codproyecto = $this->_parameters->get_parameter("codproyectogrado",-1); 
$cod_usu = $this->_parameters->get_parameter("codrelproyusu",-1); 


$obj_usuproyectogrado->set_codrelproyusu($cod_usu);
$obj_proyecto->set_codproyectogrado($codproyecto);

$obj_proyecto = $Facadeproyecto->loadOne($obj_proyecto);
$obj_usuproyectogrado = $Facadeusuproyectogrado->loadOne($obj_usuproyectogrado);
$obj_usuproyectogrado->set_finproceso(1);
$Facadeusuproyectogrado->update($obj_usuproyectogrado);
$fin = $Facadeusuproyectogrado->finalizarradicacion($codproyecto);


if (($fin[0]['finalizados']== $fin[0]['totales'])&& ($obj_usuproyectogrado->get_tipoasignacion()==5)){
    
$obj_proyecto->set_fechaestado(date("Y-m-d"));
$obj_proyecto->set_codestado(2);  
$obj_proyecto->set_comentarioestado("Inicio proceso de verificacion de datos");
  
 
if($Facadeproyecto->update($obj_proyecto)){
    
    $obj_historico = new Modules_trabajosdegrado_Model_HistoricoEstados();
                        $obj_historico->set_codestado(2);
                        $obj_historico->set_codproyectogrado($codproyecto);
                        $obj_historico->set_fecha(date("Y-m-d"));
                        $obj_historico->set_comentarioestado("Inicia proceso de verificacion de datos");
                        
                        $FacadeHistorico = New Modules_Trabajosdegrado_Model_HistoricoEstadosFacade();
                        $FacadeHistorico->add($obj_historico);
    
}

    $msg=17;
    }
$this->_parameters->delete_all();
    $this->_parameters->add("codproyectogrado", $codproyecto);
     $this->_parameters->add("msg", $msg);
    $cadenaUrl = $this->_parameters->KeyGen();   
    $this->_url = $this->_path_config["ROOT"]["modules"]."/trabajosdegrado/views/index.php?".$cadenaUrl;
    header("Location: {$this->_url}");

}

private function busqUsuario(){
    $documento = $this->_parameters->get_parameter("doc","-1");

    $FacadeProyecto = new Modules_Trabajosdegrado_Model_ProyectosGradoFacade();
    $cantidad = $FacadeProyecto->busqUsuario($documento);
    if (empty($cantidad)){
        header("Status: 400 Bad request", false, 400);
        echo "Registro NO encontrado";
        exit();
    }else{
        $fila = $FacadeProyecto->obtenerUsuario($documento);
        $nombre_completo = $fila["nombres"]." ".$fila["primerapellido"]." ".$fila["segundoapellido"];
        $salida = json_encode(array("salida" => $nombre_completo));
        echo $salida;
        exit();
    }
}

private function AgregarParticipante(){
    $documento = $this->_parameters->get_parameter("doc","-1");
    $tipo_asignacion = $this->_parameters->get_parameter("tipo","5");
    $cod_proyectoGrado = $this->_parameters->get_parameter("codproy","0");
    
    $FacadeProyecto = new Modules_Trabajosdegrado_Model_ProyectosGradoFacade();
    $resultado = $FacadeProyecto->agregarParticipante($tipo_asignacion, $documento, $cod_proyectoGrado);
    if ($resultado === false){
        header("Status: 400 Bad request", false, 400);
        echo "Error en el proceso de grabación";
        exit();
    }else{
        $fila = $FacadeProyecto->obtenerUsuario($documento);
        $id_fila = $fila["codusuario"];
        $xhtml = "<tr id=\"" . $id_fila . "\">\n";
        $xhtml.= " <td>" . $fila["documento"] . "</td>\n";
        $xhtml.= " <td>" . $fila["primerapellido"] . "</td>\n";
        $xhtml.= " <td>" . $fila["segundoapellido"] . "</td>\n";
        $xhtml.= " <td>" . $fila["nombres"] . "</td>\n";
        $xhtml.= " <td>&nbsp;</td>\n";
        $xhtml.= "</tr>\n";
        echo $xhtml;
        exit();
    }
}






//***************************************************************************************************
// END: Controller private methods


}
//End class
?>