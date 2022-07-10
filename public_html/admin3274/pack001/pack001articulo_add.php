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
  $insertSQL = sprintf("INSERT INTO tblpack001articulo (intSubCategoria, intCat, strImagen, strImagen2, strImagen3, strImagen4, 
	strNombre, strDescripcion, strMedidas, strPeso, dblPrecio, strSeo1, strSeo2, strSeo3,
	strNombreEn, strDescripcionEn, strSeo1En, strSeo2En, strSeo3En, 
	strNombreRu, strDescripcionRu, strSeo1Ru, strSeo2Ru, strSeo3Ru,
	strPosicion, strActiva, strNovedad) VALUES (
	%s, %s, %s, %s, %s, %s,
	%s, %s, %s, %s, %s, %s, %s, %s, 
	%s, %s, %s, %s, %s, 
	%s, %s, %s, %s, %s, 
	%s, %s, %s)",
	
                       	GetSQLValueString($_POST['intSubCategoria'], "int"),
						GetSQLValueString($_POST['intCat'], "int"),
                       	GetSQLValueString($_POST['strImagen'], "text"),
                       	GetSQLValueString($_POST['strImagen2'], "text"),
                       	GetSQLValueString($_POST['strImagen3'], "text"),
                       	GetSQLValueString($_POST['strImagen4'], "text"),
					   
                       	GetSQLValueString($_POST['strNombre'], "text"),
						GetSQLValueString($_POST['strDescripcion'], "text"),
						GetSQLValueString($_POST['strMedidas'], "text"),
						GetSQLValueString($_POST['strPeso'], "double"),
						GetSQLValueString($_POST['dblPrecio'], "double"),
						
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
						GetSQLValueString($_POST['strActiva'], "text"),
                       	GetSQLValueString($_POST['strNovedad'], "text"));

  mysql_select_db($database_gabrielle, $gabrielle);
  $Result1 = mysql_query($insertSQL, $gabrielle) or die(mysql_error());

  $insertGoTo = "pack001articulo_lista.php";
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
$query_pack001subcategoria = "SELECT * FROM tblpack001subcategoria WHERE strNombre != 'CATÁLOGO COMPLETO' ORDER BY tblpack001subcategoria.strPosicion ASC";
$pack001subcategoria = mysql_query($query_pack001subcategoria, $gabrielle) or die(mysql_error());
$row_pack001subcategoria = mysql_fetch_assoc($pack001subcategoria);
$totalRows_pack001subcategoria = mysql_num_rows($pack001subcategoria);

mysql_select_db($database_gabrielle, $gabrielle);
$query_pack001articulo = "SELECT * FROM tblpack001articulo ORDER BY tblpack001articulo.strPosicion ASC";
$pack001articulo = mysql_query($query_pack001articulo, $gabrielle) or die(mysql_error());
$row_pack001articulo = mysql_fetch_assoc($pack001articulo);
$totalRows_pack001articulo = mysql_num_rows($pack001articulo);

mysql_select_db($database_gabrielle, $gabrielle);
$query_categoria = "SELECT * FROM tblpack001categoria ORDER BY tblpack001categoria.idCategoria ASC";
$categoria = mysql_query($query_categoria, $gabrielle) or die(mysql_error());
$row_categoria = mysql_fetch_assoc($categoria);
$totalRows_categoria = mysql_num_rows($categoria);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/adminewv3.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Admin web gabrielle</title>
<link rel="shortcut icon" href="<?php echo $row_favicon['strEnlace']; ?>" />
<meta name="robots" content="noindex" />


<?php include("../../menues/funciones.php"); ?>

<script>
function subirimagen()
{
	self.name = 'opener';
	remote = open('gestionimagenPack001articulo.php', 'remote', 'width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no, status=yes');
 	remote.focus();
	}
</script>

<script>
function subirimagen2()
{
	self.name = 'opener';
	remote = open('gestionimagenPack001articulo2.php', 'remote', 'width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no, status=yes');
 	remote.focus();
	}
</script>

<script>
function subirimagen3()
{
	self.name = 'opener';
	remote = open('gestionimagenPack001articulo3.php', 'remote', 'width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no, status=yes');
 	remote.focus();
	}
</script>

<script>
function subirimagen4()
{
	self.name = 'opener';
	remote = open('gestionimagenPack001articulo4.php', 'remote', 'width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no, status=yes');
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
<!-- InstanceBeginEditable name="titulocontenidoprincipal" -->
AÑADIR ARTÍCULO PACK001
<!-- InstanceEndEditable -->
</td>
</tr>
<tr>
  <td colspan="2" align="right" class="tipografiagothic" style="height:1%">
  <!-- InstanceBeginEditable name="subtitulocontenido" -->
  <a href="pack001articulo_lista.php"><strong>Volver</strong> Listado Artículos PACK001</a>
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
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
<table width="100%" align="center">

<tr valign="baseline">
<td colspan="2" align="right" nowrap="nowrap" bgcolor="#93a9a6">&nbsp;</td>
</tr>


<tr valign="baseline">
  <td nowrap="nowrap" align="right">Categoria:</td>
  <td><select name="intCat" class="a1normal">
    <?php
do {  
?>
    <option value="<?php echo $row_categoria['idCategoria']?>"><?php echo $row_categoria['strNombre']?></option>
    <?php
} while ($row_categoria = mysql_fetch_assoc($categoria));
  $rows = mysql_num_rows($categoria);
  if($rows > 0) {
      mysql_data_seek($categoria, 0);
	  $row_categoria = mysql_fetch_assoc($categoria);
  }
?>
  </select>
  </td>
</tr>


<tr valign="baseline">
  <td nowrap="nowrap" align="right">SubCategoria:</td>
  <td><select name="intSubCategoria" class="a1normal">
  <?php 
do {  
?>
  <option value="<?php echo $row_pack001subcategoria['idSubCategoria']?>" ><?php echo $row_pack001subcategoria['strNombre']?></option>
  <?php
} while ($row_pack001subcategoria = mysql_fetch_assoc($pack001subcategoria));
?>
  </select>
  </td>
</tr>
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->


<tr valign="baseline">
<td nowrap="nowrap" align="right">Imagen Principal:</td>
<td><input name="strImagen" type="text" class="a1medio" value="" size="32" />
<input name="button" type="button" class="a1boton" id="button" onclick="javascript:subirimagen();" value="Buscar Imagen" /></td>
</tr>



<?php /*?><tr valign="baseline">
<td nowrap="nowrap" align="right">2º Imagen:</td>
<td><input name="strImagen2" type="text" class="a1medio" value="" size="32" />
<input name="button" type="button" class="a1boton" id="button" onclick="javascript:subirimagen2();" value="Buscar Imagen" /></td>
</tr><?php */?>

<?php /*?><tr valign="baseline">
<td nowrap="nowrap" align="right">3º Imagen:</td>
<td><input name="strImagen3" type="text" class="a1medio" value="" size="32" />
<input name="button" type="button" class="a1boton" id="button" onclick="javascript:subirimagen3();" value="Buscar Imagen" /></td>
</tr><?php */?>

<?php /*?><tr valign="baseline">
<td nowrap="nowrap" align="right">4º Imagen:</td>
<td><input name="strImagen4" type="text" class="a1medio" value="" size="32" />
<input name="button" type="button" class="a1boton" id="button" onclick="javascript:subirimagen4();" value="Buscar Imagen" /></td>
</tr><?php */?>


<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<tr valign="baseline">
<td nowrap="nowrap" align="right">Nombre Artículo:</td>
<td><input name="strNombre" type="text" class="a1normal" value="" size="32" /></td>
</tr>

<tr valign="baseline">
<td align="right" valign="top" nowrap="nowrap">Descripción:</td>
<td><textarea name="strDescripcion" cols="32" rows="5" class="a1normal"></textarea></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Medidas:</td>
<td><input name="strMedidas" type="text" class="a1medio" value="" size="32" /></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Peso:</td>
<td><input name="strPeso" type="text" class="a1mini" value="" size="32" />
  Kg</td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Precio:</td>
<td><input name="dblPrecio" type="text" class="a1mini" value="" size="32" /> 
  €</td>
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
<td align="right" valign="top" nowrap="nowrap">Keywords S.E.O:</td>
<td><textarea name="strSeo3" cols="32" rows="3" class="a1normal"></textarea></td>
</tr>


<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<tr valign="baseline">
<td colspan="2" align="right" nowrap="nowrap" bgcolor="#93a9a6">&nbsp;</td>
</tr>


<tr valign="baseline">
<td nowrap="nowrap" align="right">Nombre Artículo En:</td>
<td><input name="strNombreEn" type="text" class="a1normal" value="" size="32" /></td>
</tr>

<tr valign="baseline">
<td align="right" valign="top" nowrap="nowrap">Descripción En:</td>
<td><textarea name="strDescripcionEn" cols="32" rows="4" class="a1normal"></textarea></td>
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
<td align="right" valign="top" nowrap="nowrap">Keywords S.E.O En:</td>
<td><textarea name="strSeo3En" cols="32" rows="3" class="a1normal"></textarea></td>
</tr>


<tr valign="baseline">
<td colspan="2" align="right" nowrap="nowrap" bgcolor="#93a9a6">&nbsp;</td>
</tr>
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->


<tr valign="baseline">
<td nowrap="nowrap" align="right">Nombre Artículo Ru:</td>
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
<td align="right" valign="top" nowrap="nowrap">Keywords S.E.O Ru:</td>
<td><textarea name="strSeo3Ru" cols="32" rows="3" class="a1normal"></textarea></td>
</tr>

<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
<!--**************************************************************************************************** -->
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
<td nowrap="nowrap" align="right">ver Novedad:</td>
<td><select name="strNovedad" class="a1mini">
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
<td><input type="submit" class="a1boton" value="Añadir Producto" /></td>
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

mysql_free_result($pack001subcategoria);

mysql_free_result($pack001articulo);

mysql_free_result($categoria);
?>