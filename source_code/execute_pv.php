<?php

function shutdownHandler()
{
    $error = error_get_last();
    if ($error['type'] == E_ERROR) {
        header("Location: http://localhost/electron-products-test-master/menu.php");
    }
}
register_shutdown_function('shutdownHandler');

exec("C:\Program Files (x86)\MTCENTER\MTCenter\MTCenter.exe", $resultado);
header("Location: http://localhost/electron-products-test-master/menu.php");
var_dump($resultado);
?>