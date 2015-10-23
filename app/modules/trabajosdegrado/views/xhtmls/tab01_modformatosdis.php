<?php
    if(!isset($DOM["SECURITY_ID"])) {
        echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";exit();
    }
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="4%">&nbsp;</th>
            <th width="42%">Nombre</th>
            <th width="18%">Version</th>
            <th width="23%">Tamaño</th>
            <th width="13%">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $xhtml = "";
            $Url = clone $Params;
            $controller = "Modules_Trabajosdegrado_Controllers_ModalidadesGradoController";
            foreach ($filas as $codformato => $campo){
                $nombre_formato = $campo["nombreformato"];
                $descripcion = $campo["descripcion"];
                $version = $campo["version"];
                $formatocodificado = $campo["formatocodificado"];
                $extension = $Archivo->icon($nombre_formato);
                $tamanno = $Archivo->sizeFortmat($campo["tamanno"]);
                $cantidad_veces_utiliza = $campo["utilizados"];

                $Url->add("action", "borrarFormato");
                $Url->add("controller", $controller);
                $Url->add("codmodalidad", $cod_modalidadgrado);
                $Url->add("codformato", $codformato);
                $params_borrar = $Url->keyGen();

                $img_borrar = "<a title=\"BORRAR el formato: {$nombre_formato}\" class=\"msgbox-confirm\" href=\"{$params_borrar}\"><i class=\"fa fa-trash-o text-navy\"></i></a>";
                if ($cantidad_veces_utiliza != 0){
                    $img_borrar = "<a title=\"No se puede borrar\" href=\"#\"><i class=\"fa fa-trash-o text-navy\"></i></a>";
                }

                $Url->add("action", "asignar");
                $Url->add("controller", $controller);
                $Url->add("codmodalidad", $cod_modalidadgrado);
                $Url->add("codformato", $codformato);
                $params_agregar = $Url->keyGen();

                $xhtml.= "<tr>\n";
                $xhtml.= "<td><div align=\"center\"><img src=\"../../../images/doc_icons/{$extension}\" border=\"0\"></div></td>";
                $xhtml.= "<td>{$nombre_formato}</td>";
                $xhtml.= "<td>{$version}</td>";
                $xhtml.= "<td>{$tamanno}</td>";
                $xhtml.= "<td>";
                $xhtml.= "   <a href=\"#\" data-toggle=\"modal\" name=\"{$params_agregar}\" data-target=\"#myModalDelete\" title=\"Asignar : {$nombre_formato}\"><i class=\"fa fa-asterisk text-navy\"></i></a>";
                $xhtml.= "   ".$img_borrar;
                $xhtml.= "</td>";
                $xhtml.= "</tr>\n";
            }
            echo $xhtml;
        ?>
    </tbody>
</table>