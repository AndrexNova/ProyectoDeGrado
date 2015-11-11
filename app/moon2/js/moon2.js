
function trim(myString) {
    return myString.replace(/^\s+/g, "").replace(/\s+$/g, "");
}

function managedProccess(frm) {
    var obj = $("#" + frm.id);
    if (moon2_process(obj)) {
        return true;
    }
    return false;
}

//Flotante eliminar - Inicio
$(function () {
    $('#myModalDelete').on('show.bs.modal', function(e) {
        var url = e.relatedTarget.name;
        var titulo = e.relatedTarget.title;
        var $this = $(this);
        $this.find('.edit-content').html(titulo);
        
        $("#myModalDelete button.btn-primary").on("click", function(e) {
            deleteProcess(url);
            //$("#myModalDelete").modal('hide');
        });

    });
});
//Flotante eliminar - Fin

function deleteProcess(url){
    var obj = $("<form>");
    obj.attr("method", "GET");
    obj.attr("action", url);
    moon2_process(obj);
}

//Moon2 model for processing forms and hyperlinks start
//*****************************************************************************
function moon2_process(obj) {
    var path = "";
    var method = obj.attr("method");
    method = method.toLowerCase();
    switch (method) {
        case "post":
            path = javaPath + "/process/processform.php";
            obj.attr("action", path);
            return true;
            break;
        case "get":
            var parameters = obj.attr("action");
            var newpath = javaPath + "/process/processurl.php?";
            location.href = newpath + parameters;
            break;
        case "ajax":
            path = javaPath + "/process/processform.php";
            return path;
            break;
        default:
            alert("There is no Method defined");
    }
    return false;
}
//*****************************************************************************
//Moon2 model for processing forms and hyperlinks end


//pagination start
//*****************************************************************************

//*****************************************************************************
//pagination end

//Begin: Show float message
//*****************************************************************************
function mensajeFlotante(tipo, titulo, mensaje){
    var $showDuration = 400;
    var $hideDuration = 1000;
    var $timeOut = 7000;
    var $extendedTimeOut = 1000;
    var $showEasing = "swing";
    var $hideEasing = "linear";
    var $showMethod = "fadeIn";
    var $hideMethod = "fadeOut";
    toastr.options = {
     closeButton: 'checked',
     progressBar: 'checked',
     positionClass: 'toast-bottom-right',
     onclick: null
    };

    toastr[tipo](mensaje, titulo);
}
//*****************************************************************************
//End: Show float message

