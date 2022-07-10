<?php 
//$url= "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url= $_SERVER['REQUEST_URI'];
//echo $url;
?>
<!--*****************************************************************************************************************-->
<!--*****************************************************************************************************************-->
<?php $urluno = "/";?>
<?php $urldos = "/gabrielle/";?>
<?php $urltres = "/bienvenido.html";?>
<?php $urlocho = "/gabrielle/bienvenido.html";?>
<?php $urlcuatro = strpos($url,'/es/');?>
<?php $urlcinco = strpos($url,'/en/');?>
<?php $urlseis = strpos($url,'/ru/');?>
<?php $urlsiete = strpos($url,'/fr/');?>
<!--*****************************************************************************************************************-->
<!--*****************************************************************************************************************-->
<?php function EnvioCorreoHTML($destinatario, $contenido, $asunto)
{
$mensaje = '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="100%" bgcolor="#ffffff">
    <img src="http://www.gabriellemobiliario.com/email.png" width="400" /></td>
  </tr>
  <tr>
    <td bgcolor="#cbad67">&nbsp;Solicitud de Cancelación de suscripción Trébol.</td>
  </tr>
  <tr>
    <td><p> 
    ';
	$mensaje.= $contenido;
	$mensaje.='</p></td>
  </tr>
  <tr>

	<br /><a href="http://www.gabriellemobiliario.com/admin3274"><strong>Admin Web</strong></a></td>
  </tr>
</table>
</body>
</html>';

// Para enviar correo HTML, la cabecera Content-type debe definirse
$cabeceras  = 'MIME-Version: 1.0' . "\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\n";
// Cabeceras adicionales
$cabeceras .= 'From: bajasweb@gabriellemobiliario.com' . "\n";
$cabeceras .= 'Bcc: bajasweb@gabriellemobiliario.com' . "\n";

$destinatario = "bajas@gabriellemobiliario.com";
mail($destinatario, $asunto, $mensaje, $cabeceras);
//echo $mensaje;	
}
?>
<!--*****************************************************************************************************************-->
<!--*****************************************************************************************************************-->
<?php function EnvioCorreoHTMLcatalogo($destinatario, $contenido, $asunto)
{
$mensaje = '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="100%" bgcolor="#8a9a9f" class="tipografiagothicgr">
    Trébol Mobiliario
	</td>
  </tr>
  <tr>
    <td bgcolor="#b7c8cc">
	&nbsp;El sueño de crecer día a día.<br>
	mobiliario para toda una infancia adaptada para cada etapa de su edad.
	</td>
  </tr>
  <tr>
    <td><p> 
    ';
	$mensaje.= $contenido;
	$mensaje.='</p></td>
  </tr>
  <tr>
    <td>Gracias por su visita<br>
	En breve contestaremos su petición.<br>
	Gracias de antemano,<br>
	Un saludo<br>
	<br /><a href="http://www.gabriellemobiliario.com.com"><strong>www.gabriellemobiliario.com</strong></a></td>
  </tr>
</table>
</body>
</html>';

// Para enviar correo HTML, la cabecera Content-type debe definirse
$cabeceras  = 'MIME-Version: 1.0' . "\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\n";
// Cabeceras adicionales
$cabeceras .= 'From: catalogo@gabriellemobiliario.com' . "\n";
//$cabeceras .= 'Bcc: catalogo@gabriellemobiliario.com' . "\n";

//Selección correos aviso email
$emailuno = "comunicacion@gabriellemobiliario.com";
//$emaildos = "ventas@gabriellemobiliario.com";

$destinatario = "$emailuno;";
mail($destinatario, $asunto, $mensaje, $cabeceras);
//echo $mensaje;	
}
?>
<!--*****************************************************************************************************************-->
<!--*****************************************************************************************************************-->
<?php function EnvioCorreoHTMLdistribuidor($destinatario, $contenido, $asunto)
{
$mensaje = '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="100%" bgcolor="#8a9a9f" class="tipografiagothicgr">
    Trébol Mobiliario
	</td>
  </tr>
  <tr>
    <td bgcolor="#b7c8cc">
	&nbsp;El sueño de crecer día a día.<br>
	mobiliario para toda una infancia adaptada para cada etapa de su edad.
	</td>
  </tr>
  <tr>
    <td><p> 
    ';
	$mensaje.= $contenido;
	$mensaje.='</p></td>
  </tr>
  <tr>
    <td>Gracias por su visita<br>
	En breve contestaremos su petición.<br>
	Gracias de antemano,<br>
	Un saludo<br>
	<br /><a href="http://www.gabriellemobiliario.com"><strong>www.gabriellemobiliario.com</strong></a></td>
  </tr>
</table>
</body>
</html>';

	// Para enviar correo HTML, la cabecera Content-type debe definirse
	$cabeceras  = 'MIME-Version: 1.0' . "\n";
	$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\n";
	// Cabeceras adicionales
	$cabeceras .= 'From: distribuidor@gabriellemobiliario.com' . "\n";
	//$cabeceras .= 'Bcc: distribuidor@gabriellemobiliario.com' . "\n";
	
	//Selección correos aviso email
	$emailuno = "comunicacion@gabriellemobiliario.com";
	//$emaildos = "pedidos@gabriellemobiliario.com";

	$destinatario = "$emailuno;";
	mail($destinatario, $asunto, $mensaje, $cabeceras);
//echo $mensaje;	
}
?>

<!--*****************************************************************************************************************-->
<!--*****************************************************************************************************************-->
<?php function EnvioCorreoHTMLpuntoventa($destinatario, $contenido, $asunto)
{
$mensaje = '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="100%" bgcolor="#8a9a9f" class="tipografiagothicgr">
    Trébol Mobiliario
	</td>
  </tr>
  <tr>
    <td bgcolor="#b7c8cc">
	&nbsp;El sueño de crecer día a día.<br>
	mobiliario para toda una infancia adaptada para cada etapa de su edad.
	</td>
  </tr>
  <tr>
    <td><p> 
    ';
	$mensaje.= $contenido;
	$mensaje.='</p></td>
  </tr>
  <tr>
    <td>Gracias por su visita<br>
	En breve contestaremos su petición.<br>
	Gracias de antemano,<br>
	Un saludo<br>
	<br /><a href="http://www.gabriellemobiliario.com"><strong>www.gabriellemobiliario.com</strong></a></td>
  </tr>
</table>
</body>
</html>';

	// Para enviar correo HTML, la cabecera Content-type debe definirse
	$cabeceras  = 'MIME-Version: 1.0' . "\n";
	$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\n";
	// Cabeceras adicionales
	$cabeceras .= 'From: puntodeventa@gabriellemobiliario.com' . "\n";
	//$cabeceras .= 'Bcc: puntodeventa@gabriellemobiliario.com' . "\n";
	
	//Selección correos aviso email
	$emailuno = "comunicacion@gabriellemobiliario.com";
	//$emaildos = "pedidos@gabriellemobiliario.com";

	$destinatario = "$emailuno;";
	mail($destinatario, $asunto, $mensaje, $cabeceras);
	//echo $mensaje;
	
} ?>

<!--***************************************************************************************************************************************-->
<!--***************************************************************************************************************************************-->
<?php function date_es($formato="F j, Y",$fecha=0) { 
    if (ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $fecha,$partes)) { 
        if (checkdate($partes[2],$partes[3],$partes[1])) { 
            $fecha=strtotime($fecha); 
        } else { 
            return(-1); 
        } 
    } elseif ($fecha==0) { 
        $fecha=time(); 
    } 
    $dias=array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"); 
    $dias_c=array("Dom","Lun","Mar","Mie","Jue","Vie","Sab"); 
    $meses=array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
    $meses_c=array("","Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"); 

    $valores=explode("|",date ("a|A|B|d|D|F|g|G|h|H|i|I|j|l|L|m|M|n|O|r|s|S|t|T|U|w|W|Y|y|z|Z",$fecha)); 
    $claves= array ("a","A","B","d","D","F","g","G","h","H","i","I","j","l","L","m","M","n","O","r","s","S","t","T","U","w","W","Y","y","z","Z"); 
    for ($i=0;$i<count($claves);$i++) { 
        $conv[$claves[$i]]=$valores[$i]; 
    } 
    $conv["D"]=$dias_c[$conv["w"]]; 
    $conv["l"]=$dias[$conv["w"]]; 
    $conv["F"]=$meses[$conv["n"]]; 
    $conv["M"]=$meses_c[$conv["n"]]; 
    $conv["r"]=$conv["D"].", ".$conv["d"]." ".$conv["M"]." ".$conv["Y"]." ".$conv["H"].":".$conv["i"].":".$conv["s"]." ".$conv["O"]; 
    $conv["S"]="o"; 
    $escape='\\\\\\'; 
    $escapado=0; 
    $f=$formato; 
    $res=""; 
    for ($t=0;$t<strlen($formato);$t++) { 
        if ($escapado==1) { 
            $res.=$f{$t}; 
            $escapado=0; 
        } else { 
            if($f{$t}==$escape) { 
                $escapado=1; 
            } else { 
                if (isset($conv[$f[$t]])){ 
                    $res.=$conv[$f[$t]]; 
                } else { 
                    $res.=$f{$t}; 
                } 
            } 
        } 
    } 
    return $res; 
} ?> 