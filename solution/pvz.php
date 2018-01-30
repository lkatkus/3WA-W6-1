<?php
function addTask(){
	if(isset($_POST['title']) && $_POST['title'] != ''){
	$file = fopen("tasks.csv", "a");

		$data = $_POST["year"] . $_POST['month'] . $_POST["day"];

		$newTask = [
			$_POST['title'],
			$_POST['task'],
			$data,
			$_POST['priority']
		];
		fputcsv($file, $newTask);

		fclose($file);
	}

}

function loadTask(){
	$file = fopen("tasks.csv", "a+");

	$tasksArray = array();

	while(true){
		$tasks = fgetcsv($file);

		if($tasks == false){
			break;
		}

		array_push($tasksArray, $tasks);
	}



	fclose($file);

	return $tasksArray;
}

function deleteTask($indexes){
	$takeLoadTasks = loadTask();

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
}

function editTask($index_of_task_to_replace){
	$takeLoadTasks = loadTask();

	$takeLoadTasks = [
		0 => ['Taskas', 'Aprasymas', 'data', 'priority'],
		1 => [Takas, sjhdsfjhsdf, 2146465, normal],
	];

		$data = $_POST["year"] . $_POST['month'] . $_POST["day"];

		$updatedTask = [
			$_POST['title'],
			$_POST['task'],
			$data,
			$_POST['priority']
		];

		$replacementArray = [
			$index_of_task_to_replace => $updatedTask
		];



		$replacedTasksArray = array_replace_recursive($takeLoadTasks, $replacementArray);

		$file = fopen("tasks.csv", "w");

		for ($i=0; $i <count($replacedTasksArray) ; $i++) {
			fputcsv($file, $replacedTasksArray[$i]);
		}

		fclose($file);
}

