<?php require_once('../Connections/gabrielle.php'); ?>
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

mysql_select_db($database_gabrielle, $gabrielle);
$query_anagrama = "SELECT * FROM tblanagrama ORDER BY tblanagrama.idAnagrama DESC";
$anagrama = mysql_query($query_anagrama, $gabrielle) or die(mysql_error());
$row_anagrama = mysql_fetch_assoc($anagrama);
$totalRows_anagrama = mysql_num_rows($anagrama);

mysql_select_db($database_gabrielle, $gabrielle);
$query_favicon = "SELECT * FROM tblfavicon ORDER BY tblfavicon.idFavicon ASC";
$favicon = mysql_query($query_favicon, $gabrielle) or die(mysql_error());
$row_favicon = mysql_fetch_assoc($favicon);
$totalRows_favicon = mysql_num_rows($favicon);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['textfield'])) {
  $loginUsername=$_POST['textfield'];
  $password=$_POST['textfield2'];
  $MM_fldUserAuthorization = "strLevel";
  $MM_redirectLoginSuccess = "index.php";
  $MM_redirectLoginFailed = "login-error.php";
  $MM_redirecttoReferrer = true;
  mysql_select_db($database_gabrielle, $gabrielle);
  	
  $LoginRS__query=sprintf("SELECT strNombre, strPassword, strLevel FROM tblusuario WHERE strNombre=%s AND strPassword=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString(md5($password), "text"));
   
  $LoginRS = mysql_query($LoginRS__query, $gabrielle) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'strLevel');
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/login.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Login gabrielle</title>
<link rel="shortcut icon" href="<?php echo $row_favicon['strEnlace']; ?>" />
<meta name="robots" content="noindex" />
<meta name="Language" content="Spanish">
<meta name="Author" content="gabrielle Carrasco Andreu"/>

<meta name="viewport" content="maximum-scale=1">

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
<img src="anagrama/img/<?php echo $row_anagrama['strImagenLogin']; ?>" width="100%" />
<!-- InstanceEndEditable -->
</div>
</div>
<!--*********** TITULO EMPRESA ***********-->
<div class="separador1"></div>
<div class="titulo1">
<!-- InstanceBeginEditable name="titulo1" -->
LOGIN CLIENTE<!-- InstanceEndEditable -->
</div>

<!--*********** CONTENIDO 1 ***********-->
<div class="separador1"></div>
<div class="contenido1">
<!-- InstanceBeginEditable name="contenido1" -->

  <div class="interiorformulario">
   <form ACTION="<?php echo $loginFormAction; ?>" id="form1" name="form1" method="POST">
    <p>
      <label for="textfield"></label>
      Email: 
      <input name="textfield" type="text" class="c1normal" id="textfield" size="23" />
    </p>
    <p>
      
      <label for="textfield2"></label>
      Password: 
      <input name="textfield2" type="password" class="c1medio" id="textfield2" size="18" />
    </p>
    <p>
      <input name="button" type="submit" class="tipogotic" id="button" value="Enviar" />
    </p>
   </form>
  </div>

<!-- InstanceEndEditable -->
</div>
<!--*********** CONTENIDO 2 ***********-->
<div class="separador1"></div>
<div class="contenido2">
<!-- InstanceBeginEditable name="contenido2" -->
Introduce tus DATOS de<br />
LOGIN para acceder<br />
o <br />
&lt; <a href="../index.php">Volver Web &gt;</a> <!-- InstanceEndEditable -->
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
mysql_free_result($anagrama);

mysql_free_result($favicon);
?>
