<?php
    if(!isset($DOM["SECURITY_ID"])) {
        echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";exit();
    }
?>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="widget stacked">
                    <br />
                    <div class="widget-header">
                        <i class="icon-list"></i>
                        <h3>Visualizar recibo de pago</h3>
                    </div> <!-- /widget-header -->
                    <div class="widget-content">
                    <?php 
                    $Archivo->imagePreview($nombre_archivo, $ruta_fisica_completa, $tipo, $tamanno);
                    ?>
                    </div> <!-- /widget-content -->
                </div> <!-- /widget -->						
            </div> <!-- /span12 -->     	
        </div> <!-- /row -->
    </div> <!-- /container -->
</div> <!-- /main -->
