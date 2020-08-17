<?php

$header = view('plantilla/back_end/header');
$footer = view('plantilla/back_end/footer');
$body = view('back_end/'.$contenido); 

echo $header.$body.$footer;
