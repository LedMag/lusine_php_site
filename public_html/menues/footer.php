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

<table width="90%" border="0" align="center">
  <tr>
    <td align="center" class="texto">© <?php echo $row_textoaweb['strTexto5']; ?></td>
  </tr>
</table>


<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************--><!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== strpos($url,'/es/')) { // Show if recordset not empty ?>
<div class="separadoruno"></div>
<table width="90%" border="0" align="center">
  <tr>
    <td align="center" class="texto">© <?php echo $row_textoaweb['strTexto5']; ?></td>
  </tr>
</table>


<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************--><!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== strpos($url,'/en/')) { // Show if recordset not empty ?>

<table width="90%" border="0" align="center">
  <tr>
    <td align="center" class="texto">© <?php echo $row_textoaweb['strTexto5En']; ?></td>
  </tr>
</table>


<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== strpos($url,'/ru/')) { // Show if recordset not empty ?>

<table width="90%" border="0" align="center">
  <tr>
    <td align="center" class="texto">© <?php echo $row_textoaweb['strTexto5Ru']; ?></td>
  </tr>
</table>


<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
