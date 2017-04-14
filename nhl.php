<?php
include('universal_functions.php');

log_IP("nhl");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta name="description" content="SmartSoftware is an Artificial Intelligence development project" />
        <meta name="keywords" content="A.I., AI, Artificial Intelligence, sports, betting, odds, sports betting" />
        <title>Smart Software - Algorithmic Sports Betting</title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <?php include('code_header.php'); ?>
        <script type="text/javascript" src="./main.js"></script>
        <script type="text/javascript">
            
            
            <?php include('required_jquery.js'); ?>
            <?php include('required_google_analytics.js'); ?>
        </script>
    </head>
    <body>
        <?php include('index_header.php'); ?>
       <div>
            <p class="title">NHL Algorithm</p>
        </div>
       <div class="content">
           
           <p>An algorithm is used to predict which NHL team is favorable to win a game, and by how much. Bets are placed if odds are favorable for long-term reward.</p>
           
           <p style='margin-top:20px;'>The NHL algorithm was developed right before the end of the 2016 regular NHL season, so it wasn't used to make bets. It was finished in time to create
           a 2016 NHL playoffs bracket. The bracket was successful, with it predicting the eventual champion, and getting into the 99.8th percentile. </p>
           <p style="margin-top:5px;">Brackets for previous years will be created and analyzed. I think 2016 was a fluke success, so I'm expecting preceding years to not do as well.</p>
           
           <p style="font-size:16px;margin-top:20px;" >2016 NHL Bracket</p>
           <div class="graph_container" style='margin-top:0px;padding-top:0px;'>
                <table>
                    <tbody>
                        <tr>
                            <td style="vertical-align:bottom;width:50%">
                                <img style="width:100%;border-top-left-radius:3px;border-top-right-radius:3px;" src="./betting_content/nhl/NHL_2016_bracket.PNG"/>
                            </td>
                            <td style="width:50%;">
                                <img style="width:100%;border-top-left-radius:3px;border-top-right-radius:3px;" src="./betting_content/nhl/NHL_2016_bracket_results.PNG"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p style="padding:20px;">This is the bracket made by the algorithm before the playoffs started. No bets were made at this time, because the algorithm was still unproven.</p>
                            </td>
                            <td>
                                <p style="padding:20px;">This bracket shows the results of the playoffs. It shows which teams the algorithm got right, and how well it stacked up to the other submitted brackets.
                                In all, the algorithm did very well. It's mainly luck that it did so well since NHL game outcomes aren't very predictable; Especially playoff games.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
           </div>
           
           
       </div>
        
        
            
        <?php include("./footer.php"); ?>
    </body>
</html>