$(document).ready(function(){
    $("#nombre").focus();
    $(document).on('click', '#btnCerrar', function (e) {
        e.preventDefault();
        window.parent.$('#xflotante').dialog('destroy');
        return false;
    });
});

//Validación de formularios con ajax- Inicio
function checkform_ajax(idFrm){
    var obj = $("#" + idFrm +"");
    if (obj.validationEngine('validate')){
        var action = $("#action").val();
        ruta = moon2_process(obj);
        editar_fila(ruta);
    }
    return false;
}
//Validación de formularios con ajax- Fin


//Actualizar con ajax - Inicio
function editar_fila(pagina){
    var parametros = $("#frm_empresas").serialize();
    $.ajax({
            data:  parametros,
            url:   pagina,
            type:  'post',
            beforeSend: function () {
                    //$("#resultado").html("Procesando...");
            },
            success:  function (response) {
                    console.log("Correcto");
                    codfila = $("#codempresa").val();
                    window.parent.$("#" + codfila).replaceWith(response);
                    window.parent.$.msgGrowl ({type: 'success', title: 'Operación AJAX Exitosa:', text: 'La empresa fue actualizada con éxito'});
                    window.parent.$('#xflotante').dialog('destroy');
            },
            error: function(response) {
                console.log("Error en la actualización de la empresa " + response);
            }
    });
}
//Actualizar con ajax - Fin