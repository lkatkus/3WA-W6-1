<?php
session_start();


$selectedTheme = $_GET['theme'];

$_SESSION['theme'] = $selectedTheme;

header('Location: /index.php');
exit;