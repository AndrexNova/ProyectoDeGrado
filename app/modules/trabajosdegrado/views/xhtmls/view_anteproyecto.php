<?php
if (!isset($DOM["SECURITY_ID"])) {
    echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";
    exit();
}
?>                                      

<div class="main">
    <div class="col-xs-8">
        <div class="widget stacked">                     
            <div class="widget-content">
                <form id="frm_ant" name="frm_ant" method="post" action="" onSubmit="javascript:return verificar();" enctype="multipart/form-data">
                     <input type="hidden" value="adjuntaranteproyecto" name="action" id="action">
                     <input type="hidden" value="<?php echo $filass[0]['codigo']; ?>" name="codigo" id="codigo">
                    <input type="hidden" value="<?php echo $cod_proyectogrado; ?>" name="codproyectogrado" id="codproyectogrado">
                    <input type="hidden" value="Trabajosdegrado/AnteproyectoController" name="controller" id="controller">
                    <fieldset>

                        <table width="95%">
                            <tbody>                                       

                                <tr>
                                    <td><label for="titulo">Titulo</label></td>
                                    <td><input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $filass[0]['titulo'] ?>" /></td>
                                </tr>
                                <tr>
                                    <td><label for="tema">Tema</label>
                                    <td><textarea name="tema" id="tema" class="form-control" cols="45" rows="5"><?php echo $filass[0]['resumen'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label for="objetivo">Objetivo</label>
                                    <td><textarea name="objetivo" id="objetivo" class="form-control " cols="45" rows="5"><?php echo $filass[0]['objetivo'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td for="anteproyecto">Adjuntar Anteproyecto:<br /><div class="verdenormal">Sólo texto: Word, PDF (máx 1 mega)</div></td>
                                    <td colspan="2"><input type="file" class="validate[required]" name="anteproyecto" id="anteproyecto" ></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>
                                        <div align="left">
                                            <button id="btnAction" name="btnAction" type="submit" class="btn btn-success">Aceptar</button>&nbsp;
                                            
                                            <button id="btnAction" name="btnAction" type="button" onclick="location.href='index.php'" class="btn btn-primary">Finalizar</button>&nbsp;

                                        
                                        </div>  
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </fieldset>

                </form>

            </div>

        </div>


    </div>

</div>

<div class="col-xs-6">
    <div class="widget stacked">
        <div class="widget-content">
            <table name="tbltarifas" id="tbltarifas" m="" class="table table-bordered table-highlight">
                <thead>
                    <tr>

                        <th width="50%">Nombre</th>                       
                        <th width="50%">

                    </tr>
                </thead>
                 <tbody>
                                                            <?php
                                                            $xhtml = "";
                                                            $Url = clone $Params;
                                                            $controller = "Modules_Trabajosdegrado_Controllers_AnteproyectoController";
                                                            foreach ($filas_anteproyecto as $indice => $campo) {
                                                                $codigo_pro = $campo["codproyectogrado"];
                                                                $nombre = $campo["anteproyecto"];
                                                                $codigo_doc = $campo["codigo"];
                                                                   
                                                                $Url->delete_all();
                                                                $Url->add("action", "eliminarAnteproyecto");
                                                                $Url->add("codproyectogrado", $codigo_pro);
                                                                $Url->add("codigo", $codigo_doc);
                                                                $Url->add("controller", $controller);                                                                                                                               $Url->add("codproyectogrado", $cod_proyectogrado);
                                                                $params = $Url->keyGen();
                                                                
                                                                 $Url->delete_all();
                                                                $Url->add("action", "descargaranteproyecto");
                                                                 $Url->add("codproyectogrado", $codigo_pro);
                                                                 $Url->add("codigo", $codigo_doc);
                                                                $Url->add("controller", $controller);                                                                                                                               $Url->add("codproyectogrado", $cod_proyectogrado);
                                                                $pr = $Url->keyGen();

                                                                $Url->delete_all();
                                                                $Url->add("codproyectogrado", $codigo_pro);
                                                                $Url->add("codigo", $codigo_doc);
                                                                $param_ver = $Url->keyGen();
                                                                $xhtml.= "<tr>\n";
                                                                 $xhtml.= "<td>" . $nombre  . "</td>\n";
                                                                $xhtml.= "<td><a class=\"btn descargar\" href=\"{$pr}\" title=\"Descargar documento\"><img src=\"../../../images/download.gif\">\n";
                                                                $xhtml.= "<a title=\"Eliminar documento\" class=\"btn msgbox-confirm\" href=\"{$params}\"><img border=\"0\" src=\"../../../images/minus.gif\" /></a>";
                                                                $xhtml.= "</div></td>";
                                                                $xhtml.= "</tr>\n";
                                                            }
                                                            echo $xhtml;
                                                            ?>
                                                        </tbody>
              
            </table>
        </div>
    </div>
</div>


