<?php
include("universal_functions.php");

//parameter that determines what to execute
$function = (int)($_POST['function']);


//gets tic-tac-toe board
function getBoard()
{
	$game_id = (int)$_COOKIE['game_id'];

	$path = "./AI_tic-tac-toe/user_data/".$game_id."_board.txt";
	$contents = read_file($path);

	return $contents;
}


//start game
if($function==1)
{
	// echo getcwd();

	$difficulty = (int)$_POST['AIDifficulty'];

	$game_id = (int)$_COOKIE['game_id'];

	chdir("./AI_tic-tac-toe");

	//C++ execution of the tic-tac-toe game
	exec("./test_sqlite2.out ".$game_id." ".$difficulty." > /dev/null &");

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


	$my_file = './AI_tic-tac-toe/user_data/'.$game_id."_quit.txt";
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

	$path = "./AI_tic-tac-toe/user_data/".$game_id."_AI_move.txt";
	if(file_exists($path))
	{
		$contents = read_file($path);
		//deletes AI's move file so as to not get confused
		unlink($path);
	}
	else
		$contents = "";

	$new_board = getBoard();


	$JSON=array();
	$JSON['message'] = "success";
	$JSON['error'] = "";

	$JSON['new_move'] = $contents;
	$JSON['board'] = $new_board;
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


	$new_board = getBoard();



	$JSON=array();
	$JSON['message'] = $message;
	$JSON['error'] = $error;

	$JSON['board'] = $new_board;
	echo json_encode($JSON);
	exit();
}
//checks if game was completed
else if($function==5)
{
	$game_id = (int)$_COOKIE['game_id'];

	$board="";

	$path = "./AI_tic-tac-toe/user_data/".$game_id."_game.txt";
	if(file_exists($path))
	{
		$contents = read_file($path);
		$contents = (int)$contents[0];
		//deletes game completion path
		unlink($path);

		$board = getBoard();
	}
	else
		$contents = "";


	$JSON=array();
	$JSON['message'] = "success";
	$JSON['error'] = "";

	$JSON['board'] = $board;
	$JSON['game_result'] = $contents;
	echo json_encode($JSON);
	exit();
}
