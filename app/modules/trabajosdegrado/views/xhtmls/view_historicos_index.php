<?php
if (!isset($DOM["SECURITY_ID"])) {
    echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";
    exit();
}
?>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="widget stacked">
                    <div class="widget-header">
                        <i class="icon-list"></i>
                        <h3>INFORMACION</h3>
                    </div> <!-- /widget-header -->
                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table table-bordered table-highlight"m id="tbltarifas" name="tbltarifas">
                                <thead>
                                    <tr>
                                        <th width="15%">Fecha</th>
                                        <th width="10%">Estado</th> 
                                        <th width="10%">Cod proyecto</th>  
                                        <th width="20%">Comentario estado</th>       
                                        <th width="15%">Titulo</th> 
                                        <th width="20%">Tema</th> 
                                        <th width="10%">&nbsp;</th>
                                    </tr>
                                      <tbody>
                                <?php
                                $xhtml = "";
                                $Url = clone $Params;
                                foreach ($arr_modalidades as $indice => $campo) {
                                   $id_fila = $campo["codmodalidadgrado"];                                   
                                   $java_editar = "javascript:modo_edicion({$id_fila}, '" . $campo["nombremodalidad"] . "','" . $campo["valor"] . "');";
                                   
                                   $Url->add("codmodalidad", $id_fila);
                                    $params_formatos = $Url->keyGen();
                                    
                                    $xhtml.= "<tr id=\"" . $id_fila . "\">\n";
                                    $xhtml.= " <td>" . $campo["fecha"] . "</td>\n";
                                   
                                   
                                }
                                         ?>
                            </tbody>