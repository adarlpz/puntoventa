<?php include "./class_lib/sesionSecurity.php"; ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <title>Articulos</title>
    <?php include "./class_lib/links.php"; ?>
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="plugins/datepicker/css/bootstrap-datepicker3.css">
  </head>
  <body style="background-image: url(css/imgs/fondo-point-venta.jpg); font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;height:800px !important;" onload="pone_provs();pone_lineas();lista_articulos();">

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


        ?>
        <!-- /.sidebar -->
      </aside>

      <a href="menu.php" class="logo">
    <img src="css/imgs/atras-icon-deg.svg" height="20px" style="margin-top:15px;margin-left:20px;">
      </a>

      <center>
    <img src="css/imgs/letras-megras.png" style="height:90px;">
    </center>

      <!-- Content Wrapper. Contains page content -->
        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->
          <div class='row'>
           <div class='col-md-12'>
             <div style="box-shadow: 0 0 10px rgba(0, 0, 0, .4);" class='nav-tabs-custom fondo-container' >
                  <ul class="nav nav-tabs pull-right">
                  <li><a href="#cambios" data-toggle="tab">Editar</a></li>
                  <li><a href="#bajas" data-toggle="tab">Eliminar</a></li>
                  <li class="active"><a href="#altas" data-toggle="tab">Añadir</a></li>

                  <li class="pull-left header">Articulos</li>

                </ul>
               <div class="tab-content" style="border-radius: 15px;">
                  <div class="tab-pane active" id="altas">
                    <form class="form-horizontal">

                    <div class='form-group'>
                    <label for="codigo" class="col-sm-2 control-label">Codigo:</label>
                    <div class="col-sm-3">
                    <input id="codigo" spellcheck="false" type="text" class="form-control" placeholder='Codigo del articulo...'>
                    </div>
                    </div>

                    <div class='form-group'>
                    <label for="descripcion" class="col-sm-2 control-label">Descripcion:</label>
                    <div class="col-sm-6">
                    <input spellcheck="false" type="text" class="form-control" id='descripcion' placeholder='Descripcion del articulo...'>
                    </div>
                    </div>


                    <div class='form-group'>
                    <label for="costo" class="col-sm-2 control-label">Costo:</label>
                    <div class="col-sm-2">
                    <input spellcheck="false" type="text" class="form-control cantidades" id='costo' placeholder='Costo del articulo...'
                     data-inputmask="'alias': 'numeric', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'">
                    </div>
                    </div>

                    <div class='form-group'>
                    <label for="precio" class="col-sm-2 control-label">Precio:</label>
                    <div class="col-sm-2">
                    <input spellcheck="false" type="text" class="form-control cantidades" id='precio' placeholder='Precio al publico del articulo...'
                     data-inputmask="'alias': 'numeric', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'">
                    </div>
                    </div>
                    <?php 
                      include "./class_lib/class_conecta_mysql.php";
                      $cons= new ConexionMySQL();
                    ?>

                    <div class='form-group'>
                    <label for="proveedor" class="col-sm-2 control-label">Proveedor:</label>
                    <div class="col-sm-4">
                    <div id='pone_provs'></div>
                    </div>
                    </div>

                    <!-- <div class='form-group'>
                    <label for="imagen" class="col-sm-2 control-label">Imagen:</label>
                    <div class="col-sm-2">
                    <div id='btn-imagen'></div>
                    </div>
                    </div> -->
                    <br>
                    <div class="btn-group">
                    <button type='button' class='btn btn-rised btn-primary bt-lg' style="background-color:#fff;border:none;margin-right: 965px;padding: 0;margin-left:15px;outline: none;" onclick='alta_articulo();' id='btn-altas' style="margin-right: 726px;"><img src="css/imgs/add-icon.svg" width="26px" height="26px"></button>
                    <button type='button' class='btn btn-dager btn-raised bt-lg pull-right' style="background-color:#fff;padding:0px;outline: none;" onclick='cancela_alta_articulo();' id='btn-alta-cancela'><img src="css/imgs/clean-icon.svg" style="margin-right: 10px;" width="23px" height="23px" ></button>
                    </div>
                    </form>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="bajas">
                    <form class='form-horizontal' onkeypress="return anular(event)">
                    <div class='form-group'>
                    <label for="codigo_busqueda" class="col-sm-2 control-label">Codigo:</label>
                    <div class="col-sm-3">
                    <input spellcheck="false" type="text" class="form-control" id='codigo_busqueda' onchange="busca_articulo();" placeholder='Codigo del articulo...'>
                    </div>
                    </div>

                    <div id='info_articulo'></div>
                    <br>
                    <div class="btn-group">
                    
                    <button type='button' class='btn btn-sccess btn-lg' style="background-color:#ffffff;border:none;margin-right: 965px;padding: 0;margin-left:15px;outline: none;" onclick='elimina_articulo();' id='btn-procede-baja' disabled><img src="css/imgs/delete-art-icon.svg" style="margin-top: 4px;" width="26px" height="26px"></button>
                    <button type='button' class='btn btn-dangr btn-lg' style="background-color:#ffffff;padding:0px;outline: none;" onclick='cancela_eliminacion();' id='btn-cancela-baja' disabled><img src="css/imgs/clean-icon.svg" style="margin-right: 10px;" style="height:23px;" width="23px" height="23px" ></button>
                    </div>

                    </form>
                  </div><!-- /.tab-pane -->


                  <div class="tab-pane" id="cambios">
                    <form class='form-horizontal' onkeypress="return anular(event)">
                    <div class='form-group'>
                    <label for="codigo_busqueda_cambio" class="col-sm-2 control-label">Codigo:</label>
                    <div class="col-sm-3">
                    <input spellcheck="false" type="text" class="form-control" id='codigo_busqueda_cambio' onchange='busca_articulo_cambio();'  placeholder='Codigo del articulo...'>
                    </div>
                    </div>

                    <div id='info_articulo_cambio'></div>
                    <br>
                    <div class="btn-group">
                    <button type='button' class='btn btn-success btn-lg'  style="background-color:#ffffff;border:none;margin-right: 965px;padding: 0;margin-left:15px;outline: none;" onclick='procede_cambio();' id='btn-procede-cambio'><img src="css/imgs/update-icon.svg" width="24px" height="24px"></button>
                    <button type='button' class='btn btn-danger btn-lg btn-cancel' style="background-color:#ffffff;padding:0px;border:0px;outline: none;" onclick='cancela_cambios();' id='btn-cancela-cambio'><img src="css/imgs/clean-icon.svg" style="margin-top:5px;margin-right: 10px;" width="23px" height="23px" ></button>
                    </div>

                    </form>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->

             </div>
           </div>

           <div class='col-md-12'>
           <div id='lista_articulos' >
           </div>
           </div>
          </div>


        </section><!-- /.content -->
         </div><!-- /.content-wrapper -->


      <!-- Main Footer -->
      <?php
      include('class_lib/main_fotter.php');
      ?>


      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    <div class="MsjAjaxForm"></div>
    <?php include "./class_lib/scripts.php"; ?>
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
    <script src="plugins/number/jquery.inputmask.bundle.js"></script>
    <script src="plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
    <script src="plugins/uploadify/jquery.uploadify.js"></script>
    <script src="plugins/select2/select2.full.min.js"></script>
    <script src="plugins/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="plugins/datepicker/locales/bootstrap-datepicker.es.min.js"></script>
    <script src="dist/js/source_articles.js"></script>
    <script>
      $(document).ready(function(){
      $(".cantidades").inputmask();
      });

      $("#fecha_caducidad").datepicker({
        language: "es",
        format: "yyyy-mm-dd"
      });
    </script>
  </body>
</html>
