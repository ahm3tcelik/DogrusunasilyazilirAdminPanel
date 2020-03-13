<?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=dogrusu_nasil_yazilir;charset=utf8;","username","pw");
    } catch (PDOException $e) {
        echo $e -> getCode();
    }
?>