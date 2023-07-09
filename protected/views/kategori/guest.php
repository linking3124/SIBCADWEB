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
        center: new google.maps.LatLng(0.463847, 101.39023),
        zoom: 15,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;
 
      // Bagian ini digunakan untuk mendapatkan data format XML yang dibentuk dalam actionDataLokasi
      downloadUrl("<?php echo Yii::app()->request->baseUrl;?>/index.php/hasil/dataLokasi", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {

        var id_hasil = markers[i].getAttribute("id_hasil");
        var nama = markers[i].getAttribute("nama");
        var jlhsuara_paslon1 = markers[i].getAttribute("jlhsuara_paslon1");
        var jlhsuara_paslon2 = markers[i].getAttribute("jlhsuara_paslon2");
        var jlhsuara_paslon3 = markers[i].getAttribute("jlhsuara_paslon3");
        var jlhsuara_paslon4 = markers[i].getAttribute("jlhsuara_paslon4");
        var pemenang = markers[i].getAttribute("pemenang");
        var nama_pengirim = markers[i].getAttribute("nama_pengirim");
        var waktu = markers[i].getAttribute("waktu");
        var lat = markers[i].getAttribute("lat");
        var lng = markers[i].getAttribute("lng");
        
            
      //#429ADB biru
 
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<a><b>" +" #" + "</b><b>" + nama + "<br/>"+pemenang+"</b><div align='left'>"+"<br/>Suara Paslon #1 : "+jlhsuara_paslon1+ "</br>Suara Paslon #2 : "+jlhsuara_paslon2+"</br>Suara Paslon #3 : "+jlhsuara_paslon3+"</br>Suara Paslon #4 : "+jlhsuara_paslon4+"<br/></br>Pengirim : "+nama_pengirim+" <br/>" +waktu+"</a></div>";
          var icon = customIcons;
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: '<?php echo Yii::app()->request->baseUrl;?>/custom/production/images/markers/'+pemenang+'.png',
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
  <h1>Selamat datang di <i><?php echo CHtml::encode(Yii::app()->name); ?> </i><img src="<?php echo Yii::app()->request->baseUrl; ?>/custom/production/images/e-pemilu.png" alt="..." style='height:50px; width:50px;'></h1>

 
  <div class="x_title">
              
          </div>
          <div class="x_title">
              
              <!-- top tiles -->
          <div class="row tile_count">
            <!-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/admin">
              <span class="count_top"><i class="fa fa-user"></i> Total Pengguna</span>
              <div class="count green"><?php foreach ($model as $data) : {
                echo $data['COUNT(id_user)'];
              }

               ?>
                 <?php endforeach ?>
               </div>
             </a>
            </div> -->

            

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top"> Suara Paslon #1</span>
              <div class="count blue"><i class="fa fa-user"></i> <?php foreach ($modelgetCountHasilPaslon1 as $data) : {
                echo $data['total'];
              }

               ?>
                 <?php endforeach ?>
               </div>
             </a>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top"> Suara Paslon #2</span>
              <div class="count purple"><i class="fa fa-user"></i> <?php foreach ($modelgetCountHasilPaslon2 as $data) : {
                echo $data['total'];
              }

               ?>
                 <?php endforeach ?>
               </div>
             </a>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top"> Suara Paslon #3</span>
              <div class="count red"><i class="fa fa-user"></i> <?php foreach ($modelgetCountHasilPaslon3 as $data) : {
                echo $data['total'];
                
              }

               ?>
                 <?php endforeach ?>
               </div>
             </a>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top"> Suara Paslon #4</span>
              <div class="count green"><i class="fa fa-user"></i> <?php foreach ($modelgetCountHasilPaslon4 as $data) : {
                echo $data['total'];
                
              }

               ?>
                 <?php endforeach ?>
               </div>
             </a>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top"><i class="fa fa-home"></i> Total TPS</span>
              <div class="count gray"><?php foreach ($modelgetCountTps as $data) : {
                echo $data['total'];
              }

               ?>
                 <?php endforeach ?>
               </div>
             </a>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top"><i class="fa fa-database"></i> Sample Masuk</span>
              <div class="count gray"><?php foreach ($modelgetCountHasil as $data) : {
                $presentaseHasil = ($data['total']/15*100);
                $formattedNum = number_format($presentaseHasil, 2);
                echo $formattedNum."%";
              }

               ?>
                 <?php endforeach ?>
               </div>
             </a>
            </div>



            <div class="row tile_count">

            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top"><i class="fa fa-user"></i> % Paslon #1</span>
              <div class="count blue"><?php foreach ($modelgetCountHasilPaslon1Persen as $data) : {
                $presentaseHasil = $data['total'];
                $formattedNum = number_format($presentaseHasil, 2);
                echo $formattedNum."%";
              }

               ?>
                 <?php endforeach ?>
               </div>
             </a>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top"><i class="fa fa-user"></i> % Paslon #2</span>
              <div class="count purple"><?php foreach ($modelgetCountHasilPaslon2Persen as $data) : {
                $presentaseHasil = $data['total'];
                $formattedNum = number_format($presentaseHasil, 2);
                echo $formattedNum."%";
              }

               ?>
                 <?php endforeach ?>
               </div>
             </a>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top"><i class="fa fa-user"></i> % Paslon #3</span>
              <div class="count red"><?php foreach ($modelgetCountHasilPaslon3Persen as $data) : {
                $presentaseHasil = $data['total'];
                $formattedNum = number_format($presentaseHasil, 2);
                echo $formattedNum."%";
              }

               ?>
                 <?php endforeach ?>
               </div>
             </a>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <a>
              <span class="count_top"><i class="fa fa-user"></i> % Paslon #4</span>
              <div class="count green"><?php foreach ($modelgetCountHasilPaslon4Persen as $data) : {
                $presentaseHasil = $data['total'];
                $formattedNum = number_format($presentaseHasil, 2);
                echo $formattedNum."%";
              }

               ?>
                 <?php endforeach ?>
               </div>
             </a>
            </div>

            <div class="row tile_count"></div>

            
 
<div class="clearfix"></div>
 
<center>
 
</center>
<div id="map"></div>
<br>




<div class="clearfix"></div>



</body>
 
</html>
