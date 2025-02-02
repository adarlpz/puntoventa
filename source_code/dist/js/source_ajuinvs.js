/******************************************************************************/
function busca_articulo() {
    if ($("#codigo").val() != "") {
        $(document).ready(function() {
            $.ajax({
                beforeSend: function() {
                    $("#descripcion").html("Buscando informacion del articulo...");
                },
                url: 'busca_data_articulo2.php',
                type: 'POST',
                dataType: 'json',
                data: 'codigo=' + $("#codigo").val(),
                success: function(x) {
                    if (x == '0') {
                        window.location = "http://localhost/electron-products-test-master/src/views/articulo-none-inv.php";
                        $("#codigo").val("");
                        $("#codigo").focus();
                    } else {
                        $("#descripcion").val(x.descripcion);
                        $("#exis_anterior").val(x.cantidad);
                        $("#exis_actual").prop("disabled", false);
                        $("#exis_actual").select();
                        $("#exis_actual").focus();
                    }
                },
                error: function(jqXHR, estado, error) {
                    alert("Ocurrio un error al consultar la informacion del articulo...reporte a soporte...!    " + estado + "    " + error);
                }
            });
        });
    } else {}
}
/***************************************************************************************/
$(document).ready(function() {
    $(".cantidades").inputmask();
});
/****************************************************************************************/
function cancela() {
    $("#descripcion").val("Aqui aparece la descripcion...");
    $("#exis_anterior").val("");
    $("#exis_actual").val("");
    $("#exis_actual").prop("disabled", true);
    $("#codigo").val("");
    $("#codigo").focus();
}
/*****************************************************************************************/
function agrega_a_lista() {
    var tipo = '';
    var dif = 0.00;
    var articulo = $("#codigo").val();
    var descripcion = $("#descripcion").val();
    var existencia_nueva = $("#exis_actual").val();
    if (existencia_nueva == "") {
        existencia_nueva = 0.00;
    }
    var existencia_anterior = $("#exis_anterior").val();
    dif = parseInt(existencia_nueva) + parseInt(existencia_anterior);
    insertar = $("#lista_articulos_existencias > tbody").append("<tr id='" + articulo + "'><td class='center'>" + articulo + "</td><td class='center'>" + descripcion + "</td><td style='display:none;' class='center'>" + existencia_anterior + "</td><td class='center'>" + existencia_nueva + "</td><td style='display:none;' class='center'>" + dif + "</td><td class='center'>" + tipo + "</td><td class='center'><button style='background:transparent;border:0;position: relative;right: 100px; outline: none;' class='btn btn-danger elimina'><img src='css/imgs/failed-icon-de.svg' width='14' height='14'></button></td></tr>").hide();
    insertar.fadeIn(1000);
    cancela();
    $("#codigo").val("");
    $("#codigo").focus();
    $('#boton-add-list').prop('disabled', true);
}
/*******************************************************************************************/
function verifica_tabla_existencia() {
    $('#lista_articulos_existencias > tbody > tr').each(function() {
        var cod = $(this).find('td').eq(0).html();
        if ($("#codigo").val() == cod) {
            $("#" + cod).remove();
        }
    });
}
/****************************************************************************************/
function cancela_todo() {
    var removes = $("#lista_articulos_existencias > tbody:last").children().fadeOut(1000);
    removes.remove();
    cancela();
}
/********************************************************************************************/
function procesa_lista_ajustes() {
    var cuantos = 0;
    $("#lista_articulos_existencias > tbody > tr").each(function() {
        cuantos++;
    })
    if (cuantos > 0) {
        $("#btn_procesa").prop('disabled', true);
        $('#lista_articulos_existencias > tbody > tr').each(function() {
            var cod = $(this).find('td').eq(0).html();
            var can = $(this).find('td').eq(3).html();
            var tipo = $(this).find('td').eq(5).html();
            var dif = $(this).find('td').eq(4).html();
            if (tipo != '0') {
                window.location = "http://localhost/electron-products-test-master/src/views/right-registers-inv.php";
                $.ajax({
                    beforeSend: function() {},
                    url: 'procesa_ajuste.php',
                    type: 'POST',
                    data: 'codigo=' + cod + '&cantidad=' + can + '&tipo=' + tipo + '&diferencia=' + dif,
                    error: function(jqXHR, estado, error) {}
                });
            }
        });
        removes = $("#lista_articulos_existencias > tbody:last").children().fadeOut(1000);
        removes.remove();
        $("#btn_procesa").prop('disabled', false);
        pone_foco();
    } else {
        window.location = "http://localhost/electron-products-test-master/src/views/none-registers-inv.php";
    }
}
/******************************************************************************************/
$(function() {
    // Evento que selecciona la fila y la elimina
    $(document).on("click", ".elimina", function() {
        var parent = $(this).parents().parents().get(0);
        $(parent).fadeOut().remove();
    });
});
/*****************************************************************************************/
function lista_existencias() {
    $(document).ready(function() {
        $.ajax({
            beforeSend: function() {
                $("#lista_existenias").html('<b>Actualizando lista de articulos...</b>');
            },
            url: 'lista_existencias.php',
            type: 'POST',
            data: null,
            success: function(x) {
                $("#lista_existencias").html(x);
                $("#tabla_existencias").dataTable();
            },
            error: function(jqXHR, estado, error) {}
        });
    });
}