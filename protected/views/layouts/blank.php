
<?php
$kategori =Yii::app()->session->get('id_kategori');
$username = Yii::app()->session->get('username');
$id = Yii::app()->session->get('id');
$model = WebUser::model()->findByPk($username);

 

$judulLaporan = Kategori::model()->getNamaKategori($kategori);
foreach ($judulLaporan as $data) : {
                    $judul = $data['keterangan'];
                  }
endforeach


?>

<?php
      function cetakTanggalNow(){


    ?>
    <!-- Menampilkan date time realtime -->
    <script type="text/javascript">        
    function tampilkanwaktu(){         //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik    
    var waktu = new Date();            //membuat object date berdasarkan waktu saat 
    var sh = waktu.getHours() + "";    //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
    var sm = waktu.getMinutes() + "";  //memunculkan nilai detik    
    var ss = waktu.getSeconds() + "";  //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
    document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>
Pukul : 
<!-- /*Menampilkan Waktu*/ -->
<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);load();">        
<span id="clock"></span> 
<!-- /*Selesai Menampilkan Waktu*/
/*Menampilakan Hari*/ -->
</br>
<?php
$hari = date('l');
/*$new = date('l, F d, Y', strtotime($Today));*/
if ($hari=="Sunday") {
 echo "Minggu";
}elseif ($hari=="Monday") {
 echo "Senin";
}elseif ($hari=="Tuesday") {
 echo "Selasa";
}elseif ($hari=="Wednesday") {
 echo "Rabu";
}elseif ($hari=="Thursday") {
 echo("Kamis");
}elseif ($hari=="Friday") {
 echo "Jum'at";
}elseif ($hari=="Saturday") {
 echo "Sabtu";
}
?>,
<!-- /*Selesai Menampilkan Hari*/

/*Menampilkan Tanggal*/ -->
<?php
$tgl =date('d');
echo $tgl;
$bulan =date('F');
if ($bulan=="January") {
 echo " Januari ";
}elseif ($bulan=="February") {
 echo " Februari ";
}elseif ($bulan=="March") {
 echo " Maret ";
}elseif ($bulan=="April") {
 echo " April ";
}elseif ($bulan=="May") {
 echo " Mei ";
}elseif ($bulan=="June") {
 echo " Juni ";
}elseif ($bulan=="July") {
 echo " Juli ";
}elseif ($bulan=="August") {
 echo " Agustus ";
}elseif ($bulan=="September") {
 echo " September ";
}elseif ($bulan=="October") {
 echo " Oktober ";
}elseif ($bulan=="November") {
 echo " November ";
}elseif ($bulan=="December") {
 echo " Desember ";
}
$tahun=date('Y');
echo $tahun;
?>
<!-- /*Selesai Menampilkan Tanggal*/ -->
    <!--  -->
    <?php

  }

  function cetakWelcome(){
    $tanggal = mktime(date('m'), date("d"), date('Y'));
    // echo "Tanggal : <b> " . date("d-m-Y", $tanggal ) . "</b>";
    date_default_timezone_set("Asia/Jakarta");
    $jam = date ("H:i:s");
    // echo " | Pukul : <b> " . $jam . " " ." </b> ";
    $a = date ("H");
    if (($a>=4) && ($a<10)) {
        echo " <b>Selamat Pagi</b>";
    }else if(($a>=10) && ($a<=14)){
        echo "Selamat  Siang";
    }elseif(($a>=15) && ($a<=16)){
        echo "Selamat Sore";
    }elseif(($a>=17) && ($a<=18)){
        echo "Selamat Petang";
    }else{
        echo "<b> Selamat Malam </b>";
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo CHtml::encode(Yii::app()->name); ?></title>
    <script src="<?= Yii::app()->request->baseUrl;?>/custom/vendors/Chart.js/dist/Chart.bundle.js"></script>
    <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/custom/production/images/e-pemilu.png">

    <!-- Bootstrap -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/build/css/custom.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  </head>


        <!-- if user!=admin -->
        
        
        <!-- end of user!= admin -->
        
        
<!-- page content -->
        <div class="right_col" role="main">
          <div class="clearfix"></div>

          <div class="row">
          	<div class="col-md-12">
          		<div class="x_panel">

          			
                <!-- <div class="clearfix"></div>
          			<div class="x_content"> -->
          				<?php echo $content; ?>
          			<!-- </div>
          		</div> -->
          	</div>
          </div>

          
 
          
        </div>
        <!-- /page content -->



        <!-- footer content -->
        <footer>
          <div class="pull-right"><img src="<?php echo Yii::app()->request->baseUrl; ?>/custom/production/images/e-pemilu.png" alt="..." style='height:40px; width:40px;'>© POLSUB 2023
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/build/js/custom.min.js"></script>


		<!-- Datatables -->

	<script type="<?php echo Yii::app()->request->baseUrl; ?>/custom/dataTables.bootstrap.min.js"></script>
	<script type="<?php echo Yii::app()->request->baseUrl; ?>/custom/jquery.dataTables.min.js"></script>
	<script type="<?php echo Yii::app()->request->baseUrl; ?>/custom/jquery-1.12.4.js"></script>

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/custom/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

    
    <script>
    	$(document).ready(function() {
    $('#example').DataTable();
} );
    </script>

	
  </body>
</html>