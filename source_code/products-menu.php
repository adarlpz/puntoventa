<?php include "./class_lib/sesionSecurity.php"; ?>
<html>

<head>
    <title>Articulos</title>
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" href="css/menu-css.css">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="plugins/datepicker/css/bootstrap-datepicker3.css"> </head>

<body style="background-image:url(css/imgs/bacground-products-menu.jpg)">

<center>
<div class="botones-1 botones-iniciales">

<div class="grupo-boton">
<a href="abc_aceites.php">
    <button class="boton btn-products inicial-products"><img src="css/imgs/aceite-product.svg" height="75px" ></button>
</a>
    <p class="texto-boton-inicial-products">Aceites</p>
</div>

<div class="grupo-boton">
<a href="abc_enlatados.php">
    <button class="boton btn-products"><img src="css/imgs/enlatados-products.svg" height="75px" ></button>
</a>
    <p>Enlatados</p>
</div>

<div class="grupo-boton">
<a href="abc_cereales.php">
    <button class="boton btn-products"><img src="css/imgs/cereal-product.svg" height="75px" ></button>
</a>
    <p>Cereales</p>
</div>

<div class="grupo-boton">
<a href="abc_cremas.php">
    <button class="boton btn-products"><img src="css/imgs/cremas-product.svg" height="75px" ></button>
    </a>
    <p>Cremas</p>
</div>

<div class="grupo-boton">
<a href="abc_sopas.php">
    <button class="boton btn-products"><img src="css/imgs/sopas-product.svg" height="75px" ></button>
    </a>
    <p>Sopas</p>
</div>

<div class="grupo-boton">
<a href="abc_pures.php">
    <button class="boton btn-products"><img src="css/imgs/pure-product.svg" height="75px" ></button>
</a>
    <p>Pures</p>
</div>

<div class="grupo-boton">
<a href="abc_galletas.php">
    <button class="boton btn-products"><img src="css/imgs/galletas-product.svg" height="75px" ></button>
</a>
    <p>Galletas</p>
</div>

<div class="grupo-boton">
<a href="abc_papas.php">
    <button class="boton btn-products"><img src="css/imgs/papas-product.svg" height="75px" ></button>
</a>
    <p>Papas</p>
</div>

<div class="grupo-boton">
<a href="abc_semillas.php">
    <button class="boton btn-products"><img src="css/imgs/semillas-product.svg" height="75px" ></button>
</a>
    <p>Semillas</p>
</div>

</div>

<div class="botones-1 botones-iniciales">

<div class="grupo-boton">
<a href="abc_panes.php">
    <button onclick="open_calc();" class="boton btn-products inicial-products"><img src="css/imgs/pan-product.svg" height="75px" ></button>
</a>
    <p class="texto-boton-inicial-products">Panes</p>
</div>

<div class="grupo-boton">
<a href="abc_picantes.php">
    <button class="boton btn-products"><img src="css/imgs/picante-product.svg" height="75px" ></button>
</a>
    <p>Picantes</p>
</div>

<div class="grupo-boton">
<a href="abc_frutas.php">
    <button onclick="open_camera();" class="boton btn-products"><img src="css/imgs/frutas-product.svg" height="75px" ></button>
</a>
    <p>Frutas</p>
</div>

<div class="grupo-boton">
<a href="abc_verduras.php">
    <button class="boton btn-products"><img src="css/imgs/verduras-product.svg" height="75px" ></button>
</a>
    <p>Verduras</p>
</div>

<div class="grupo-boton">
<a href="abc_leche.php">
    <button class="boton btn-products"><img src="css/imgs/leche-product.svg" height="75px" ></button>
    </a>
    <p>Leche</p>
</div>

<div class="grupo-boton">
<a href="abc_huevo.php">
    <button class="boton btn-products"><img src="css/imgs/huevos-product.svg" height="75px" ></button>
</a>
    <p>Huevo</p>
</div>

<div class="grupo-boton">
<a href="abc_yoghurt.php">
    <button class="boton btn-products"><img src="css/imgs/yoghurt-product.svg" height="75px" ></button>
</a>
    <p>Yoghurt</p>
</div>

<div class="grupo-boton">
<a href="abc_quesos.php">
    <button class="boton btn-products"><img src="css/imgs/queso-product.svg" height="75px" ></button>
</a>
    <p>Quesos</p>
</div>

<div class="grupo-boton">
<a href="abc_jamones.php">
    <button class="boton btn-products"><img src="css/imgs/jamon-product.svg" height="75px" ></button>
</a>
    <p>Jamones</p>
</div>

</div>

<div class="botones-1 botones-iniciales">

<div class="grupo-boton">
<a href="abc_salchichas.php">
    <button onclick="open_calc();" class="boton btn-products inicial-products"><img src="css/imgs/salchichas-product.svg" height="75px" ></button>
</a>
    <p class="texto-boton-inicial-products">Salchichas</p>
</div>

<div class="grupo-boton">
<a href="abc_tocino.php">
    <button class="boton btn-products"><img src="css/imgs/tocino-product.svg" height="75px" ></button>
</a>
    <p>Tocino</p>
</div>

<div class="grupo-boton">
<a href="abc_carnes.php">
    <button onclick="open_camera();" class="boton btn-products"><img src="css/imgs/carne-product.svg" height="75px" ></button>
</a>
    <p>Carnes</p>
</div>

<div class="grupo-boton">
<a href="abc_congelados.php">
    <button class="boton btn-products"><img src="css/imgs/congelados-product.svg" height="75px" ></button>
</a>
    <p>Congelados</p>
</div>

<div class="grupo-boton">
<a href="abc_helados.php">
    <button class="boton btn-products"><img src="css/imgs/helados-product.svg" height="75px" ></button>
    </a>
    <p>Helados</p>
</div>

<div class="grupo-boton">
<a href="abc_agua-natural.php">
    <button class="boton btn-products"><img src="css/imgs/agua-product.svg" height="75px" ></button>
</a>
    <p>Agua Natural</p>
</div>

<div class="grupo-boton">
<a href="abc_refrescos.php">
    <button class="boton btn-products"><img src="css/imgs/refrescos-product.svg" height="75px" ></button>
</a>
    <p>Refrescos</p>
</div>

<div class="grupo-boton">
<a href="abc_energetizantes.php">
    <button class="boton btn-products"><img src="css/imgs/energia-product.svg" height="75px" ></button>
</a>
    <p>Energetizantes</p>
</div>

<div class="grupo-boton">
<a href="abc_alchol.php">
    <button class="boton btn-products"><img src="css/imgs/alchol-product.svg" height="75px" ></button>
</a>
    <p>Alchol</p>
</div>

</div>

<div class="botones-1 botones-iniciales">

<div class="grupo-boton">
<a href="abc_torillas.php">
    <button onclick="open_calc();" class="boton btn-products inicial-products"><img src="css/imgs/tortillas-product.svg" height="75px" ></button>
</a>
    <p class="texto-boton-inicial-products">Tortillas</p>
</div>

<div class="grupo-boton">
<a href="abc_bebes.php">
    <button class="boton btn-products"><img src="css/imgs/bebes-product.svg" height="75px" ></button>
</a>
    <p>Bebes</p>
</div>

<div class="grupo-boton">
<a href="abc_farmacia.php">
    <button onclick="open_camera();" class="boton btn-products"><img src="css/imgs/farmacia-product.svg" height="75px" ></button>
</a>
    <p>Farmacia</p>
</div>

<div class="grupo-boton">
<a href="abc_cuidado-personal.php">
    <button class="boton btn-products"><img src="css/imgs/cuidadoper-product.svg" height="75px" ></button>
</a>
    <p>Cuidado Personal</p>
</div>

<div class="grupo-boton">
<a href="abc_salud-femenina.php">
    <button class="boton btn-products"><img src="css/imgs/feme-product.svg" height="75px" ></button>
    </a>
    <p>Salud Femenina</p>
</div>

<div class="grupo-boton">
<a href="abc_desechables.php">
    <button class="boton btn-products"><img src="css/imgs/desechables-product.svg" height="75px" ></button>
</a>
    <p>Desechables</p>
</div>

<div class="grupo-boton">
<a href="abc_hogar.php">
    <button class="boton btn-products"><img src="css/imgs/hogar-product.svg" height="75px" ></button>
</a>
    <p>Hogar</p>
</div>

<div class="grupo-boton">
<a href="abc_mascotas.php">
    <button class="boton btn-products"><img src="css/imgs/mascotas-product.svg" height="75px" ></button>
</a>
    <p>Mascotas</p>
</div>

<div class="grupo-boton">
<a href="abc_articulos.php">
    <button class="boton btn-products"><img src="css/imgs/mas-product.svg" height="75px" ></button>
</a>
    <p>Otros</p>
</div>

</div>


</center>

<footer>
</footer>
</body>

</html>
<?php