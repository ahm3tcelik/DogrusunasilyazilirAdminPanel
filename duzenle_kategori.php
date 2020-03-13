<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die("Hata");
    exit;
}
?>
<div class="modal fade" id="update_modal<?php echo $row['kategori_id']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Kategori Düzenle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="kategori_duzenle_form" action="sistem/db_update_kategori.php" method="post">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="edit_ad">Kategori Ad</label>
                                <input type="text" class="form-control" id="edit_ad" name="edit_ad" value="<?php echo $row['kategori_ad']?>" required>
                                <input type="hidden" class="form-control" id="edit_id" name="edit_id" value="<?php echo $row['kategori_id']?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="update" class="btn btn-dark"><span class="fa fa-edit"></span> Güncelle</button>
                        <button class="btn btn-primary" type="button" data-dismiss="modal"><span class="fa fa-remove"></span> Kapat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</script>