<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die("Hata");
    exit;
}
require_once 'sistem/db_config.php';
include 'fonksiyon.php';
?>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Doğrusu Nasıl Yazılır - Panel</title>
    <link rel="shortcut icon" href="images/yazim_logo_ico.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body style="background: linear-gradient(#2980b9,#27ae60) fixed;">
        <nav class="navbar navbar-light navbar-expand-lg shadow-lg sticky-top fixed-top" style="transition: 1s; overflow: hidden;">
            <div class="container-fluid">
                <div class="navbar-brand">
                    <a href="homepage.php" class="nav-link">
                        <img src="images/yazim_logo.png" id="navlogo" height="70" class="border border-light" style="border-radius: 15px;"> <span class="text-light lead" id="logoyazi"> Doğrusu Nasıl Yazılır</span>
                    </a>
                </div>
                <button class="navbar-toggler border border-light" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-navicon text-light"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="homepage.php" class="nav-link text-light">Ana Sayfa</a></li>
                        <li class="nav-item"><a href="soru.php" class="nav-link text-light">Sorular</a></li>
                        <li class="nav-item"><a href="kategori.php" class="nav-link text-light">Kategoriler</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-light">İletişim</a></li>
                    </ul>
                    <div class="btn-group">
                        <button type="button" onclick="logOut();" class="btn btn-danger"><span class="fa fa-key pr-1"> </span> Çıkış Yap</button>
                    </div>
                </div>
            </div>
        </nav>
        <form id="navform" action="logout.php" method="post"></form>
</body>
<script>
    function logOut() {
        document.forms['navform'].submit();
    }
    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if(scroll < 30) {
            $('.sticky-top').css('background', 'inherit');
            document.getElementById("navlogo").height = "70";
            $('.sticky-top').css('padding-bottom', '3px');
            $('.sticky-top').css('padding-top', '3px');
        }
        else if (scroll > 20 && scroll < 60) {
           //
        }
        else{
            $('.sticky-top').css('background', 'rgba(39, 174, 96,1.0)');
            $('.sticky-top').css('padding-top', '0');
            $('.sticky-top').css('padding-bottom', '0');
            document.getElementById('navlogo').height = "40";
        }
    });
</script>