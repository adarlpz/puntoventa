<?php

$db = mysqli_connect("localhost", "root", "", "db_puntoventa");

$user = $_POST["totales_input"];
echo $user;

$costos = $_POST["costos_input"];
echo $costos;
 ?>