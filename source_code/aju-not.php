<?php include "./class_lib/sesionSecurity.php"; 
$db = mysqli_connect("localhost", "root", "", "db_puntoventa"); ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <title>Ajustes De Notificacion De Alerta</title>
    <link rel="stylesheet" href="css/parametros.css">
    <?php include "./class_lib/links.php"; ?>
  </head>
  <body onload="pone_users_registrados();" style="background-image: url(css/imgs/fondo_ayuda.jpg);">

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
        include('class_lib/class_conecta_mysql.php');
        ?>
        <!-- /.sidebar -->
      </aside>

      <a href="ayuda.php" class="logo">
    <img src="css/imgs/atras-icon-deg.svg" height="20px" style="margin-top:15px;margin-left:20px;">
    </a>

      <center>
    <img src="css/imgs/letras.png" style="height:90px;">
    </center>

      <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <ol class="breadcrumb">
            <li><a href="inicio.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Parametros de Aplicacion</li>
          </ol>
        </section>

        <!-- Main content -->

        <section class="content">
          
         <div class='row'>
         <div class='col-md-12'>
         <div style="width: 650px !important; margin-left: 195px; border-radius: 20px; box-shadow: 0 0 8px rgba(0, 0, 0, .3);" class='box box-warning'>
         <div class="box-header with-border">
         <h3 style="margin-left: 10px;" class='box-title'>Establecer Numeros De Emergencia</h3>
         </div>
         <div class='box-body'>
         <form class="form-horizontal">
         <div style="display: flex; flex-direction: column;" class='form-group'>
                    <label for="codigo" style="width: 120px;margin-left: 10px;font-weight: 500;" class="col-sm-2 control-label">Telefono 1 :</label>
                    <div class="col-sm-5">
                    <img style="outline:none;margin-right:240px;top: 30px;position: relative;margin-left: 30px;" src="css/imgs/bell_1.svg" class="imagen-de-usuario" alt="User Image" height="23px">
                    <input style="margin-left: 20px;padding-left: 35px;width: 590px;" type="text" class="form-control" id='nombre' required>
                    </div>
                    </div>

                    <div style="display: flex; flex-direction: column;" class='form-group'>
                    <label for="codigo" style="width: 120px;margin-left: 10px;font-weight: 500;" class="col-sm-2 control-label">Telefono 2 :</label>
                    <div class="col-sm-3">
                    <img style="outline:none;margin-right:240px;top: 30px;position: relative;margin-left: 30px;" src="css/imgs/bell_2.svg" class="imagen-de-usuario" alt="User Image" height="23px">
                    <input style="margin-left: 20px;padding-left: 35px;width: 590px;" type="text" class="form-control" id='clave'  required>
                    </div>
                    </div>

         <div style="display: flex; flex-direction: column;" class='form-group'>
                    <label for="codigo" style="width: 122px;margin-left: 10px;font-weight: 500;" class="col-sm-2 control-label">Telefono 3 :</label>
                    <div class="col-sm-3">
                    <img style="outline:none;margin-right:240px;top: 30px;position: relative;margin-left: 16px;" src="css/imgs/bell_3.svg" class="imagen-de-usuario" alt="User Image" height="23px">
                    <input style="margin-left: 20px;padding-left: 35px;width: 590px;" type="text" class="form-control" id='pass' required>
                    </div>
                    </div>

         </form>
         </div>
         <div class='box-footer'>
         <button style="float: right !important;background: linear-gradient(130deg, #FF0000 0%, #FF6600 100%);border: 2.5px solid #fff;border-radius: 25px; width: 120px;font-size:15px;outline:none;" type='button' class='btn btn-danger pull-right btn-confirm-settings' onclick='registra_usr();' id='btn-reg-usr'>Establecer</button>
         </div>
         </div>
         </div>

        </section><!-- /.content -->
         </div><!-- /.content-wrapper -->

         <div class='col-md-12'>
         <div style="width: 650px;margin-left: 195px;border-radius: 20px;" id='users_registrados'></div>
         </div>
         </div>



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
    <script src="dist/js/source_phones.js"></script>
  </body>
</html>