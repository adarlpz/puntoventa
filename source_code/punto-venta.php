<?php include "./class_lib/sesionSecurity.php";
 $db = mysqli_connect("localhost", "root", "", "db_puntoventa"); ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <title>Punto de Venta</title>
    <?php include "./class_lib/links.php"; ?>
  </head>
  <body style="background-image: url(css/imgs/fondo-point-venta.jpg);" onload="pone_num_venta();resumen();pone_foco_ini();">


    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <?php
        include('class_lib/nav_header.php');
        ?>

      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <?php
        include('class_lib/sidebar.php');
        $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $fecha=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;

        /*verifica si esta establecido un numero de caja*/
        if($_SESSION['numero_de_caja']=='0'){
           echo '<script>
           window.location="src/views/num_box_fail.php";
           </script>';
        }else{
          echo "<input type='hidden' id='ncaja' value='$_SESSION[numero_de_caja]'>";
        }
        ?>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->
        <a href="menu.php" class="logo">
    <img src="css/imgs/atras-icon-deg.svg" height="20px" style="margin-top:15px;margin-left:20px;">
    </a>

      <center>
    <img src="css/imgs/letras-megras.png" style="height:90px;">
    </center>

<!-- Main content -->
<section class="content">

<!-- Your Page Content Here -->
<div class='row'>
<div class='col-md-4 card-products' >
<div style="box-shadow: 0 0 15px rgba(0, 0, 0, .4);" class='box box-primary'>
<div class='box-header with-border'><h3 class='box-title'>Ingresa el Codigo del Articulo :</h3></div>
<div class='box-body'>
<div class='input-group'>
<div class='input-group-btn'>
<button type='button' class='btn btn-search none-padding' onclick='busqueda_art();' style="border: 1px solid #ccc;height:34px;width:35px;outline:none;"><img src="css/imgs/search-icon.svg"  style="padding-top:4px;" height="23.5px" ></button>
</div>
<input type='text' id='codigo' class='form-control codgo' placeholder='Codigo...' onchange='busca_articulo();' style="font-size:20px; text-align:center;float:left;">

</div>
<br>
<div style="margin-bottom:20px;" class='input-group'>
<img src="css/imgs/monto-icon-de.svg" style="padding-bottom:5px;" width="30" height="30" class="imagen_lupa">
<span class='input-group-addon'>Precio  :</span>
<input type='text' name="preciou" id='preciou' class='form-control cantidades validar'  style="font-size:20px; text-align:center; font-weight: bold;outline:none;"
data-inputmask="'alias': 'numeric', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'">
</div>
<div style="margin-bottom:20px;display:none;" class='input-group'>
<img src="css/imgs/money-icon.svg" style="padding-bottom:5px;" width="30" height="30" class="imagen_lupa">
<span class='input-group-addon'>Costo  :</span>
<input type='text' name="costou" id='costou' class='form-control cantidades validar'  style="font-size:20px; text-align:center; font-weight: bold;outline:none;"
data-inputmask="'alias': 'numeric', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'">
</div>
<div  style="display:none;" class='input-group'>
          <span class='input-group-addon bg-orange'>Cantidad:</span>
          <input value="1" type='text' id='cantidad' class='form-control cantidades' style="font-size:20px; text-align:center; color:blue; font-weight: bold;"
          data-inputmask="'alias': 'numeric', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'" disabled>
          </div>
          <button style="border-radius: 15px;background: linear-gradient(130deg, #00E6FF 0%, #0090D4 100%);border: 2.5px solid #fff;outline:none" class='btn btn-success btn-lg btn-agregar' id='btn-add' onclick='agrega_a_lista();'>Agregar</button>
</div>

</div>
</div>

<div style="display: none;" class="col-md-4">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                  <h3 class="widget-user-username"></h3>
                  <h5 class="widget-user-desc"></h5>
                </div>
                <div class="widget-user-image">
                  <img id='imagen' class="img-circle" src="dist/img/sin_foto.png" alt="Imagen del Articulo">
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header preciol">0.00</h5>
                        <span class="description-text">PRECIO U. L.</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4 border-right">
                      <div class="description-block">

                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header exis">0.00</h5>
                        <span class="description-text">EXIS.</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div>
              </div><!-- /.widget-user -->
            </div><!-- /.col -->

          <div style="box-shadow: 0 0 15px rgba(0, 0, 0, .4);" class="col-md-4 card-total">
              <!-- small box -->
              <div class="small-box ">
                <div class="inner">
                <div style="display: flex;flex-direction:row;" >
                <div style="background: linear-gradient(#00D1FF,#0090D4);background-clip: border-box;background-clip: border-box;-webkit-background-clip: text;color: transparent;font-size:40px;font-weight:bold;" >$ </div><input id="totales" method="POST" readonly="readonly" name="totales_input" style="border:0;background:white;user-select: none;width: 330px;background: linear-gradient(#00D1FF,#0090D4);background-clip: border-box;background-clip: border-box;-webkit-background-clip: text;color: transparent;font-size:40px;font-weight:bold;cursor:auto;" ></input>
                </div>
                <div style="display: none;flex-direction:row;" >
                <div style="background: linear-gradient(#00D1FF,#0090D4);background-clip: border-box;background-clip: border-box;-webkit-background-clip: text;color: transparent;font-size:40px;font-weight:bold;" >$ </div><input id="totalescostos" method="POST" readonly="readonly" name="costos_input" style="border:0;background:white;user-select: none;background: linear-gradient(#00D1FF,#0090D4);background-clip: border-box;background-clip: border-box;-webkit-background-clip: text;color: transparent;font-size:40px;font-weight:bold;cursor:auto;" ></input>
                </div>
                  <p>Total</p>
                </div>
                <a href="#" class="small-box-footer">
                  <div id='num_ticket'></div>
                </a>
                <a href="#" class="small-box-footer">
                  <div id='total_articulos'></div>
                </a>
              </div>
              <div class='btn-group'>
              <button class='btn  btn-success pull-left'id='btn-procesa'  style="color:black;outline:none;" onclick='prepara_venta();'><img src="css/imgs/pay-icon.svg" width="30px" height="25px" ></button>
              <button class='btn  btn-warning btn-cancelar pull-right' id='btn-cancela' style="color:black;outline:none;" onclick="cancela_venta();"><img src="css/imgs/clean-icon.svg" width="23px" height="23px"></button>
              </div>
            </div><!-- ./col -->
          </div>

          <div class='row'>
          <div class='col-md-12'>
          <div style="box-shadow: 0 0 15px rgba(0, 0, 0, .4);" class='box box-primary'>
          <div class='box-header'>
          </div>
          <div style="overflow-x: hidden;" class='box-body table-responsive'>
          <table id='tabla_articulos' style="margin-left: 40px;" class='table table-hover'>
           <thead>
           <tr>
           <th class='center'>Nombre</th><th class='center'>Codigo</th><th class='center'>Cantidad</th><th class='center'>Precio</th><th class='center'>Monto</th><th class='center'>Costo</th><th class='center'>Acciones</th>
           </tr>
           </thead>
           <tbody>

           </tbody>
          </table>
          </div>
          </div>
          </div>
          </div>
        </section><!-- /.content -->
         </div><!-- /.content-wrapper -->


           <div class="modal fade" id ="modal_tabla_clientes" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Selecciona el Cliente:</h4>
          </div>
          <div class="modal-body">
            <div id='lista_clientes'></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="modal fade" id ="modal_prepara_venta" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="css/imgs/failed-icon-de.svg" width="14" height="14"></button>
            <center>
            <h4 class="modal-title">Resumen De La Compra</h4>
            </center>
          </div>
          <div class="modal-body">
          <form action="src/views/venta-exitosa.php" method="POST" >
          <div class='input-group input-group-lg'>
          <span class='input-group-addon bgblue' style="font-weight:500;color:black;" ><b>Total De La Venta :</b></span>
          <input method="POST" name="total_de_la_venta" type='text' id='total_de_venta' class='form-control' style="font-size:30px; text-align:center; color:red; font-weight: bold;background: linear-gradient(#00D1FF,#0090D4);background-clip: border-box;background-clip: border-box;-webkit-background-clip: text;color: transparent;"></input>
          </div>
          <div class='input-group input-group-lg'>
          <span class='input-group-addon bgblue' style="font-weight:500;color:black;" ><b>Costo De La Venta :</b></span>
          <input method="POST" name="costo_de_la_venta" type='text' id='costo_de_venta' class='form-control' style="font-size:30px; text-align:center; color:red; font-weight: bold;background: linear-gradient(#00D1FF,#0090D4);background-clip: border-box;background-clip: border-box;-webkit-background-clip: text;color: transparent;"></input>
          </div>
          <br>
          <div class='input-group input-group-lg'>
          <span class='input-group-addon bg-lue validar' style="font-weight:500;color:black;" ><b>Pago Recibido :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span>
          <input type='text' id='paga_con' class='form-control cantidades' style="font-size:30px; text-align:center; color:black; font-weight: bold;" onkeyup="calcula_cambio();"
          data-inputmask="'alias': 'numeric', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'">
          </div>
          <br>
          <div class='input-group input-group-lg'>
          <span class='input-group-addon bgblue' style="font-weight:500;color:black;" ><b>Cambio :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span>
          <input type='text' id='el_cambio' class='form-control' style="font-size:30px; text-align:center; color:red; font-weight: bold;background: linear-gradient(#00D1FF,#0090D4);background-clip: border-box;background-clip: border-box;-webkit-background-clip: text;color: transparent;" disabled>
          </div>

          </div>
          <div class="modal-footer">
              <button style="display: none;" class='btn btn-success btn-lg print_ticket' id='btn-termina' onclick='' disabled><i class='fa fa-print'></i> Ticket</button>
              <center>
              <button style="background: linear-gradient(130deg, #00E6FF 0%, #0090D4 100%);border: 2.5px solid #fff;border-radius: 25px;width: 300px;" class='btn btn-success btn-lg' id='btn-termina' onclick='procesa_venta();'>PROCESAR COMPRA</button>
              </center>
              </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id ="modal_busqueda_arts" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="css/imgs/failed-icon-de.svg" width="14" height="14"></button>
            <h4 class="modal-title">Busqueda de Articulos:</h4>
          </div>
          <div class="modal-body">
          <div class='input-group'>
          <span class='input-group-addon bg-blue'><b style="color:black;" >Articulo:</b></span>
          <input type='text' id='articulo_buscar' class='form-control' onkeyup="busca();" placeholder='Descripcion del articulo...'>
          </div>
          <br>
            <div id='lista_articulos'></div>
          </div>
          <div class="modal-footer">
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

      <input type='hidden' id='idcliente_credito' value="">
      <input type='hidden' id='total_venta' value="">
      <input type='hidden' id='costo_venta' value="">

      <div id='impresion_de_ticket' class='print'></div>
      <!-- Main Footer -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <div class="MsjAjaxForm"></div>
    <?php include "./class_lib/scripts.php"; ?>
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="dist/js/source_point_sales.js"></script>
    <script src="plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
    <script src="plugins/number/jquery.inputmask.bundle.js"></script>
    <script src="plugins/printPage/jquery.printPage.js"></script>
    <script>
      $(document).ready(function(){
        $(".cantidades").inputmask();
      });
    </script>
  </body>
</html>