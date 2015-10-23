<?php
    if(!isset($DOM["SECURITY_ID"])) {
        echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";exit();
    }

$Url = clone $Params;
$Url->delete_all();
$Url->add("codmodalidad", $cod_modalidadgrado);
$params_flotante = $Url->keyGen();

$Url_descarga = $PATH_CONFIG["ROOT"]["moon"]."/process/processurl.php";
?>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="widget stacked">	
                   
                    <div class="widget-content">
                        <?php
                        if ($cantidad_filas==0){
                        ?>
                       
                        <?php
                        }else{
                        ?>
                         <div class="widget-header">
                        <i class="icon-list"></i>
                          
                        <h3>Nombre Modalidad: <?php echo $Modalidad->get_nombremodalidad();?> 
                        </h3>
                    </div> <!-- /widget-header -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-highlight">
                                <thead>
                                    <tr>
                                        <th width="10%">&nbsp;</th>
                                        <th width="40%">Nombre</th>
                                        <th width="40%">Descripcion</th>                                        
                                        <th width="10%">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $xhtml = "";
                                        $controller = "Modules_Trabajosdegrado_Controllers_ModalidadesGradoController";
                                        $controller_formatos = "Modules_Trabajosdegrado_Controllers_FormatosGradoController";
                                        foreach ($filas as $codformato => $campo){
                                            $nombre_formato = $campo["nombreformato"];
                                            $descripcion = $campo["descripcion"];                                            
                                            $formatocodificado = $campo["formatocodificado"];
                                            $extension = $Archivo->icon($nombre_formato);
                                           

                                            $Url->delete_all();
                                            $Url->add("action", "descargar");
                                            $Url->add("controller", $controller_formatos);
                                            $Url->add("codformato", $codformato);
                                            $params_descargar = $Url->keyGen();

                                            $xhtml.= "<tr>\n";
                                            $xhtml.= "<td><div align=\"center\"><img src=\"../../../images/doc_icons/{$extension}\" border=\"0\"></div></td>";
                                            $xhtml.= "<td>{$nombre_formato}</td>";
                                            $xhtml.= "<td>{$descripcion}</td>";                                           
                                            $xhtml.= "<td>";
                                            $xhtml.= "  <div class=\"btn-toolbar\">";
                                            $xhtml.= "  <div class=\"btn-group\">";
                                            
                                            $xhtml.= "   <a target=\"blank\" title=\"Descargar {$nombre_formato}\" class=\"btn btn-default\" href=\"{$Url_descarga}?{$params_descargar}\"><img src=\"../../../images/download.gif\"></a>";
                                            $xhtml.= "  </div>";
                                            $xhtml.= "  </div>";
                                            $xhtml.= "</td>";
                                            $xhtml.= "</tr>\n";
                                        }
                                        echo $xhtml;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                        }//fin del if para cantidad de filas
                        ?>
                    </div> <!-- /widget-content -->
                </div> <!-- /widget -->						
            </div> <!-- /span12 -->     	
        </div> <!-- /row -->
    </div> <!-- /container -->
</div> <!-- /main -->
