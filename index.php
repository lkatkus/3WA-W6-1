<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>MAKING TIME</title>
    </head>
    <body>
        <?php
            // echo mktime(0,0,0,1,29,2017).'<br>';
            // echo mktime(0,0,1,1,29,2017).'<br>';
            // echo mktime(0,1,0,1,29,2017).'<br>';

            // echo 'converting time back<br>';
            $date = mktime(0,0,0,10,03,1987);
            // echo date('Y M d',$date);

            // echo '<br>sorting arrays<br>';
            $newArr = [
                ['name' => 'Zan', 'age' => 3],
                ['name' => 'Zan', 'age' => 2],
                ['name' => 'An', 'age' => 10],
                ['name' => 'An', 'age' => 8],
                ['name' => 'Ca', 'age' => 5],
                ['name' => 'Ban', 'age' => 20],
                ['name' => 'Dan', 'age' => 1],
                ['name' => 'Man', 'age' => 2],
                ['name' => 'Xan', 'age' => 3]
            ];


            // echo $newArr[0]['name'];

            // foreach($newArr as $i){
            //     echo $i['name'].'<br>';
            // };

            // CREATING SORTING ARRAY
            $sortArr = [];
            foreach($newArr as $i){
                // PUSHING DATA TO USE FOR SORTING
                $sortArr[]=$i['name'];
            };

            // echo '<br>DUMP SORT ARRAY<br>';
            // var_dump($sortArr);

            // echo '<br>SORTING<br>';
            array_multisort($sortArr,SORT_ASC,$newArr,SORT_ASC);

            // echo '<br>SORTING<br>';
            var_dump($newArr);
            die(); /* REQUIRED FOR VAR_MASTERPIECE CHROME EXTENTION TO WORK */



        ?>
    </body>
</html>
