
<?php
if (!isset($DOM["SECURITY_ID"])) {
    echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";
    exit();
}
?>
<div class="main">
    <div class="col-md-12">
        <div class="widget stacked">
            <br />

            <div class="widget-content">
                <?php
                echo $Tabulador->show();
                ?>
                <div class="tab-content">
                    <?php
                    echo $Tabulador->step_header("Registro");
                    require("tab03_paso1.php");
                    echo $Tabulador->step_footer();

                    echo $Tabulador->step_header("Datos Personales");
                    require("tab05_paso3.php");
                    echo $Tabulador->step_footer();

                    echo $Tabulador->step_header("Datos de la Modalidad");
                    require("tab06_paso4.php");
                    echo $Tabulador->step_footer();


                    echo $Tabulador->step_header("Finalizar");
                    require("tab07_paso5.php");
                    echo $Tabulador->step_footer();
                    ?>
                </div>
            </div> <!-- /widget-content -->
        </div> <!-- /widget -->						
    </div> <!-- /col-md-12 -->
</div> <!-- /main -->
