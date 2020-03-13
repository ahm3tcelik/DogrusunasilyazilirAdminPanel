<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die("Hata");
    exit;
}
?>
<!-- Delete Kategori Modal -->
<div class="modal fade" id="delete_modal<?php echo $row['kategori_id']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="exampleModalLongTitle">
                    <h5>İşlem Onayı</h5>
                    <small>Aşağıdaki kategoriyi <strong class="text-danger">silmek</strong> istediğinizden emin misiniz?</small>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="kategori_sil_form" action="sistem/db_delete_kategori.php" method="post">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="k">Kategori Ad</label>
                                <input type="text" disabled class="form-control" id="k" value="<?php echo $row['kategori_ad']?>">
                                <input type="hidden" class="form-control" id="kategori_id" name="kategori_id" value="<?php echo $row['kategori_id']?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="update" class="btn btn-danger"><span class="fa fa-trash"></span> Sil</button>
                        <button class="btn btn-primary" type="button" data-dismiss="modal"><span class="fa fa-remove"></span> Vazgeç</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>