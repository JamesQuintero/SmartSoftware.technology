<?php
include('universal_functions.php');

$view = "overview";
if(!empty($_GET['view']))
{
    $view = htmlspecialchars($_GET['view']);
}

?>
<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="SmartSoftware is an Artificial Intelligence development project" />
        <meta name="keywords" content="A.I., AI, Artificial Intelligence, sports, betting, odds, sports betting" />
        
        <title>Smart Software - A.I. Sports Betting</title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />


        <?php include('code_header.php'); ?>
        <link href="css/dashboard.css" rel="stylesheet">
        <link href="css/custom_dashboard.css" rel="stylesheet">

        <script type="text/javascript">

            $(document).ready(function(){

                var view = "<?php echo $view; ?>";
                if(view=="overview")
                {
                    $('#overview').show();
                    $('#nba').hide();
                    $('#nhl').hide();
                    $('#mlb').hide();
                }
                else if(view=="nba")
                {
                    // $('#title').html("Option Algorithm Information");
                    $('#overview').hide();
                    $('#nba').show();
                    $('#nhl').hide();
                    $('#mlb').hide();
                }
                else if(view=="nhl")
                {
                    // $('#title').html("Stock Algorithm");
                    $('#overview').hide();
                    $('#nba').hide();
                    $('#nhl').show();
                    $('#mlb').hide();
                }
                else if(view=="mlb")
                {
                    // $('#title').html("Stock Algorithm");
                    $('#overview').hide();
                    $('#nba').hide();
                    $('#nhl').hide();
                    $('#mlb').show();
                }
            });
            
            // function enlarge(image)
            // {
            //     $('.overlay_background').show();
            //     $("#image_overlay").html("<img id='image' src='http://smartsoftware.technology/poker_content/"+image+"_large.png' style='width:100%;'/>");
            //     $('#image').load(function(){
            //         center_image("#image");
            //     });
            // }
            
            
            <?php include('js/required_google_analytics.js'); ?>
        </script>

        <style>
            .left_column{
                white-space:nowrap;
                font-weight:bold;
            }
        </style>
    </head>
    <body>
        <?php include('index_header.php'); ?>


        <?php include('index_header.php'); ?>





















        <div class="container-fluid">
          <div class="row">
             <!-- sidebar -->
            <div class="col-sm-3 col-md-2 sidebar">
              <ul class="nav nav-sidebar">
                <li><p style="font-weight:bold;font-size:20px;padding-left:20px;padding-right:20px;">Sports Games Predictor</p></li>
                <li <?php if($view=="overview") echo "class='active'"; ?> ><a href="?view=overview">Overview</a></li>
                <li <?php if($view=="nba") echo "class='active'"; ?> ><a href="?view=nba">Basketball (NBA)</a></li>
                <li <?php if($view=="nhl") echo "class='active'"; ?> ><a href="?view=nhl">Hockey (NHL)</a></li>
                <li <?php if($view=="mlb") echo "class='active'"; ?> ><a href="?view=mlb">Baseball (MLB)</a></li>
              </ul>
              <!-- <ul class="nav nav-sidebar">
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
              </ul>
              <ul class="nav nav-sidebar">
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
              </ul> -->
            </div>



            <!-- overview content -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="overview">
                <h1 class="page-header" >Overview</h1>
                <p>Sports games outcomes can be modeled using algorithms, and the user can then place betss that give them the best long-term odds. The program will outcome a percentage chance of the favorable team to win, and the corresponding odds (ex: -145). If odds makers give odds that are less than the prediction, that means the program believes the favorable team has a higher chance of winning than the oddsmakers think. It would be in the user's best interest to place a bet on the favorable team. </p>
                
            </div>

            <!-- Option algorithm content -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="nba">
                <h1 class="page-header" >Basketball (NBA) predictions</h1>


                <p>An algorithm is used to predict which NBA team is favorable to win a game, and by how much. Bets are placed if odds are favorable for long-term reward.</p>
                <p>Columns:</p>
                <div class="table-responsive thin_table">
                    <table class="table table-bordered definition-table">
                        <tbody>
                            <tr>
                                <td class="left_column"><p>Away Team</p></td>
                                <td><p>The team that is playing in a foreign stadium. Blue means the algo favors them.</p></td>
                            </tr>
                            <tr>
                                <td class="left_column"><p>Home Team</p></td>
                                <td><p>The team that is playing in their home stadium. Blue means the algo favors them.</p></td>
                            </tr>
                            <tr>
                                <td class="left_column"><p>Algo Proj</p></td>
                                <td><p>Algorithm's projected percentage change of winning. Positive percentage favors the away team, and a negative favors the home team.</p></td>
                            </tr>
                            <tr>
                                <td class="left_column"><p>Away Proj</p></td>
                                <td><p>Algorithm's calculated betting odds for the away team. If negative, moneyline odds that are lower negatives should be taken. If positive, moneyline odds that are higher should be taken.</p></td>
                            </tr>
                            <tr>
                                <td class="left_column"><p>Home Proj</p></td>
                                <td><p>Algorithm's calculated betting odds for the home team. If negative, moneyline odds that are lower negatives should be taken. If positive, moneyline odds that are higher should be taken.</p></td>
                            </tr>
                            <tr>
                                <td class="left_column"><p>Away odds</p></td>
                                <td><p>Moneyline betting odds for the away team provided by Bovada.lv (if green, these odds are favorable enough to bet on).</p></td>
                            </tr>
                            <tr>
                                <td class="left_column"><p>Home odds</p></td>
                                <td><p>Moneyline betting odds for the home team provided by Bovada.lv (if green, these odds are favorable enough to bet on).</p></td>
                            </tr>
                            <tr>
                                <td class="left_column"><p>Diff Away</p></td>
                                <td><p>The difference between the algorithm's projected moneyline odds for the away team, and the actual moneyline odds.</p></td>
                            </tr>
                            <tr>
                                <td class="left_column"><p>Diff Home</p></td>
                                <td><p>The difference between the algorithm's projected moneyline odds for the home team, and the actual moneyline odds.</p></td>
                            </tr>
                            <tr>
                                <td class="left_column"><p>Bet</p></td>
                                <td><p>The amount bet.</p></td>
                            </tr>
                            <tr>
                                <td class="left_column"><p>To win</p></td>
                                <td><p>The projected To Win size (profit) based off the bet size.</p></td>
                            </tr>
                            <tr>
                                <td class="left_column"><p>Won</p></td>
                                <td><p>Amount won (revenue) from specified bet.</p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <p>Algorithm Strategies:</p>
                <div class="table-responsive thin_table">
                    <table class="table table-bordered definition-table">
                        <tbody>
                            <tr>
                                <td class="left_column"><p>Strategy 0.0</p></td>
                                <td><p>Bet on algo's projected winner, no matter the odds.</p></td>
                            </tr>
                            <tr>
                                <td class="left_column"><p>Strategy 0.1</p></td>
                                <td><p>Bet on oddsmaker's projected winner, no matter the odds.</p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p>All below strategies incorporate placing a bet if the algorithm projects a team to win more often than the oddsmaker projects.</p>
                <div class="table-responsive thin_table">
                    <table class="table table-bordered definition-table">
                        <tbody>
                            <tr>
                                <td class="left_column"><p>Strategy 1</p></td>
                                <td><p>Default strategy.</p></td>
                            </tr>
                            <tr>
                                <td class="left_column"><p>Strategy 2</p></td>
                                <td><p>Placing a bet if that team is also the algo's favorite.</p></td>
                            </tr>
                            <tr>
                                <td class="left_column"><p>Strategy 3</p></td>
                                <td><p>Placing a bet if that team is the algo's favorite, and the oddsmaker's underdog.</p></td>
                            </tr>
                            <tr>
                                <td class="left_column"><p>Strategy 4</p></td>
                                <td><p>Placing a bet if the difference between the algo's projected odds and the oddsmaker's odds is also >= 100</p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                                
            </div>






              
          </div>
        </div>
    
    </body>
</html>