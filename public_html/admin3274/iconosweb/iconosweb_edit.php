<?php require_once('../../Connections/gabrielle.php'); ?>
<?php mysql_query("SET NAMES 'utf8'");?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "webmaster,administrador";
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

$MM_restrictGoTo = "../login.php";
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE tbliconosweb SET strNombre=%s, strImagen=%s, strImagen2=%s, strEnlace1=%s, strEnlace2=%s, 
 strExterno=%s, strPosicion=%s, strActivacion=%s WHERE idIconos=%s",
                       GetSQLValueString($_POST['strNombre'], "text"),
                       GetSQLValueString($_POST['strImagen'], "text"),
                       GetSQLValueString($_POST['strImagen2'], "text"),
                       GetSQLValueString($_POST['strEnlace1'], "text"),
                       GetSQLValueString($_POST['strEnlace2'], "text"),
                       GetSQLValueString($_POST['strExterno'], "text"),
                       GetSQLValueString($_POST['strPosicion'], "int"),
                       GetSQLValueString($_POST['strActivacion'], "text"),
                       GetSQLValueString($_POST['idIconos'], "int"));

  mysql_select_db($database_gabrielle, $gabrielle);
  $Result1 = mysql_query($updateSQL, $gabrielle) or die(mysql_error());

  $updateGoTo = "iconosweb_lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_gabrielle, $gabrielle);
$query_favicon = "SELECT * FROM tblfavicon ORDER BY tblfavicon.idFavicon ASC";
$favicon = mysql_query($query_favicon, $gabrielle) or die(mysql_error());
$row_favicon = mysql_fetch_assoc($favicon);
$totalRows_favicon = mysql_num_rows($favicon);

mysql_select_db($database_gabrielle, $gabrielle);
$query_anagrama = "SELECT * FROM tblanagrama ORDER BY tblanagrama.idAnagrama ASC";
$anagrama = mysql_query($query_anagrama, $gabrielle) or die(mysql_error());
$row_anagrama = mysql_fetch_assoc($anagrama);
$totalRows_anagrama = mysql_num_rows($anagrama);

mysql_select_db($database_gabrielle, $gabrielle);
$query_usuario = "SELECT * FROM tblusuario ORDER BY tblusuario.idUsuario ASC";
$usuario = mysql_query($query_usuario, $gabrielle) or die(mysql_error());
$row_usuario = mysql_fetch_assoc($usuario);
$totalRows_usuario = mysql_num_rows($usuario);

$varIcono_iconosweb = "0";
if (isset($_GET ["recordID"])) {
  $varIcono_iconosweb = $_GET ["recordID"];
}
mysql_select_db($database_gabrielle, $gabrielle);
$query_iconosweb = sprintf("SELECT * FROM tbliconosweb WHERE tbliconosweb.idIconos =%s", GetSQLValueString($varIcono_iconosweb, "int"));
$iconosweb = mysql_query($query_iconosweb, $gabrielle) or die(mysql_error());
$row_iconosweb = mysql_fetch_assoc($iconosweb);
$totalRows_iconosweb = mysql_num_rows($iconosweb);

mysql_select_db($database_gabrielle, $gabrielle);
$query_contacto = "SELECT * FROM tbldatosempresa ORDER BY tbldatosempresa.idDatosEmpresa DESC";
$contacto = mysql_query($query_contacto, $gabrielle) or die(mysql_error());
$row_contacto = mysql_fetch_assoc($contacto);
$totalRows_contacto = mysql_num_rows($contacto);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/adminewv3.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Admin web gabrielle</title>
<link rel="shortcut icon" href="<?php echo $row_favicon['strEnlace']; ?>" />
<meta name="robots" content="noindex" />


<script>
function subirimagen()
{
	self.name = 'opener';
	remote = open('gestionimagenicono.php', 'remote', 'width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no, status=yes');
 	remote.focus();
	}
</script>

<script>
function subirimagen2()
{
	self.name = 'opener';
	remote = open('gestionimagenicono2.php', 'remote', 'width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no, status=yes');
 	remote.focus();
	}
</script>
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
<!-- InstanceBeginEditable name="titulocontenidoprincipal" -->MODIFICACIÓN ICONO NAVEGACIÓN
<!-- InstanceEndEditable -->
</td>
</tr>
<tr>
  <td colspan="2" align="right" class="tipografiagothic" style="height:1%">
  <!-- InstanceBeginEditable name="subtitulocontenido" -->
<a href="iconosweb_lista.php">Volver Listado Iconos Navegación</a>
<!-- InstanceEndEditable -->
  </td>
</tr>
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<tr>
  <td colspan="2" align="right" class="tipografiagothic" style="height:1.5%">
    <!-- InstanceBeginEditable name="botoncuatro" -->

<?php $email= $row_contacto['strEmail']; ?>
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
    <table align="center">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Nombre Botón:</td>
        <td><input name="strNombre" type="text" class="a1normal" value="<?php echo htmlentities($row_iconosweb['strNombre'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Imagen Principal:</td>
        <td><input name="strImagen" type="text" class="a1medio" value="<?php echo htmlentities($row_iconosweb['strImagen'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
          <input name="button" type="button" class="a1boton" id="button" onclick="javascript:subirimagen ();" value="Buscar Imagen" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Imagen Secundaria:</td>
        <td><input name="strImagen2" type="text" class="a1medio" value="<?php echo htmlentities($row_iconosweb['strImagen2'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
          <input name="button" type="button" class="a1boton" id="button" onclick="javascript:subirimagen2 ();" value="Buscar Imagen" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Enlace 1:</td>
        <td><input name="strEnlace1" type="text" class="a1normal" value="<?php echo htmlentities($row_iconosweb['strEnlace1'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Enlace 2:</td>
        <td><input name="strEnlace2" type="text" class="a1normal" value="<?php echo htmlentities($row_iconosweb['strEnlace2'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>

      
            <tr valign="baseline">
        <td nowrap="nowrap" align="right">Externalización:</td>
        <td><select name="strExterno" class="a1medio">
          <option value="target=_blank" <?php if (!(strcmp('target=_blank"', htmlentities($row_iconosweb['strExterno'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>si</option>
          <option value="no" <?php if (!(strcmp("no", htmlentities($row_iconosweb['strExterno'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>no</option>
        </select></td>
      </tr>
      

      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Activación:</td>
        <td><select name="strActivacion" class="a1medio">
          <option value="si" <?php if (!(strcmp("si", htmlentities($row_iconosweb['strActivacion'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>si</option>
          <option value="no" <?php if (!(strcmp("no", htmlentities($row_iconosweb['strActivacion'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>no</option>
        </select></td>
      </tr>
      
            <tr valign="baseline">
        <td nowrap="nowrap" align="right">Posición:</td>
        <td><input name="strPosicion" type="text" class="a1medio" value="<?php echo htmlentities($row_iconosweb['strPosicion'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      
      
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td><input type="submit" class="a1boton" value="Actualizar registro" /></td>
      </tr>
    </table>
    <input type="hidden" name="MM_update" value="form1" />
    <input type="hidden" name="idIconos" value="<?php echo $row_iconosweb['idIconos']; ?>" />
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
mysql_free_result($favicon);

mysql_free_result($anagrama);

mysql_free_result($iconosweb);

mysql_free_result($contacto);

mysql_free_result($usuario);
?>
