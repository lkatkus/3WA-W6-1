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
$arrSortDeadline = [];
foreach($arrGet as $i){
    // PUSHING DATA TO USE FOR SORTING
    $arrSortDeadline[]=$i['deadline'];
};

$arrSortPriority = [];
foreach($arrGet as $i){
    // PUSHING DATA TO USE FOR SORTING
    $arrSortPriority[]=$i['priority'];
};

// SORTING BASE ARRAY
if($sortDirectrion == 'low'){
    array_multisort($arrSortDeadline,SORT_ASC,$arrGet);
}elseif($sortDirectrion == 'high'){
    array_multisort($arrSortDeadline,SORT_DESC,$arrGet);
};

if($sortDirectrion == 'optional'){
    array_multisort($arrSortPriority,SORT_ASC,SORT_NATURAL,$arrGet);
    echo 'lol';
}elseif($sortDirectrion == 'urgent'){
    array_multisort($arrSortPriority,SORT_DESC,SORT_NATURAL,$arrGet);
};


listCreate($arrGet);

session_start();
header("Location:index.php?state=display&page=".$_SESSION['page']."&objectsPerPage=".$_SESSION['objectsPerPage']);
die();

?>
