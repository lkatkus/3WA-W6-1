<?php
session_start();
include("functions.php");
// var_dump($_SESSION['message']);
// $tasks = loadTask("tasks.csv");
// include 'pvz.php';
$now = date_create();
// var_dump($now);
$tasksArray = loadTask('tasks.csv');
// echo '<pre>';
// var_dump($tasksArray);
// echo '</pre>';
?>

<!DOCTYPE html>
<html>
<head>

	<title>Pasidariau pats</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<?php if(isset($_SESSION['theme'])) :?>
		<link rel="stylesheet" type="text/css" href="https://bootswatch.com/<?=$_SESSION['theme'];?>/bootstrap.min.css">
	<?php endif; ?>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<div class="dropdown">
		  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Theme
		  <span class="caret"></span></button>
		  <ul class="dropdown-menu">
		   <?php foreach($themes as $theme) :?>
		    <li><a href="theme.php/?theme=<?= $theme; ?>"><?= $theme; ?></a></li>
		<?php endforeach; ?>
		  </ul>
		  <p class="inlainas">Selected theme: <b><?= isset($_SESSION['theme']) ? $_SESSION['theme'] : 'No theme selected...';?></b></p>
		</div>
	</header>
	<div class="container">
				<h1>Aiškesnis užduočių tvarkaraštis</h1>
				<hr>

				<?php if(isset($_SESSION['message'])) :?>

						<!-- // Display message -->
					<div class="alert alert-<?= $_SESSION['message']['type']; ?> alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong><?= $_SESSION['message']['emote']; ?></strong> <?= $_SESSION['message']['text']; ?>
					</div>

						<!-- // Display message from session -->
						<?php unset($_SESSION['message']); ?>
					<?php endif; ?>

				<h4 class="text-center">
					Užduočių sąrašas
				</h4 class="text-center">
				<?php if( !empty($tasksArray)) :?>
					<form class="clearfix" action="delete.php" method="POST" class="top-form">
						<div class="form-group clearfix">
						    <?php foreach ($tasksArray as $index => $task) : ?>
							    <div class="col-sm-offset-2 col-sm-6 col-sm-offset-3">
							      <div class="checkbox <?php echo $task[3]; ?> ">
							        <label>
							        	<input type="checkbox" name="taskId[]" value="<?php echo $index ?>">
							        	<p>Užduoties pavadinimas:<b> <?php echo $task[0]; ?> </b><p/>
							        </label>
							      <p>Aprašymas: <b><?= $task[1]; ?></b>
									<?php if(date_create($task[2]) < $now): ?>
	                                    <strong>- Per vėlu</strong>
	                                <?php endif ?>
							      </p>
							      <a class="btn btn-warning" href="editForm.php/?task=<?= $index; ?>">Edit</a>
							      </div>

							      <hr>
							    </div>
						    <?php endforeach;?>




						</div>
						<div class="form-group clearfix">
						  <div class="col-sm-offset-2 col-sm-6 col-sm-offset-3">
						  		<input class="btn-margin btn-danger btn btn-block" id="Delete" type="submit" name="Delete" value="Delete" >
						  </div>
						</div>
					</form>
				<?php endif; ?>
	</div>
	<form action="addTask.php" method="POST" class="form-horizontal">
	  <div class="form-group">
	    <label class="control-label col-sm-2">Title:</label>
	    <div class="col-sm-offset-1 col-sm-6 col-sm-offset-3">
	      <input type="text" class="form-control" id="title" name="title" placeholder="">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2">Task:</label>
	    <div class="col-sm-offset-1 col-sm-6 col-sm-offset-3">
	      <textarea class="form-control" rows="5" name="task" id="task"></textarea>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2">And date:</label>
	    <div class="col-sm-offset-1 col-sm-6 col-sm-offset-3">
	      <select name="year">
			  <option value="">Year</option>
			  <?php for ($year = date('Y'); $year < date('Y')+10; $year++) { ?>
			    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
			    <?php } ?>
			</select>
			<select name="month">
			    <option value="">Month</option>
			    <?php for ($month = 1; $month <= 12; $month++) { ?>
			    <option value="<?php echo strlen($month)==1 ? '0'.$month : $month; ?>"><?php echo strlen($month)==1 ? '0'.$month : $month; ?></option>
			    <?php }

			     ?>
			</select>
			<select name="day">
			  <option value="">Day</option>
			    <?php for ($day = 1; $day <= 31; $day++) { ?>
			    <option value="<?php echo strlen($day)==1 ? '0'.$day : $day; ?>"><?php echo strlen($day)==1 ? '0'.$day : $day; ?></option>
			    <?php } ?>
			</select>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2">Priority:</label>
	    <div class="col-sm-offset-1 col-sm-6 col-sm-offset-3">
	     	<label class="radio-inline col-sm-3"><input type="radio" name="priority" value="low">Low</label>
			<label class="radio-inline col-sm-3 normal"><input type="radio" name="priority" value="normal">Normal</label>
			<label class="radio-inline col-sm-3 high"><input type="radio" name="priority" value="high">High</label>
	    </div>
	  </div>
	  <div class="form-group">
	  <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
	  		<input type="submit" name="submit" value="Add" >
	  </div>
	 </form>

</body>
</html>