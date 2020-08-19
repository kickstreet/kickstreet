<?php

$datos["js_custom"] = isset($js_custom) ? $js_custom : [];

$header = view('plantilla/back_end/header');
$footer = view('plantilla/back_end/footer', $datos);
$body = view('back_end/'.$contenido); 

echo $header.$body.$footer;
