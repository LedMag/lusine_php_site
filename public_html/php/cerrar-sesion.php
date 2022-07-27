<?php require_once('../Connections/gabrielle.php'); ?>
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
$query_favicon = "SELECT * FROM tblfavicon ORDER BY tblfavicon.idFavicon ASC";
$favicon =  mysqli_query($gabrielle, $query_favicon) or die( mysqli_error($gabrielle));
$row_favicon =  mysqli_fetch_assoc($favicon);
$totalRows_favicon =  mysqli_num_rows($favicon);

  mysqli_select_db($gabrielle, $database_gabrielle);
$query_anagrama = "SELECT * FROM tblanagrama ORDER BY tblanagrama.idAnagrama DESC";
$anagrama =  mysqli_query($gabrielle, $query_anagrama) or die( mysqli_error($gabrielle));
$row_anagrama =  mysqli_fetch_assoc($anagrama);
$totalRows_anagrama =  mysqli_num_rows($anagrama);
 session_start(); 
session_destroy();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/login.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>cerrando sesion</title>
<link rel="shortcut icon" href="<?php echo $row_favicon['strEnlace']; ?>" />
<meta name="robots" content="noindex" />
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<style type="text/css">
@import url("webfonts/AGENCYB/stylesheet.css");
@import url("../webfonts/AGENCYB/stylesheet.css");
@import url("../webfonts/dax_light/stylesheet.css");
@import url("../webfonts/Ghotic/stylesheet.css");

img {border:none;}
@media screen and (max-device-width: 480px) {
#general {
	width: 100%;
	z-index: 1;
	font-size: 11px;
	padding-top: 5%;
}

.espacioweb {
	width: 30%;
	margin-left: 35%;
	Webkit-border-radius: 10px;
	border-radius: 20px;
	background-color: #FFF;
	font-size: 10px;

	}

}
@media screen and (max-device-width: 800px) {
#general {
	width: 100%;
	z-index: 1;
	font-size: 11px;
	padding-top: 5%;
}
.espacioweb {
	width: 30%;
	margin-left: 35%;
	Webkit-border-radius: 10px;
	border-radius: 20px;
	background-color: #FFF;
	font-size: 10px;

	}
	}


#general {
	z-index: 1;
	width: 100%;
	margin-top: 5%;
	}
.espacioweb {
	overflow: auto;
	width: 20%;
	margin-left: 40%;
	Webkit-border-radius: 10px;
	border-radius: 20px;
	background-color: #FFF;

	}
.cabecera {
	background-color: #FFFFFF;
}
.anagrama {}
.titulo1 {
	font-family: Ghotic;
	font-size: 115%;
	letter-spacing: 1px;
	text-align: center;
}
.contenido1 {
	width: 80%;
	margin-left: 10%;
}
.contenido2{
	width: 80%;
	margin-left: 10%;
	font-family: Ghotic;
	text-align: center;
	font-size: 105%;
	line-height: 135%;
	margin-top: 2%;
	margin-bottom: 2%;
}
.contenido2 a:link {text-decoration: none; color: #000;}
.contenido2 a:visited {text-decoration: none; color: #000;}
.contenido2 a:hover {
	text-decoration: none;
	color: #b7c8cc;	
}

.contenido2 a:active {text-decoration: none; color: #000;}
.separador1 {
	background-color: #CCC;
	height: 1px;
	margin-top: 2px;
	margin-bottom: 2px;
}
.separadorfooter {
	background-color: #b7c8cc;
	height: 4px;
}
.footer {
	font-family: Ghotic;
	text-align: center;
	font-size: 116%;
	padding-top: 3%;
	padding-bottom: 3%;
	background-color: #FFFFFF;
	color: #CCC;
	letter-spacing: 1px;
}
.footer a:link {
	text-decoration: none;
	color: #000;
	letter-spacing: 3px;
	font-family: AGENCYB;
	font-size: 116%;
}
.footer a:visited {
	text-decoration: none;
	color: #000;
	letter-spacing: 3px;
	font-family: AGENCYB;
	font-size: 116%;
}
.footer a:hover {
	text-decoration: none;
	color: #FFFFFF;
	font-family: AGENCYB;
	opacity: 0.6;
	text-shadow: 0.1em 0.1em 0.2em #000;
	letter-spacing: 3px;
	font-family: AGENCYB;
	font-size: 116%;
}

.footer a:active {
	text-decoration: none;
	color: #000;
	
	letter-spacing: 2px;
	letter-spacing: 3px;
	font-family: AGENCYB;
	font-size: 116%;
}
.interiorformulario {
	font-family: Ghotic;
	font-size: 100%;
	color: #666;
	padding-top: 6px;
	padding-bottom: 4px;
	Webkit-border-radius: 10px;
	border-radius: 10px;
	background-image: url(../gif/template/fondotextoverde5.png);
	text-align: center;
}
.centrartexto {
	text-align: center;
	width: 100%;
	margin-left: 4em;
}
.tipogotic {
	font-family: Ghotic;
	font-size: 100%;
}
.c1normal {
	width: 68%;
	font-family: Ghotic;
	font-size: 104%;
}
.c1medio {
	width: 58%;
	font-family: Ghotic;
	font-size: 104%;
}


body {
	background-image: url(../gif/fondos/wavegrid.png);
	background-color: #F0F0F0;
}
</style>
</head>

<body>
<div id="general">
<div class="espacioweb">
<!--*********** INICIO WEB ***********-->
<!--*********** ANAGRAMA LOGIN ***********-->
<div class="cabecera">
<div class="anagrama">
<!-- InstanceBeginEditable name="imagen" -->

<img src="../admin3274/anagrama/img/<?php echo $row_anagrama['strImagenLogin']; ?>" width="100%" />

<!-- InstanceEndEditable -->
</div>
</div>
<!--*********** TITULO EMPRESA ***********-->
<div class="separador1"></div>
<div class="titulo1">
<!-- InstanceBeginEditable name="titulo1" -->
CERRAR SESIÓN CLIENTE


<!-- InstanceEndEditable -->
</div>

<!--*********** CONTENIDO 1 ***********-->
<div class="separador1"></div>
<div class="contenido1">
<!-- InstanceBeginEditable name="contenido1" -->
<span class="centrartexto">
.....................................
</span>
<!-- InstanceEndEditable -->
</div>
<!--*********** CONTENIDO 2 ***********-->
<div class="separador1"></div>
<div class="contenido2">
<!-- InstanceBeginEditable name="contenido2" -->
Su sesión se ha cerrado con éxito<br />
<a href="../admin3274/index.php">volver CLIENTE</a> - <a href="../bienvenido.html">inicio WEB</a><!-- InstanceEndEditable -->
</div>
<!--*********** FOOTER ***********-->

<div class="separador1"></div>
<div class="separadorfooter"></div>
<div class="footer">
  created by <a href="http://www.carloscarrascoandreu.com" title="created by" target="_blank">DGW</a> </div>
<!--*********** FINAL WEB ***********-->
</div>
</div>
</body>
<!-- InstanceEnd --></html>
<?php
 mysqli_free_result($favicon);

 mysqli_free_result($anagrama);
?>
