<?php
session_start();
if($_SESSION['autorizado']<>1){
    header("Location: index.php");
}
error_reporting(0);
require('class_lib/class_conecta_mysql.php');
require('class_lib/funciones.php');
$db=new ConexionMySQL();
$connect = mysqli_connect("localhost", "root", "", "db_puntoventa");

$codigo = $_POST['codigo'];
$codigo2 = $_POST['codigo2'];
$codigo3 = $_POST['codigo3'];
$codigo4 = $_POST['codigo4'];
$codigo5 = $_POST['codigo5'];
$codigo6 = $_POST['codigo6'];
$codigo7 = $_POST['codigo7'];
$codigo8 = $_POST['codigo8'];
$codigo9 = $_POST['codigo9'];
$codigo10 = $_POST['codigo10'];
$codigo11 = $_POST['codigo11'];
$codigo12 = $_POST['codigo12'];
$codigo13 = $_POST['codigo13'];
$codigo14 = $_POST['codigo14'];
$codigo15 = $_POST['codigo15'];
$codigo16 = $_POST['codigo16'];
$codigo17 = $_POST['codigo17'];
$codigo18 = $_POST['codigo18'];
$codigo19 = $_POST['codigo19'];
$codigo20 = $_POST['codigo20'];
$codigo21 = $_POST['codigo22'];
$codigo22 = $_POST['codigo22'];
$codigo23 = $_POST['codigo23'];
$codigo24 = $_POST['codigo24'];
$codigo25 = $_POST['codigo25'];
$codigo26 = $_POST['codigo26'];
$codigo27 = $_POST['codigo27'];
$codigo28 = $_POST['codigo28'];
$codigo29 = $_POST['codigo29'];
$codigo30 = $_POST['codigo30'];
$codigo31 = $_POST['codigo31'];
$codigo32 = $_POST['codigo32'];
$codigo33 = $_POST['codigo33'];
$codigo34 = $_POST['codigo34'];
$codigo35 = $_POST['codigo35'];
$codigo36 = $_POST['codigo36'];
$codigo37 = $_POST['codigo37'];
$codigo38 = $_POST['codigo38'];
$codigo39 = $_POST['codigo39'];
$codigo40 = $_POST['codigo40'];
$codigo41 = $_POST['codigo41'];
$codigo42 = $_POST['codigo42'];
$codigo43 = $_POST['codigo43'];
$codigo44 = $_POST['codigo44'];
$codigo45 = $_POST['codigo45'];
$codigo46 = $_POST['codigo46'];
$codigo47 = $_POST['codigo47'];
$codigo48 = $_POST['codigo48'];
$codigo49 = $_POST['codigo49'];
$codigo50 = $_POST['codigo50'];
$codigo51 = $_POST['codigo51'];
$codigo52 = $_POST['codigo52'];
$codigo53 = $_POST['codigo53'];
$codigo54 = $_POST['codigo54'];
$codigo55 = $_POST['codigo55'];
$codigo56 = $_POST['codigo56'];
$codigo57 = $_POST['codigo57'];
$codigo58 = $_POST['codigo58'];
$codigo59 = $_POST['codigo59'];
$codigo60 = $_POST['codigo60'];
$codigo61 = $_POST['codigo61'];
$codigo62 = $_POST['codigo62'];
$codigo63 = $_POST['codigo63'];
$codigo64 = $_POST['codigo64'];
$codigo65 = $_POST['codigo65'];
$codigo66 = $_POST['codigo66'];
$codigo67 = $_POST['codigo67'];
$codigo68 = $_POST['codigo68'];
$codigo69 = $_POST['codigo69'];
$codigo70 = $_POST['codigo70'];
$codigo71 = $_POST['codigo71'];
$codigo72 = $_POST['codigo72'];
$codigo73 = $_POST['codigo73'];
$codigo74 = $_POST['codigo74'];
$codigo75 = $_POST['codigo75'];
$codigo76 = $_POST['codigo76'];
$codigo77 = $_POST['codigo77'];
$codigo78 = $_POST['codigo78'];
$codigo79 = $_POST['codigo79'];
$codigo80 = $_POST['codigo80'];
$codigo81 = $_POST['codigo81'];
$codigo82 = $_POST['codigo82'];
$codigo83 = $_POST['codigo83'];
$codigo84 = $_POST['codigo84'];
$codigo85 = $_POST['codigo85'];
$codigo86 = $_POST['codigo86'];
$codigo87 = $_POST['codigo87'];
$codigo88 = $_POST['codigo88'];
$codigo89 = $_POST['codigo89'];
$codigo90 = $_POST['codigo90'];
$codigo91 = $_POST['codigo91'];
$codigo92 = $_POST['codigo92'];
$codigo93 = $_POST['codigo93'];
$codigo94 = $_POST['codigo94'];
$codigo95 = $_POST['codigo95'];
$codigo96 = $_POST['codigo96'];
$codigo97 = $_POST['codigo97'];
$codigo98 = $_POST['codigo98'];
$codigo99 = $_POST['codigo99'];
$codigo100 = $_POST['codigo100'];

$db = mysqli_connect("localhost", "root", "", "db_puntoventa");

$insert = mysqli_query($db, "INSERT INTO numerito (numerito) VALUES ('$codigo2')");

$sum = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo"); while ($row = mysqli_fetch_array($sum)) {$exis_act = $row['cantidad'];};
$ea = intval($exis_act);
$exis_new = $ea - 1;
$update = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new WHERE codigo=$codigo");

$sum2 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo2"); while ($row2 = mysqli_fetch_array($sum2)) {$exis_act2 = $row2['cantidad'];};
$ea2 = intval($exis_act2);
$exis_new2 = $ea2 - 1;
$update2 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new2 WHERE codigo=$codigo2");

$sum3 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo3"); while ($row3 = mysqli_fetch_array($sum3)) {$exis_act3 = $row3['cantidad'];};
$ea3 = intval($exis_act3);
$exis_new3 = $ea3 - 1;
$update3 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new3 WHERE codigo=$codigo3");

$sum4 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo4"); while ($row4 = mysqli_fetch_array($sum4)) {$exis_act4 = $row4['cantidad'];};
$ea4 = intval($exis_act4);
$exis_new4 = $ea4 - 1;
$update4 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new4 WHERE codigo=$codigo4");

$sum5 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo5"); while ($row5 = mysqli_fetch_array($sum5)) {$exis_act5 = $row5['cantidad'];};
$ea5 = intval($exis_act5);
$exis_new5 = $ea5 - 1;
$update5 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new5 WHERE codigo=$codigo5");

$sum6 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo6"); while ($row6 = mysqli_fetch_array($sum6)) {$exis_act6 = $row6['cantidad'];};
$ea6 = intval($exis_act6);
$exis_new6 = $ea6 - 1;
$update6 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new6 WHERE codigo=$codigo6");

$sum7 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo7"); while ($row7 = mysqli_fetch_array($sum7)) {$exis_act7 = $row7['cantidad'];};
$ea7 = intval($exis_act7);
$exis_new7 = $ea7 - 1;
$update7 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new7 WHERE codigo=$codigo7");

$sum8 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo8"); while ($row8 = mysqli_fetch_array($sum8)) {$exis_act8 = $row8['cantidad'];};
$ea8 = intval($exis_act8);
$exis_new8 = $ea8 - 1;
$update8 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new8 WHERE codigo=$codigo8");

$sum9 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo9"); while ($row9 = mysqli_fetch_array($sum9)) {$exis_act9 = $row9['cantidad'];};
$ea9 = intval($exis_act9);
$exis_new9 = $ea9 - 1;
$update9 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new9 WHERE codigo=$codigo9");

$sum10 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo10"); while ($row10 = mysqli_fetch_array($sum10)) {$exis_act10 = $row10['cantidad'];};
$ea10 = intval($exis_act10);
$exis_new10 = $ea10 - 1;
$update10 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new10 WHERE codigo=$codigo10");

$sum11 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo11"); while ($row11 = mysqli_fetch_array($sum11)) {$exis_act11 = $row11['cantidad'];};
$ea11 = intval($exis_act11);
$exis_new11 = $ea11 - 1;
$update11 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new11 WHERE codigo=$codigo11");

$sum12 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo12"); while ($row12 = mysqli_fetch_array($sum12)) {$exis_act12 = $row12['cantidad'];};
$ea12 = intval($exis_act12);
$exis_new12 = $ea12 - 1;
$update12 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new12 WHERE codigo=$codigo12");

$sum13 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo13"); while ($row13 = mysqli_fetch_array($sum13)) {$exis_act13 = $row13['cantidad'];};
$ea13 = intval($exis_act13);
$exis_new13 = $ea13 - 1;
$update13 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new13 WHERE codigo=$codigo13");

$sum14 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo14"); while ($row14 = mysqli_fetch_array($sum14)) {$exis_act14 = $row14['cantidad'];};
$ea14 = intval($exis_act14);
$exis_new14 = $ea14 - 1;
$update14 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new14 WHERE codigo=$codigo14");

$sum15 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo15"); while ($row15 = mysqli_fetch_array($sum15)) {$exis_act15 = $row15['cantidad'];};
$ea15 = intval($exis_act15);
$exis_new15 = $ea15 - 1;
$update15 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new15 WHERE codigo=$codigo15");

$sum16 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo16"); while ($row16 = mysqli_fetch_array($sum16)) {$exis_act16 = $row16['cantidad'];};
$ea16 = intval($exis_act16);
$exis_new16 = $ea16 - 1;
$update16 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new16 WHERE codigo=$codigo16");

$sum17 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo17"); while ($row17 = mysqli_fetch_array($sum17)) {$exis_act17 = $row17['cantidad'];};
$ea17 = intval($exis_act17);
$exis_new17 = $ea17 - 1;
$update17 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new17 WHERE codigo=$codigo17");

$sum18 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo18"); while ($row18 = mysqli_fetch_array($sum18)) {$exis_act18 = $row18['cantidad'];};
$ea18 = intval($exis_act18);
$exis_new18 = $ea18 - 1;
$update18 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new18 WHERE codigo=$codigo18");

$sum19 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo19"); while ($row19 = mysqli_fetch_array($sum19)) {$exis_act19 = $row19['cantidad'];};
$ea19 = intval($exis_act19);
$exis_new19 = $ea19 - 1;
$update19 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new19 WHERE codigo=$codigo19");

$sum20 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo20"); while ($row20 = mysqli_fetch_array($sum20)) {$exis_act20 = $row20['cantidad'];};
$ea20 = intval($exis_act20);
$exis_new20 = $ea20 - 1;
$update20 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new20 WHERE codigo=$codigo20");

$sum21 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo21"); while ($row21 = mysqli_fetch_array($sum21)) {$exis_act21 = $row21['cantidad'];};
$ea21 = intval($exis_act21);
$exis_new21 = $ea21 - 1;
$update21 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new21 WHERE codigo=$codigo21");

$sum22 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo22"); while ($row22 = mysqli_fetch_array($sum22)) {$exis_act22 = $row22['cantidad'];};
$ea22 = intval($exis_act22);
$exis_new22 = $ea22 - 1;
$update22 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new22 WHERE codigo=$codigo22");

$sum23 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo23"); while ($row23 = mysqli_fetch_array($sum23)) {$exis_act23 = $row23['cantidad'];};
$ea23 = intval($exis_act23);
$exis_new23 = $ea23 - 1;
$update23 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new23 WHERE codigo=$codigo23");

$sum24 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo24"); while ($row24 = mysqli_fetch_array($sum24)) {$exis_act24 = $row24['cantidad'];};
$ea24 = intval($exis_act24);
$exis_new24 = $ea24 - 1;
$update24 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new24 WHERE codigo=$codigo24");

$sum25 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo25"); while ($row25 = mysqli_fetch_array($sum25)) {$exis_act25 = $row25['cantidad'];};
$ea25 = intval($exis_act25);
$exis_new25 = $ea25 - 1;
$update25 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new25 WHERE codigo=$codigo25");

$sum26 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo26"); while ($row26 = mysqli_fetch_array($sum26)) {$exis_act26 = $row26['cantidad'];};
$ea26 = intval($exis_act26);
$exis_new26 = $ea26 - 1;
$update26 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new26 WHERE codigo=$codigo26");

$sum27 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo27"); while ($row27 = mysqli_fetch_array($sum27)) {$exis_act27 = $row27['cantidad'];};
$ea27 = intval($exis_act27);
$exis_new27 = $ea27 - 1;
$update27 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new27 WHERE codigo=$codigo27");

$sum28 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo28"); while ($row28 = mysqli_fetch_array($sum28)) {$exis_act28 = $row28['cantidad'];};
$ea28 = intval($exis_act28);
$exis_new28 = $ea28 - 1;
$update28 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new28 WHERE codigo=$codigo28");

$sum29 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo29"); while ($row29 = mysqli_fetch_array($sum29)) {$exis_act29 = $row29['cantidad'];};
$ea29 = intval($exis_act29);
$exis_new29 = $ea29 - 1;
$update29 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new29 WHERE codigo=$codigo29");

$sum30 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo30"); while ($row30 = mysqli_fetch_array($sum30)) {$exis_act30 = $row30['cantidad'];};
$ea30 = intval($exis_act30);
$exis_new30 = $ea30 - 1;
$update30 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new30 WHERE codigo=$codigo30");

$sum31 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo31"); while ($row31 = mysqli_fetch_array($sum31)) {$exis_act31 = $row31['cantidad'];};
$ea31 = intval($exis_act31);
$exis_new31 = $ea31 - 1;
$update31 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new31 WHERE codigo=$codigo31");

$sum32 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo32"); while ($row32 = mysqli_fetch_array($sum32)) {$exis_act32 = $row32['cantidad'];};
$ea32 = intval($exis_act32);
$exis_new32 = $ea32 - 1;
$update32 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new32 WHERE codigo=$codigo32");

$sum33 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo33"); while ($row33 = mysqli_fetch_array($sum33)) {$exis_act33 = $row33['cantidad'];};
$ea33 = intval($exis_act33);
$exis_new33 = $ea33 - 1;
$update33 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new33 WHERE codigo=$codigo33");

$sum34 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo34"); while ($row34 = mysqli_fetch_array($sum34)) {$exis_act34 = $row34['cantidad'];};
$ea34 = intval($exis_act34);
$exis_new34 = $ea34 - 1;
$update34 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new34 WHERE codigo=$codigo34");

$sum35 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo35"); while ($row35 = mysqli_fetch_array($sum35)) {$exis_act35 = $row35['cantidad'];};
$ea35 = intval($exis_act35);
$exis_new35 = $ea35 - 1;
$update35 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new35 WHERE codigo=$codigo35");

$sum36 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo36"); while ($row36 = mysqli_fetch_array($sum36)) {$exis_act36 = $row36['cantidad'];};
$ea36 = intval($exis_act36);
$exis_new36 = $ea36 - 1;
$update36 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new36 WHERE codigo=$codigo36");

$sum37 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo37"); while ($row37 = mysqli_fetch_array($sum37)) {$exis_act37 = $row37['cantidad'];};
$ea37 = intval($exis_act37);
$exis_new37 = $ea37 - 1;
$update37 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new37 WHERE codigo=$codigo37");

$sum38 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo38"); while ($row38 = mysqli_fetch_array($sum38)) {$exis_act38 = $row38['cantidad'];};
$ea38 = intval($exis_act38);
$exis_new38 = $ea38 - 1;
$update38 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new38 WHERE codigo=$codigo38");

$sum39 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo39"); while ($row39 = mysqli_fetch_array($sum39)) {$exis_act39 = $row39['cantidad'];};
$ea39 = intval($exis_act39);
$exis_new39 = $ea39 - 1;
$update39 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new39 WHERE codigo=$codigo39");

$sum40 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo40"); while ($row40 = mysqli_fetch_array($sum40)) {$exis_act40 = $row40['cantidad'];};
$ea40 = intval($exis_act40);
$exis_new40 = $ea40 - 1;
$update40 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new40 WHERE codigo=$codigo40");

$sum41 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo41"); while ($row41 = mysqli_fetch_array($sum41)) {$exis_act41 = $row41['cantidad'];};
$ea41 = intval($exis_act41);
$exis_new41 = $ea41 - 1;
$update41 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new41 WHERE codigo=$codigo41");

$sum42 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo42"); while ($row42 = mysqli_fetch_array($sum42)) {$exis_act42 = $row42['cantidad'];};
$ea42 = intval($exis_act42);
$exis_new42 = $ea42 - 1;
$update42 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new42 WHERE codigo=$codigo42");

$sum43 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo43"); while ($row43 = mysqli_fetch_array($sum43)) {$exis_act43 = $row43['cantidad'];};
$ea43 = intval($exis_act43);
$exis_new43 = $ea43 - 1;
$update43 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new43 WHERE codigo=$codigo43");

$sum44 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo44"); while ($row44 = mysqli_fetch_array($sum44)) {$exis_act44 = $row44['cantidad'];};
$ea44 = intval($exis_act44);
$exis_new44 = $ea44 - 1;
$update44 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new44 WHERE codigo=$codigo44");

$sum45 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo45"); while ($row45 = mysqli_fetch_array($sum45)) {$exis_act45 = $row45['cantidad'];};
$ea45 = intval($exis_act45);
$exis_new45 = $ea45 - 1;
$update45 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new45 WHERE codigo=$codigo45");

$sum46 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo46"); while ($row46 = mysqli_fetch_array($sum46)) {$exis_act46 = $row46['cantidad'];};
$ea46 = intval($exis_act46);
$exis_new46 = $ea46 - 1;
$update46 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new46 WHERE codigo=$codigo46");

$sum47 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo47"); while ($row47 = mysqli_fetch_array($sum47)) {$exis_act47 = $row47['cantidad'];};
$ea47 = intval($exis_act47);
$exis_new47 = $ea47 - 1;
$update47 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new47 WHERE codigo=$codigo47");

$sum48 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo48"); while ($row48 = mysqli_fetch_array($sum48)) {$exis_act48 = $row48['cantidad'];};
$ea48 = intval($exis_act48);
$exis_new48 = $ea48 - 1;
$update48 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new48 WHERE codigo=$codigo48");

$sum49 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo49"); while ($row49 = mysqli_fetch_array($sum49)) {$exis_act49 = $row49['cantidad'];};
$ea49 = intval($exis_act49);
$exis_new49 = $ea49 - 1;
$update49 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new49 WHERE codigo=$codigo49");

$sum50 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo50"); while ($row50 = mysqli_fetch_array($sum50)) {$exis_act50 = $row50['cantidad'];};
$ea50 = intval($exis_act50);
$exis_new50 = $ea50 - 1;
$update50 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new50 WHERE codigo=$codigo50");

$sum51 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo51"); while ($row51 = mysqli_fetch_array($sum51)) {$exis_act51 = $row51['cantidad'];};
$ea51 = intval($exis_act51);
$exis_new51 = $ea51 - 1;
$update51 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new51 WHERE codigo=$codigo51");

$sum52 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo52"); while ($row52 = mysqli_fetch_array($sum52)) {$exis_act52 = $row52['cantidad'];};
$ea52 = intval($exis_act52);
$exis_new52 = $ea52 - 1;
$update52 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new52 WHERE codigo=$codigo52");

$sum53 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo53"); while ($row53 = mysqli_fetch_array($sum53)) {$exis_act53 = $row53['cantidad'];};
$ea53 = intval($exis_act53);
$exis_new53 = $ea53 - 1;
$update53 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new53 WHERE codigo=$codigo53");

$sum54 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo54"); while ($row54 = mysqli_fetch_array($sum54)) {$exis_act54 = $row54['cantidad'];};
$ea54 = intval($exis_act54);
$exis_new54 = $ea54 - 1;
$update54 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new54 WHERE codigo=$codigo54");

$sum55 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo55"); while ($row55 = mysqli_fetch_array($sum55)) {$exis_act55 = $row55['cantidad'];};
$ea55 = intval($exis_act55);
$exis_new55 = $ea55 - 1;
$update55 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new55 WHERE codigo=$codigo55");

$sum56 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo56"); while ($row56 = mysqli_fetch_array($sum56)) {$exis_act56 = $row56['cantidad'];};
$ea56 = intval($exis_act56);
$exis_new56 = $ea56 - 1;
$update56 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new56 WHERE codigo=$codigo56");

$sum57 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo57"); while ($row57 = mysqli_fetch_array($sum57)) {$exis_act57 = $row57['cantidad'];};
$ea57 = intval($exis_act57);
$exis_new57 = $ea57 - 1;
$update57 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new57 WHERE codigo=$codigo57");

$sum58 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo58"); while ($row58 = mysqli_fetch_array($sum58)) {$exis_act58 = $row58['cantidad'];};
$ea58 = intval($exis_act58);
$exis_new58 = $ea58 - 1;
$update58 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new58 WHERE codigo=$codigo58");

$sum59 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo59"); while ($row59 = mysqli_fetch_array($sum59)) {$exis_act59 = $row59['cantidad'];};
$ea59 = intval($exis_act59);
$exis_new59 = $ea59 - 1;
$update59 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new59 WHERE codigo=$codigo59");

$sum60 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo60"); while ($row60 = mysqli_fetch_array($sum60)) {$exis_act60 = $row60['cantidad'];};
$ea60 = intval($exis_act60);
$exis_new60 = $ea60 - 1;
$update60 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new60 WHERE codigo=$codigo60");

$sum61 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo61"); while ($row61 = mysqli_fetch_array($sum61)) {$exis_act61 = $row61['cantidad'];};
$ea61 = intval($exis_act61);
$exis_new61 = $ea61 - 1;
$update61 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new61 WHERE codigo=$codigo61");

$sum62 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo62"); while ($row62 = mysqli_fetch_array($sum62)) {$exis_act62 = $row62['cantidad'];};
$ea62 = intval($exis_act62);
$exis_new62 = $ea62 - 1;
$update62 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new62 WHERE codigo=$codigo62");

$sum63 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo63"); while ($row63 = mysqli_fetch_array($sum63)) {$exis_act63 = $row63['cantidad'];};
$ea63 = intval($exis_act63);
$exis_new63 = $ea63 - 1;
$update63 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new63 WHERE codigo=$codigo63");

$sum64 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo64"); while ($row64 = mysqli_fetch_array($sum64)) {$exis_act64 = $row64['cantidad'];};
$ea64 = intval($exis_act64);
$exis_new64 = $ea64 - 1;
$update64 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new64 WHERE codigo=$codigo64");

$sum65 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo65"); while ($row65 = mysqli_fetch_array($sum65)) {$exis_act65 = $row65['cantidad'];};
$ea65 = intval($exis_act65);
$exis_new65 = $ea65 - 1;
$update65 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new65 WHERE codigo=$codigo65");

$sum66 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo66"); while ($row66 = mysqli_fetch_array($sum66)) {$exis_act66 = $row66['cantidad'];};
$ea66 = intval($exis_act66);
$exis_new66 = $ea66 - 1;
$update66 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new66 WHERE codigo=$codigo66");

$sum67 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo67"); while ($row67 = mysqli_fetch_array($sum67)) {$exis_act67 = $row67['cantidad'];};
$ea67 = intval($exis_act67);
$exis_new67 = $ea67 - 1;
$update67 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new67 WHERE codigo=$codigo67");

$sum68 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo68"); while ($row68 = mysqli_fetch_array($sum68)) {$exis_act68 = $row68['cantidad'];};
$ea68 = intval($exis_act68);
$exis_new68 = $ea68 - 1;
$update68 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new68 WHERE codigo=$codigo68");

$sum69 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo69"); while ($row69 = mysqli_fetch_array($sum69)) {$exis_act69 = $row69['cantidad'];};
$ea69 = intval($exis_act69);
$exis_new69 = $ea69 - 1;
$update69 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new69 WHERE codigo=$codigo69");

$sum70 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo70"); while ($row70 = mysqli_fetch_array($sum70)) {$exis_act70 = $row70['cantidad'];};
$ea70 = intval($exis_act70);
$exis_new70 = $ea70 - 1;
$update70 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new70 WHERE codigo=$codigo70");

$sum71 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo71"); while ($row71 = mysqli_fetch_array($sum71)) {$exis_act71 = $row71['cantidad'];};
$ea71 = intval($exis_act71);
$exis_new71 = $ea71 - 1;
$update71 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new71 WHERE codigo=$codigo71");

$sum72 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo72"); while ($row72 = mysqli_fetch_array($sum72)) {$exis_act72 = $row72['cantidad'];};
$ea72 = intval($exis_act72);
$exis_new72 = $ea72 - 1;
$update72 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new72 WHERE codigo=$codigo72");

$sum73 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo73"); while ($row73 = mysqli_fetch_array($sum73)) {$exis_act73 = $row73['cantidad'];};
$ea73 = intval($exis_act73);
$exis_new73 = $ea73 - 1;
$update73 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new73 WHERE codigo=$codigo73");

$sum74 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo74"); while ($row74 = mysqli_fetch_array($sum74)) {$exis_act74 = $row74['cantidad'];};
$ea74 = intval($exis_act74);
$exis_new74 = $ea74 - 1;
$update74 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new74 WHERE codigo=$codigo74");

$sum75 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo75"); while ($row75 = mysqli_fetch_array($sum75)) {$exis_act75 = $row75['cantidad'];};
$ea75 = intval($exis_act75);
$exis_new75 = $ea75 - 1;
$update75 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new75 WHERE codigo=$codigo75");

$sum76 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo76"); while ($row76 = mysqli_fetch_array($sum76)) {$exis_act76 = $row76['cantidad'];};
$ea76 = intval($exis_act76);
$exis_new76 = $ea76 - 1;
$update76 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new76 WHERE codigo=$codigo76");

$sum77 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo77"); while ($row77 = mysqli_fetch_array($sum77)) {$exis_act77 = $row77['cantidad'];};
$ea77 = intval($exis_act77);
$exis_new77 = $ea77 - 1;
$update77 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new77 WHERE codigo=$codigo77");

$sum78 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo78"); while ($row78 = mysqli_fetch_array($sum78)) {$exis_act78 = $row78['cantidad'];};
$ea78 = intval($exis_act78);
$exis_new78 = $ea78 - 1;
$update78 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new78 WHERE codigo=$codigo78");

$sum79 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo79"); while ($row79 = mysqli_fetch_array($sum79)) {$exis_act79 = $row79['cantidad'];};
$ea79 = intval($exis_act79);
$exis_new79 = $ea79 - 1;
$update79 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new79 WHERE codigo=$codigo79");

$sum80 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo80"); while ($row80 = mysqli_fetch_array($sum80)) {$exis_act80 = $row80['cantidad'];};
$ea80 = intval($exis_act80);
$exis_new80 = $ea80 - 1;
$update80 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new80 WHERE codigo=$codigo80");

$sum81 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo81"); while ($row81 = mysqli_fetch_array($sum81)) {$exis_act81 = $row81['cantidad'];};
$ea81 = intval($exis_act81);
$exis_new81 = $ea81 - 1;
$update81 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new81 WHERE codigo=$codigo81");

$sum82 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo82"); while ($row82 = mysqli_fetch_array($sum82)) {$exis_act82 = $row82['cantidad'];};
$ea82 = intval($exis_act82);
$exis_new82 = $ea82 - 1;
$update82 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new82 WHERE codigo=$codigo82");

$sum83 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo83"); while ($row83 = mysqli_fetch_array($sum83)) {$exis_act83 = $row83['cantidad'];};
$ea83 = intval($exis_act83);
$exis_new83 = $ea83 - 1;
$update83 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new83 WHERE codigo=$codigo83");

$sum84 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo84"); while ($row84 = mysqli_fetch_array($sum84)) {$exis_act84 = $row84['cantidad'];};
$ea84 = intval($exis_act84);
$exis_new84 = $ea84 - 1;
$update84 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new84 WHERE codigo=$codigo84");

$sum85 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo85"); while ($row85 = mysqli_fetch_array($sum85)) {$exis_act85 = $row85['cantidad'];};
$ea85 = intval($exis_act85);
$exis_new85 = $ea85 - 1;
$update85 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new85 WHERE codigo=$codigo85");

$sum86 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo86"); while ($row86 = mysqli_fetch_array($sum86)) {$exis_act86 = $row86['cantidad'];};
$ea86 = intval($exis_act86);
$exis_new86 = $ea86 - 1;
$update86 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new86 WHERE codigo=$codigo86");

$sum87 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo87"); while ($row87 = mysqli_fetch_array($sum87)) {$exis_act87 = $row87['cantidad'];};
$ea87 = intval($exis_act87);
$exis_new87 = $ea87 - 1;
$update87 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new87 WHERE codigo=$codigo87");

$sum88 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo88"); while ($row88 = mysqli_fetch_array($sum88)) {$exis_act88 = $row88['cantidad'];};
$ea88 = intval($exis_act88);
$exis_new88 = $ea88 - 1;
$update88 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new88 WHERE codigo=$codigo88");

$sum89 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo89"); while ($row89 = mysqli_fetch_array($sum89)) {$exis_act89 = $row89['cantidad'];};
$ea89 = intval($exis_act89);
$exis_new89 = $ea89 - 1;
$update89 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new89 WHERE codigo=$codigo89");

$sum90 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo90"); while ($row90 = mysqli_fetch_array($sum90)) {$exis_act90 = $row90['cantidad'];};
$ea90 = intval($exis_act90);
$exis_new90 = $ea90 - 1;
$update90 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new90 WHERE codigo=$codigo90");

$sum91 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo91"); while ($row91 = mysqli_fetch_array($sum91)) {$exis_act91 = $row91['cantidad'];};
$ea91 = intval($exis_act91);
$exis_new91 = $ea91 - 1;
$update91 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new91 WHERE codigo=$codigo91");

$sum92 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo92"); while ($row92 = mysqli_fetch_array($sum92)) {$exis_act92 = $row92['cantidad'];};
$ea92 = intval($exis_act92);
$exis_new92 = $ea92 - 1;
$update92 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new92 WHERE codigo=$codigo92");

$sum93 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo93"); while ($row93 = mysqli_fetch_array($sum93)) {$exis_act93 = $row93['cantidad'];};
$ea93 = intval($exis_act93);
$exis_new93 = $ea93 - 1;
$update93 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new93 WHERE codigo=$codigo93");

$sum94 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo94"); while ($row94 = mysqli_fetch_array($sum94)) {$exis_act94 = $row94['cantidad'];};
$ea94 = intval($exis_act94);
$exis_new94 = $ea94 - 1;
$update94 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new94 WHERE codigo=$codigo94");

$sum95 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo95"); while ($row95 = mysqli_fetch_array($sum95)) {$exis_act95 = $row95['cantidad'];};
$ea95 = intval($exis_act95);
$exis_new95 = $ea95 - 1;
$update95 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new95 WHERE codigo=$codigo95");

$sum96 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo96"); while ($row96 = mysqli_fetch_array($sum96)) {$exis_act96 = $row96['cantidad'];};
$ea96 = intval($exis_act96);
$exis_new96 = $ea96 - 1;
$update96 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new96 WHERE codigo=$codigo96");

$sum97 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo97"); while ($row97 = mysqli_fetch_array($sum97)) {$exis_act97 = $row97['cantidad'];};
$ea97 = intval($exis_act97);
$exis_new97 = $ea97 - 1;
$update97 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new97 WHERE codigo=$codigo97");

$sum98 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo98"); while ($row98 = mysqli_fetch_array($sum98)) {$exis_act98 = $row98['cantidad'];};
$ea98 = intval($exis_act98);
$exis_new98 = $ea98 - 1;
$update98 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new98 WHERE codigo=$codigo98");

$sum99 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo99"); while ($row99 = mysqli_fetch_array($sum99)) {$exis_act99 = $row99['cantidad'];};
$ea99 = intval($exis_act99);
$exis_new99 = $ea99 - 1;
$update99 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new99 WHERE codigo=$codigo99");

$sum100 = mysqli_query($db, "SELECT * FROM existencias WHERE codigo=$codigo100"); while ($row100 = mysqli_fetch_array($sum100)) {$exis_act100 = $row100['cantidad'];};
$ea100 = intval($exis_act100);
$exis_new100 = $ea100 - 1;
$update100 = mysqli_query($db, "UPDATE existencias set cantidad=$exis_new100 WHERE codigo=$codigo100");
?>