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
        <div>
            <p class="title">Algorithmic Sports Betting</p>
        </div>
       <div class="content">
           
           <p>Algorithms will be used to predict odds in sports games and bet accordingly.</p>
           
           <p style='padding-top:30px;text-decoration:underline;'>Current Sports:</p>
           
          
           
           
           
            <table id="header_table" style="height:70px;margin-top:10px;width:600px;">
                <tbody>
                    <tr>
                        <td class="left_header_button header_button" style="width:33%;border-left:1px solid rgb(200,200,200);">
                            <a href="./nba.php?season=2015" class="header_link">
                                <table style="margin:0 auto;height:100%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img class="icon" src="./images/nba.png" style="height:40px;"/>
                                            </td>
                                            <td>
                                                <p class="header_button_text" style='font-size:12px;'>Basketball (NBA)</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </a>
                         </td>
<!--                    </tr>
                    <tr>-->
                         <td class="middle_header_button header_button" style="width:33%">
                             <a href="./nhl.php"  class="header_link">
                                 <table style="margin:0 auto;height:100%;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img class="icon" src="./images/nhl2.png" style="height:50px;"/>
                                            </td>
                                            <td>
                                                <p class="header_button_text" style='font-size:12px;'>Hockey (NHL)</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                             </a>
                         </td>
<!--                    </tr>
                    <tr>-->
                         <td class="right_header_button header_button" style="width:33%;border-right:1px solid rgb(200,200,200);">
                             <a href="./mlb.php?season=2016"  class="header_link">
                                 <table style="margin:0 auto;height:100%;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img class="icon" src="./images/mlb.png" style="height:50px;"/>
                                            </td>
                                            <td>
                                                <p class="header_button_text" style='font-size:12px;'>Baseball (MLB)</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                             </a>
                         </td>
                    </tr>
                </tbody>
            </table>
           
           
           
           
           
           
           
<!--           <a href="./nba.php?season=2015" class="link" ><p>NBA</p></a>
           <a href="./nhl.php" class="link" ><p>NHL</p></a>
           <a href="./mlb.php?season=2016" class="link" ><p>MLB</p></a>-->
           
           <p style='padding-top:30px;text-decoration:underline;'>Future Sports:</p>
           <table id="header_table" style="height:70px;margin-top:10px;width:200px;">
                <tbody>
                    <tr>
                         <td class="middle_header_button header_button" style="width:33%;border-left:1px solid rgb(200,200,200);">
                             
                                 <table style="margin:0 auto;height:100%;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img class="icon" src="./images/nfl.png" style="height:50px;"/>
                                            </td>
                                            <td>
                                                <p class="header_button_text" style='font-size:12px;'>Football (NFL)</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                             
                         </td>
                    </tr>
                </tbody>
            </table>
           
           
           <p style="margin-top:30px;"></p>
       </div>
        
        
        
        
        <div class="overlay_background" onClick="$('.overlay_background').hide();" style="display:none;">
            <div id="image_overlay" ></div>
        </div>
        
            
        <?php include("./footer.php"); ?>
    </body>
</html>