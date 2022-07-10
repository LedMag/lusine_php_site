<?php require_once('../../Connections/trebol.php'); ?>
 
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

 mysqli_select_db($database_trebol, $trebol);
$query_favicon = "SELECT * FROM tblfavicon ORDER BY tblfavicon.idFavicon ASC";
$favicon =  mysqli_query($query_favicon, $trebol) or die( mysqli_error());
$row_favicon =  mysqli_fetch_assoc($favicon);
$totalRows_favicon =  mysqli_num_rows($favicon);

 mysqli_select_db($database_trebol, $trebol);
$query_anagrama = "SELECT * FROM tblanagrama ORDER BY tblanagrama.idAnagrama DESC";
$anagrama =  mysqli_query($query_anagrama, $trebol) or die( mysqli_error());
$row_anagrama =  mysqli_fetch_assoc($anagrama);
$totalRows_anagrama =  mysqli_num_rows($anagrama);

 mysqli_select_db($database_trebol, $trebol);
$query_datos = "SELECT * FROM tbldatosempresa ORDER BY tbldatosempresa.idDatosEmpresa DESC";
$datos =  mysqli_query($query_datos, $trebol) or die( mysqli_error());
$row_datos =  mysqli_fetch_assoc($datos);
$totalRows_datos =  mysqli_num_rows($datos);

 mysqli_select_db($database_trebol, $trebol);
$query_registros = "SELECT * FROM tblregistro ORDER BY tblregistro.idRegistro DESC";
$registros =  mysqli_query($query_registros, $trebol) or die( mysqli_error());
$row_registros =  mysqli_fetch_assoc($registros);
$totalRows_registros =  mysqli_num_rows($registros);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/adminewv3.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Admin web trebol</title>
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
<td style="height:5%" colspan="2" align="left" valign="top" class="separadoradmin4">
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
<tr>
<td style="height:5%" colspan="2" align="right" valign="top" class="tipografiagothicdcha">
<!-- InstanceBeginEditable name="titulocontenidoprincipal" -->LISTADO REGISTROS ENTRADA ADMINISTRACIÓN WEB<!-- InstanceEndEditable -->
</td>
</tr>
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<tr>
<td style="height:5%" colspan="2" align="right" valign="top" class="tipografiagothicdcha">
<!-- InstanceBeginEditable name="subtitulocontenido" -->

<!-- InstanceEndEditable -->
</td>
</tr>
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<tr>
<td style="height:5%" colspan="2">
<!-- InstanceBeginEditable name="botoncuatro" -->
<div class="tipografiagothicdcha">
<a href="registros_lista_admin.php">ADMINISTRACIÓN</a> - 
<a href="registros_lista_tienda.php">TIENDA ONLINE</a> - 
<a href="registros_lista_catalogo.php">CATÁLOGO</a>
</div>
 <!-- InstanceEndEditable -->
</td>
</tr>
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<tr>
<td colspan="2">
<!-- InstanceBeginEditable name="contenidouno" -->

<div class="formularios">
<table width="100%" border="0">
<tr>
<td width="25%" bgcolor="#8a9a9f" class="textoblanco">&nbsp;REF</td>
<td width="25%" bgcolor="#8a9a9f" class="textoblanco">&nbsp;USUARIO</td>
<td width="30%" bgcolor="#8a9a9f" class="textoblanco">&nbsp;CONTENIDO</td>
<td width="20%" align="center" bgcolor="#8a9a9f" class="textoblanco">&nbsp;ACCIONES</td>
</tr>
<?php do { ?>
<?php $urladministracion= $row_registros['strContenido']; ?>
<?php if (false !== strpos($urladministracion,'/distribuidor/')){ // Show if recordset not empty ?>
<tr>
<td>&nbsp;<?php echo $row_registros['strFecha']; ?></td>
<td>&nbsp;<?php echo $row_registros['strUsuario']; ?></td>
<td>&nbsp;TIENDA ONLINE</td>
<td align="center" class="editar"><a href="registros_edit.php?recordID=<?php echo $row_registros['idRegistro']; ?>">delete</a></td>
</tr>
<?php } // Show if recordset not empty ?>
<?php } while ($row_registros =  mysqli_fetch_assoc($registros)); ?>
</table>
</div>
<!-- InstanceEndEditable -->   
</td>
</tr>
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<tr>
<td colspan="2">
<!-- InstanceBeginEditable name="contenidodos" -->




<!-- InstanceEndEditable -->
</td>
</tr>
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** -->     
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
 mysqli_free_result($favicon);

 mysqli_free_result($registros);


 mysqli_free_result($anagrama);

 mysqli_free_result($datos);

?>
