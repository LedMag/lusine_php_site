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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE tblpack001subcategoria SET intCategoria=%s, strImagen=%s, strImagen2=%s, strNombre=%s, strDescripcion=%s, strSeo1=%s, strSeo2=%s, strSeo3=%s, strNombreEn=%s, strDescripcionEn=%s, strSeo1En=%s, strSeo2En=%s, strSeo3En=%s, strNombreRu=%s, strDescripcionRu=%s, strSeo1Ru=%s, strSeo2Ru=%s, strSeo3Ru=%s, strPosicion=%s, strActiva=%s WHERE idSubCategoria=%s",
                       GetSQLValueString($_POST['intCategoria'], "int"),
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
                       GetSQLValueString($_POST['strActiva'], "text"),
                       GetSQLValueString($_POST['idSubCategoria'], "int"));

   mysqli_select_db($database_gabrielle, $gabrielle);
  $Result1 =  mysqli_query($updateSQL, $gabrielle) or die( mysqli_error());

  $updateGoTo = "pack001articulo_lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE tblpack001articulo SET intSubCategoria=%s, intCat=%s, strImagen=%s, strImagen2=%s, strImagen3=%s, strImagen4=%s, 
  strNombre=%s, strDescripcion=%s, strMedidas=%s, strPeso=%s, dblPrecio=%s, strSeo1=%s, strSeo2=%s, strSeo3=%s,
  strNombreEn=%s, strDescripcionEn=%s, strSeo1En=%s, strSeo2En=%s, strSeo3En=%s, 
  strNombreRu=%s, strDescripcionRu=%s, strSeo1Ru=%s, strSeo2Ru=%s, strSeo3Ru=%s,
  strPosicion=%s, strActiva=%s, strNovedad=%s WHERE idArticulo=%s",
  
                       	GetSQLValueString($_POST['intSubCategoria'], "int"),
						GetSQLValueString($_POST['intCat'], "int"),
                       	GetSQLValueString($_POST['strImagen'], "text"),
                       	GetSQLValueString($_POST['strImagen2'], "text"),
                       	GetSQLValueString($_POST['strImagen3'], "text"),
                       	GetSQLValueString($_POST['strImagen4'], "text"),
					   
                       	GetSQLValueString($_POST['strNombre'], "text"),
                       	GetSQLValueString($_POST['strDescripcion'], "text"),
					  	GetSQLValueString($_POST['strMedidas'], "text"),
						GetSQLValueString($_POST['strPeso'], "text"),
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
						GetSQLValueString($_POST['strNovedad'], "text"),
                       	GetSQLValueString($_POST['idArticulo'], "int"));

   mysqli_select_db($database_gabrielle, $gabrielle);
  $Result1 =  mysqli_query($updateSQL, $gabrielle) or die( mysqli_error());

  $updateGoTo = "pack001articulo_lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

 mysqli_select_db($database_gabrielle, $gabrielle);
$query_usuarios = "SELECT * FROM tblusuario ORDER BY tblusuario.strLevel DESC";
$usuarios =  mysqli_query($query_usuarios, $gabrielle) or die( mysqli_error());
$row_usuarios =  mysqli_fetch_assoc($usuarios);
$totalRows_usuarios =  mysqli_num_rows($usuarios);

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

 mysqli_select_db($database_gabrielle, $gabrielle);
$query_pack001subcategoria = "SELECT * FROM tblpack001subcategoria WHERE strNombre != 'CATÁLOGO COMPLETO' ORDER BY tblpack001subcategoria.strPosicion ASC";
$pack001subcategoria =  mysqli_query($query_pack001subcategoria, $gabrielle) or die( mysqli_error());
$row_pack001subcategoria =  mysqli_fetch_assoc($pack001subcategoria);
$totalRows_pack001subcategoria =  mysqli_num_rows($pack001subcategoria);

$varArticulo_pack001articulo = "0";
if (isset($_GET ["recordID"])) {
  $varArticulo_pack001articulo = $_GET ["recordID"];
}
 mysqli_select_db($database_gabrielle, $gabrielle);
$query_pack001articulo = sprintf("SELECT * FROM tblpack001articulo WHERE tblpack001articulo.idArticulo =%s", GetSQLValueString($varArticulo_pack001articulo, "int"));
$pack001articulo =  mysqli_query($query_pack001articulo, $gabrielle) or die( mysqli_error());
$row_pack001articulo =  mysqli_fetch_assoc($pack001articulo);
$totalRows_pack001articulo =  mysqli_num_rows($pack001articulo);

 mysqli_select_db($database_gabrielle, $gabrielle);
$query_categoria = "SELECT * FROM tblpack001categoria ORDER BY tblpack001categoria.idCategoria ASC";
$categoria =  mysqli_query($query_categoria, $gabrielle) or die( mysqli_error());
$row_categoria =  mysqli_fetch_assoc($categoria);
$totalRows_categoria =  mysqli_num_rows($categoria);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/adminewv3.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Admin web gabrielle</title>
<link rel="shortcut icon" href="<?php echo $row_favicon['strEnlace']; ?>" />
<meta name="robots" content="noindex" />

<!--****************************************************************************************************************-->
<!--****************************************************************************************************************-->

<!--<?php function ObtenerNombreCategoria001($identificador)
{

	global $database_gabrielle, $gabrielle;
	 mysqli_select_db($database_gabrielle, $gabrielle);
	$query_ConsultaFuncion = sprintf("SELECT strNombre FROM tblpack001categoria WHERE idSubCategoria = %s", $identificador);
	$ConsultaFuncion =  mysqli_query($query_ConsultaFuncion, $gabrielle) or die( mysqli_error());
	$row_ConsultaFuncion =  mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion =  mysqli_num_rows($ConsultaFuncion);


	
	return $row_ConsultaFuncion['strNombre']; 
	 mysqli_free_result($ConsultaFuncion);

}?>-->
<!--****************************************************************************************************************--><!--****************************************************************************************************************-->

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
<!-- InstanceBeginEditable name="titulocontenidoprincipal" -->MODIFICAR ARTÍCULO PACK001<!-- InstanceEndEditable -->
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
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 



<tr valign="baseline">
  <td colspan="2" align="right" nowrap="nowrap" bgcolor="#93a9a6">&nbsp;</td>
  </tr>
  
 <!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 

<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** -->
<tr valign="baseline">
  <td nowrap="nowrap" align="right">Categoria:</td>
  <td><select name="intCat" class="a1normal">
    <?php
do {  
?>
    <option value="<?php echo $row_categoria['idCategoria']?>"<?php if (!(strcmp($row_categoria['idCategoria'], $row_pack001articulo['intCat']))) {echo "selected=\"selected\"";} ?>><?php echo $row_categoria['strNombre']?></option>
    <?php
} while ($row_categoria =  mysqli_fetch_assoc($categoria));
  $rows =  mysqli_num_rows($categoria);
  if($rows > 0) {
       mysqli_data_seek($categoria, 0);
	  $row_categoria =  mysqli_fetch_assoc($categoria);
  }
?>
  </select>
  </td>
</tr>




<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** -->
<tr valign="baseline">
  <td nowrap="nowrap" align="right">SubCategoria:</td>
  <td><select name="intSubCategoria" class="a1normal">
    <?php 
do {  
?>
  <option value="<?php echo $row_pack001subcategoria['idSubCategoria']?>" <?php if (!(strcmp($row_pack001subcategoria['idSubCategoria'], htmlentities($row_pack001articulo['intSubCategoria'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_pack001subcategoria['strNombre']?></option>
  <?php
} while ($row_pack001subcategoria =  mysqli_fetch_assoc($pack001subcategoria));
?>
  </select>
  </td>
</tr>
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 
<tr valign="baseline">
<td nowrap="nowrap" align="right">Imagen Principal:</td>
<td><input type="text" name="strImagen" value="<?php echo htmlentities($row_pack001articulo['strImagen'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
<input name="button" type="button" class="a1boton" id="button" onclick="javascript:subirimagen();" value="Buscar Imagen" /></td>
</tr>

<?php /*?><tr valign="baseline">
<td nowrap="nowrap" align="right">2º Imagen:</td>
<td><input type="text" name="strImagen2" value="<?php echo htmlentities($row_pack001articulo['strImagen2'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
<input name="button" type="button" class="a1boton" id="button" onclick="javascript:subirimagen2();" value="Buscar Imagen" /></td>
</tr>
<?php */?>

<?php /*?><tr valign="baseline">
<td nowrap="nowrap" align="right">3º Imagen:</td>
<td><input type="text" name="strImagen3" value="<?php echo htmlentities($row_pack001articulo['strImagen3'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
<input name="button" type="button" class="a1boton" id="button" onclick="javascript:subirimagen3();" value="Buscar Imagen" /></td>
</tr><?php */?>

<?php /*?><tr valign="baseline">
<td nowrap="nowrap" align="right">4º Imagen:</td>
<td><input type="text" name="strImagen4" value="<?php echo htmlentities($row_pack001articulo['strImagen4'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
<input name="button" type="button" class="a1boton" id="button" onclick="javascript:subirimagen4();" value="Buscar Imagen" /></td>
</tr><?php */?>

<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 
<tr valign="baseline">
<td nowrap="nowrap" align="right">Nombre Artículo:</td>
<td><input name="strNombre" type="text" class="a1normal" value="<?php echo htmlentities($row_pack001articulo['strNombre'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td align="right" valign="top" nowrap="nowrap">Descripción:</td>
<td><textarea name="strDescripcion" cols="32" rows="5" class="a1normal"><?php echo htmlentities($row_pack001articulo['strDescripcion'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
</tr>


<tr valign="baseline">
<td nowrap="nowrap" align="right">Medidas:</td>
<td><input name="strMedidas" type="text" class="a1medio" value="<?php echo htmlentities($row_pack001articulo['strMedidas'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>


<tr valign="baseline">
<td nowrap="nowrap" align="right">Peso:</td>
<td><input name="strPeso" type="text" class="a1mini" value="<?php echo htmlentities($row_pack001articulo['strPeso'], ENT_COMPAT, 'utf-8'); ?>" size="32" /> 
  Kg</td>
</tr>


<tr valign="baseline">
<td nowrap="nowrap" align="right">Precio:</td>
<td><input name="dblPrecio" type="text" class="a1mini" value="<?php echo htmlentities($row_pack001articulo['dblPrecio'], ENT_COMPAT, 'utf-8'); ?>" size="32" /> 
  €</td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Título S.E.O:</td>
<td><input name="strSeo1" type="text" class="a1normal" value="<?php echo htmlentities($row_pack001articulo['strSeo1'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>



<tr valign="baseline">
<td align="right" valign="top" nowrap="nowrap">Descripción S.E.O:</td>
<td><textarea name="strSeo2" cols="32" rows="3" class="a1normal"><?php echo htmlentities($row_pack001articulo['strSeo2'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
</tr>

<tr valign="baseline">
  <td align="right" valign="top" nowrap="nowrap">Keywords S.E.O:</td>
  <td><textarea name="strSeo3" cols="32" rows="3" class="a1normal"><?php echo htmlentities($row_pack001articulo['strSeo3'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
</tr>
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 

<tr valign="baseline">
<td colspan="2" align="right" nowrap="nowrap" bgcolor="#93a9a6">INGLÉS</td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Nombre Artículo En:</td>
<td><input name="strNombreEn" type="text" class="a1normal" value="<?php echo htmlentities($row_pack001articulo['strNombreEn'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td align="right" valign="top" nowrap="nowrap">Descripción En:</td>
<td><textarea name="strDescripcionEn" cols="32" rows="5" class="a1normal"><?php echo htmlentities($row_pack001articulo['strDescripcionEn'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Título S.E.O En:</td>
<td><input name="strSeo1En" type="text" class="a1normal" value="<?php echo htmlentities($row_pack001articulo['strSeo1En'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td align="right" valign="top" nowrap="nowrap">Descripción S.E.O En:</td>
<td><textarea name="strSeo2En" cols="32" rows="3" class="a1normal"><?php echo htmlentities($row_pack001articulo['strSeo2En'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
</tr>

<tr valign="baseline">
  <td align="right" valign="top" nowrap="nowrap">Keywords S.E.O En:</td>
  <td><textarea name="strSeo3En" cols="32" rows="3" class="a1normal"><?php echo htmlentities($row_pack001articulo['strSeo3En'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
</tr>

<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 
<tr valign="baseline">
<td colspan="2" align="right" nowrap="nowrap" bgcolor="#93a9a6">RUSO</td>
</tr>

<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 

<tr valign="baseline">
<td nowrap="nowrap" align="right">Nombre Artículo Ru:</td>
<td><input name="strNombreRu" type="text" class="a1normal" value="<?php echo htmlentities($row_pack001articulo['strNombreRu'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td align="right" valign="top" nowrap="nowrap">Descripción Ru:</td>
<td><textarea name="strDescripcionRu" cols="32" rows="5" class="a1normal"><?php echo htmlentities($row_pack001articulo['strDescripcionRu'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Título S.E.O Ru:</td>
<td><input name="strSeo1Ru" type="text" class="a1normal" value="<?php echo htmlentities($row_pack001articulo['strSeo1Ru'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td align="right" valign="top" nowrap="nowrap">Descripción S.E.O Ru:</td>
<td><textarea name="strSeo2Ru" cols="32" rows="3" class="a1normal"><?php echo htmlentities($row_pack001articulo['strSeo2Ru'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
</tr>

<tr valign="baseline">
  <td align="right" valign="top" nowrap="nowrap">Keywords S.E.O Ru:</td>
  <td><textarea name="strSeo3Ru" cols="32" rows="3" class="a1normal"><?php echo htmlentities($row_pack001articulo['strSeo3Ru'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
</tr>
    
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** -->

<tr valign="baseline">
<td colspan="2" align="right" nowrap="nowrap" bgcolor="#93a9a6">&nbsp;</td>
</tr>

<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 

<tr valign="baseline">
<td nowrap="nowrap" align="right">Posición:</td>
<td><input name="strPosicion" type="text" class="a1mini" value="<?php echo htmlentities($row_pack001articulo['strPosicion'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">Activa:</td>
<td><select name="strActiva" class="a1mini">
<option value="si" <?php if (!(strcmp("si", htmlentities($row_pack001articulo['strActiva'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>si</option>
<option value="no" <?php if (!(strcmp("no", htmlentities($row_pack001articulo['strActiva'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>no</option>
</select></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">ver Novedad:</td>
<td><select name="strNovedad" class="a1mini">
<option value="si" <?php if (!(strcmp("si", htmlentities($row_pack001articulo['strActiva'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>si</option>
<option value="no" <?php if (!(strcmp("no", htmlentities($row_pack001articulo['strActiva'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>no</option>
</select></td>
</tr>

<tr valign="baseline">
<td nowrap="nowrap" align="right">&nbsp;</td>
<td>&nbsp;</td>
</tr>

<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** --> 
<!--**************************************************************************************************** -->     
<tr valign="baseline">
<td nowrap="nowrap" align="right">&nbsp;</td>
<td><input type="submit" class="a1boton" value="Actualizar registro" /></td>
</tr>
</table>
<input type="hidden" name="MM_update" value="form1" />
<input type="hidden" name="idArticulo" value="<?php echo $row_pack001articulo['idArticulo']; ?>" />
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
 mysqli_free_result($usuarios);

 mysqli_free_result($favicon);

 mysqli_free_result($anagrama);

 mysqli_free_result($pack001subcategoria);

 mysqli_free_result($pack001articulo);

 mysqli_free_result($categoria);
?>
