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

  mysqli_select_db($gabrielle, $database_gabrielle);
$query_pack001subcategoria = "SELECT * FROM tblpack001subcategoria ORDER BY tblpack001subcategoria.strPosicion ASC";
$pack001subcategoria =  mysqli_query($query_pack001subcategoria, $gabrielle) or die( mysqli_error($gabrielle));
$row_pack001subcategoria =  mysqli_fetch_assoc($pack001subcategoria);
$totalRows_pack001subcategoria =  mysqli_num_rows($pack001subcategoria);

  mysqli_select_db($gabrielle, $database_gabrielle);
$query_pack001articulo = "SELECT * FROM tblpack001articulo ORDER BY tblpack001articulo.strPosicion ASC, tblpack001articulo.intSubCategoria  ASC";
$pack001articulo =  mysqli_query($query_pack001articulo, $gabrielle) or die( mysqli_error($gabrielle));
$row_pack001articulo =  mysqli_fetch_assoc($pack001articulo);
$totalRows_pack001articulo =  mysqli_num_rows($pack001articulo);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/adminewv3.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Admin web gabrielle</title>
<link rel="shortcut icon" href="<?php echo $row_favicon['strEnlace']; ?>" />
<meta name="robots" content="noindex" />


<?php function ObtenerNombreSubCategoria001($identificador)
{

	global $database_gabrielle, $gabrielle;
	  mysqli_select_db($gabrielle, $database_gabrielle);
	$query_ConsultaFuncion = sprintf("SELECT strNombre FROM tblpack001subcategoria WHERE idSubCategoria = %s", $identificador);
	$ConsultaFuncion =  mysqli_query($query_ConsultaFuncion, $gabrielle) or die( mysqli_error($gabrielle));
	$row_ConsultaFuncion =  mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion =  mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['strNombre']; 
	 mysqli_free_result($ConsultaFuncion);
}?>


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
<!-- InstanceBeginEditable name="titulocontenidoprincipal" -->LISTADO ARTÍCULOS PACK001<!-- InstanceEndEditable -->
</td>
</tr>
<tr>
  <td colspan="2" align="right" class="tipografiagothic" style="height:1%">
  <!-- InstanceBeginEditable name="subtitulocontenido" -->

  <a href="pack001articulo_add.php"><strong>Añadir</strong> Articulo PACK001</a>

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

<?php /*?><div class="botonbuscador">
<form action="pack001articulo_lista_resultado.php" method="get"><input name="FBuscar" type="text" />
<input name="" type="submit" value="Ir" /></form><?php */?>



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
<div class="graficos">
	<div class="separadorarlineas"></div>
    
<?php if ($row_pack001articulo['idArticulo']== NULL) { // Show if recordset empty ?>
NO EXISTEN PRODUCTOS EN ESTE MOMENTO...
<?php } // Show if recordset empty ?>    
    
    
<?php if ($row_pack001articulo['idArticulo']!= NULL) { // Show if recordset empty ?>   

<?php do { ?>
<?php if ($row_pack001articulo['strActiva'] == "no") { // Show if recordset not empty ?>
COLECCIÓN: <strong><?php echo ObtenerNombreSubCategoria001($row_pack001articulo['intSubCategoria']); ?></strong> - <?php echo $row_pack001articulo['intCat']; ?> | <?php echo $row_pack001articulo['idArticulo']; ?><BR />
NOMBRE: <strong><?php echo $row_pack001articulo['strNombre']; ?></strong>
    <div class=""> <a href="pack001articulo_edit.php?recordID=<?php echo $row_pack001articulo['idArticulo']; ?>"><img src="img/articulo/<?php echo $row_pack001articulo['strImagen']; ?>" width="40%" /></a><br />
	Posición: <strong><?php echo $row_pack001articulo['strPosicion']; ?></strong><br />
    Mostrar artículo: <strong><?php echo $row_pack001articulo['strActiva']; ?></strong><br />
    Mostrar novedad: <strong><?php echo $row_pack001articulo['strNovedad']; ?></strong>
    </div>
    <a href="pack001articulo_delete.php?recordID=<?php echo $row_pack001articulo['idArticulo']; ?>">borrar artículo</a>
<div class="separadorarlineas"></div>
    <?php } // Show if recordset empty ?>
	<?php } while ($row_pack001articulo =  mysqli_fetch_assoc($pack001articulo)); ?>
 <?php } // Show if recordset empty ?>    
</div>
</div>

<div class="tipografiagothicdcha">
<a href="pack001articulo_lista.php">MOSTRAS ARTÍCULOS ACTIVOS</a>
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
?>
