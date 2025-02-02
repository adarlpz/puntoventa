/********************************************************************/
function establece_caja() {
    $.ajax({
        beforeSend: function() {},
        url: 'establece_caja.php',
        type: 'POST',
        data: 'caja=' + $("#numcaja").val(),
        success: function(x) {
            window.location = '/electron-products-test-master/src/views/parameters-preset-box.php';
        },
        error: function(jqXHR, estado, error) {
            $("#btn-caja").html('Hubo un error: ' + estado + ' ' + error);
            alert("Hubo un error al establecer el numero de caja, contacte a soporte inmediatamente...!");
        }
    });
}
/********************************************************************/
function establece_name_empresa() {
    $.ajax({
        beforeSend: function() {},
        url: 'estabelece_name_empresa.php',
        type: 'POST',
        data: 'name=' + $("#nombre_empresa").val() + '&dom=' + $("#dom_empresa").val(),
        success: function(x) {
            alert("Se establecio el nombre de la empresa correctamente...!");
            window.location = 'parametros.php';
        },
        error: function(jqXHR, estado, error) {
            $("#btn-name").html('Hubo un error: ' + estado + ' ' + error);
            alert("Hubo un error al establecer el nombre de la empresa, contacte a soporte inmediatamente...!");
        }
    });
}
/*****************************************************************************/
function registra_usr() {
    if ($("#nombre").val() == "" || $("#clave").val() == "" || $("#pass").val() == "") {
        window.location = "http://localhost/electron-products-test-master/src/views/error_phone_register.php";
        $("#nombre").focus();
    } else {
        $.ajax({
            beforeSend: function() {},
            url: 'registra_phones.php',
            type: 'POST',
            data: 'nombre=' + $("#nombre").val() + '&clave=' + $("#clave").val() + '&pass=' + $("#pass").val(),
            success: function(x) {
                if (x != '0') {
                    window.location = "http://localhost/electron-products-test-master/src/views/phone_register.php";
                }
                pone_users_registrados();
                pone_users_registrados_select();
            },
            error: function(jqXHR, estado, error) {
                $("#btn-reg-usr").html('Hubo un error: ' + estado + ' ' + error);
                alert("Hubo un error al registrar el usuario, contacte a soporte inmediatamente...!");
            }
        });
    }
}
/***********************************************************************************/
function pone_users_registrados() {
    $.ajax({
        beforeSend: function() {
            $("#users_registrados").html("<img src='dist/img/default.gif'></img>");
        },
        url: 'pone_phones.php',
        type: 'POST',
        data: null,
        success: function(x) {
            $("#users_registrados").html(x);
        },
        error: function(jqXHR, estado, error) {
            $("#users_registrados").html('Hubo un error: ' + estado + ' ' + error);
            alert("Hubo un error al consultar usuarios registrados, contacte a soporte inmediatamente...!");
        }
    });
}
/*******************************************************************************/