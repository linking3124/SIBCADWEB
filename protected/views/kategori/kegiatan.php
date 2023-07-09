<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$kategori = Yii::app()->session->get('id_kategori');

$servername = "localhost"; // Nama server database
$username = "root"; // Nama pengguna database
$password = ""; // Kata sandi pengguna database
$dbname = "sibcad"; // Nama database

// Membuat koneksi ke database
$con = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (mysqli_connect_errno()) {
  echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
  exit();
}

// Query untuk mengambil data dari tb_kegiatan_kabkota
if ($model->daerah == 1) {
  $query = "SELECT * FROM tb_kegiatan_kabkota WHERE status = 0  AND id_kec LIKE '1%'";
  $result = mysqli_query($con, $query);
} elseif ($model->daerah == 2) {
  $query = "SELECT * FROM tb_kegiatan_kabkota WHERE status = 0  AND id_kec LIKE '2%'";
  $result = mysqli_query($con, $query);
} else {
  $query = "SELECT * FROM tb_kegiatan_kabkota WHERE status = 0";
  $result = mysqli_query($con, $query);
}
?>



<!-- <p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
  <li>View file: <code><?php echo __FILE__; ?></code></li>
  <li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p> -->

<head>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1H72Fojan6yCxKf5DhNXD1Er4Y60ngWU&callback=myMap"></script>
 
<style>
h1 {text-align:center;}
          html, body {
               }
          #map {
               width: 100%;
               height: 540px;
               border: 0px solid black;
          }
</style>
 
<script type="text/javascript">

      var customIcons = {
 
        // icon di sini di non aktifkan karna, icon di definisikan di method load() agar mengikuti kategori
        // icon: '<?php echo Yii::app()->request->baseUrl;?>/custom/production/images/markers/marker'+id_kategori+'.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
    };

    function load() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(-6.556176,107.749168),
        zoom: 8,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;
 
      // Bagian ini digunakan untuk mendapatkan data format XML yang dibentuk dalam actionDataLokasi
      downloadUrl("<?php echo Yii::app()->request->baseUrl;?>/index.php/kegiatanProvinsi/datalokasi/<?php echo $model->id_calon; ?>", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {

        var id_kegiatan = markers[i].getAttribute("id_kegiatan");
        var nama = markers[i].getAttribute("nama");
        var tanggal = markers[i].getAttribute("tanggal");
        var jenis = markers[i].getAttribute("jenis");
        var foto = markers[i].getAttribute("foto");
        var lat = markers[i].getAttribute("lat");
        var lng = markers[i].getAttribute("lng");
        
            
      //#429ADB biru
 
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<a><b>" +" #" +id_kegiatan+ "</b></br><b>" + nama + "</b><br/><div align='left'>"+jenis+"</br>"+ tanggal+"<br/><img class='img-responsive-avatar-view' height='100' widh='100' src='<?php echo Yii::app()->request->baseUrl?>/images/kegiatan/"+foto+" '> </a></div>";
          var icon = customIcons;
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: '<?php echo Yii::app()->request->baseUrl;?>/custom/production/images/markers/paslon<?php echo $model->id_calon ?>.png',
            shadow: customIcons.shadow
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }
 
    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }
 
    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;
 
      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };
 
      request.open('GET', url, true);
      request.send(null);
    }
 
    function doNothing() {}
 
</script>
 
</head>
 
<body onload="load()">
  <h1>Selamat datang <?= $model->nama; ?> </h1>

<!-- Start Chart -->
<div class="row">
<script src="Chart.bundle.js"></script>
    <div class="col-md-12">
    <h5><i class="fa fa-bar-chart"></i> Grafik Laporan #<small><?php echo $model->nama; ?> </small></h3>
    <div class="x_title"></div>
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["R", "L", "GD", "T", "GU", "H", "La"],
                    datasets: [{
                            label: 'Jenis Kegiatan Pengawas',
                            //data: [12, 19, 3, 5, 2, 3, 4],
                             data: [<?php 
                             //while ($p = mysqli_fetch_array($penghasilan)) { echo '"' . $p['hasil_penjualan'] . '",';}
                             foreach ($getAllCountPerJenisByPk as $data) {
                              echo '"' . $data['Ruangan'] . '",';
                              echo '"' . $data['Lantai'] . '",';
                              echo '"' . $data['Gedung'] . '",';
                              echo '"' . $data['Toilet'] . '",';
                              echo '"' . $data['Gudang'] . '",';
                              echo '"' . $data['HalamanTaman'] . '",';
                              echo '"' . $data['lainnya'] . '"';
                             }
                             ?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(153, 102, 255, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(153, 102, 255, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
    <!-- End pof chart -->  

    
    <ul>
    <p>Keterangan: </p>
    <li style="color:#ff6384">R : Ruangan</li>
      <li style="color:#3698eb">L : Lantai</li>
      <li style="color:#ffce56">GD : Gedung</li>
      <li style="color:#4bc0c0">T : Toilet</li>
      <li style="color:#9966ff">GU : Gudang</li>
      <li style="color:#ff9f40">H : Halaman/Taman</li>
      <li style="color:#9966ff">La : Lainnya</li>
    </ul>
 
  <div class="x_title">
          
            
 
<div class="clearfix"></div>
 
<center>
 
</center>
<h5><i class="fa fa-map-marker"></i> Peta Kegiatan <small> #<?php echo $model->nama; ?> </small></h3>
    <div class="x_title"></div>
    <br>
  
<div id="map"></div>
<br>


<div class="clearfix"></div>
<?php
            if (isset($_POST['terima'])) {
                $id_kegiatan = $_POST['terima'];

                // Query UPDATE untuk mengubah status menjadi 1 pada tabel tb_kegiatan_kabkota
                $updateQuery = "UPDATE tb_kegiatan_kabkota SET status = 1 WHERE id_kegiatan = $id_kegiatan";
                mysqli_query($con, $updateQuery);

                // Refresh halaman setelah melakukan perubahan
                header("Location: kegiatan.php");
                exit();
            }

            // Memproses permintaan saat tombol "Tolak" ditekan
            if (isset($_POST['tolak'])) {
                $id_kegiatan = $_POST['tolak'];

                // Query DELETE untuk menghapus data dari tabel tb_kegiatan_kabkota
                $deleteQuery = "DELETE FROM tb_kegiatan_kabkota WHERE id_kegiatan = $id_kegiatan";
                mysqli_query($con, $deleteQuery);

                // Refresh halaman setelah melakukan perubahan
                header("Location: kegiatan.php");
                exit();
            }

            ?>
<table class="table">
  <thead>
    <tr>
      <th>NO</th>
      <th>Nama</th>
      <th>Tanggal</th>
      <th>Keterangan</th>
      <th>Foto</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Inisialisasi nomor awal
    $nomor = 1;

    // Loop untuk setiap baris data
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $nomor . "</td>";
      echo "<td>" . $row['nama'] . "</td>";
      echo "<td>" . $row['tanggal'] . "</td>";
      echo "<td>" . $row['keterangan'] . "</td>";
      echo "<td><img src='" . Yii::app()->request->baseUrl . "/images/kegiatan/" . $row['foto'] . "' height='100' width='100'></td>";
      echo "<td>";
      echo "<form method='post'>";
      echo "<input type='hidden' name='terima' value='" . $row['id_kegiatan'] . "'>";
      echo "<button type='submit' style='background-color: green;'>Terima</button>";
      echo "</form>";
      echo "<form method='post'>";
      echo "<input type='hidden' name='tolak' value='" . $row['id_kegiatan'] . "'>";
      echo "<button type='submit' style='background-color: red;'>Tolak</button>";
      echo "</form>";
      echo "</td>";
      echo "</tr>";
      $nomor++;
    }
    ?>
  </tbody>
</table>


</body>
 
</html>
