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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE tbltextoweb SET 
  strTexto1=%s, strTexto2=%s, strTexto3=%s, strTexto4=%s, strTexto5=%s, strTexto6=%s, strTexto7=%s,
  strTexto1En=%s, strTexto2En=%s, strTexto3En=%s, strTexto4En=%s, strTexto5En=%s, strTexto6En=%s, strTexto7En=%s,
  strTexto1Ru=%s, strTexto2Ru=%s, strTexto3Ru=%s, strTexto4Ru=%s, strTexto5Ru=%s, strTexto6Ru=%s, strTexto7Ru=%s,
  strTexto8=%s, strTexto8En=%s, strTexto8Ru=%s
  
  WHERE idTextoWeb=%s",
                       GetSQLValueString($_POST['strTexto1'], "text"),
                       GetSQLValueString($_POST['strTexto2'], "text"),
                       GetSQLValueString($_POST['strTexto3'], "text"),
                       GetSQLValueString($_POST['strTexto4'], "text"),
                       GetSQLValueString($_POST['strTexto5'], "text"),
					   GetSQLValueString($_POST['strTexto6'], "text"),
					   GetSQLValueString($_POST['strTexto7'], "text"),
					   
                       GetSQLValueString($_POST['strTexto1En'], "text"),
                       GetSQLValueString($_POST['strTexto2En'], "text"),
                       GetSQLValueString($_POST['strTexto3En'], "text"),
                       GetSQLValueString($_POST['strTexto4En'], "text"),
                       GetSQLValueString($_POST['strTexto5En'], "text"),
					   GetSQLValueString($_POST['strTexto6En'], "text"),
					   GetSQLValueString($_POST['strTexto7En'], "text"),
					   
                       GetSQLValueString($_POST['strTexto1Ru'], "text"),
                       GetSQLValueString($_POST['strTexto2Ru'], "text"),
                       GetSQLValueString($_POST['strTexto3Ru'], "text"),
                       GetSQLValueString($_POST['strTexto4Ru'], "text"),
                       GetSQLValueString($_POST['strTexto5Ru'], "text"),
					   GetSQLValueString($_POST['strTexto6Ru'], "text"),
					   GetSQLValueString($_POST['strTexto7Ru'], "text"),
					   
					   GetSQLValueString($_POST['strTexto8'], "text"),
					   GetSQLValueString($_POST['strTexto8En'], "text"),
					   GetSQLValueString($_POST['strTexto8Ru'], "text"),
					   
                       GetSQLValueString($_POST['idTextoWeb'], "int"));

    mysqli_select_db($gabrielle, $database_gabrielle);
  $Result1 =  mysqli_query($updateSQL, $gabrielle) or die( mysqli_error($gabrielle));

  $updateGoTo = "textos_lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

  mysqli_select_db($gabrielle, $database_gabrielle);
$query_textos = "SELECT * FROM tbltextoweb ORDER BY tbltextoweb.idTextoWeb DESC";
$textos =  mysqli_query($query_textos, $gabrielle) or die( mysqli_error($gabrielle));
$row_textos =  mysqli_fetch_assoc($textos);
$totalRows_textos =  mysqli_num_rows($textos);

  mysqli_select_db($gabrielle, $database_gabrielle);
$query_seo = "SELECT * FROM tblseo ORDER BY tblseo.idSeo DESC";
$seo =  mysqli_query($query_seo, $gabrielle) or die( mysqli_error($gabrielle));
$row_seo =  mysqli_fetch_assoc($seo);
$totalRows_seo =  mysqli_num_rows($seo);

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

$usuarioadmin = $_SESSION['MM_Username'];
$url= $_SERVER['REQUEST_URI'];


  mysqli_select_db($gabrielle, $database_gabrielle); 
$query_registro = "INSERT INTO tblregistro(strFecha, strUsuario, strContenido) VALUES (NOW(), '$usuarioadmin', '$url')";
$registro =  mysqli_query($query_registro, $gabrielle) or die( mysqli_error($gabrielle));
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
<!-- InstanceBeginEditable name="titulocontenidoprincipal" --> MODIFICAR TEXTOS WEB<!-- InstanceEndEditable -->
</td>
</tr>
<tr>
  <td colspan="2" align="right" class="tipografiagothic" style="height:1%">
  <!-- InstanceBeginEditable name="subtitulocontenido" -->
  <a href="textos_lista.php">volver listado textos</a>
  <!-- InstanceEndEditable -->
  </td>
</tr>
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<tr>
  <td colspan="2" align="right" class="tipografiagothic" style="height:1.5%">
    <!-- InstanceBeginEditable name="botoncuatro" -->


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
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">

<table width="100%" align="center">
<tr valign="baseline">
  <td nowrap="nowrap" align="right">&nbsp;</td>
  <td>CASTELLANO FRONT PAGE</td>
</tr>
<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 1:</td>
<td><input name="strTexto1" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto1'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 2:</td>
<td><input name="strTexto2" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto2'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 3:</td>
<td><input name="strTexto3" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto3'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 4:</td>
<td><input name="strTexto4" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto4'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 5:</td>
<td><input name="strTexto5" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto5'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
  <td nowrap="nowrap" align="right">&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr valign="baseline">
  <td nowrap="nowrap" align="right">&nbsp;</td>
  <td>INGLÉS FRONT PAGE</td>
</tr>
<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 1 En:</td>
<td><input name="strTexto1En" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto1En'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 2 En:</td>
<td><input name="strTexto2En" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto2En'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 3 En:</td>
<td><input name="strTexto3En" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto3En'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 4 En:</td>
<td><input name="strTexto4En" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto4En'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 5 En:</td>
<td><input name="strTexto5En" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto5En'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
  <td nowrap="nowrap" align="right">&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr valign="baseline">
  <td nowrap="nowrap" align="right">&nbsp;</td>
  <td>RUSO FRONT PAGE</td>
</tr>
<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 1 Ru:</td>
<td><input name="strTexto1Ru" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto1Ru'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 2 Ru:</td>
<td><input name="strTexto2Ru" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto2Ru'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 3 Ru:</td>
<td><input name="strTexto3Ru" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto3Ru'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 4 Ru:</td>
<td><input name="strTexto4Ru" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto4Ru'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 5 Ru:</td>
<td><input name="strTexto5Ru" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto5Ru'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
  <td nowrap="nowrap" align="right">&nbsp;</td>
  <td>&nbsp;</td>
</tr>

<tr valign="baseline">
  <td nowrap="nowrap" align="right">&nbsp;</td>
  <td>TEXTO VISUALIZACIÓN "COLECCIONES"</td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 6:</td>
<td><input name="strTexto6" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto6'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 6 En:</td>
<td><input name="strTexto6En" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto6En'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 6 Ru:</td>
<td><input name="strTexto6Ru" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto6Ru'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>


<tr valign="baseline">
  <td nowrap="nowrap" align="right">&nbsp;</td>
  <td>&nbsp;</td>
</tr>

<tr valign="baseline">
  <td nowrap="nowrap" align="right">&nbsp;</td>
  <td>&nbsp;</td>
</tr>

<tr valign="baseline">
  <td nowrap="nowrap" align="right">&nbsp;</td>
  <td>TEXTO VISUALIZACIÓN "ARTÍCULOS"</td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 7:</td>
<td><input name="strTexto7" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto7'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 7 En:</td>
<td><input name="strTexto7En" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto7En'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 7 Ru:</td>
<td><input name="strTexto7Ru" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto7Ru'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>


<tr valign="baseline">
  <td nowrap="nowrap" align="right">&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr valign="baseline">
  <td nowrap="nowrap" align="right">&nbsp;</td>
  <td>&nbsp;</td>
</tr>


<tr valign="baseline">
  <td nowrap="nowrap" align="right">&nbsp;</td>
  <td>TEXTO VISUALIZACIÓN "SLOGAN"</td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 8:</td>
<td><input name="strTexto8" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto8'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 8 En:</td>
<td><input name="strTexto8En" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto8En'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Texto 8 Ru:</td>
<td><input name="strTexto8Ru" type="text" class="a1normal" value="<?php echo htmlentities($row_textos['strTexto8Ru'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>


<tr valign="baseline">
<td nowrap="nowrap" align="right">&nbsp;</td>
<td><input type="submit" value="Modificar Textos" /></td>
</tr>
</table>
<input type="hidden" name="MM_update" value="form1" />
<input type="hidden" name="idTextoWeb" value="<?php echo $row_textos['idTextoWeb']; ?>" />
</form>
<p>&nbsp;</p>
</div>
<div class="separadorarlineas"></div>

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
 mysqli_free_result($textos);

 mysqli_free_result($seo);

 mysqli_free_result($usuarios);

 mysqli_free_result($favicon);

 mysqli_free_result($anagrama);
?>
