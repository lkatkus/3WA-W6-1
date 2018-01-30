<?php
session_start();
include ("functions.php");

// $multipleIds = $_POST["taskId"];


// echo "<pre>";
// die(var_dump($multipleIds));
// echo "</pre>";

// for ($i=0; $i < count($multipleIds) ; $i++) {


// }

$multipleIds = $_POST["taskId"];
	deleteTask($multipleIds);


header("Location: index.php");
exit;


?>