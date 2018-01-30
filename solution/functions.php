<?php


function addTask() {
	if (isset($_POST["title"]) && $_POST['title'] != '') {
		$file = fopen("tasks.csv", "a");

		$data = $_POST["year"] . $_POST["month"] . $_POST["day"];
		// $dateNow = date(format);

		$newTask = [
			$_POST["title"],
			$_POST["task"],
			$data,
			$_POST["priority"]
		];

		fputcsv($file, $newTask);

		fclose($file);

			$_SESSION['message'] = array(
			'text' => "Your task with a title <i> $newTask[0] </i>  has been added.",
			'emote' => 'Well done!',
			'type' => 'success'
	);

	} else {

		$_SESSION['message'] = array(
			'text' => 'Please enter all required information... or else.',
			'emote' => 'Warning!',
			'type' => 'info'
		);

	}
}


function loadTask($fileName) {
	$file = fopen($fileName, "a+");

	$tasks = array();

	while(true){
		$taskData = fgetcsv($file);

		if($taskData == false) {
			break;
		}

		array_push($tasks, $taskData);
	}

	fclose($file);

	return $tasks;
}


function deleteTask ($indexes) {
	$takeLoadTasks = loadTask('tasks.csv');

	$checkedTasks = [];

	for($i=0; $i < count($takeLoadTasks); $i++){
		if(in_array($i, $indexes) == false){
			array_push($checkedTasks, $takeLoadTasks[$i]);
		}
	}

	$file = fopen("tasks.csv", "w");

	for ($i=0; $i < count($checkedTasks)  ; $i++) {
			fputcsv($file, $checkedTasks[$i]);
	}


	fclose($file);

		$_SESSION['message'] =  [
		'text' => 'The task has been deleted. It is gone... forever. Congratulations, you monster. Why does a scourge like youself exist upon this planet? You know what... no... I dont wanna know!',
		'emote' => 'Oh Snap!',
		'type' => 'danger',
	];


	// $_SESSION['message'] = []

}

function editTask($index_of_task_to_replace) {

$taskArray = loadTask("tasks.csv");

	$data = $_POST["year"] . $_POST["month"] . $_POST["day"];
		$newTask = [
			$_POST["title"],
			$_POST["task"],
			$data,
			$_POST["priority"]
		];


		$replacmentArray =[
			$index_of_task_to_replace => $newTask
		];

 $updatedTask = array_replace_recursive($taskArray, $replacmentArray);

 $file = fopen("tasks.csv", "w");

	for ($i=0; $i < count($updatedTask) ; $i++) {
		fputcsv($file, $updatedTask[$i]);
	}


	fclose($file);

$_SESSION['message'] =  [
	'text' => 'The task has been edited.',
	'emote' => 'Heads up!',
	'type' => 'warning'
];

}

	$themes = [
			'default',
			'cerulean',
			'cosmo',
			'cyborg',
			'darkly',
			'flatly',
			'journal',
			'lumen',
			'paper',
			'readable',
			'sandstone',
			'simplex',
			'slate',
			'solar',
			'spacelab',
			'superhero',
			'united',
			'yeti'
	];

?>
