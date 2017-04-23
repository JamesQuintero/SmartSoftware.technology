<?php
include('universal_functions.php');

$view = "overview";
if(!empty($_GET['view']))
    $view = htmlspecialchars($_GET['view']);

$season="";
if(!empty($_GET['season']))
    $season=(string)$_GET['season'];

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

        <script src="js/jquery.csv.js"></script>
        <script type="text/javascript">

            $(document).ready(function(){

                var view = "<?php echo $view; ?>";
                if(view=="overview")
                {
                    $('#overview').show();
                    // $('#nba').hide();
                    // $('#nhl').hide();
                    $('#mlb').hide();

                    $('#nba_seasons').hide();
                    $('#nba_overview_seasons').hide();
                    $('#nhl_seasons').hide();
                    $('#nhl_overview_seasons').hide();

                    //hides seasons links and removes hrefs
                    $("#seasons_list").hide();
                    $('#seasons_list').children("li").children("a").removeAttr("href");
                }
                else if(view=="nba")
                {
                    // $('#title').html("Option Algorithm Information");
                    $('#overview').hide();
                    $('#nba').show();
                    $('#nhl').hide();
                    $('#mlb').hide();

                    displayNBA();
                }
                else if(view=="nhl")
                {
                    // $('#title').html("Stock Algorithm");
                    $('#overview').hide();
                    $('#nba').hide();
                    $('#nhl').show();
                    $('#mlb').hide();

                    displayNHL();
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



            function displayNBA()
            {
                if("<?php echo $season ?>"=="")
                    $('#nba_seasons').hide();
                else
                {
                    $('#nba_info').hide();
                    $("#nba_header").html("Basketball (NBA) predictions for <?php echo $season; ?> season"); 
                    $("#nhl_panel_header").html("<?php echo $season; ?> Playoffs Prediction and Results");

                    $('#nba_<?php echo $season; ?>_series_predictions').show();
                }

                var data = get_betting_data("nba");
                make_betting_table("nba", data);
            }

            function displayNHL()
            {
                if("<?php echo $season ?>"=="")
                    $('#nhl_seasons').hide();
                else
                {
                    $('#nhl_info').hide();
                    $("#nhl_header").html("Hockey (NHL) predictions for <?php echo $season; ?> season"); 
                    $("#nhl_panel_header").html("<?php echo $season; ?> Playoffs Prediction and Results");
                    $('#nhl_bracket_prediction').attr("src", "betting_content/nhl/NHL_<?php echo $season; ?>_bracket.PNG");
                    $('#nhl_bracket_result').attr("src", "betting_content/nhl/NHL_<?php echo $season; ?>_bracket_results.PNG");

                    $('#nhl_<?php echo $season; ?>_series_predictions').show();

                    <?php 
                        if($season=="2017")
                        {
                            echo "$('#nhl_prediction_cell').css('vertical-align', 'top');";
                            echo "$('#playoffs_bracket_images').show();";
                        }
                        else if($season=="2016")
                        {
                            echo "$('#nhl_prediction_cell').css('vertical-align', 'bottom');";
                            echo "$('#playoffs_bracket_images').show();";
                        } 
                    ?>
                }

                // var data = get_betting_data("nhl");
                // make_betting_table("nhl", data);
            }
            


            //retrieves betting data
            function get_betting_data(league)
            {
                if("<?php echo $season; ?>"=="all")
                {
                    var total="";
                    
                    for(var x =2009; x<=2015; x++)
                    {
                        var data = get_betting_data2(league, x);
                        total+=data;
                    }
                    
                    return total;
                }
                else
                    return get_betting_data2(league, <?php echo (int)str_replace("", ".", $season); ?>);
            }
            
            //used by get_betting_data()
            function get_betting_data2(league, season)
            {
                var to_return="";
                
                try
                {
                    var url="./betting_content/"+league+"/"+season+"_"+league+"_bets.txt";
                    $.ajax({
                        async: false,
                        type: "GET",
                        url: url,
                        dataType: "text",
                        success: function(data) {
                            console.log(url);
                            console.log("Returning "+season+"'s data... "+data.length);
                            to_return=data;
                        }
                     });
                 } catch(error)
                 {
                     
                 }
                 
                 return to_return;
            }
            
            function convert_team(league, team_name)
            {
                if(league=="nba")
                {
                    var team_names = {
                        "atl" : "atlanta-hawks",
                        "bos" : "boston-celtics",
                        "bkn" : "brooklyn-nets",
                        "cha": "charlotte-hornets",
                        "chi" : "chicago-bulls",
                        "cle" : "cleveland-cavaliers",
                        "dal" : "dallas-mavericks", 
                        "den" : "denver-nuggets",
                        "det" : "detroit-pistons",
                        "gs" : "golden-state-warriors",
                        "hou" : "houston-rockets", 
                        "ind" : "indiana-pacers",
                        "lac" : "los-angeles-clippers",
                        "lal" : "los-angeles-lakers",
                        "mem" : "memphis-grizzlies",
                        "mia" : "miami-heat",
                        "mil" : "milwaukee-bucks",
                        "min" : "minnesota-timberwolves",
                        "no" : "new-orleans-pelicans",
                        "ny" : "new-york-knicks",
                        "okc" : "oklahoma-city-thunder",
                        "orl" : "orlando-magic",
                        "phi" : "philadelphia-76ers",
                        "phx" : "phoenix-suns",
                        "por" : "portland-trail-blazers",
                        "sac" : "sacramento-kings",
                        "sa" : "san-antonio-spurs",
                        "tor" : "toronto-raptors",
                        "utah" : "utah-jazz",
                        "wsh" : "washington-wizards"
                      };
                      
                      //converts "lal" to "los-angeles-lakers"
                      if(team_name in team_names)
                      {
                          return team_names[team_name];
                      }
                      //converts "los-angeles-lakers" to "lal"
                      else
                      {
                          for(var key in team_names)
                          {
                              if(team_names[key] == team_name)
                                  return key;
                          }
                          return "";
                      }
                  }
                  // else if(league=="nhl")
                  //   {
                  //       var team_names = {
                  //           "ana" : "anaheim-ducks",
                  //           "ari" : "arizona-coyotes",
                  //           "bos" : "boston-bruins",
                  //           "buf" : "buffalo-sabres",
                  //           "cgy" : "calgary-flames",
                  //           "car" : "carolina-hurricanes",
                  //           "chi" : "chicago-blackhawks",
                  //           "col" : "colorado-avalanche",
                  //           "cbj" : "columbus-blue-jackets",
                  //           "dal" : "dallas-stars",
                  //           "det" : "detroit-red-wings",
                  //           "edm" : "edmonton-oilers",
                  //           "fla" : "florida-panthers",
                  //           "la" : "los-angeles-kings",
                  //           "min" : "minnesota-wild",
                  //           "mtl" : "montreal-canadiens",
                  //           "nsh" : "nashville-predators",
                  //           "nj" : "new-jersey-devils",
                  //           "nyi" : "new-york-islanders",
                  //           "nyr" : "new-york-rangers",
                  //           "ott" : "ottawa-senators",
                  //           "phi" : "philadelphia-flyers",
                  //           "pit" : "pittsburgh-penguins",
                  //           "sj" : "san-jose-sharks",
                  //           "stl" : "st-louis-blues",
                  //           "tb" : "tampa-bay-lightning",
                  //           "tor" : "toronto-maple-leafs",
                  //           "van" : "vancouver-canucks",
                  //           "wsh" : "washington-capitals",
                  //           "wpg" : "winnipeg-jets"
                  //         };
                  //         //converts "lal" to "los-angeles-lakers"
                  //         if(team_name in team_names)
                  //         {
                  //             return team_names[team_name];
                  //         }
                  //         //converts "los-angeles-lakers" to "lal"
                  //         else
                  //         {
                  //             for(var key in team_names)
                  //             {
                  //                 if(team_names[key] == team_name)
                  //                     return key;
                  //             }
                  //             return "";
                  //         }
                  //     }
                  
            }
            
            
            <?php include('js/required_google_analytics.js'); ?>
        </script>

        <style>
            .left_column{
                white-space:nowrap;
                font-weight:bold;
            }
            .panel{
                display:inline-block;
            }
        </style>
    </head>
    <body>
        <?php include('index_header.php'); ?>



        <div class="container-fluid">
          <div class="row">
             <!-- sidebar -->
            <div class="col-sm-3 col-md-2 sidebar">
              <ul class="nav nav-sidebar">
                <li><p style="font-weight:bold;font-size:16px;padding-left:20px;padding-right:20px;">Sports Games Predictor</p></li>
                <li <?php if($view=="overview") echo "class='active'"; ?> ><a href="?view=overview">Overview</a></li>
                <li <?php if($view=="nba") echo "class='active'"; ?> ><a href="?view=nba">Basketball (NBA)</a></li>
                <li <?php if($view=="nhl") echo "class='active'"; ?> ><a href="?view=nhl">Hockey (NHL)</a></li>
                <li <?php if($view=="mlb") echo "class='active'"; ?> ><a href="?view=mlb">Baseball (MLB)</a></li>
              </ul>
              <hr />
              <ul class="nav nav-sidebar" id="seasons_list">
                <li <?php if($season=="") echo "class='active'"; ?> ><a href="?view=<?php echo $view; ?>">Info</a></li>   
                <!-- <li <?php if($season=="all") echo "class='active'";   if($view=="nhl") echo "style='display:none;'"; ?> ><a href="?view=<?php echo $view; ?>&season=all">All Seasons</a></li> -->
                <li <?php if($season=="2017") echo "class='active'";   ?> ><a href="?view=<?php echo $view; ?>&season=2017">2017</a></li>
                <li <?php if($season=="2016") echo "class='active'";   ?> ><a href="?view=<?php echo $view; ?>&season=2016">2016</a></li>
                <li <?php if($season=="2015") echo "class='active'";   ?> ><a href="?view=<?php echo $view; ?>&season=2015">2015</a></li>
                <li <?php if($season=="2014") echo "class='active'";   ?> ><a href="?view=<?php echo $view; ?>&season=2014">2014</a></li>
                <li <?php if($season=="2013") echo "class='active'";   ?> ><a href="?view=<?php echo $view; ?>&season=2013">2013</a></li>
                <li <?php if($season=="2012") echo "class='active'";   ?> ><a href="?view=<?php echo $view; ?>&season=2012">2012</a></li>
                <li <?php if($season=="2011") echo "class='active'";   if($view=="nhl") echo "style='display:none;'"; ?> ><a href="?view=<?php echo $view; ?>&season=2011">2011</a></li>
                <li <?php if($season=="2010") echo "class='active'";   if($view=="nhl") echo "style='display:none;'"; ?> ><a href="?view=<?php echo $view; ?>&season=2010">2010</a></li>
                <li <?php if($season=="2009") echo "class='active'";   if($view=="nhl") echo "style='display:none;'"; ?> ><a href="?view=<?php echo $view; ?>&season=2009">2009</a></li>
              </ul>
              <!--
              <ul class="nav nav-sidebar">
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
              </ul>-->
            </div>



            <!-- overview content -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="overview">
                <h1 class="page-header" >Overview</h1>
                <p>Sports games outcomes can be modeled using algorithms, and the user can then place bets that give them the best long-term odds. The program will outcome a percentage chance of the favorable team to win, and the corresponding odds (ex: -145). If odds makers give odds that are less than the prediction, that means the program believes the favorable team has a higher chance of winning than the oddsmakers think. It would be in the user's best interest to place a bet on the favorable team. </p>
                
            </div>

            <!-- nba content -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="nba">
                <h1 class="page-header" id="nba_header">Basketball (NBA) predictions</h1>

                <div id="nba_info">

                    <div class="panel panel-default">
                      <div class="panel-heading">Prediction Results for all seasons</div>

                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Series predicted correctly:</td>
                                    <td>61/90</td>
                                    <td>67%</td>
                                </tr>
                                <tr>
                                    <td>Round 1:</td>
                                    <td>31/48</td>
                                    <td>65%</td>
                                </tr>
                                <tr>
                                    <td>Round 2:</td>
                                    <td>18/24</td>
                                    <td>75%</td>
                                </tr>
                                <tr>
                                    <td>Conference:</td>
                                    <td>7/12</td>
                                    <td>58%</td>
                                </tr>
                                <tr>
                                    <td>Final:</td>
                                    <td>3/6</td>
                                    <td>50%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="nba_overview_seasons">
                        <p>Below, bold is the team picked by the algorithm. Series score is on the right of the teams. 
                        Green indicates a correct series prediction, and red indicates an incorrect prediction.</p>
                        <p>If a prediction is incorrect, the next round is recalculated with the new winning team.</p>

                        <?php include("./betting_content/nba/seasons/nba_2017.php"); ?>
                        <?php include("./betting_content/nba/seasons/nba_2016.php"); ?>
                        <?php include("./betting_content/nba/seasons/nba_2015.php"); ?>
                        <?php include("./betting_content/nba/seasons/nba_2014.php"); ?>
                        <?php include("./betting_content/nba/seasons/nba_2013.php"); ?>
                        <?php include("./betting_content/nba/seasons/nba_2012.php"); ?>
                        <?php include("./betting_content/nba/seasons/nba_2011.php"); ?>
                    </div>

                        <!-- <p>An algorithm is used to predict which NBA team is favorable to win a game, and by how much. Bets are placed if odds are favorable for long-term reward.</p>
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
                        </div> -->
                </div>

                <div id="nba_seasons">

                    <!-- displays backtest results -->
                    <!-- <div class="graph_container" style="display:inline-block">
                       <div style="padding:20px;">
                           <table>
                               <tbody>
                                   <tr>
                                       <td style="padding-right:20px;border-right:1px solid white;">
                                           <p style="text-align:center;padding-bottom:5px;text-decoration:underline;">Strategy 0.0:</p>
                                            <table>
                                                <tbody>
                                                    <tr><td><p>Start: <span id="strat_00_base"></span></p></td></tr>
                                                    <tr><td><p>End: <span id="strat_00_revenue"></span></p></td></tr>
                                                    <tr><td><p>Return: <span id="strat_00_perc" ></span></p></td></tr>
                                                    <tr><td><p>Record: <span id="strat_00_record" ></span></p></td></tr>
                                                    <tr><td><p>Avg return/bet: <span id="strat_00_avg_profit" ></span></p></td></tr>
                                                </tbody>
                                            </table>
                                       </td>
                                       <td style="padding-right:20px;padding-left:20px;">
                                           <p style="text-align:center;padding-bottom:5px;text-decoration:underline;">Strategy 0.1:</p>
                                            <table>
                                                <tbody>
                                                    <tr><td><p>Start: <span id="strat_01_base"></span></p></td></tr>
                                                    <tr><td><p>End: <span id="strat_01_revenue"></span></p></td></tr>
                                                    <tr><td><p>Return: <span id="strat_01_perc" ></span></p></td></tr>
                                                    <tr><td><p>Record: <span id="strat_01_record" ></span></p></td></tr>
                                                    <tr><td><p>Avg return/bet: <span id="strat_01_avg_profit" ></span></p></td></tr>
                                                </tbody>
                                            </table>
                                       </td>
                                   </tr>
                               </tbody>
                           </table>
                       </div>
                   </div> -->
                   
                    <!-- displays more backtest results -->
                   <!-- <div class="graph_container" style="display:inline-block">
                       
                       <div style="padding:20px;">
                           <table>
                               <tbody>
                                   <tr>
                                       <td style="padding-right:20px;border-right:1px solid white;">
                                           <p style="text-align:center;padding-bottom:5px;text-decoration:underline;">Strategy 1:</p>
                                            <table>
                                                <tbody>
                                                    <tr><td><p>Start: <span id="strat_1_base"></span></p></td></tr>
                                                    <tr><td><p>End: <span id="strat_1_revenue"></span></p></td></tr>
                                                    <tr><td><p>Return: <span id="strat_1_perc" ></span></p></td></tr>
                                                    <tr><td><p>Record: <span id="strat_1_record" ></span></p></td></tr>
                                                    <tr><td><p>Avg return/bet: <span id="strat_1_avg_profit" ></span></p></td></tr>
                                                </tbody>
                                            </table>
                                       </td>
                                       <td style="padding-left:20px;padding-right:20px;border-right:1px solid white;">
                                           <p style="text-align:center;padding-bottom:5px;text-decoration:underline;">Strategy 2:</p>
                                            <table>
                                                <tbody>
                                                    <tr><td><p>Start: <span id="strat_2_base"></span></p></td></tr>
                                                    <tr><td><p>End: <span id="strat_2_revenue"></span></p></td></tr>
                                                    <tr><td><p>Return: <span id="strat_2_perc" ></span></p></td></tr>
                                                    <tr><td><p>Record: <span id="strat_2_record" ></span></p></td></tr>
                                                    <tr><td><p>Avg return/bet: <span id="strat_2_avg_profit" ></span></p></td></tr>
                                                </tbody>
                                            </table>
                                       </td>
                                       <td style="padding-left:20px;padding-right:20px;border-right:1px solid white;">
                                           <p style="text-align:center;padding-bottom:5px;text-decoration:underline;">Strategy 3:</p>
                                            <table>
                                                <tbody>
                                                    <tr><td><p>Start: <span id="strat_3_base"></span></p></td></tr>
                                                    <tr><td><p>End: <span id="strat_3_revenue"></span></p></td></tr>
                                                    <tr><td><p>Return: <span id="strat_3_perc" ></span></p></td></tr>
                                                    <tr><td><p>Record: <span id="strat_3_record" ></span></p></td></tr>
                                                    <tr><td><p>Avg return/bet: <span id="strat_3_avg_profit" ></span></p></td></tr>
                                                </tbody>
                                            </table>
                                       </td>
                                       <td style="padding-left:20px;padding-right:20px;border-right:1px solid white;">
                                           <p style="text-align:center;padding-bottom:5px;text-decoration:underline;">Strategy 4:</p>
                                            <table>
                                                <tbody>
                                                    <tr><td><p>Start: <span id="strat_4_base"></span></p></td></tr>
                                                    <tr><td><p>End: <span id="strat_4_revenue"></span></p></td></tr>
                                                    <tr><td><p>Return: <span id="strat_4_perc" ></span></p></td></tr>
                                                    <tr><td><p>Record: <span id="strat_4_record" ></span></p></td></tr>
                                                    <tr><td><p>Avg return/bet: <span id="strat_4_avg_profit" ></span></p></td></tr>
                                                </tbody>
                                            </table>
                                       </td>
                                       <td style="padding-left:20px;">
                                           <p style="text-align:center;padding-bottom:5px;text-decoration:underline;">Strategy 3&4:</p>
                                            <table>
                                                <tbody>
                                                    <tr><td><p>Start: <span id="strat_3_4_base"></span></p></td></tr>
                                                    <tr><td><p>End: <span id="strat_3_4_revenue"></span></p></td></tr>
                                                    <tr><td><p>Return: <span id="strat_3_4_perc" ></span></p></td></tr>
                                                    <tr><td><p>Record: <span id="strat_3_4_record" ></span></p></td></tr>
                                                    <tr><td><p>Avg return/bet: <span id="strat_3_4_avg_profit" ></span></p></td></tr>
                                                </tbody>
                                            </table>
                                       </td>
                                   </tr>
                               </tbody>
                           </table>
                           
                           
                       </div>
                   </div> -->
                   
                   <!-- actual betting results -->
                   <!-- <div class="table-responsive">
                        <table class="table table-bordered definition-table" id="nba_betting_table" style="width:100%;margin-top:20px;">

                        </table>
                    </div> -->

                    <h4>Series Predictions:</h4>
                    

                    <div id="nba_2017_series_predictions" style="display:none;">
                        
                        <div class="panel panel-default">
                          <div class="panel-heading">2017 Prediction Results</div>

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Series predicted correctly:</td>
                                        <td>1/1</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 1:</td>
                                        <td>1/1</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 2:</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Conference:</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Final:</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p>Below, bold is the team picked by the algorithm. Series score is on the right of the teams. 
                        Green indicates a correct series prediction, and red indicates an incorrect prediction.</p>
                        <p>If a prediction is incorrect, the next round is recalculated with the new winning team.</p>

                        <?php include("./betting_content/nba/seasons/nba_2017.php"); ?>

                    </div>

                    <div id="nba_2016_series_predictions" style="display:none;">

                        <div class="panel panel-default">
                          <div class="panel-heading">2016 Prediction Results</div>

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Series predicted correctly:</td>
                                        <td>11/15</td>
                                        <td>73%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 1:</td>
                                        <td>6/8</td>
                                        <td>75%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 2:</td>
                                        <td>3/4</td>
                                        <td>75%</td>
                                    </tr>
                                    <tr>
                                        <td>Conference:</td>
                                        <td>2/2</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Final:</td>
                                        <td>0/1</td>
                                        <td>0%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p>Below, bold is the team picked by the algorithm. Series score is on the right of the teams. 
                        Green indicates a correct series prediction, and red indicates an incorrect prediction.</p>
                        <p>If a prediction is incorrect, the next round is recalculated with the new winning team.</p>

                        <?php include("./betting_content/nba/seasons/nba_2016.php"); ?>

                        

                    </div>

                    <div id="nba_2015_series_predictions" style="display:none;">

                        <div class="panel panel-default">
                          <div class="panel-heading">2015 Prediction Results</div>

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Series predicted correctly:</td>
                                        <td>10/15</td>
                                        <td>67%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 1:</td>
                                        <td>5/8</td>
                                        <td>63%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 2:</td>
                                        <td>3/4</td>
                                        <td>75%</td>
                                    </tr>
                                    <tr>
                                        <td>Conference:</td>
                                        <td>1/2</td>
                                        <td>50%</td>
                                    </tr>
                                    <tr>
                                        <td>Final:</td>
                                        <td>1/1</td>
                                        <td>100%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p>Below, bold is the team picked by the algorithm. Series score is on the right of the teams. 
                        Green indicates a correct series prediction, and red indicates an incorrect prediction.</p>
                        <p>If a prediction is incorrect, the next round is recalculated with the new winning team.</p>

                        <?php include("./betting_content/nba/seasons/nba_2015.php"); ?>

                        
                    </div>


                    <div id="nba_2014_series_predictions" style="display:none;">

                        <div class="panel panel-default">
                          <div class="panel-heading">2014 Prediction Results</div>

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Series predicted correctly:</td>
                                        <td>12/15</td>
                                        <td>80%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 1:</td>
                                        <td>6/8</td>
                                        <td>75%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 2:</td>
                                        <td>3/4</td>
                                        <td>75%</td>
                                    </tr>
                                    <tr>
                                        <td>Conference:</td>
                                        <td>2/2</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Final:</td>
                                        <td>1/1</td>
                                        <td>100%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p>Below, bold is the team picked by the algorithm. Series score is on the right of the teams. 
                        Green indicates a correct series prediction, and red indicates an incorrect prediction.</p>
                        <p>If a prediction is incorrect, the next round is recalculated with the new winning team.</p>

                        <?php include("./betting_content/nba/seasons/nba_2014.php"); ?>

                    
                    </div>


                    <div id="nba_2013_series_predictions" style="display:none;">

                        <div class="panel panel-default">
                          <div class="panel-heading">2013 Prediction Results</div>

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Series predicted correctly:</td>
                                        <td>10/15</td>
                                        <td>67%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 1:</td>
                                        <td>6/8</td>
                                        <td>75%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 2:</td>
                                        <td>2/4</td>
                                        <td>50%</td>
                                    </tr>
                                    <tr>
                                        <td>Conference:</td>
                                        <td>1/2</td>
                                        <td>50%</td>
                                    </tr>
                                    <tr>
                                        <td>Final:</td>
                                        <td>1/1</td>
                                        <td>100%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p>Below, bold is the team picked by the algorithm. Series score is on the right of the teams. 
                        Green indicates a correct series prediction, and red indicates an incorrect prediction.</p>
                        <p>If a prediction is incorrect, the next round is recalculated with the new winning team.</p>

                        <?php include("./betting_content/nba/seasons/nba_2013.php"); ?>

                        
                    </div>


                    <div id="nba_2012_series_predictions" style="display:none;">

                        <div class="panel panel-default">
                          <div class="panel-heading">2012 Prediction Results</div>

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Series predicted correctly:</td>
                                        <td>8/15</td>
                                        <td>53%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 1:</td>
                                        <td>4/8</td>
                                        <td>50%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 2:</td>
                                        <td>3/4</td>
                                        <td>75%</td>
                                    </tr>
                                    <tr>
                                        <td>Conference:</td>
                                        <td>1/2</td>
                                        <td>50%</td>
                                    </tr>
                                    <tr>
                                        <td>Final:</td>
                                        <td>0/1</td>
                                        <td>0%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p>Below, bold is the team picked by the algorithm. Series score is on the right of the teams. 
                        Green indicates a correct series prediction, and red indicates an incorrect prediction.</p>
                        <p>If a prediction is incorrect, the next round is recalculated with the new winning team.</p>

                        <?php include("./betting_content/nba/seasons/nba_2012.php"); ?>

                        
                    </div>

                    <div id="nba_2011_series_predictions" style="display:none;">

                        <div class="panel panel-default">
                          <div class="panel-heading">2011 Prediction Results</div>

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Series predicted correctly:</td>
                                        <td>10/15</td>
                                        <td>67%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 1:</td>
                                        <td>6/8</td>
                                        <td>75%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 2:</td>
                                        <td>4/4</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Conference:</td>
                                        <td>0/2</td>
                                        <td>0%</td>
                                    </tr>
                                    <tr>
                                        <td>Final:</td>
                                        <td>0/1</td>
                                        <td>0%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p>Below, bold is the team picked by the algorithm. Series score is on the right of the teams. 
                        Green indicates a correct series prediction, and red indicates an incorrect prediction.</p>
                        <p>If a prediction is incorrect, the next round is recalculated with the new winning team.</p>

                        <?php include("./betting_content/nba/seasons/nba_2011.php"); ?>

                        
                    </div>


                    <div id="nba_2010_series_predictions" style="display:none;">
                        <p>If a prediction is incorrect, the next round is recalculated with the new winning team.</p>
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <ul class="list-group panel panel-default" style="border:none">
                                            <li class="list-group-item panel-heading">Round 1 Western</li>
                                            <li class="list-group-item"></li>
                                            <li class="list-group-item"></li>
                                            <li class="list-group-item"></li>
                                            <li class="list-group-item"></li>
                                            <li class="list-group-item panel-heading">Round 1 Eastern</li>
                                            <li class="list-group-item"></li>
                                            <li class="list-group-item"></li>
                                            <li class="list-group-item"></li>
                                            <li class="list-group-item"></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-group panel panel-default" style="border:none">
                                            <li class="list-group-item panel-heading">Round 2 Western</li>
                                            <li class="list-group-item"></li>
                                            <li class="list-group-item"></li>
                                            <li class="list-group-item panel-heading">Round 2 Eastern</li>
                                            <li class="list-group-item"></li>
                                            <li class="list-group-item"></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-group panel panel-default" style="border:none">
                                            <li class="list-group-item panel-heading">Western Conference</li>
                                            <li class="list-group-item"></li>
                                            <li class="list-group-item panel-heading">Eastern Conference</li>
                                            <li class="list-group-item"></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-group panel panel-default" style="border:none">
                                            <li class="list-group-item panel-heading">NBA Champion</li>
                                            <li class="list-group-item"></li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>





                </div>

                                
            </div>


            <!-- nha content -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="nhl">
                <h1 class="page-header" id="nba_header">Hockey (NHL) predictions</h1>

                
                <div id="nhl_info">

                    <div class="panel panel-default">
                        <div class="panel-heading">Prediction Results for all seasons</div>

                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Series predicted correctly:</td>
                                    <td>36/62</td>
                                    <td>58%</td>
                                </tr>
                                <tr>
                                    <td>Round 1:</td>
                                    <td>21/35</td>
                                    <td>60%</td>
                                </tr>
                                <tr>
                                    <td>Round 2:</td>
                                    <td>10/15</td>
                                    <td>67%</td>
                                </tr>
                                <tr>
                                    <td>Conference:</td>
                                    <td>3/8</td>
                                    <td>38%</td>
                                </tr>
                                <tr>
                                    <td>Final:</td>
                                    <td>2/4</td>
                                    <td>50%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="nhl_overview_seasons">
                        <p>Below, bold is the team picked by the algorithm. Series score is on the right of the teams. 
                        Green indicates a correct series prediction, and red indicates an incorrect prediction.</p>
                        <p>If a prediction is incorrect, the next round is recalculated with the new winning team.</p>

                        <?php include("./betting_content/nhl/seasons/nhl_2017.php"); ?>
                        <?php include("./betting_content/nhl/seasons/nhl_2016.php"); ?>
                        <?php include("./betting_content/nhl/seasons/nhl_2015.php"); ?>
                        <?php include("./betting_content/nhl/seasons/nhl_2014.php"); ?>
                        <?php include("./betting_content/nhl/seasons/nhl_2013.php"); ?>
                        <?php include("./betting_content/nhl/seasons/nhl_2012.php"); ?>
                    </div>


                </div>

                <div id="nhl_seasons">

                    <h4>Series Predictions:</h4>
                    <!-- <p>Bold is the team picked by the algorithm. Series score is on the right of the teams. 
                    Green indicates a correct series prediction, and red indicates an incorrect prediction.</p> -->

                    

                    <div id="nhl_2017_series_predictions" style="display:none;">

                        <div class="panel panel-default">
                          <div class="panel-heading">2017 Prediction Results</div>

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Series predicted correctly:</td>
                                        <td>4/6</td>
                                        <td>67%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 1:</td>
                                        <td>4/6</td>
                                        <td>67%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 2:</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Conference:</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Final:</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p>Below, bold is the team picked by the algorithm. Series score is on the right of the teams. 
                        Green indicates a correct series prediction, and red indicates an incorrect prediction.</p>
                        <p>If a prediction is incorrect, the next round is recalculated with the new winning team.</p>

                        <?php include("./betting_content/nhl/seasons/nhl_2017.php"); ?>

                    </div>

                    <div id="nhl_2016_series_predictions" style="display:none;">

                        <div class="panel panel-default">
                          <div class="panel-heading">2016 Prediction Results</div>

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Series predicted correctly:</td>
                                        <td>10/15</td>
                                        <td>67%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 1:</td>
                                        <td>5/8</td>
                                        <td>63%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 2:</td>
                                        <td>3/4</td>
                                        <td>75%</td>
                                    </tr>
                                    <tr>
                                        <td>Conference:</td>
                                        <td>1/2</td>
                                        <td>50%</td>
                                    </tr>
                                    <tr>
                                        <td>Final:</td>
                                        <td>1/1</td>
                                        <td>100%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p>Below, bold is the team picked by the algorithm. Series score is on the right of the teams. 
                        Green indicates a correct series prediction, and red indicates an incorrect prediction.</p>
                        <p>If a prediction is incorrect, the next round is recalculated with the new winning team.</p>

                        <?php include("./betting_content/nhl/seasons/nhl_2016.php"); ?>
                    </div>


                    <div id="nhl_2015_series_predictions" style="display:none;">

                        <div class="panel panel-default">
                          <div class="panel-heading">2015 Prediction Results</div>

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Series predicted correctly:</td>
                                        <td>10/15</td>
                                        <td>67%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 1:</td>
                                        <td>7/8</td>
                                        <td>88%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 2:</td>
                                        <td>3/4</td>
                                        <td>75%</td>
                                    </tr>
                                    <tr>
                                        <td>Conference:</td>
                                        <td>0/2</td>
                                        <td>0%</td>
                                    </tr>
                                    <tr>
                                        <td>Final:</td>
                                        <td>0/1</td>
                                        <td>0%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p>Below, bold is the team picked by the algorithm. Series score is on the right of the teams. 
                        Green indicates a correct series prediction, and red indicates an incorrect prediction.</p>
                        <p>If a prediction is incorrect, the next round is recalculated with the new winning team.</p>

                        <?php include("./betting_content/nhl/seasons/nhl_2015.php"); ?>
                    </div>

                    <div id="nhl_2014_series_predictions" style="display:none;">

                        <div class="panel panel-default">
                          <div class="panel-heading">2014 Prediction Results</div>

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Series predicted correctly:</td>
                                        <td>6/15</td>
                                        <td>40%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 1:</td>
                                        <td>4/8</td>
                                        <td>50%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 2:</td>
                                        <td>1/4</td>
                                        <td>25%</td>
                                    </tr>
                                    <tr>
                                        <td>Conference:</td>
                                        <td>1/2</td>
                                        <td>50%</td>
                                    </tr>
                                    <tr>
                                        <td>Final:</td>
                                        <td>0/1</td>
                                        <td>0%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p>Below, bold is the team picked by the algorithm. Series score is on the right of the teams. 
                        Green indicates a correct series prediction, and red indicates an incorrect prediction.</p>
                        <p>If a prediction is incorrect, the next round is recalculated with the new winning team.</p>

                        <?php include("./betting_content/nhl/seasons/nhl_2014.php"); ?>
                    </div>

                    <div id="nhl_2013_series_predictions" style="display:none;">

                        <div class="panel panel-default">
                          <div class="panel-heading">2013 Prediction Results</div>

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Series predicted correctly:</td>
                                        <td>8/14</td>
                                        <td>57%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 1:</td>
                                        <td>3/8</td>
                                        <td>38%</td>
                                    </tr>
                                    <tr>
                                        <td>Round 2:</td>
                                        <td>3/3</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Conference:</td>
                                        <td>1/2</td>
                                        <td>50%</td>
                                    </tr>
                                    <tr>
                                        <td>Final:</td>
                                        <td>1/1</td>
                                        <td>100%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p>Below, bold is the team picked by the algorithm. Series score is on the right of the teams. 
                        Green indicates a correct series prediction, and red indicates an incorrect prediction.</p>
                        <p>If a prediction is incorrect, the next round is recalculated with the new winning team.</p>

                        <?php include("./betting_content/nhl/seasons/nhl_2013.php"); ?>                     
                    </div>

                    
                    <div id="nhl_2012_series_predictions" style="display:none;">

                        <div class="panel panel-default">
                          <div class="panel-heading">2012 Prediction Results</div>

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Series predicted correctly:</td>
                                        <td>/15</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Round 1:</td>
                                        <td>/8</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Round 2:</td>
                                        <td>/4</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Conference:</td>
                                        <td>/2</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Final:</td>
                                        <td>/1</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p>Below, bold is the team picked by the algorithm. Series score is on the right of the teams. 
                        Green indicates a correct series prediction, and red indicates an incorrect prediction.</p>
                        <p>If a prediction is incorrect, the next round is recalculated with the new winning team.</p>

                        <?php include("./betting_content/nhl/seasons/nhl_2012.php"); ?>
                        
                    </div>


                    <div id="nhl_2011_series_predictions" style="display:none;">

                        <div class="panel panel-default">
                          <div class="panel-heading">2011 Prediction Results</div>

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Series predicted correctly:</td>
                                        <td>/15</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Round 1:</td>
                                        <td>/8</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Round 2:</td>
                                        <td>/4</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Conference:</td>
                                        <td>/2</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Final:</td>
                                        <td>/1</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p>Below, bold is the team picked by the algorithm. Series score is on the right of the teams. 
                        Green indicates a correct series prediction, and red indicates an incorrect prediction.</p>
                        <p>If a prediction is incorrect, the next round is recalculated with the new winning team.</p>

                        <?php include("./betting_content/nhl/seasons/nhl_2011.php"); ?>
                        
                    </div>




                    <div class="panel panel-primary" id="playoffs_bracket_images" style="display:none;">
                      <div class="panel-heading" id="nhl_panel_header">2016 Playoffs Prediction and Results</div>
                      <table>
                          <tbody>
                              <tr>
                                  <td id="nhl_prediction_cell">
                                      <img id="nhl_bracket_prediction" src="" style="max-width:100%;"/>
                                  </td>
                                  <td>
                                      <img id="nhl_bracket_result" src="" style="width:100%;"/>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                    </div>



                </div>

                

                                
            </div>






              
          </div>
        </div>
    
    </body>
</html>