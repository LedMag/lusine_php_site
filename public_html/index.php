<?php require_once('Connections/gabrielle.php'); ?>
<?php mysql_query("SET NAMES 'utf8'");?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

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

mysql_select_db($database_gabrielle, $gabrielle);
$query_textoaweb = "SELECT * FROM tbltextoweb ORDER BY tbltextoweb.idTextoWeb DESC";
$textoaweb = mysql_query($query_textoaweb, $gabrielle) or die(mysql_error());
$row_textoaweb = mysql_fetch_assoc($textoaweb);
$totalRows_textoaweb = mysql_num_rows($textoaweb);

mysql_select_db($database_gabrielle, $gabrielle);
$query_favicon = "SELECT * FROM tblfavicon ORDER BY tblfavicon.idFavicon ASC";
$favicon = mysql_query($query_favicon, $gabrielle) or die(mysql_error());
$row_favicon = mysql_fetch_assoc($favicon);
$totalRows_favicon = mysql_num_rows($favicon);

mysql_select_db($database_gabrielle, $gabrielle);
$query_anagrama = "SELECT * FROM tblanagrama ORDER BY tblanagrama.idAnagrama DESC";
$anagrama = mysql_query($query_anagrama, $gabrielle) or die(mysql_error());
$row_anagrama = mysql_fetch_assoc($anagrama);
$totalRows_anagrama = mysql_num_rows($anagrama);

mysql_select_db($database_gabrielle, $gabrielle);
$query_seo001 = "SELECT * FROM tblseo ORDER BY tblseo.idSeo DESC";
$seo001 = mysql_query($query_seo001, $gabrielle) or die(mysql_error());
$row_seo001 = mysql_fetch_assoc($seo001);
$totalRows_seo001 = mysql_num_rows($seo001);

$maxRows_iconosweb = 10;
$pageNum_iconosweb = 0;
if (isset($_GET['pageNum_iconosweb'])) {
  $pageNum_iconosweb = $_GET['pageNum_iconosweb'];
}
$startRow_iconosweb = $pageNum_iconosweb * $maxRows_iconosweb;

mysql_select_db($database_gabrielle, $gabrielle);
$query_iconosweb = "SELECT * FROM tbliconosweb ORDER BY tbliconosweb.strPosicion ASC";
$query_limit_iconosweb = sprintf("%s LIMIT %d, %d", $query_iconosweb, $startRow_iconosweb, $maxRows_iconosweb);
$iconosweb = mysql_query($query_limit_iconosweb, $gabrielle) or die(mysql_error());
$row_iconosweb = mysql_fetch_assoc($iconosweb);

if (isset($_GET['totalRows_iconosweb'])) {
  $totalRows_iconosweb = $_GET['totalRows_iconosweb'];
} else {
  $all_iconosweb = mysql_query($query_iconosweb);
  $totalRows_iconosweb = mysql_num_rows($all_iconosweb);
}
$totalPages_iconosweb = ceil($totalRows_iconosweb/$maxRows_iconosweb)-1;

mysql_select_db($database_gabrielle, $gabrielle);
$query_slider001 = "SELECT * FROM tblslider001 ORDER BY tblslider001.strPosicion ASC";
$slider001 = mysql_query($query_slider001, $gabrielle) or die(mysql_error());
$row_slider001 = mysql_fetch_assoc($slider001);
$totalRows_slider001 = mysql_num_rows($slider001);

mysql_select_db($database_gabrielle, $gabrielle);
$query_contacto = "SELECT * FROM tbldatosempresa ORDER BY tbldatosempresa.idDatosEmpresa DESC";
$contacto = mysql_query($query_contacto, $gabrielle) or die(mysql_error());
$row_contacto = mysql_fetch_assoc($contacto);
$totalRows_contacto = mysql_num_rows($contacto);

//mysql_select_db($database_gabrielle, $gabrielle);
//$query_pack001categorias = "SELECT * FROM tblpack001categoria ORDER BY tblpack001categoria.strPosicion ASC";
//$pack001categorias = mysql_query($query_pack001categorias, $gabrielle) or die(mysql_error());
//$row_pack001categorias = mysql_fetch_assoc($pack001categorias);
//$totalRows_pack001categorias = mysql_num_rows($pack001categorias);

//mysql_select_db($database_gabrielle, $gabrielle);
//$query_pack001categoriasphone = "SELECT * FROM tblpack001categoria ORDER BY tblpack001categoria.strPosicion ASC";
//$pack001categoriasphone = mysql_query($query_pack001categoriasphone, $gabrielle) or die(mysql_error());
//$row_pack001categoriasphone = mysql_fetch_assoc($pack001categoriasphone);
//$totalRows_pack001categoriasphone = mysql_num_rows($pack001categoriasphone);


mysql_select_db($database_gabrielle, $gabrielle);
$query_pack001subcategoriaver = "SELECT * FROM tblpack001subcategoria ORDER BY tblpack001subcategoria.idSubCategoria ASC";
$pack001subcategoriaver = mysql_query($query_pack001subcategoriaver, $gabrielle) or die(mysql_error());
$row_pack001subcategoriaver = mysql_fetch_assoc($pack001subcategoriaver);
$totalRows_pack001subcategoriaver = mysql_num_rows($pack001subcategoriaver);

mysql_select_db($database_gabrielle, $gabrielle);
$query_uno = "SELECT * FROM tblpack001subcategoria ORDER BY tblpack001subcategoria.strPosicion ASC";
$uno = mysql_query($query_uno, $gabrielle) or die(mysql_error());
$row_uno = mysql_fetch_assoc($uno);
$totalRows_uno = mysql_num_rows($uno);



//tblpack001subcategoria
//pack001subcategoria




//$maxRows_novedades = 8;
//$pageNum_novedades = 0;
//if (isset($_GET['pageNum_novedades'])) {
//  $pageNum_novedades = $_GET['pageNum_novedades'];
//}
//$startRow_novedades = $pageNum_novedades * $maxRows_novedades;

//mysql_select_db($database_gabrielle, $gabrielle);
//$query_novedades = "SELECT * FROM tblpack001articulo WHERE tblpack001articulo.strNovedad ='si' ORDER BY tblpack001articulo.idArticulo DESC";
//$query_limit_novedades = sprintf("%s LIMIT %d, %d", $query_novedades, $startRow_novedades, $maxRows_novedades);
//$novedades = mysql_query($query_limit_novedades, $gabrielle) or die(mysql_error());
//$row_novedades = mysql_fetch_assoc($novedades);

//if (isset($_GET['totalRows_novedades'])) {
//  $totalRows_novedades = $_GET['totalRows_novedades'];
//} else {
//  $all_novedades = mysql_query($query_novedades);
//  $totalRows_novedades = mysql_num_rows($all_novedades);
//}
//$totalPages_novedades = ceil($totalRows_novedades/$maxRows_novedades)-1;

mysql_select_db($database_gabrielle, $gabrielle);
$query_pack001categoriasII = "SELECT * FROM tblpack001categoria ORDER BY tblpack001categoria.strPosicion ASC";
$pack001categoriasII = mysql_query($query_pack001categoriasII, $gabrielle) or die(mysql_error());
$row_pack001categoriasII = mysql_fetch_assoc($pack001categoriasII);
$totalRows_pack001categoriasII = mysql_num_rows($pack001categoriasII);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $row_seo001['strSeo1']; ?></title>
<link rel="shortcut icon" href="<?php echo $row_favicon['strEnlace']; ?>" />
<meta name="description" content="<?php echo $row_seo001['strSeo2']; ?>" />
<meta name="keywords" content="<?php echo $row_seo001['strSeo3']; ?>" />

<meta name="robots" content="index" />
<meta name="Author" content="Carlos Carrasco"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />  



<?php include("menues/funciones.php"); ?>


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
<meta property="og:image"         content="<?php echo $imagencompartir; ?>" /><script type="text/javascript">
var ub = window.location;
var uf="https://www.facebook.com/sharer.php?u="+ub;
var ut="https://twitter.com/home?status="+ub;
var ug="https://plus.google.com/share?url="+ub;
var up="https://www.pinterest.com/pin/create/button/?url="+ub;
var ul="https://www.linkedin.com/shareArticle?mini=true&url="+ub;
var uw="whatsapp://send?text="+ub;
</script>


<link href="css/maqueta.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="themes/light/light2.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
</head>

<body>



<div class="general">
<div class="espacioweb">
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("menues/cabecera_one.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("menues/menuhorizontal001.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("admin3274/slider001/slider001.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("menues/texto_principal_seo.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("menues/texto_cabecera_categorias.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("menues/mostrar_subcategoria.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("menues/iconos_navegacion.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("menues/footer.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
</div>
</div>

</body>
</html>



<?php
mysql_free_result($textoaweb);

mysql_free_result($favicon);

mysql_free_result($anagrama);

mysql_free_result($seo001);

mysql_free_result($iconosweb);

mysql_free_result($slider001);

mysql_free_result($contacto);

//mysql_free_result($pack001categorias);

//mysql_free_result($pack001categoriasphone);

//mysql_free_result($novedades);

//mysql_free_result($pack001categoriasII);

mysql_free_result($pack001subcategoriaver);

mysql_free_result($uno);

?>