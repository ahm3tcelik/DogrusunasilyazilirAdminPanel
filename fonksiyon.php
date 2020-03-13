<?php

if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die("Hata");
    exit;
}

require_once 'sistem/db_config.php';

function post($parametre, $kosul = false){
    if( $kosul == false ){
        $sonuc = strip_tags(trim($_POST[$parametre]));
    }elseif( $kosul == true ){
        $sonuc = strip_tags(trim(addslashes($_POST[$parametre])));
    }
    return $sonuc;
}
function IP(){

    if(getenv("HTTP_CLIENT_IP")){
        $ip = getenv("HTTP_CLIENT_IP");
    }elseif(getenv("HTTP_X_FORWARDED_FOR")){
        $ip = getenv("HTTP_X_FORWARDED_FOR");
        if (strstr($ip, ',')) {
            $tmp = explode (',', $ip);
            $ip = trim($tmp[0]);
        }
    }else{
        $ip = getenv("REMOTE_ADDR");
    }
    return $ip;
}
function say($tablo, $sutun = false, $deger = false ,$iz = '='){
    global $db;
    $sql = "SELECT * FROM $tablo";

    if($sutun || $deger){

        $sql .= " WHERE $sutun $iz :$sutun";
        $query = $db->prepare($sql);
        $query->execute([":$sutun" => $deger]);
        return $query->rowCount();

    }else{

        $query = $db->prepare($sql);
        $query->execute();
        return $query->rowCount();
    }
}

function pagination($s, $ptotal, $url,$id){
    global $site;

    $forlimit = 3;
    if($ptotal < 2){
        null;
    }else{

        if($s > 4){
            $prev  = $s - 1;
            echo '<li class="page-item"><a class="page-link" href="'.$site.'/'.$url.'1#'.$id.'"><i class="fa fa-angle-left"></i></a></li>';
            echo '<li class="page-item"><a class="page-link" href="'.$site.'/'.$url.($s-1).'#'.$id.'" ><</a></li>';
        }
        for($i = $s - $forlimit; $i < $s + $forlimit + 1; $i++){
            if($i > 0 && $i <= $ptotal){
                if($i == $s){
                    echo '<li class="page-item active"><a class="page-link"  href="#">'.$i.'</a></li>';
                }else{
                    echo '<li class="page-item"><a class="page-link" href="'.$site.'/'.$url.$i.'#'.$id.'" >'.$i.'</a></li>';
                }
            }
        }

        if($s <= $ptotal - 4){
            $next  = $s + 1;
            echo '<li class="page-item"><a class="page-link" href="'.$site.'/'.$url.$next.'#'.$id.'" > <i class="fa fa-angle-right"></i></a></li>';
            echo '<li class="page-item"><a class="page-link" href="'.$site.'/'.$url.$ptotal.'#'.$id.'" >»</a></li>';
        }
    }

}
function getLink() {
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $link = "https";
    else
        $link = "http";

// Here append the common URL characters.
    $link .= "://";

// Append the host(domain name, ip) to the URL.
    $link .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL
    $link .= $_SERVER['REQUEST_URI'];

// Print the link
    return $link;
}
function sef_link($str){
    $preg = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#', '.');
    $match = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp', '');
    $perma = strtolower(str_replace($preg, $match, $str));
    $perma = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $perma);
    $perma = trim(preg_replace('/\s+/', ' ', $perma));
    $perma = str_replace(' ', '-', $perma);
    return $perma;
}
function encryption($str) {
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '2006382564565597';
    $encryption_key = "Oha15987410x.";
    $encryption = openssl_encrypt($str, $ciphering, $encryption_key, $options, $encryption_iv);
    return $encryption;
}
function decryption($str) {
    $ciphering = "AES-128-CTR";
    $decryption_iv = '2006382564565597';
    $decryption_key = "Oha15987410x.";
    $options = 0;
    $decryption = openssl_decrypt ($str, $ciphering,
        $decryption_key, $options, $decryption_iv);
    return $decryption;
}
?>