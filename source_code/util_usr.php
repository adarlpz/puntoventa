<?php include "./class_lib/sesionSecurity.php"; 
 $db = mysqli_connect("localhost", "root", "", "db_puntoventa"); ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <title>Usuarios</title>
    <?php include "./class_lib/links.php"; ?>
  </head>
  <body style="background-image: url(css/imgs/fondo-point-venta.jpg);" onload="pone_users_registrados();">

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
        include('class_lib/class_conecta_mysql.php');
        ?>
        <!-- /.sidebar -->
      </aside>

      <a href="menu.php" class="logo">
    <img src="css/imgs/atras-icon-deg.svg" height="20px" style="margin-top:15px;margin-left:20px;">
      </a>

      <center>
    <a href="menu.php" class="logo">
    <img src="css/imgs/letras-megras.png" style="height:90px;">
    </a>
    </center>

      <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <ol class="breadcrumb">
            <li><a href="inicio.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Usuarios</li>
          </ol>
        </section>
        
        <!-- Main content -->
        <section class="content">
         <div class='row'>

         <div class='col-md-12'>
         <div style="width: 650px;margin-left: 210px;border-radius: 20px;" id='users_registrados'></div>
         </div>
         </div>

         <div class='col-md-3'>
         <div class='box  box-settings box-warning' style="width: 650px !important;margin-left: 195px;border-radius: 20px; box-shadow: 0 0 8px rgba(0, 0, 0, .3);">
         <div class="box-header with-border">
         <h3 style="margin-left: 10px;" class='box-title'>Eliminar Un Usuario</h3>
         </div>
         <div class='box-body' style="margin-left:15px;">
         <div class='form-group'>
         <label style="font-weight:600 !important;font-weight: 500 !important;" >Selecciona El Usuario A Eliminar :</label>
         <div>
         <form action="src/views/delete-user.php" method="POST" >
         <img style="outline:none;margin-right:240px;top: 32px;position: relative;margin-left: 16px;" src="css/imgs/identify-card-icon.svg" class="imagen-de-usuario" alt="User Image" height="23px">
         <select method="POST" name="user" style="padding-left: 50px;" class='form-control' id='numcaja'>
         </div>
         <?php
          $db = mysqli_connect("localhost", "root", "", "db_puntoventa");
         $consulta = "SELECT * FROM usuarios";
         $execute = mysqli_query($db ,$consulta)
         
         ?>

         <?php foreach($execute as $opciones): ?>

        <option value="<?php echo $opciones["nombre"]?>"><?php echo $opciones["nombre"]?></option>

        <?php endforeach ?>

         </select>
         <br>
         <input style="float: right !important;background: linear-gradient(130deg, #00E6FF 0%, #0090D4 100%);border: 2.5px solid #fff;border-radius: 25px; width: 120px;font-size:15px;color: white;height:37.5px;outline:none;" type="submit" value="Eliminar" name="Enviar" ></input>
         <form>
         </div>
         </div>
         </div>
         </div>
          <!-- Your Page Content Here -->

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
    <script src="dist/js/source_parameters.js"></script>
  </body>
</html>