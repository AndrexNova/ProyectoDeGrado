<?php
    if(!isset($id_security)) {
        echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";exit();
    }
    $txtHtml = "";
    if (isset($_GET["msg"])){
        $message = utf8_encode(($_GET["msg"]));
        $txtHtml = "<div class=\"alert alert-info alert-dismissable\">";
        $txtHtml.= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>";
        $txtHtml.= $message;
        $txtHtml.="</div>";
    }
?>
<div class="loginColumns animated fadeInDown">
    <div class="row">
        <div class="col-md-6">
            <h2 class="font-bold">Bienvenido a CssPos 1.0</h2>
            <p style="text-align: justify;">
                Sistema pos basado en multiempresa con el fin de facilitarle la gestion de las ventas que su empresa necesita, permite llevar un inventario real de todos sus productos, generar facturas en multiples formatos ademas le permitira generar un numeroso paquete de reportes que le facilitaran la toma de desiciones en su organizacion.
            </p>
            <p style="text-align: justify;">
               Plataforma desarrollada en php con ayuda de framework tales como MOON 2.4, JQUERY ,BOOTSTRAP, LESS.
            </p>
        </div>
        <div class="col-md-6">
            <div class="ibox-content">
                <?php echo $txtHtml;?>
                <form class="m-t" role="form" id="frmAcceso" name="frmAcceso" method="post" action="moon24.php" onSubmit="javascript:sendData(this);">
                    <input type="hidden" id="action" name="action" value="login" />
                    <input type="hidden" id="SECURITY_ID" name="SECURITY_ID" value="enabled" />
                    <input type="hidden" id="controller" name="controller" value="krauff/usuarioscontroller" />
                    <div class="form-group">
                        <input type="email" name="usu" id="usu" class="form-control" placeholder="Usuario" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" name="cla" id="cla" class="form-control" placeholder="Clave" required="">
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Acceso</button>
                    <button type="submit" class="btn btn-primary block full-width m-b">Otro</button>

                </form>
                <p class="m-t">
                    <small>Plataforma creada con MOON <sup>2.4</sup>  &copy; 2015</small>
                </p>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            Copyright Compustore Solutions
        </div>
        <div class="col-md-6 text-right">
           <small>© 2014-2015</small>
        </div>
    </div>
</div>