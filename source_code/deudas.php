<?php include "./class_lib/sesionSecurity.php";
    // initialize errors variable
 $errors = "";
 error_reporting(0);

 // connect to database
 $db = mysqli_connect("localhost", "root", "", "db_puntoventa");


 // insert a quote if submit button is clicked
 if (isset($_POST['submit'])) {
  if (empty($_POST['task'])) {
    $validart = 0;
    header('location: http://localhost/electron-products-test-master/src/views/deuda-none.php');
  }else {
    $validart = 1;
  }
  if (empty($_POST['mount'])) {
    $validarm = 0;
    header('location: http://localhost/electron-products-test-master/src/views/deuda-none.php');
  } else {
    $validarm = 2;
  } 

  $validar = $validart + $validarm;
  if ($validar == 3) {
    $task = $_POST['task'];
  
    $buscar_a   = 'a';
    $posicion_coincidencia = strpos($task, $buscar_a);

    if ($posicion_coincidencia === false) {

      } else {
          $a = 1;
              }
    
    $buscar_b   = 'b';
    $posicion_coincidencia = strpos($task, $buscar_b);

    if ($posicion_coincidencia === false) {

      } else {
          $b = 2;
              }
              
    $buscar_c   = 'c';
    $posicion_coincidencia = strpos($task, $buscar_c);

    if ($posicion_coincidencia === false) {

      } else {
          $c = 3;
              }
    
    $buscar_d   = 'd';
    $posicion_coincidencia = strpos($task, $buscar_d);

    if ($posicion_coincidencia === false) {

      } else {
          $d = 4;
              }

    $buscar_e   = 'e';
    $posicion_coincidencia = strpos($task, $buscar_e);

    if ($posicion_coincidencia === false) {

      } else {
          $e = 5;
              }
    
    $buscar_f   = 'f';
    $posicion_coincidencia = strpos($task, $buscar_f);

    if ($posicion_coincidencia === false) {

      } else {
          $f = 6;
              }
              
    $buscar_g   = 'g';
    $posicion_coincidencia = strpos($task, $buscar_g);

    if ($posicion_coincidencia === false) {

      } else {
          $g = 7;
              }
    
    $buscar_h   = 'h';
    $posicion_coincidencia = strpos($task, $buscar_h);

    if ($posicion_coincidencia === false) {

      } else {
          $h = 8;
              }

    $buscar_i   = 'i';
    $posicion_coincidencia = strpos($task, $buscar_i);

    if ($posicion_coincidencia === false) {

      } else {
          $i = 9;
              }
    
    $buscar_j   = 'j';
    $posicion_coincidencia = strpos($task, $buscar_j);

    if ($posicion_coincidencia === false) {

      } else {
          $j = 10;
              }
              
    $buscar_k   = 'k';
    $posicion_coincidencia = strpos($task, $buscar_k);

    if ($posicion_coincidencia === false) {

      } else {
          $k = 11;
              }
    
    $buscar_l   = 'l';
    $posicion_coincidencia = strpos($task, $buscar_l);

    if ($posicion_coincidencia === false) {

      } else {
          $l = 12;
              }

    $buscar_m   = 'm';
    $posicion_coincidencia = strpos($task, $buscar_m);

    if ($posicion_coincidencia === false) {

      } else {
          $m = 13;
              }
    
    $buscar_n   = 'n';
    $posicion_coincidencia = strpos($task, $buscar_n);

    if ($posicion_coincidencia === false) {

      } else {
          $n = 14;
              }
              
    $buscar_ñ   = 'ñ';
    $posicion_coincidencia = strpos($task, $buscar_ñ);

    if ($posicion_coincidencia === false) {

      } else {
          $ñ = 15;
              }
    
    $buscar_o   = 'o';
    $posicion_coincidencia = strpos($task, $buscar_o);

    if ($posicion_coincidencia === false) {

      } else {
          $o = 16;
              }
       
    $buscar_p   = 'p';
    $posicion_coincidencia = strpos($task, $buscar_p);

    if ($posicion_coincidencia === false) {

      } else {
          $p = 17;
              }
    
    $buscar_q   = 'q';
    $posicion_coincidencia = strpos($task, $buscar_q);

    if ($posicion_coincidencia === false) {

      } else {
          $q = 18;
              }
              
    $buscar_r   = 'r';
    $posicion_coincidencia = strpos($task, $buscar_r);

    if ($posicion_coincidencia === false) {

      } else {
          $r = 19;
              }
    
    $buscar_s   = 's';
    $posicion_coincidencia = strpos($task, $buscar_s);

    if ($posicion_coincidencia === false) {

      } else {
          $s = 20;
              }

    $buscar_t   = 't';
    $posicion_coincidencia = strpos($task, $buscar_t);

    if ($posicion_coincidencia === false) {

      } else {
          $t = 21;
              }
    
    $buscar_u   = 'u';
    $posicion_coincidencia = strpos($task, $buscar_u);

    if ($posicion_coincidencia === false) {

      } else {
          $u = 22;
              }
        
    $buscar_v   = 'v';
    $posicion_coincidencia = strpos($task, $buscar_v);

    if ($posicion_coincidencia === false) {

      } else {
          $v = 23;
              }
    
    $buscar_w   = 'w';
    $posicion_coincidencia = strpos($task, $buscar_w);

    if ($posicion_coincidencia === false) {

      } else {
          $w = 24;
              }
              
    $buscar_x   = 'x';
    $posicion_coincidencia = strpos($task, $buscar_x);

    if ($posicion_coincidencia === false) {

      } else {
          $x = 25;
              }
    
    $buscar_y   = 'y';
    $posicion_coincidencia = strpos($task, $buscar_y);

    if ($posicion_coincidencia === false) {

      } else {
          $y = 26;
              }
                  
    $buscar_z   = 'z';
    $posicion_coincidencia = strpos($task, $buscar_z);

    if ($posicion_coincidencia === false) {

      } else {
          $z = 27;
              }

          $ident = $a + $b + $c + $d + $e + $f + $g + $h + $i + $j + $k + $l + $m + $n + $ñ + $o + $p + $q + $r + $s + $t + $u + $v + $w + $x + $y + $z;
    $mount = $_POST['mount'];
    $ident2 = 0;
    $ident3 = $ident2++;
    $sql = "INSERT INTO tasks (ident, task, mount) VALUES ('$ident3', '$task', '$mount')";
    mysqli_query($db, $sql);
  }
 }

 if (isset($_GET['del_task'])) {
  $ident3 = $_GET['del_task'];
 
  mysqli_query($db, "DELETE FROM tasks WHERE ident=".$ident3);

  header('location: http://localhost/electron-products-test-master/deudas.php');
 }

 ?>

<html>
<head>
 <title>Deudas</title>
 <link rel="stylesheet" type="text/css" href="css/deudas.css">   
 <script src="validarinput.js"></script>
</head>
<body style="padding:15px; background-image: url(css/imgs/fondo-point-venta.jpg); font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;height:600px !important;" >
<a href="menu.php" class="logo">
    <img src="css/imgs/atras-icon-deg.svg" height="20px" style="margin-left:5px;">
</a>
<center style="width:350px;margin-left: 360px;">
<div style="background-color:#fff;border-radius:18px;padding:15px; widht:300px;height:550px;box-shadow: 0 0 15px rgba(0, 0, 0, .4);margin-top:40px;">
<center style="margin-top: 30px;">
    <img src="css/imgs/icon_app.png"  class="image-login" alt="">
  <p class="text-center text-muted lead inicio-title" style="font-size:18px;" >Deudas</p>
  </center> 
 <form method="post" autocomplete="off" action="http://localhost/electron-products-test-master/deudas.php" class="input_form">
 <div style="margin-top: 20;" class="form-group">
        <label style="margin-right: 253px;" class="control-label label-login" for="UserName">Nombre :</label>
        <div class="input-signin" style="display: flex; flex-direction:column;" >
        <img style="outline:none;margin-right:280px;top: 40px;position: relative;" src="css/imgs/deuda-icon-de.svg" class="imagen-de-usuario" alt="User Image" height="21px">
        <input spellcheck="false" name="task" style="outline:none;margin-top:15px;margin-bottom:30px;text-alig:center;padding-left: 40px;" class="task_input">
        </div>
      </div>

  <div class="form-group">
    <label style="margin-right: 253px;" class="control-label label-login" for="UserName">Monto :</label>
    <div class="input-signin" style="display: flex; flex-direction:column;" >
    <img style="outline:none;margin-right:270px;top: 40px;position: relative;" src="css/imgs/monto-icon-de.svg" class="imagen-de-usuario" alt="User Image" height="19px">
    <input spellcheck="false" name="mount" style="outline:none;margin-top:15px;margin-bottom:30px;text-alig:center;padding-left: 45px;" class="mount_input validar">
    </div>
  </div>
  <button type="submit" name="submit" style="height: 37px; border-radius: 18px;background: linear-gradient(130deg, #00E6FF 0%, #0090D4 100%);border: 2.5px solid #fff;color:white;cursor:pointer;width:250px;outline:none;" id="add_btn" class="boton btn-deuda">Añadir Deuda</button>
 </form>
  <center>
 <table>

 <tbody>
  <?php 
  // select all tasks if page is visited or refreshed
  $tasks = mysqli_query($db, "SELECT * FROM tasks");

  $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
   <tr>
    <td style="text-align:center;" class="task"> <?php echo $row['task']; ?> Debe $<?php echo $row['mount']; ?> </td>
    <td class="delete"> 
     <a style="outline:none;" href="http://localhost/electron-products-test-master/deudas.php?del_task=<?php echo $row['ident'] ?>"><img src="css/imgs/failed-icon-de.svg" width="15" height="15"></a> 
    </td>
   </tr>
  <?php $i++; } ?> 
 </tbody>
</table>
</center>
<div>
<script src="validarinput.js"></script>
<center>
</body>
</html>