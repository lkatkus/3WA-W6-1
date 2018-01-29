<?php

    include('list-create.php');

    $deleteKey=$_GET['key'];


    // READING THE LIST.CSV

    $arrGet = [];

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

    // DELETING TO-DO
    unset($arrGet[$deleteKey]);

    // PUSHING NEW ARRAY TO CSV
    listCreate($arrGet);

    // REDIRECT
    header("Location:index.php?state=display&amp;page=1");
    die();

?>
