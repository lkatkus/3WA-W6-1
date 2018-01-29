<?php

    // ADD TO TO-DO TO LIST
    function listCreate($list){

        $write = fopen('csv/list.csv','w');

        foreach ($list as $i) {
            fputcsv($write,[
                $i['title'],
                $i['description'],
                $i['deadline'],
                $i['priority'],
                $i['completion']
            ]);
        }

        fclose($write);

    }

?>
