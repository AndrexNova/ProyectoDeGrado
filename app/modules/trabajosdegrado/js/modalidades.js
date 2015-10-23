//Validación de formularios - Inicio
jQuery(document).ready(function(){
    $("#btnCancel").click(function(){
        modo_creacion();
    });
});

//Inicio: Función que se ejecuta al momento de enviar el formulario
function verificar(){
    var obj_formulario = $("#frm_modalidades");
    var action = $("#action").val();
    ruta = moon2_process(obj_formulario);
    if (action === "crear"){
        agregar_fila(ruta);
    }else{
        editar_fila(ruta);
    }
    return false;
}
//Fin: Función que se ejecuta al momento de enviar el formulario

//Inicio: Flotante eliminar AJAX
$(function () {
    $('#myModalDeleteAjax').on('show.bs.modal', function(e) {
        var url = e.relatedTarget.name;
        var titulo = e.relatedTarget.title;
        var $this = $(this);
        $this.find('.edit-content').html(titulo);
        
        $("#myModalDeleteAjax button.btn-primary").on("click", function(e) {
            //Obligatoria para prevenir la repetición MOON23
            $("#myModalDeleteAjax button.btn-primary").off("click");
            $('#myModalDeleteAjax').modal('hide');
            borrar_fila(url)
        });
    });
});
//Fin: Flotante eliminar AJAX

function modo_creacion(){
    $("#action").val("crear");
    $("#btnAction").text("Crear");
    $("#codmodalidadgrado").val("");
    $("#nombremodalidad").val("");
    $("#valor").val("");
    $("input[name=asocompanero][value='true']").prop('checked', false);
    $("input[name=asocompanero][value='false']").prop('checked', false);
}

function modo_edicion(id, nombre_modalidad, valor, asocompa){
    $("#action").val("editar");
    $("#btnAction").text("Actualizar");
    //Campos
    $("#codmodalidadgrado").val(id);
    $("#nombremodalidad").val(nombre_modalidad);
    $("#valor").val(valor);
    $("input[name=asocompanero][value=" + asocompa + "]").prop('checked', true);
}

//Proceso ajax - Inicio
function agregar_fila(pagina){
    var parametros = $("#frm_modalidades").serialize();
    $.ajax({
            data:  parametros,
            url:   pagina,
            type:  'post',
            beforeSend: function () {
                //$("#resultado").html("Procesando...");
            },
            success:  function (response) {
                console.log("Correcto");
                $("#tbltarifas tbody:last").append(response);
                modo_creacion();
                mensajeFlotante("success", "Operación Exitosa:", "El registro fue agregado con éxito");
            },
            error: function(response) {
                mensajeFlotante("error", "Fallo en operación:", "El registro NO fue agregado");
                console.log("Error en el registro de la información" + response);
            }
    });
}

function borrar_fila(codfila){
    var obj = $("<form>");
    obj.attr("method", "ajax");
    pagina = moon2_process(obj);

    var parametros = {
            "codmodalidadgrado" : codfila,
            "action" : 'eliminar',
            "controller": 'Trabajosdegrado/ModalidadesGradoController'
    };
    $.ajax({
            data:  parametros,
            url:   pagina,
            type:  'post',
            beforeSend: function () {
                    //$("#resultado").html("Procesando...");
            },
            success:  function (response) {
                console.log("Correcto");
                $("#" + codfila).remove();
                modo_creacion();
                mensajeFlotante("success", "Operación Exitosa:", "La modalidad fue ELIMINADA con éxito");
            },
            error: function(response) {
                mensajeFlotante("error", "Fallo en operación:", "El registro NO fue eliminado");
                console.log("Error en el proceso de borrado" + response);
            }
    });
}

function editar_fila(pagina){
    var parametros = $("#frm_modalidades").serialize();
    $.ajax({
            data:  parametros,
            url:   pagina,
            type:  'post',
            beforeSend: function () {
                    //$("#resultado").html("Procesando...");
            },
            success:  function (response) {
                console.log("Correcto");
                codfila = $("#codmodalidadgrado").val();
                $("#" + codfila).replaceWith(response);
                modo_creacion();
                mensajeFlotante("success", "Operación Exitosa:", "La modalidad fue actualizada con éxito");
            },
            error: function(response) {
                mensajeFlotante("error", "Fallo en operación:", "El registro NO fue actualizado");
                console.log("Error en la actualización de la información" + response);
            }
    });
}
//Proceso ajax - Fin