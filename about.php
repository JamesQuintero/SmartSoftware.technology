<?php
include('universal_functions.php');

?>
<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <meta name="description" content="SmartSoftware is an Artificial Intelligence development project" />
        <meta name="keywords" content="smart software, smartsoftware, about, A.I., AI, Artificial Intelligence" />
        <title>Smart Software - A.I. Sports Betting</title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />


        <?php include('code_header.php'); ?>
        <link href="css/carousel.css" rel="stylesheet">

        <script type="text/javascript">
            
            function display_email()
            {
                var name="james";
                var domain="smartsoftware";
                var ext="technology";
                $('#asdf').html(name+"@"+domain+"."+ext);
            }
            
            $(document).ready(function(){
               display_email() 
            });
            
            <?php include('js/required_google_analytics.js'); ?>
        </script>

        <style>
            body{
                background:url("./images/carousel-images/AI/cover.jpg");
                background-size:100%;
                background-position:50% 0%;
                background-attachment:fixed;
            }
            .marketing{
                background-color:rgba(250,250,250,0.9);
                /*border:1px solid gray;
                box-shadow:0px 0px 20px gray;*/
                box-shadow:0px 0px 200px white;
            }
            .img-circle{
                border:1px solid gray;
            }
        </style>
    </head>
    <body>
        <?php include('index_header.php'); ?>
        




    
        <div class="container marketing" style="padding-top:50px;">

            <h1>About</h1>

            <p>Smart Software aims to bring general artificial intelligence into the world. This general AI will aid in practically all industries, which will then raise the living standards for everyone. </p>

          <!-- Three columns of text below the carousel -->
          <div class="row" style="padding-top:30px;">

            <div class="col-lg-4">
              <img class="img-circle" src="./images/people/james.PNG" alt="Generic placeholder image" width="140" height="140">
              <h2>James Quintero</h2>
              <p>Undergraduate computer science student at San Francisco State University.</p>
              <p id="asdf"></p>
              <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
            </div>

            <!-- <div class="col-lg-4">
              <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
              <h2>Heading</h2>
              <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div>

            <div class="col-lg-4">
              <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
              <h2>Heading</h2>
              <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div> -->

          </div>


          <footer>
            <p>&copy; 2017 Smart Software</p>
          </footer>

        </div>



    </body>
</html>