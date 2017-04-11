<?php
include('universal_functions.php');

log_IP("about");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta name="description" content="SmartSoftware is an Artificial Intelligence development project" />
        <meta name="keywords" content="smart software, smartsoftware, about, A.I., AI, Artificial Intelligence" />
        <title>Smart Software - A.I. Sports Betting</title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <?php include('code_header.php'); ?>
        <script type="text/javascript" src="./main.js"></script>
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
            
            <?php include('required_google_analytics.js'); ?>
        </script>
    </head>
    <body>
        <?php include('index_header.php'); ?>
       
       <div class="content">
           
           <p>Smart Software's goal is to display the power of artificial intelligence.</p>
           <p style='padding-top:30px;'>Founder: James Quintero</p>
           <p id='asdf'></p>
           
           
           
       </div>
        
        <?php include("./footer.php"); ?>
    </body>
</html>