<?php
include('universal_functions.php');

// can be "ttt" or "uttt"
$view = "overview";
if(!empty($_GET['view']))
    $view = htmlspecialchars($_GET['view']);

//sets ttt game_id cookie so that game state is saved
if(!isset($_COOKIE['game_id']))
    setcookie("game_id", rand(1000000,2000000), time()+86400);

?>
<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="SmartSoftware is an Artificial Intelligence development project" />
        <meta name="keywords" content="A.I., AI, Artificial Intelligence, sports, betting, odds, sports betting" />
        
        <title>Smart Software - AI Tic-Tac-Toe</title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />


        <?php include('code_header.php'); ?>
        <link href="css/dashboard.css" rel="stylesheet">
        <link href="css/custom_dashboard.css" rel="stylesheet">

        <script src="js/jquery.csv.js"></script>
        <script type="text/javascript">

            $(document).ready(function(){
                var view = "<?php echo $view; ?>";
                if(view=="overview")
                {
                    $('#overview').show();
                    $('#ttt').hide();
                    $('#uttt').hide();
                }
                else if(view=="ttt")
                {
                    $('#overview').hide();
                    $('#ttt').show();
                    $('#uttt').hide();
                }
                else if(view=="uttt")
                {
                    $('#overview').hide();
                    $('#ttt').hide();
                    $('#uttt').show();

                }
            });



            var AI_interval;
            var game_interval;


            function ttt(AIDifficulty)
            {
                $('#game_result').html("");

                //start new game
                startGame(AIDifficulty);

                //initializes jquery for board functionality
                resetBoardFunctions();

                AIMoveInterval();
                gameInterval();

            }

            //starts player vs AI ttt game with AI having AIDifficulty (0 = easy, 1 = hard)
            function startGame(AIDifficulty)
            {
                $.ajax({
                  type: 'POST',
                  url: "ttt.php",
                  data: {
                    function: 1,
                    AIDifficulty: AIDifficulty
                  },
                  async:false,
                  success: function(output)
                  {
                    console.log("New game started");
                  }
                });
            }

            //stops tic-tac-toe game, allowing for creation of a new one
            function stopGame()
            {
                $.ajax({
                  type: 'POST',
                  url: "ttt.php",
                  data: {
                    function: 2
                  },
                  async:false,
                  success: function(output)
                  {
                    console.log("New game started");
                  }
                });
            }

            //checks if AI has moved every .5 seconds
            function AIMoveInterval()
            {
                AI_interval = setInterval(function(){
                    loadAIMove();
                }, 500);
            }

            //checks if game was won
            function gameInterval()
            {
                game_interval = setInterval(function(){
                    checkForGameCompletion();
                }, 500);
            }

            //retrievs AI's move, even if it doesn't yet exist
            function loadAIMove()
            {
                $.ajax({
                  type: 'POST',
                  url: "ttt.php",
                  data: {
                    function: 3
                  },
                  dataType: "json",
                  async:false,
                  success: function(output)
                  {
                    var new_move = output.new_move;
                    var board = output.board;

                    //AI has actually made a move
                    if(new_move!="")
                    {
                      console.log("New move: "+new_move);

                        //sets piece down since there's a lag when setting the whole board
                        $('#slot_'+new_move).html("<p class='ttt_piece'>X</p>");
                        board[new_move]=1;
                        //sets the whole board
                        setBoard(board);

                        //stop AI move checking
                        clearInterval(AI_interval);

                        resetBoardFunctions();
                        checkForGameCompletion();

                    }
                    else
                        console.log("Waiting for AI's move");
                  }
                });

                
            }

            //player moved in slot specified by move
            function playerMove(move)
            {
                console.log("Player moved to "+move);
                $.ajax({
                  type: 'POST',
                  url: "ttt.php",
                  data: {
                    function: 4,
                    move: move
                  },
                  dataType: "json",
                  async:false,
                  success: function(output)
                  {
                    // var board=output.board;
                    var message = output.message;
                    var error = output.error;
                    var board = output.board;

                    console.log(board);

                    if(message=="success")
                    {
                        //sets piece down since there's a lag when setting the whole board
                        $('#slot_'+move).html("<p class='ttt_piece'>O</p>");
                        board[move]=2;
                        //sets the whole board
                        setBoard(board);

                        resetBoardFunctions();
                        AIMoveInterval();

                        checkForGameCompletion();
                    }
                    else
                    {
                        alert("Something went wrong: "+message);
                    }

                  }
                });

            }

            //checks if the game was won or tied
            function checkForGameCompletion()
            {
               $.ajax({
                  type: 'POST',
                  url: "ttt.php",
                  data: {
                    function: 5
                  },
                  dataType: "json",
                  async:false,
                  success: function(output)
                  {
                    var game_result = output.game_result;

                    //if game has ended
                    if(game_result!="")
                    {
                        console.log("game result: "+game_result);

                        //game tied
                        if(game_result==0)
                        {
                            $('#game_result').html("It's a tie");
                        }
                        //player won
                        else if(game_result==1)
                        {
                            $('#game_result').html("You won!");
                        }
                        //AI won
                        else if(game_result==2)
                        {
                            $('#game_result').html("The AI won!");
                        }
                        //user quit
                        else
                            $('#game_result').html("Game stopped");


                        //removes board functions
                        for(var x =0; x < 9; x++)
                        {
                            $('#slot_'+x).attr("onClick", "");
                            $('#slot_'+x).attr("class", "");
                        }

                        //stop AI move checking
                        clearInterval(AI_interval);
                        clearInterval(game_interval);

                    }
                    else
                        console.log("Checking for game completion");
                  }
                });
            }

            //sets board to what is returned from the program
            function setBoard(board)
            {
                console.log("Setting board: ");
                for(var x =0; x < board.length; x++)
                {
                    if(board[x]!=0)
                    {
                      if(board[x]==1)
                        $('#slot_'+x).html("<p class='ttt_piece'>X</p>");
                      else if(board[x]==2)
                        $('#slot_'+x).html("<p class='ttt_piece'>O</p>");
                    }
                    else
                      $('#slot_'+x).html("");

                    console.log(board[x]);
                }
              
            }
            
            //resets board functions
            function resetBoardFunctions()
            {
                for(var x =0; x < 9; x++)
                {
                    //slot is empty
                    if($('#slot_'+x).html().length==0)
                    {
                        $('#slot_'+x).attr("onClick", "playerMove("+x+");");
                        $('#slot_'+x).attr("class", "empty")
                    }
                    else
                    {
                        $('#slot_'+x).attr("onClick", "");
                        $('#slot_'+x).attr("class", "");
                    }
                }

            }
            
            
            
            <?php include('js/required_google_analytics.js'); ?>
        </script>

        <style>
            #ttt_board{
                /*width:300px;
                height:300px;*/
                width:auto;
            }
            #ttt_board td{
                border:1px solid gray;
                vertical-align:middle;
                height:150px;
                width:150px;
            }
            .ttt_piece{
                width: 100%;
                font-size: 50px;
                padding: 0px;
                margin: 0px;
                text-align: center;
                vertical-align: middle;
            }
            .left_column{
                white-space:nowrap;
                font-weight:bold;
            }
            .panel{
                display:inline-block;
            }

            .empty{
                cursor:pointer;
            }
            .empty:hover{
              background-color:rgba(200,200,200,0.2);
            }
            #game_result{
              font-size:20px;
              font-weight:bold;
            }
        </style>
    </head>
    <body>
        <?php include('index_header.php'); ?>



        <div class="container-fluid">
          <div class="row">
             <!-- sidebar -->
            <div class="col-sm-3 col-md-2 sidebar">
              <ul class="nav nav-sidebar">
                <li><p style="font-weight:bold;font-size:16px;padding-left:20px;padding-right:20px;">Sports Games Predictor</p></li>
                <li <?php if($view=="overview") echo "class='active'"; ?> ><a href="?view=overview">Overview</a></li>
                <li <?php if($view=="ttt") echo "class='active'";   ?> ><a href="?view=ttt">Tic-Tac-Toe</a></li>
                <li <?php if($view=="uttt") echo "class='active'";   ?> ><a href="?view=uttt">Ultimate Tic-Tac-Toe</a></li>
              </ul>
              <!-- <hr /> -->
              <!-- <ul class="nav nav-sidebar" id="seasons_list">
                <li <?php if($view=="info") echo "class='active'"; ?> ><a href="?view=info">Info</a></li>
                <li <?php if($view=="ttt") echo "class='active'";   ?> ><a href="?view=ttt">Tic-Tac-Toe</a></li>
                <li <?php if($view=="uttt") echo "class='active'";   ?> ><a href="?view=uttt">Ultimate Tic-Tac-Toe</a></li>
              </ul> -->
              <!--
              <ul class="nav nav-sidebar">
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
              </ul>-->
            </div>



            <!-- overview content -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="overview">
                <h1 class="page-header" >Overview</h1>
                <p>1) Human vs AI</p>
                <p>2) AI vs AI</p>
                
            </div>

            <!-- tic-tac-toe content -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="ttt" style="display:none;">
                <h1 class="page-header" id="nba_header">Tic-Tac-Toe</h1>

                <div id="ttt_info">
                  <p>Tic-Tac-Toe is simple enough. See if you can beat the AI!</p>
                  
                </div>


                <table  id="ttt_game">
                    <tbody>
                        <tr>
                            <p id="game_result"></p>
                        </tr>
                        <tr>
                            <td>
                                <table style="width:100%;">
                                  <tbody>
                                      <tr>
                                          <td style="display:inline-block;">
                                              <p style="margin-right:10px;"><a class="btn btn-default" onClick="ttt(1);" role="button">Untrained AI</a></p>
                                          </td>
                                          <td style="text-align:left;display:inline-block;">
                                              <p><a class="btn btn-primary" onClick="ttt(2);" role="button">Trained AI</a></p>
                                          </td>
                                          <td style="text-align:right;">
                                              <p><a class="btn btn-warning" onClick="stopGame();" role="button">Stop game</a></p>
                                          </td>
                                      </tr>
                                  </tbody>
                              </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table class="table table-bordered" id="ttt_board">
                                    <tbody>
                                        <tr>
                                            <td id="slot_0"></td>
                                            <td id="slot_1" ></td>
                                            <td id="slot_2" ></td>
                                        </tr>
                                        <tr>
                                            <td id="slot_3"></td>
                                            <td id="slot_4"></td>
                                            <td id="slot_5" ></td>
                                        </tr>
                                        <tr>
                                            <td id="slot_6" ></td>
                                            <td id="slot_7" ></td>
                                            <td id="slot_8" ></td>
                                        </tr>
                                    </tbody>    
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>


                
                
            </div>


           
            <!-- ultimate tic-tac-toe content -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="uttt" style="display:none;">
                <h1 class="page-header" id="nba_header">Ultimate Tic-Tac-Toe</h1>

                <div id="uttt_info">
                  <p>Tic-Tac-Toe was too easy. See if you can beat the AI at Ultimate Tic-Tac-Toe!</p>
    
                </div>
                <div id="uttt_game">

                    
                </div>

            </div>



              
          </div>
        </div>
    
    </body>
</html>