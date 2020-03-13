<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Doğrusu Nasıl Yazılır - Panel</title>
    <link rel="shortcut icon" href="images/yazim_logo_ico.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            background: linear-gradient(#2980b9,#27ae60) !important;
        }
        .user_card {
            height: 400px;
            width: 350px;
            margin-top: auto;
            margin-bottom: auto;
            background:rgba(255, 255, 255,0.4);
            position: relative;
            display: flex;
            justify-content: center;
            flex-direction: column;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 5px;

        }
        .brand_logo_container {
            position: absolute;
            height: 170px;
            width: 170px;
            top: -75px;
            border-radius: 50%;
            background: #2980b9;
            padding: 10px;
            text-align: center;
        }
        .brand_logo {
            height: 150px;
            width: 150px;
            border-radius: 50%;

        }
        .form_container {
            margin-top: 75px;
        }
        .login_btn:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }
        .input-group-text {
            background: #27ae60;
            color: white !important;
            border: 0 !important;
            border-radius: 0.25rem 0 0 0.25rem !important;
        }
        .input_user,
        .input_pass:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }
        .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
            background-color: #c0392b !important;
        }
    </style>
</head>
<body>
<div class="container" style="height: 90%; ">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="images/yazim_logo_round.png" class="brand_logo" alt="Logo">
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form id="form_login" name="form_login" action="sistem/db_login.php" method="post">
                    <div class="input-group mb-3">
                        <h5 class="lead text-dark">Doğrusu Nasıl Yazılır Panel</h5>
                    </div>
                    <?php
                    if(isset($_GET['login'])) {
                        $state = $_GET['login'];
                        if($state == 'wrong' || $state == "fail") {
                            ?>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-danger"><i class="fa fa-remove"></i></span>
                                </div>
                                <p class="form-control input_user alert-danger">Giriş bilgileri hatalı!</p>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" id="unm" name="unm" class="form-control input_user" value="" required placeholder="Kullanıcı Adı">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="password" id="upw" name="upw" class="form-control input_pass" value="" placeholder="Parola">
                    </div>
                    <div class="d-flex justify-content-center mt-2">
                        <button type="button" onclick="girisYap();" name="button" class="btn btn-primary  login_btn rounded-pill" style="width: 100%;">Giriş Yap</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<script>
    function girisYap() {
        var username = document.getElementById('unm').value;
        var pw = document.getElementById('upw').value;
        if(username === '' || pw === '') {
            alert("Tüm alanların doldurulması gerekiyor.");
        }
        else {
            document.forms['form_login'].submit();
        }
    }
</script>
</body>
