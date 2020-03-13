<?php
    require_once 'db_config.php';
    if(isset($_POST['edit_dogru']) && isset($_POST['edit_yanlis']) && isset($_POST['edit_kategori']) && isset($_POST['edit_id'])) {
        $edit_id = $_POST['edit_id'];
        $edit_dogru = $_POST['edit_dogru'];
        $edit_yanlis = $_POST['edit_yanlis'];
        $edit_kategori = $_POST['edit_kategori'];
        if($edit_dogru == $edit_yanlis) {
            header("location: ../soru.php?edit_soru=same");
        }
        else if(empty($edit_dogru) || empty($edit_yanlis)) {
            header("location: ../soru.php?edit_soru=empty");
        }
        else {
            $query = "UPDATE `soru` SET soru_dogru = '$edit_dogru', soru_yanlis = '$edit_yanlis', kategori_id = $edit_kategori ".
                "WHERE soru_id = $edit_id";
            $edit_soru = $db -> query($query);
            if($edit_soru) {
                header("location: ../soru.php?edit_soru=success");
            }
            else {
                header("location: ../soru.php?edit_soru=fail");
            }
        }
    }
    else {
        header("location: ../soru.php?edit_soru=fail");
    }
?>