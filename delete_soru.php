<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die("Hata");
    exit;
}
?>
<div class="modal fade" id="delete_modal<?php echo $row['soru_id']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="exampleModalLongTitle">
                    <h5>İşlem Onayı</h5>
                    <small>Aşağıdaki soruyu <strong class="text-danger">silmek</strong> istediğinizden emin misiniz?</small>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="soru_sil_form" action="sistem/db_delete_soru.php" method="post">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="d">Doğru Cevap</label>
                                <input type="text" disabled class="form-control" id="d" value="<?php echo $row['soru_dogru']?>">
                                <input type="hidden" class="form-control" id="soru_id" name="soru_id" value="<?php echo $row['soru_id']?>">
                            </div>
                            <div class="form-group col-6">
                                <label for="y">Yanlış Cevap</label>
                                <input type="text" disabled class="form-control" id="y" value="<?php echo $row['soru_yanlis']?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="k">Kategori</label>
                                <select disabled id="k" class="form-control">
                                    <?php
                                    echo '<option selected value='.$row['kategori_id'].'>'.$row['kategori_ad'].'</option>';
                                    ?>
                                </select>
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