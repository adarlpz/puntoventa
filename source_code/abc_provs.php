<?php include "./class_lib/sesionSecurity.php"; ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <title>Proveedores</title>
    <?php include "./class_lib/links.php"; ?>
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <link href="plugins/jtable/themes/themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
    <link href="plugins/jtable/jquery-ui.structure.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/jtable/themes/metro/blue/jtable.min.css" rel="stylesheet" type="text/css" />
  </head>
  <body style="background-image: url(css/imgs/fondo-point-venta.jpg);" onload="">

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
        <section class="content-header">
          <ol class="breadcrumb">
            <li><a href="inicio.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Proveedores.</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->
          <div class='row'>
          <div class='col-md-6'>
           <form class='form-horizontal'>
           <div class="input-group input-group-sm">
           <input spellcheck="false" type='text' class='form-control' id='name' placeholder='Escribe el nombre del proveedor o parte de este para realizar una busqueda...'>
           <span class="input-group-btn">
           <button class="btn btn-info btn-flat" type='button' id="CargarRegistros">Buscar...</button>
           </span>
           </div>
           </form>
           </div>
          </div>
          <br>
          <div class='row'>
          <div class='col-md-12'>
          <div id='tabla_proveedores' style="margin-left:15px;margin-right:15px;box-shadow: 0 0 15px rgba(0, 0, 0, .4);border-radius: 20px;" ></div>
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
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="dist/js/source_lines.js"></script>
    <script src="plugins/jtable/jquery-ui.js" type="text/javascript"></script>
    <script src="plugins/jtable/jquery.jtable.js" type="text/javascript"></script>
    <script src="dist/js/source_provs.js"></script>
  </body>
</html>