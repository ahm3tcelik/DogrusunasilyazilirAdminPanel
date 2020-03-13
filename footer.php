<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die("Hata");
    exit;
}
?>
<footer class="page-footer shadow-lg" style="background: rgba(255,255,255,0.1)">
    <!-- Footer Elements -->
    <div class="container">
    <div class="footer-copyright text-center py-3 text-light">© 2020 Copyright:
        <a href="https://play.google.com/store/apps/details?id=com.ahmetc.yazimkurallari" target="_blank" class="lead text-light" style="text-decoration: none;"> Doğrusu Nasıl Yazılır</a>
    </div>
</footer>
<!-- Footer -->
