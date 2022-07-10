<div class="resolucion">
<?php
if(!isset($_GET['ancho']) && !isset($_GET['alto']) )
{
echo "<script language=\"JavaScript\">
 
document.location=\"$PHP_SELF?ancho=\"+screen.width+\"&alto=\"+screen.height;


//-->
</script>";
}
else {
if(isset($_GET['ancho']) && isset($_GET['alto'])) {
// Resolución de pantalla
 echo "".$_GET['ancho']; 
 }
 else {
 // Error en la detección
 echo "No se ha podido detectar la resolución de pantalla";
 }
}?>

</div>