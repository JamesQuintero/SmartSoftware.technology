<?php
include('universal_functions.php');

log_IP("poker");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta name="description" content="SmartSoftware is an Artificial Intelligence development project" />
        <meta name="keywords" content="A.I., AI, Artificial Intelligence, poker, Texas Holdem" />
        <title>Smart Software - A.I. Poker</title>
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
           <p>Artificial Intelligence will be a dominating force in future poker play. Current bots that play on online poker sites are not true A.I., and are only as good as the creators. Our A.I. poker program will be able to learn from its previous play to get better, and will be able to beat the best in the world.</p>
           <p style='padding-top:10px;'>August 2016: Users will be able to play heads up against the A.I. A prize may be awarded if the player wins.</p>
           
       </div>
        
        <div class="overlay_background" onClick="$('.overlay_background').hide();" style="display:none;">
            <div id="image_overlay" ></div>
        </div>
        
            
        <?php include("./footer.php"); ?>
    </body>
</html>