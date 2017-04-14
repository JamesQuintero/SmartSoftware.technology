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


      <script type="text/javascript">
         $(document).ready(function()
         {
            <?php
                include('required_jquery.php');
            ?>
         });
      </script>
   </head>
   <body>
        <?php include('index_header.php'); ?>
       
       <!-- <div class="content" style="border-top:none;">
           <p>Artificial Intelligence development. </p>
           <p>Smart Software has an algorithm for <a href="./algo.php" class="link">stock market predictions</a>, and <a href="./betting.php" class="link">sports team betting.</a> </p>
       </div> -->
       






       











          




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
                <img class="first-slide" src="https://previews.123rf.com/images/alexmit/alexmit1210/alexmit121000034/16074841-Stock-market-graph-background-Stock-Photo-exchange.jpg" alt="First slide">
                <div class="container">
                  <div class="carousel-caption">
                    <h1>Stock Market Prediction</h1>
                    <p>Algorithms used to predict stock price movements.</p>
                    <p><a class="btn btn-lg btn-success" href="algo.php" role="button">View Predictions</a></p>
                  </div>
                </div>
              </div>
              <div class="item">
                <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
                <div class="container">
                  <div class="carousel-caption">
                    <h1>Algorithmic Sports Betting</h1>
                    <p>Algorithms used to predict game outcomes for NBA, NHL, and MLB games.</p>
                    <p><a class="btn btn-lg btn-primary" href="betting.php" role="button">View Predictions</a></p>
                  </div>
                </div>
              </div>

              <div class="item">
                <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
                <div class="container">
                  <div class="carousel-caption">
                    <h1>AI Poker</h1>
                    <p>Play Texas Holdem Poker against a self-learning neural network.</p>
                    <p><a class="btn btn-lg btn-default disabled" href="" role="button">Available Soon</a></p>
                  </div>
                </div>
              </div>


              <div class="item">
                <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
                <div class="container">
                  <div class="carousel-caption">
                    <h1>AI Tic-Tac-Toe</h1>
                    <p>Play Tic-Tac-Toe against a self-taught neural network.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Play Against</a></p>
                  </div>
                </div>
              </div>

              <div class="item">
                <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
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
          </div><!-- /.carousel -->


          <!-- Marketing messaging and featurettes
          ================================================== -->
          <!-- Wrap the rest of the page in another container to center all the content. -->

          <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row">
              <div class="col-lg-4">
                <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                <h2>Heading</h2>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
              </div><!-- /.col-lg-4 -->
              <div class="col-lg-4">
                <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                <h2>Heading</h2>
                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
              </div><!-- /.col-lg-4 -->
              <div class="col-lg-4">
                <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                <h2>Heading</h2>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
              </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->


            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <div class="row featurette">
              <div class="col-md-7">
                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
              </div>
              <div class="col-md-5">
                <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
              </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
              <div class="col-md-7 col-md-push-5">
                <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
              </div>
              <div class="col-md-5 col-md-pull-7">
                <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
              </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
              <div class="col-md-7">
                <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
              </div>
              <div class="col-md-5">
                <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
              </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->


            <!-- FOOTER -->
            <footer>
              <p>&copy; 2017 Smart Software &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
            </footer>

          </div><!-- /.container -->

        









       
       
       
       
       
              
       
       
       
       
       


      <?php include('footer.php'); ?>
   </body>
</html>