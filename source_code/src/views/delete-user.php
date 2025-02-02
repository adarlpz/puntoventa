<?php

$db = mysqli_connect("localhost", "root", "", "db_puntoventa");

$user = $_POST["user"];

$consulta = "DELETE FROM usuarios WHERE nombre='{$user}'";

if(mysqli_query($db, $consulta)){

} else{

}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Usuario Eliminado</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="login_fallido.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="../olvidaste.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300&display=swap" rel="stylesheet"> </head>

<body style="background-image: url(../../css/imgs/delete-user.jpg);" class="programa_body box-preset">
    <center>
        <div class="cuadrado_fail">
            <p class="titulo_del_login">Usuario Eliminado</p>
            <p class="olvidaste_text">El Usuario Se Ha Eliminado Correctamente, Porfavor Inicie Sesion De Nuevo.</p> <img src="../../docs/correct-icon.svg" width="50px" height="50px" alt="">
            <div class="btn_volver">
                <a href="http://localhost/electron-products-test-master/"> <button style="margin-bottom:1px;outline:none;" id="contact_register_btn2" type="button" value="register">INICIAR SESION</button> </a>
            </div>
        </div>
    </center>
</body>

</html>
<?php