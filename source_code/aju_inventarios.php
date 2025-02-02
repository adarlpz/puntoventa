<?php include "./class_lib/sesionSecurity.php"; ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
  <link rel="stylesheet" href="css/update.css">
    <title>Inventario De Articulos</title>
    <?php include "./class_lib/links.php"; ?>
  </head>
  <body onload="lista_existencias();" style="background-image: url(css/imgs/fondo-point-venta.jpg);" >
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
        <!-- Content Header (Page header) -->
        <div class="caja-de-contenido-back-inventarios" >
        <section class="content-header">
          <ol class="breadcrumb">
            <li><a href="inicio.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Ajuste de Inventarios</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <!-- Your Page Content Here -->
         <div class='col-md-4'>
         <div style="box-shadow: 0 0 10px rgba(0, 0, 0, .4);" class='box box-primary'>
         <div class=''>
         </div>
         <div class='box-body' style="padding:20px !important;">
         <form class='form-horizontal'>
         <center>
            <img src="css/imgs/icon_app.png" style="margin-bottom:30px;" class="image-login" alt="">
          </center>
         <div class='form-grup'>
         <label style="margin-right: 193px;" class="control-label label-login" for="UserName">Codigo :</label>
         <div style="display:flex; flex-direction: column;">
         <img style="outline:none;margin-right:240px;top: 25px;position: relative;left: 5px;height: 18px;" src="css/imgs/code.svg" class="imagen-de-usuario" alt="User Image" height="23px">
            <input spellcheck="false" type="text" style="width: 250px;text-align:center;text-align: start;padding-left: 33px;" class="form-control" id='codigo' onchange='busca_articulo();' required autofocus>
          </div>
            </div>
            <div class='form-goup'>
            <center>
            <label style="margin-right: 193px;" class="control-label label-login" for="UserName">Articulo :</label>
            <div style="display:flex; flex-direction: column;">
            <img style="outline:none;margin-right:240px;top: 25px;position: relative;left: 5px;height: 19px;" src="css/imgs/shop-car.svg" class="imagen-de-usuario" alt="User Image" height="23px">
                    <input spellcheck="false" type="text"  style="width: 250px;text-align:center;text-align: start;padding-left: 33px;"  class="form-control" id='descripcion' disabled>
                    </div>
                    </center>
            </div>
            <div class='form-goup'>
            <center>
            <label style="margin-right: 193px;" class="control-label label-login" for="UserName">Suma :</label>
            <div style="display:flex; flex-direction: column;">
            <img style="outline:none;margin-right:240px;top: 25px;position: relative;left: 5px;height: 22px;" src="css/imgs/box-up.svg" class="imagen-de-usuario" alt="User Image" height="23px">
                    <input spellcheck="false" style="text-align: start;padding-left: 33px;" type="text" class="form-control validar" id='exis_actual'
                    data-inputmask="'alias': 'numeric', 'autoGroup': true, 'digits': 2, 'digitsOptional': false" disabled>
                    </div>

                    <div style="display: none;" class='form-group'>
                   <label for="exis_anterior" style="margin-right: 193px;" class="control-label label-login">Anterior:</label>
                    <input style="text-align: start;padding-left: 33px;" type="text" class="form-control" id='exis_anterior' placeholder='Existencia...' disabled>
            </div>

                    </center>
            </div>
          </form>
         </div>
         <div class='box-footer'>
         <button id="boton-add-list" type='button' class='btn btn-primary pull-left btn-add-list-inv' style="width:100%;background: linear-gradient(130deg, #00E6FF 0%, #0090D4 100%);border-radius: 20px;margin-top: 20px;border: 2.5px solid #fff;outline:none;" onclick='verifica_tabla_existencia();agrega_a_lista();'>Agregar a la lista</button>
         </div>
         </div>
         </div>
         <div class='col-md-8'>
         <div style="box-shadow: 0 0 10px rgba(0, 0, 0, .4);" class='box box-primary disminuir-largo'>
         <div class=''>
         </div>
         
         <div class='box-body'>
         <table id='lista_articulos_existencias' class='table table-bordred'>
         <thead>
         <tr>
         <th>Codigo</th><th>Nombre</th><th>Productos Recibidos</th><th>Acciones</th>
         </tr>
         </thead>
         <tbody>
         </tbody>
         </table>
         </div>
         <div class='box-footer'>
         <button class='btn btn-primry pull-left' style="background-color: #ffffff;outline: none;" onclick='procesa_lista_ajustes();'><img src="css/imgs/add-icon.svg" width="26px" height="26px"></button>
         <button class='btn btn-dnger pull-right' style="background-color: #ffffff;outline: none;" onclick='cancela_todo();'><img src="css/imgs/clean-icon.svg" width="23px" height="23px" ></button>
         </div>
         </div>
         </div>

         <div class='col-md-8'>
           <div  id='lista_existencias' >
           </div>
           </div>
          </div>

        </section><!-- /.content -->
        </div>
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->


      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    <div class="MsjAjaxForm"></div>
    <?php include "./class_lib/scripts.php"; ?>
    <script src="dist/js/source_ajuinvs.js"></script>
    <script src="validar.js"></script>
    <script src="plugins/number/jquery.inputmask.bundle.js"></script>
    <script src="plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
  </body>
</html>