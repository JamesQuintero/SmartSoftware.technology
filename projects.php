<!-- Uses Carousel Bootstrap -->

<?php
include('universal_functions.php');

// log_IP("index");

//header( 'Location: ./algo.php?view=results');
?>

<!DOCTYPE>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <meta name="description" content="SmartSoftware is an Artificial Intelligence development project" />
      <meta name="keywords" content="A.I., AI, Artificial, Intelligence, Artificial Intelligence, Machine Learning, Neural Networks, Bot, " />
      <title>Smart Software - Projects</title>
      
      <?php include('code_header.php'); ?>
      <link href="css/carousel.css" rel="stylesheet">



      <script type="text/javascript">
         $(document).ready(function()
         {
            <?php
                include('required_jquery.php');
            ?>
         });
      </script>

      <style>
        .carousel{
          margin-bottom:0px;
        }
        .carousel-caption{
          box-shadow:0px 0px 50px black;
          background-color:rgba(0,0,0,0.5);
          border-radius:40px;
          /*border-bottom-left-radius:30px;
          border-bottom-right-radius:30px;*/
          right:30%;
          left:30%;
        }
        .carousel-caption p{
          text-shadow:0px 0px 5px black;
        }
        .carousel-inner{
          border-bottom:1px solid rgb(100,100,100);
        }
        .carousel-inner .item img{

          height:auto;
        }
        .carousel-image{
          background-position:50% 50%;
          background-size: 100%;
          height:100%;
        }
        .marketing{
          padding:20px;
          /*padding-top:100px;*/
          background-color:rgba(250,250,250,0.8);
          box-shadow:0px 0px 200px white;
        }
        .image{
          background-color:rgb(250,250,250);
          border:1px solid gray;
          padding:10px;
          border-radius:5px;
          box-shadow:1px 1px 3px gray;
        }
        .featurette-heading{
          margin-top:50px;
        }
        .featurette-divider{
          margin:40px 0;
        }
        .row{
          margin-left:0px;
          margin-right:0px;
        }
      </style>
   </head>
   <body>
        <?php include('index_header.php'); ?>
       


          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
              <li data-target="#myCarousel" data-slide-to="3"></li>
              <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <div class="first-slide carousel-image" style="background-image:url('images/carousel-images/stock_market/stock3.jpg');"></div>
                <div class="container">
                  <div class="carousel-caption">
                    <h1>Stock Market Prediction</h1>
                    <p>Algorithms used to predict stock price movements.</p>
                    <p><a class="btn btn-lg btn-success" href="stock_market.php" role="button">View Predictions</a></p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="second-slide carousel-image" style="background-image:url('images/carousel-images/sports_betting/sports6.jpg');"></div>
                <div class="container">
                  <div class="carousel-caption">
                    <h1>Sports Prediction</h1>
                    <p>Algorithms used to predict game outcomes for NBA, NHL, and MLB games.</p>
                    <p><a class="btn btn-lg btn-success" href="sports.php" role="button">View Predictions</a></p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="third-slide carousel-image" style="background-image:url('images/carousel-images/AI_poker/poker5.jpg');"></div>
                <div class="container">
                  <div class="carousel-caption">
                    <h1>AI Poker</h1>
                    <p>Play Texas Holdem Poker against a self-learning neural network.</p>
                    <p><a class="btn btn-lg btn-default disabled" href="" role="button">Available Soon</a></p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="third-slide carousel-image" style="background-image:url('images/carousel-images/tic-tac-toe/ttt3.jpg');"></div>
                <div class="container">
                  <div class="carousel-caption">
                    <h1>AI Tic-Tac-Toe</h1>
                    <p>Play Tic-Tac-Toe against a self-taught neural network.</p>
                    <p><a class="btn btn-lg btn-success" href="tic-tac-toe.php" role="button">Play Against</a></p>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="third-slide carousel-image" style="background-image:url('images/carousel-images/ultimate-tic-tac-toe/uttt2.jpg');"></div>
                <div class="container">
                  <div class="carousel-caption">
                    <h1>AI Ultimate Tic-Tac-Toe</h1>
                    <p>Play Ultimate Tic-Tac-Toe against a self-taught neural network.</p>
                    <p><a class="btn btn-lg btn-default disabled" href="" role="button">Available Soon</a></p>
                  </div>
                </div>
              </div>


            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>




          <!-- Marketing messaging and featurettes
               Wrap the rest of the page in another container to center all the content. -->

          <div class="container marketing">


            <div class="row featurette">
              <div class="col-md-7">
                <h1>Stock Market Prediction</h1>
                <p class="lead">Stock prices change based off of people's buying and selling of shares, and since people's actions aren't random, the buying and selling can be predicted. Stock prices can be predicted to move up when certain criteria is met. 
                The option algorithm predicts the price movements for option contracts in the same way the stock algorithm predicts price movements for stocks.</p>
                <p><a class="btn btn-lg btn-default" href="stock_market.php" role="button">View Predictions</a></p>
              </div>
              <div class="col-md-5 image" >
                <a href="stock_market.php"><img class="featurette-image img-responsive center-block" src="images/carousel-images/stock_market/stock10.jpg"></a>
              </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
              <div class="col-md-7">
                <h1>Sports Prediction</h1>
                <p class="lead">Algorithms are used to predict which team will win in a game, and their chance of winning. This can be used to win sports bets. Sports leagues: NBA, NHL, and MLB. </p>
                <p><a class="btn btn-lg btn-default" href="sports.php" role="button">View Predictions</a></p>
              </div>
              <div class="col-md-5 image" >
                <a href="sports.php"><img class="featurette-image img-responsive center-block" src="images/carousel-images/sports_betting/sports6.jpg"></a>
              </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
              <div class="col-md-7">
                <h1>AI Poker</h1>
                <p class="lead">Texas Holdem poker is a game if skill and luck, and this AI will have the skill to beat many poker players. It learns from playing against other visitors, so it's better every time you visit.</p>
                <p><a class="btn btn-lg btn-default disabled" href="" role="button">Available Soon</a></p>
              </div>
              <div class="col-md-5 image" >
                <img class="featurette-image img-responsive center-block" src="images/carousel-images/AI_poker/poker4.jpg">
              </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
              <div class="col-md-7">
                <h1>AI Tic-Tac-Toe</h1>
                <p class="lead">Play tic-tac-toe against an AI that learns as you play. Have the AI play against itself so that it can learn, and it will then be beating human players. </p>
                <p><a class="btn btn-lg btn-default" href="tic-tac-toe.php" role="button">Play Tic-Tac-Toe</a></p>
              </div>
              <div class="col-md-5 image" >
                <a href="tic-tac-toe.php"><img class="featurette-image img-responsive center-block" src="images/carousel-images/tic-tac-toe/ttt3.jpg"></a>
              </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
              <div class="col-md-7">
                <h1>AI Ultimate Tic-Tac-Toe</h1>
                <p class="lead">Play Ultimate tic-tac-toe against an AI that learns as you play. It can learn by playing against itself, like the regular tic-tac-toe AI, and it will then be beating human players.</p>
                <p><a class="btn btn-lg btn-default disabled" href="" role="button">Available Soon</a></p>
              </div>
              <div class="col-md-5 image" >
                <img class="featurette-image img-responsive center-block" src="images/carousel-images/ultimate-tic-tac-toe/uttt2.jpg">
              </div>
            </div>



            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->


            <footer>
              <p>&copy; 2017 Smart Software</p>
            </footer>

          </div>

        




   </body>
</html>