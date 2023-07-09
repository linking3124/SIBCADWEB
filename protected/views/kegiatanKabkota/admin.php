<?php
/* @var $this KegiatanKabkotaController */
/* @var $model KegiatanKabkota */
$kategori =Yii::app()->session->get('id_kategori');

$this->breadcrumbs=array(
	'Kegiatan Kabkotas'=>array('index'),
	'Manage',
);

$this->menu=array(
	// array('label'=>'List KegiatanKabkota', 'url'=>array('index')),
	// array('label'=>'Create KegiatanKabkota', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kegiatan-kabkota-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

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
      downloadUrl("<?php echo Yii::app()->request->baseUrl;?>/index.php/kegiatanKabkota/datalokasiAll", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          
        var id_kegiatan = markers[i].getAttribute("id_kegiatan");
        var id_calon = markers[i].getAttribute("id_calon");
        var nama = markers[i].getAttribute("nama");
        var tanggal = markers[i].getAttribute("tanggal");
        var jenis = markers[i].getAttribute("jenis");
        var foto = markers[i].getAttribute("foto");
        var lat = markers[i].getAttribute("lat");
        var lng = markers[i].getAttribute("lng");
        var status = markers[i].getAttribute("status");
        
            //#429ADB biru
 
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<a target='_blank' href='../kegiatanKabkota/"+id_kegiatan +"'><b>" +" #" +id_kegiatan+ "</b></br><b>" + nama + "</b><br/><div align='left'>"+jenis+"</br>"+ tanggal+"<br/><img class='img-responsive-avatar-view' height='100' widh='100' src='<?php echo Yii::app()->request->baseUrl?>/images/kegiatan/"+foto+" '> </a></div>";
          var icon = customIcons;
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: '<?php echo Yii::app()->request->baseUrl;?>/custom/production/images/markers/paslon'+id_calon+'.png',
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

<div class="row">
<script src="Chart.bundle.js"></script>

		<div class="col-md-12">
    <!-- Start Chart -->
    <div class="col-md-6">
    <h3><i class="fa fa-tasks"></i> Kelola Laporan Office Boy</h3>
    <div class="x_title"></div>
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: ["Ruangan", "Lantai", "Gedung", "Toilet", "Gudang", "Halaman/Taman", "Lainnya"],
                    datasets: [{
                            label: 'Jenis Kegiatan Office Boy',
                            //data: [12, 19, 3, 5, 2, 3, 4],
                             data: [<?php 
                             //while ($p = mysqli_fetch_array($penghasilan)) { echo '"' . $p['hasil_penjualan'] . '",';}
                             foreach ($getAllCountPerJenis as $data) {
                              
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

    <!-- Start Chart -->
    
    <!-- End of chart -->

<div class="clearfix"></div>
		<div class="col-md-6">
          <h3><i class="fa fa-tasks"></i> Peta Laporan Office Boy</h3>
        </div>
        <br>
        <br>
        <br>
<div class="x_title"></div>
<div class="clearfix"></div>
<br>
<div id="map"></div>

<br>

<!-- <h1>Manage Kegiatans</h1>

<!-- TABLE STRIPED -->
			<!-- <div class="panel"> -->
				<div class="">
					<div class="col-md-6">
					<h3><i class="fa fa-tasks"></i> Tabel Laporan Office Boy</h3>
				</div>
					<div class="col-md-6 text-right">

									<!-- <i class="fa fa-plus m-right-xs"></i> 
                                    <?php
                                     echo CHtml::Button('Tambah Kegiatan',array('onClick'=>"location='create'", 'class'=>'btn btn-primary')); 
                                     ?>
 -->
                            </div>

					
					
				</div>
				<div class="panel-body">
					<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<br>
						<div class="x_title">
							<br>
					</div>
						<thead>
							<tr>
								<th>#</th>
								<th>Nama Akun</th>
								<th>Nama Kegiatan</th>
                <th>Jumlah Orang</th>
								<th>Tanggal</th>
								<th>Jenis</th>
								<th>Foto</th>
								<th></th>
							</tr>
							</thead>


							<tbody>

									<?php
										// print_r($model); // testing pemanggilan data
									?>

								<?php $no = 1; ?>
                
								<?php foreach ($model as $data) : ?>
                 <?php 
                    if($kategori == '1'){
                      ?>
                                      
									
									<tr>
										<td><?php echo $no;?></td>
										<td><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/calon/viewKabkota/<?php echo $data['id_calon']; ?>"><?= $data['nama_calon']; ?></a></td>
										
										<td><?= $data['nama_kegiatan']; ?></td>
                    <td><?= $data['jumlah_peserta'];?></td>
										<td><?php
										$date = date_create($data['tanggal']); 
										echo date_format($date, 'j F Y, \p\u\k\u\l G:i');
										 ?></td>
										<td><?= $data['jenis']; ?></td>
										<td><a target="_blank" href="<?= Yii::app()->request->baseUrl ?>/images/kegiatan/<?= $data['foto']; ?>"><img class="img-responsive avatar-view" height="100" width="100" src="<?php echo Yii::app()->request->baseUrl; ?>/images/kegiatan/<?php echo $data['foto']; ?>"></a></td>
										<td>
										<!--<div class="hidden-sm hidden-xs action-buttons">-->
											<a title="Lihat detail kegiatan <?= $data['nama_kegiatan']; ?>" class="btn btn-success btn-xs" href="<?= $data['id_kegiatan']; ?>" role="button"><i class="fa fa-search"></i></a>
											<!-- <a class="btn btn-warning btn-xs" href="update/<?= $data['id_kegiatan']; ?>" role="button"><i class="fa fa-pencil"></i></a> -->
                      <a class="btn btn-danger btn-xs" href="delete/<?= $data['id_kegiatan']; ?>" role="button"  onclick="return confirm('Anda yakin ingin menghapus <?php echo $data['nama_kegiatan'];?>?')"><i class="fa fa-trash"></i></a>
											
                      <?php 
                        if ($kategori == '1'){
                      ?>
                      <a title="Lihat detail kegiatan <?= $data['nama_kegiatan']; ?>" class="btn btn-primary btn-xs" href="<?= $data['id_kegiatan'];?>" role="button"><i class="fa fa-search"></i></a>
											<!-- <a class="btn btn-primary btn-xs" href="terima/<?= $data['id_kegiatan']; ?>" role="button"  onclick="return confirm('Anda ingin menenerima ?')"><i class="fa fa-trash"></i></a>
                      </div> -->
                      <?php } ?>
											
											

										</td>
									</tr>
									<?php $no++; ?>
                 
                    
                  <?php }?>
                  <?php
                  if ($kategori =='-1'){
                    ?>
                  <?php 
                        if ($data['status'] <> '0'){
                      ?>
									
									<tr>
										<td><?php echo $no;?></td>
										<td><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/calon/viewKabkota/<?php echo $data['id_calon']; ?>"><?= $data['nama_calon']; ?></a></td>
										
										<td><?= $data['nama_kegiatan']; ?></td>
                    <td><?= $data['jumlah_peserta'];?></td>
										<td><?php
										$date = date_create($data['tanggal']); 
										echo date_format($date, 'j F Y, \p\u\k\u\l G:i');
										 ?></td>
										<td><?= $data['jenis']; ?></td>
										<td><a target="_blank" href="<?= Yii::app()->request->baseUrl ?>/images/kegiatan/<?= $data['foto']; ?>"><img class="img-responsive avatar-view" height="100" width="100" src="<?php echo Yii::app()->request->baseUrl; ?>/images/kegiatan/<?php echo $data['foto']; ?>"></a></td>
										<td>
										<!--<div class="hidden-sm hidden-xs action-buttons">-->
											<a title="Lihat detail kegiatan <?= $data['nama_kegiatan']; ?>" class="btn btn-success btn-xs" href="<?= $data['id_kegiatan']; ?>" role="button"><i class="fa fa-search"></i></a>
											<!-- <a class="btn btn-warning btn-xs" href="update/<?= $data['id_kegiatan']; ?>" role="button"><i class="fa fa-pencil"></i></a> -->
                      <?php 
                        if ($kategori == '-1'){
                      ?>
											<a class="btn btn-danger btn-xs" href="delete/<?= $data['id_kegiatan']; ?>" role="button"  onclick="return confirm('Anda yakin ingin menghapus <?php echo $data['nama_kegiatan'];?>?')"><i class="fa fa-trash"></i></a>
											<!--</div>-->
                      <?php } ?>
											
											

										</td>
									</tr>
									<?php $no++; ?>
                  <?php } ?>
                  <?php } ?>

                  
								<?php endforeach; ?>


							</tbody>
						</table>
					</div>
					</div>

<!-- <p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php 
//$this->renderPartial('_search',array(
//	'model'=>$model,
//));
 ?>
</div> --><!-- search-form -->

<?php
//  $this->widget('zii.widgets.grid.CGridView', array(
// 	'id'=>'kegiatan-kabkota-grid',
// 	'dataProvider'=>$model->search(),
// 	'filter'=>$model,
// 	'columns'=>array(
// 		'id_kegiatan',
// 		'id_calon',
// 		'nama',
// 		'id_kec',
// 		'id_keldesa',
// 		'jumlah_peserta',
// 		/*
// 		'tanggal',
// 		'jenis',
// 		'lat',
// 		'lng',
// 		'foto',
// 		'keterangan',
// 		*/
// 		array(
// 			'class'=>'CButtonColumn',
// 		),
// 	),
// )); 
?>
