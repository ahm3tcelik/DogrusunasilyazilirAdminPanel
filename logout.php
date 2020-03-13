<?php
    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        die("Hata");
        exit;
    }
    session_start();
    session_destroy();
    header("location: index.php");
?>