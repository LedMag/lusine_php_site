<?php 
//$url= "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url= $_SERVER['REQUEST_URI'];
//echo $url;
?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php $urluno = "/";?>
<?php $urldos = "/trebol/";?>
<?php $urltres = "/bienvenido.html";?>
<?php $urlocho = "/trebol/bienvenido.html";?>
<?php $urlcuatro = strpos($url,'/es/');?>
<?php $urlcinco = strpos($url,'/en/');?>
<?php $urlseis = strpos($url,'/ru/');?>
<?php $urlsiete = strpos($url,'/fr/');?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== strpos($url,'/es/')) { // Show if recordset not empty ?>

<div class="tipografiagothicgr">
<strong><?php echo $row_textosmedios['strAvisoEs']; ?></strong>
</div>
<p>
<div class="tipografiagothic">
<?php echo $row_cookies['strAvisoLegal']; ?>
</div>

<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== strpos($url,'/en/')) { // Show if recordset not empty ?>

<div class="tipografiagothicgr">
<strong><?php echo $row_textosmedios['strAvisoEn']; ?></strong>
</div>
<p>
<div class="tipografiagothic">
<?php echo $row_cookies['strAvisoLegalEn']; ?>
</div>

<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== strpos($url,'/ru/')) { // Show if recordset not empty ?>

<div class="tipografiagothicgr">
<strong><?php echo $row_textosmedios['strAvisoRu']; ?></strong>
</div>
<p>
<div class="tipografiagothic">
<?php echo $row_cookies['strAvisoLegalRu']; ?>
</div>

<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== strpos($url,'/fr/')) { // Show if recordset not empty ?>

<div class="tipografiagothicgr">
<strong><?php echo $row_textosmedios['strAvisoFr']; ?></strong>
</div>
<p>
<div class="tipografiagothic">
<?php echo $row_cookies['strAvisoLegalFr']; ?>
</div>

<?php } // Show if recordset not empty ?>

<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== strpos($url,'/it/')) { // Show if recordset not empty ?>

<div class="tipografiagothicgr">
<strong><?php echo $row_textosmedios['strAvisoIt']; ?></strong>
</div>
<p>
<div class="tipografiagothic">
<?php echo $row_cookies['strAvisoLegalIt']; ?>
</div>

<?php } // Show if recordset not empty ?>
