<?php
include('universal_functions.php');

if($_GET['season']=="")
    $season=2016;
else
    $season=(string)$_GET['season'];

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
        <script src="jquery.csv.js"></script>
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
                    
//                    for(var x =2009; x<=2015; x++)
//                    {
//                        var data = get_betting_data2(x);
//                        total+=data;
//                    }
                    total=get_betting_data2("all");
                    
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
                        url: "./betting_content/mlb/"+season+"_mlb_bets.txt",
                        dataType: "text",
                        success: function(data) {
                            console.log("Returning "+season+"'s data... "+data.length);
                            to_return=data;
                        }
                     });
                 } catch(error)
                 {}
                 
                 return to_return;
            }
            function convert_team(team_name)
            {
                var team_names = {
                    "ari" : "arizona-diamondbacks",
                    "atl" : "atlanta-braves",
                    "bal" : "baltimore-orioles",
                    "bos" : "boston-red-sox",
                    "chc" : "chicago-cubs",
                    "chw" : "chicago-white-sox",
                    "cin" : "cincinnati-reds",
                    "cle" : "cleveland-indians",
                    "col" : "colorado-rockies",
                    "det" : "detroit-tigers",
                    "hou" : "houston-astros",
                    "kc" : "kansas-city-royals",
                    "laa" : "los-angeles-angels",
                    "lad" : "los-angeles-dodgers",
                    "mia" : "miami-marlins",
                    "mil" : "milwaukee-brewers",
                    "min" : "minnesota-twins",
                    "nym" : "new-york-mets",
                    "nyy" : "new-york-yankees",
                    "oak" : "oakland-athletics",
                    "phi" : "philadelphia-phillies",
                    "pit" : "pittsburgh-pirates",
                    "sd" : "san-diego-padres",
                    "sf" : "san-francisco-giants",
                    "sea" : "seattle-mariners",
                    "stl" : "st.-louis-cardinals",
                    "tb" : "tampa-bay-rays",
                    "tex" : "texas-rangers",
                    "tor" : "toronto-blue-jays",
                    "wsh" : "washington-nationals"
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
                          if(team_names[key] == team_name.toLowerCase())
                              return key;
                      }
                      return "";
                  }
                  
            }
            
            <?php include('required_jquery.js'); ?>
            <?php include('required_google_analytics.js'); ?>
        </script>
    </head>
    <body>
        <?php include('index_header.php'); ?>
       <div>
            <p class="title">MLB Algorithm</p>
        </div>
       <div class="content">
           
           <p>An algorithm is used to predict which MLB team is favorable to win a game, and by how much. Bets are placed if odds are favorable for long-term reward.</p>
           
           
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
           
           <p>Because baseball has a lot of variance, the highest favorable percentage a team can get is around 65%. Looking through the previous bets and predictions, you'll notice that 
               home teams are very typically favored. Home teams have a historic win rate of ~55%, so they have a 10% advantage over away teams. The algorithm takes this into account.</p>
           <p style="margin-top:5px;">The algorithm isn't perfect, so those using it should refine it. For example, the algorithm may give the away team a 60% change of winning. That will result in 
               calculated odds of -150. If actual odds are < -150 like -120, then those odds are favorable because the away team will supposedly win more often than the oddsmakers/bettors 
               think. If the odds are > -150 like -180, then the odds are unfavorable because the away team will supposedly win less often than the oddsmakers/bettors think. Oddsmakers' odds that are 
               close to the algorithm's calculated odds should not be taken because the algorithm isn't that accurate. Like if the algorithm projects -150 odds, and oddsmakers are giving -140, there's 
               a difference of 10 between those odds. That's within the margin of error, and it isn't a good long-term play to take those odds even if they are supposedly favorable. However, if the
               algorithm projects -150 odds, and the oddsmakers are giving 120, then that's a difference of 70 (50 from -150 to -100, then 0 from -100 to 100, then 20 from 100 to 120). 70 is a significant 
               enough amount to make taking the bet very favorable for the long run. </p>
           <!--<p style="margin-top:5px;">Algo_V1: </p>-->
           
           
           
           <p style="margin-top:20px;">Algorithm Strategies:</p>
           <table style="margin-bottom:20px;">
               <tbody>
                   <tr><td><p> - Strategy 0.0: Bet on algo's projected winner, no matter the odds.</p></td></tr>
                   <tr><td><p> - Strategy 0.1: Bet on oddsmaker's projected winner, no matter the odds.</p></td></tr>
                   <tr><td><p>All strategies incorporate placing a bet if the algorithm projects a team to win more often than the oddsmaker projects</p></td></tr>
                   <tr><td><p> - Strategy 1: Default strategy.</p></td></tr>
                   <tr><td><p> - Strategy 2: Placing a bet if that team is also the algo's favorite.</p></td></tr>
                   <tr><td><p> - Strategy 3: Placing a bet if that team is the algo's favorite, and the oddsmaker's underdog.</p></td></tr>
                   <tr><td><p> - Strategy 4: Placing a bet if the difference between the algo's projected odds and the oddsmaker's odds is also >= 45</p></td></tr>
               </tbody>
           </table>
           
           
           
           <table style="margin-top:30px;margin-bottom:30px;">
               <tbody>
                   <tr>
                       <td>
                           <p style="font-size:20px;">Seasons:</p>
                       </td>
                       <td style="padding-left:10px;padding-right:10px;border-right:1px solid rgb(200,200,200);">
                           <a href="./mlb.php?season=all" class="link" style="<?php if($season=="all"){ echo "text-decoration:underline"; } ?>"><p style="font-size:20px;">All</p></a>
                       </td>
                       <td style="padding-left:10px;padding-right:10px;border-right:1px solid rgb(200,200,200);">
                           <a href="./mlb.php?season=2016" class="link" style="<?php if($season==2016){ echo "text-decoration:underline"; } ?>"><p style="font-size:20px;">2016</p></a>
                       </td>
                       <td style="padding-left:10px;padding-right:10px;border-right:1px solid rgb(200,200,200);">
                           <a href="./mlb.php?season=2015" class="link" style="<?php if($season==2015){ echo "text-decoration:underline"; } ?>"><p style="font-size:20px;">2015</p></a>
                       </td>
                       <td style="padding-left:10px;padding-right:10px;border-right:1px solid rgb(200,200,200);">
                           <a href="./mlb.php?season=2014" class="link" style="<?php if($season==2014){ echo "text-decoration:underline"; } ?>"><p style="font-size:20px;">2014</p></a>
                       </td>
                       <td style="padding-left:10px;padding-right:10px;border-right:1px solid rgb(200,200,200);">
                           <a href="./mlb.php?season=2013" class="link" style="<?php if($season==2013){ echo "text-decoration:underline"; } ?>"><p style="font-size:20px;">2013</p></a>
                       </td>
                       <td style="padding-left:10px;padding-right:10px;border-right:1px solid rgb(200,200,200);">
                           <a href="./mlb.php?season=2012" class="link" style="<?php if($season==2012){ echo "text-decoration:underline"; } ?>"><p style="font-size:20px;">2012</p></a>
                       </td>
                       <td style="padding-left:10px;padding-right:10px;border-right:1px solid rgb(200,200,200);">
                           <a href="./mlb.php?season=2011" class="link" style="<?php if($season==2011){ echo "text-decoration:underline"; } ?>"><p style="font-size:20px;">2011</p></a>
                       </td>
                       <td style="padding-left:10px;padding-right:10px;border-right:1px solid rgb(200,200,200);">
                           <a href="./mlb.php?season=2010" class="link" style="<?php if($season==2010){ echo "text-decoration:underline"; } ?>"><p style="font-size:20px;">2010</p></a>
                       </td>
                       <td style="padding-left:10px;padding-right:10px;">
                           <a href="./mlb.php?season=2009" class="link" style="<?php if($season==2009){ echo "text-decoration:underline"; } ?>"><p style="font-size:20px;">2009</p></a>
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
        
        
            
        <?php include("./footer.php"); ?>
    </body>
</html>