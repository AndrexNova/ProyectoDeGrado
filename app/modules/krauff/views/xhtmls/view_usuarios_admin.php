<?php
if (!isset($DOM["SECURITY_ID"])) {
    echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";
    exit();
}
$Paginador = new Moon2_Pagination_Pager($rsNumRows, $limit_numrows, $num_page, $Params);
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-7 m-b-xs">
                            <a href="usuarios_crear.php"><button class="btn btn-primary dim" type="button" title="Nuevo"><i class="fa fa-plus-square"></i></button></a>
                            <?php echo $Paginador->showDetails(); ?>
                        </div>
                        <?php
                        if ($cantidad_filas > 0) {
                            ?>
                            <!--Buscador de Registros-->    
                            <form id="frm_usuarios" name="frm_usuarios" method="post" action="moon2.php" onSubmit="javascript:return managedProccess(this);"> 
                                <input type="hidden" id="action" name="action" value="buscar" />
                                <input type="hidden" id="controller" name="controller" value="krauff/usuarioscontroller" />
                                <div class="col-sm-2 m-b-xs">
                                    <?php echo $Formulario->addObject("MenuList", "nomcampos", $DOM["COMBOUSUARIOS"], $combo_campos, "onchange=\"javascript:limpiarbusqueda();\" class='form-control' style='cursor:pointer;'") ?>
                                </div>      
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <input type="text" placeholder="Buscar" class="input-sm form-control" name="buscar" id="buscar" value="<?php echo $caja_busqueda; ?>"> <span class="input-group-btn">
                                            <button type="submit" class="btn btn-sm btn-primary"> Ir!</button></span>
                                    </div>
                                </div>
                            </form>
                        </div>    
                        <!--Finaliza el Buscador de Registros--> 
                        <div class="table-responsive">
                            <table id="melleva" class="table table-bordered">
                                <?php echo $Face->headerTable($arr_cabeceras_tabla, $order, $Params); ?>
                                <tbody>
                                    <?php
                                    $xhtml = "";
                                    $Url = clone $Params;
                                    $controller = "Modules_Krauff_Controllers_UsuariosController";
                                    foreach ($filas as $indice => $campo) {
                                        $id_fila = $campo["codusuario"];
                                        $cod_usuario = $campo["codusuario"];
                                        $nombre_perfil = $campo["nombreperfil"];
                                        $genero = $DOM["GENERO"][$campo["genero"]];
                                        $nombres_usuario = $campo["nombres"];
                                        $tipo_documento = $DOM["TIPODOC"][$campo["tipodoc"]];
                                        $documento = $campo["documento"];
                                        $usuario = $campo["nombreusuario"];
                                        
                                        $Url->add("action", "eliminar");
                                        $Url->add("controller", $controller);
                                        $Url->add("codusuario", $cod_usuario);
                                        $params_eliminar = $Url->keyGen();

                                        $Url->add("action", "actualizar");
                                        $Url->add("codusuario", $cod_usuario);
                                        $params_actualizar = $Url->keyGen();

                                        $Url->add("codusuario", $cod_usuario);
                                        $params_funcionalidades = $Url->keyGen();

                                        $xhtml.= "<tr id=\"" . $id_fila . "\">\n";
                                        $xhtml.= "<td>{$cod_usuario}</td>";
                                        $xhtml.= "<td>{$nombre_perfil}</td>";
                                        $xhtml.= "<td>{$nombres_usuario}</td>";
                                        $xhtml.= "<td>{$tipo_documento}</td>";
                                        $xhtml.= "<td>{$documento}</td>";
                                        $xhtml.= "<td>{$usuario}</td>";
                                        $xhtml.= "<td>";
                                        $xhtml.= "   <a title=\"Editar Usuario\" href=\"usuarios_editar.php?{$params_actualizar}\"><i class=\"fa fa-edit\"></i></a>";
                                        $xhtml.= "   <a href=\"#\" data-toggle=\"modal\" name=\"{$params_eliminar}\" data-target=\"#myModalDelete\" title=\"Eliminar : {$nombres_usuario}\"><i class=\"fa fa-trash-o text-navy\"></i></a>";
                                        $xhtml.= "</td>";
                                        $xhtml.= "</tr>\n";
                                    }
                                    echo $xhtml;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <?php echo $Paginador->showNavigation(); ?>
                        <?php
                    } else {
                        ?>
                        <div class="alert alert-warning alert-dismissable">
                            <button data-dismiss="alert" class="close" type="button">×</button>
                            <strong>ADVERTENCIA: </strong> No se encontraron Registros.
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
