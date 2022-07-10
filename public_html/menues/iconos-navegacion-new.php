<?php 
//$url= "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url= $_SERVER['REQUEST_URI'];
//echo $url;
?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php $urluno = "/";?>
<?php $urldos = "/gabrielle/";?>
<?php $urltres = "/bienvenido.html";?>
<?php $urlocho = "/gabrielle/bienvenido.html";?>
<?php $urlcuatro = strpos($url,'/es/');?>
<?php $urlcinco = strpos($url,'/en/');?>
<?php $urlseis = strpos($url,'/ru/');?>
<?php $urlsiete = strpos($url,'/fr/');?>
<?php $urlweb = "http://www.abanicosluciegabrielle.com";?>

<?php $urlcuatro = strpos($url,'/es/');?>
<?php $urlcinco = strpos($url,'/en/');?>
<?php $urlseis = strpos($url,'/ru/');?>
<?php $urlsiete = strpos($url,'/fr/');?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if ($url == $urlcero or $url == $urluno or $url == $urldos or $url == $urltres or $url == $urlocho) { // Show if recordset not empty ?>
      
<?php do { ?>
<?php if ($row_iconosweb['strActivacion'] == "si") { // Show if recordset not empty ?>
<a href="<?php echo $row_iconosweb['strEnlace1']; ?>" onmouseout="MM_swapImgRestore()" title="<?php echo $row_iconosweb['strNombre']; ?>" onmouseover="MM_swapImage('botonweb<?php echo $row_iconosweb['idIconos']; ?>','','admin3274/iconosweb/img/<?php echo $row_iconosweb['strImagen2']; ?>',1)" <?php echo $row_iconosweb['strExterno']; ?>><img src="admin3274/iconosweb/img/<?php echo $row_iconosweb['strImagen']; ?>" width="10%" id="botonweb<?php echo $row_iconosweb['idIconos']; ?>" /></a>
<?php } // Show if recordset not empty ?>
<?php } while ($row_iconosweb = mysql_fetch_assoc($iconosweb)); ?>



<a href="javascript:void(0);" onclick="window.open(uf,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Facebook"><img alt="Compartir en facebook" class="fb"  src="<?php echo $urlweb ?>/gif/social/facebook-long.png" title="Compartir en facebook" width="8%" /></a>
<a href="javascript:void(0);" onclick="window.open(ug,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Google+"><img alt="Compartir en google+" class="glg"  src="<?php echo $urlweb ?>/gif/social/google-long.png" title="Compartir en google+" width="8%" /></a>
<a href="javascript:void(0);" onclick="window.open(ut,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Twitter"><img alt="Compartir en twitter" class="twtr"  src="<?php echo $urlweb ?>/gif/social/twitter-long.png" title="Compartir en twitter" width="8%" /></a>
<a href="javascript:void(0);" onclick="window.open(up,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Pinterest"><img alt="Compartir en pinterest" class="pnt"  src="<?php echo $urlweb ?>/gif/social/pinterest-long.png" title="Compartir en pinterest" width="8%" /></a>
<a href="javascript:void(0);" onclick="window.open(ul,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en linkedin+"><img alt="Compartir en likedin" class="lkdn"  src="<?php echo $urlweb ?>/gif/social/linkedin-long.png" title="Compartir en Likedin" width="8%" /></a>
<a href="javascript:void(0);" data-action=”share/whatsapp/share” onclick="window.open(uw,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en WhatsApp+"><img alt="Compartir en WhatsApp " class="lkdn"  src="<?php echo $urlweb ?>/gif/social/whatsapp-long.png" title="Compartir en WhatsApp " width="8%" /></a>&nbsp;&nbsp;

<style>#btrs{ text-align:center;}.lkdn:hover, .fb:hover, .twtr:hover, .glg:hover,.pnt:hover {-webkit-transform: rotate(360deg);-moz-transform: rotate(360deg);transform: rotate(360deg);transition:all .3s ease-out;-moz-transition: all .5s;-webkit-transition: all .5s;-o-transition: all .5s;}.lkdn, .fb, .twtr, .glg, .pnt {transition:all .3s ease-out;-moz-transition: all .5s;-webkit-transition: all .5s;-o-transition: all .5s;margin-left:1px; /* espacio entre cada boton */}</style> 
<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== strpos($url,'/es/')) { // Show if recordset not empty ?>

<?php do { ?>
<?php if ($row_iconosweb['strActivacion'] == "si") { // Show if recordset not empty ?>
<a href="<?php echo $row_iconosweb['strEnlace2']; ?>" onmouseout="MM_swapImgRestore()" title="<?php echo $row_iconosweb['strNombre']; ?>" onmouseover="MM_swapImage('botonweb<?php echo $row_iconosweb['idIconos']; ?>','','../admin3274/iconosweb/img/<?php echo $row_iconosweb['strImagen2']; ?>',1)" <?php echo $row_iconosweb['strExterno']; ?>><img src="../admin3274/iconosweb/img/<?php echo $row_iconosweb['strImagen']; ?>" width="10%" id="botonweb<?php echo $row_iconosweb['idIconos']; ?>" /></a>
<?php } // Show if recordset not empty ?>
<?php } while ($row_iconosweb = mysql_fetch_assoc($iconosweb)); ?>




<a href="javascript:void(0);" onclick="window.open(uf,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Facebook"><img alt="Compartir en facebook" class="fb"  src="<?php echo $urlweb ?>/gif/social/facebook-long.png" title="Compartir en facebook" width="8%" /></a>
<a href="javascript:void(0);" onclick="window.open(ug,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Google+"><img alt="Compartir en google+" class="glg"  src="<?php echo $urlweb ?>/gif/social/google-long.png" title="Compartir en google+" width="8%" /></a>
<a href="javascript:void(0);" onclick="window.open(ut,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Twitter"><img alt="Compartir en twitter" class="twtr"  src="<?php echo $urlweb ?>/gif/social/twitter-long.png" title="Compartir en twitter" width="8%" /></a>
<a href="javascript:void(0);" onclick="window.open(up,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Pinterest"><img alt="Compartir en pinterest" class="pnt"  src="<?php echo $urlweb ?>/gif/social/pinterest-long.png" title="Compartir en pinterest" width="8%" /></a>
<a href="javascript:void(0);" onclick="window.open(ul,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en linkedin+"><img alt="Compartir en likedin" class="lkdn"  src="<?php echo $urlweb ?>/gif/social/linkedin-long.png" title="Compartir en Likedin" width="8%" /></a>
<a href="javascript:void(0);" data-action=”share/whatsapp/share” onclick="window.open(uw,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en WhatsApp+"><img alt="Compartir en WhatsApp " class="lkdn"  src="<?php echo $urlweb ?>/gif/social/whatsapp-long.png" title="Compartir en WhatsApp " width="8%" /></a>&nbsp;&nbsp;

<style>#btrs{ text-align:center;}.lkdn:hover, .fb:hover, .twtr:hover, .glg:hover,.pnt:hover {-webkit-transform: rotate(360deg);-moz-transform: rotate(360deg);transform: rotate(360deg);transition:all .3s ease-out;-moz-transition: all .5s;-webkit-transition: all .5s;-o-transition: all .5s;}.lkdn, .fb, .twtr, .glg, .pnt {transition:all .3s ease-out;-moz-transition: all .5s;-webkit-transition: all .5s;-o-transition: all .5s;margin-left:1px; /* espacio entre cada boton */}</style>
<?php } // Show if recordset not empty ?> 
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== strpos($url,'/en/')) { // Show if recordset not empty ?>

<?php do { ?>
<?php if ($row_iconosweb['strActivacion'] == "si") { // Show if recordset not empty ?>
<a href="<?php echo $row_iconosweb['strEnlace2']; ?>" onmouseout="MM_swapImgRestore()" title="<?php echo $row_iconosweb['strNombreEn']; ?>" onmouseover="MM_swapImage('botonweb<?php echo $row_iconosweb['idIconos']; ?>','','../admin3274/iconosweb/img/<?php echo $row_iconosweb['strImagen2']; ?>',1)" <?php echo $row_iconosweb['strExterno']; ?>><img src="../admin3274/iconosweb/img/<?php echo $row_iconosweb['strImagen']; ?>" width="10%" id="botonweb<?php echo $row_iconosweb['idIconos']; ?>" /></a>
<?php } // Show if recordset not empty ?>
<?php } while ($row_iconosweb = mysql_fetch_assoc($iconosweb)); ?>



<a href="javascript:void(0);" onclick="window.open(uf,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Facebook"><img alt="Compartir en facebook" class="fb"  src="<?php echo $urlweb ?>/gif/social/facebook-long.png" title="Compartir en facebook" width="8%" /></a>
<a href="javascript:void(0);" onclick="window.open(ug,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Google+"><img alt="Compartir en google+" class="glg"  src="<?php echo $urlweb ?>/gif/social/google-long.png" title="Compartir en google+" width="8%" /></a>
<a href="javascript:void(0);" onclick="window.open(ut,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Twitter"><img alt="Compartir en twitter" class="twtr"  src="<?php echo $urlweb ?>/gif/social/twitter-long.png" title="Compartir en twitter" width="8%" /></a>
<a href="javascript:void(0);" onclick="window.open(up,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Pinterest"><img alt="Compartir en pinterest" class="pnt"  src="<?php echo $urlweb ?>/gif/social/pinterest-long.png" title="Compartir en pinterest" width="8%" /></a>
<a href="javascript:void(0);" onclick="window.open(ul,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en linkedin+"><img alt="Compartir en likedin" class="lkdn"  src="<?php echo $urlweb ?>/gif/social/linkedin-long.png" title="Compartir en Likedin" width="8%" /></a>
<a href="javascript:void(0);" data-action=”share/whatsapp/share” onclick="window.open(uw,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en WhatsApp+"><img alt="Compartir en WhatsApp " class="lkdn"  src="<?php echo $urlweb ?>/gif/social/whatsapp-long.png" title="Compartir en WhatsApp " width="8%" /></a>&nbsp;&nbsp;

<style>#btrs{ text-align:center;}.lkdn:hover, .fb:hover, .twtr:hover, .glg:hover,.pnt:hover {-webkit-transform: rotate(360deg);-moz-transform: rotate(360deg);transform: rotate(360deg);transition:all .3s ease-out;-moz-transition: all .5s;-webkit-transition: all .5s;-o-transition: all .5s;}.lkdn, .fb, .twtr, .glg, .pnt {transition:all .3s ease-out;-moz-transition: all .5s;-webkit-transition: all .5s;-o-transition: all .5s;margin-left:1px; /* espacio entre cada boton */}</style> 
<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== strpos($url,'/ru/')) { // Show if recordset not empty ?>

<?php do { ?>
<?php if ($row_iconosweb['strActivacion'] == "si") { // Show if recordset not empty ?>
<a href="<?php echo $row_iconosweb['strEnlace4']; ?>" onmouseout="MM_swapImgRestore()" title="<?php echo $row_iconosweb['strNombreRu']; ?>" onmouseover="MM_swapImage('botonweb<?php echo $row_iconosweb['idIconos']; ?>','','../admin3274/iconosweb/img/<?php echo $row_iconosweb['strImagen2']; ?>',1)" <?php echo $row_iconosweb['strExterno']; ?>><img src="../admin3274/iconosweb/img/<?php echo $row_iconosweb['strImagen']; ?>" width="10%" id="botonweb<?php echo $row_iconosweb['idIconos']; ?>" /></a>
<?php } // Show if recordset not empty ?>
<?php } while ($row_iconosweb = mysql_fetch_assoc($iconosweb)); ?>



<a href="javascript:void(0);" onclick="window.open(uf,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Facebook"><img alt="Compartir en facebook" class="fb"  src="<?php echo $urlweb ?>/gif/social/facebook-long.png" title="Compartir en facebook" width="8%" /></a>
<a href="javascript:void(0);" onclick="window.open(ug,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Google+"><img alt="Compartir en google+" class="glg"  src="<?php echo $urlweb ?>/gif/social/google-long.png" title="Compartir en google+" width="8%" /></a>
<a href="javascript:void(0);" onclick="window.open(ut,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Twitter"><img alt="Compartir en twitter" class="twtr"  src="<?php echo $urlweb ?>/gif/social/twitter-long.png" title="Compartir en twitter" width="8%" /></a>
<a href="javascript:void(0);" onclick="window.open(up,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en Pinterest"><img alt="Compartir en pinterest" class="pnt"  src="<?php echo $urlweb ?>/gif/social/pinterest-long.png" title="Compartir en pinterest" width="8%" /></a>
<a href="javascript:void(0);" onclick="window.open(ul,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en linkedin+"><img alt="Compartir en likedin" class="lkdn"  src="<?php echo $urlweb ?>/gif/social/linkedin-long.png" title="Compartir en Likedin" width="8%" /></a>
<a href="javascript:void(0);" data-action=”share/whatsapp/share” onclick="window.open(uw,&quot;gplusshare&quot;,&quot;toolbar=0,status=0,width=548,height=325&quot;);" rel="nofollow" title="Compartir en WhatsApp+"><img alt="Compartir en WhatsApp " class="lkdn"  src="<?php echo $urlweb ?>/gif/social/whatsapp-long.png" title="Compartir en WhatsApp " width="8%" /></a>&nbsp;&nbsp;

<style>#btrs{ text-align:center;}.lkdn:hover, .fb:hover, .twtr:hover, .glg:hover,.pnt:hover {-webkit-transform: rotate(360deg);-moz-transform: rotate(360deg);transform: rotate(360deg);transition:all .3s ease-out;-moz-transition: all .5s;-webkit-transition: all .5s;-o-transition: all .5s;}.lkdn, .fb, .twtr, .glg, .pnt {transition:all .3s ease-out;-moz-transition: all .5s;-webkit-transition: all .5s;-o-transition: all .5s;margin-left:1px; /* espacio entre cada boton */}</style> 
<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
