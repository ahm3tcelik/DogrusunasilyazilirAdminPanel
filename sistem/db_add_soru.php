<?php
    require_once 'db_config.php';
    if(isset($_POST['yeni_dogru']) && $_POST['yeni_yanlis'] && $_POST['yeni_kategori'] && $_POST['page']) {
        $yeni_dogru = $_POST['yeni_dogru'];
        $yeni_yanlis = $_POST['yeni_yanlis'];
        $yeni_kategori = $_POST['yeni_kategori'];
        $page = $_POST['page'];

        $query = "INSERT INTO `soru`(soru_dogru,soru_yanlis,kategori_id) VALUES ('$yeni_dogru',
            '$yeni_yanlis','$yeni_kategori')";
        $yeni_soru = $db -> query($query);

        if($yeni_soru) {
            header("location: ../soru.php?add_soru=success&soru_sayfa=$page#sorularTable");
        }
        else {
            header("location: ../soru.php?add_soru=fail");
        }
    }
    else {
        header("location: ../soru.php?add_soru=fail");
    }
?>