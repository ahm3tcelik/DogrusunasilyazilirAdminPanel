<?php
    require_once 'db_config.php';
    if(isset($_POST['edit_ad']) && isset($_POST['edit_id'])) {
        $edit_ad = $_POST['edit_ad'];
        $edit_id = $_POST['edit_id'];
        if(empty($edit_ad)) {
            header("location: ../soru.php?edit_kategori=empty");
        }
        else {
            $query = "UPDATE `kategori` SET kategori_ad = '$edit_ad' WHERE kategori_id = $edit_id";
            $edit_kategori = $db -> query($query);
            if($edit_kategori) {
                header("location: ../kategori.php?edit_kategori=success");
            }
            else {
                header("location: ../kategori.php?edit_kategori=fail");
            }
        }
    }
    else {
        header("location: ../kategori.php?edit_kategori=fail");
    }
?>