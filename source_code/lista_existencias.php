<?php
session_start();
if($_SESSION['autorizado']<>1){
    header("Location: index.php");
}
error_reporting(0);
require('class_lib/class_conecta_mysql.php');

$db=new ConexionMySQL();

$cadena="Select * from existencias";
$exe=$db->consulta($cadena);
if($db->numero_de_registros($exe)>0){
  echo "<div class='box box-primary'>";
  echo "<div class='box-header'>";
  echo "<h3 class='box-title'>Existencias De Articulos</h3>";
  echo "</div>";
  echo "<div class='box-body'>";
 echo "<table id='tabla_existencias' class='table table-hover table-condensed'>";
 echo "<thead>";
 echo "<tr>";
 echo "<th style='position:relative;left:110px;' >Codigo</th><th style='position:relative;left:138px;' >Existencia</th>";
 echo "</tr>";
 echo "</thead>";
 echo "<tbody>";
 while($e=$db->buscar_array($exe)) {
   echo "<tr>";
   echo "<td style='text-align: center;'>$e[codigo]</td>";
   echo "<td style='text-align: center;'>$e[cantidad]</td>";
   echo "</tr>";
 }

 echo "</tbody>";
 echo "</table>";
 echo "</div>";
 echo "</div>";
}else{
 echo "<b>Actualmente no hay articulos registrados...</b>";
}
?>