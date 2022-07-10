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

$maxRows_iconosweb = 10;
$pageNum_iconosweb = 0;
if (isset($_GET['pageNum_iconosweb'])) {
  $pageNum_iconosweb = $_GET['pageNum_iconosweb'];
}
$startRow_iconosweb = $pageNum_iconosweb * $maxRows_iconosweb;

 mysqli_select_db($database_gabrielle, $gabrielle);
$query_iconosweb = "SELECT * FROM tbliconosweb ORDER BY tbliconosweb.strPosicion ASC";
$query_limit_iconosweb = sprintf("%s LIMIT %d, %d", $query_iconosweb, $startRow_iconosweb, $maxRows_iconosweb);
$iconosweb =  mysqli_query($query_limit_iconosweb, $gabrielle) or die( mysqli_error());
$row_iconosweb =  mysqli_fetch_assoc($iconosweb);

if (isset($_GET['totalRows_iconosweb'])) {
  $totalRows_iconosweb = $_GET['totalRows_iconosweb'];
} else {
  $all_iconosweb =  mysqli_query($query_iconosweb);
  $totalRows_iconosweb =  mysqli_num_rows($all_iconosweb);
}
$totalPages_iconosweb = ceil($totalRows_iconosweb/$maxRows_iconosweb)-1;

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

// mysqli_select_db($database_gabrielle, $gabrielle);
//$query_pack001categorias = "SELECT * FROM tblpack001categoria ORDER BY tblpack001categoria.strPosicion ASC";
//$pack001categorias =  mysqli_query($query_pack001categorias, $gabrielle) or die( mysqli_error());
//$row_pack001categorias =  mysqli_fetch_assoc($pack001categorias);
//$totalRows_pack001categorias =  mysqli_num_rows($pack001categorias);

// mysqli_select_db($database_gabrielle, $gabrielle);
//$query_pack001categoriasphone = "SELECT * FROM tblpack001categoria ORDER BY tblpack001categoria.strPosicion ASC";
//$pack001categoriasphone =  mysqli_query($query_pack001categoriasphone, $gabrielle) or die( mysqli_error());
//$row_pack001categoriasphone =  mysqli_fetch_assoc($pack001categoriasphone);
//$totalRows_pack001categoriasphone =  mysqli_num_rows($pack001categoriasphone);


 mysqli_select_db($database_gabrielle, $gabrielle);
$query_pack001subcategoriaver = "SELECT * FROM tblpack001subcategoria ORDER BY tblpack001subcategoria.idSubCategoria ASC";
$pack001subcategoriaver =  mysqli_query($query_pack001subcategoriaver, $gabrielle) or die( mysqli_error());
$row_pack001subcategoriaver =  mysqli_fetch_assoc($pack001subcategoriaver);
$totalRows_pack001subcategoriaver =  mysqli_num_rows($pack001subcategoriaver);

 mysqli_select_db($database_gabrielle, $gabrielle);
$query_uno = "SELECT * FROM tblpack001subcategoria ORDER BY tblpack001subcategoria.strPosicion ASC";
$uno =  mysqli_query($query_uno, $gabrielle) or die( mysqli_error());
$row_uno =  mysqli_fetch_assoc($uno);
$totalRows_uno =  mysqli_num_rows($uno);



//tblpack001subcategoria
//pack001subcategoria




//$maxRows_novedades = 8;
//$pageNum_novedades = 0;
//if (isset($_GET['pageNum_novedades'])) {
//  $pageNum_novedades = $_GET['pageNum_novedades'];
//}
//$startRow_novedades = $pageNum_novedades * $maxRows_novedades;

// mysqli_select_db($database_gabrielle, $gabrielle);
//$query_novedades = "SELECT * FROM tblpack001articulo WHERE tblpack001articulo.strNovedad ='si' ORDER BY tblpack001articulo.idArticulo DESC";
//$query_limit_novedades = sprintf("%s LIMIT %d, %d", $query_novedades, $startRow_novedades, $maxRows_novedades);
//$novedades =  mysqli_query($query_limit_novedades, $gabrielle) or die( mysqli_error());
//$row_novedades =  mysqli_fetch_assoc($novedades);

//if (isset($_GET['totalRows_novedades'])) {
//  $totalRows_novedades = $_GET['totalRows_novedades'];
//} else {
//  $all_novedades =  mysqli_query($query_novedades);
//  $totalRows_novedades =  mysqli_num_rows($all_novedades);
//}
//$totalPages_novedades = ceil($totalRows_novedades/$maxRows_novedades)-1;

 mysqli_select_db($database_gabrielle, $gabrielle);
$query_pack001categoriasII = "SELECT * FROM tblpack001categoria ORDER BY tblpack001categoria.strPosicion ASC";
$pack001categoriasII =  mysqli_query($query_pack001categoriasII, $gabrielle) or die( mysqli_error());
$row_pack001categoriasII =  mysqli_fetch_assoc($pack001categoriasII);
$totalRows_pack001categoriasII =  mysqli_num_rows($pack001categoriasII);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $row_seo001['strSeo1']; ?></title>
<link rel="shortcut icon" href="<?php echo $row_favicon['../strEnlace']; ?>" />
<meta name="description" content="<?php echo $row_seo001['strSeo2']; ?>" />
<meta name="keywords" content="<?php echo $row_seo001['strSeo3']; ?>" />

<meta name="robots" content="index" />
<meta name="Author" content="Carlos Carrasco"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" /> 



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


<script type="text/javascript">
var ub = window.location;
var uf="https://www.facebook.com/sharer.php?u="+ub;
var ut="https://twitter.com/home?status="+ub;
var ug="https://plus.google.com/share?url="+ub;
var up="https://www.pinterest.com/pin/create/button/?url="+ub;
var ul="https://www.linkedin.com/shareArticle?mini=true&url="+ub;
var uw="whatsapp://send?text="+ub;
</script>

<link rel="stylesheet" href="../themes/light/light2.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/nivo-slider.css" type="text/css" media="screen" />
<link href="../css/maqueta.css" rel="stylesheet" type="text/css" />
</head>

<body onload="MM_preloadImages('../gif/fondos/articulo.png')">

<div class="general">
<div class="espacioweb">
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("../menues/cabecera_one.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("../menues/menuhorizontal001.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("../admin3274/slider001/slider001.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("../menues/texto_principal_seo.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("../menues/texto_cabecera_categorias.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("../menues/mostrar_subcategoria.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("../menues/iconos_navegacion.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("../menues/footer.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
</div>
</div>
</body>
</html>
<?php
 mysqli_free_result($textoaweb);

 mysqli_free_result($favicon);

 mysqli_free_result($anagrama);

 mysqli_free_result($seo001);

 mysqli_free_result($iconosweb);

 mysqli_free_result($slider001);

 mysqli_free_result($contacto);

// mysqli_free_result($pack001categorias);

// mysqli_free_result($pack001categoriasphone);

// mysqli_free_result($novedades);

// mysqli_free_result($pack001categoriasII);

 mysqli_free_result($pack001subcategoriaver);

 mysqli_free_result($uno);
?>
