$(document).ready(function(){
    $("#buscar").focus();
    $(document).on('click', '#btnCerrar', function (e) {
        e.preventDefault();
        window.parent.$('#xflotante').dialog('destroy');
        return false;
    });
});

function limpiarbusqueda(){   
    $("#buscar").val("");
    $("#buscar").focus();
}

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




//Flotante eliminar - Inicio
$(function () {
    $('#melleva').on('click', 'a.msgbox-confirm', function (e) {
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
                    if (result === "Aceptar"){
                        var obj = $("<form>") 
                        obj.attr("method", "GET");
                        obj.attr("action", $this.attr('href'));
                        moon2_process(obj);
                    }
                    //$("#result2").text(result);
                });
    });
});
//Flotante eliminar - Fin


//Flotante crear, editar - Inicio
$(function() {
    $(document).on('click', 'a.abrir_flotante', function (e) {
        e.preventDefault();
        var $this = $(this);
        var horizontalPadding = 20;
        var verticalPadding = 20;
        $('<iframe id="xflotantex" src="' + this.href + '" />').dialog({
                title: ($this.attr('title')) ? $this.attr('title') : 'Moon24',
                fluid: true,
                autoOpen: true,
                width: 810,
                height: 380,
                modal: true,
                resizable: false,
                hide: "clip",
                show: "puff",
                zIndex: 100000
        }).width(780 - horizontalPadding).height(350 - verticalPadding);
    });
});
//Flotante crear - Fin
$(document).ready(function(){
    $(document).on('click', '#openBtn', function (e) {
        e.preventDefault();
        var options = {
            "backdrop": "static",
            "show": true,
            "remote": "perfiles_crear.php"
        };

        $('#ventanaModal').modal(options);
        return false;
    });
  });
  
  
//VENTANA FLOTANTE CREAR
$(document).ready(function(){
    $('#VentanaFlotanteCrear').on('shown.bs.modal', function (e) {
        var src = $('#contenedorIframe').attr('data-iframe-src');
        $('#contenedorIframe').attr('src', src);
    });

    $('#VentanaFlotanteCrear').on('hidden.bs.modal', function (e) {
        $('#contenedorIframe').attr('src', '');
    });
});

//VENTANA FLOTANTE EDITAR
$(document).ready(function(){
    $('#VentanaFlotanteEditar').on('shown.bs.modal', function (e) {
        var src = $('#contenedorIframeeditar').attr('data-iframe-src');
        $('#contenedorIframeeditar').attr('src', src);
    });

    $('#VentanaFlotanteEditar').on('hidden.bs.modal', function (e) {
        $('#contenedorIframeeditar').attr('src', '');
    });
});




