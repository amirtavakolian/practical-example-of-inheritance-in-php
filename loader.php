<?php 

function myLoader($class){
  if(file_exists($class.".php")){
    require ($class.".php");
  }
}


spl_autoload_register("myLoader");