<?php 
require "loader.php";

$tasksObj = new Task();
$result = $tasksObj->find(2);

var_dump($result);