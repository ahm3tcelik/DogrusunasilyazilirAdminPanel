<?php
    require_once 'db_config.php';
    if(isset($_POST['soru_id'])) {
        $soru_id = $_POST['soru_id'];
        $query = "DELETE FROM `soru` WHERE soru_id = $soru_id";
        $delete_soru = $db -> query($query);
        if($delete_soru) {
            header("location: ../soru.php?delete_soru=success");
        }
        else {
            header("location: ../soru.php?delete_soru=fail");
        }
    }
    else {
        header("location: ../soru.php?delete_soru=fail");
    }
?>