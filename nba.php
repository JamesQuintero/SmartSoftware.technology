<?php
include('universal_functions.php');

if($_GET['season']=="")
    $season=2016;
else
    $season=(string)$_GET['season'];

// log_IP("nba");
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

        <script src="js/jquery.csv.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                
                var data = get_betting_data();
                make_betting_table(data);
            });
            
            //retrieves betting data
            function get_betting_data()
            {
                if("<?php echo $season; ?>"=="all")
                {
                    var total="";
                    
                    for(var x =2009; x<=2015; x++)
                    {
                        var data = get_betting_data2(x);
                        total+=data;
                    }
                    
                    return total;
                }
                else
                    return get_betting_data2(<?php echo (int)str_replace("", ".", $season); ?>);
            }
            
            //used by get_betting_data()
            function get_betting_data2(season)
            {
                var to_return="";
                
                try
                {
                    $.ajax({
                        async: false,
                        type: "GET",
                        url: "./betting_content/nba/"+season+"_nba_bets.txt",
                        dataType: "text",
                        success: function(data) {
                            console.log("Returning "+season+"'s data... "+data.length);
                            to_return=data;
                        }
                     });
                 } catch(error)
                 {
                     
                 }
                 
                 return to_return;
            }
            
            function convert_team(team_name)
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
            
            <?php include('required_jquery.js'); ?>
            <?php include('js/required_google_analytics.js'); ?>
        </script>
    </head>
    <body>
        <?php include('index_header.php'); ?>
        <div>
            <p class="title">NBA Algorithm</p>
        </div>
       <div class="content">
           
           <p>An algorithm is used to predict which NBA team is favorable to win a game, and by how much. Bets are placed if odds are favorable for long-term reward.</p>
           <!--<p>Information on the algorithm's success in late 2016 season will be posted soon.</p>-->
           
           
           <p style="margin-top:20px;">Columns:</p>
           <table style="margin-bottom:20px;">
               <tbody>
                   <tr><td><p> - Away Team: The team that is playing in a foreign stadium. Blue means the algo favors them.</p></td></tr>
                   <tr><td><p> - Home Team: The team that is playing in their home stadium. Blue means the algo favors them.</p></td></tr>
                   <tr><td><p> - Algo Proj: Algorithm's projected percentage change of winning. Positive percentage favors the away team, and a negative favors the home team.</p></td></tr>
                   <tr><td><p> - Away Proj: Algorithm's calculated betting odds for the away team. If negative, moneyline odds that are lower negatives should be taken. If positive, moneyline odds that are higher should be taken.</p></td></tr>
                   <tr><td><p> - Home Proj: Algorithm's calculated betting odds for the home team. If negative, moneyline odds that are lower negatives should be taken. If positive, moneyline odds that are higher should be taken.</p></td></tr>
                   <tr><td><p> - Away odds: Moneyline betting odds for the away team provided by Bovada.lv (if green, these odds are favorable enough to bet on).</p></td></tr>
                   <tr><td><p> - Home odds: Moneyline betting odds for the home team provided by Bovada.lv (if green, these odds are favorable enough to bet on).</p></td></tr>
                   <tr><td><p> - Diff Away: The difference between the algorithm's projected moneyline odds for the away team, and the actual moneyline odds.</p></td></tr>
                   <tr><td><p> - Diff Home: The difference between the algorithm's projected moneyline odds for the home team, and the actual moneyline odds.</p></td></tr>
                   <tr><td><p> - Bet: The amount bet.</p></td></tr>
                   <tr><td><p> - To win: The projected To Win size (profit) based off the bet size.</p></td></tr>
                   <tr><td><p> - Won: Amount won (revenue) from specified bet.</p></td></tr>
               </tbody>
           </table>
           
           <p style="margin-top:20px;">Algorithm Strategies:</p>
           <table style="margin-bottom:20px;">
               <tbody>
                   <tr><td><p> - Strategy 0.0: Bet on algo's projected winner, no matter the odds.</p></td></tr>
                   <tr><td><p> - Strategy 0.1: Bet on oddsmaker's projected winner, no matter the odds.</p></td></tr>
                   <tr><td><p>All below strategies incorporate placing a bet if the algorithm projects a team to win more often than the oddsmaker projects</p></td></tr>
                   <tr><td><p> - Strategy 1: Default strategy.</p></td></tr>
                   <tr><td><p> - Strategy 2: Placing a bet if that team is also the algo's favorite.</p></td></tr>
                   <tr><td><p> - Strategy 3: Placing a bet if that team is the algo's favorite, and the oddsmaker's underdog.</p></td></tr>
                   <tr><td><p> - Strategy 4: Placing a bet if the difference between the algo's projected odds and the oddsmaker's odds is also >= 100</p></td></tr>
               </tbody>
           </table>
           
           <table style="margin-top:30px;margin-bottom:30px;">
               <tbody>
                   <tr>
                       <td>
                           <p style="font-size:20px;">Seasons:</p>
                       </td>
                       <td style="padding-left:10px;padding-right:10px;border-right:1px solid rgb(200,200,200);">
                           <a href="./nba.php?season=all" class="link" style="<?php if($season=="all"){ echo "text-decoration:underline"; } ?>"><p style="font-size:20px;">All</p></a>
                       </td>
                       <td style="padding-left:10px;padding-right:10px;border-right:1px solid rgb(200,200,200);">
                           <a href="./nba.php?season=2016" class="link" style="<?php if($season==2016){ echo "text-decoration:underline"; } ?>"><p style="font-size:20px;">2016</p></a>
                       </td>
                       <td style="padding-left:10px;padding-right:10px;border-right:1px solid rgb(200,200,200);">
                           <a href="./nba.php?season=2015" class="link" style="<?php if($season==2015){ echo "text-decoration:underline"; } ?>"><p style="font-size:20px;">2015</p></a>
                       </td>
                       <td style="padding-left:10px;padding-right:10px;border-right:1px solid rgb(200,200,200);">
                           <a href="./nba.php?season=2014" class="link" style="<?php if($season==2014){ echo "text-decoration:underline"; } ?>"><p style="font-size:20px;">2014</p></a>
                       </td>
                       <td style="padding-left:10px;padding-right:10px;border-right:1px solid rgb(200,200,200);">
                           <a href="./nba.php?season=2013" class="link" style="<?php if($season==2013){ echo "text-decoration:underline"; } ?>"><p style="font-size:20px;">2013</p></a>
                       </td>
                       <td style="padding-left:10px;padding-right:10px;border-right:1px solid rgb(200,200,200);">
                           <a href="./nba.php?season=2012" class="link" style="<?php if($season==2012){ echo "text-decoration:underline"; } ?>"><p style="font-size:20px;">2012</p></a>
                       </td>
                       <td style="padding-left:10px;padding-right:10px;border-right:1px solid rgb(200,200,200);">
                           <a href="./nba.php?season=2011" class="link" style="<?php if($season==2011){ echo "text-decoration:underline"; } ?>"><p style="font-size:20px;">2011</p></a>
                       </td>
                       <td style="padding-left:10px;padding-right:10px;border-right:1px solid rgb(200,200,200);">
                           <a href="./nba.php?season=2010" class="link" style="<?php if($season==2010){ echo "text-decoration:underline"; } ?>"><p style="font-size:20px;">2010</p></a>
                       </td>
                       <td style="padding-left:10px;padding-right:10px;">
                           <a href="./nba.php?season=2009" class="link" style="<?php if($season==2009){ echo "text-decoration:underline"; } ?>"><p style="font-size:20px;">2009</p></a>
                       </td>
                       <td></td>
                   </tr>
               </tbody>
           </table>
           
           
           <div class="graph_container" style="display:inline-block">
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
           </div>
           
           <div class="graph_container" style="display:inline-block">
               
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
           </div>
           
           
           <table class="table_border" id="betting_table" style="width:100%;margin-top:20px;">
               
           </table>
       </div>
        
        
        
        
        <div class="overlay_background" onClick="$('.overlay_background').hide();" style="display:none;">
            <div id="image_overlay" ></div>
        </div>
        
            
        <?php include("./footer.php"); ?>
    </body>
</html>