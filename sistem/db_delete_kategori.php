<?php
    require_once 'db_config.php';
    if(isset($_POST['kategori_id'])) {
        $kategori_id = $_POST['kategori_id'];
        $query = "DELETE FROM `kategori` WHERE kategori_id = $kategori_id";
        $delete_soru = $db -> query($query);
        if($delete_soru) {
            header("location: ../kategori.php?delete_kategori=success");
        }
        else if($db -> errorCode() == 23000) { // foreign key constraint
            header("location: ../kategori.php?delete_kategori=fkey_constraint");
        }
        else {
            /*
            echo "\nPDO::errorInfo():\n";
            print_r($db->errorInfo());
            */
            header("location: ../kategori.php?delete_kategori=fail");
        }
    }
    else {
        header("location: ../kategori.php?delete_kategori=fail");
    }
?>