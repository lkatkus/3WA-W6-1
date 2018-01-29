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
        }if($currentPriority == 'Urgent'){
            echo 'taskUrgent ';
        }elseif($currentPriority == 'Moderate'){
            echo 'taskModerate ';
        }else{
            echo 'taskUnimporant ';
        }
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
        $pageNumber = ceil(count($arrGet)/5);
    ?>

    <?php foreach($arrGet as $i):?>
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
    <?php endforeach; ?>

</table>

<!-- GENERATE PAGINATION -->
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>

        <?php for($j = 1; $j <= $pageNumber; $j++):?>
            <li class="page-item"><a class="page-link" href="index.php?state=display&amp;page=<?php echo $j ?>"><?php echo $j ?></a></li>
        <?php endfor;?>

        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
</nav>
