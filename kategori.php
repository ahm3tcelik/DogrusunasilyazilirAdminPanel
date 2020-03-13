<?php
session_start();
if(!$_SESSION['uadmin_IsLogin']) {
header("location: index.php");
}
define('security',"ahmet");
include('navbar.php');
$message = array();
?>
<section class="container">
    <div class="row pt-4">
        <div class="col-12 mx-auto">
            <h1 class="lead font-weight-bolder text-light">Kategoriler</h1>
            <form class="form" method="get" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-2 px-0 py-3">
                        <input type="search" name="kategori_key" class="form-control" placeholder="Anahtar kelime...">
                    </div>
                    <div class="col-4 px-1 py-3">
                        <input type="submit" name="kategoriAra" class="btn btn-outline-light" value="Filtrele">
                    </div>
                    <div class="col-6 py-3 text-right">
                        <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#ekleKategori">
                            <i class="fa fa-pencil pr-2"></i>Kategori Ekle
                        </button>
                    </div>
                </div>
            </form>
            <!-- Cevap Alert -->
            <?php
            if(isset($_GET['edit_kategori'])) {
                $state = $_GET['edit_kategori'];
                switch ($state) {
                    case 'success': {
                        $message[0] = "Kategori <strong>başarıyla</strong> güncellendi.";
                        $message[1] = "alert-success";
                        break;
                    }
                    case 'empty': {
                        $message[0] = "<strong>Kategori güncellenirken bir hata oluştu</strong> : Kategori adı <strong>doldurulmalıdır.</strong>";
                        $message[1] = "alert-danger";
                        break;
                    }
                    default: {
                        $message[0] = "<strong>Kategori güncellenirken bir hata oluştu.</strong>";
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
            if(isset($_GET['delete_kategori'])) {
                $state = $_GET['delete_kategori'];
                switch ($state) {
                    case 'success': {
                        $message[0] = "Kategori <strong>başarıyla</strong> silindi.";
                        $message[1] = "alert-success";
                        break;
                    }
                    case 'fkey_constraint': {
                        $message[0] = "<strong>Kategori silinirken bir hata oluştu</strong> : Bu kategoriye bağlı sorular".
                        " bulunduğundan <strong>ilk önce soruları güncellemeniz gerekiyor</strong>.";
                        $message[1] = "alert-danger";
                        break;
                    }
                    default: {
                        $message[0] = "<strong>Kategori silinirken bir hata oluştu.</strong>";
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
            if(isset($_GET['add_kategori'])) {
                $state = $_GET['add_kategori'];
                switch ($state) {
                    case 'success': {
                        $message[0] = "Kategori <strong>başarıyla</strong> havuza eklendi.";
                        $message[1] = "alert-success";
                        break;
                    }
                    default: {
                        $message[0] = "<strong>Kategori havuza eklenirken bir hata oluştu.</strong>";
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
            <table id="kategorilerTable" class="table bg-success table-hover table-bordered text-light">
                <thead>
                <th>Kategori ID</th>
                <th>Kategori Ad</th>
                <th>İşlemler</th>
                </thead>
                <tbody>
                <?php
                $limit = 10;
                $page = isset($_GET['kategori_sayfa']) ? $_GET['kategori_sayfa'] : 1;
                $key = isset($_GET['kategori_key']) ? $_GET['kategori_key'] : '';
                $start = ($page - 1) * $limit;
                $goster  = $page * $limit - $limit;
                $query = 'SELECT * FROM `kategori` WHERE kategori_ad LIKE \'%'.$key.'%\' LIMIT ' .$goster.', '.$limit;
                $kategoriler = $db -> prepare($query);
                $kategoriler -> execute();
                $total = say("kategori");
                $pages = ceil($total / $limit);
                $kategoriler -> execute();
                if($kategoriler -> rowCount()) {
                    foreach($kategoriler as $row) { ?>
                        <tr>
                            <td><?php echo $row['kategori_id']?></td>
                            <td><?php echo $row['kategori_ad']?></td>
                            <td>
                                <button type="button" class="btn btn-dark" data-toggle="modal"
                                        data-target="#update_modal<?php echo $row['kategori_id'] ?>">
                                    <span class="fa fa-edit"></span>
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#delete_modal<?php echo $row['kategori_id'] ?>">
                                    <span class="fa fa-trash"></span>
                                </button>
                            </td>
                        </tr>
                        <?php
                        include 'duzenle_kategori.php';
                        include 'delete_kategori.php';
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
                    <?php pagination($page,$pages, 'dogrusunasilyazilir/kategori.php?kategori_key='.$key.'&kategori_sayfa=','kategorilerTable');?>
                </ul>
            </nav>
        </div>
    </div>
</section>
<?php
include 'add_kategori.php';
include 'footer.php';
?>
