<?php

    require_once 'db_config.php';
    if(isset($_POST['yeni_ad']) && isset($_POST['page'])) {
        $yeni_ad = $_POST['yeni_ad'];
        $page = $_POST['page'];

        $query = "INSERT INTO `kategori`(kategori_ad) VALUES ('$yeni_ad')";
        $yeni_kategori = $db -> query($query);
        if($yeni_kategori) {
            header("location: ../kategori.php?add_kategori=success&kategori_sayfa=$page");
        }
        else {
            header("location: ../kategori.php?add_kategori=fail&kategori_sayfa=$page");
        }
    }
?>