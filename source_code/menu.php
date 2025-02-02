<?php include "./class_lib/sesionSecurity.php"; ?>
<html>

<?php
            error_reporting(0);
            $db = mysqli_connect("localhost", "root", "", "db_puntoventa");
            // Obteniendo la fecha actual del sistema con PHP
            $fechaActual = date('d');

            if ($fechaActual == "28") {
              $sum2 =  mysqli_query($db, "SELECT * FROM switch"); while ($row = mysqli_fetch_array($sum2)) {$estate = $row['estate'];} 

              if ($estate == 0) {
                  echo "holaaaa";
                $db = mysqli_connect("localhost", "root", "", "db_puntoventa");
                $sum = mysqli_query($db, "SELECT * FROM estadisticas"); while ($row = mysqli_fetch_array($sum)) {$total = $row['vendido']; $gasto = $row['gastado']; $profit = $total - $gasto;} 
  
                $mes = date('m');
  
                if ($mes == 01) {
                  $mes_actual = "enero";
                }
    
                if ($mes == 02) {
                  $mes_actual = "febrero";
                }
    
                if ($mes == 03) {
                  $mes_actual = "marzo";
                }
    
                if ($mes == 04) {
                  $mes_actual = "abril";
                }
    
                if ($mes == 05) {
                  $mes_actual = "mayo";
                }
    
                if ($mes == 06) {
                  $mes_actual = "junio";
                }
    
                if ($mes == 07) {
                  $mes_actual = "julio";
                }
    
                if ($mes == 08) {
                  $mes_actual = "agosto";
                }
    
                if ($mes == 09) {
                  $mes_actual = "septiembre";
                }
    
                if ($mes == 11) {
                  $mes_actual = "noviembre";
                }
    
                if ($mes == 12) {
                  $mes_actual = "diciembre";
                }
  
                $ingresos2 = mysqli_query($db, "UPDATE estadisticas_mensuales set $mes_actual=$profit");
                $delete = mysqli_query($db, "UPDATE estadisticas set ventas=0, vendido=0, gastado=0");
                $switch_estate = mysqli_query($db, "UPDATE switch set estate=1");
              }
            }

            if ($fechaActual == "29") {
              $switch_estate2 = mysqli_query($db, "UPDATE switch set estate=0");
            }
          ?>

<head>
    <title>Inicio</title>
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" href="css/menu-css.css">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="plugins/datepicker/css/bootstrap-datepicker3.css"> </head>

<body>
<div class="header">
<div>
<li class="user-header">
<a style="outline:none;" href="util_usr.php">
    <img style="outline:none;" src="css/imgs/user-icon.svg" class="img-circle imagen-de-usuario" alt="User Image" height="26px">
</a>
    <p style="color: #fff" class="texto-usuario">
        <?php echo $_SESSION['nombre_de_usuario']; ?>
    </p>
</li>
</div>
<div style="display: flex;flex-direction: row;float: right;width: 100%;">
    <a href="endsession.php" style="margin-left: 96%;outline:none;" class="btn btn-danger btn-block btn-exit-system boton-salir-logout"><i class='fa fa-power-off'></i><img src="css/imgs/apagar-icon.svg" class="salir-logout-img" height="20px" style="margin-top:17px;outline:none;"></a>
    </li>
    </div>
</div>

<center>
<a href="menu.php" class="logo">
<img src="css/imgs/letras.png">
</a>
</center>

<center>
<div style="margin-top: 75px;" class="botones-1 botones-iniciales">

<div class="grupo-boton">
<a href="punto-venta.php">
    <button class="boton inicial"><img style="border-radius: 18px; box-shadow: 0 0 15px rgb(0 0 0 / 30%);" class="btn-menu" src="css/imgs/ventas-icon.svg" height="85px" ></button>
    </a>
    <p class="texto-boton-inicial">Ventas</p>
</div>

<div class="grupo-boton">
<a href="ayuda.php">
    <button class="boton"><img style="border-radius: 18px; box-shadow: 0 0 15px rgb(0 0 0 / 30%);" src="css/imgs/ayuda-icon.svg" height="85px" ></button>
</a>
    <p>Ayuda</p>
</div>

<div class="grupo-boton">
<a href="ingresos.php">
    <button class="boton"><img style="border-radius: 18px; box-shadow: 0 0 15px rgb(0 0 0 / 30%);" src="css/imgs/ingresos-icon.svg" height="85px" ></button>
</a>
    <p>Estadisticas</p>
</div>

<div class="grupo-boton">
<a href="abc_articulos.php">
    <button class="boton"><img style="border-radius: 18px; box-shadow: 0 0 15px rgb(0 0 0 / 30%);" src="css/imgs/productos-icon.svg" height="85px" ></button>
    </a>
    <p>Articulos</p>
</div>

<div class="grupo-boton">
<a href="aju_inventarios.php">
    <button class="boton"><img style="border-radius: 18px; box-shadow: 0 0 15px rgb(0 0 0 / 30%);" src="css/imgs/inventario-icon.svg" height="85px" ></button>
    </a>
    <p>Inventario</p>
</div>

<div class="grupo-boton">
<a>
    <button onclick = "accion();" class="boton"><img style="border-radius: 18px; box-shadow: 0 0 15px rgb(0 0 0 / 30%);" src="css/imgs/servicios-icon.svg" height="85px" ></button>
</a>
    <p>Servicios</p>
</div>

</div>

<div class="botones-1 botones-iniciales">

<div class="grupo-boton">
<a>
    <button onclick="accion_calc()" class="boton inicial"><img style="border-radius: 18px; box-shadow: 0 0 15px rgb(0 0 0 / 30%);" src="css/imgs/calculadora-icon.svg" height="85px" ></button>
</a>
    <p class="texto-boton-inicial">Calculadora</p>
</div>

<div class="grupo-boton">
<a href="http://localhost/electron-products-test-master/deudas.php">
    <button class="boton"><img style="border-radius: 18px; box-shadow: 0 0 15px rgb(0 0 0 / 30%);" src="css/imgs/deudas-icon.svg" height="85px" ></button>
</a>
    <p>Deudas</p>
</div>

<div class="grupo-boton">
<a href="#">
    <button onclick="open_camera();" class="boton"><img style="border-radius: 18px; box-shadow: 0 0 15px rgb(0 0 0 / 30%);" src="css/imgs/camaras-icon.svg" height="85px" ></button>
</a>
    <p>Seguridad</p>
</div>

<div class="grupo-boton">
<a href="abc_provs.php">
    <button class="boton"><img style="border-radius: 18px; box-shadow: 0 0 15px rgb(0 0 0 / 30%);" src="css/imgs/proveedores-icon.svg" height="85px" ></button>
</a>
    <p>Proveedores</p>
</div>

<div class="grupo-boton">
<a target="_blank" href="https://adaritdev.com/soporte/">
    <button class="boton"><img style="border-radius: 18px; box-shadow: 0 0 15px rgb(0 0 0 / 30%);" src="css/imgs/soporte-icon.svg" height="85px" ></button>
    </a>
    <p>Soporte</p>
</div>

<div class="grupo-boton">
<a href="parametros.php">
    <button class="boton"><img style="border-radius: 18px; box-shadow: 0 0 15px rgb(0 0 0 / 30%);" src="css/imgs/ajustes-icon.svg" height="85px" ></button>
</a>
    <p>Ajustes</p>
</div>

</div>
</center>

<center>
<img src="css/imgs/none_dark_desk.svg" style="margin-top: 30px;" height="40px" >
<p style="color:white;">Software Desarrollado Por Adarit</p>
<a href="https://www.facebook.com/Adaritdev-110161264666139"><img src="css/imgs/facebok_vector.svg" class="boton_redes_sociales" style="margin-right:8px" width="16px" height="16px" ></a>
<a href="https://www.instagram.com/adarit.dev/"><img src="css/imgs/instagram_vector.svg" class="boton_redes_sociales" style="margin-right:8px" width="16px" height="16px" ></a>
<a href="https://twitter.com/adaritdev"><img src="css/imgs/twiter_vector.svg" class="boton_redes_sociales" style="margin-right:8px" width="16px" height="16px" ></a>
<a href="https://www.whatsapp.com/"><img src="css/imgs/whastapp_vector.svg" class="boton_redes_sociales" width="16px" height="16px" ></a>

</center>
<script src="dist/js/source_point_sales.js"></script>
</body>

</html>
<?php