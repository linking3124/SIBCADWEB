<?php $kategori =Yii::app()->session->get('id_kategori'); ?>
<h1>Selamat datang di POLSUB <img src="<?php echo Yii::app()->request->baseUrl; ?>/custom/production/images/e-pemilu.png" alt="..." style='height:50px; width:50px;'></h1>
</div>

 
  <div class="x_title">
              
         
          </div>
          <div class="clearfix"></div>

                        <!-- top tiles -->
          <div class="row tile_count">
            

            <?php
            if ($kategori == '-1'){
            ?>

            <!-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a title="Lihat data-data administrator" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/webUser/admin">
              <span class="count_top"> Menu Administrator</span>
              <div class="count grey"><i class="fa fa-lock"></i> 
               </div>
             </a>
            </div> -->


             <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a title="Lihat data-data BCAD" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/calon/admin">
              <span class="count_top"> Kelola Akun</span>
              <div class="count grey"><i class="fa fa-user"></i>
               </div>
             </a>
            </div>

             <!-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a title="Lihat kegiatan-kegiatan BCAD Provinsi" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/kegiatanProvinsi/admin">
              <span class="count_top"> Keg BCAD Provinsi</span>
               <div class="count grey"><i class="fa fa-file-text"></i>
               </div>
             </a>
            </div> -->

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a title="Lihat kegiatan-kegiatan BCAD Kabupaten/Kota" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/kegiatanKabkota/admin">
              <span class="count_top"> Laporan Office Boy</span>
               <div class="count grey"><i class="fa fa-file-text"></i>
               </div>
             </a>
            </div>


            <?php } else {

              ?>


            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a title="Lihat kegiatan-kegiatan BCAD Kabupaten/Kota" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/kegiatanKabkota/admin">
              <span class="count_top"> Verifikasi Laporan</span>
               <div class="count grey"><i class="fa fa-file-text"></i>
               </div>
             </a>
            </div>

             

              <?php } ?>

            

            <!-- <div class="row tile_count"></div> -->

            
 
<div class="clearfix"></div>


          

