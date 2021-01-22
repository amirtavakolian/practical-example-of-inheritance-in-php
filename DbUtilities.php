<?php 

class DbUtilities {

  
  public static function getKeys($value) {
    return implode(",", array_keys($value));
    
  }
  
  public static function makeQuery($value){
    $cc = "";
    $keys = array_keys($value);
    foreach($keys as $ff){
      $cc .=  "'" . $value[$ff] . "'" . ",";
    }
    return (rtrim($cc, ","));
    
  }
  
}