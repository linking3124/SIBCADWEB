<?php
/* @var $this KegiatanController */
/* @var $model Kegiatan */
$kategori =Yii::app()->session->get('id_kategori');

$this->breadcrumbs=array(
	'Kegiatans'=>array('index'),
	$model->id_kegiatan,
);

$this->menu=array(
	// array('label'=>'List Kegiatan', 'url'=>array('index')),
	// array('label'=>'Create Kegiatan', 'url'=>array('create')),
	// array('label'=>'Update Kegiatan', 'url'=>array('update', 'id'=>$model->id_kegiatan)),
	// array('label'=>'Delete Kegiatan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_kegiatan),'confirm'=>'Are you sure you want to delete this item?')),
	// array('label'=>'Manage Kegiatan', 'url'=>array('admin')),
);
?>

<!-- <h1>View Kegiatan #<?php echo $model->id_kegiatan; ?></h1> -->

<h2><i class="fa fa-user"></i> Kelola Laporan Pengawas<?php foreach ($modelPemilik as $data) :  {
	echo $data['nama'];
} endforeach; ?></h2>
<div class="x_title">
                    </div>

<div class="row">
        <div class="col-md-12">
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
            	<a class="btn btn-primary" onclick="location='admin'"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<br><br>    

                <div class="profile_img">
                                <div id="crop-avatar">
                                    <a target="_blank" href="<?php echo Yii::app()->request->baseUrl; ?>/images/kegiatan/<?php echo $model->foto; ?>">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" src="<?php echo Yii::app()->request->baseUrl; ?>/images/kegiatan/<?php echo $model->foto; ?>" alt="Avatar" title="<?php ?>">
                                    </a>
                                </div>
                            </div>
                            <h3><?php ?></h3>

                            <ul class="list-unstyled user_data">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th scope="row">ID Laporan</th>
                                        <td><?php echo $model->id_kegiatan; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama</th>
                                        <td><?php echo $model->nama; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </ul>

                        <!-- <a title="Edit Calon Saksi" class="btn btn-warning col-md-12" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/kegiatanProvinsi/update/<?= $model->id_kegiatan; ?>"><i class="fa fa-pencil"></i> Update Data</a> -->
                    <?php 
                        if ($kategori == '-1'){
                    ?>
                        <a onclick="return confirm('Anda yakin ingin menghapus laporan <?php echo $model['id_calon'];?> ? Semua Hasil yang dilaporkan <?php echo $model->nama;?> juga ikut terhapus' )" title="Hapus Kegiatan" class="btn btn-danger col-md-12" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/kegiatanProvinsi/delete/<?= $model->id_kegiatan; ?>"><i class="fa fa-trash"></i> Hapus Data</a>
                        <?php } ?>
                        </div>
<br>
<br>
<br>
                        <div class="col-md-9 col-sm-9 col-xs-15">

                            <div class="x_panel">

                            <div class="x_content">

                    <div class="row">

                      <p><strong>Galeri <?= $model->nama; ?></strong></p>

                      <div class="col-md-55">
                        <div class="thumbnail">
                        <a target="_blank" href="<?php echo Yii::app()->request->baseUrl; ?>/images/kegiatan/<?php echo $model->foto; ?>">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/kegiatan/<?php echo $model->foto; ?>" alt="image">
                            <div class="mask">
                              <p>Your Text</p>
                              <div class="tools tools-bottom">
                                <!-- <a href="#"><i class="fa fa-link"></i></a>
                                <a href="#"><i class="fa fa-pencil"></i></a>
                                <a href="#"><i class="fa fa-times"></i></a> -->
                              </div>
                            </div>
                          </div>
                          </a>
                          <div class="caption">
                            <p>Gambar 1</p>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-55">
                        <div class="thumbnail">
                        <a target="_blank" href="<?php echo Yii::app()->request->baseUrl; ?>/images/kegiatan/<?php echo $model->foto2; ?>">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/kegiatan/<?php echo $model->foto2 ?>" alt="image">
                            <div class="mask">
                              <p>Klik untuk perbesar</p>
                              <div class="tools tools-bottom">
                                <!-- <a href="#"><i class="fa fa-link"></i></a>
                                <a href="#"><i class="fa fa-pencil"></i></a>
                                <a href="#"><i class="fa fa-times"></i></a> -->
                              </div>
                            </div>
                          </div>
                          </a>
                          <div class="caption">
                            <p>Gambar 2</p>
                          </div>
                        </div>
                      </div>

                      
                      <div class="col-md-55">
                        <div class="thumbnail">
                        <a target="_blank" href="<?php echo Yii::app()->request->baseUrl; ?>/images/kegiatan/<?php echo $model->foto3; ?>">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/kegiatan/<?php echo $model->foto3; ?>" alt="image">
                            <div class="mask">
                              <p>Klik untuk perbesar</p>
                              <div class="tools tools-bottom">
                                <!-- <a href="#"><i class="fa fa-link"></i></a>
                                <a href="#"><i class="fa fa-pencil"></i></a>
                                <a href="#"><i class="fa fa-times"></i></a> -->
                              </div>
                            </div>
                          </div>
                          </a>
                          <div class="caption">
                            <p>Gambar 3</p>
                          </div>
                        </div>
                      </div>
                      

                      <div class="col-md-55">
                        <div class="thumbnail">
                        <a target="_blank" href="<?php echo Yii::app()->request->baseUrl; ?>/images/kegiatan/<?php echo $model->foto4; ?>">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/kegiatan/<?php echo $model->foto4; ?>" alt="image">
                            <div class="mask">
                              <p>Klik untuk perbesar</p>
                              <div class="tools tools-bottom">
                                <!-- <a href="#"><i class="fa fa-link"></i></a>
                                <a href="#"><i class="fa fa-pencil"></i></a>
                                <a href="#"><i class="fa fa-times"></i></a> -->
                              </div>
                            </div>
                          </div>
                          </a>
                          <div class="caption">
                            <p>Gambar 4</p>
                          </div>
                        </div>
                      </div>

                      
                        </div>
            </div>

                                <div class="x_content">

                                    <!-- start accordion -->
                                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">ID Laporan</th>
                                                        <td><?php echo $model->id_kegiatan; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Username</th>
                                                        <td><?php echo $model->id_calon; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Nama</th>
                                                        <td><?php echo $model->nama; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">ID dapil</th>
                                                        <td><?php echo $model->id_kabkota; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">ID Gedung</th>
                                                        <td><?php echo $model->id_kec; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">ID Ruangan</th>
                                                        <td><?php echo $model->id_keldesa; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Jumlah Orang</th>
                                                        <td><?php echo $model->jumlah_peserta; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tanggal</th>
                                                        <td><?php echo $model->tanggal; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Jenis</th>
                                                        <td><?php echo $model->jenis; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Latitude</th>
                                                        <td><?php echo $model->lat;?></td>
                                                    </tr>
                                                    <tr>
                                                    	<th scope="row">Longitude</th>
                                                        <td><?php echo $model->lng; ?></td>
                                                    </tr>
                                                    <tr>
                                                    	<th scope="row">Keterangan</th>
                                                        <td><?php echo $model->keterangan; ?></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- end of accordion -->


                                </div>

                            </div>
                            
		</div>
</div>

<?php
//  $this->widget('zii.widgets.CDetailView', array(
// 	'data'=>$model,
// 	'attributes'=>array(
// 		'id_kegiatan',
// 		'username',
// 		'nama',
// 		'tanggal',
// 		'jenis',
// 		'lat',
// 		'lng',
// 		'foto',
// 		'keterangan',
// 	),
// ));
 ?>
