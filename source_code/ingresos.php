<?php include "./class_lib/sesionSecurity.php";
 $db = mysqli_connect("localhost", "root", "", "db_puntoventa"); ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <title>Estadisticas</title>
    <?php include "./class_lib/links.php"; ?>
    <link rel="stylesheet" href="estadisticas.css">
  </head>
  <body style="background-image: url(css/imgs/fondo-point-venta.jpg);">
  <a href="menu.php" class="logo">
    <img src="css/imgs/atras-icon-deg.svg" height="20px" id="atras-icon" style="margin-top:15px;margin-left:20px;">
    </a>

      <center>
    <img src="css/imgs/letras-megras.png" style="height:90px;">
    </center>

<div style="margin-top:30px;height:430px !important;box-shadow: 0 0 15px rgba(0, 0, 0, .4);width: 640px !important;margin-left: 15px;" class="col-md-4 card-total">
  <div style="display:flex;flex-direction:row;height: 450px;">

  <div style="margin-top:50px" class="grafica" id="graphic">
  <canvas style="position: relative;top: -40px;" id="myChart" width="610" height="400"></canvas>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <?php 
      $db = mysqli_connect("localhost", "root", "", "db_puntoventa");
    $sum =  mysqli_query($db, "SELECT * FROM estadisticas_mensuales"); while ($row = mysqli_fetch_array($sum)) {$enero = $row['enero'];} 
      $sum =  mysqli_query($db, "SELECT * FROM estadisticas_mensuales"); while ($row = mysqli_fetch_array($sum)) {$febrero = $row['febrero'];} 
      $sum =  mysqli_query($db, "SELECT * FROM estadisticas_mensuales"); while ($row = mysqli_fetch_array($sum)) {$marzo = $row['marzo'];} 
      $sum =  mysqli_query($db, "SELECT * FROM estadisticas_mensuales"); while ($row = mysqli_fetch_array($sum)) {$abril = $row['abril'];} 
      $sum =  mysqli_query($db, "SELECT * FROM estadisticas_mensuales"); while ($row = mysqli_fetch_array($sum)) {$mayo = $row['mayo'];} 
      $sum =  mysqli_query($db, "SELECT * FROM estadisticas_mensuales"); while ($row = mysqli_fetch_array($sum)) {$junio = $row['junio'];} 
      $sum =  mysqli_query($db, "SELECT * FROM estadisticas_mensuales"); while ($row = mysqli_fetch_array($sum)) {$julio = $row['julio'];} 
      $sum =  mysqli_query($db, "SELECT * FROM estadisticas_mensuales"); while ($row = mysqli_fetch_array($sum)) {$agosto = $row['agosto'];} 
      $sum =  mysqli_query($db, "SELECT * FROM estadisticas_mensuales"); while ($row = mysqli_fetch_array($sum)) {$septiembre = $row['septiembre'];} 
      $sum =  mysqli_query($db, "SELECT * FROM estadisticas_mensuales"); while ($row = mysqli_fetch_array($sum)) {$octubre = $row['octubre'];} 
      $sum =  mysqli_query($db, "SELECT * FROM estadisticas_mensuales"); while ($row = mysqli_fetch_array($sum)) {$noviembre = $row['noviembre'];} 
      $sum =  mysqli_query($db, "SELECT * FROM estadisticas_mensuales"); while ($row = mysqli_fetch_array($sum)) {$diciembre = $row['diciembre'];} 
  ?>
  <script>
  var ctx = document.getElementById('myChart');
  var enero = "<?php echo $enero; ?>";
  var febrero = "<?php echo $febrero; ?>";
  var marzo = "<?php echo $marzo; ?>";
  var abril = "<?php echo $abril; ?>";
  var mayo = "<?php echo $mayo; ?>";
  var junio = "<?php echo $junio; ?>";
  var julio = "<?php echo $julio; ?>";
  var agosto = "<?php echo $agosto; ?>";
  var septiembre = "<?php echo $septiembre; ?>";
  var octubre = "<?php echo $octubre; ?>";
  var noviembre = "<?php echo $noviembre; ?>";
  var diciembre = "<?php echo $diciembre; ?>";
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        datasets: [{
            label: '',
            data: [enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
  </script>
  </div>
</div>

  <div style="margin-top:30px;height:450px !important;box-shadow: 0 0 15px rgba(0, 0, 0, .4);margin-left: 655px;position: relative;top: -500px;" class="col-md-4 card-total">
              <!-- small box -->
              <div class="small-box ">
                <div class="inner">
                  <h3><div id='totales'></div></h3>
                  <p style="font-size:23px;font-weight:bold;" >Tus Estadisticas</p>
                  <p style="font-size:15px;color:black;" >Los Dias 28 De Cada Mes Recibiras Un Informe General De Estas Estadisticas</p>
                </div>
                <a href="#" class="small-box-footer">
                  <div id='num_ticket'></div>
                </a>
                <a href="#" class="small-box-footer">
                  <div id='total_articulos'></div>
                </a>
              </div>

              <p style="font-size:20px; margin-left:20px;color:black;" >Tus ingresos :</p>
              <p style="font-size:40px;font-weight:bold; margin-left:20px;background: linear-gradient(#00D1FF,#0090D4);-webkit-background-clip: text; color: transparent; "" >$ <?php $sum = mysqli_query($db, "SELECT * FROM estadisticas"); while ($row = mysqli_fetch_array($sum)) {$total = $row['vendido']; $gasto = $row['gastado']; echo  $total - $gasto;} ?></p>

              <p style="font-size:20px; margin-left:20px;color:black;" >Cantidad De Ventas :</p>
              <p style="font-size:40px;font-weight:bold; margin-left:20px;background: linear-gradient(#00D1FF,#0090D4);-webkit-background-clip: text; color: transparent;" ><?php $sum = mysqli_query($db, "SELECT * FROM estadisticas"); while ($row = mysqli_fetch_array($sum)) {$ventas = $row['ventas']; echo  $ventas;} ?></p>
              <center>
              <p style="font-size:15px;color:black;" >El Siguiente Dia Se Operara Con Normalidad De Nuevo</p>
              </center>
            </div><!-- ./col -->
          </div>

          <?php $sum = mysqli_query($db, "SELECT * FROM estadisticas"); while ($row = mysqli_fetch_array($sum)) {$total = $row['vendido']; $gasto = $row['gastado']; $profit = $total - $gasto;} ?>
  </div>

    <div class="MsjAjaxForm"></div>
    <?php include "./class_lib/scripts.php"; ?>
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="dist/js/source_point_sales.js"></script>
    <script src="plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
    <script src="plugins/number/jquery.inputmask.bundle.js"></script>
    <script src="plugins/printPage/jquery.printPage.js"></script>
    <script>
      $(document).ready(function(){
        $(".cantidades").inputmask();
      });
    </script>
  </body>
</html>