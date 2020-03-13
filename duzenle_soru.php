<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die("Hata");
    exit;
}
?>
<div class="modal fade" id="update_modal<?php echo $row['soru_id']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Soru Düzenle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="soru_duzenle_form" name="soru_duzenle_form" action="sistem/db_update_soru.php" method="post">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="edit_dogru">Doğru Cevap</label>
                                <input type="text" class="form-control" id="edit_dogru" name="edit_dogru" value="<?php echo $row['soru_dogru']?>" required>
                                <input type="hidden" class="form-control" id="edit_id" name="edit_id" value="<?php echo $row['soru_id']?>" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="edit_yanlis">Yanlış Cevap</label>
                                <input type="text" class="form-control" id="edit_yanlis" name="edit_yanlis" value="<?php echo $row['soru_yanlis']?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <select class="form-control" name="edit_kategori" id="edit_kategori" >
                                    <?php
                                    $kategoriler =  $db -> query("SELECT * FROM `kategori`");
                                    $kategoriler -> execute();
                                    if($kategoriler -> rowCount()) {
                                        foreach ($kategoriler as $row2) {
                                            if($row['kategori_id'] == $row2['kategori_id']) {
                                                echo '<option selected value='.$row2['kategori_id'].'>'.$row2['kategori_ad'].'</option>';
                                            }
                                            else {
                                                echo '<option  value='.$row2['kategori_id'].'>'.$row2['kategori_ad'].'</option>';
                                            }
                                        }
                                    }
                                    ?>
                                </select>
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