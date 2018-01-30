<?php

    // GET DATA
    $newTitle=$_GET['formTitle'];
    $newDescription=$_GET['formDescription'];
    $newDeadline=$_GET['formDeadline'];
    $newPriority=$_GET['formPriority'];

    // CONVERT DATE TO TIMESTAMP
    $newYear =  intval(substr($newDeadline,0,4));
    $newMonth = intval(substr($newDeadline,5,2));
    $newDay = intval(substr($newDeadline,8,2));

    $newDeadline = mktime(0,0,0,$newMonth,$newDay,$newYear);

    // CREATE NEW WORD ARRAY
    if($newTitle == null || $newDescription == null || $newDeadline = null || $newPriority = null){
        header("Location:index.php?state=new&submit=error");
    }
    else{
        $newTodo = [
            'title'=>htmlspecialchars($newTitle),
            'description'=>htmlspecialchars($newDescription),
            'deadline'=>htmlspecialchars($newDeadline),
            'priority'=>htmlspecialchars($newPriority),
            'completion'=>0
        ];

        // WRITE DATA INTO LIST.CSV
        $write = fopen('csv/list.csv','a');

        fputcsv($write,[
            $newTodo['title'],
            $newTodo['description'],
            $newTodo['deadline'],
            $newTodo['priority'],
            $newTodo['completion']
        ]);

        fclose($write);

        // REDIRECT TO LIST DISPLAY
        header("Location:index.php?state=display&page=1");
        die();
    }

?>
