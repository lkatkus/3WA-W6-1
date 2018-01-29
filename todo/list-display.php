<?php
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

    $j = 0;

    function checkStatus($currentDeadline,$currentStatus,$currentPriority){
        if($currentDeadline < mktime()){
            echo 'taskLate ';
        }
        if($currentStatus == 1){
            echo 'taskFinished ';
        }

        // if($currentPriority == 'Urgent'){
        //     echo 'taskUrgent ';
        // }elseif($currentPriority == 'Moderate'){
        //     echo 'taskModerate ';
        // }else{
        //     echo 'taskUnimporant ';
        // }
    }
?>

<table class="table text-center align-middle">
    <thead class="thead-dark">
        <tr>
            <th>Num.</th>
            <th>Title</th>
            <th>Description</th>
            <th>Deadline</th>
            <th>Priority</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <?php
        // GET AMOUNT OF PAGES
        $objectsPerPage = 5;
        $pageNumber = ceil(count($arrGet)/$objectsPerPage);
    ?>

    <?php
        // GET PAGE INDEX
        $page = $_GET['page'];

        // SET STARTING $i
        $i = 0 + ($objectsPerPage*$page-$objectsPerPage);
        $z = $i+$objectsPerPage;

        // FOR HANDLING LIST NUMBER IN TABLE
        $x = $i;

        // MAX POST COUNT
        if($z > count($arrGet)){
            $z = count($arrGet);
        }

    ?>


        <?php for($i;$i < $z; $i++): ?>

            <tr class='<?php checkStatus($arrGet[$i]['deadline'],$arrGet[$i]['completion'],$arrGet[$i]['priority'])?>'>
                <td class="align-middle"><?php echo ($x+1)?></td>
                <td class="align-middle"><?php echo $arrGet[$i]['title']?></td>
                <td class="align-middle"><?php echo $arrGet[$i]['description']?></td>
                <td class="align-middle"><?php echo date('Y - m - d',$arrGet[$i]['deadline'])?></td>
                <td class="align-middle"><?php echo $arrGet[$i]['priority']?></td>

                <?php if($arrGet[$i]['completion']==0):?>
                    <td class="align-middle"><a href="list-update.php?update=redo&amp;key=<?php echo $x;?>&amp;page=<?php echo $page?>"><button type="button" class="btn btn-primary">Finish</button></a></td>
                <?php endif;?>

                <?php if($arrGet[$i]['completion']==1):?>
                    <td class="align-middle"><a href="list-update.php?update=completed&amp;key=<?php echo $x;?>&amp;page=<?php echo $page?>"><button type="button" class="btn btn-warning">Reset</button></a></td>
                <?php endif;?>

                <td class="align-middle"><a href="list-delete.php?key=<?php echo $x;?>&amp;page=<?php echo $page?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
                <?php $x++ ?>
            </tr>

        <?php endfor; ?>

        <!-- BREAKER -->

        <!-- <?php foreach($arrGet as $i):?>
            <tr class='<?php checkStatus($i['deadline'],$i['completion'],$i['priority'])?>'>
                <td class="align-middle"><?php echo ($j+1)?></td>
                <td class="align-middle"><?php echo $i['title']?></td>
                <td class="align-middle"><?php echo $i['description']?></td>
                <td class="align-middle"><?php echo date('Y - m - d',$i['deadline'])?></td>
                <td class="align-middle"><?php echo $i['priority']?></td>

                <?php if($i['completion']==0):?>
                    <td class="align-middle"><a href="list-update.php?update=redo&amp;key=<?php echo $j;?>"><button type="button" class="btn btn-primary">Finish</button></a></td>
                <?php endif;?>

                <?php if($i['completion']==1):?>
                    <td class="align-middle"><a href="list-update.php?update=completed&amp;key=<?php echo $j;?>"><button type="button" class="btn btn-warning">Reset</button></a></td>
                <?php endif;?>

                <td class="align-middle"><a href="list-delete.php?key=<?php echo $j;?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
                <?php $j++ ?>
            </tr>
        <?php endforeach; ?> -->


</table>

<!-- GENERATE PAGINATION -->
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="index.php?state=display&amp;page=<?php if($page > 1){echo ($page-1);}else{echo '1';} ?>">Previous</a></li>

        <?php for($j = 1; $j <= $pageNumber; $j++):?>
            <li class="page-item"><a class="page-link" href="index.php?state=display&amp;page=<?php echo $j ?>"><?php echo $j ?></a></li>
        <?php endfor;?>

        <li class="page-item"><a class="page-link" href="index.php?state=display&amp;page=<?php if($page < $pageNumber){echo ($page+1);}else{echo $pageNumber;} ?>">Next</a></li>
    </ul>
</nav>
