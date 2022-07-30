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




<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************--><!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== strpos($url,'es/')) { // Show if recordset not empty ?>

<table width="100%" border="0">
<tr>
  <td width="80%" rowspan="2" align="left">
<img src="../admin3274/anagrama/img/<?php echo $row_anagrama['strImagen']; ?>" width="60%" /></td>
  <td align="right" class="goticodos"></td>
</tr>
<tr>
<td width="20%" align="right" class="goticodos">&nbsp;#<?php echo $autoceros; ?>&nbsp;<br />
<!--  <a href="bienvenido.html" title="cerrar ventana">cerrar ventana</a> &nbsp;-->
  <a href="articulo.php?recordID=<?php echo $row_articulo['intSubCategoria']; ?>" title="cerrar ventana">cerrar ventana</a> &nbsp;
</td>
</tr>
</table>


<div class="articulo">
<table width="100%" border="0" align="center" class="gotico">
<tr><td width="100%" colspan="3" align="center">
  <img src="../admin3274/pack001/img/articulo/<?php echo $row_articulophone['strImagen']; ?>" width="100%" />

</td></tr>
</table>
<table width="100%" border="0" align="center" class="gotico">
</div>

<?php if ($row_articulo['strNombre'] > NULL) { // Show if recordset not empty ?>
<tr>
  <td width="25%" align="right" valign="top"><strong>NOMBRE</strong>:</td>
  <td width="73%" align="left"><?php echo $row_articulophone['strNombre']; ?></td>
  <td width="2%">&nbsp;</td>
</tr>
<?php } // Show if recordset not empty ?>

<?php if ($row_articulo['strDescripcion'] > NULL) { // Show if recordset not empty ?> 

<tr>
    <td align="right" valign="top" class="descripcione"><strong>DESCRIPCIÓN</strong>:</td>
    <td align="left" valign="top" class="descripcione"><?php echo $row_articulophone['strDescripcion']; ?></td>
    <td class="descripcione"></td>
  </tr>
<?php } // Show if recordset not empty ?>

<?php if ($row_articulo['strMedidas'] > NULL) { // Show if recordset not empty ?>  
  <tr>
    <td align="right" valign="top"><strong>MEDIDAS</strong>:</td>
    <td align="left"><?php echo $row_articulophone['strMedidas']; ?></td>
    <td>&nbsp;</td>
  </tr>
<?php } // Show if recordset not empty ?>

<?php if ($row_articulo['strPeso'] > NULL) { // Show if recordset not empty ?>
  <tr>
    <td align="right" valign="top"><strong>PESO</strong>:</td>
    <td align="left"><?php echo $row_articulophone['strPeso']; ?> <strong>Kg</strong></td>
    <td>&nbsp;</td>
  </tr>
<?php } // Show if recordset not empty ?>   
</table>
</div>


<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************--><!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== strpos($url,'en/')) { // Show if recordset not empty ?>

<table width="100%" border="0">
<tr>
  <td width="80%" rowspan="2" align="left">
<img src="../admin3274/anagrama/img/<?php echo $row_anagrama['strImagen']; ?>" width="60%" /></td>
  <td align="right" class="goticodos"></td>
</tr>
<tr>
<td width="20%" align="right" class="goticodos">&nbsp;#<?php echo $autoceros; ?>&nbsp;<br />
<!--  <a href="welcome.html" title="cerrar ventana">cerrar ventana</a> &nbsp;-->
    <a href="articulo.php?recordID=<?php echo $row_articulo['intSubCategoria']; ?>" title="cerrar ventana">cerrar ventana</a> &nbsp;
</td>
</tr>
</table>


<div class="articulo">
<table width="100%" border="0" align="center" class="gotico">
<tr><td width="100%" colspan="3" align="center">
  <img src="../admin3274/pack001/img/articulo/<?php echo $row_articulophone['strImagen']; ?>" width="100%" />

</td></tr>
</table>
<table width="100%" border="0" align="center" class="gotico">
</div>

<?php if ($row_articulo['strNombreEn'] > NULL) { // Show if recordset not empty ?>
<tr>
  <td width="25%" align="right" valign="top"><strong>NAME</strong>:</td>
  <td width="73%" align="left"><?php echo $row_articulophone['strNombreEn']; ?></td>
  <td width="2%">&nbsp;</td>
</tr>
<?php } // Show if recordset not empty ?>

<?php if ($row_articulo['strDescripcionEn'] > NULL) { // Show if recordset not empty ?> 

<tr>
    <td align="right" valign="top" class="descripcione"><strong>DESCRIPTION</strong>:</td>
    <td align="left" valign="top" class="descripcione"><?php echo $row_articulophone['strDescripcionEn']; ?></td>
    <td class="descripcione"></td>
  </tr>
<?php } // Show if recordset not empty ?>

<?php if ($row_articulo['strMedidas'] > NULL) { // Show if recordset not empty ?>  
  <tr>
    <td align="right" valign="top"><strong>MESURES</strong>:</td>
    <td align="left"><?php echo $row_articulophone['strMedidas']; ?></td>
    <td>&nbsp;</td>
  </tr>
<?php } // Show if recordset not empty ?>

<?php if ($row_articulo['strPeso'] > NULL) { // Show if recordset not empty ?>
  <tr>
    <td align="right" valign="top"><strong>WEIGHT</strong>:</td>
    <td align="left"><?php echo $row_articulophone['strPeso']; ?> <strong>Kg</strong></td>
    <td>&nbsp;</td>
  </tr>
<?php } // Show if recordset not empty ?>   
</table>
</div>


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
  <td width="80%" rowspan="2" align="left">
<img src="../admin3274/anagrama/img/<?php echo $row_anagrama['strImagen']; ?>" width="60%" /></td>
  <td align="right" class="goticodos"></td>
</tr>
<tr>
<td width="20%" align="right" class="goticodos">&nbsp;#<?php echo $autoceros; ?>&nbsp;<br />
<!--  <a href="добро-пожаловать.html" title="cerrar ventana">cerrar ventana</a> &nbsp;-->
    <a href="articulo.php?recordID=<?php echo $row_articulo['intSubCategoria']; ?>" title="cerrar ventana">cerrar ventana</a> &nbsp;
</td>
</tr>
</table>


<div class="articulo">
<table width="100%" border="0" align="center" class="gotico">
<tr><td width="100%" colspan="3" align="center">
  <img src="../admin3274/pack001/img/articulo/<?php echo $row_articulophone['strImagen']; ?>" width="100%" />

</td></tr>
</table>
<table width="100%" border="0" align="center" class="gotico">
</div>

<?php if ($row_articulo['strNombreRu'] > NULL) { // Show if recordset not empty ?>
<tr>
  <td width="25%" align="right" valign="top"><strong>ИМЯ</strong>:</td>
  <td width="73%" align="left"><?php echo $row_articulophone['strNombreRu']; ?></td>
  <td width="2%">&nbsp;</td>
</tr>
<?php } // Show if recordset not empty ?>

<?php if ($row_articulo['strDescripcionRu'] > NULL) { // Show if recordset not empty ?> 

<tr>
    <td align="right" valign="top" class="descripcione"><strong>ОПИСАНИЕ</strong>:</td>
    <td align="left" valign="top" class="descripcione"><?php echo $row_articulophone['strDescripcionRu']; ?></td>
    <td class="descripcione"></td>
  </tr>
<?php } // Show if recordset not empty ?>

<?php if ($row_articulo['strMedidas'] > NULL) { // Show if recordset not empty ?>  
  <tr>
    <td align="right" valign="top"><strong>МЕРЫ</strong>:</td>
    <td align="left"><?php echo $row_articulophone['strMedidas']; ?></td>
    <td>&nbsp;</td>
  </tr>
<?php } // Show if recordset not empty ?>

<?php if ($row_articulo['strPeso'] > NULL) { // Show if recordset not empty ?>
  <tr>
    <td align="right" valign="top"><strong>МАССА</strong>:</td>
    <td align="left"><?php echo $row_articulophone['strPeso']; ?> <strong>Kg</strong></td>
    <td>&nbsp;</td>
  </tr>
<?php } // Show if recordset not empty ?>   
</table>
</div>


<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
