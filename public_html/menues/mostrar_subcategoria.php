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

<div class="ocultarphone">
<table width="100%" border="0">
<tr>
<td>
<div class="totalcategoriapack001">
<?php do { ?>
<?php if ($row_pack001subcategoriaver['strActiva'] == "si") { // Show if recordset not empty ?>
  
<div class="botoncategoriapack001">
<table width="100%" border="0"><tr>
<td align="center" class="gotico">
<?php echo $row_pack001subcategoriaver['strNombre']; ?>
</td>
</tr>
      
<td>
<img src="admin3274/pack001/img/subcategoria/<?php echo $row_pack001subcategoriaver['strImagen']; ?>" width="100%" />
<div class="botonsub">
<a href="es/articulo.php?recordID=<?php echo $row_pack001subcategoriaver['idSubCategoria']; ?>" title="ver colecciones de <?php echo $row_pack001subcategoriaver['strNombre']; ?>" 
onmouseover="MM_swapImage('botart<?php echo $row_pack001subcategoriaver['idSubCategoria']; ?>','','gif/fondos/articulo.png',1)" onmouseout="MM_swapImgRestore()">
<img src="gif/fondos/articulo 2.png" width="100%" id="botart<?php echo $row_pack001subcategoriaver['idSubCategoria']; ?>" /></a>
</div>
</td>
</tr>
<tr>
        
</table>
</div>
<?php  } // Show if recordset not empty ?>
<?php } while ($row_pack001subcategoriaver =  mysqli_fetch_assoc($pack001subcategoriaver)); ?>
</div>
</td>
</tr>
</table>
</div>
<!--***************************************************************************************************************-->
<!--***************************************************************************************************************-->
<div class="ocultarpc">
<?php do { ?>
<?php if ($row_uno['strActiva'] == "si") { // Show if recordset not empty ?>
<table width="95%" align="center" border="0">
<tr>
<td><?php echo $row_uno['strNombre']; ?></td>
</tr>
<tr>
<td><a href="es/articulo.php?recordID=<?php echo $row_uno['idSubCategoria']; ?>" title="ver colecciones de <?php echo $row_uno['strNombre']; ?>"><img src="admin3274/pack001/img/subcategoria/<?php echo $row_uno['strImagen']; ?>" width="100%" /></a>
</td>
</tr>
</table>
<?php } // Show if recordset not empty ?>
<?php } while ($row_uno =  mysqli_fetch_assoc($uno)); ?>
</div>

<?php } // Show if recordset not empty ?>
<!--***************************************************************************************************************-->
<!--***************************************************************************************************************-->
<!--***************************************************************************************************************-->
<!--***************************************************************************************************************-->
<!--***************************************************************************************************************-->
<!--***************************************************************************************************************-->
<?php if (false !== strpos($url,'es/')) { // Show if recordset not empty ?>

<div class="ocultarphone">
<table width="100%" border="0">
<tr>
<td>
<div class="totalcategoriapack001">
<?php do { ?>
<?php if ($row_pack001subcategoriaver['strActiva'] == "si") { // Show if recordset not empty ?>
  
<div class="botoncategoriapack001">
<table width="100%" border="0"><tr>
<td align="center" class="gotico">
<?php echo $row_pack001subcategoriaver['strNombre']; ?>
</td>
</tr>
      
<td>
<img src="../admin3274/pack001/img/subcategoria/<?php echo $row_pack001subcategoriaver['strImagen']; ?>" width="100%" />
<div class="botonsub">
<a href="articulo.php?recordID=<?php echo $row_pack001subcategoriaver['idSubCategoria']; ?>" title="ver colecciones de <?php echo $row_pack001subcategoriaver['strNombre']; ?>" 
onmouseover="MM_swapImage('botart<?php echo $row_pack001subcategoriaver['idSubCategoria']; ?>','','../gif/fondos/articulo.png',1)" onmouseout="MM_swapImgRestore()">
<img src="../gif/fondos/articulo 2.png" width="100%" id="botart<?php echo $row_pack001subcategoriaver['idSubCategoria']; ?>" /></a>
</div>
</td>
</tr>
<tr>
        
</table>
</div>
<?php  } // Show if recordset not empty ?>
<?php } while ($row_pack001subcategoriaver =  mysqli_fetch_assoc($pack001subcategoriaver)); ?>
</div>
</td>
</tr>
</table>
</div>
<!--***************************************************************************************************************-->
<!--***************************************************************************************************************-->
<div class="ocultarpc">
<?php do { ?>
<?php if ($row_uno['strActiva'] == "si") { // Show if recordset not empty ?>
<table width="95%" align="center" border="0">
<tr>
<td><?php echo $row_uno['strNombre']; ?></td>
</tr>
<tr>
<td><a href="articulo.php?recordID=<?php echo $row_uno['idSubCategoria']; ?>" title="ver colecciones de <?php echo $row_uno['strNombre']; ?>"><img src="../admin3274/pack001/img/subcategoria/<?php echo $row_uno['strImagen']; ?>" width="100%" /></a>
</td>
</tr>
</table>
<?php } // Show if recordset not empty ?>
<?php } while ($row_uno =  mysqli_fetch_assoc($uno)); ?>
</div>

<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************--><!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== strpos($url,'en/')) { // Show if recordset not empty ?>

<div class="ocultarphone">
<table width="100%" border="0">
<tr>
<td>
<div class="totalcategoriapack001">
<?php do { ?>
<?php if ($row_pack001subcategoriaver['strActiva'] == "si") { // Show if recordset not empty ?>
  
<div class="botoncategoriapack001">
<table width="100%" border="0"><tr>
<td align="center" class="gotico">
<?php echo $row_pack001subcategoriaver['strNombreEn']; ?>
</td>
</tr>
      
<td>
<img src="../admin3274/pack001/img/subcategoria/<?php echo $row_pack001subcategoriaver['strImagen']; ?>" width="100%" />
<div class="botonsub">
<a href="articulo.php?recordID=<?php echo $row_pack001subcategoriaver['idSubCategoria']; ?>" title="ver colecciones de <?php echo $row_pack001subcategoriaver['strNombreEn']; ?>" 
onmouseover="MM_swapImage('botart<?php echo $row_pack001subcategoriaver['idSubCategoria']; ?>','','../gif/fondos/articulo.png',1)" onmouseout="MM_swapImgRestore()">
<img src="../gif/fondos/articulo 2.png" width="100%" id="botart<?php echo $row_pack001subcategoriaver['idSubCategoria']; ?>" /></a>
</div>
</td>
</tr>
<tr>
        
</table>
</div>
<?php  } // Show if recordset not empty ?>
<?php } while ($row_pack001subcategoriaver =  mysqli_fetch_assoc($pack001subcategoriaver)); ?>
</div>
</td>
</tr>
</table>
</div>
<!--***************************************************************************************************************-->
<!--***************************************************************************************************************-->
<div class="ocultarpc">
<?php do { ?>
<?php if ($row_uno['strActiva'] == "si") { // Show if recordset not empty ?>
<table width="95%" align="center" border="0">
<tr>
<td><?php echo $row_uno['strNombreEn']; ?></td>
</tr>
<tr>
<td><a href="articulo.php?recordID=<?php echo $row_uno['idSubCategoria']; ?>" title="ver colecciones de <?php echo $row_uno['strNombre']; ?>"><img src="../admin3274/pack001/img/subcategoria/<?php echo $row_uno['strImagen']; ?>" width="100%" /></a>
</td>
</tr>
</table>
<?php } // Show if recordset not empty ?>
<?php } while ($row_uno =  mysqli_fetch_assoc($uno)); ?>
</div>

<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== strpos($url,'ru/')) { // Show if recordset not empty ?>

<div class="ocultarphone">
<table width="100%" border="0">
<tr>
<td>
<div class="totalcategoriapack001">
<?php do { ?>
<?php if ($row_pack001subcategoriaver['strActiva'] == "si") { // Show if recordset not empty ?>
  
<div class="botoncategoriapack001">
<table width="100%" border="0"><tr>
<td align="center" class="gotico">
<?php echo $row_pack001subcategoriaver['strNombreRu']; ?>
</td>
</tr>
      
<td>
<img src="../admin3274/pack001/img/subcategoria/<?php echo $row_pack001subcategoriaver['strImagen']; ?>" width="100%" />
<div class="botonsub">
<a href="articulo.php?recordID=<?php echo $row_pack001subcategoriaver['idSubCategoria']; ?>" title="ver colecciones de <?php echo $row_pack001subcategoriaver['strNombreRu']; ?>" 
onmouseover="MM_swapImage('botart<?php echo $row_pack001subcategoriaver['idSubCategoria']; ?>','','../gif/fondos/articulo.png',1)" onmouseout="MM_swapImgRestore()">
<img src="../gif/fondos/articulo 2.png" width="100%" id="botart<?php echo $row_pack001subcategoriaver['idSubCategoria']; ?>" /></a>
</div>
</td>
</tr>
<tr>
        
</table>
</div>
<?php  } // Show if recordset not empty ?>
<?php } while ($row_pack001subcategoriaver =  mysqli_fetch_assoc($pack001subcategoriaver)); ?>
</div>
</td>
</tr>
</table>
</div>
<!--***************************************************************************************************************-->
<!--***************************************************************************************************************-->
<div class="ocultarpc">
<?php do { ?>
<?php if ($row_uno['strActiva'] == "si") { // Show if recordset not empty ?>
<table width="95%" align="center" border="0">
<tr>
<td><?php echo $row_uno['strNombreRu']; ?></td>
</tr>
<tr>
<td><a href="articulo.php?recordID=<?php echo $row_uno['idSubCategoria']; ?>" title="ver colecciones de <?php echo $row_uno['strNombre']; ?>"><img src="../admin3274/pack001/img/subcategoria/<?php echo $row_uno['strImagen']; ?>" width="100%" /></a>
</td>
</tr>
</table>
<?php } // Show if recordset not empty ?>
<?php } while ($row_uno =  mysqli_fetch_assoc($uno)); ?>
</div>

<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
