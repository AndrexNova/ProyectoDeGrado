//Validación de formulario adjuntar - Inicio
//jQuery(document).ready(function(){
//    $("#frm_radicar").validationEngine();
//    $("#codmodalidadgrado").hide();
//    $("#recibos").hide();
//    $(document).on('click', '#cambiarmodalidad', function (e) {
//            $("#codmodalidadgrado").show();
//    });
//     $(document).on('click', '#nuevorecibo', function (e) {
//            $("#recibos").show();
//    });
//    $(document).on('click', '#btnBuscarPart', function (e) {
//        var valor = $("#docu").val();
//        buscar_participante(valor);
//    });
//});

function verificar(){
    var obj_formulario = $("#frm_radicar");
        if (moon2_process(obj_formulario)){
            return true;
        }
    
    return false;
}

function verificardatos(){
    var obj_formulario = $("#frm_usuarios");
 
        if (moon2_process(obj_formulario)){
            return true;
        }
  
    return false;
}
function verificaradjunto(){
    var obj_formulario = $("#frm_radicar2");

        if (moon2_process(obj_formulario)){
            return true;
        }
    return false;
}

function verificarnuevo(){
    var obj_formulario = $("#form1");
    if (obj_formulario.validationEngine('validate')){
        if (moon2_process(obj_formulario)){
            return true;
        }
    }
    return false;
}

function verificarfin(){
    var obj_formulario = $("#form_fin");
    if (obj_formulario.validationEngine('validate')){
        if (moon2_process(obj_formulario)){
            return true;
        }
    }
    return false;
}
//Validación de formulario adjuntar - Fin

//Flotante - ver consignaciones
$(function() {
    $(document).on('click', 'a.flotante_consignacion', function (e) {
            e.preventDefault();
            var $this = $(this);
            var horizontalPadding = 20;
            var verticalPadding = 20;
            $('<iframe id="xflotante" src="' + this.href + '" />').dialog({
                    title: ($this.attr('title')) ? $this.attr('title') : 'Moon2',
                    autoOpen: true,
                    width: 970,
                    height: 500,
                    modal: true,
                    resizable: false,
                    hide: "clip",
                    show: "puff"
            }).width(970 - horizontalPadding).height(500 - verticalPadding);
    });
});
//Flotante - ver formatos disponibles - FIN

//Flotante eliminar consignacion - Inicio
$(function () {
    $(document).on('click', 'a.msgbox-confirm', function (e) {
            e.preventDefault();
            var $this = $(this);
            var txt = $this.attr('title');
            $.msgbox("¿ Está seguro que desea borrar el registro ? <br />" +txt, {
              type: "confirm",
              buttons : [
                {type: "submit", value: "Aceptar"},
                {type: "cancel", value: "Cancelar"}
              ]
            },  function(result) {
                    if (result == "Aceptar"){
                        var obj = $("<form>") 
                        obj.attr("method", "GET");
                        obj.attr("action", $this.attr('href'));
                        moon2_process(obj);
                    }
                    //$("#result2").text(result);
                });
    });
});
//Flotante eliminar consignacion - Fin
//***********************************************************************************************************
//Buscar Estudiante - Inicio
function buscar_participante(documento){
    var obj = $("<form>");
    obj.attr("method", "ajax");
    pagina = moon2_process(obj);

    var parametros = {
            "doc" : documento,
            "action" : 'busqUsuario',
            "controller": 'Trabajosdegrado/ProyectosGradoController'
    };
    $.ajax({
            data:  parametros,
            url:   pagina,
            type:  'post',
            beforeSend: function () {
                //$("#resultado").html("Procesando...");
                //SI es muy demorada la consulta se puede habilitar esta parte para que salga
                //un icono haciendo simulando que está haciendo la busqueda
            },
            success:  function (response) {
                var objeto = $.parseJSON(response);
                confirmar_agregar(documento, objeto.salida, pagina);
            },
            error: function(response){
                $.msgGrowl ({type: 'error', title: 'Error:', text: response.responseText});
            }
    });
}
//Buscar Estudiante - FIN


function confirmar_agregar(valor, texto, pagina) {
    var txt = texto + " ?";
    $.msgbox("¿ Está seguro que desea asociar a <br />" +txt, {
      type: "confirm",
      buttons : [
        {type: "submit", value: "Aceptar"},
        {type: "cancel", value: "Cancelar"}
      ]
    },  function(result) {
            if (result == "Aceptar"){
                agregar_participante(valor, pagina);
            }
        });
}

function agregar_participante(doc, pagina){
    var cod_proyectogrado = $("#codproyectogrado").val();
    var parametros = {
            "codproy": cod_proyectogrado,
            "doc" : doc,
            "tipo": 6,
            "action" : 'AgregarParticipante',
            "controller": 'Trabajosdegrado/ProyectosGradoController'
    };
    $.ajax({
            data:  parametros,
            url:   pagina,
            type:  'post',
            success:  function (response) {
                $.msgGrowl ({type: 'success', title: 'Operación Exitosa:', text: 'El registro fue agregado con éxito'});
                $("#tblParticipantes tbody:last").append(response);
            },
            error: function(response) {
                $.msgGrowl ({type: 'error', title: 'Fallo en operación:', text: 'El registro NO fue agregado'});
            }
    });
}