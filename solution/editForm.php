<?php include("functions.php");
$tasks = loadTask("tasks.csv");
$i = $_GET['task'];

$task = $tasks[$i];


?>

<!DOCTYPE html>
<html>
<head>
	<title>Pasidariau pats</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
				<h1>Redaguoti užduotį su pavadinimu: </h1>
				<hr>
	<form action="/edit.php/?taskID=<?= $i; ?>" method="POST" class="form-horizontal">
	  <div class="form-group">
	    <label class="control-label col-sm-2">Title:</label>
	    <div class="col-sm-offset-1 col-sm-6 col-sm-offset-3">
	      <input type="text" class="form-control" id="title" name="title" value="<?= $task[0]; ?>" placeholder="" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2">Task:</label>
	    <div class="col-sm-offset-1 col-sm-6 col-sm-offset-3">
	      <textarea class="form-control" rows="5" name="task"  id="task"><?= $task[1]; ?></textarea>
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
	  		<input type="submit" name="submit" value="Edit" >
	  </div>
	 </form>
	</div>
</body>
</html>
