<?php 
//$url2= "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url= $_SERVER['REQUEST_URI'];
//echo $url;
//echo $url2;
?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<div class="usuario">
<?php $clase = $_SESSION['MM_UserGroup'];
//echo $clase;
?>
</div>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php //$urluno = "/gabrielle/admin3274/index.php";?>
<?php $urluno = "/admin3274/index.php";?>
<!--***********************************************************************************************-->
<!--************************************ CONTENIDOS ADMINISTRACIÓN ********************************-->
<!--***********************************************************************************************-->
<?php if ($url != $urluno) { // Show if recordset not empty ?>

<div class="menuprincipaltitulo">
MENÚ WEB PRINCIPAL
</div>

<div class="menuprincipal">

<?php if ($clase == "webmaster") { // Show if recordset not empty ?>
<a href="../usuarios/usuarios_lista.php" title="Gestión Usuarios">- Administración Usuarios</a><br>
<?php } // Show if recordset not empty ?>

<?php //if ($clase == "webmaster" or $clase == "administrador" or $clase == "usuario") { // Show if recordset not empty ?>
<!--<a href="../usuarios/registros_lista_admin.php" title="Registros Web">- Registros Web</a><br>-->
<?php //} // Show if recordset not empty ?>

<?php if ($clase == "webmaster" or $clase == "administrador") { // Show if recordset not empty ?>
<a href="../anagrama/anagrama_lista.php" title="Imagen Corporativa">- Imagen Corporativa</a><br>
<?php } // Show if recordset not empty ?>


<?php if ($clase == "webmaster" or $clase == "administrador") { // Show if recordset not empty ?>
<a href="../datosempresa/datos_empresa_lista.php" title="Datos Empresa">- Datos de Empresa</a><br>
<?php } // Show if recordset not empty ?>

<?php if ($clase == "webmaster" or $clase == "administrador" or $clase == "usuario") { // Show if recordset not empty ?>
<a href="../seo/seo_lista.php" title="Posicionamiento">- Posicionamiento SEO</a><br>
<?php } // Show if recordset not empty ?>

<?php if ($clase == "webmaster") { // Show if recordset not empty ?>
<a href="../favicon/favicon_lista.php" title="Icono favicon">- Enlace Favicon</a><br>
<?php } // Show if recordset not empty ?>

<?php if ($clase == "webmaster" or $clase == "administrador") { // Show if recordset not empty ?>
<a href="../iconosweb/iconosweb_lista.php" title="Iconos Navegación">- Iconos Web</a><br>
<?php } // Show if recordset not empty ?>




<?php if ($clase == "webmaster" or $clase == "administrador" or $clase == "usuario") { // Show if recordset not empty ?>
<a href="http://www.carloscarrascoandreu.net/roundcube" title="Bandeja Correo" target="_blank">- Bandeja Correo</a><br />
<?php } // Show if recordset not empty ?>

<?php if ($clase == "webmaster" or $clase == "administrador" or $clase == "usuario") { // Show if recordset not empty ?>
<a href="../../php/cerrar-sesion.php" title="Cerrar Sesión">- Cerrar Sesión</a>
<?php } // Show if recordset not empty ?>
</div>
<?php } // Show if recordset not empty ?>
<!--***********************************************************************************************-->
<!--******************************** INICIO ADMINISTRACION ****************************************-->
<!--***********************************************************************************************-->
<?php if ($url == "$urluno") { // Show if recordset not empty ?>

<div class="menuprincipaltitulo">
MENÚ WEB PRINCIPAL
</div>
<div class="menuprincipal">

<?php if ($clase == "webmaster") { // Show if recordset not empty ?>
<a href="usuarios/usuarios_lista.php" title="Gestión Usuarios Melones">- Administración Usuarios</a><br>
<?php } // Show if recordset not empty ?>

<?php //if ($clase == "webmaster" or $clase == "administrador" or $clase == "usuario") { // Show if recordset not empty ?>
<!--<a href="usuarios/registros_lista_admin.php" title="Registros Web">- Registros Web</a><br>-->
<?php //} // Show if recordset not empty ?>

<?php if ($clase == "webmaster" or $clase == "administrador") { // Show if recordset not empty ?>
<a href="anagrama/anagrama_lista.php" title="Imagen Corporativa">- Imagen Corporativa</a><br>
<?php } // Show if recordset not empty ?>


<?php if ($clase == "webmaster" or $clase == "administrador") { // Show if recordset not empty ?>
<a href="datosempresa/datos_empresa_lista.php" title="Datos Empresa">- Datos de Empresa</a><br>
<?php } // Show if recordset not empty ?>

<?php if ($clase == "webmaster" or $clase == "administrador" or $clase == "usuario") { // Show if recordset not empty ?>
<a href="seo/seo_lista.php" title="Posicionamiento">- Posicionamiento SEO</a><br>
<?php } // Show if recordset not empty ?>

<?php if ($clase == "webmaster") { // Show if recordset not empty ?>
<a href="favicon/favicon_lista.php" title="Icono favicon">- Enlace Favicon</a><br>
<?php } // Show if recordset not empty ?>

<?php if ($clase == "webmaster" or $clase == "administrador") { // Show if recordset not empty ?>
<a href="iconosweb/iconosweb_lista.php" title="Iconos Navegación">- Iconos Web</a><br>
<?php } // Show if recordset not empty ?>



<?php if ($clase == "webmaster" or $clase == "administrador" or $clase == "usuario") { // Show if recordset not empty ?>
<a href="http://www.carloscarrascoandreu.net/roundcube" title="Bandeja Correo" target="_blank">- Bandeja Correo</a><br />
<?php } // Show if recordset not empty ?>

<?php if ($clase == "webmaster" or $clase == "administrador" or $clase == "usuario") { // Show if recordset not empty ?>
<a href="../php/cerrar-sesion.php" title="Cerrar Sesión">- Cerrar Sesión</a>
<?php } // Show if recordset not empty ?>

</div> 
<?php } // Show if recordset not empty ?>