<?php
spl_autoload_register('autoload');
function autoload($classname)

{
     //echo     $fullpath = __DIR__ . "/../classes/" . $classname . ".class.php";
     $fullpath = __DIR__ . "/../classes/" . $classname . ".class.php";
    //die();
    
    if (!file_exists($fullpath)) {
       return false;
    }
    include_once $fullpath;
}



?>