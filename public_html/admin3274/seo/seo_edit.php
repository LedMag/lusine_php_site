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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE tblseo SET 
  strTexto=%s, strSeo1=%s, strSeo2=%s, strSeo3=%s,
  strTextoEn=%s, strSeo1En=%s, strSeo2En=%s, strSeo3En=%s,
  strTextoRu=%s, strSeo1Ru=%s, strSeo2Ru=%s, strSeo3Ru=%s
  WHERE idSeo=%s",
  
                       GetSQLValueString($_POST['strTexto'], "text"),
					   GetSQLValueString($_POST['strSeo1'], "text"),
                       GetSQLValueString($_POST['strSeo2'], "text"),
                       GetSQLValueString($_POST['strSeo3'], "text"),
					   
					   GetSQLValueString($_POST['strTextoEn'], "text"),
					   GetSQLValueString($_POST['strSeo1En'], "text"),
                       GetSQLValueString($_POST['strSeo2En'], "text"),
                       GetSQLValueString($_POST['strSeo3En'], "text"),
					   
					   GetSQLValueString($_POST['strTextoRu'], "text"),
					   GetSQLValueString($_POST['strSeo1Ru'], "text"),
                       GetSQLValueString($_POST['strSeo2Ru'], "text"),
                       GetSQLValueString($_POST['strSeo3Ru'], "text"),
					   
					   GetSQLValueString($_POST['idSeo'], "int"));

    mysqli_select_db($gabrielle, $database_gabrielle);
  $Result1 =  mysqli_query($updateSQL, $gabrielle) or die( mysqli_error($gabrielle));

  $updateGoTo = "seo_lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$varSeo_seo = "0";
if (isset($_GET ["recordID"])) {
  $varSeo_seo = $_GET ["recordID"];
}
  mysqli_select_db($gabrielle, $database_gabrielle);
$query_seo = sprintf("SELECT * FROM tblseo WHERE tblseo.idSeo =%s", GetSQLValueString($varSeo_seo, "int"));
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
<!-- InstanceBeginEditable name="titulocontenidoprincipal" -->
MODIFICAR TEXTOS POSICIONAMIENTO S.E.O.
<!-- InstanceEndEditable -->
</td>
</tr>
<tr>
  <td colspan="2" align="right" class="tipografiagothic" style="height:1%">
  <!-- InstanceBeginEditable name="subtitulocontenido" -->
<a href="seo_lista.php">Volver Listado S.E.O.</a>
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
<td align="right" valign="top" nowrap="nowrap"><strong>Texto:</strong></td>
<td><textarea name="strTexto" cols="32" rows="10" class="a1extranormal"><?php echo htmlentities($row_seo['strTexto'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
</tr>

 
<tr valign="baseline">
<td nowrap="nowrap" align="right">&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Título:</td>
<td><input name="strSeo1" type="text" class="a1extranormal" value="<?php echo htmlentities($row_seo['strSeo1'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td align="right" valign="top" nowrap="nowrap">Descripción:</td>
<td><textarea name="strSeo2" cols="32" rows="3" class="a1extranormal"><?php echo htmlentities($row_seo['strSeo2'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
</tr>

<tr valign="baseline">
<td align="right" valign="top" nowrap="nowrap">Keywords:</td>
<td><textarea name="strSeo3" cols="32" rows="2" class="a1extranormal"><?php echo htmlentities($row_seo['strSeo3'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
</tr>

<!--**********************************************************************************************-->
<!--**********************************************************************************************-->
<!--**********************************************************************************************-->
<tr valign="baseline">
<td nowrap="nowrap" align="right">&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr valign="baseline">
<td align="right" valign="top" nowrap="nowrap"><strong>Texto Inglés:</strong></td>
<td><textarea name="strTextoEn" cols="32" rows="10" class="a1extranormal"><?php echo htmlentities($row_seo['strTextoEn'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Título Inglés:</td>
<td><input name="strSeo1En" type="text" class="a1extranormal" value="<?php echo htmlentities($row_seo['strSeo1En'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td align="right" valign="top" nowrap="nowrap">Descripción Inglés:</td>
<td><textarea name="strSeo2En" cols="32" rows="3" class="a1extranormal"><?php echo htmlentities($row_seo['strSeo2En'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
</tr>

<tr valign="baseline">
<td align="right" valign="top" nowrap="nowrap">Keywords Inglés:</td>
<td><textarea name="strSeo3En" cols="32" rows="2" class="a1extranormal"><?php echo htmlentities($row_seo['strSeo3En'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
</tr>

<!--**********************************************************************************************-->
<!--**********************************************************************************************-->
<!--**********************************************************************************************-->

<tr valign="baseline">
<td nowrap="nowrap" align="right">&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr valign="baseline">
<td align="right" valign="top" nowrap="nowrap"><strong>Texto Ruso:</strong></td>
<td><textarea name="strTextoRu" cols="32" rows="10" class="a1extranormal"><?php echo htmlentities($row_seo['strTextoRu'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Título Ruso:</td>
<td><input name="strSeo1Ru" type="text" class="a1extranormal" value="<?php echo htmlentities($row_seo['strSeo1Ru'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td align="right" valign="top" nowrap="nowrap">Descripción Ruso:</td>
<td><textarea name="strSeo2Ru" cols="32" rows="3" class="a1extranormal"><?php echo htmlentities($row_seo['strSeo2Ru'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
</tr>

<tr valign="baseline">
<td align="right" valign="top" nowrap="nowrap">Keywords Ruso:</td>
<td><textarea name="strSeo3Ru" cols="32" rows="2" class="a1extranormal"><?php echo htmlentities($row_seo['strSeo3Ru'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
</tr>

<!--**********************************************************************************************-->
<!--**********************************************************************************************-->
<!--**********************************************************************************************-->
  
<tr valign="baseline">
<td nowrap="nowrap" align="right">&nbsp;</td>
<td>&nbsp;</td>
</tr>
   
<tr valign="baseline">
<td nowrap="nowrap" align="right">&nbsp;</td>
<td><input type="submit" value="Actualizar Textos Seo" /></td>
</tr>
</table>
<input type="hidden" name="MM_update" value="form1" />
<input type="hidden" name="idSeo" value="<?php echo $row_seo['idSeo']; ?>" />
</form>
<p>&nbsp;</p>
</div>
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
 mysqli_free_result($seo);

 mysqli_free_result($usuarios);

 mysqli_free_result($favicon);

 mysqli_free_result($anagrama);
?>
