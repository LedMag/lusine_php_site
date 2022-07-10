<?php 
//$url= "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url= $_SERVER['REQUEST_URI'];
//echo $url;
?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php //$urluno = "/gabrielle/admin3274/index.php";?>
<?php $urluno = "/admin3274/index.php";?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<div class="usuario">
<?php $clase = $_SESSION['MM_UserGroup'];
?>
<?php if ($clase == "webmaster" or $clase == "administrador" or $clase == "usuario") { // Show if recordset not empty ?>
<?php } // Show if recordset not empty ?>
</div>

<!--************************************ CONTENIDOS ADMINISTRACIÓN ********************************-->

<?php if ($url != $urluno) { // Show if recordset not empty ?>

<script src="../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../../SpryAssets/SpryMenuBarHorizontal2.css" rel="stylesheet" type="text/css">
<ul id="MenuBar1" class="MenuBarHorizontal">

<li><a class="MenuBarItemSubmenu" href="#">Gestión Productos</a>
<ul>
<!--<li><a href="../pack001/pack001categoria_lista.php" title="• Listado Categorías">• Listado Categorías</a></li>-->
<li><a href="../pack001/pack001subcategoria_lista.php" title="• Listado Subcategorías">• Listado Subcategorías</a></li>
<li><a href="../pack001/pack001articulo_lista.php" title="• Listado Artículos">• Listado Artículos</a></li>
</ul>
</li>
  
<li><a href="#" class="MenuBarItemSubmenu">Gestión Imágenes</a>
<ul>
<li><a href="../slider001/slider001_lista.php" title="Gestión Slider">Gestión Slider</a></li>
</ul>
</li>
  
<li><a href="#" class="MenuBarItemSubmenu">Gestión Textos</a>
<ul>
<li><a href="../textos/textos_lista.php" title="Textos Web">Textos Web</a></li>
</ul>
</li>
  
</ul>
&nbsp; <script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
<?php } // Show if recordset not empty ?>


<!--************************************ CONTENIDOS ADMINISTRACIÓN ********************************-->



<?php if ($url == $urluno) { // Show if recordset not empty ?>

<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal2.css" rel="stylesheet" type="text/css">
<ul id="MenuBar1" class="MenuBarHorizontal">

<li><a class="MenuBarItemSubmenu" href="#">Gestión Productos</a>
<ul>
<li><a href="pack001/pack001categoria_lista.php" title="• Listado Categorías">• Listado Categorías</a></li>
<li><a href="pack001/pack001subcategoria_lista.php" title="• Listado Subcategorías">• Listado Subcategorías</a></li>
<li><a href="pack001/pack001articulo_lista.php" title="• Listado Artículos">• Listado Artículos</a></li>
</ul>
</li>

<li><a href="#" class="MenuBarItemSubmenu">Gestión Imágenes</a>
<ul>
<li><a href="slider001/slider001_lista.php" title="Gestión Slider">Gestión Slider</a></li>
</ul>
</li>

<li><a href="#" class="MenuBarItemSubmenu">Gestión Textos</a>
<ul>
<li><a href="textos/textos_lista.php" title="Textos Web">Textos Web</a></li>
</ul>
</li>

   
</ul>
&nbsp; <script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
<?php } // Show if recordset not empty ?>




