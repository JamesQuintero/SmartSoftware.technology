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
      <meta name="keywords" content="A.I., AI, Artificial, Intelligence, Artificial Intelligence, Machine Learning, Neural Networks, Bot, " />
      <title>Smart Software - AI Development</title>
      
      <?php include('code_header.php'); ?>
      <link href="css/cover.css" rel="stylesheet">



      <script type="text/javascript">
         $(document).ready(function()
         {
            <?php
                include('required_jquery.php');
            ?>
         });
      </script>

      <style>
        
        footer{
          /*color:rgb(50,50,50);*/
          color:white;
        }
        #header_table{
          margin:0 auto;
          display:inline;
          color:rgb(50,50,50);
        }
        .cover{
          background:rgba(250,250,250,0.9);
          padding:10px;
          padding-left:20px;
          padding-right:20px;
          border-radius:20px;
          border:1px solid rgb(150,150,150);
          box-shadow:inset 0px 0px 5px rgb(200,200,200);
          text-shadow:none;
          color:rgb(50,50,50);
        }
        .site-wrapper{
          -webkit-box-shadow:inset 0 0 100px rgba(0,0,0,0.2);
          box-shadow:inset 0 0 100px rgba(0,0,0,0.2);
        }
        .btn-default{
          border:1px solid rgb(200,200,200);
        }
        .btn-default:hover{
          border:1px solid rgb(50,50,50);
        }
        .masthead-brand{
          color:black;
          text-shadow:none;
        }
        .masthead-nav .active a{
          color:rgba(50,50,50,0.75);
          border-bottom-color:rgb(200,200,200);
        }
        .masthead-nav .active a:hover{
          color:rgba(50,50,50,1);
          border-bottom-color:rgb(50,50,50);
        }
        .masthead-nav li a{
          color:rgba(50,50,50,0.75);
          text-shadow:none;
        }
        .masthead-nav li a:hover{
          color:rgba(50,50,50,0.75);
          text-shadow:none;
          border-bottom-color:rgb(200,200,200);
        }
      </style>

   </head>
   <body>

      <?php include("index_header.php"); ?>
       
      <div class="site-wrapper">
        <div class="site-wrapper-inner">
          <div class="cover-container">

            <!-- <div class="masthead clearfix">
              <div class="inner">
                <h3 class="masthead-brand">Smart Software</h3>
                <nav>
                  <ul class="nav masthead-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="projects">Projects</a></li>
                    <li><a href="about">About</a></li>
                  </ul>
                </nav>
              </div>
            </div> -->


            <div class="inner cover">
              
              <table id="header_table">
                <tbody>
                  <tr>
                    <td>
                      <h1 class="cover-heading">Smart Software</h1>
                    </td>
                    <td>
                      <img src="favicon.ico" style="height:36px"/>
                    </td>
                  </tr>
                </tbody>
              </table>

              
              <p class="lead">Artificial Intelligence will be humanity's most powerful tool, and we're trying to make that a reality.</p>
              <p class="lead">
                <a href="projects.php" class="btn btn-lg btn-default">View Projects</a>
              </p>
            </div>

            <div class="mastfoot">
              <div class="inner">
                <!-- FOOTER -->
            <footer>
              <p>&copy; 2017 Smart Software</p>
            </footer>
              </div>
            </div>

          </div>

        </div>

      </div>

        




   </body>
</html>