<?php
    require_once '../fonksiyon.php';
    session_start();
    if(isset($_POST['unm']) && isset($_POST['upw'])) {
        $unm = $_POST['unm'];
        $upw = encryption($_POST['upw']);
        $ip = IP();
        $query = "SELECT admin_id FROM `admin` WHERE admin_username = '$unm' AND admin_pw = '$upw'";
        $login = $db -> query($query);
        if($login -> rowCount() == 1) {
            $row = $login -> fetch();
            $admin_id = $row['admin_id'];
            $query = "INSERT INTO admin_ip(admin_id,ip) VALUES ($admin_id,'$ip')";
            $reg_ip = $db -> query($query);

            if($reg_ip) {
                $_SESSION['uadmin_IsLogin'] = "evetYes";
                $_SESSION['uadmin_id'] = $admin_id;
                header("location: ../homepage.php");
            }
            else {
                header("location: ../login.php?login=fail");
            }
        }
        else {
            header("location: ../login.php?login=wrong");
        }
    }
