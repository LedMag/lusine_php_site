<?php require_once('../../Connections/gabrielle.php'); ?>
 
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "webmaster,administrador,usuario";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "login.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
 function GetSQLValueString($gabrielle, $theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
   

  $theValue = mysqli_real_escape_string($gabrielle,  $theValue);

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

  mysqli_select_db($gabrielle, $database_gabrielle);
$query_usuarios = "SELECT * FROM tblusuario ORDER BY tblusuario.strLevel DESC";
$usuarios =  mysqli_query($query_usuarios, $gabrielle) or die( mysqli_error($gabrielle));
$row_usuarios =  mysqli_fetch_assoc($usuarios);
$totalRows_usuarios =  mysqli_num_rows($usuarios);

  mysqli_select_db($gabrielle, $database_gabrielle);
$query_favicon = "SELECT * FROM tblfavicon ORDER BY tblfavicon.idFavicon ASC";
$favicon =  mysqli_query($gabrielle, $query_favicon) or die( mysqli_error($gabrielle));
$row_favicon =  mysqli_fetch_assoc($favicon);
$totalRows_favicon =  mysqli_num_rows($favicon);

  mysqli_select_db($gabrielle, $database_gabrielle);
$query_anagrama = "SELECT * FROM tblanagrama ORDER BY tblanagrama.idAnagrama DESC";
$anagrama =  mysqli_query($gabrielle, $query_anagrama) or die( mysqli_error($gabrielle));
$row_anagrama =  mysqli_fetch_assoc($anagrama);
$totalRows_anagrama =  mysqli_num_rows($anagrama);

$varCategoria_pack001categoria = "0";
if (isset($_GET ["recordID"])) {
  $varCategoria_pack001categoria = $_GET ["recordID"];
}
  mysqli_select_db($gabrielle, $database_gabrielle);
$query_pack001categoria = sprintf("SELECT * FROM tblpack001categoria WHERE tblpack001categoria.idCategoria =%s", GetSQLValueString($varCategoria_pack001categoria, "int"));
$pack001categoria =  mysqli_query($query_pack001categoria, $gabrielle) or die( mysqli_error($gabrielle));
$row_pack001categoria =  mysqli_fetch_assoc($pack001categoria);
$totalRows_pack001categoria =  mysqli_num_rows($pack001categoria);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/adminewv3.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Admin web gabrielle</title>
<link rel="shortcut icon" href="<?php echo $row_favicon['strEnlace']; ?>" />
<meta name="robots" content="noindex" />
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<style type="text/css">
@import url("../../webfonts/Santanita/stylesheet.css");
</style>
<link href="../../css/admin_new.css" rel="stylesheet" type="text/css" />
<link href="../../css/textosadministracion.css" rel="stylesheet" type="text/css" />
</head>

<body background="../../gif/fondos/wavegrid.png">

<!--**********************************************************************************************************************-->
<!--**********************************************************************************************************************-->
<!--**********************************************************************************************************************-->
<div id="general">
<div class="espacioweb">
<!--**********************************************************************************************************************-->
<!--**********************************************************************************************************************-->
<!--**********************************************************************************************************************-->
<table width="100%" border="0" >
<tr>
<td width="15%" >
<!-- InstanceBeginEditable name="anagramacabecera" -->
<?php include("../anagrama/anagrama-admin.php"); ?>  
<!-- InstanceEndEditable -->
</td>
<td width="37%" colspan="2" align="right" valign="top" >
<!--**********************************************************************************************************************-->
<!--**********************************************************************************************************************-->
  <table width="100%" border="0">
  <tr>
  <td width="85%" align="right"><span class="tipografiagothicgra">ADMINISTRACIÓN WEB </span></td>
  </tr>
  <tr>
  <td align="right">
  <div class="tipografiagothicgra"></div>
  <div class="usuariose">
  <?php echo $_SESSION['MM_Username'] ?>
  </div>
  </td></tr>
  <tr>
  <td align="right">
  <div class="tipografiagothicdcha">
  <a href="../../php/cerrar-sesion.php" >Cerrar Sesión Administración</a> &nbsp;&nbsp;
  </div>
  </td></tr>
  </table>
<!--**********************************************************************************************************************-->
<!--**********************************************************************************************************************-->  
</td>
</tr>
<tr>
<td width="15%" rowspan="8" align="left" valign="top" class="separadoradmin3">
<!-- InstanceBeginEditable name="menuadminprincipal" -->
<div class="tipografiagothic">
<?php include("../../menues/menuprincipalAdmin.php"); ?>
</div>
<!-- InstanceEndEditable -->
</td>
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<td style="height:3%" colspan="2" align="left" valign="top" class="separadoradmin4">
<div class="menuhorizontal">
<!-- InstanceBeginEditable name="menuhorizontalweb" -->
<?php include("../../menues/menuadmin.php"); ?>  
<!-- InstanceEndEditable -->
  </div>
  <!--**************************************************************************************************** --> 
  <!--**************************************************************************************************** --> 
  <!--**************************************************************************************************** --> 
</td>
</tr>
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<tr>
<td colspan="2" align="right" class="tipografiagothic" style="height:1%">
<!-- InstanceBeginEditable name="titulocontenidoprincipal" -->VER CATEGORÍA <strong><?php echo $row_pack001categoria['strNombre']; ?></strong>&nbsp;PACK001 <!-- InstanceEndEditable -->
</td>
</tr>
<tr>
  <td colspan="2" align="right" class="tipografiagothic" style="height:1%">
  <!-- InstanceBeginEditable name="subtitulocontenido" -->
  <a href="pack001categoria_lista.php"><strong>Volver</strong> Listado Categorías PACK001</a>
  <!-- InstanceEndEditable -->
  </td>
</tr>
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<tr>
  <td colspan="2" align="right" class="tipografiagothic" style="height:1.5%">
    <!-- InstanceBeginEditable name="botoncuatro" -->
<?php include("menuregistros.php"); ?>

<!-- InstanceEndEditable -->
  </td>
</tr>
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** --><!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** -->     
<tr>
  <td colspan="3" align="left" style="height:1%">
  <!-- InstanceBeginEditable name="contenidouno" -->
<div class="formularios">
IMAGEN PRINCIPAL CATEGORÍA
<div class="imagen">
<img src="img/categoria/<?php echo $row_pack001categoria['strImagen2']; ?>" width="100%" />
</div>
<p>
ICONO CATEGORÍA
<div class="imagen">
<a href="pack001categoria_ver.php?recordID=<?php echo $row_pack001categoria['idCategoria']; ?>"><img src="img/categoria/<?php echo $row_pack001categoria['strImagen']; ?>" width="33%" /></a>
</div>
<!--****************************************************************************************-->
<div class="imagen">
Posición: <?php echo $row_pack001categoria['strPosicion']; ?> 
</div>
<div class="separadorarlineas"></div>
<div class="imagen">
CASTELLANO
</div>

<div class="imagen">
<strong>Nombre :</strong><br />
<?php echo $row_pack001categoria['strNombre']; ?>
</div>
<div class="imagen">
<strong>Descripción :</strong><br />
<?php echo $row_pack001categoria['strDescripcion']; ?>
</div>
<div class="imagen">
<strong>Título S.E.O:</strong><br />
<?php echo $row_pack001categoria['strSeo1']; ?>
</div>
<div class="imagen">
<strong>Descripción S.E.O:</strong><br />
<?php echo $row_pack001categoria['strSeo2']; ?>
</div><div class="imagen">
<strong>Keywords:</strong><br />
<?php echo $row_pack001categoria['strSeo3']; ?>
</div>
<!--****************************************************************************************-->
<div class="separadorarlineas"></div>
<!--****************************************************************************************-->
<div class="imagen">
INGLÉS
</div>
<div class="imagen">
<strong>Nombre En:</strong><br />
<?php echo $row_pack001categoria['strNombreEn']; ?>
</div>
<div class="imagen">
<strong>Descripción En:</strong><br />
<?php echo $row_pack001categoria['strDescripcionEn']; ?>
</div>
<div class="imagen">
<strong>Título S.E.O En:</strong><br />
<?php echo $row_pack001categoria['strSeo1En']; ?>
</div>
<div class="imagen">
<strong>Descripción S.E.O En:</strong><br />
<?php echo $row_pack001categoria['strSeo2En']; ?>
</div><div class="imagen">
<strong>Keywords En:</strong><br />
<?php echo $row_pack001categoria['strSeo3En']; ?>
</div>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<div class="separadorarlineas"></div>
<!--****************************************************************************************-->
<div class="imagen">
RUSO
</div>
<div class="imagen">
<strong>Nombre Ru:</strong><br />
<?php echo $row_pack001categoria['strNombreRu']; ?>
</div>
<div class="imagen">
<strong>Descripción Ru:</strong><br />
<?php echo $row_pack001categoria['strDescripcionRu']; ?>
</div>
<div class="imagen">
<strong>Título S.E.O Ru:</strong><br />
<?php echo $row_pack001categoria['strSeo1Ru']; ?>
</div>
<div class="imagen">
<strong>Descripción S.E.O Ru:</strong><br />
<?php echo $row_pack001categoria['strSeo2Ru']; ?>
</div><div class="imagen">
<strong>Keywords Ru:</strong><br />
<?php echo $row_pack001categoria['strSeo3Ru']; ?>
</div>
<!--****************************************************************************************-->
</div>
<P><P>
<div class="tipografiagothicdcha">
<a href="pack001categoria_edit.php?recordID=<?php echo $row_pack001categoria['idCategoria']; ?>">MODIFICAR</a> - <a href="pack001categoria_delete.php?recordID=<?php echo $row_pack001categoria['idCategoria']; ?>">ELIMINAR</a></div>
<!-- InstanceEndEditable -->
</td>
</tr>
<tr>
  <td colspan="3" align="center" style="height:1%">
  <!-- InstanceBeginEditable name="contenidodos" -->




<!-- InstanceEndEditable -->
  </td>
</tr>
<tr>
<td colspan="3" align="center" >
<div class="tipografiagothic">
<!-- InstanceBeginEditable name="webmastercontacto" -->
<?php include("../../menues/FirmaFooterAdmin.php"); ?>

<!-- InstanceEndEditable -->
</div>
</td>
</tr>
</table>
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 
</div>
</div>
<!--**********************************************************************************************************************-->
<!--**********************************************************************************************************************-->
<!--**********************************************************************************************************************-->
</body>
<!-- InstanceEnd --></html>
<?php
 mysqli_free_result($usuarios);

 mysqli_free_result($favicon);

 mysqli_free_result($anagrama);

 mysqli_free_result($pack001categoria);
?>
