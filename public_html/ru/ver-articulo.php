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

$varArticulazo_articulo = "0";
if (isset($_GET ["recordID"])) {
  $varArticulazo_articulo = $_GET ["recordID"];
}
 mysqli_select_db($database_gabrielle, $gabrielle);
$query_articulo = sprintf("SELECT * FROM tblpack001articulo WHERE tblpack001articulo.idArticulo =%s", GetSQLValueString($varArticulazo_articulo, "int"));
$articulo =  mysqli_query($query_articulo, $gabrielle) or die( mysqli_error());
$row_articulo =  mysqli_fetch_assoc($articulo);
$totalRows_articulo =  mysqli_num_rows($articulo);

$varArticulazo_articulophone = "0";
if (isset($_GET ["recordID"])) {
  $varArticulazo_articulophone = $_GET ["recordID"];
}
 mysqli_select_db($database_gabrielle, $gabrielle);
$query_articulophone = sprintf("SELECT * FROM tblpack001articulo WHERE tblpack001articulo.idArticulo =%s", GetSQLValueString($varArticulazo_articulophone, "int"));
$articulophone =  mysqli_query($query_articulophone, $gabrielle) or die( mysqli_error());
$row_articulophone =  mysqli_fetch_assoc($articulophone);
$totalRows_articulophone =  mysqli_num_rows($articulophone);

 mysqli_select_db($database_gabrielle, $gabrielle);
$query_contacto = "SELECT * FROM tbldatosempresa ORDER BY tbldatosempresa.idDatosEmpresa DESC";
$contacto =  mysqli_query($query_contacto, $gabrielle) or die( mysqli_error());
$row_contacto =  mysqli_fetch_assoc($contacto);
$totalRows_contacto =  mysqli_num_rows($contacto);



function llenar_ceros($numero, $ceros) {
$dif = $ceros - strlen($numero); 
for($m = 0 ;$m < $dif; $m++) 
{ 
@$insertar_ceros .= 0;
} 
return $insertar_ceros .= $numero; 
}

$idArticulo = $row_articulo['idArticulo']; 
$autoceros =llenar_ceros($idArticulo,5);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $autoceros; ?> - <?php echo $row_articulo['strNombre']; ?></title>
<link rel="shortcut icon" href="<?php echo $row_favicon['strEnlace']; ?>" />
<meta name="description" content="<?php echo $row_articulo['strSeo2']; ?>" />
<meta name="keywords" content="<?php echo $row_articulo['strSeo3']; ?>" />

<meta name="robots" content="noindex" />
<meta name="Author" content="Carlos Carrasco"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" /> 

<?php
$urlwebdominio= $_SERVER['HTTP_HOST'];
$urlweb= "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$Titulocompartir = $row_articulo['strSeo1'];
$descripcioncompartir = $row_articulo['strSeo2'];
$nombreimagen = $row_articulo['strImagen'];
$imagencompartir = "http://www.abanicosluciegabrielle.com/admin3274/pack001/img/articulo/$nombreimagen"
?>





<meta property="fb:app_id" 		  content="177477672869338">
<meta property="og:url"           content="<?php echo $urlweb; ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?php echo $Titulocompartir; ?>" />
<meta property="og:description"   content="<?php echo $descripcioncompartir; ?>" />
<meta property="og:image"         content="<?php echo $imagencompartir; ?>" />

<script type="text/javascript">
var ub = window.location;
var uf="https://www.facebook.com/sharer.php?u="+ub;
var ut="https://twitter.com/home?status="+ub;
var ug="https://plus.google.com/share?url="+ub;
var up="https://www.pinterest.com/pin/create/button/?url="+ub;
var ul="https://www.linkedin.com/shareArticle?mini=true&url="+ub;
var uw="whatsapp://send?text="+ub;
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

<link href="../css/maqueta.css" rel="stylesheet" type="text/css" />


</head>

<body onload="MM_preloadImages('../gif/controles/siguiente.png')">

<div id="general">
<div class="ocultarphone">
<div class="espaciowebproducto">
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("../menues/ficha_articulos.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("../menues/iconos_navegacion_articulo.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("../menues/footer.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
</div>
</div>

<div class="ocultarpc">
<div class="espaciowebproductophone">
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("../menues/ficha_articulos_phone.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("../menues/iconos_navegacion_articulo.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php include("../menues/footer.php"); ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
</div>
</div>


</div>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<?php //include("../menues/botones_control.php"); ?>
<!--***********************************************************************************************-->
<!--************************************************************************************************-->

</body>
</html>
<?php
 mysqli_free_result($textoaweb);


 mysqli_free_result($favicon);

 mysqli_free_result($anagrama);

 mysqli_free_result($articulo);

 mysqli_free_result($articulophone);

 mysqli_free_result($contacto);
?>
