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

<div class="ocultarphone">
<table width="100%" border="0" align="center">
  <tr>
    <td>
 
  <?php if ($totalRows_articulo > NULL) { // Show if recordset not empty ?>
  <?php function llenar_ceros($numero, $ceros) {
$dif = $ceros - strlen($numero); 
for($m = 0 ;$m < $dif; $m++) 
{ 
@$insertar_ceros .= 0;
} 
return $insertar_ceros .= $numero; 
}?>
      
  <div class="totalcategoriapack001">
  <?php do { ?>
  <?php if ($row_articulo['strActiva'] == "si") { // Show if recordset not empty ?>
    
  <?php $idArticulo = $row_articulo['idArticulo']; ?>
  <?php $autoceros =llenar_ceros($idArticulo,5);?>
    
  <div class="botoncategoriapack001">
    <table width="100%" border="0"><tr>
      <td>
        <img src="../admin3274/pack001/img/articulo/<?php echo $row_articulo['strImagen']; ?>" width="100%" />
        <div class="botonsub">
          <a href="ver-articulo.php?recordID=<?php echo $row_articulo['idArticulo']; ?>" title="ver ficha artículo" target="_blank" 
	onmouseover="MM_swapImage('botart<?php echo $row_articulo['idArticulo']; ?>','','../gif/fondos/articulo.png',1)" onmouseout="MM_swapImgRestore()">
            <img src="../gif/fondos/articulo 2.png" width="100%" id="botart<?php echo $row_articulo['idArticulo']; ?>" /></a>
          </div>
        
  <div class="referencianov003">
  &nbsp;#<?php echo $autoceros; ?> - <?php echo $row_articulo['intCat']; ?>
    
  </div>
        
  </td>
  </tr>
  <tr>
  <td align="center" class="gotico">
  <?php echo $row_articulo['strNombre']; ?>
  </td>
  </tr>
  </table>
  
  <table width="100%" border="0">
  <tr>
    <td align="center">
   P.V.P: <strong><?php echo $row_articulo['dblPrecio']; ?></strong> €
    </td>
  </tr>
</table>

  </div>
  <?php } // Show if recordset not empty ?>  
  <?php } while ($row_articulo =  mysqli_fetch_assoc($articulo)); ?>
  </div>
      
      
  <?php if ($totalRows_articulo < NULL) { // Show if recordset empty ?>
  <div class="gotico">
    No hay ARTÍCULOS en esta COLECCIÓN por el momento, DISCULPEN LAS MOLESTIAS...
  </div>
  <?php } // Show if recordset empty ?>
  <?php } // Show if recordset empty ?>


  </td>
  </tr>
</table>
</div>
<!--*********************************************************************************************-->
<!--*********************************************************************************************-->
<div class="ocultarpc">
<div class="separadoruno"></div>


  <?php do { ?>
    <table width="95%" align="center" border="0">
      <tr>
        <td>REF: <?php echo $row_articulophone['idArticulo']; ?></td>
        </tr>
      <tr>
        <td><a href="ver-articulo.php?recordID=<?php echo $row_articulophone['idArticulo']; ?>"><img src="../admin3274/pack001/img/articulo/<?php echo $row_articulophone['strImagen']; ?>" width="100%" /></a>
          </td>
        </tr>
    </table>
    <div class="separadoruno"></div>
    <?php } while ($row_articulophone =  mysqli_fetch_assoc($articulophone)); ?>
 </div>  
<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************--><!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== strpos($url,'en/')) { // Show if recordset not empty ?>

<div class="ocultarphone">
<table width="100%" border="0" align="center">
  <tr>
    <td>
 
  <?php if ($totalRows_articulo > NULL) { // Show if recordset not empty ?>
  <?php function llenar_ceros($numero, $ceros) {
$dif = $ceros - strlen($numero); 
for($m = 0 ;$m < $dif; $m++) 
{ 
@$insertar_ceros .= 0;
} 
return $insertar_ceros .= $numero; 
}?>
      
  <div class="totalcategoriapack001">
  <?php do { ?>
  <?php if ($row_articulo['strActiva'] == "si") { // Show if recordset not empty ?>
    
  <?php $idArticulo = $row_articulo['idArticulo']; ?>
  <?php $autoceros =llenar_ceros($idArticulo,5);?>
    
  <div class="botoncategoriapack001">
    <table width="100%" border="0"><tr>
      <td>
        <img src="../admin3274/pack001/img/articulo/<?php echo $row_articulo['strImagen']; ?>" width="100%" />
        <div class="botonsub">
          <a href="ver-articulo.php?recordID=<?php echo $row_articulo['idArticulo']; ?>" title="ver ficha artículo" target="_blank" 
	onmouseover="MM_swapImage('botart<?php echo $row_articulo['idArticulo']; ?>','','../gif/fondos/articulo.png',1)" onmouseout="MM_swapImgRestore()">
            <img src="../gif/fondos/articulo 2.png" width="100%" id="botart<?php echo $row_articulo['idArticulo']; ?>" /></a>
          </div>
        
  <div class="referencianov003">
  &nbsp;#<?php echo $autoceros; ?> - <?php echo $row_articulo['intCat']; ?>
    
  </div>
        
  </td>
  </tr>
  <tr>
  <td align="center" class="gotico">
  <?php echo $row_articulo['strNombre']; ?>
  </td>
  </tr>
  </table>
  </div>
  <?php } // Show if recordset not empty ?>  
  <?php } while ($row_articulo =  mysqli_fetch_assoc($articulo)); ?>
  </div>
      
      
  <?php if ($totalRows_articulo < NULL) { // Show if recordset empty ?>
  <div class="gotico">
    No hay ARTÍCULOS en esta COLECCIÓN por el momento, DISCULPEN LAS MOLESTIAS...
  </div>
  <?php } // Show if recordset empty ?>
  <?php } // Show if recordset empty ?>


  </td>
  </tr>
</table>
</div>
<!--*********************************************************************************************-->
<!--*********************************************************************************************-->
<div class="ocultarpc">
<div class="separadoruno"></div>


  <?php do { ?>
    <table width="95%" align="center" border="0">
      <tr>
        <td>REF: <?php echo $row_articulophone['idArticulo']; ?></td>
        </tr>
      <tr>
        <td><a href="ver-articulo.php?recordID=<?php echo $row_articulophone['idArticulo']; ?>"><img src="../admin3274/pack001/img/articulo/<?php echo $row_articulophone['strImagen']; ?>" width="100%" /></a>
          </td>
        </tr>
    </table>
    <div class="separadoruno"></div>
    <?php } while ($row_articulophone =  mysqli_fetch_assoc($articulophone)); ?>
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
<table width="100%" border="0" align="center">
  <tr>
    <td>
 
  <?php if ($totalRows_articulo > NULL) { // Show if recordset not empty ?>
  <?php function llenar_ceros($numero, $ceros) {
$dif = $ceros - strlen($numero); 
for($m = 0 ;$m < $dif; $m++) 
{ 
@$insertar_ceros .= 0;
} 
return $insertar_ceros .= $numero; 
}?>
      
  <div class="totalcategoriapack001">
  <?php do { ?>
  <?php if ($row_articulo['strActiva'] == "si") { // Show if recordset not empty ?>
    
  <?php $idArticulo = $row_articulo['idArticulo']; ?>
  <?php $autoceros =llenar_ceros($idArticulo,5);?>
    
  <div class="botoncategoriapack001">
    <table width="100%" border="0"><tr>
      <td>
        <img src="../admin3274/pack001/img/articulo/<?php echo $row_articulo['strImagen']; ?>" width="100%" />
        <div class="botonsub">
          <a href="ver-articulo.php?recordID=<?php echo $row_articulo['idArticulo']; ?>" title="ver ficha artículo" target="_blank" 
	onmouseover="MM_swapImage('botart<?php echo $row_articulo['idArticulo']; ?>','','../gif/fondos/articulo.png',1)" onmouseout="MM_swapImgRestore()">
            <img src="../gif/fondos/articulo 2.png" width="100%" id="botart<?php echo $row_articulo['idArticulo']; ?>" /></a>
          </div>
        
  <div class="referencianov003">
  &nbsp;#<?php echo $autoceros; ?> - <?php echo $row_articulo['intCat']; ?>
    
  </div>
        
  </td>
  </tr>
  <tr>
  <td align="center" class="gotico">
  <?php echo $row_articulo['strNombre']; ?>
  </td>
  </tr>
  </table>
  </div>
  <?php } // Show if recordset not empty ?>  
  <?php } while ($row_articulo =  mysqli_fetch_assoc($articulo)); ?>
  </div>
      
      
  <?php if ($totalRows_articulo < NULL) { // Show if recordset empty ?>
  <div class="gotico">
    No hay ARTÍCULOS en esta COLECCIÓN por el momento, DISCULPEN LAS MOLESTIAS...
  </div>
  <?php } // Show if recordset empty ?>
  <?php } // Show if recordset empty ?>


  </td>
  </tr>
</table>
</div>
<!--*********************************************************************************************-->
<!--*********************************************************************************************-->
<div class="ocultarpc">
<div class="separadoruno"></div>


  <?php do { ?>
    <table width="95%" align="center" border="0">
      <tr>
        <td>REF: <?php echo $row_articulophone['idArticulo']; ?></td>
        </tr>
      <tr>
        <td><a href="ver-articulo.php?recordID=<?php echo $row_articulophone['idArticulo']; ?>"><img src="../admin3274/pack001/img/articulo/<?php echo $row_articulophone['strImagen']; ?>" width="100%" /></a>
          </td>
        </tr>
    </table>
    <div class="separadoruno"></div>
    <?php } while ($row_articulophone =  mysqli_fetch_assoc($articulophone)); ?>
 </div> 

<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
