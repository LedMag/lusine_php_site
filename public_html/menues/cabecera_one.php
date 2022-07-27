<?php 
$url= $_SERVER['REQUEST_URI'];
?>
<?php $urluno = "/";?>
<?php $urldos = "/gabrielle/";?>
<?php $urltres = "/index.php";?>
<?php $urlcero = "/bienvenido.html";?>
<?php $urlocho = "/gabrielle/bienvenido.html";?>
<?php $urlcuatro = strpos($url,'/es/');?>
<?php $urlcinco = strpos($url,'/en/');?>
<?php $urlseis = strpos($url,'/ru/');?>
<?php $urlsiete = strpos($url,'/fr/');?>
<?php if ($url == $urlcero or $url == $urluno or $url == $urldos or $url == $urltres or $url == $urlocho) { // Show if recordset not empty ?>
<div class="ocultarphone">
<table width="100%" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="68%"><img src="admin3274/anagrama/img/<?php echo $row_anagrama['strImagen']; ?>" width="50%" /></td>
    <td width="28%">    
    <table width="100%" border="0" class="menuidioma">
  <tr>
    <td align="right"><?php include("menues/menu-idioma.php"); ?></td>
  </tr>
  <tr>
    <td align="right">

    <a href="mailto:<?php echo $row_contacto['strEmail']; ?>" title="mándame un email"><?php echo $row_contacto['strEmail']; ?></a></td>
  </tr>
  <tr>
    <td align="right"><?php echo $row_contacto['strTelefono']; ?></td>
  </tr>
</table>   
    </td>
    <td width="2%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
<div class="ocultarpc">
<table width="96%" border="0" align="center">
<tr>
<td><img src="gif/phone/logotipo.jpg" width="100%"></td>
</tr>
</table>
<table width="96%" border="0" align="center">
<tr>
<td align="center">
<a href="mailto:<?php echo $row_contacto['strEmail']; ?>" title="mándame un email"><?php echo $row_contacto['strEmail']; ?></a>
</td>
</tr>
</table>
<table width="96%" border="0" align="center">
<tr>
<td align="center">
<?php echo $row_contacto['strTelefono']; ?>
</td>
</tr>
</table>
<table width="96%" border="0" align="center">
<tr>
<td align="center">
<?php include("menues/menu-idioma.php"); ?>
</td>
</tr>
</table>
</div>
<?php } // Show if recordset not empty ?>
<?php if (false !== strpos($url,'/es/')) { // Show if recordset not empty ?>
<div class="ocultarphone">
<table width="100%" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="68%"><img src="../admin3274/anagrama/img/<?php echo $row_anagrama['strImagen']; ?>" width="50%" /></td>
    <td width="28%">    
    <table width="100%" border="0" class="menuidioma">
  <tr>
    <td align="right"><?php include("../menues/menu-idioma.php"); ?></td>
  </tr>
  <tr>
    <td align="right">

    <a href="mailto:<?php echo $row_contacto['strEmail']; ?>" title="mándame un email"><?php echo $row_contacto['strEmail']; ?></a></td>
  </tr>
  <tr>
    <td align="right"><?php echo $row_contacto['strTelefono']; ?></td>
  </tr>
</table>   
    </td>
    <td width="2%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
<div class="ocultarpc">
<table width="96%" border="0" align="center">
<tr>
<td><img src="../gif/phone/logotipo.jpg" width="100%"></td>
</tr>
</table>
<table width="96%" border="0" align="center">
<tr>
<td align="center">
<a href="mailto:<?php echo $row_contacto['strEmail']; ?>" title="mándame un email"><?php echo $row_contacto['strEmail']; ?></a>
</td>
</tr>
</table>
<table width="96%" border="0" align="center">
<tr>
<td align="center">
<?php echo $row_contacto['strTelefono']; ?>
</td>
</tr>
</table>
<table width="96%" border="0" align="center">
<tr>
<td align="center">
<?php include("../menues/menu-idioma.php"); ?>
</td>
</tr>
</table>
</div>

<?php } // Show if recordset not empty ?>
<?php if (false !== strpos($url,'/en/')) { // Show if recordset not empty ?>
<div class="ocultarphone">
<table width="100%" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="68%"><img src="../admin3274/anagrama/img/<?php echo $row_anagrama['strImagen']; ?>" width="50%" /></td>
    <td width="28%">    
    <table width="100%" border="0" class="menuidioma">
  <tr>
    <td align="right"><?php include("../menues/menu-idioma.php"); ?></td>
  </tr>
  <tr>
    <td align="right">

    <a href="mailto:<?php echo $row_contacto['strEmail']; ?>" title="mándame un email"><?php echo $row_contacto['strEmail']; ?></a></td>
  </tr>
  <tr>
    <td align="right"><?php echo $row_contacto['strTelefono']; ?></td>
  </tr>
</table>   
    </td>
    <td width="2%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
<div class="ocultarpc">
<table width="96%" border="0" align="center">
<tr>
<td><img src="../gif/phone/logotipo.jpg" width="100%"></td>
</tr>
</table>
<table width="96%" border="0" align="center">
<tr>
<td align="center">
<a href="mailto:<?php echo $row_contacto['strEmail']; ?>" title="mándame un email"><?php echo $row_contacto['strEmail']; ?></a>
</td>
</tr>
</table>
<table width="96%" border="0" align="center">
<tr>
<td align="center">
<?php echo $row_contacto['strTelefono']; ?>
</td>
</tr>
</table>
<table width="96%" border="0" align="center">
<tr>
<td align="center">
<?php include("../menues/menu-idioma.php"); ?>
</td>
</tr>
</table>
</div>


<?php } // Show if recordset not empty ?>
<?php if (false !== strpos($url,'/ru/')) { // Show if recordset not empty ?>
<div class="ocultarphone">
<table width="100%" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="68%"><img src="../admin3274/anagrama/img/<?php echo $row_anagrama['strImagen']; ?>" width="50%" /></td>
    <td width="28%">    
    <table width="100%" border="0" class="menuidioma">
  <tr>
    <td align="right"><?php include("../menues/menu-idioma.php"); ?></td>
  </tr>
  <tr>
    <td align="right">

    <a href="mailto:<?php echo $row_contacto['strEmail']; ?>" title="mándame un email"><?php echo $row_contacto['strEmail']; ?></a></td>
  </tr>
  <tr>
    <td align="right"><?php echo $row_contacto['strTelefono']; ?></td>
  </tr>
</table>   
    </td>
    <td width="2%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
<div class="ocultarpc">
<table width="96%" border="0" align="center">
<tr>
<td><img src="../gif/phone/logotipo.jpg" width="100%"></td>
</tr>
</table>
<table width="96%" border="0" align="center">
<tr>
<td align="center">
<a href="mailto:<?php echo $row_contacto['strEmail']; ?>" title="mándame un email"><?php echo $row_contacto['strEmail']; ?></a>
</td>
</tr>
</table>
<table width="96%" border="0" align="center">
<tr>
<td align="center">
<?php echo $row_contacto['strTelefono']; ?>
</td>
</tr>
</table>
<table width="96%" border="0" align="center">
<tr>
<td align="center">
<?php include("../menues/menu-idioma.php"); ?>
</td>
</tr>
</table>
</div>



<?php } // Show if recordset not empty ?>