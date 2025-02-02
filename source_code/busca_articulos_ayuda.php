<?php
session_start();
if($_SESSION['autorizado']<>1){
    header("Location: index.php");
}
error_reporting(0);
require('class_lib/class_conecta_mysql.php');
require('class_lib/funciones.php');
$db=new ConexionMySQL();
$art=test_input($_POST['articulo']);
$cadena=$db->consulta("Select codigo, descripcion, costo, precio from articulos where descripcion like '%$art%'");
if($db->numero_de_registros($cadena)>0){
    echo "<table class='table table-bordered table-hover'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th style='text-align: center;' >Codigo</th>";
    echo "<th style='text-align: center;' >Nombre</th>";
    echo "<th style='text-align: center;' >Costo</th>";
    echo "<th style='text-align: center;' >Precio</th>";
    echo "<th style='text-align: center;' >Acciones</th>";
    echo "<tbody>";
  while($gt=$db->buscar_array($cadena)){
    echo "<tr>";
    echo "<td style='text-align: center;' >".$gt['codigo']."</td>";
    echo "<td style='text-align: center;' >".$gt['descripcion']."</td>";
    echo "<td style='text-align: center;' >".$gt['costo']."</td>";
    echo "<td style='text-align: center;' >".$gt['precio']."</td>";
    echo "<td><button style='background: transparent;margin-left: 50px;' type='button' id='".$gt['codigo']."' class='btn btn-primary btn-xs' onclick='add_art(this.id);'><img src='css/imgs/correct-icon-de.svg' width='18' height='18'></button></td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
}else{
  echo "<div style='border-radius: 20px;' class='callout callout-danger'>No se encontraron coincidencias</div>";
}

?>