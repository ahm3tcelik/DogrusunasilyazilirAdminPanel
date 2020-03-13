<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die("Hata");
    exit;
}
?>
<!-- Kategori Ekle Modal -->
<div class="modal fade" id="ekleKategori" tabindex="-1" role="dialog" aria-labelledby="ekleKategori" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kategori Ekle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="kategori_ekle_form" action="sistem/db_add_kategori.php" method="post">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="yeni_dogru">Kategori Adı</label>
                                <input type="text" class="form-control" id="yeni_ad" name="yeni_ad" placeholder="Kategori Adı" required>
                                <input type="hidden" class="form-control" id="page" name="page"  value="<?php echo $pages?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick="kategoriEkle()"><span class="fa fa-save"></span> Kaydet</button>
                        <button class="btn btn-primary" type="button" data-dismiss="modal"><span class="fa fa-remove"></span> Kapat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function kategoriEkle() {
        var yeni_ad = document.getElementById('yeni_ad').value;
        if(yeni_ad === '') {
            alert("Kategori adı boş bırakılamaz.");
        }
        else {
            document.forms['kategori_ekle_form'].submit();
        }
    }
</script>