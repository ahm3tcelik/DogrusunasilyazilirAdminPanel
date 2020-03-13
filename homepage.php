<?php
session_start();
if(!$_SESSION['uadmin_IsLogin']) {
    header("location: index.php");
}
require_once 'sistem/db_config.php';
include'navbar.php';

$query = "SELECT kategori_ad, count(*) as toplam_soru FROM soru s JOIN kategori k 
                                ON s.kategori_id = k.kategori_id GROUP BY kategori_ad";
$sayi_per_kategori = $db -> query($query);
$sayi_per_kategori -> execute();
$kategori = array();
$sorusayi = array();
$toplam = 0;
if($sayi_per_kategori -> rowCount()) {
    foreach ($sayi_per_kategori as $row) {
        array_push($kategori, $row[0]);
        array_push($sorusayi, $row[1]);
        $toplam += $row[1];
    }
}
?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
    <section class="container">
        <div class="row pt-5">
            <div class="col-12 text-center text-light">
                <h4 class="lead" style="font-size: 25px;">SORULARIN KATEGORİLERE GÖRE DAĞILIMI</h4>
            </div>
        </div>
        <div class="row justify-content-center py-3">
            <div class="col-sm-12 col-lg-6 ">
                <table class="table bg-danger table-hover table-bordered text-light">
                    <thead>
                    <th>Kategoriler</th>
                    <th>Soru Sayısı</th>
                    </thead>
                    <tbody>
                    <?php
                    for($i = 0; $i < count($kategori); $i++) {
                        echo '<tr> <td>'.$kategori[$i].'</td><td>'.$sorusayi[$i].'</td>';
                    }
                    ?>
                    <tr>
                        <th>TOPLAM</th>
                        <th><?php echo "$toplam"?></th>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-12 col-lg-6 ">
                <canvas id="doughnutChart" width="3" height="2"></canvas>
                <script>
                    var data = {
                        labels: <?php echo json_encode($kategori, JSON_UNESCAPED_UNICODE);?>,
                        datasets: [{
                            data: <?php echo json_encode($sorusayi);?>,
                            backgroundColor: ["#F7464A", "#27ae60", "#FDB45C", "#8e44ad", "#4D5360","#2c3e50",
                                "#bdc3c7","#d35400","#f39c12","#16a085","#7f8c8d"],
                            hoverBackgroundColor: ["#FF5A5E", "#2ecc71", "#FFC870", "#9b59b6", "#616774","#34495e",
                                "#ecf0f1","#e67e22","#f1c40f","#1abc9c","#95a5a6"]
                        }]
                    };
                    var ctxD = document.getElementById("doughnutChart").getContext('2d');
                    var myLineChart = new Chart(ctxD, {
                        type: 'doughnut',
                        data: data,
                        options: {
                            responsive: true,
                            legend: {
                                labels: {
                                    fontColor: 'white',
                                    padding: 20,
                                    boxWidth: 10
                                },
                                position: 'right'
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </section>
<?php include'footer.php'; ?>