<?php
include("universal_functions.php");

//parameter that determines what to execute
$function = (int)($_POST['function']);


//start game
if($function==1)
{
	// echo getcwd();

	$difficulty = (int)$_POST['AIDifficulty'];

	$game_id = (int)$_COOKIE['game_id'];

	chdir("./AI_tic-tac-toe");

	//C++ execution of the tic-tac-toe game
	// exec("./test_sqlite.out ".$game_id." ".$difficulty);

	$JSON=array();
	$JSON['message'] = "success";
	$JSON['error'] = "";

	echo json_encode($JSON);
	exit();
}
//stop game
else if($function==2)
{
	$game_id = (int)$_COOKIE['game_id'];

	$error = "";
	$message = "";


	$my_file = './AI_tic-tac-toe/user_data'.$game_id.+"_quit.txt";
	try {
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		$message = "success";
	}

	//catch exception
	catch(Exception $e){
		$message = "fail";
		$error = $e->getMessage();
	}


	$JSON=array();
	$JSON['message'] = $success;
	$JSON['error'] = $error;

	echo json_encode($JSON);
	exit();
}
//retrieve AI move
else if($function==3)
{

	$game_id = (int)$_COOKIE['game_id'];


	$contents = read_file("./AI_tic-tac-toe/user_data/".$game_id."_AI_move.txt");


	$JSON=array();
	$JSON['message'] = "success";
	$JSON['error'] = "";

	$JSON['new_move'] = $contents;
	echo json_encode($JSON);
	exit();
}
//send player move
else if($function==4)
{
	$game_id = (int)$_COOKIE['game_id'];
	$move = (int)$_POST['move'];

	$message = "";
	$error = "";


	$my_file = "./AI_tic-tac-toe/user_data/".$game_id."_player_move.txt";
	try{
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		// $data = "".$move."";
		$data = (string)$move;
		fwrite($handle, $data);

		$message = "success";
		fclose($handle);
	} catch(Exception $e){
		$message = "Error with file structure";
		$error = $e;
	}


	$JSON=array();
	$JSON['message'] = $message;
	$JSON['error'] = $error;

	echo json_encode($JSON);
	exit();
}