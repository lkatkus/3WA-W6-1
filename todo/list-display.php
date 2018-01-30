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

            <!-- SORTING BUTTON -->
            <th>
                <form action="list-sort.php" method="GET">
                    <!-- ONCHANGE AUTO SUBMITS OPTION FOR SORTING TABLE ELEMENTS-->
                    <select name="sort" onchange="this.form.submit();">
                        <option disabled selected>Deadline</option>
                        <option value="low">Low To High</option>
                        <option value="high">High To Low</option>
                    </select>
                </form>
            </th>

            <th>Priority</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <?php
        session_start();

        // GET PAGE INDEX
        $page = $_GET['page'];
        $_SESSION['page'] = $page;

        // GET OBJECT PER PAGE
            // DEFAULT VALUE

            if(array_key_exists('objectsPerPage',$_GET)){
                $objectsPerPage = $_GET['objectsPerPage'];
                $_SESSION['objectsPerPage'] = $objectsPerPage;
            }else{
                $objectsPerPage = 5;
            }

        // GET AMOUNT OF PAGES
        $pageNumber = ceil(count($arrGet)/$objectsPerPage);


        // CHECK FOR HAND INPUT AND REDIRECT TO LAST PAGE
        if($page > $pageNumber){
            $page = $pageNumber;
        }elseif($page == null){
            $page = 1;
        }

        // SET STARTING $i
        $i = 0 + ($objectsPerPage*$page-$objectsPerPage);
        $z = $i+$objectsPerPage;

        // FOR HANDLING LIST NUMBER IN TABLE
        $x = $i;

        // FOR MAX POST COUNT DISPLAY ON THE LAST TABLE PAGE
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

</table>

<!-- GENERATE PAGINATION -->
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="index.php?state=display&amp;page=<?php if($page > 1){echo ($page-1);}else{echo '1';} ?>&amp;objectsPerPage=<?php echo $objectsPerPage; ?>">Previous</a></li>

        <?php for($j = 1; $j <= $pageNumber; $j++):?>
            <li class="page-item"><a class="page-link" href="index.php?state=display&amp;page=<?php echo $j ?>"><?php echo $j ?></a></li>
        <?php endfor;?>

        <li class="page-item"><a class="page-link" href="index.php?state=display&amp;page=<?php if($page < $pageNumber){echo ($page+1);}else{echo $pageNumber;} ?>&amp;objectsPerPage=<?php echo $objectsPerPage; ?>">Next</a></li>
    </ul>
</nav>
