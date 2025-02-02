<?php
            $db = mysqli_connect("localhost", "root", "", "db_puntoventa");
            $holiwiss = 1;
            $gasto_total = $_POST["costo_de_la_venta"];
            $total_total = $_POST["total_de_la_venta"];
  
            $sum = mysqli_query($db, "SELECT * FROM estadisticas");
            while ($row = mysqli_fetch_array($sum)) {
            $holiwiss_old = $row['ventas'];
            $total_total_old = $row['vendido'];
            $gasto_total_old = $row['gastado'];
  
            $holiwiss_new = $holiwiss_old + $holiwiss;
            $total_total_new = $total_total_old + $total_total;
            $gasto_total_new = $gasto_total_old + $gasto_total;
            }
            $sql = "UPDATE estadisticas SET ventas = '$holiwiss_new', vendido = '$total_total_new', gastado = '$gasto_total_new' ";  mysqli_query($db, $sql); 
          ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Venta Exitosa</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="login_fallido.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="../olvidaste.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300&display=swap" rel="stylesheet"> </head>

<body class="programa_body box-preset-venta"> 
    <center>
        <div class="cuadrado_fail">
            <p class="titulo_del_login">Venta Exitosa</p>
            <p class="olvidaste_text">Se Acaba De Completar Una Venta Exitosamente</p> <img src="../../docs/correct-icon.svg" alt="" width="50px" height="50px">
            <div class="btn_volver">
                <a href="http://localhost/electron-products-test-master/punto-venta.php"> <button style="margin-bottom:1px;outline:none;" id="contact_register_btn2" type="button" value="register">VENDER DE NUEVO</button> </a>
            </div>
        </div>
    </center>
</body>

</html>
<?php