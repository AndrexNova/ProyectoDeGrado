<?php
if (!isset($DOM["SECURITY_ID"])) {
    echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";
    exit();
}
?>

<div class="main">
    <div class="container">
        <div class="widget stacked">
    <div class="col-md-12">
        <div class="widget-content">
        <?php
switch ($cod_modalidad) {
    case 1:
        ?>
        <div class="col-xs-12">
            <h3>DATOS A VERIFICAR:</h3>
                <fieldset>
                    <div class="control-group">                                                               

                        <table width="95%" class="table table-bordered table-highlight">
                            <thead>
                            <tr>

                                <th colspan="4">Información del Proyecto</th>                                                  
                            </tr>
                        </thead>
                            <tbody>                                
                                <tr>
                                    
                                    <td width="15%"><label for="name" class="control-label">Modalidad</label></td>

                                    <td width="35%"><?php echo $arreglo[0] ['nombremodalidad'] ?></td>
                                    <td width="15%"><b>Fecha de Solicitud:</b></td>
                                    <td ><?php echo $arreglo[0] ['fecha_solicitud'] ?></td>


                                </tr>
                                <tr>
                                    <td><label for="titulo">Nombre de la Empresa    </label></td>
                                    <td><?php echo $arreglo[0] ['nombre_empresa'] ?></td>
                                    <td><label for="titulo">Asesor    </label></td>
                                    <td><?php echo $arreglo[0] ['asesor_practica'] ?></td>
                                </tr>                                       

                                <tr>
                                    <td><label for="titulo">Cargo    </label></td>
                                    <td><?php echo $arreglo[0] ['cargoasesor'] ?></td>
                                    <td><label for="name" class="control-label">Dirección</label></td>

                                    <td><?php echo $arreglo[0] ['direccion'] ?></td>
                                </tr>
                                <tr>
                                    <td>  <label for="name" class="control-label">Teléfono</label></td>

                                    <td><?php echo $arreglo[0] ['telefono'] ?></td>

                                </tr>
                                



                            </tbody>
                        </table>
                    </div>
                </fieldset>

       

        </div>
        


        <?php
        break;
    default:
        ?> 
        <div class="col-xs-12">
            <h3>DATOS A VERIFICAR:</h3>
            

                <fieldset>
                                            <table width="95%" class="table table-bordered table-highlight">
                            <thead>
                            <tr>

                                <th colspan="4">Información del Proyecto</th>                                                  
                            </tr>
                        </thead>
                            <tbody>                                
                                <tr>
                                    
                                    <td width="15%"><label for="name" class="control-label">Modalidad</label></td>

                                    <td width="35%"><?php echo $arreglo[0]['nombremodalidad'] ?></td>
                                    <td width="15%"><b>Fecha de Solicitud:</b></td>
                                    <td ><?php echo $arreglo[0] ['fecha_solicitud'] ?></td>


                                </tr>   
                            </tbody>
                        </table>
                </fieldset>
            

        </div> <!-- /widget-content -->	
        
        



        <?php break;
}
?>
        <h3>ESTUDIANTES:</h3>
        
        <div class="col-xs-12">
            <div class="widget stacked">
                <div class="widget-content">
                    <table name="tbltarifas" id="tbltarifas" m="" class="table table-bordered table-highlight">
                        <thead>
                            <tr>

                                <th width="25%">Nombre</th>
                                <th width="10%">Documento</th>
                                <th width="5%">Creditos</th>   
                                <th>Consignaciones</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $xhtml = "";
//                                                            $Url = clone $Params;
                            $controller = "Modules_Trabajosdegrado_Controllers_ProyectosGradoController";
                            foreach ($arreglo as $indice => $campo) {
                             

                                $xhtml.= "<tr>\n";
                                $xhtml.= "<td>" . $campo["nombres"] . "</td>\n";
                                $xhtml.= "<td>" . $campo["documento"] . "</td>" . "</td>\n";
                                $xhtml.= "<td>" . $campo["creditosaprobados"] . "</td>" . "</td>\n";
                                $xhtml.="<td>";
                                $xhtml.='<table name="tbltarifas" id="tbltarifas" m="" class="table table-bordered">
                        <thead>
                            <tr>

                                <td width="25%">Recibos</td>
                                <td width="20%">Número de Consignación</td>
                                <td width="20%">Valor de Pago</td>
                                <td width="20%">Fecha Consignación</td>
                                <td width="15%">Imagen</td>                                                      
                            </tr>
                            </thead>
                       <tbody>
                        ';
                           $controller = "Modules_Trabajosdegrado_Controllers_ProyectosGradoController";
                            foreach ($datosconsignacion[$campo['codusuario']] as $indice2 => $campo2) {
                                $cod_consignacion = $campo2["codconsignacion"];
                                $num_consigna = $campo2["numero"];
                                $valor_consigna = $campo2["valor"];
                                $fecha_consigna = $campo2["fecha"];
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
                                $xhtml.= "<td>" . $campo2["nombreconsignacion"] . "</td>\n";
                                $xhtml.= "<td>" . $num_consigna . "</td>" . "</td>\n";
                                $xhtml.= "<td>" . $valor_consigna . "</td>" . "</td>\n";
                                $xhtml.= "<td>" . $fecha_consigna . "</td>" . "</td>\n";
                                $xhtml.= "<td><div class=\"btn-group\">";
                                $xhtml.= "<a class=\"btn flotante_consignacion\" href=\"verificar_verconsigna.php?{$param_ver}\" title=\"Ver Consignacion\"><img border=\"0\" src=\"../../../images/doc_icons/img.png\" />\n";
                                $xhtml.= "</div></td>";
                                $xhtml.= "</tr>\n";
                            }
                            if(count($datosconsignacion[$campo['codusuario']])<=0){
                                
                                $xhtml.="<tr><td colspan='4'>No se encontraron consignaciones</td></tr>";
                            }
                                
      
                                
                                $xhtml.= "</tbody>

                    </table></td></tr>";
                                
                            }
                            echo $xhtml;
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
                    <form id="form1" name="form1" method="post" action="moon.php" onSubmit="javascript:return verificar();">
                         <input type="hidden" name="estado" id="estado">
                         <input type="hidden" value="editarobservacion" name="action" id="action">
                         <input type="hidden" value="<?php echo $cod_proyectogrado; ?>" name="codproyectogrado" id="codproyectogrado">
                         <input type="hidden" value="Trabajosdegrado/DatosProyectoController" name="controller" id="controller">
                        <table class="">
                            <tr><td><label for="tema">Observaciones</label></td><td><textarea name="observaciones" id="observaciones" class="form-control" cols="45" rows="5"></textarea></td></tr>
                            <tr><td colspan="2">&nbsp;</td></tr>
                            <tr><td><button id="btnAction" name="btnAction" type="submit" class="btn btn-success">Aprobar</button>&nbsp;</td>
                                <td> <button id="btnAction" name="btnAction" type="button" onClick="javascript:return verificarrechazar();" class="btn btn-danger">Rechazar</button></td></tr>
                        
                        
                                           
                        </table>
                    </form>
        </div>
            
        </div>	
    </div> <!-- /col-md-12 -->
        </div>
        </div>
</div> <!-- /main -->
