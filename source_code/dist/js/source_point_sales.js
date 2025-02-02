/*FUNCIONES PARA EL PUNTO DE VENTA*/
/************************************************************************************/
function busca_articulo() {
    $(document).ready(function() {
        var cod = $("#codigo").val().trim();
        if (cod.trim() != "") {
            $(document).ready(function() {
                $.ajax({
                    beforeSend: function() {
                        $("#data_articulo").html("Buscando informacion del articulo...");
                    },
                    url: 'busca_data_articulo_pventa.php',
                    dataType: 'json',
                    type: 'POST',
                    data: 'codigo=' + $("#codigo").val(),
                    success: function(data) {
                        if (data == 0) {
                            window.location = "http://localhost/electron-products-test-master/src/views/articulo-none-point.php";
                            $("#codigo").val("");
                            $("#codigo").focus();
                            $("#cantidad").attr("disabled", true);
                            $("#preciou").attr("disabled", true);
                        } else {
                            $(".widget-user-desc").html(data[0].descripcion);
                            $(".exis").html(data[0].cantidad);
                            $(".preciol").html(data[0].precio);
                            $("#preciou").attr("disabled", false);
                            $("#costou").attr("disabled", false);
                            //$('#preciou').number(true, 2);
                            $("#preciou").val(data[0].precio);
                            $("#costou").val(data[0].costo);
                            //$('#cantidad').number(true, 2);
                            $("#cantidad").val(1.00);
                            $("#preciou").select();
                            $("#preciou").focus();
                            $("#costou").select();
                            $("#costou").focus();
                            if (data[0].imagen != "") {
                                $("#imagen").attr("src", 'img_articulos/' + data[0].imagen);
                            } else {
                                $("#imagen").attr("src", 'dist/img/sin_foto.png');
                            }
                            if (data[0].cantidad <= 0) {
                                alert("No hay suficiente existencia...!")
                                $("#codigo").val("");
                                $("#codigo").focus();
                                $("#cantidad").attr("disabled", true);
                                $("#preciou").attr("disabled", true);
                            }
                        }
                    },
                    error: function(jqXHR, estado, error) {
                        alert("Parece ser que hay un error por favor, reportalo a Soporte inmediatamente...!");
                    }
                });
            });
        } else {}
    })
}
/*************************************************************************************/
var numero = 0;

function agrega_a_lista() {
    $(document).ready(function() {
        if ($("#cantidad").val() > 0) {
            var articulo = $("#codigo").val();
            var descripcion = $(".widget-user-desc").html();
            var precio = $("#preciou").val();
            var cantidad = 1.00;
            var costo = $("#costou").val();
            var monto = cantidad * precio;
            var montocosto = cantidad * costo;
            var num = ++numero;
            $("#tabla_articulos > tbody").append("<tr class='tr" + num + "'><td class='center'>" + descripcion + "</td><td class='center'>" + articulo + "</td><td class='center'>" + cantidad + "</td><td class='center'>" + precio + "</td><td class='center'>" + monto.toFixed(2) + "</td><td class='center'>" + montocosto.toFixed(2) + "</td><td class='center'><button style='background: transparent;position: relative;left:-42px;outline:none;' class='btn btn-block btn-xs delete style='width: 70px' '><img src='css/imgs/failed-icon-de.svg' width='14' height='14'></button></td></tr>");
            $("#codigo").val("");
            $("#cantidad").val("");
            $("#preciou").val("");
            $("#cantidad").attr("disabled", true);
            $("#preciou").attr("disabled", true);
            $("#codigo").focus();
            /*cancela_operacion();*/
            $("#imagen").attr("src", 'dist/img/sin_foto.png');
            resumen();
        }
    })
}
/******************************************************************************************/
$(function() {
    // Evento que selecciona la fila y la elimina
    $(document).on("click", ".delete", function() {
        var parent = $(this).parents().parents().get(0);
        $(parent).remove();
        resumen();
    });
});
/****************************************************************************************/
function pone_num_venta() {
    $(document).ready(function() {
        $.ajax({
            beforeSend: function() {
                $("#num_ticket").html("Buscando...");
            },
            url: 'busca_ticket.php',
            type: 'POST',
            data: 'caja=' + $("#ncaja").val(),
            success: function(x) {
                $("#num_ticket").html("Numero De Caja: " + $("#ncaja").val());
            },
            error: function(jqXHR, estado, error) {
                $("#num_ticket").html('Hubo un error: ' + estado + ' ' + error);
            }
        });
    });
}
/*****************************************************************************************/
function resumen() {
    $(document).ready(function() {
        var articulos = 0.00;
        var monto = 0.00;
        var montocosto = 0.00;
        $('#tabla_articulos > tbody > tr').each(function() {
            articulos += parseFloat($(this).find("td").eq(2).html());
            monto += parseFloat($(this).find('td').eq(4).html());
            montocosto += parseFloat($(this).find('td').eq(5).html());
        });
        $("#total_articulos").html("Cantidad De Articulos: " + articulos.toFixed(2));
        $("#total_venta").val(monto.toFixed(2));
        $("#costo_venta").val(montocosto.toFixed(2));
        $("#totales").val(monto.toFixed(2));
        $("#totalescostos").val(montocosto.toFixed(2));
        if (articulos > 0) {
            $("#btn-procesa").prop('disabled', false);
            $("#btn-cancela").prop('disabled', false);
        } else {
            $("#btn-procesa").prop('disabled', true);
            $("#btn-cancela").prop('disabled', true);
        }
    })
}
/********************************************************************************************/
function busca_cliente() {
    $(document).ready(function() {
        $("#modal_tabla_clientes").modal({
            show: true,
            backdrop: 'static',
            keyboard: false
        });
        $.ajax({
            beforeSend: function() {
                $("#lista_clientes").html("Cargando los clientes...");
            },
            url: 'lista_clientes.php',
            type: 'POST',
            data: null,
            success: function(x) {
                $("#lista_clientes").html(x);
                $(document).ready(function() {
                    $('#sample-table-3').DataTable();
                });
            },
            error: function(jqXHR, estado, error) {
                $("#lista_clientes").html('Hubo un error: ' + estado + ' ' + error);
            }
        });
    })
}
/*********************************************************************************************/
function pone_cliente(elid) {
    var client = elid;
    var idcl = client.split("|");
    $("#idcliente_credito").val(idcl[0]);
    $("#modal_tabla_clientes").modal('hide');
    $("#tipo_de_venta").html("<button class='btn btn-danger btn-xs' onclick='quita_cliente();'>Quitar</button> Venta de Credito a: " + idcl[1]);
    $("#btn_cre").attr('disabled', true);
    //window.alert(client);
}
/*********************************************************************************************/
function quita_cliente() {
    $("#btn_cre").attr('disabled', false);
    $("#tipo_de_venta").html("Venta de Contado.");
    $("#idcliente_credito").val("");
}
/***********************************************************************************************/
function cancela_venta() {
    $("#btn_cancela").prop("disabled", true);
    $("#tabla_articulos > tbody:last").children().remove();
    resumen();
    cancela_codigo();
    $("#codigo").focus();
}
/***************************************************************************************/
function cancela_codigo() {
    $("#preciou").val("");
    $("#cantidad").val("");
    $("#preciou").attr("disabled", true);
    $("#cantidad").attr("disabled", true);
    $("#codigo").val("");
    $("#codigo").focus();
}
/***************************************************************************************/
function prepara_venta() {
    var total = document.getElementById("totales");
    var totales = total.innerHTML;
    var costo = document.getElementById("totalescostos");
    var costos = costo.innerHTML;

    $("#card-total").load("punto-venta.php", { costos: costos, totales: totales });
    $(document).ready(function() {
        $("#modal_prepara_venta").modal({
            show: true,
            backdrop: 'static',
            keyboard: false
        });
        $('#modal_prepara_venta').on('shown.bs.modal', function() {
            $("#paga_con").select();
            $('#paga_con').focus();
        });
        $("#total_de_venta").val($("#total_venta").val());
        $("#costo_de_venta").val($("#costo_venta").val());
    })
}
/***********************************************************************************/
function calcula_cambio() {
    var m1 = $("#total_venta").val();
    var m2 = $("#paga_con").val();
    var change = parseFloat(m2) - parseFloat(m1);
    $("#el_cambio").val("$ " + change.toFixed(2));
}
/**************************************************************************************/
function pone_foco_ini() {
    $("#codigo").focus();
}
/**************************************************************************************/
function procesa_venta() {
    $('#tabla_articulos > tbody > .tr1').each(function() {
        var cod = ($(this).find("td").eq(1).html());
        var can = ($(this).find('td').eq(2).html());
        console.log(cod)
        console.log(can)
        document.getElementById("codigo").value = cod;
        document.getElementById("cantidad").value = can;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo=' + cod + '&cantidad=' + can,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr2').each(function() {
        var cod2 = ($(this).find("td").eq(1).html());
        var can2 = ($(this).find('td').eq(2).html());
        console.log(cod2)
        console.log(can2)
        document.getElementById("codigo").value = cod2;
        document.getElementById("cantidad").value = can2;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo2=' + cod2 + '&cantidad2=' + can2,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr3').each(function() {
        var cod3 = ($(this).find("td").eq(1).html());
        var can3 = ($(this).find('td').eq(2).html());
        console.log(cod3)
        console.log(can3)
        document.getElementById("codigo").value = cod3;
        document.getElementById("cantidad").value = can3;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo3=' + cod3 + '&cantidad3=' + can3,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr4').each(function() {
        var cod4 = ($(this).find("td").eq(1).html());
        var can4 = ($(this).find('td').eq(2).html());
        console.log(cod4)
        console.log(can4)
        document.getElementById("codigo").value = cod4;
        document.getElementById("cantidad").value = can4;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo4=' + cod4 + '&cantidad4=' + can4,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr5').each(function() {
        var cod5 = ($(this).find("td").eq(1).html());
        var can5 = ($(this).find('td').eq(2).html());
        console.log(cod5)
        console.log(can5)
        document.getElementById("codigo").value = cod5;
        document.getElementById("cantidad").value = can5;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo5=' + cod5 + '&cantidad5=' + can5,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr6').each(function() {
        var cod6 = ($(this).find("td").eq(1).html());
        var can6 = ($(this).find('td').eq(2).html());
        console.log(cod2)
        console.log(can2)
        document.getElementById("codigo").value = cod6;
        document.getElementById("cantidad").value = can6;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo6=' + cod6 + '&cantidad6=' + can6,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr7').each(function() {
        var cod7 = ($(this).find("td").eq(1).html());
        var can7 = ($(this).find('td').eq(2).html());
        console.log(cod7)
        console.log(can7)
        document.getElementById("codigo").value = cod7;
        document.getElementById("cantidad").value = can7;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo7=' + cod7 + '&cantidad7=' + can7,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr8').each(function() {
        var cod8 = ($(this).find("td").eq(1).html());
        var can8 = ($(this).find('td').eq(2).html());
        console.log(cod8)
        console.log(can8)
        document.getElementById("codigo").value = cod8;
        document.getElementById("cantidad").value = can8;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo8=' + cod8 + '&cantidad8=' + can8,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr9').each(function() {
        var cod9 = ($(this).find("td").eq(1).html());
        var can9 = ($(this).find('td').eq(2).html());
        console.log(cod9)
        console.log(can9)
        document.getElementById("codigo").value = cod9;
        document.getElementById("cantidad").value = can9;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo9=' + cod9 + '&cantidad9=' + can9,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr10').each(function() {
        var cod10 = ($(this).find("td").eq(1).html());
        var can10 = ($(this).find('td').eq(2).html());
        console.log(cod10)
        console.log(can10)
        document.getElementById("codigo").value = cod10;
        document.getElementById("cantidad").value = can10;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo10=' + cod10 + '&cantidad10=' + can10,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr11').each(function() {
        var cod11 = ($(this).find("td").eq(1).html());
        var can11 = ($(this).find('td').eq(2).html());
        console.log(cod11)
        console.log(can11)
        document.getElementById("codigo").value = cod11;
        document.getElementById("cantidad").value = can11;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo11=' + cod11 + '&cantidad11=' + can11,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr12').each(function() {
        var cod12 = ($(this).find("td").eq(1).html());
        var can12 = ($(this).find('td').eq(2).html());
        console.log(cod12)
        console.log(can12)
        document.getElementById("codigo").value = cod12;
        document.getElementById("cantidad").value = can12;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo12=' + cod12 + '&cantidad12=' + can12,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr13').each(function() {
        var cod13 = ($(this).find("td").eq(1).html());
        var can13 = ($(this).find('td').eq(2).html());
        console.log(cod13)
        console.log(can13)
        document.getElementById("codigo").value = cod13;
        document.getElementById("cantidad").value = can13;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo13=' + cod13 + '&cantidad13=' + can13,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr14').each(function() {
        var cod14 = ($(this).find("td").eq(1).html());
        var can14 = ($(this).find('td').eq(2).html());
        console.log(cod14)
        console.log(can14)
        document.getElementById("codigo").value = cod14;
        document.getElementById("cantidad").value = can14;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo14=' + cod14 + '&cantidad14=' + can14,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr15').each(function() {
        var cod15 = ($(this).find("td").eq(1).html());
        var can15 = ($(this).find('td').eq(2).html());
        console.log(cod15)
        console.log(can15)
        document.getElementById("codigo").value = cod15;
        document.getElementById("cantidad").value = can15;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo15=' + cod15 + '&cantidad15=' + can15,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr16').each(function() {
        var cod16 = ($(this).find("td").eq(1).html());
        var can16 = ($(this).find('td').eq(2).html());
        console.log(cod16)
        console.log(can16)
        document.getElementById("codigo").value = cod16;
        document.getElementById("cantidad").value = can16;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo16=' + cod16 + '&cantidad16=' + can16,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr17').each(function() {
        var cod17 = ($(this).find("td").eq(1).html());
        var can17 = ($(this).find('td').eq(2).html());
        console.log(cod17)
        console.log(can17)
        document.getElementById("codigo").value = cod17;
        document.getElementById("cantidad").value = can17;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo17=' + cod17 + '&cantidad17=' + can17,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr18').each(function() {
        var cod18 = ($(this).find("td").eq(1).html());
        var can18 = ($(this).find('td').eq(2).html());
        console.log(cod18)
        console.log(can18)
        document.getElementById("codigo").value = cod18;
        document.getElementById("cantidad").value = can18;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo18=' + cod18 + '&cantidad18=' + can18,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr19').each(function() {
        var cod19 = ($(this).find("td").eq(1).html());
        var can19 = ($(this).find('td').eq(2).html());
        console.log(cod19)
        console.log(can19)
        document.getElementById("codigo").value = cod19;
        document.getElementById("cantidad").value = can19;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo19=' + cod19 + '&cantidad19=' + can19,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr20').each(function() {
        var cod20 = ($(this).find("td").eq(1).html());
        var can20 = ($(this).find('td').eq(2).html());
        console.log(cod20)
        console.log(can20)
        document.getElementById("codigo").value = cod20;
        document.getElementById("cantidad").value = can20;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo20=' + cod20 + '&cantidad20=' + can20,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr21').each(function() {
        var cod21 = ($(this).find("td").eq(1).html());
        var can21 = ($(this).find('td').eq(2).html());
        console.log(cod21)
        console.log(can21)
        document.getElementById("codigo").value = cod21;
        document.getElementById("cantidad").value = can21;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo21=' + cod21 + '&cantidad21=' + can21,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr22').each(function() {
        var cod22 = ($(this).find("td").eq(1).html());
        var can22 = ($(this).find('td').eq(2).html());
        console.log(cod22)
        console.log(can22)
        document.getElementById("codigo").value = cod22;
        document.getElementById("cantidad").value = can22;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo22=' + cod22 + '&cantidad22=' + can22,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr23').each(function() {
        var cod23 = ($(this).find("td").eq(1).html());
        var can23 = ($(this).find('td').eq(2).html());
        console.log(cod23)
        console.log(can23)
        document.getElementById("codigo").value = cod23;
        document.getElementById("cantidad").value = can23;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo23=' + cod23 + '&cantidad23=' + can23,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr24').each(function() {
        var cod24 = ($(this).find("td").eq(1).html());
        var can24 = ($(this).find('td').eq(2).html());
        console.log(cod24)
        console.log(can24)
        document.getElementById("codigo").value = cod24;
        document.getElementById("cantidad").value = can24;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo24=' + cod24 + '&cantidad24=' + can24,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr25').each(function() {
        var cod25 = ($(this).find("td").eq(1).html());
        var can25 = ($(this).find('td').eq(2).html());
        console.log(cod25)
        console.log(can25)
        document.getElementById("codigo").value = cod25;
        document.getElementById("cantidad").value = can25;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo25=' + cod25 + '&cantidad25=' + can25,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr26').each(function() {
        var cod26 = ($(this).find("td").eq(1).html());
        var can26 = ($(this).find('td').eq(2).html());
        console.log(cod26)
        console.log(can26)
        document.getElementById("codigo").value = cod26;
        document.getElementById("cantidad").value = can26;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo26=' + cod26 + '&cantidad26=' + can26,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr27').each(function() {
        var cod27 = ($(this).find("td").eq(1).html());
        var can27 = ($(this).find('td').eq(2).html());
        console.log(cod27)
        console.log(can27)
        document.getElementById("codigo").value = cod27;
        document.getElementById("cantidad").value = can27;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo27=' + cod27 + '&cantidad27=' + can27,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr28').each(function() {
        var cod28 = ($(this).find("td").eq(1).html());
        var can28 = ($(this).find('td').eq(2).html());
        console.log(cod28)
        console.log(can28)
        document.getElementById("codigo").value = cod28;
        document.getElementById("cantidad").value = can28;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo28=' + cod28 + '&cantidad28=' + can28,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr29').each(function() {
        var cod29 = ($(this).find("td").eq(1).html());
        var can29 = ($(this).find('td').eq(2).html());
        console.log(cod29)
        console.log(can29)
        document.getElementById("codigo").value = cod29;
        document.getElementById("cantidad").value = can29;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo29=' + cod29 + '&cantidad29=' + can29,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr30').each(function() {
        var cod30 = ($(this).find("td").eq(1).html());
        var can30 = ($(this).find('td').eq(2).html());
        console.log(cod30)
        console.log(can30)
        document.getElementById("codigo").value = cod30;
        document.getElementById("cantidad").value = can30;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo30=' + cod30 + '&cantidad30=' + can30,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr31').each(function() {
        var cod31 = ($(this).find("td").eq(1).html());
        var can31 = ($(this).find('td').eq(2).html());
        console.log(cod31)
        console.log(can31)
        document.getElementById("codigo").value = cod31;
        document.getElementById("cantidad").value = can31;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo31=' + cod31 + '&cantidad31=' + can31,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr32').each(function() {
        var cod32 = ($(this).find("td").eq(1).html());
        var can32 = ($(this).find('td').eq(2).html());
        console.log(cod32)
        console.log(can32)
        document.getElementById("codigo").value = cod32;
        document.getElementById("cantidad").value = can32;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo32=' + cod32 + '&cantidad32=' + can32,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr33').each(function() {
        var cod33 = ($(this).find("td").eq(1).html());
        var can33 = ($(this).find('td').eq(2).html());
        console.log(cod33)
        console.log(can33)
        document.getElementById("codigo").value = cod33;
        document.getElementById("cantidad").value = can33;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo33=' + cod33 + '&cantidad33=' + can33,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr34').each(function() {
        var cod34 = ($(this).find("td").eq(1).html());
        var can34 = ($(this).find('td').eq(2).html());
        console.log(cod34)
        console.log(can34)
        document.getElementById("codigo").value = cod34;
        document.getElementById("cantidad").value = can34;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo34=' + cod34 + '&cantidad34=' + can34,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr35').each(function() {
        var cod35 = ($(this).find("td").eq(1).html());
        var can35 = ($(this).find('td').eq(2).html());
        console.log(cod30)
        console.log(can30)
        document.getElementById("codigo").value = cod35;
        document.getElementById("cantidad").value = can35;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo35=' + cod35 + '&cantidad35=' + can35,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr36').each(function() {
        var cod36 = ($(this).find("td").eq(1).html());
        var can36 = ($(this).find('td').eq(2).html());
        console.log(cod36)
        console.log(can36)
        document.getElementById("codigo").value = cod36;
        document.getElementById("cantidad").value = can36;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo36=' + cod36 + '&cantidad36=' + can36,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr37').each(function() {
        var cod37 = ($(this).find("td").eq(1).html());
        var can37 = ($(this).find('td').eq(2).html());
        console.log(cod37)
        console.log(can37)
        document.getElementById("codigo").value = cod37;
        document.getElementById("cantidad").value = can37;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo37=' + cod37 + '&cantidad37=' + can37,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr38').each(function() {
        var cod38 = ($(this).find("td").eq(1).html());
        var can38 = ($(this).find('td').eq(2).html());
        console.log(cod38)
        console.log(can38)
        document.getElementById("codigo").value = cod38;
        document.getElementById("cantidad").value = can38;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo38=' + cod38 + '&cantidad38=' + can38,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr39').each(function() {
        var cod39 = ($(this).find("td").eq(1).html());
        var can39 = ($(this).find('td').eq(2).html());
        console.log(cod39)
        console.log(can39)
        document.getElementById("codigo").value = cod39;
        document.getElementById("cantidad").value = can39;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo39=' + cod39 + '&cantidad39=' + can39,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr40').each(function() {
        var cod40 = ($(this).find("td").eq(1).html());
        var can40 = ($(this).find('td').eq(2).html());
        console.log(cod40)
        console.log(can40)
        document.getElementById("codigo").value = cod40;
        document.getElementById("cantidad").value = can40;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo40=' + cod40 + '&cantidad40=' + can40,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr41').each(function() {
        var cod41 = ($(this).find("td").eq(1).html());
        var can41 = ($(this).find('td').eq(2).html());
        console.log(cod41)
        console.log(can41)
        document.getElementById("codigo").value = cod41;
        document.getElementById("cantidad").value = can41;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo41=' + cod41 + '&cantidad41=' + can41,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr42').each(function() {
        var cod42 = ($(this).find("td").eq(1).html());
        var can42 = ($(this).find('td').eq(2).html());
        console.log(cod42)
        console.log(can42)
        document.getElementById("codigo").value = cod42;
        document.getElementById("cantidad").value = can42;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo42=' + cod42 + '&cantidad42=' + can42,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr43').each(function() {
        var cod43 = ($(this).find("td").eq(1).html());
        var can43 = ($(this).find('td').eq(2).html());
        console.log(cod43)
        console.log(can43)
        document.getElementById("codigo").value = cod43;
        document.getElementById("cantidad").value = can43;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo43=' + cod43 + '&cantidad43=' + can43,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr44').each(function() {
        var cod44 = ($(this).find("td").eq(1).html());
        var can44 = ($(this).find('td').eq(2).html());
        console.log(cod44)
        console.log(can44)
        document.getElementById("codigo").value = cod44;
        document.getElementById("cantidad").value = can44;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo44=' + cod44 + '&cantidad44=' + can44,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr45').each(function() {
        var cod45 = ($(this).find("td").eq(1).html());
        var can45 = ($(this).find('td').eq(2).html());
        console.log(cod45)
        console.log(can45)
        document.getElementById("codigo").value = cod45;
        document.getElementById("cantidad").value = can45;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo45=' + cod45 + '&cantidad45=' + can45,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr46').each(function() {
        var cod46 = ($(this).find("td").eq(1).html());
        var can46 = ($(this).find('td').eq(2).html());
        console.log(cod46)
        console.log(can46)
        document.getElementById("codigo").value = cod46;
        document.getElementById("cantidad").value = can46;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo46=' + cod46 + '&cantidad46=' + can46,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr47').each(function() {
        var cod47 = ($(this).find("td").eq(1).html());
        var can47 = ($(this).find('td').eq(2).html());
        console.log(cod47)
        console.log(can47)
        document.getElementById("codigo").value = cod47;
        document.getElementById("cantidad").value = can47;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo47=' + cod47 + '&cantidad47=' + can47,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr48').each(function() {
        var cod48 = ($(this).find("td").eq(1).html());
        var can48 = ($(this).find('td').eq(2).html());
        console.log(cod48)
        console.log(can48)
        document.getElementById("codigo").value = cod48;
        document.getElementById("cantidad").value = can48;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo48=' + cod48 + '&cantidad48=' + can48,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr49').each(function() {
        var cod49 = ($(this).find("td").eq(1).html());
        var can49 = ($(this).find('td').eq(2).html());
        console.log(cod49)
        console.log(can49)
        document.getElementById("codigo").value = cod49;
        document.getElementById("cantidad").value = can49;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo49=' + cod49 + '&cantidad49=' + can49,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr50').each(function() {
        var cod50 = ($(this).find("td").eq(1).html());
        var can50 = ($(this).find('td').eq(2).html());
        console.log(cod50)
        console.log(can50)
        document.getElementById("codigo").value = cod50;
        document.getElementById("cantidad").value = can50;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo50=' + cod50 + '&cantidad50=' + can50,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr51').each(function() {
        var cod51 = ($(this).find("td").eq(1).html());
        var can51 = ($(this).find('td').eq(2).html());
        console.log(cod51)
        console.log(can51)
        document.getElementById("codigo").value = cod51;
        document.getElementById("cantidad").value = can51;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo51=' + cod51 + '&cantidad51=' + can51,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr52').each(function() {
        var cod52 = ($(this).find("td").eq(1).html());
        var can52 = ($(this).find('td').eq(2).html());
        console.log(cod52)
        console.log(can52)
        document.getElementById("codigo").value = cod52;
        document.getElementById("cantidad").value = can52;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo52=' + cod52 + '&cantidad52=' + can52,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr53').each(function() {
        var cod53 = ($(this).find("td").eq(1).html());
        var can53 = ($(this).find('td').eq(2).html());
        console.log(cod53)
        console.log(can53)
        document.getElementById("codigo").value = cod53;
        document.getElementById("cantidad").value = can53;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo53=' + cod53 + '&cantidad53=' + can53,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr54').each(function() {
        var cod54 = ($(this).find("td").eq(1).html());
        var can54 = ($(this).find('td').eq(2).html());
        console.log(cod54)
        console.log(can54)
        document.getElementById("codigo").value = cod54;
        document.getElementById("cantidad").value = can54;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo54=' + cod54 + '&cantidad54=' + can54,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr55').each(function() {
        var cod55 = ($(this).find("td").eq(1).html());
        var can55 = ($(this).find('td').eq(2).html());
        console.log(cod55)
        console.log(can55)
        document.getElementById("codigo").value = cod55;
        document.getElementById("cantidad").value = can55;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo55=' + cod55 + '&cantidad55=' + can55,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr56').each(function() {
        var cod56 = ($(this).find("td").eq(1).html());
        var can56 = ($(this).find('td').eq(2).html());
        console.log(cod56)
        console.log(can56)
        document.getElementById("codigo").value = cod56;
        document.getElementById("cantidad").value = can56;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo56=' + cod56 + '&cantidad56=' + can56,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr57').each(function() {
        var cod57 = ($(this).find("td").eq(1).html());
        var can57 = ($(this).find('td').eq(2).html());
        console.log(cod57)
        console.log(can57)
        document.getElementById("codigo").value = cod57;
        document.getElementById("cantidad").value = can57;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo57=' + cod57 + '&cantidad57=' + can57,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr58').each(function() {
        var cod58 = ($(this).find("td").eq(1).html());
        var can58 = ($(this).find('td').eq(2).html());
        console.log(cod58)
        console.log(can58)
        document.getElementById("codigo").value = cod58;
        document.getElementById("cantidad").value = can58;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo58=' + cod58 + '&cantidad58=' + can58,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr59').each(function() {
        var cod59 = ($(this).find("td").eq(1).html());
        var can59 = ($(this).find('td').eq(2).html());
        console.log(cod59)
        console.log(can59)
        document.getElementById("codigo").value = cod59;
        document.getElementById("cantidad").value = can59;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo59=' + cod59 + '&cantidad59=' + can59,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr60').each(function() {
        var cod60 = ($(this).find("td").eq(1).html());
        var can60 = ($(this).find('td').eq(2).html());
        console.log(cod60)
        console.log(can60)
        document.getElementById("codigo").value = cod60;
        document.getElementById("cantidad").value = can60;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo60=' + cod60 + '&cantidad60=' + can60,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr61').each(function() {
        var cod61 = ($(this).find("td").eq(1).html());
        var can61 = ($(this).find('td').eq(2).html());
        console.log(cod61)
        console.log(can61)
        document.getElementById("codigo").value = cod61;
        document.getElementById("cantidad").value = can61;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo61=' + cod61 + '&cantidad61=' + can61,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr62').each(function() {
        var cod62 = ($(this).find("td").eq(1).html());
        var can62 = ($(this).find('td').eq(2).html());
        console.log(cod62)
        console.log(can62)
        document.getElementById("codigo").value = cod62;
        document.getElementById("cantidad").value = can62;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo62=' + cod62 + '&cantidad62=' + can62,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr63').each(function() {
        var cod63 = ($(this).find("td").eq(1).html());
        var can63 = ($(this).find('td').eq(2).html());
        console.log(cod63)
        console.log(can63)
        document.getElementById("codigo").value = cod63;
        document.getElementById("cantidad").value = can63;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo63=' + cod63 + '&cantidad63=' + can63,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr64').each(function() {
        var cod64 = ($(this).find("td").eq(1).html());
        var can64 = ($(this).find('td').eq(2).html());
        console.log(cod64)
        console.log(can64)
        document.getElementById("codigo").value = cod64;
        document.getElementById("cantidad").value = can64;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo64=' + cod64 + '&cantidad64=' + can64,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr65').each(function() {
        var cod65 = ($(this).find("td").eq(1).html());
        var can65 = ($(this).find('td').eq(2).html());
        console.log(cod65)
        console.log(can65)
        document.getElementById("codigo").value = cod65;
        document.getElementById("cantidad").value = can65;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo65=' + cod65 + '&cantidad65=' + can65,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr66').each(function() {
        var cod66 = ($(this).find("td").eq(1).html());
        var can66 = ($(this).find('td').eq(2).html());
        console.log(cod66)
        console.log(can66)
        document.getElementById("codigo").value = cod66;
        document.getElementById("cantidad").value = can66;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo66=' + cod66 + '&cantidad66=' + can66,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr67').each(function() {
        var cod67 = ($(this).find("td").eq(1).html());
        var can67 = ($(this).find('td').eq(2).html());
        console.log(cod67)
        console.log(can67)
        document.getElementById("codigo").value = cod67;
        document.getElementById("cantidad").value = can67;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo67=' + cod67 + '&cantidad67=' + can67,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr68').each(function() {
        var cod68 = ($(this).find("td").eq(1).html());
        var can68 = ($(this).find('td').eq(2).html());
        console.log(cod68)
        console.log(can68)
        document.getElementById("codigo").value = cod68;
        document.getElementById("cantidad").value = can68;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo68=' + cod68 + '&cantidad68=' + can68,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr69').each(function() {
        var cod69 = ($(this).find("td").eq(1).html());
        var can69 = ($(this).find('td').eq(2).html());
        console.log(cod69)
        console.log(can69)
        document.getElementById("codigo").value = cod69;
        document.getElementById("cantidad").value = can69;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo69=' + cod69 + '&cantidad69=' + can69,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr70').each(function() {
        var cod70 = ($(this).find("td").eq(1).html());
        var can70 = ($(this).find('td').eq(2).html());
        console.log(cod70)
        console.log(can70)
        document.getElementById("codigo").value = cod70;
        document.getElementById("cantidad").value = can70;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo70=' + cod70 + '&cantidad70=' + can70,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr71').each(function() {
        var cod71 = ($(this).find("td").eq(1).html());
        var can71 = ($(this).find('td').eq(2).html());
        console.log(cod71)
        console.log(can71)
        document.getElementById("codigo").value = cod71;
        document.getElementById("cantidad").value = can71;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo71=' + cod71 + '&cantidad71=' + can71,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr72').each(function() {
        var cod72 = ($(this).find("td").eq(1).html());
        var can72 = ($(this).find('td').eq(2).html());
        console.log(cod72)
        console.log(can72)
        document.getElementById("codigo").value = cod72;
        document.getElementById("cantidad").value = can72;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo72=' + cod72 + '&cantidad72=' + can72,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr73').each(function() {
        var cod73 = ($(this).find("td").eq(1).html());
        var can73 = ($(this).find('td').eq(2).html());
        console.log(cod73)
        console.log(can73)
        document.getElementById("codigo").value = cod73;
        document.getElementById("cantidad").value = can73;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo73=' + cod73 + '&cantidad73=' + can73,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr74').each(function() {
        var cod74 = ($(this).find("td").eq(1).html());
        var can74 = ($(this).find('td').eq(2).html());
        console.log(cod74)
        console.log(can74)
        document.getElementById("codigo").value = cod74;
        document.getElementById("cantidad").value = can74;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo74=' + cod74 + '&cantidad74=' + can74,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr75').each(function() {
        var cod75 = ($(this).find("td").eq(1).html());
        var can75 = ($(this).find('td').eq(2).html());
        console.log(cod75)
        console.log(can75)
        document.getElementById("codigo").value = cod75;
        document.getElementById("cantidad").value = can75;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo75=' + cod75 + '&cantidad75=' + can75,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr76').each(function() {
        var cod76 = ($(this).find("td").eq(1).html());
        var can76 = ($(this).find('td').eq(2).html());
        console.log(cod76)
        console.log(can76)
        document.getElementById("codigo").value = cod76;
        document.getElementById("cantidad").value = can76;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo76=' + cod76 + '&cantidad76=' + can76,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr77').each(function() {
        var cod77 = ($(this).find("td").eq(1).html());
        var can77 = ($(this).find('td').eq(2).html());
        console.log(cod77)
        console.log(can77)
        document.getElementById("codigo").value = cod77;
        document.getElementById("cantidad").value = can77;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo77=' + cod77 + '&cantidad77=' + can77,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr78').each(function() {
        var cod78 = ($(this).find("td").eq(1).html());
        var can78 = ($(this).find('td').eq(2).html());
        console.log(cod78)
        console.log(can78)
        document.getElementById("codigo").value = cod78;
        document.getElementById("cantidad").value = can78;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo78=' + cod78 + '&cantidad78=' + can78,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr79').each(function() {
        var cod79 = ($(this).find("td").eq(1).html());
        var can79 = ($(this).find('td').eq(2).html());
        console.log(cod79)
        console.log(can79)
        document.getElementById("codigo").value = cod79;
        document.getElementById("cantidad").value = can79;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo79=' + cod79 + '&cantidad79=' + can79,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr80').each(function() {
        var cod80 = ($(this).find("td").eq(1).html());
        var can80 = ($(this).find('td').eq(2).html());
        console.log(cod80)
        console.log(can80)
        document.getElementById("codigo").value = cod80;
        document.getElementById("cantidad").value = can80;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo80=' + cod80 + '&cantidad80=' + can80,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr81').each(function() {
        var cod81 = ($(this).find("td").eq(1).html());
        var can81 = ($(this).find('td').eq(2).html());
        console.log(cod81)
        console.log(can81)
        document.getElementById("codigo").value = cod81;
        document.getElementById("cantidad").value = can81;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo81=' + cod81 + '&cantidad81=' + can81,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr82').each(function() {
        var cod82 = ($(this).find("td").eq(1).html());
        var can82 = ($(this).find('td').eq(2).html());
        console.log(cod82)
        console.log(can82)
        document.getElementById("codigo").value = cod82;
        document.getElementById("cantidad").value = can82;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo82=' + cod82 + '&cantidad82=' + can82,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr83').each(function() {
        var cod83 = ($(this).find("td").eq(1).html());
        var can83 = ($(this).find('td').eq(2).html());
        console.log(cod83)
        console.log(can83)
        document.getElementById("codigo").value = cod83;
        document.getElementById("cantidad").value = can83;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo83=' + cod83 + '&cantidad83=' + can83,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr84').each(function() {
        var cod84 = ($(this).find("td").eq(1).html());
        var can84 = ($(this).find('td').eq(2).html());
        console.log(cod84)
        console.log(can84)
        document.getElementById("codigo").value = cod84;
        document.getElementById("cantidad").value = can84;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo84=' + cod84 + '&cantidad84=' + can84,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr85').each(function() {
        var cod85 = ($(this).find("td").eq(1).html());
        var can85 = ($(this).find('td').eq(2).html());
        console.log(cod85)
        console.log(can85)
        document.getElementById("codigo").value = cod85;
        document.getElementById("cantidad").value = can85;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo85=' + cod85 + '&cantidad85=' + can85,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr86').each(function() {
        var cod86 = ($(this).find("td").eq(1).html());
        var can86 = ($(this).find('td').eq(2).html());
        console.log(cod86)
        console.log(can86)
        document.getElementById("codigo").value = cod86;
        document.getElementById("cantidad").value = can86;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo86=' + cod86 + '&cantidad86=' + can86,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr87').each(function() {
        var cod87 = ($(this).find("td").eq(1).html());
        var can87 = ($(this).find('td').eq(2).html());
        console.log(cod87)
        console.log(can87)
        document.getElementById("codigo").value = cod87;
        document.getElementById("cantidad").value = can87;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo87=' + cod87 + '&cantidad87=' + can87,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr88').each(function() {
        var cod88 = ($(this).find("td").eq(1).html());
        var can88 = ($(this).find('td').eq(2).html());
        console.log(cod88)
        console.log(can88)
        document.getElementById("codigo").value = cod88;
        document.getElementById("cantidad").value = can88;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo88=' + cod88 + '&cantidad88=' + can88,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr89').each(function() {
        var cod89 = ($(this).find("td").eq(1).html());
        var can89 = ($(this).find('td').eq(2).html());
        console.log(cod89)
        console.log(can89)
        document.getElementById("codigo").value = cod89;
        document.getElementById("cantidad").value = can89;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo89=' + cod89 + '&cantidad89=' + can89,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr90').each(function() {
        var cod90 = ($(this).find("td").eq(1).html());
        var can90 = ($(this).find('td').eq(2).html());
        console.log(cod90)
        console.log(can90)
        document.getElementById("codigo").value = cod90;
        document.getElementById("cantidad").value = can90;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo90=' + cod90 + '&cantidad90=' + can90,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr91').each(function() {
        var cod91 = ($(this).find("td").eq(1).html());
        var can91 = ($(this).find('td').eq(2).html());
        console.log(cod91)
        console.log(can91)
        document.getElementById("codigo").value = cod91;
        document.getElementById("cantidad").value = can91;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo91=' + cod91 + '&cantidad91=' + can91,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr92').each(function() {
        var cod92 = ($(this).find("td").eq(1).html());
        var can92 = ($(this).find('td').eq(2).html());
        console.log(cod92)
        console.log(can92)
        document.getElementById("codigo").value = cod92;
        document.getElementById("cantidad").value = can92;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo92=' + cod92 + '&cantidad92=' + can92,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr93').each(function() {
        var cod93 = ($(this).find("td").eq(1).html());
        var can93 = ($(this).find('td').eq(2).html());
        console.log(cod93)
        console.log(can93)
        document.getElementById("codigo").value = cod93;
        document.getElementById("cantidad").value = can93;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo93=' + cod93 + '&cantidad93=' + can93,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr94').each(function() {
        var cod94 = ($(this).find("td").eq(1).html());
        var can94 = ($(this).find('td').eq(2).html());
        console.log(cod94)
        console.log(can94)
        document.getElementById("codigo").value = cod94;
        document.getElementById("cantidad").value = can94;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo94=' + cod94 + '&cantidad94=' + can94,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr95').each(function() {
        var cod95 = ($(this).find("td").eq(1).html());
        var can95 = ($(this).find('td').eq(2).html());
        console.log(cod95)
        console.log(can95)
        document.getElementById("codigo").value = cod95;
        document.getElementById("cantidad").value = can95;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo95=' + cod95 + '&cantidad95=' + can95,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr96').each(function() {
        var cod96 = ($(this).find("td").eq(1).html());
        var can96 = ($(this).find('td').eq(2).html());
        console.log(cod96)
        console.log(can96)
        document.getElementById("codigo").value = cod96;
        document.getElementById("cantidad").value = can96;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo96=' + cod96 + '&cantidad96=' + can96,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr97').each(function() {
        var cod97 = ($(this).find("td").eq(1).html());
        var can97 = ($(this).find('td').eq(2).html());
        console.log(cod97)
        console.log(can97)
        document.getElementById("codigo").value = cod97;
        document.getElementById("cantidad").value = can97;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo97=' + cod97 + '&cantidad97=' + can97,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr98').each(function() {
        var cod98 = ($(this).find("td").eq(1).html());
        var can98 = ($(this).find('td').eq(2).html());
        console.log(cod98)
        console.log(can98)
        document.getElementById("codigo").value = cod98;
        document.getElementById("cantidad").value = can98;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo98=' + cod98 + '&cantidad98=' + can98,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr99').each(function() {
        var cod99 = ($(this).find("td").eq(1).html());
        var can99 = ($(this).find('td').eq(2).html());
        console.log(cod99)
        console.log(can99)
        document.getElementById("codigo").value = cod99;
        document.getElementById("cantidad").value = can99;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo99=' + cod99 + '&cantidad99=' + can99,
            error: function(jqXHR, estado, error) {}
        });
    });
    $('#tabla_articulos > tbody > .tr100').each(function() {
        var cod100 = ($(this).find("td").eq(1).html());
        var can100 = ($(this).find('td').eq(2).html());
        console.log(cod100)
        console.log(can100)
        document.getElementById("codigo").value = cod100;
        document.getElementById("cantidad").value = can100;
        $.ajax({
            beforeSend: function() {},
            url: 'procesa_ajuste_point_sales.php',
            type: 'POST',
            data: 'codigo100=' + cod100 + '&cantidad100=' + can100,
            error: function(jqXHR, estado, error) {}
        });
    });
}
/*******************************************************************************************/
function actualiza_ticket() {
    $(document).ready(function() {
        $.ajax({
            beforeSend: function() {},
            url: 'update_numero_ticket.php',
            type: 'POST',
            data: 'caja=' + $("#ncaja").val(),
            success: function(x) {
                //alert("Se actualizo el numero de ticket");
                $("#tabla_articulos > tbody:last").children().remove();
                resumen();
                quita_cliente();
                $("#codigo").focus();
            },
            error: function(jqXHR, estado, error) {
                $("#errores").html('Error... ' + estado + '  ' + error);
            }
        });
        pone_num_venta();
        $(".print_ticket").printPage({
            url: "ticket.txt",
            attr: "href",
            message: "Generando vista previa del ticket.."
        })
        $(".print_ticket").click();
    })
}
/*******************************************************************************************/
function llena_ticket_archivo(param1, param2, param3, param6, param7, param8, param9, param10, param11) {
    var cod = param1;
    var can = param2;
    var preciou = param3;
    var monto = param6;
    var total = param7;
    var montocosto = param11;
    $.ajax({
        beforeSend: function() {},
        url: 'impresion_tickets.php',
        type: 'POST',
        data: 'codigo=' + cod + '&preciou=' + preciou + '&monto=' + monto + '&total=' + total + '&montocosto=' + montocosto,
        success: function(x) {
            //alert(x);
        },
        error: function(jqXHR, estado, error) {}
    });
}
/************************************************************************************/
/***************************************************************************************/
function busqueda_art() {
    $("#modal_busqueda_arts").modal({
        show: true,
        backdrop: 'static',
        keyboard: false
    });
    $('#modal_busqueda_arts').on('shown.bs.modal', function() {
        $("#lista_articulos").html("");
        $("#articulo_buscar").val("");
        $("#articulo_buscar").focus();
    });
}
/*****************************************************************************/
function busca() {
    $.ajax({
        beforeSend: function() {
            $("#lista_articulos").html("<img src='dist/img/default.gif'></img>");
        },
        url: 'busca_articulos_ayuda.php',
        type: 'POST',
        data: 'articulo=' + $("#articulo_buscar").val(),
        success: function(x) {
            $("#lista_articulos").html(x);
        },
        error: function(jqXHR, estado, error) {
            $("#lista_articulos").html("Error en la peticion AJAX..." + estado + "      " + error);
        }
    });
}
/*****************************************************************************/
function add_art(art) {
    //alert(art);
    $("#modal_busqueda_arts").modal("toggle");
    $("#codigo").val(art.trim());
    busca_articulo();
}
/*********************************************************************************/
function accion() {
    window.location = "execute_pv.php";
}

function accion_calc() {
    window.location = "execute_calc.php";
}

function accion_ayuda() {
    window.location = "alert-notificacion.php";
}