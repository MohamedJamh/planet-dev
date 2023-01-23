<?php

spl_autoload_register(function($class){
    require $_SERVER['DOCUMENT_ROOT']."/planet-dev/assets/classes/".$class.".php";
});