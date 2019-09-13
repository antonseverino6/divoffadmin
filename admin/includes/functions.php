<?php 

    function redirect($location) {
        header("Location: $location");
    }
    
    function utf8_for_pdf($string) {
    	return iconv('UTF-8', 'windows-1252', $string);
    }
        