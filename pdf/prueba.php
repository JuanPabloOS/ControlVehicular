<?php 
require('barcode.php');
$filepath="";
$text="Hola";
$size=40;
$orientation="horizontal";
$code_type="Code128";
$print=true;
$sizefactor="1";
$imagen=barcode( $filepath, $text, $size, $orientation, $code_type, $print, $sizefactor );
echo $imagen;
?>
