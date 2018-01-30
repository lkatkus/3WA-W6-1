<?php
session_start();
include 'functions.php';
$index = $_GET['taskID'];

editTask($index);



// var_dump($_SESSION['message']);

header("Location: /index.php");
exit;