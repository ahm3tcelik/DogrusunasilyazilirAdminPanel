<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die("Hata");
    exit;
}
?>
<!-- Soru Ekle Modal -->
<div class="modal fade" id="ekleSoru" tabindex="-1" role="dialog" aria-labelledby="ekleSoru" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Soru Ekle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="soru_ekle_form" action="sistem/db_add_soru.php" method="post">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="yeni_dogru">Doğru Cevap</label>
                                <input type="text" class="form-control" id="yeni_dogru" name="yeni_dogru" placeholder="Doğru Yazım" required>
                                <input type="hidden" class="form-control" id="page" name="page"  value="<?php echo $pages?>" placeholder="Doğru Yazım" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="yeni_yanlis">Yanlış Cevap</label>
                                <input type="text" class="form-control" id="yeni_yanlis" name="yeni_yanlis" placeholder="Yanlış Yazım" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <select class="form-control" name="yeni_kategori" >
                                    <?php
                                    $kategoriler =  $db -> query("SELECT * FROM `kategori`");
                                    $kategoriler -> execute();
                                    if($kategoriler -> rowCount()) {
                                        foreach ($kategoriler as $row) {
                                            echo '<option value='.$row['kategori_id'].'>'.$row['kategori_ad'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick="soruEkle();"><span class="fa fa-save"></span> Kaydet</button>
                        <button class="btn btn-primary" type="button" data-dismiss="modal"><span class="fa fa-remove"></span> Kapat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function soruEkle() {
        var dogru = document.getElementById('yeni_dogru').value;
        var yanlis = document.getElementById('yeni_yanlis').value;
        if(dogru === yanlis) {
            alert("Doğru ve yanlış cevabın birbirinden farklı olması gerekiyor.");
        }
        else if(dogru === '' || yanlis === '') {
            alert("Tüm cevapların doldurulması gerekiyor.");
        }
        else {
            document.forms['soru_ekle_form'].submit();
        }
    }
</script>