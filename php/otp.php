<?php
    function rand_code($len = 5){
     $min_lenght= 0;
     $max_lenght = 100;
     $bigL = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
     $smallL = "abcdefghijklmnopqrstuvwxyz";
     $number = "0123456789";
     $bigB = str_shuffle($bigL);
     $smallS = str_shuffle($smallL);
     $numberS = str_shuffle($number);
     $subA = substr($bigB,0,5);
     $subB = substr($bigB,6,5);
     $subC = substr($bigB,10,5);
     $subD = substr($smallS,0,5);
     $subE = substr($smallS,6,5);
     $subF = substr($smallS,10,5);
     $subG = substr($numberS,0,5);
     $subH = substr($numberS,6,5);
     $subI = substr($numberS,10,5);
     $RandCode1 = str_shuffle($subA.$subD.$subI.$subF.$subC.$subG);
     $RandCode2 = str_shuffle($RandCode1);
     $RandCode = $RandCode1.$RandCode2;
     
     if ($len>$min_lenght && $len<$max_lenght)
     {
     $CodeEX = substr($RandCode,0,$len);
     }
     
     else
     {
     $CodeEX = $RandCode;
     }
     
     return $CodeEX;
    }
?>