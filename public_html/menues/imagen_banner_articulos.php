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
<?php $urldos = "gabrielle/";?>
<?php $urltres = "/index.php";?>
<?php $urlcero = "/bienvenido.html";?>
<?php $urlocho = "/gabrielle/bienvenido.html";?>
<?php $urlcuatro = strpos($url,'es/');?>
<?php $urlcinco = strpos($url,'en/');?>
<?php $urlseis = strpos($url,'ru/');?>
<?php $urlsiete = strpos($url,'fr/');?>
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
  <?php echo $row_textoaweb['strTexto3']; ?>&nbsp;&nbsp;
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
<?php if (false !== strpos($url,'es/')) { // Show if recordset not empty ?>

<table width="100%" border="0">
  <tr>
  <td>
  <div class="slider">
  <img src="../admin3274/pack001/img/subcategoria/<?php echo $row_versubcategoriaspack001['strImagen']; ?>" width="100%" />
  </div>
  </td>
  </tr>
</table>

<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************--><!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== strpos($url,'en/')) { // Show if recordset not empty ?>

<table width="100%" border="0">
  <tr>
  <td>
  <div class="slider">
  <img src="../admin3274/pack001/img/subcategoria/<?php echo $row_versubcategoriaspack001['strImagen']; ?>" width="100%" />
  </div>
  </td>
  </tr>
</table>

<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== strpos($url,'ru/')) { // Show if recordset not empty ?>

<table width="100%" border="0">
  <tr>
  <td>
  <div class="slider">
  <img src="../admin3274/pack001/img/subcategoria/<?php echo $row_versubcategoriaspack001['strImagen']; ?>" width="100%" />
  </div>
  </td>
  </tr>
</table>

<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
