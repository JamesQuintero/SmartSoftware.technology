<?php
include('universal_functions.php');

log_IP("betting");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta name="description" content="SmartSoftware is an Artificial Intelligence development project" />
        <meta name="keywords" content="A.I., AI, Artificial Intelligence, sports, betting, odds, sports betting" />
        <title>Smart Software - A.I. Sports Betting</title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <?php include('code_header.php'); ?>
        <script type="text/javascript" src="./main.js"></script>
        <script type="text/javascript">
            
            function enlarge(image)
            {
                $('.overlay_background').show();
                $("#image_overlay").html("<img id='image' src='http://smartsoftware.technology/poker_content/"+image+"_large.png' style='width:100%;'/>");
                $('#image').load(function(){
                    center_image("#image");
                });
            }
            
            
            <?php include('required_jquery.js'); ?>
            <?php include('required_google_analytics.js'); ?>
        </script>
    </head>
    <body>
        <?php include('index_header.php'); ?>
       
       <div class="content">
           
           <p>Algorithms will be used to predict odds in sports games and bet accordingly.</p>
           
           <p style='padding-top:30px;text-decoration:underline;'>Current Sports:</p>
           <p>NBA</p>
           <p>NHL</p>
           
           <p style='padding-top:30px;text-decoration:underline;'>Future Sports:</p>
           <p>NFL</p>
           <p>MLB</p>
           
           <p style="margin-top:30px;"></p>
       </div>
        
        
        
        
        <div class="overlay_background" onClick="$('.overlay_background').hide();" style="display:none;">
            <div id="image_overlay" ></div>
        </div>
        
            
        <?php include("./footer.php"); ?>
    </body>
</html>