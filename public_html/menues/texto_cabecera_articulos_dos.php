<?php 
//$url= "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url= $_SERVER['REQUEST_URI'];
//echo $url;
?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php $urluno = "/";?>
<?php $urldos = "/gabrielle/";?>
<?php $urltres = "/index.php";?>
<?php $urlcero = "/bienvenido.html";?>
<?php $urlocho = "/gabrielle/bienvenido.html";?>
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
<?php if ($url == $urlcero or $url == $urluno or $url == $urldos or $url == $urltres or $url == $urlocho) { // Show if recordset not empty ?>

<div class="separadoruno"></div>
<table width="100%" border="0">
  <tr>
  <td align="right">
  <div class="menuhorizontal0001">
  <?php echo $row_textoaweb['strTexto7']; ?> <strong><?php echo $row_versubcategoriaspack001['strNombre']; ?>&nbsp;&nbsp;
  </div>
  </td>
  </tr>
</table>
<div class="separadoruno"></div>

<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************--><!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== strpos($url,'/es/')) { // Show if recordset not empty ?>

<div class="separadoruno"></div>
<table width="100%" border="0">
  <tr>
  <td align="right">
  <div class="menuhorizontal0001">
  <?php echo $row_textoaweb['strTexto7']; ?> <strong><?php echo $row_versubcategoriaspack001['strNombre']; ?>&nbsp;&nbsp;
  </div>
  </td>
  </tr>
</table>
<div class="separadoruno"></div>

<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************--><!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== strpos($url,'/en/')) { // Show if recordset not empty ?>

<div class="separadoruno"></div>
<table width="100%" border="0">
  <tr>
  <td align="right">
  <div class="menuhorizontal0001">
  <?php echo $row_textoaweb['strTexto7En']; ?> <strong><?php echo $row_versubcategoriaspack001['strNombreEn']; ?>&nbsp;&nbsp;
  </div>
  </td>
  </tr>
</table>
<div class="separadoruno"></div>

<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== strpos($url,'/ru/')) { // Show if recordset not empty ?>

<div class="separadoruno"></div>
<table width="100%" border="0">
  <tr>
  <td align="right">
  <div class="menuhorizontal0001">
  <?php echo $row_textoaweb['strTexto7Ru']; ?> <strong><?php echo $row_versubcategoriaspack001['strNombreRu']; ?>&nbsp;&nbsp;
  </div>
  </td>
  </tr>
</table>
<div class="separadoruno"></div>

<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->