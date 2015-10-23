<?php
if (!isset($DOM["SECURITY_ID"])) {
    echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";
    exit();
}
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Listado</h3>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tbltarifas" name="tbltarifas">
                            <thead>
                                <tr>
                                    <th width="35%">Modalidad</th>
                                    <th width="15%">Valor</th>
                                    <th width="20%">Compañero</th>
                                    <th width="15%">Formatos</th>
                                    <th width="15%">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $xhtml = "";
                                $Url = clone $Params;
                                foreach ($arr_modalidades as $indice => $campo) {
                                    $id_fila = $campo["codmodalidadgrado"];
                                    $valor_formateado = number_format($campo["valor"]);
                                    $aso_companero = "true";
                                    if(empty($campo ["asocompanero"])){
                                        $aso_companero = "false";
                                    }
                                    $java_editar = "javascript:modo_edicion({$id_fila}, '" . $campo["nombremodalidad"] . "','" . $campo["valor"] . "','".$aso_companero."');";

                                    $Url->add("codmodalidad", $id_fila);
                                    $params_formatos = $Url->keyGen();

                                    $xhtml.= "<tr id=\"" . $id_fila . "\">\n";
                                    $xhtml.= " <td>" . $campo["nombremodalidad"] . "</td>\n";
                                    $xhtml.= " <td> $ " . $valor_formateado . "</td>\n";
                                    if ($campo["asocompanero"]) {
                                        $companero = "si";
                                    } else {
                                        $companero = "no";
                                    }

                                    $xhtml.= " <td><div align=\"center\">" . $companero . "</div></td>\n";
                                    $xhtml.= " <td><div align=\"center\"><a title=\"Ver formatos\" href=\"modalidades_formatos.php?{$params_formatos}\">" . $campo["cantformatos"] . "</a></div></td>\n";
                                    $xhtml.= " <td>";
                                    $xhtml.= "   <a title=\"Editar {$campo["nombremodalidad"]}\" class=\"btn btn-white btn-xs\" href=\"{$java_editar}\"><i class=\"fa fa-edit\"></i></a>";
                                    $xhtml.= "&nbsp;";
                                    $xhtml.= "   <a href=\"#\" name=\"{$id_fila}\" class=\"btn btn-white btn-xs\" data-toggle=\"modal\" data-target=\"#myModalDeleteAjax\" title=\"{$campo["nombremodalidad"]}\"><i class=\"fa fa-trash-o\"></i></a>";
                                    $xhtml.= "</td>\n";
                                    $xhtml.= "</tr>\n";
                                }
                                echo $xhtml;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Crear Modalidad</h3>
                </div>
                <div class="ibox-content">
                    <form onsubmit="javascript:return verificar();" action="moon23.php" method="ajax" id="frm_modalidades" name="frm_modalidades">
                        <input type="hidden" value="" name="codmodalidadgrado" id="codmodalidadgrado">
                        <input type="hidden" value="crear" name="action" id="action">
                        <input type="hidden" value="Trabajosdegrado/ModalidadesGradoController" name="controller" id="controller">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><label class="col-sm-12 control-label">Modalidad</label></td>
                                        <td><div class="col-sm-12"><input type="text" class="form-control" name="nombremodalidad" id="nombremodalidad" required="true"/></div></td>
                                    </tr>
                                    <tr>
                                        <td><label class="col-sm-12 control-label">Valor</label></td>
                                        <td><div class="col-sm-12"><input type="numbers" class="form-control" name="valor" id="valor" required="true"/></div></td>
                                    </tr>
                                    <tr>
                                        <td><label class="col-sm-12 control-label">Asociar compañero</label></td>
                                        <td>
                                            <div class="col-sm-12 m-b-xs">
                                            <?php
                                            echo $Formulario->addObject("Radio", "asocompanero", $arrValores, "", "required='true'", "");
                                            ?>

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                            <button id="btnAction" type="submit" class="btn btn-primary btn-sm">Crear</button>
                            <button id="btnCancel" type="button" class="btn btn-default btn-sm">Cancelar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- inicio modal borrar -->
<div id="myModalDeleteAjax" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated flipInY">
      <div class="modal-body">
        <strong>Está seguro que desea eliminar el registro: </strong>
        <span class="edit-content">xxx</span>
      </div>      
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="pepe">Aceptar</button>
      </div>
     </div>
   </div>
</div>
<!--fin modal borrar-->