<?php require_once('../Connections/gabrielle.php'); ?>
 
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists(" mysqli_real_escape_string") ?  mysqli_real_escape_string($theValue) :  mysqli_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}



 mysqli_select_db($database_gabrielle, $gabrielle);
$query_textoaweb = "SELECT * FROM tbltextoweb ORDER BY tbltextoweb.idTextoWeb DESC";
$textoaweb =  mysqli_query($query_textoaweb, $gabrielle) or die( mysqli_error());
$row_textoaweb =  mysqli_fetch_assoc($textoaweb);
$totalRows_textoaweb =  mysqli_num_rows($textoaweb);

 mysqli_select_db($database_gabrielle, $gabrielle);
$query_favicon = "SELECT * FROM tblfavicon ORDER BY tblfavicon.idFavicon ASC";
$favicon =  mysqli_query($query_favicon, $gabrielle) or die( mysqli_error());
$row_favicon =  mysqli_fetch_assoc($favicon);
$totalRows_favicon =  mysqli_num_rows($favicon);

 mysqli_select_db($database_gabrielle, $gabrielle);
$query_anagrama = "SELECT * FROM tblanagrama ORDER BY tblanagrama.idAnagrama DESC";
$anagrama =  mysqli_query($query_anagrama, $gabrielle) or die( mysqli_error());
$row_anagrama =  mysqli_fetch_assoc($anagrama);
$totalRows_anagrama =  mysqli_num_rows($anagrama);

 mysqli_select_db($database_gabrielle, $gabrielle);
$query_seo001 = "SELECT * FROM tblseo ORDER BY tblseo.idSeo DESC";
$seo001 =  mysqli_query($query_seo001, $gabrielle) or die( mysqli_error());
$row_seo001 =  mysqli_fetch_assoc($seo001);
$totalRows_seo001 =  mysqli_num_rows($seo001);

 mysqli_select_db($database_gabrielle, $gabrielle);
$query_iconosweb = "SELECT * FROM tbliconosweb ORDER BY tbliconosweb.strPosicion ASC";
$iconosweb =  mysqli_query($query_iconosweb, $gabrielle) or die( mysqli_error());
$row_iconosweb =  mysqli_fetch_assoc($iconosweb);
$totalRows_iconosweb =  mysqli_num_rows($iconosweb);

 mysqli_select_db($database_gabrielle, $gabrielle);
$query_slider001 = "SELECT * FROM tblslider001 ORDER BY tblslider001.strPosicion ASC";
$slider001 =  mysqli_query($query_slider001, $gabrielle) or die( mysqli_error());
$row_slider001 =  mysqli_fetch_assoc($slider001);
$totalRows_slider001 =  mysqli_num_rows($slider001);

 mysqli_select_db($database_gabrielle, $gabrielle);
$query_contacto = "SELECT * FROM tbldatosempresa ORDER BY tbldatosempresa.idDatosEmpresa DESC";
$contacto =  mysqli_query($query_contacto, $gabrielle) or die( mysqli_error());
$row_contacto =  mysqli_fetch_assoc($contacto);
$totalRows_contacto =  mysqli_num_rows($contacto);

 mysqli_select_db($database_gabrielle, $gabrielle);
$query_pack001categorias = "SELECT * FROM tblpack001categoria ORDER BY tblpack001categoria.strPosicion ASC";
$pack001categorias =  mysqli_query($query_pack001categorias, $gabrielle) or die( mysqli_error());
$row_pack001categorias =  mysqli_fetch_assoc($pack001categorias);
$totalRows_pack001categorias =  mysqli_num_rows($pack001categorias);

$maxRows_novedades = 8;
$pageNum_novedades = 0;
if (isset($_GET['pageNum_novedades'])) {
  $pageNum_novedades = $_GET['pageNum_novedades'];
}
$startRow_novedades = $pageNum_novedades * $maxRows_novedades;

 mysqli_select_db($database_gabrielle, $gabrielle);
$query_novedades = "SELECT * FROM tblpack001articulo WHERE tblpack001articulo.strNovedad ='si' ORDER BY tblpack001articulo.idArticulo DESC";
$query_limit_novedades = sprintf("%s LIMIT %d, %d", $query_novedades, $startRow_novedades, $maxRows_novedades);
$novedades =  mysqli_query($query_limit_novedades, $gabrielle) or die( mysqli_error());
$row_novedades =  mysqli_fetch_assoc($novedades);

if (isset($_GET['totalRows_novedades'])) {
  $totalRows_novedades = $_GET['totalRows_novedades'];
} else {
  $all_novedades =  mysqli_query($query_novedades);
  $totalRows_novedades =  mysqli_num_rows($all_novedades);
}
$totalPages_novedades = ceil($totalRows_novedades/$maxRows_novedades)-1;

 mysqli_select_db($database_gabrielle, $gabrielle);
$query_pack001categoriasII = "SELECT * FROM tblpack001categoria ORDER BY tblpack001categoria.strPosicion ASC";
$pack001categoriasII =  mysqli_query($query_pack001categoriasII, $gabrielle) or die( mysqli_error());
$row_pack001categoriasII =  mysqli_fetch_assoc($pack001categoriasII);
$totalRows_pack001categoriasII =  mysqli_num_rows($pack001categoriasII);

$varVerCategoria_verpackcategorias01 = "0";
if (isset($_GET ["recordID"])) {
  $varVerCategoria_verpackcategorias01 = $_GET ["recordID"];
}
 mysqli_select_db($database_gabrielle, $gabrielle);
$query_verpackcategorias01 = sprintf("SELECT * FROM tblpack001categoria WHERE tblpack001categoria.idCategoria =%s", GetSQLValueString($varVerCategoria_verpackcategorias01, "int"));
$verpackcategorias01 =  mysqli_query($query_verpackcategorias01, $gabrielle) or die( mysqli_error());
$row_verpackcategorias01 =  mysqli_fetch_assoc($verpackcategorias01);
$totalRows_verpackcategorias01 =  mysqli_num_rows($verpackcategorias01);

$varIdCategoria_versubcategoriaspack001 = "0";
if (isset($_GET ["recordID"])) {
  $varIdCategoria_versubcategoriaspack001 = $_GET ["recordID"];
}
 mysqli_select_db($database_gabrielle, $gabrielle);
$query_versubcategoriaspack001 = sprintf("SELECT * FROM tblpack001subcategoria WHERE tblpack001subcategoria.intCategoria = %s", GetSQLValueString($varIdCategoria_versubcategoriaspack001, "int"));
$versubcategoriaspack001 =  mysqli_query($query_versubcategoriaspack001, $gabrielle) or die( mysqli_error());
$row_versubcategoriaspack001 =  mysqli_fetch_assoc($versubcategoriaspack001);
$totalRows_versubcategoriaspack001 =  mysqli_num_rows($versubcategoriaspack001);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/gabrielle.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title><?php echo $row_verpackcategorias01['strNombre']; ?></title>
<link rel="shortcut icon" href="<?php echo $row_favicon['strEnlace']; ?>" />
<meta name="description" content="<?php echo $row_verpackcategorias01['strSeo2']; ?>" />
<meta name="keywords" content="<?php echo $row_verpackcategorias01['strSeo3']; ?>" />

<meta name="robots" content="index" />
<meta name="Author" content="Carlos Carrasco"/>
<meta name="viewport" content="width=device-width, initial-scale=1">



<?php include("../menues/funciones.php"); ?>

<?php
$urlwebdominio= $_SERVER['HTTP_HOST'];
$urlweb= "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$Titulocompartir = $row_seo001['strSeo1'];
$descripcioncompartir = $row_seo001['strSeo2'];
$nombreimagen = "comparte.jpg";
$imagencompartir = "http://www.abanicosluciegabrielle.com/gif/template/compartirfacebook.jpg"
?>

<meta property="fb:app_id" 		  content="177477672869338">
<meta property="og:url"           content="<?php echo $urlweb; ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?php echo $Titulocompartir; ?>" />
<meta property="og:description"   content="<?php echo $descripcioncompartir; ?>" />
<meta property="og:image"         content="<?php echo $imagencompartir; ?>" />


<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->

<script type="text/javascript">
var ub = window.location;
var uf="https://www.facebook.com/sharer.php?u="+ub;
var ut="https://twitter.com/home?status="+ub;
var ug="https://plus.google.com/share?url="+ub;
var up="https://www.pinterest.com/pin/create/button/?url="+ub;
var ul="https://www.linkedin.com/shareArticle?mini=true&url="+ub;
var uw="whatsapp://send?text="+ub;
</script>

<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
<!-- InstanceEndEditable -->
<link href="../css/maqueta.css" rel="stylesheet" type="text/css" />
<link href="file:///C|/xampp/htdocs/css/maqueta.css" rel="stylesheet" type="text/css" />
<link href="css/maqueta.css" rel="stylesheet" type="text/css" /></head>

<body onload="MM_preloadImages('../gif/fondos/articulo 2.png')">

<div id="general">
<div class="espacioweb">
<!--************************************************************************************************-->
<!-- InstanceBeginEditable name="analytics" -->


<!-- InstanceEndEditable -->
<!--************************************************************************************************-->
<!-- InstanceBeginEditable name="cabecera" -->

<table width="100%" border="0">
<tr>
<td width="34%">
<img src="../admin3274/anagrama/img/<?php echo $row_anagrama['strImagen']; ?>" width="85%" />
</td>
<td width="66%" align="left" valign="top"><table width="100%" border="0">
<tr>

<td align="right" class="goticodos">
<?php include("../menues/menu-idioma.php"); ?>
</td>
</tr>
<tr>

<td align="right" class="slogan01">
<?php echo $row_textoaweb['strTexto8Ru']; ?>
</td>

</tr>

<tr>
<td align="right" class="goticodos">
<a href="mailto:<?php echo $row_contacto['strEmail']; ?>" title="mándame un email"><?php echo $row_contacto['strEmail']; ?></a> | <?php echo $row_contacto['strTelefono']; ?>
&nbsp;&nbsp;
</td>
</tr>
</table></td>
</tr>
</table>

<!-- InstanceEndEditable -->
<!--************************************************************************************************-->
<!-- InstanceBeginEditable name="horizontal" -->
<div class="separadoruno"></div>
<table width="100%" border="0">
<tr>
<td align="right">
<div class="menuhorizontal0001">
<?php include("../menues/menuhorizontal001.php"); ?>
</div>
</td>
</tr>
</table>
<div class="separadoruno"></div>
<!-- InstanceEndEditable -->
<!--************************************************************************************************-->
<!-- InstanceBeginEditable name="horizontaldos" -->
<!--<table width="100%" border="0">
<tr>
<td align="right">
<div class="menuhorizontal0002">
<a href="#">MENU SECUNDARIO</a>&nbsp;&nbsp;
</div>
</td>
</tr>
</table>-->
<!-- InstanceEndEditable -->
<!--************************************************************************************************-->
<!-- InstanceBeginEditable name="slider" -->
<table width="100%" border="0">
<tr>
<td>
<div class="slider">
<img src="../admin3274/pack001/img/categoria/<?php echo $row_verpackcategorias01['strImagen2']; ?>" width="100%" />
</div>
</td>
</tr>
</table>
<!-- InstanceEndEditable -->
<!--************************************************************************************************-->
<!-- InstanceBeginEditable name="textoprincipal" -->
<div class="separadoruno"></div>
<table width="100%" border="0">
<tr>
<td>
<div class="gotico">
<?php echo $row_verpackcategorias01['strDescripcionRu']; ?>
</div>
</td>
</tr>
</table>
<!-- InstanceEndEditable -->
<!--************************************************************************************************-->
<!-- InstanceBeginEditable name="contenido1" -->
<div class="separadoruno"></div>
<table width="100%" border="0">
<tr>
<td align="right">
<div class="menuhorizontal0001">
<?php echo $row_textoaweb['strTexto6Ru']; ?> <strong><?php echo $row_verpackcategorias01['strNombreRu']; ?></strong>&nbsp;&nbsp;
</div>
</td>
</tr>
</table>
<div class="separadoruno"></div>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<table width="100%" border="0">
  <tr>
  <td>
 
<?php if ($totalRows_versubcategoriaspack001 > NULL) { // Show if recordset not empty ?>
<div class="totalcategoriapack001">


<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php if ($totalRows_versubcategoriaspack001 != 1) { // Show if recordset not empty ?>
  <div class="botoncategoriapack001">
    <table width="100%" border="0">
      <tr>
        <td align="center" class="gotico">
          COMPLETO
          </td></tr>
      <td>
        <img src="../admin3274/pack001/img/subcategoria/catalogo completo.jpg" width="100%" />
        <div class="botonsub">
          <a href="coleccion-completa.html" title="catálogo completo" onmouseover="MM_swapImage('comple','','../gif/fondos/articulo 2.png',1)" onmouseout="MM_swapImgRestore()"><img src="../gif/fondos/articulo.png" width="100%" id="comple" /></a> </div>
        </td>
        </tr>
      <tr>
        </table> 
  </div>
  <?php } // Show if recordset not empty ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->


<?php do { ?>
<?php if ($row_versubcategoriaspack001['strActiva'] =="si") { // Show if recordset not empty ?>
<div class="botoncategoriapack001">
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<table width="100%" border="0"><tr>
<td align="center" class="gotico">
<?php echo $row_versubcategoriaspack001['strNombreRu']; ?> 
</td>
</tr>
<td>
<img src="../admin3274/pack001/img/subcategoria/<?php echo $row_versubcategoriaspack001['strImagen2']; ?>" width="100%" />
<div class="botonsub">
<a href="articulo.php?recordID=<?php echo $row_versubcategoriaspack001['idSubCategoria']; ?>" title="ver artículos de la colección  <?php echo $row_versubcategoriaspack001['strNombreEn']; ?>" 
	onmouseover="MM_swapImage('botsub<?php echo $row_versubcategoriaspack001['idSubCategoria']; ?>','','../gif/fondos/articulo.png',1)" onmouseout="MM_swapImgRestore()">
            <img src="../gif/fondos/articulo 2.png" width="100%" id="botsub<?php echo $row_versubcategoriaspack001['idSubCategoria']; ?>" /></a>
</div>
</td>
</tr>
<tr>
</table>
<!--************************************************************************************************-->
<!--************************************************************************************************--> 
</div>
<?php } // Show if recordset not empty ?>
  <?php } while ($row_versubcategoriaspack001 =  mysqli_fetch_assoc($versubcategoriaspack001)); ?>




</div>
<?php } // Show if recordset not empty ?>
<?php if ($totalRows_versubcategoriaspack001 == 0) { // Show if recordset empty ?>
<div class="gotico">
No hay COLECCIONES en esta CATEGORÍA por el momento, DISCULPEN LAS MOLESTIAS...
</div>
  <?php } // Show if recordset empty ?>
  <!--************************************************************************************************-->
  <!--************************************************************************************************-->
  <!--************************************************************************************************-->
  <!--************************************************************************************************-->
  <!--************************************************************************************************-->
  <!--************************************************************************************************-->
  <!--************************************************************************************************-->
  </td>
  </tr>
</table>
<!-- InstanceEndEditable -->
<!--************************************************************************************************-->
<!-- InstanceBeginEditable name="contenido2" -->
<div class="separadoruno"></div>
<table width="100%" border="0">
<tr>
<td align="right">
<div class="menuhorizontal0002">
<?php echo $row_textoaweb['strTexto4Ru']; ?>&nbsp;&nbsp;
</div>
</td>
</tr>
</table>
<div class="separadoruno"></div>

<table width="100%" border="0">
<tr>
<td>
<div class="totalcategoriapack002">
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<!--************************************************************************************************--> 
<?php function llenar_ceros($numero, $ceros) {
$dif = $ceros - strlen($numero); 
for($m = 0 ;$m < $dif; $m++) 
{ 
@$insertar_ceros .= 0;
} 
return $insertar_ceros .= $numero; 
}?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php do { ?>
<?php //if ($row_novedades['strActiva'] == "si") { // Show if recordset not empty ?>


<!--************************************************************************************************-->
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php $idArticulo = $row_novedades['idArticulo']; ?>
<?php $autoceros =llenar_ceros($idArticulo,5);?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<!--************************************************************************************************-->
	<div class="botoncategoriapack002">
	<table width="100%" border="0"><tr>
	<td>
	<img src="../admin3274/pack001/img/articulo/<?php echo $row_novedades['strImagen']; ?>" width="100%" />
    
	<div class="botonsub002">
	<a href="ver-articulo.php?recordID=<?php echo $row_novedades['idArticulo']; ?>" title="ver artículo" target="_blank" 
	onmouseover="MM_swapImage('botnov<?php echo $row_novedades['idArticulo']; ?>','','../gif/fondos/articulo.png',1)" onmouseout="MM_swapImgRestore()">
	<img src="../gif/fondos/articulo 2.png" width="100%" id="botnov<?php echo $row_novedades['idArticulo']; ?>" /></a>
	</div>
    
    <div class="referencianov002">
    &nbsp;#<?php echo $autoceros; ?>
    </div>

	</td></tr><tr>
	<td align="center" valign="middle" class="descripcione">

	<?php //echo $row_novedades['strNombre']; ?>

	</td>
  	</tr>
	</table>
	</div>
<?php //} // Show if recordset not empty ?>
  <?php } while ($row_novedades =  mysqli_fetch_assoc($novedades)); ?>
	</td>
	</tr>
	</table>
<div class="separadoruno"></div>

<!-- InstanceEndEditable -->
<!--************************************************************************************************-->
<!-- InstanceBeginEditable name="footer" -->
<table width="100%" border="0">
<tr>
<td width="42%" align="left" valign="middle">&nbsp;&nbsp;
<div class="registro"> &nbsp;&nbsp;© <?php echo $row_textoaweb['strTexto5Ru']; ?></div></td>
<td width="2%" valign="middle" align="center">&nbsp;</td>
<td width="50%" valign="middle "align="right">
<?php include("../menues/iconos-navegacion-new.php"); ?>
&nbsp;
</td>
</tr>
</table>
<!-- InstanceEndEditable -->
<!--************************************************************************************************-->
</div>
</div>
</body>
<!-- InstanceEnd --></html>
<?php
 mysqli_free_result($textoaweb);

 mysqli_free_result($favicon);

 mysqli_free_result($anagrama);

 mysqli_free_result($seo001);

 mysqli_free_result($iconosweb);

 mysqli_free_result($slider001);

 mysqli_free_result($contacto);

 mysqli_free_result($pack001categorias);

 mysqli_free_result($novedades);

 mysqli_free_result($pack001categoriasII);

 mysqli_free_result($verpackcategorias01);

 mysqli_free_result($versubcategoriaspack001);
?>
