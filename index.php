<?php
    session_start();

    if($_SESSION['uadmin_IsLogin']) {
        header("location: ../dogrusunasilyazilir/homepage.php");
    }
    else {
        header("location: ../dogrusunasilyazilir/login.php");
    }
?>