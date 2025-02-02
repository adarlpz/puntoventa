<?php include "./class_lib/sesionSecurity.php"; ?>
<html>

<head>
    <title>Ayuda</title>
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" href="css/menu-css.css">
    <link rel="stylesheet" href="css/ayuda-css.css">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="plugins/datepicker/css/bootstrap-datepicker3.css"> </head>

<body style="background-image: url(css/imgs/fondo_ayuda.jpg);" >
<div class="header">
<div>
</div>
</div>


<?php
 $db = mysqli_connect("localhost", "root", "", "db_puntoventa"); 
$file = fopen("C:\Users\brand\apikey.py", "w");

$sum = mysqli_query($db, "SELECT * FROM telefonos"); while ($row = mysqli_fetch_array($sum)) {$telefono1 = $row['tel1']; $telefono2 = $row['tel2']; $telefono3 = $row['tel3']; $phone1 = $telefono1 + '"'; $phone2 = $telefono2 + '"'; $phone3 = $telefono3 + '"'; };

$token = 'TOKEN = "62b619c9193140ab91a1ddcf231805ac"';
$service_id = 'SERVICE_ID = "edf61bb962e246b5bbd86b927b55452d"';
$tel1 = 'NUMERO_TELEFONO = "+52';
$tel2 = 'NUMERO_TELEFONO2 = "+52';
$tel3 = 'NUMERO_TELEFONO3 = "+52';
$comillas = '"';

fwrite($file, $token . PHP_EOL);
fwrite($file, $service_id . PHP_EOL);

fwrite($file, $tel1);
fwrite($file, $phone1);
fwrite($file, $comillas . PHP_EOL );

fwrite($file, $tel2);
fwrite($file, $phone2);
fwrite($file, $comillas . PHP_EOL );

fwrite($file, $tel3);
fwrite($file, $phone3);
fwrite($file, $comillas . PHP_EOL );


fclose($file);

?>

<a href="menu.php" class="logo">
    <img src="css/imgs/atras-icon-deg.svg" height="20px" style="margin-top:15px;margin-left:20px;">
    </a>

<center>
<a href="menu.php" class="logo">
<img src="css/imgs/letras.png">
</a>
</center>

<center>
<div style="margin-top: 150px;" class="botones-1 botones-iniciales">

<div class="grupo-boton">
<a>
    <button onclick="accion_ayuda();" style="margin-left: 310px;" class="boton inicial"><img style="border-radius: 18px; box-shadow: 0 0 15px rgb(0 0 0 / 30%);" class="btn-menu" src="css/imgs/notification-icon.svg" height="100px" ></button>
    </a>
    <p style="color:white;margin-left: 308px;" class="texto-boton-inicial">Notificacion De Alerta</p>
</div>

<div class="grupo-boton">
<a target="blank" href="https://www.textnow.com/messaging">
    <button class="boton"><img style="border-radius: 18px; box-shadow: 0 0 15px rgb(0 0 0 / 30%);" src="css/imgs/llamada-icon.svg" height="100px" ></button>
</a>
    <p style="color:white;" >Llamada</p>
</div>

<div class="grupo-boton">
<a target="blank" href="https://www.jalisco.gob.mx/es/atencion-ciudadana/numeros-de-emergencia">
    <button class="boton"><img style="border-radius: 18px; box-shadow: 0 0 15px rgb(0 0 0 / 30%);" src="css/imgs/number-icon.svg" height="100px" ></button>
</a>
    <p style="color:white;" >Numeros De Emergencia</p>
</div>

</div>
</div>

<a id="config" style="background-color: white;height: 40px;width: 500px;border-radius: 20px;display:block;margin-top: 35px;cursor:pointer;" href="aju-not.php">
    <button style="background-color: white;height: 40px;width: 500px;border: radius 20px;font-weight: 550;background: linear-gradient(#FF0000,#FF6600 );background-clip: border-box;background-clip: border-box;background-clip: border-box;background-clip: border-box;-webkit-background-clip: text;color: transparent;" class="boton">AJUSTES DE NOTIFICACION</button>
</a>

</center>
<script src="dist/js/source_point_sales.js"></script>
</body>

</html>
<?php