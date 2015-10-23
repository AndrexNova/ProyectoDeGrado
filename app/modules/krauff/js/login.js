jQuery(document).ready(function () {
    $("#usu").focus();
});

function sendData(frm) {
    var obj = $("#" + frm.id);
    if (moon2_process(obj)) {
        var pass = hex_md5($('#cla').val());
        $('#cla').val(pass);
        return true;
    }
    return false;
}