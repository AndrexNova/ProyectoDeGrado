<?php
    if(!isset($DOM["SECURITY_ID"])) {
        echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";exit();
    }   
?>
 <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                     <div class="ibox float-e-margins">
                   
                    <div class="ibox-content">
                        <?php if ($cantidad_filas == 0){?>
                        <div class="widget-content">
                            <div class="alert alert-success alert-dismissable">
                                <button data-dismiss="alert" class="close" type="button">×</button>
                                <strong>ADVERTENCIA: </strong> No se encontraron Trabajos de grado registrados a su nombre, Si desea iniciar el proceso debe seleccionar un Tema del BANCO DE TEMAS  haga clic <a href="../../bancoproyectos/views/verprogramas_admin.php">AQUI.</a>
                            </div>
                             <div class="alert alert-info alert-dismissable">
                                <button data-dismiss="alert" class="close" type="button">×</button>
                                <strong>RECUERDE: </strong> Si aún no tiene su liquidación descarguela <a target="_blank" href="http://190.0.16.59/pagosuts/info.php?bulletProofEco=2457595716b98750af0b487cc7c9fe6f">AQUI.</a>
                                <br> <strong>IMPORTANTE: </strong> Para descargar el formato de su modalidad ingrese a <strong> Trabajos de grado/Documentación.</strong>
                            </div>
                            
                        </div> 
                        <?php }else{?>
                         <div class="ibox-header">
                        <i class="icon-list"></i>
                        <h3>Proyectos de grado registrados</h3>
                    </div> <!-- /widget-header -->
                        <table class="table table-bordered table-highlight">
                            <thead>
                                <tr>
                                    <th width="40%">Titulo</th>
                                    <th width="15%">Estado</th>
                                    <th width="10%">Fecha estado</th>
                                    <th width="10%">Recibos pago</th>
                                    <th width="5%">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $xhtml = "";
                                    $controller = "";
                                    $Url = clone $Params;
//                                    print_r($filas);
                                    foreach ($filas as $indice => $campo){
                                        $cod_proyectog = $campo["codproyectogrado"];
                                        $titulo = $campo["titulo"];
                                        $fecha = Moon2_DateTime_Date::format($campo["fechaestado"],1);
                                        if (!empty($campo["titulo"])){
                                            $titulo = $campo["titulo"];
                                        }
                                        $Url->delete_all();
                                        //$Url->add("action", "detalles");
                                        //$Url->add("controller", $controller);
                                        $Url->add("codproyectogrado", $cod_proyectog);
                                        $parametros = $Url->keyGen();
                                        
                                        switch ($campo['codestado']) {
                                            case 1:
                                                $pagina="proyectoseg.php?{$parametros}";

                                                break;
                                            case 2:
                                                $pagina="#";

                                                break;
                                            case 3:
                                                $pagina="anteproyecto.php?{$parametros}";

                                                break;
                                            case 7:
                                                $pagina="proyectoseg.php?{$parametros}";

                                                break;

                                            default:
                                                $pagina="#";
                                                break;
                                        }
                                        
                                        $xhtml.= "<tr>\n";
                                        $xhtml.= "<td>".$titulo."</td>";
                                        $xhtml.= "<td>".$campo["estado"]."</td>";
                                        $xhtml.= "<td><div align=\"center\">".$fecha."</div></td>";
                                        $xhtml.= "<td><div align=\"center\">".$campo["cantrecibos"]."</div></td>";
                                        $xhtml.= "<td>";
                                        $xhtml.= "  <div class=\"btn-toolbar\">";
                                        $xhtml.= "  <div class=\"btn-group\">";
                                        $xhtml.= "   <a title=\"Ver detalles\" class=\"btn\" href=\"$pagina\"><i class=\"glyphicon glyphicon-search\"></i></a>";
                                        $xhtml.= "  </div>";
                                        $xhtml.= "  </div>";
                                        $xhtml.= "</td>";
                                        $xhtml.= "</tr>\n";
                                    }
                                    echo $xhtml;
                                ?>
                            </tbody>
                        </table>
                        <?php }?>
                    </div> <!-- /ibox-content -->
                </div> <!-- /widget -->						
            </div> <!-- /span12 -->     	
        </div> <!-- /row -->
    </div> <!-- /container -->