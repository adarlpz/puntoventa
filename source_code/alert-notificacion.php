<?php

function shutdownHandler()
{
    $error = error_get_last();
    if ($error['type'] == E_ERROR) {
        header("Location: http://localhost/electron-products-test-master/src/views/alert_notification_right.php");
    }
}
register_shutdown_function('shutdownHandler');

exec("C:\Users\brand\alert-notification.py", $resultado);
header("Location: http://localhost/electron-products-test-master/src/views/alert_notification_right.php");
var_dump($resultado);
?>