<?php require_once('../Connections/gabrielle.php'); ?>
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

$currentPage = $_SERVER["PHP_SELF"];

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

$maxRows_articulo = 1;
$pageNum_articulo = 0;
if (isset($_GET['pageNum_articulo'])) {
  $pageNum_articulo = $_GET['pageNum_articulo'];
}
$startRow_articulo = $pageNum_articulo * $maxRows_articulo;

$varSub_articulo = "0";
if (isset($_GET ["recordID"])) {
  $varSub_articulo = $_GET ["recordID"];
}
mysql_select_db($database_gabrielle, $gabrielle);
$query_articulo = sprintf("SELECT * FROM tblpack001articulo WHERE tblpack001articulo.intSubCategoria =%s ORDER BY tblpack001articulo.idArticulo DESC", GetSQLValueString($varSub_articulo, "int"));
$query_limit_articulo = sprintf("%s LIMIT %d, %d", $query_articulo, $startRow_articulo, $maxRows_articulo);
$articulo = mysql_query($query_limit_articulo, $gabrielle) or die(mysql_error());
$row_articulo = mysql_fetch_assoc($articulo);

if (isset($_GET['totalRows_articulo'])) {
  $totalRows_articulo = $_GET['totalRows_articulo'];
} else {
  $all_articulo = mysql_query($query_articulo);
  $totalRows_articulo = mysql_num_rows($all_articulo);
}
$totalPages_articulo = ceil($totalRows_articulo/$maxRows_articulo)-1;

mysql_select_db($database_gabrielle, $gabrielle);
$query_contacto = "SELECT * FROM tbldatosempresa ORDER BY tbldatosempresa.idDatosEmpresa DESC";
$contacto = mysql_query($query_contacto, $gabrielle) or die(mysql_error());
$row_contacto = mysql_fetch_assoc($contacto);
$totalRows_contacto = mysql_num_rows($contacto);

$queryString_articulo = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_articulo") == false && 
        stristr($param, "totalRows_articulo") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_articulo = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_articulo = sprintf("&totalRows_articulo=%d%s", $totalRows_articulo, $queryString_articulo);



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
<meta name="viewport" content="width=device-width, initial-scale=1">

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

<body onload="MM_preloadImages('../gif/controles/atras.png','../gif/controles/siguiente.png')">

<div id="general">
<div class="espaciowebproducto">
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<table width="100%" border="0">
<tr>
  <td width="80%" rowspan="2" align="left">
<img src="../admin3274/anagrama/img/<?php echo $row_anagrama['strImagen']; ?>" width="60%" /></td>
  <td align="right" class="goticodos"></td>
</tr>
<tr>
<td width="20%" align="right" class="goticodos">&nbsp;#<?php echo $autoceros; ?>&nbsp;<br />
  <a href="javascript:window.close();" title="cerrar ventana">cerrar ventana</a> &nbsp;
</td>
</tr>
</table>
<!--************************************************************************************************-->
<div class="separadoruno"></div>
<!--************************************************************************************************-->
<?php do { ?>
<!--************************************************************************************************-->
<!--************************************************************************************************-->
<!--************************************************************************************************-->
  <table width="100%" border="0" align="center" class="gotico">
    <tr><td width="100%" colspan="3" align="center">
      <img src="../admin3274/pack001/img/articulo/<?php echo $row_articulo['strImagen']; ?>" width="100%" />
      <div class="compartefoto">
        <?php include("../menues/iconos-navegacion-com.php"); ?>
        </div>
      </td></tr>
  </table>
  <div class="separadoruno"></div>
  <table width="100%" border="0" align="center" class="gotico">
    
    <?php if ($row_articulo['strNombre'] > NULL) { // Show if recordset not empty ?>
    <tr>
      <td width="25%" align="right" valign="top"><strong>NAME</strong>:</td>
      <td width="73%" align="left"><?php echo $row_articulo['strNombreEn']; ?></td>
      <td width="2%">&nbsp;</td>
      </tr>
    <?php } // Show if recordset not empty ?>
    
    <?php if ($row_articulo['strDescripcion'] > NULL) { // Show if recordset not empty ?> 
    <tr>
      <td align="right" valign="top" class="descripcione"><strong>DESCRIPTION</strong>:</td>
      <td align="left" valign="top" class="descripcione"><?php echo $row_articulo['strDescripcionEn']; ?></td>
      <td>&nbsp;</td>
      </tr>
    <?php } // Show if recordset not empty ?>
    
    <?php if ($row_articulo['strMedidas'] > NULL) { // Show if recordset not empty ?>  
    <tr>
      <td align="right" valign="top"><strong>MEASURE</strong>:</td>
      <td align="left"><?php echo $row_articulo['strMedidas']; ?></td>
      <td>&nbsp;</td>
      </tr>
    <?php } // Show if recordset not empty ?>
    <?php if ($row_articulo['strPeso'] > NULL) { // Show if recordset not empty ?>
    <tr>
      <td align="right" valign="top"><strong>WEIGHT</strong>:</td>
      <td align="left"><?php echo $row_articulo['strPeso']; ?> <strong>Kg</strong></td>
      <td>&nbsp;</td>
      </tr>
    <?php } // Show if recordset not empty ?>   
  </table>
  
<!--************************************************************************************************--><!--************************************************************************************************--> 




  
 <!--************************************************************************************************--><!--************************************************************************************************--> 

<!--************************************************************************************************--><!--************************************************************************************************--><!--************************************************************************************************-->  
  <?php } while ($row_articulo = mysql_fetch_assoc($articulo)); ?>


<div class="separadoruno"></div>



<!--************************************************************************************************-->
<table width="100%" border="0">
  <tr>
  <td align="center" class="goticomini">
  <a href="javascript:void(0);" onclick="window.open(uf,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Facebook"><img alt="Compartir en facebook" class="fb"  src="<?php echo $urlweb ?>/gif/social/facebook-long.png" title="Compartir en facebook" width="8%" /></a>
<a href="javascript:void(0);" onclick="window.open(ug,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Google+"><img alt="Compartir en google+" class="glg"  src="<?php echo $urlweb ?>/gif/social/google-long.png" title="Compartir en google+" width="8%" /></a>
<a href="javascript:void(0);" onclick="window.open(ut,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Twitter"><img alt="Compartir en twitter" class="twtr"  src="<?php echo $urlweb ?>/gif/social/twitter-long.png" title="Compartir en twitter" width="8%" /></a>
<a href="javascript:void(0);" onclick="window.open(up,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Pinterest"><img alt="Compartir en pinterest" class="pnt"  src="<?php echo $urlweb ?>/gif/social/pinterest-long.png" title="Compartir en pinterest" width="8%" /></a>
<a href="javascript:void(0);" onclick="window.open(ul,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en linkedin+"><img alt="Compartir en likedin" class="lkdn"  src="<?php echo $urlweb ?>/gif/social/linkedin-long.png" title="Compartir en Likedin" width="8%" /></a>
<a href="javascript:void(0);" data-action=”share/whatsapp/share” onclick="window.open(uw,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en WhatsApp+"><img alt="Compartir en WhatsApp " class="lkdn"  src="<?php echo $urlweb ?>/gif/social/whatsapp-long.png" title="Compartir en WhatsApp " width="8%" /></a>&nbsp;&nbsp;

<style>#btrs{ text-align:center;}.lkdn:hover, .fb:hover, .twtr:hover, .glg:hover,.pnt:hover {-webkit-transform: rotate(360deg);-moz-transform: rotate(360deg);transform: rotate(360deg);transition:all .3s ease-out;-moz-transition: all .5s;-webkit-transition: all .5s;-o-transition: all .5s;}.lkdn, .fb, .twtr, .glg, .pnt {transition:all .3s ease-out;-moz-transition: all .5s;-webkit-transition: all .5s;-o-transition: all .5s;margin-left:1px; /* espacio entre cada boton */}</style>
  <br />
  
  
    © <?php echo $row_textoaweb['strTexto5En']; ?>  </td>
  </tr>
</table>
<!--************************************************************************************************-->
</div>
</div>

<div class="botonescontrol">
<table width="100%" border="0">
<tr>
<td width="30%" align="left" valign="top">
    
<?php if ($pageNum_articulo > 0) { // Show if not first page ?>
<a href="<?php printf("%s?pageNum_articulo=%d%s", $currentPage, max(0, $pageNum_articulo - 1), $queryString_articulo); ?>" title="atrás" onmouseover="MM_swapImage('botonatras','','../gif/controles/atras.png',1)" onmouseout="MM_swapImgRestore()"><img src="../gif/controles/atras1.png" width="40%" id="botonatras" /></a>
<?php } // Show if not first page ?></td>
    <td width="40%">&nbsp;</td>
    <td width="30%" align="right" valign="top">
      <?php if ($pageNum_articulo < $totalPages_articulo) { // Show if not last page ?>
    <a href="<?php printf("%s?pageNum_articulo=%d%s", $currentPage, min($totalPages_articulo, $pageNum_articulo + 1), $queryString_articulo); ?>" title="siguiente" onmouseover="MM_swapImage('sigue','','../gif/controles/siguiente.png',1)" onmouseout="MM_swapImgRestore()"><img src="../gif/controles/siguiente1.png" width="40%" id="sigue" /></a>
  <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
</div>

</body>
</html>
<?php
mysql_free_result($textoaweb);


mysql_free_result($favicon);

mysql_free_result($anagrama);

mysql_free_result($articulo);

mysql_free_result($contacto);
?>
