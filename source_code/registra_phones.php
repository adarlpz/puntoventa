<?php
session_start();
if($_SESSION['autorizado']<>1){
    header("Location: index.php");
}
error_reporting(0);
require('class_lib/class_conecta_mysql.php');
require('class_lib/funciones.php');
$db=new ConexionMySQL();
$nombre=test_input($_POST['nombre']);
$clave=test_input($_POST['clave']);
$pass=test_input($_POST['pass']);
$cadena=$db->consulta("update telefonos set tel1=$nombre, tel2=$clave, tel3=$pass");
?>