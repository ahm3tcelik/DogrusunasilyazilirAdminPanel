<?php
    session_start();
    if(!$_SESSION['uadmin_IsLogin']) {
        header("location: index.php");
    }
    include 'navbar.php';
    $message = array();
?>
<section class="container mt-3 py-5">
    <div class="row py-3">
        <div class="col-9 text-left">
            <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#ekleSoru">
                <i class="fa fa-pencil pr-2"></i>Soru Ekle
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-9">


                <!-- Cevap Alert -->
                <?php
                if(isset($_GET['edit_soru'])) {
                    $state = $_GET['edit_soru'];
                    switch ($state) {
                        case 'success': {
                            $message[0] = "Soru <strong>başarıyla</strong> güncellendi.";
                            $message[1] = "alert-success";
                            break;
                        }
                        case 'same': {
                            $message[0] = "<strong>Soru güncellenirken bir hata oluştu</strong> : <strong>Doğru</strong> ve <strong>yanlış</strong> cevaplar birbirinden farklı olmalıdır.";
                            $message[1] = "alert-danger";
                            break;
                        }
                        case 'empty': {
                            $message[0] = "<strong>Soru güncellenirken bir hata oluştu</strong> : Tüm cevaplar <strong>doldurulmalıdır.</strong>";
                            $message[1] = "alert-danger";
                            break;
                        }
                        default: {
                            $message[0] = "<strong>Soru güncellenirken bir hata oluştu.</strong>";
                            $message[1] = "alert-danger";
                        }
                    } ?>
                    <!-- Edit Sonuç Alert -->
                    <div class="row">
                        <div class="col-12">
                            <div class="alert <?php echo $message[1] ?> alert-dismissible fade show"> <?php echo $message[0]; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                if(isset($_GET['delete_soru'])) {
                    $state = $_GET['delete_soru'];
                    switch ($state) {
                        case 'success': {
                            $message[0] = "Soru <strong>başarıyla</strong> silindi.";
                            $message[1] = "alert-success";
                            break;
                        }
                        default: {
                            $message[0] = "<strong>Soru silinirken bir hata oluştu.</strong>";
                            $message[1] = "alert-danger";
                        }
                    }
                    ?>
                    <!-- Delete Sonuç Alert -->
                    <div class="row">
                        <div class="col-12">
                            <div class="alert <?php echo $message[1] ?> alert-dismissible fade show"> <?php echo $message[0]; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                if(isset($_GET['add_soru'])) {
                    $state = $_GET['add_soru'];
                    switch ($state) {
                        case 'success': {
                            $message[0] = "Soru <strong>başarıyla</strong> havuza eklendi.";
                            $message[1] = "alert-success";
                            break;
                        }
                        default: {
                            $message[0] = "<strong>Soru havuza eklenirken bir hata oluştu.</strong>";
                            $message[1] = "alert-danger";
                        }
                    }
                    ?>
                    <!-- Add Sonuç Alert -->
                    <div class="row">
                        <div class="col-12">
                            <div class="alert <?php echo $message[1] ?> alert-dismissible fade show"> <?php echo $message[0]; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <table id="sorularTable" class="table table-hover table-bordered text-light" style="background: #27ae60;">
                    <thead>
                    <th>Soru ID</th>
                    <th>Doğru Cevap</th>
                    <th>Yanlış Cevap</th>
                    <th>Kategori</th>
                    <th>İşlemler</th>
                    </thead>
                    <tbody>
                    <?php
                    $limit = 10;
                    $page = isset($_GET['soru_sayfa']) ? $_GET['soru_sayfa'] : 1;
                    $key = isset($_GET['soru_key']) ? $_GET['soru_key'] : '';
                    $soru_kategori = isset($_GET['soru_kategori']) ? $_GET['soru_kategori'] : [0];
                    $query2 = "";
                    if($soru_kategori[0] != 0) {
                        $query2 = "AND s.kategori_id IN(".implode( ", ", $soru_kategori ).")";
                    }
                    $start = ($page - 1) * $limit;
                    $goster  = $page * $limit - $limit;
                    $query = "SELECT * FROM `soru` s JOIN `kategori` k ON s.kategori_id = k.kategori_id WHERE".
                        " (soru_dogru LIKE '%$key%' OR soru_yanlis LIKE '%$key%') $query2 LIMIT".
                        " $goster,$limit";
                    $sorular = $db -> prepare($query);
                    $sorular -> execute();
                    $total = say("soru");
                    $pages = ceil($total / $limit);
                    $sorular -> execute();
                    if($sorular -> rowCount()) {
                        foreach($sorular as $row) { ?>
                            <tr>
                                <td><?php echo $row['soru_id'] ?></td>
                                <td><?php echo $row['soru_dogru'] ?></td>
                                <td><?php echo $row['soru_yanlis'] ?></td>
                                <td><?php echo $row['kategori_ad'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-dark" data-toggle="modal"
                                            data-target="#update_modal<?php echo $row['soru_id'] ?>">
                                        <span class="fa fa-edit"></span>
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete_modal<?php echo $row['soru_id'] ?>">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </td>
                            </tr>
                            <?php
                            include 'duzenle_soru.php';
                            include 'delete_soru.php';
                        }
                    }
                    else { ?>
                        <div class="alert alert-danger">Herhangi bir sonuç bulunamadı
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                    } ?>
                    </tbody>
                </table>
                <!-- Pagination -->
                <nav>
                    <ul class="pagination justify-content-end">
                        <?php pagination($page,$pages, 'dogrusunasilyazilir/soru.php?soru_key='.$key.'&soru_sayfa=','sorularTable');?>
                    </ul>
                </nav>
        </div>
        <aside class="col-sm-3">
            <form class="form" method="get" enctype="multipart/form-data">
                <div class="card text-light border border-light" style="background: #27ae60;">
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title"><span class="fa fa-filter"></span> Filtrele</h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Soru Arama</label>
                                        <input type="search" name="soru_key" class="form-control" placeholder="Arama...">
                                    </div>
                                </div>
                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- card-group-item.// -->
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Kategoriler </h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <?php
                                $kategoriler =  $db -> query("SELECT * FROM `kategori`");
                                $kategoriler -> execute();
                                if($kategoriler -> rowCount()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="soru_kategori[]" id="0" value="0" class="custom-control-input">
                                        <label class="custom-control-label" for="0">Tüm Kategoriler</label>
                                    </div>
                                <?php
                                    foreach ($kategoriler as $row) { ?>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="soru_kategori[]" id="<?php echo $row['kategori_id'];?>" value="<?php echo $row['kategori_id'];?>" class="custom-control-input">
                                            <label class="custom-control-label" for="<?php echo $row['kategori_id'];?>"><?php echo $row['kategori_ad'];?></label>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div> <!-- card-body.// -->
                            <div class="card-footer text-center">
                                <input type="submit" class="btn btn-dark" value="Filtrele">
                                <input type="reset" class="btn btn-danger" id="reset" value="Sıfırla">
                            </div>
                        </div>
                    </article> <!-- card-group-item.// -->
                </div> <!-- card.// -->
            </form>
        </aside>
    </div>
</section>
<?php
    include 'add_soru.php';
    include 'footer.php';
?>
