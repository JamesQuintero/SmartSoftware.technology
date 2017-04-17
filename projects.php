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
      <title>Smart Software - AI Development</title>
      
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
          /*box-shadow:0px 0px 100px black;*/
          background-color:rgba(0,0,0,0.5);
          border-radius:50px;
          border-bottom-left-radius:30px;
          border-bottom-right-radius:30px;
          right:30%;
          left:30%;
        }
        .carousel-caption p{
          text-shadow:0px 0px 5px black;
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
          padding-top:20px;
          background-color:rgba(250,250,250,0.9);
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
      </style>
   </head>
   <body>
        <?php include('index_header.php'); ?>
       


          <!-- Carousel
          ================================================== -->
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
              <li data-target="#myCarousel" data-slide-to="3"></li>
              <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <!-- <img class="first-slide" src="http://altoday.com/wp-content/uploads/2016/02/stock-market.jpg" alt="First slide"> -->
                <!-- <img class="first-slide" src="https://s-media-cache-ak0.pinimg.com/originals/04/f5/1c/04f51c397294b3822f739763c4c4d577.jpg" alt="First slide"> -->
                <div class="first-slide carousel-image" style="background-image:url('images/carousel-images/stock_market/stock9.jpg');"></div>
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
                    <p><a class="btn btn-lg btn-primary" href="AI_tic-tac-toe.php" role="button">Play Against</a></p>
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
            <!-- arrows -->
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
                <h2 class="featurette-heading">Stock Market Prediction</h2>
                <p class="lead">Stock prices change based off of people's buying and selling of shares, and since people's actions aren't random, the buying and selling can be predicted. Stock prices can be predicted to move up when certain criteria is met. 
                The option algorithm predicts the price movements for option contracts in the same way the stock algorithm predicts price movements for stocks.</p>
              </div>
              <div class="col-md-5 image" >
                <a href="stock_market.php"><img class="featurette-image img-responsive center-block" src="images/carousel-images/stock_market/stock10.jpg"></a>
              </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
              <div class="col-md-7">
                <h2 class="featurette-heading">Sports Prediction</h2>
                <p class="lead">Algorithms are used to predict which team will win in a game, and their chance of winning. This can be used to win sports bets. Sports leagues: NBA, NHL, and MLB. </p>
              </div>
              <div class="col-md-5 image" >
                <a href="sports.php"><img class="featurette-image img-responsive center-block" src="images/carousel-images/sports_betting/sports6.jpg"></a>
              </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
              <div class="col-md-7">
                <h2 class="featurette-heading">AI Poker</h2>
                <p class="lead"></p>
              </div>
              <div class="col-md-5 image" >
                <img class="featurette-image img-responsive center-block" src="images/carousel-images/AI_poker/poker4.jpg">
              </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
              <div class="col-md-7">
                <h2 class="featurette-heading">AI Tic-Tac-Toe</h2>
                <p class="lead"></p>
              </div>
              <div class="col-md-5 image" >
                <a href=""><img class="featurette-image img-responsive center-block" src="images/carousel-images/tic-tac-toe/ttt2.png"></a>
              </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
              <div class="col-md-7">
                <h2 class="featurette-heading">AI Ultimate Tic-Tac-Toe</h2>
                <p class="lead"></p>
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