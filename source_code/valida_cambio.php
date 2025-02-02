<?php include "./class_lib/sesionSecurity.php"; ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <title>SerMac | Software</title>
    <?php include "./class_lib/links.php"; ?>
  </head>
  </head>
  <body style="background-color:#ECECEC ;" >
  <center>

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <?php
        include('class_lib/nav_header.php');
        ?>

      </header>
      <!-- Left side column. contains the logo and sidebar -->

      <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <ol class="breadcrumb">
            <li><a href="inicio.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Validar Acceso</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content content-validate">
          <!-- Your Page Content Here -->
          <div class='col-md-4'>
          <div class='box box-primary' style="margin-left:320px;width:400px;margin-top:60px;">
          <div class='box-body'>
          <center>
            <img src="css/imgs/icon_app.png"  class="image-login" alt="">
          </center>
          <label style="font-size:20px;font-weight:600;margin-bottom:30px;" class="control-label label-login" for="UserName">Verificacion</label>
          <form class='horizontal' onkeypress="return pulsar(event)">
            <div class='input-grop'>
            <label class="control-label label-login" for="UserName">Contraseña De Acceso</label>
            <input style="outline:none;width:250px;text-align:center;" type='password' id='pass' class='form-control' required autofocus>
            <input type='hidden' id='opcion' value='<?php echo $opt?>'>
            </div>
          </form>
          </div>
          <div class='box-footer'>
          <button type='button' class='btn btn-primary' style="width: 300px;float:none;margin-top:30px;margin-bottom:10px;border:0px;" onclick="valida_acceso();" id='btn-valida'> Acceder</button>
          </div>
          </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->


      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    <div class="MsjAjaxForm"></div>
    <?php include "./class_lib/scripts.php"; ?>
    <script src="dist/js/source_utils.js"></script>
    </center>
  </body>
</html>