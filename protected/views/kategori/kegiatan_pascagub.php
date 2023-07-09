<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
 $kategori =Yii::app()->session->get('id_kategori');
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
      downloadUrl("<?php echo Yii::app()->request->baseUrl;?>/index.php/kegiatanPascagub/datalokasi/<?= $model->id_pascagub ?>", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {

        var id_kegiatan = markers[i].getAttribute("id_kegiatan");
        var id_pascagub = markers[i].getAttribute("id_pascagub");
        var nama = markers[i].getAttribute("nama");
        var nama_pascagub = markers[i].getAttribute("nama_pascagub");
        var tanggal = markers[i].getAttribute("tanggal");
        var jenis = markers[i].getAttribute("jenis");
        var foto = markers[i].getAttribute("foto");
        var lat = markers[i].getAttribute("lat");
        var lng = markers[i].getAttribute("lng");
        
            
      //#429ADB biru
 
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<a target='_blank' href='../kegiatanPascagub/"+id_kegiatan +"'><b>" +" #" +id_kegiatan+ " "+nama_pascagub+"</b></br></br><b>" + nama + "</b><br/><div align='left'>"+jenis+"</br>"+ tanggal+"<br/><img class='img-responsive-avatar-view' height='100' widh='100' src='<?php echo Yii::app()->request->baseUrl?>/images/kegiatan/"+foto+" '> </a></div>";
          var icon = customIcons;
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: '<?php echo Yii::app()->request->baseUrl;?>/custom/production/images/markers/paslon'+id_pascagub+'.png',
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
    <h5><i class="fa fa-bar-chart"></i> Grafik Jenis Kegiatan BCAD #<small><?php echo $model->nama; ?> </small></h3>
    <div class="x_title"></div>
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["KTM", "KD", "KT", "PT", "PTM", "KT", "La"],
                    datasets: [{
                            label: 'Jenis Kegiatan Saya',
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
      <li style="color:#ff6384">KTM : Kampanye Tatap Muka</li>
      <li style="color:#3698eb">KD : Kampanye Dialogis</li>
      <li style="color:#ffce56">KT : Kampanye Terbuka</li>
      <li style="color:#4bc0c0">PT : Pertemuan Terbatas</li>
      <li style="color:#9966ff">PTP : Pertemuan Tim Pemenangan</li>
      <li style="color:#ff9f40">KT : Kunjungan Tokoh</li>
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



</body>
 
</html>
