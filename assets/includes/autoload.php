<?php

spl_autoload_register(function($class){
    require "./assets/classes/$class.php";
});