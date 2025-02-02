<?php
session_start();
if($_SESSION['autorizado']<>1){
    header("Location: index.php");
}

date_default_timezone_set("America/Chihuahua");
 $codigo=$_POST['codigo'];
  $total=$_POST['total'];
  if($yapuso=="0"){

  $monto = $_POST["preciou"];
  $montocosto = $_POST["costou"];
  $ventas = 1;

  $db = mysqli_connect("localhost", "root", "", "db_puntoventa");

  $sql = "INSERT INTO ingresos (ventas, vendido, gasto) VALUES (1, 2, 3)";
  mysqli_query($db, $sql);

  }else{
  }
 ?>