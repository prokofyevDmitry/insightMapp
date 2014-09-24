<?php

$string = 'Dmitry';
echo $string .'<br>	';
$string = ltrim($string);
echo $string .'<br>	';
$string = rtrim($string);
echo $string .'<br>	';



$string = preg_replace('.-.', '', $string);
$string = preg_replace('. .', '', $string);
echo $string .'<br>	';



if(preg_match('#^[A-z]+$#',$string))
echo 'ok';
else echo 'ko';