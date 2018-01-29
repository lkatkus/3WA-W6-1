<?php

    // DEFAULT TO-DO LIST
    $list = [
        [
            'title'=>'Apples are green',
            'description'=>'Bacon ipsum',
            'deadline'=>'21321321321',
            'priority'=>'Urgent',
            'completion'=>0
        ],
        [
            'title'=>'Roses are orange',
            'description'=>'Chicken tenderloin',
            'deadline'=>'545464',
            'priority'=>'Unimporant',
            'completion'=>0
        ],
        [
            'title'=>'Oranges are blue',
            'description'=>'Ipsum tenderloin',
            'deadline'=>'4654654654',
            'priority'=>'Moderate',
            'completion'=>0
        ],
        [
            'title'=>'Blue',
            'description'=>'Ipsum tenderloin',
            'deadline'=>'122231',
            'priority'=>'Urgent',
            'completion'=>0
        ],
        [
            'title'=>'Green',
            'description'=>'Ipsum tenderloin',
            'deadline'=>'454546454564',
            'priority'=>'Unimporant',
            'completion'=>0
        ],
        [
            'title'=>'Are blue',
            'description'=>'Ipsum tenderloin',
            'deadline'=>'55565656',
            'priority'=>'Moderate',
            'completion'=>0
        ],
        [
            'title'=>'Blue',
            'description'=>'Ipsum tenderloin',
            'deadline'=>'554454554',
            'priority'=>'Urgent',
            'completion'=>0
        ],
        [
            'title'=>'Green',
            'description'=>'Ipsum tenderloin',
            'deadline'=>'4654654654',
            'priority'=>'Unimporant',
            'completion'=>0
        ],
        [
            'title'=>'Are blue',
            'description'=>'Ipsum tenderloin',
            'deadline'=>'4654654654',
            'priority'=>'Moderate',
            'completion'=>0
        ],
        [
            'title'=>'Blue',
            'description'=>'Ipsum tenderloin',
            'deadline'=>'554454554',
            'priority'=>'Urgent',
            'completion'=>0
        ],
        [
            'title'=>'Are blue',
            'description'=>'Ipsum tenderloin',
            'deadline'=>'4654654654',
            'priority'=>'Moderate',
            'completion'=>0
        ],
        [
            'title'=>'Blue',
            'description'=>'Ipsum tenderloin',
            'deadline'=>'554454554',
            'priority'=>'Urgent',
            'completion'=>0
        ],
        [
            'title'=>'Green',
            'description'=>'Ipsum tenderloin',
            'deadline'=>'4654654654',
            'priority'=>'Unimporant',
            'completion'=>0
        ],
        [
            'title'=>'Are blue',
            'description'=>'Ipsum tenderloin',
            'deadline'=>'4654654654',
            'priority'=>'Moderate',
            'completion'=>0
        ],
        [
            'title'=>'Blue',
            'description'=>'Ipsum tenderloin',
            'deadline'=>'554454554',
            'priority'=>'Urgent',
            'completion'=>0
        ],
        [
            'title'=>'Are blue',
            'description'=>'Ipsum tenderloin',
            'deadline'=>'4654654654',
            'priority'=>'Moderate',
            'completion'=>0
        ],
        [
            'title'=>'Blue',
            'description'=>'Ipsum tenderloin',
            'deadline'=>'554454554',
            'priority'=>'Urgent',
            'completion'=>0
        ]
    ];

    // ADD DEFAULT TO-DO TO CSV
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

    // REDIRECT
    header("Location:index.php?state=display&page=1");
    die();

?>
