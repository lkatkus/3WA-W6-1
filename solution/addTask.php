<?php
session_start();
include 'functions.php';

addTask();

header('Location: index.php');
exit;