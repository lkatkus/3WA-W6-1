<?php

include ('list-create.php');

$sortDirectrion = $_GET['sort'];

// READING CURRENT LIST
$read = fopen('csv/list.csv','r');
$i = 0;
while(($a = fgetcsv($read)) !== false){
    $arrGet[$i] = [
        'title' => $a[0],
        'description' => $a[1],
        'deadline' => $a[2],
        'priority' => $a[3],
        'completion' => $a[4]
    ];
    $i += 1;
}
fclose($read); /*MUST BE CLOSED AFTER OPENING */

// READING REFERENCE ARRAY
$arrSort = [];
foreach($arrGet as $i){
    // PUSHING DATA TO USE FOR SORTING
    $arrSort[]=$i['deadline'];
};

// SORTING BASE ARRAY
if($sortDirectrion == 'low'){
    array_multisort($arrSort,SORT_ASC,$arrGet);
}else{
    array_multisort($arrSort,SORT_DESC,$arrGet);
};

listCreate($arrGet);
session_start();
header("Location:index.php?state=display&page=".$_SESSION['page']."&objectsPerPage=".$_SESSION['objectsPerPage']);
die();

?>
