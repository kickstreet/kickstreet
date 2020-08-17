<?php

$header = view('plantilla/front_end/header');
$sidebar = view('plantilla/front_end/sidebar');
$footer = view('plantilla/front_end/footer');
$productos = view('front_end/'.$contenido); 

if( isset($barra) ){
	if( $barra==0 )
		echo $header.$productos.$footer;
	else
		echo $header.$sidebar.$productos.$footer;
}else{
	echo $header.$productos.$footer;
}