<?php
if (!isset($DOM["SECURITY_ID"])) {
    echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";
    exit();
}
?>  
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">                  
                    <!--contenedor separacion-->                      
                    <div class="ibox-title">
                        <h5></h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="melleva">
                                <thead>
                                    <?php echo $Face->headerTable($arr_cabeceras_tabla, $order, $Params); ?>
                                </thead>
                                <tbody>
                                    <?php
                                    $xhtml = "";
                                    $Url = clone $Params;
                                    $controller = "Modules_BancoProyectos_Controllers_TemasController";
                                    foreach ($arr_temas as $indice => $campo) {
                                        $id_fila = $campo["codtema"];
                                        $titulo = $campo["titulo"];
                                        $Modalidad = $campo["nombremodalidad"];
                                        $descripcion = $campo["descripcion"];
                                        $docente = $campo["nombrecompleto"];
                                        $tematica = $campo["tematica"];
                                        $gropoInv = $campo["grupodeinvestigacion"];


                                        $Url->add("codtema", $id_fila);
                                        $params_formatos = $Url->keyGen();

                                        $xhtml.= "<tr id=\"" . $id_fila . "\">\n";
                                        $xhtml.= "<td>{$titulo}</td>";
                                        $xhtml.= "<td>{$Modalidad}</td>";
                                        $xhtml.= "<td>{$descripcion}</td>";
                                        $xhtml.= "<td>{$docente}</td>";
                                        $xhtml.= "<td>{$tematica}</td>";
                                        $xhtml.= "<td>{$gropoInv}</td>";
                                        $xhtml.= "</tr>\n";
                                    }
                                    echo $xhtml;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--contenedor separacion fin-->
                </div>
            </div>
        </div>
    </div>
</div>


