<?php
if (!isset($DOM["SECURITY_ID"])) {
    echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";
    exit();
}
?>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="widget stacked">	
                    <div class="widget-header">
                        <i class="icon-list"></i>
                        <h3>Proyectos de grado registrados</h3>
                    </div> <!-- /widget-header -->
                    <div class="widget-content">
                        <table class="table table-bordered table-highlight"m id="tbltarifas" name="tbltarifas">
                            <thead>
                                <tr>
                                    <th width="30%">Codigo del Proyecto </th>
                                    <th width="30%">Estudiantes Asociados</th>
                                      <th width="40%">Nombre Del Proyecto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $xhtml = "";

                                $controller = "Modules_TrabajosdeGrado_Controllers_VerificarController";
                                foreach ($filas as $indice => $campo) {
                                    $id_fila = $campo["codproyectogrado"];
                                    $cod_proyectogrado = $campo["codproyectogrado"];
                                    $titulo = "El título no está registrado en la plataforma";
                                    $num_estudiantes = $campo["numestudiantes"];
                                    //$nombreproyecto = $campo ["titulo"];  
                                    if (!empty($campo["titulo"])) {
                                        $titulo = $campo["titulo"];
                                    }
                                    $Url = clone $Params;
                                    $Url->add("codproyectogrado", $id_fila);
                                    $params_formatos = $Url->keyGen();

                                    $Url->delete_all();
                                    $Url->add("codproyectogrado", $cod_proyectogrado);
                                    
                                    $params_flotante = $Url->keyGen();
                                    ?>
                                    <?php
                                    $xhtml.= "<tr id=\"" . $id_fila . "\">\n";
                                    $xhtml.= " <td><div align=\"center\"><a title=\"Informacion Proyecto\" href=\"verificar_datos.php?".$params_flotante."\">" . $campo["codproyectogrado"] . "</a></div></td>\n";

                                    //$xhtml.= " <td>" . $campo["titulo"] 
                                    $xhtml.= "<td>" . $num_estudiantes . "</td>" . "</td>\n";
                                    $xhtml.= "<td>" . $titulo . "</td>" . "</td>\n";                                
                                }
                                echo $xhtml;
                                ?>
                            </tbody>
                        </table>
                    </div> <!-- /widget-content -->					
                </div> <!-- /widget -->		
            </div>
        </div> <!-- /widget-content -->					
    </div> <!-- /widget -->		
</div>