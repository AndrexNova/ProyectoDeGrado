<?php
if (!isset($DOM["SECURITY_ID"])) {
    echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";
    exit();
}
$Url = clone $Params;
$Url->delete_all();
$Url->add("codmodalidad", $cod_modalidadgrado);
$params_flotante = $Url->keyGen();

$Url_descarga = $PATH_CONFIG["ROOT"]["moon"] . "/process/processurl.php";
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">
                        <h3><?php echo $Modalidad->get_nombremodalidad();?> (<a data-toggle="modal" data-target="#VentanaFlotanteCrear" title="Formatos">Documentos sin asignar: <?php echo $cantidad_disponibles;?></a>)</h3>
                        <?php
                        if ($cantidad_filas == 0) {
                            ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <strong>No se encontraron registros.</strong> No hay documentos asociados a esta modalidad
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="5%">&nbsp;</th>
                                            <th width="30%">Nombre</th>
                                            <th width="37%">Descripcion</th>
                                            <th width="8%">Version</th>
                                            <th width="10%">Tamaño</th>
                                            <th width="10%">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $xhtml = "";
                                        $controller = "Modules_Trabajosdegrado_Controllers_ModalidadesGradoController";
                                        $controller_formatos = "Modules_Trabajosdegrado_Controllers_FormatosGradoController";
                                        foreach ($filas as $codformato => $campo) {
                                            $nombre_formato = $campo["nombreformato"];
                                            $descripcion = $campo["descripcion"];
                                            $version = $campo["version"];
                                            $formatocodificado = $campo["formatocodificado"];
                                            $extension = $Archivo->icon($nombre_formato);
                                            $tamanno = $Archivo->sizeFortmat($campo["tamanno"]);

                                            $Url->delete_all();
                                            $Url->add("action", "desasignar");
                                            $Url->add("controller", $controller);
                                            $Url->add("codmodalidad", $cod_modalidadgrado);
                                            $Url->add("codformato", $codformato);
                                            $params_eliminar = $Url->keyGen();

                                            $Url->delete_all();
                                            $Url->add("action", "descargar");
                                            $Url->add("controller", $controller_formatos);
                                            $Url->add("codformato", $codformato);
                                            $params_descargar = $Url->keyGen();

                                            $xhtml.= "<tr>\n";
                                            $xhtml.= "<td><div align=\"center\"><img src=\"../../../images/doc_icons/{$extension}\" border=\"0\"></div></td>";
                                            $xhtml.= "<td>{$nombre_formato}</td>";
                                            $xhtml.= "<td>{$descripcion}</td>";
                                            $xhtml.= "<td>{$version}</td>";
                                            $xhtml.= "<td>{$tamanno}</td>";
                                            $xhtml.= "<td>";
                                            $xhtml.= "  <div class=\"btn-toolbar\">";
                                            $xhtml.= "  <div class=\"btn-group\">";
                                            $xhtml.= "   <a title=\"Desasignar {$nombre_formato}\" class=\"btn btn-default msgbox-confirm\" href=\"{$params_eliminar}\"><img src=\"../../../images/minus.gif\"></a>";
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--VENTANA FLOTANTE PARA CREAR-->
<div role="dialog" tabindex="-1" id="VentanaFlotanteCrear" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span>
                <span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title">Practica Profesional</h4>
            </div>
            <div class="modal-body">
                <iframe id="contenedorIframe" width="540" height="400" src="" data-iframe-src="modalidades_formatosdisp.php?<?php echo $params_flotante;?>" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>


