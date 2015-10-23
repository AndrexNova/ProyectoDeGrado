<?php
if (!isset($DOM["SECURITY_ID"])) {
    echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";
    exit();
}
?>                                      
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-xs-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="ibox-title">
                        <h5>DATOS DEL REGISTTO</h5>
                    </div> 
                    <form onsubmit="javascript:return verificar();" action="moon.php" method="POST" id="frm_radicar" name="frm_radicar" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $cod_proyectogrado; ?>" name="codproyectogrado" id="codproyectogrado">
                <input type="hidden" value="<?php echo $filas[0]['codrelproyusu']; ?>" name="codrelproyusu" id="codrelproyusu">
                        <input type="hidden" value="editarRadicacion" name="action" id="action">
                        <input type="hidden" value="Trabajosdegrado/ProyectosGradoController" name="controller" id="controller">
                        <fieldset>                           
                            <table width="80%">
                                <tbody>
                                    <tr>
                                        <td> Creditos Aprobados </td>
                                        <td>
                                            <div class="col-xs-4">
                                            <input type="text" class="form-control validate[required]" name="creditosaprobados" id="creditosaprobados"  value="<?php echo $filas[0]['creditosaprobados'] ?>"> 
                                        </div>
                                        </td>
                                        </tr>
                                        <tr>
                                                 <td>&nbsp;</td>
                                        </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <div align="left" class="col-xs-4">
                                                <button id="btnAction" name="btnAction" type="submit" class="btn btn-success">Actualizar</button>&nbsp;
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset>
                                                                         
                    <div class="ibox-title">
                        <h5>DATOS DE LA CONSIGNACION</h5>
                    </div>
                    <div class="table-responsive">
                        <table name="tbltarifas" id="tbltarifas" m="" class="table table-bordered table-highlight">
                            <thead>
                                <tr>
                                    <th>Recibos</th>
                                    <th>Número de Consignación</th>
                                    <th>Valor de Pago</th>
                                    <th>Fecha Consignación</th>
                                    <th><a data-toggle="modal" data-target="#VentanaFlotanteCrear" id="nuevorecibo" class="glyphicon glyphicon-open-file" ></i> Nuevo</a> </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $xhtml = "";
                                $Url = clone $Params;
                                $controller = "Modules_Trabajosdegrado_Controllers_ProyectosGradoController";
                                foreach ($filas_consignaciones as $indice => $campo) {
                                    $cod_consignacion = $campo["codconsignacion"];
                                    $num_consigna = $campo["numero"];
                                    $valor_consigna = $campo["valor"];
                                    $fecha_consigna = $campo["fecha"];

                                    $Url->delete_all();
                                    $Url->add("action", "eliminarConsignacion");
                                    $Url->add("controller", $controller);
                                    $Url->add("codconsignacion", $cod_consignacion);
                                    $Url->add("codproyectogrado", $cod_proyectogrado);
                                    $params = $Url->keyGen();

                                    $Url->delete_all();
                                    $Url->add("codconsignacion", $cod_consignacion);
                                    $param_ver = $Url->keyGen();
                                    $xhtml.= "<tr>\n";
                                    $xhtml.= "<td>" . $campo["nombreconsignacion"] . "</td>\n";
                                    $xhtml.= "<td>" . $num_consigna . "</td>" . "</td>\n";
                                    $xhtml.= "<td>" . $valor_consigna . "</td>" . "</td>\n";
                                    $xhtml.= "<td>" . $fecha_consigna . "</td>" . "</td>\n";
                                    $xhtml.= "<td><div class=\"btn-group\">";
                                    $xhtml.= "<a class=\"btn flotante_consignacion\" href=\"proyectoseg_verconsigna.php?{$param_ver}\" title=\"Ver Consignacion\"><img border=\"0\" src=\"../../../images/doc_icons/img.png\" />\n";
                                    $xhtml.= "<a href=\"#\" data-toggle=\"modal\" name=\"{$params}\" data-target=\"#myModalDelete\" title=\"Eliminar\"><i class=\"glyphicon glyphicon-remove text-navy\"></i></a>";
                                    $xhtml.= "</div></td>";
                                    $xhtml.= "</tr>\n";
                                }
                                echo $xhtml;
                                ?>
                            </tbody>
                        </table>
                    </div>
                         </form> 
                </div>
            </div>
        </div>
    </div>
</div>
        <!--VENTANA FLOTANTE PARA CREAR-->
<div role="dialog" tabindex="-1" id="VentanaFlotanteCrear" class="modal fade bs-example-modal-lg" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Adjuntar Nuevo Recibo de Pago</h4>
            </div> 
            <div class="modal-body">
             <form onsubmit="javascript:return verificaradjunto();" action="moon.php" method="POST" id="frm_radicar2" name="frm_radicar2" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $cod_proyectogrado; ?>" name="codproyectogrado" id="codproyectogrado">                                                        
                <input type="hidden" value="<?php echo $cod_temas; ?>" name="codtema" id="codtema">                                                        
                <input type="hidden" value="adjuntarConsignacion" name="action" id="action">
                <input type="hidden" value="<?php echo $DOM['USER_ID']; ?>" name="codusuario" id="codusuario">
                <input type="hidden" value="Trabajosdegrado/ProyectosGradoController" name="controller" id="controller">
                  <div class="table-responsive">
                      <table name="tbltarifas" id="tbltarifas" m="" class="table table-bordered table-highlight">
                    <thead>
                        <tr>
                            <th width="80%">Recibos</th>
                            <th width="20%">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>   
                            <td>Recibo de Pago:<br /><div class="verdenormal">Sólo imagenes: jpg, gif, png (máx 1 mega)</div></td>
                            <td><input type="file" class="validate[required]" name="nombreconsignacion" id="nombreconsignacion"></td>
                        </tr>
                        <tr>
                            <td>Número de Consignación:<br /><div class="verdenormal">Se encuentra en la parte superior derecha ejemplo LQ-00012345</div></td>
                            <td><input type="text" class="form-control validate[required]" name="numero" id="numero" value=""></td>
                        </tr>
                        <tr>
                            <td>Valor de Pago:</td>
                            <td><input type="text" class="form-control validate[required]" name="valor" id="valor" value=""></td>
                        </tr>
                        <tr>
                            <td>Fecha Consignación:</td>
                            <td><input type="text" class="form-control validate[required]" name="fecha" id="fecha" onfocus="this.blur();" value="">
                                <img src="../../../images/calendar.png" border="0" id="btn_fecha" /></td>
                        </tr>
                        <tr>                                                                   
                            <td>
                                <div align="left">
                                    <button id="btnAction" name="btnAction" type="submit" class="btn btn-success">Agregar recibo de pago</button>&nbsp;

                                </div>  
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
          </div>
               </div>
        </div>
    </div>
</div>
  

<script type="text/javascript">
    //<![CDATA[

    var cal = Calendar.setup({
        onSelect: function (cal) {
            cal.hide()
        },
        showTime: false
    });
    cal.manageFields("btn_fecha", "fecha", "%d/%m/%Y");


    //]]>
    
</script>

