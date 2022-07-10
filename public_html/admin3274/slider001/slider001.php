<?php 
//$url= "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url= $_SERVER['REQUEST_URI'];
//echo $url;
?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php $urluno = "/";?>
<?php $urldos = "/gabrielle/";?>
<?php $urltres = "/index.php";?>
<?php $cero = "/bienvenido.html";?>
<?php $urlocho = "/gabrielle/bienvenido.html";?>

<?php $urlcuatro = strpos($url,'/es/');?>
<?php $urlcinco = strpos($url,'/en/');?>
<?php $urlseis = strpos($url,'/ru/');?>
<?php $urlsiete = strpos($url,'/fr/');?>
<?php $urlnueve = strpos($url,'/it/');?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if ($url == $cero or $url == $urluno or $url == $urldos or $url == $urltres or $url == $urlocho) { // Show if recordset not empty ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>slider</title>
<link rel="stylesheet" href="themes/light/light2.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<style>
.slider-wrapper{
}
</style>
</head>
<body>

<div class="slider-wrapper theme-light">
<div id="slider" >
<?php do { ?>

<?php if ($row_slider001['strActiva'] != "no") { // Show if recordset empty ?>
<img src="admin3274/slider001/img/<?php echo $row_slider001['strImagen']; ?>" width="100%" alt="Imagen publicidad servicios y productos de Trébol Mobiliario" />
<?php } // Show if recordset not empty ?>

<?php } while ($row_slider001 = mysql_fetch_assoc($slider001)); ?>
</div>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
$('#slider').nivoSlider ({ 
            //effect: 'random',
            slices: 20,
            boxCols: 8,
            boxRows: 4,
            animSpeed: 400,
            pauseTime: 5000,
            startSlide: 0,
            directionNav:false,
            controlNav: true,
            controlNavThumbs: false,
            pauseOnHover: true,
            manualAdvance: false,
            prevText: 'Prev',
            nextText: 'Next',
            randomStart: false,
        });
    });
    </script>
</div>
</body>
</html>
<?php } // Show if recordset not empty ?>
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<!--****************************************************************************************-->
<?php if (false !== $urlcuatro or false !== $urlcinco or false !== $urlseis or false !== $urlsiete or false !== $urlnueve) { // Show if recordset not empty ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>slider</title>
<link rel="stylesheet" href="../themes/light/light2.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/nivo-slider.css" type="text/css" media="screen" />
<style>
.slider-wrapper{
}
</style>
</head>
<body>

<div class="slider-wrapper theme-light">
<div id="slider" >
<?php do { ?>
<?php if ($row_slider001['strActiva'] != "no") { // Show if recordset empty ?>
<img src="../admin3274/slider001/img/<?php echo $row_slider001['strImagen']; ?>" width="100%" alt="Imagen publicidad servicios y productos de Trébol Mobiliario" />
<?php } // Show if recordset not empty ?>
<?php } while ($row_slider001 = mysql_fetch_assoc($slider001)); ?>
</div>
<script src="../js/jquery.min.js" type="text/javascript"></script>
<script src="../js/jquery.nivo.slider.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
$('#slider').nivoSlider ({ 
            //effect: 'random',
            slices: 20,
            boxCols: 8,
            boxRows: 4,
            animSpeed: 400,
            pauseTime: 5000,
            startSlide: 0,
            directionNav:false,
            controlNav: true,
            controlNavThumbs: false,
            pauseOnHover: true,
            manualAdvance: false,
            prevText: 'Prev',
            nextText: 'Next',
            randomStart: false,
        });
    });
    </script>
</div>
</body>
</html>
<?php } // Show if recordset not empty ?>