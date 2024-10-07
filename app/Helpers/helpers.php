<?php

if (!function_exists("ep")) {
    function ep($data)
    {
       echo "<pre>";
	   print_r($data);
	    echo "</pre>";
		
    }
}
if (!function_exists("p")) {
    function p($data)
    {
       echo "<pre>";
	   print_r($data);
	    echo "</pre>";
		die();
    }
}
if (!function_exists("vd")) {
    function vd($data)
    {     
	   var_dump($data);	   
    }
}

if (!function_exists("filePath")) {
    function filePath($data)
    {
      return public_path().'/storage/'.$data;
    }
}