<?php
session_start();
if($_SESSION['autorizado']<>1){
    header("Location: index.php");
}
error_reporting(0);
require('class_lib/class_conecta_mysql.php');
require('class_lib/funciones.php');

$db=new ConexionMySQL();

$nombre=test_input(strtoupper($_POST['nombre']));
$precio=test_input($_POST['monto'])

$inserta_deuda="Insert into deudas(nombre,monto) values(
'$nombre','$monto')";
$exec=$db->consulta($inserta_deuda);
echo "1";
?>
