<?php
    if(!isset($id_security)) {
        echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";exit();
    }
    $message = "";
    if (isset($_GET["msg"])){
        $message = utf8_encode(($_GET["msg"]));
    }
?>
<div class="middle-box text-center animated fadeInDown">
     <div class="ibox-content">
    <h2>Acceso Denegado</h2>
    <h3 class="font-bold"><?php echo $message;?></h3>

    <div class="error-desc">
        Sistema de seguridad de la plataforma Activo.<br/>
        Ir a la página de inicio de sesión: <p><br/></p><a href="login.php" class="btn btn-primary block full-width m-b">Acceso</a>
    </div>
     </div>
</div>
