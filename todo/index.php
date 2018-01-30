<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TO-DO LIST</title>

        <!-- BOOTSTRAP CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <!-- CUSTOM STYLE -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container py-3">
            <div class="row">

                <div class="col-12 my-2">
                    <h2 class="my-0">To-Do List</h2>
                </div>

                <div class="col-md-12 my-2 d-flex">
                    <a class="mr-2" href="index.php?state=display&amp;page=1"><button type="button" class="btn btn-primary">Show list</button></a>
                    <a href="index.php?state=new"><button type="button" class="btn btn-primary">Add to list</button></a>
                    <a class="ml-auto"href="index.php?state=create"><button type="button" class="btn btn-danger">Create list</button></a>
                </div>

                <div class="col-md-12 my-2">

                    <?php
                        if($_GET['state'] == 'create'){
                            include('list-default.php');
                        }elseif($_GET['state'] == 'display'){
                            include('list-display.php');
                        }elseif($_GET['state'] == 'new'){
                            include ('list-new.php');
                        }else{
                            include ('404.php');
                        }
                    ?>

                </div>
            </div>
        </div>
    </body>
</html>
