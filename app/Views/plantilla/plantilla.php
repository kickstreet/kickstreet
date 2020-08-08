<?php

$header = view('plantilla/front_end/header');
$sidebar = view('plantilla/front_end/sidebar');
$footer = view('plantilla/front_end/footer');
$productos = view('front_end/'.$contenido); 

if( $sidebar==1 )
	echo $header.$sidebar.$productos.$footer;
else
	echo $header.$productos.$footer;