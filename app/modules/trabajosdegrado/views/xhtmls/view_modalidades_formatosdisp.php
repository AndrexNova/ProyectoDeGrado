<?php
if (!isset($DOM["SECURITY_ID"])) {
    echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";
    exit();
}
?>
<?php
echo $Tabulador->show();
?>
<div class="tab-content">
    <?php
    echo $Tabulador->step_header("Formatos Disponibles");
    require("tab01_modformatosdis.php");
    echo $Tabulador->step_footer();

    echo $Tabulador->step_header("Agregar Formatos");
    require("tab02_modformatosdis.php");
    echo $Tabulador->step_footer();
    ?>
</div>

