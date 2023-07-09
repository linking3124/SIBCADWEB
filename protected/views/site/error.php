<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = Yii::app()->name . ' - Error';
$this->breadcrumbs = array(
    'Error',
);
?>

<div class="login__form"> 
    <h1>Data terbaru telah dimasukan</h1>

    <div class="error">
        <?php echo "Silahkan kembali ke halaman sebelumnya" ?>
        <br>
        <br>
        <a style="color:white;" href="javascript:window.history.back();">Kembali</a>
    </div>
</div>
