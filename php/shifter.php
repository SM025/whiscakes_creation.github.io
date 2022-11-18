<?php 
    $characters = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9');
    $key1 = 7;
    $key2 = 5;
    $key3 = 27;

    function encrypt($password){
        $word = "";              
        
        
        for($i = 0; $i < strlen($password); $i++){
            $char = $password[$i]; //sets every character of the entered password to $char

            $char = charShift($char, $GLOBALS['characters'], $GLOBALS['key1']); //shifts the letter for the first time
            $char = charShift($char, $GLOBALS['characters'], $GLOBALS['key2']); //shifts the letter for the second time
            $char = charShift($char, $GLOBALS['characters'], $GLOBALS['key3']); //shifts the letter for the third time

            $word = $word.$char;
        }
        return $word;
    }

    function charShift($char, $characters, $key){
        $arrlen = 62;

        for($i = 0; $i < $arrlen; $i++){
            if($char == $characters[$i]){
                $key += $i; 

                if($key >= $arrlen){
                    $key = $key - $arrlen;
                }

                $char = $characters[$key];
                break;
            }
        }
        return $char;
    }
    
    function decrypt($password){
        $word = "";              

        for($i = 0; $i < strlen($password); $i++){
            $char = $password[$i]; //sets every character of the entered password to $char

            $char = charUnshift($char, $GLOBALS['characters'], $GLOBALS['key1']); //unshifts the letter for the first time
            $char = charUnshift($char, $GLOBALS['characters'], $GLOBALS['key2']); //unshifts the letter for the second time
            $char = charUnshift($char, $GLOBALS['characters'], $GLOBALS['key3']); //unshifts the letter for the third time

            $word = $word.$char;
        }
        return $word;
    }
    
    function charUnshift($char, $characters, $key){
        $arrlen = 62;
        for($i = 0; $i < $arrlen; $i++){
            if($char == $characters[$i]){
                $i -= $key; 
                if($i < 0){
                    $i = $i + $arrlen;
                }
                $char = $characters[$i];
                break;
            }
        }
        return $char;
    }


?>