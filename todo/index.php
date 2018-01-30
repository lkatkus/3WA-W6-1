<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TO-DO LIST</title>

        <!-- BOOTSTRAP CDN -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                    <a class="mr-2" href="index.php?state=display&amp;page=1&amp;objectsPerPage=5"><button type="button" class="btn btn-primary">Show list</button></a>
                    <a class="mr-2" href="index.php?state=new"><button type="button" class="btn btn-primary">Add to list</button></a>
                    <a class=""href="index.php?state=create"><button type="button" class="btn btn-danger">Create list</button></a>

                    <!-- ADD OPTION FOR CHOOSING NUMBER OF DISPLAYED OBJECTS IF A LIST IS DISPLAYED -->
                    <?php if($_GET['state'] == 'display'):?>
                        <div class="dropdown ml-auto mr-2">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Objects Per Page
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="index.php?state=display&amp;page=1&amp;objectsPerPage=5">5</button></a>
                                <a class="dropdown-item" href="index.php?state=display&amp;page=1&amp;objectsPerPage=10">10</button></a>
                                <a class="dropdown-item" href="index.php?state=display&amp;page=1&amp;objectsPerPage=20">20</button></a>
                                <a class="dropdown-item" href="index.php?state=display&amp;page=1&amp;objectsPerPage=50">50</button></a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-md-12 my-2">

                    <?php
                        if($_GET['state'] == 'create'){
                            include('list-default.php');
                        }elseif($_GET['state'] == 'display'){
                            include('list-display.php');
                        }elseif($_GET['state'] == 'new'){
                            include ('list-new.php');
                        }
                    ?>

                </div>
            </div>
        </div>
    </body>
</html>
