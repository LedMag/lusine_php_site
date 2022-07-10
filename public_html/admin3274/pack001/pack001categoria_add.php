<?php require_once('../../Connections/gabrielle.php'); ?>
<?php mysql_query("SET NAMES 'utf8'");?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tblpack001categoria (strImagen, strImagen2, 
  strNombre, strDescripcion, strSeo1, strSeo2, strSeo3,
  strNombreEn, strDescripcionEn, strSeo1En, strSeo2En, strSeo3En,
  strNombreRu, strDescripcionRu, strSeo1Ru, strSeo2Ru, strSeo3Ru, 
  strPosicion, strActiva) VALUES 
  (%s, %s, %s, %s, %s, %s, %s, 
  %s, %s, %s, %s, %s, 
  %s, %s, %s, %s, %s, 
  %s, %s)",
  
						GetSQLValueString($_POST['strImagen'], "text"),
					   	GetSQLValueString($_POST['strImagen2'], "text"),
						GetSQLValueString($_POST['strNombre'], "text"),
					   	GetSQLValueString($_POST['strDescripcion'], "text"),
                     	GetSQLValueString($_POST['strSeo1'], "text"),
						GetSQLValueString($_POST['strSeo2'], "text"),
						GetSQLValueString($_POST['strSeo3'], "text"),
					   
                       GetSQLValueString($_POST['strNombreEn'], "text"),
                       GetSQLValueString($_POST['strDescripcionEn'], "text"),
                       GetSQLValueString($_POST['strSeo1En'], "text"),
                       GetSQLValueString($_POST['strSeo2En'], "text"),
					   GetSQLValueString($_POST['strSeo3En'], "text"),
					   
                       GetSQLValueString($_POST['strNombreRu'], "text"),
                       GetSQLValueString($_POST['strDescripcionRu'], "text"),
                       GetSQLValueString($_POST['strSeo1Ru'], "text"),
                       GetSQLValueString($_POST['strSeo2Ru'], "text"),
					   GetSQLValueString($_POST['strSeo3Ru'], "text"),

                       GetSQLValueString($_POST['strPosicion'], "int"),
                       GetSQLValueString($_POST['strActiva'], "text"));

  mysql_select_db($database_gabrielle, $gabrielle);
  $Result1 = mysql_query($insertSQL, $gabrielle) or die(mysql_error());

  $insertGoTo = "pack001categoria_lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_gabrielle, $gabrielle);
$query_usuarios = "SELECT * FROM tblusuario ORDER BY tblusuario.strLevel DESC";
$usuarios = mysql_query($query_usuarios, $gabrielle) or die(mysql_error());
$row_usuarios = mysql_fetch_assoc($usuarios);
$totalRows_usuarios = mysql_num_rows($usuarios);

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
$query_pack001categoria = "SELECT * FROM tblpack001categoria ORDER BY tblpack001categoria.strPosicion ASC";
$pack001categoria = mysql_query($query_pack001categoria, $gabrielle) or die(mysql_error());
$row_pack001categoria = mysql_fetch_assoc($pack001categoria);
$totalRows_pack001categoria = mysql_num_rows($pack001categoria);
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
	remote = open('gestionimagenPack001categoria.php', 'remote', 'width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no, status=yes');
 	remote.focus();
	}
</script>

<script>
function subirimagen2()
{
	self.name = 'opener';
	remote = open('gestionimagenPack001categoria2.php', 'remote', 'width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no, status=yes');
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
<!-- InstanceBeginEditable name="titulocontenidoprincipal" -->AÑADIR CATEGORÍA PACK001<!-- InstanceEndEditable -->
</td>
</tr>
<tr>
  <td colspan="2" align="right" class="tipografiagothic" style="height:1%">
  <!-- InstanceBeginEditable name="subtitulocontenido" -->
  <a href="pack001categoria_lista.php"> <strong>Volver</strong> Listado Categorias PACK001</a> <!-- InstanceEndEditable -->
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
  <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
    <table width="100%" align="center">
      <tr valign="baseline">
        <td colspan="2" align="right" nowrap="nowrap" bgcolor="#93a9a6">&nbsp;</td>
        </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">ICONO CATEGORÍA:</td>
        <td><input name="strImagen" type="text" class="a1medio" value="" size="32" />
          <input name="button" type="button" class="a1boton" id="button" onclick="javascript:subirimagen();" value="Buscar Imagen" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">IMAGEN BANNER:</td>
        <td><input name="strImagen2" type="text" class="a1medio" value="" size="32" />
          <input name="button" type="button" class="a1boton" id="button" onclick="javascript:subirimagen2();" value="Buscar Imagen" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Nombre Categoría:</td>
        <td><input name="strNombre" type="text" class="a1normal" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td align="right" valign="top" nowrap="nowrap">Descripcion:</td>
        <td><textarea name="strDescripcion" cols="32" rows="5" class="a1normal"></textarea></td>
      </tr>

      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Título S.E.O:</td>
        <td><input name="strSeo1" type="text" class="a1normal" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td align="right" valign="top" nowrap="nowrap">Descripción S.E.O:</td>
        <td><textarea name="strSeo2" cols="32" rows="3" class="a1normal"></textarea></td>
      </tr>
      
      <tr valign="baseline">
        <td align="right" valign="top" nowrap="nowrap">Keyworks:</td>
        <td><textarea name="strSeo3" cols="32" rows="3" class="a1normal"></textarea></td>
      </tr>
      
      
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr valign="baseline">
        <td colspan="2" align="right" nowrap="nowrap" bgcolor="#93a9a6">&nbsp;</td>
        </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Nombre Categoría En:</td>
        <td><input name="strNombreEn" type="text" class="a1normal" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td align="right" valign="top" nowrap="nowrap">Descripción En:</td>
        <td><textarea name="strDescripcionEn" cols="32" rows="5" class="a1normal"></textarea></td>
      </tr>

      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Título S.E.O En:</td>
        <td><input name="strSeo1En" type="text" class="a1normal" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td align="right" valign="top" nowrap="nowrap">Descripción S.E.O En:</td>
        <td><textarea name="strSeo2En" cols="32" rows="3" class="a1normal"></textarea></td>
      </tr>
      
            <tr valign="baseline">
        <td align="right" valign="top" nowrap="nowrap">Keywords En:</td>
        <td><textarea name="strSeo3En" cols="32" rows="3" class="a1normal"></textarea></td>
      </tr>
      
      
      
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr valign="baseline">
        <td colspan="2" align="right" nowrap="nowrap" bgcolor="#93a9a6">&nbsp;</td>
        </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Nombre Categoría Ru:</td>
        <td><input name="strNombreRu" type="text" class="a1normal" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td align="right" valign="top" nowrap="nowrap">Descripción Ru:</td>
        <td><textarea name="strDescripcionRu" cols="32" rows="5" class="a1normal"></textarea></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Título S.E.O Ru:</td>
        <td><input name="strSeo1Ru" type="text" class="a1normal" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td align="right" valign="top" nowrap="nowrap">Descripción S.E.O Ru:</td>
        <td><textarea name="strSeo2Ru" cols="32" rows="3" class="a1normal"></textarea></td>
      </tr>
      
            <tr valign="baseline">
        <td align="right" valign="top" nowrap="nowrap">Keywords Ru:</td>
        <td><textarea name="strSeo3Ru" cols="32" rows="3" class="a1normal"></textarea></td>
      </tr>
      
  
      
<tr valign="baseline">
<td colspan="2" align="right" nowrap="nowrap" bgcolor="#93a9a6">&nbsp;</td>
</tr>
      

      
      
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Posición:</td>
        <td><input name="strPosicion" type="text" class="a1mini" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Activa:</td>
        <td><select name="strActiva" class="a1mini">
          <option value="si" <?php if (!(strcmp("si", ""))) {echo "SELECTED";} ?>>si</option>
          <option value="no" <?php if (!(strcmp("no", ""))) {echo "SELECTED";} ?>>no</option>
        </select></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td><input type="submit" class="a1boton" value="Insertar registro" /></td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form1" />
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
mysql_free_result($usuarios);

mysql_free_result($favicon);

mysql_free_result($anagrama);

mysql_free_result($pack001categoria);
?>
