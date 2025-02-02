/************************************************************/
function pone_lineas() {
    $(document).ready(function() {
        $.ajax({
            beforeSend: function() {
                $("#pone_lineas").html("Recuperando lista de lineas...");
            },
            url: 'pone_lineas.php',
            type: 'POST',
            data: null,
            success: function(x) {
                $("#pone_lineas").html(x);
                $(".select2").select2();
            },
            error: function(jqXHR, estado, error) {}
        });
    });
}

function alta_deuda() {
    var nombre = $("#tareaInput").val();
    var monto = $("#montoInput").val();
    $.ajax({
        beforeSend: function() {

        },
        url: 'save_deuda.php',
        type: 'POST',
        data: 'nombre=' + nombre + '&monto=' + monto,
        /**************************/
        error: function(jqXHR, estado, error) {
            var n = noty({
                text: "Ocurrio un error al registrar el articulo, consulte a Soporte...!",
                theme: 'relax',
                layout: 'center',
                type: 'information',
            });
        }
    });
}
/*******************************************************************************************/
function elimina_deuda() {
    var n = noty({
        text: "Seguro que desea eliminar el articulo...?",
        theme: 'relax',
        layout: 'center',
        type: 'information',
        buttons: [{
                addClass: 'btn btn-primary',
                text: 'Si',
                onClick: function($noty) {
                    $noty.close();
                    $.ajax({
                        beforeSend: function() {

                        },
                        url: 'delete_articulo.php',
                        type: 'POST',
                        data: 'codigo=' + $("#codigo_busqueda").val(),
                        success: function(x) {
                            var n = noty({
                                text: "Se elimino la informacion del articulo...!",
                                theme: 'relax',
                                layout: 'center',
                                type: 'information',
                                timeout: 2000,
                            });
                            cancela_eliminacion();
                            lista_articulos();
                        },
                        error: function(jqXHR, estado, error) {}
                    });
                }
            },
            {
                addClass: 'btn btn-danger',
                text: 'No',
                onClick: function($noty) {
                    $noty.close();

                }
            }
        ]
    });
}
/********************************************************************************/
function anular(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    return (tecla != 13);
}
/*****************************************************************************/
function lista_deudas() {
    $(document).ready(function() {
        $.ajax({
            beforeSend: function() {
                $("#lista_articulos").html('<b>Actualizando lista de articulos...</b>');
            },
            url: 'lista_articulos.php',
            type: 'POST',
            data: null,
            success: function(x) {
                $("#lista_articulos").html(x);
                $("#tabla_articulos").dataTable();
            },
            error: function(jqXHR, estado, error) {}
        });
    });
}
/**********************************************************************************/