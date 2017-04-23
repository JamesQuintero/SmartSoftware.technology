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
        <meta name="keywords" content="algorithm, stock trading, algo, algotrading" />

        <title>Smart Software - Algorithmic Trading</title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

        <?php include('code_header.php'); ?>
        <link href="css/dashboard.css" rel="stylesheet">
        <link href="css/custom_dashboard.css" rel="stylesheet">

        <!-- scripts needed for table data -->
        <script src="js/jquery.csv.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


        <script type="text/javascript">

            $(document).ready(function(){

                var view = "<?php echo $view; ?>";
                if(view=="overview")
                {
                    $('#overview').show();

                    //displays option algorithm's chart
                    google.charts.load('current', {packages: ['corechart', 'line']});
                    google.charts.setOnLoadCallback(drawBasic);

                    // $('#option_algorithm').hide();
                    // $('#stock_algorithm').hide();
                    $('#option_algorithm_description').hide();
                    $('#option_algorithm_table').hide();

                    $('#stock_algorithm_description').hide();
                    $('#stock_algorithm_table').hide();
                }
                else if(view=="option_algo")
                {
                    // $('#title').html("Option Algorithm Information");
                    $('#overview').hide();
                    $('#option_algorithm').show();
                    $('#stock_algorithm').hide();

                    google.charts.load('current', {packages: ['corechart', 'line']});
                    google.charts.setOnLoadCallback(drawBasic);
                }
                else if(view=="stock_algo")
                {
                    // $('#title').html("Stock Algorithm");
                    $('#overview').hide();
                    $('#option_algorithm').hide();
                    $('#stock_algorithm').show();
                }
            });
            
            // $(document).ready(function(){
                
            //     var data = get_trading_data();
            //     make_table(data);
            //     // display(<?php //if($_GET['view']==""){echo "\"information\"";} else{echo "\"".$_GET['view']."\"";} ?>);
                
            //     google.charts.load('current', {packages: ['corechart', 'line']});
            //     google.charts.setOnLoadCallback(drawBasic);
            // });
            
            function enlarge(image)
            {
                $('.overlay_background').show();
                $("#image_overlay").html("<img id='image' src='./algo_content/images/"+image+"_large.png' style='width:100%;height:550px;' />");
                $('#image').load(function(){
                    center_image("#image");
                });
            }
            
            function display(type)
            {
                if(type=="information")
                {
                    $('#information').show();
                    $('#algo_information_link').hide();
                    $('#results').hide();
                }
                else if(type=="results")
                {
                    $('#information').hide();
                    $('#results').show();
                    $('#algo_results_link').hide();
                }
            }
            
            function drawBasic()
            {

                var data = new google.visualization.DataTable();
                data.addColumn('date', "Date");
                data.addColumn('number', 'Account Balance');

//                data.addRows([
//                  [0, 0],   [1, 10],  [2, 23],  [3, 17],  [4, 18],  [5, 9],
//                  [6, 11],  [7, 27],  [8, 33],  [9, 40],  [10, 32], [11, 35],
//                  [12, 30], [13, 40], [14, 42], [15, 47], [16, 44], [17, 48],
//                  [18, 52], [19, 54], [20, 42], [21, 55], [22, 56], [23, 57],
//                  [24, 60], [25, 50], [26, 52], [27, 51], [28, 49], [29, 53],
//                  [30, 55], [31, 60], [32, 61], [33, 59], [34, 62], [35, 65],
//                  [36, 62], [37, 58], [38, 55], [39, 61], [40, 64], [41, 65],
//                  [42, 63], [43, 66], [44, 67], [45, 69], [46, 69], [47, 70],
//                  [48, 72], [49, 68], [50, 66], [51, 65], [52, 67], [53, 70],
//                  [54, 71], [55, 72], [56, 73], [57, 75], [58, 70], [59, 68],
//                  [60, 64], [61, 60], [62, 65], [63, 67], [64, 68], [65, 69],
//                  [66, 70], [67, 72], [68, 75], [69, 80]
//                ]);
                var stuff=get_trading_data();
                var trading_data = $.csv.toObjects(stuff);
                
                var array=[]
                for(var x =0; x < trading_data.length; x++)
                {
                    var balance=parseFloat(trading_data[x]['balance'].replace("$", ""));
                    var profit_perc=parseFloat(trading_data[x]['profit_perc'].replace("%", ""));
                    
                    var split=trading_data[x]['date'].split("/");
                    
                    // array.push([ new Date(split[2], parseInt(split[0])-1, split[1]), profit_perc ]);
                    array.push([ new Date(split[2], parseInt(split[0])-1, split[1]), balance ]);
                }
                
                data.addRows(array);

                var options = {
                  title: "Option Algorithm",
                  hAxis: {
                    title: 'Date',
                  },
                  vAxis: {
                    title: 'Balance ($)',
                  },
                  trendlines: {
                    0: {
                      'type': 'exponential',
                      'visibleInLegend': true,
                      'color':'gray',
                      'opacity':0.5,
                      'showR2': true,
                    }
                  },
                  width: 800,
                  height: 350,
                };

                var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

                chart.draw(data, options);
              }
            
            
            //retrieves betting data
            function get_trading_data()
            {
                var to_return;
                $.ajax({
                    async: false,
                    type: "GET",
                    url: "./algo_content/option_algo_results.txt",
                    dataType: "text",
                    success: function(data) {
                        to_return=data;
                    }
                 });
                 
                 return to_return;
            }
            
            //puts the data into a table
            function make_table(data)
            {
                var stuff = $.csv.toObjects(data);

                var html="";
                
                
                //headers
                html+="<tr>";
                html+="<td><p style='font-size:12px;' >Date</p></td>";
                html+="<td><p style='font-size:12px;' >Positions</p></td>";
                html+="<td><p style='font-size:12px;' >Cash</p></td>";
                html+="<td><p style='font-size:12px;' >Total</p></td>";
                html+="<td><p style='font-size:12px;' >Total Profit</p></td>";
                html+="<td><p style='font-size:12px;' >Notes</p></td>";
                html+="</tr>";
                
                
                
                //adds content
                var html_array=[];
                var single_day_html="";
                for(var x =0; x < stuff.length; x++)
                {
                    //adds day of data to array, then resets day
                    html_array.push(single_day_html);
                    single_day_html="";
                    single_day_html+="<tr>";
                    
                    single_day_html+="<td><p>"+stuff[x]['date']+"</p></td>";
                    single_day_html+="<td><p>"+stuff[x]['num_positions']+"</p></td>";
                    single_day_html+="<td><p>"+stuff[x]['balance']+"</p></td>";
                    single_day_html+="<td><p>"+stuff[x]['total']+"</p></td>";
                    single_day_html+="<td><p>"+stuff[x]['profit_perc']+"</p></td>";
                    single_day_html+="<td><p>"+stuff[x]['note']+"</p></td>";
                    
                    
                    single_day_html+="</tr>";
                }
                
                //appends remaining day
                html_array.push(single_day_html);
                single_day_html="";
                
                
                $('#today_total').html(stuff[42]['total']);
                $('#today_date').html(stuff[42]['date']);
                
                
                //for(var x =0; x < html_array.length; x++)
                for(var x =html_array.length-1; x >=0; x--)
                {
                    for(var y =0; y < html_array[x].length; y++)
                        html+=html_array[x][y];
                }
                
                $('#algo_results_table').html(html);
            }
            
            
            <?php include('js/required_google_analytics.js'); ?>
        </script>
    </head>
    <body>

        <?php include('index_header.php'); ?>





















    <div class="container-fluid">
      <div class="row">
         <!-- sidebar -->
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><p style="font-weight:bold;font-size:16px;padding-left:20px;padding-right:20px;">Stock Market Prediction</p></li>
            <li <?php if($view=="overview") echo "class='active'"; ?> ><a href="?view=overview">Overview</a></li>
            <li <?php if($view=="option_algo") echo "class='active'"; ?> ><a href="?view=option_algo">Option algorithm</a></li>
            <li <?php if($view=="stock_algo") echo "class='active'"; ?> ><a href="?view=stock_algo">Stock algorithm</a></li>
            <!-- <li><a href="#"></a></li> -->
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
            <p>Stock prices change based off people's buying and selling of shares, and since people's actions aren't random, they can be predicted. The option algorithm predicts the price movements for option contracts. The stock algorithm predicts the price movements for stocks.</p>
            
        </div>

        <!-- Option algorithm content -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="option_algorithm">

            <div id="option_algorithm_description">
                <h1 class="page-header" >Option Algorithm Information</h1>
                <p>Option algorithm is an algorithm that can predict intraday option contract price movements. The algorithm can't tell what the contract price will be later in the day, but it can tell when the price is going to move up.</p>
                <p>The algorithm was developed in Aug 2016, and has been extensively backtested with stocks and walk-forward tested with option contracts.</p>
            </div>


            <div class="panel panel-default" id="option_algorithm_chart" style="width:802px;">
              <div class="panel-body" style="padding:0px;">
                <div id="chart_div"></div>
              </div>
              <div class="panel-footer">The above graph shows a simulation on a brokerage account starting with $10,000 on January 8, 2017.</div>
            </div>

            <!-- <div class="graph_container" style="width:802px">
                <div id="chart_div"></div>
                <p style="padding:20px;">The above graph shows a simulation on a brokerage account starting with $10,000 on January 8, 2017.</p>
            </div> -->
                
            <div class="table-responsive thin_table" id="option_algorithm_table" style="max-width:800px;">

                <table class="table table-bordered" style="background-color:white;">
                    <tbody>
                    <tr>
                    <td>Starting balance:</td>
                    <td>$10,000</td>
                    </tr>
                    <tr>
                    <td>Balance as of 4/20/2017:</td>
                    <td>$54,775</td>
                    </tr>
                    <tr>
                    <td>Algorithm return:</td>
                    <td>447%</td>
                    </tr>
                    <tr>
                    <td>S&P500 return:</td>
                    <td>3.9%</td>
                    </tr>
                    <tr>
                    <td>Trading period:</td>
                    <td>1/9/2017 - 4/20/2017 (81 days)</td>
                    </tr>
                    <tr>
                    <td>Number of trades:</td>
                    <td>941</td>
                    </tr>
                    <tr>
                    <td>Average Trades/day:</td>
                    <td>11-12</td>
                    </tr>
                    <tr>
                    <td>Profitable trades:</td>
                    <td>63%</td>
                    </tr>
                    <tr>
                    <td>Losing trades:</td>
                    <td>37%</td>
                    </tr>
                    <tr>
                    <td>Commission:</td>
                    <td>~$20 per trade</td>
                    </tr>
                    <tr>
                    <td>Position sizing:</td>
                    <td>$1,000</td>
                    </tr>
                    <tr>
                    <td>Long and/or short:</td>
                    <td>Long only</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            
        </div>

        <!-- Stock algorithm content -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="stock_algorithm">

            <div id="stock_algorithm_description">
                <h1 class="page-header" >Stock Algorithm Information</h1>
                <p>Stock algorithm is an algorithm that can predict daily stock price movements. </p>
                <p>I have been developing stock trading algorithms since 2014, and the current algorithm was developed in 2015. </p>
            </div>
            
            <div class="panel panel-default" id="stock_algorithm_chart" style="width:802px;">
              <div class="panel-body" style="padding:0px;">
                <img style="width:100%;border-top-left-radius:3px;border-top-right-radius:3px;" src="./algo_content/images/algo_v1_dynamic2.png"/>
              </div>
              <div class="panel-footer">The above graph shows total account balance starting with $100,000 in 2003 and ending with $4,400,000 in 2015. That's an increase of 4400% over 13 years, or 36% annually. For reference, S&P500 averaged 8% annually from 2003 to 2015.</div>
            </div>

            <div class="table-responsive thin_table" id="stock_algorithm_table" style="max-width:800px;">
                <table class="table table-bordered" style="background-color:white;">
                        <tbody>
                        <tr>
                        <td><p>Starting balance:</p></td>
                        <td><p>$100,000</p></td>
                        </tr>
                        <tr>
                        <td><p>Ending balance:</p></td>
                        <td><p>$4,400,000</p></td>
                        </tr>
                        <tr>
                        <td><p>Return:</p></td>
                        <td><p>4,400%</p></td>
                        </tr>
                        <tr>
                        <td><p>Annual return:</p></td>
                        <td><p>42%</p></td>
                        </tr>
                        <tr>
                        <td><p>Annual return S&P500:</p></td>
                        <td><p>8%</p></td>
                        </tr>
                        <tr>
                        <td><p>Trading period:</p></td>
                        <td><p>Jan 2003 - Dec 2015</p></td>
                        </tr>
                        <tr>
                        <td><p>Sharpe ratio:</p></td>
                        <td><p>1.06</p></td>
                        </tr>
                        <tr>
                        <td><p>Number of trades:</p></td>
                        <td><p>15,826</p></td>
                        </tr>
                        <tr>
                        <td><p>Average Trades/day:</p></td>
                        <td><p>4-5</p></td>
                        </tr>
                        <tr>
                        <td><p>Profitable trades:</p></td>
                        <td><p>60%</p></td>
                        </tr>
                        <tr>
                        <td><p>Losing trades:</p></td>
                        <td><p>40%</p></td>
                        </tr>
                        <tr>
                        <td><p>Commission:</p></td>
                        <td><p>$14 per trade</p></td>
                        </tr>
                        <tr>
                        <td><p>Position sizing:</p></td>
                        <td><p>Dynamic ($5,000 min)</p></td>
                        </tr>
                        <tr>
                        <td><p>Long and/or short:</p></td>
                        <td><p>Long only</p></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

          
      </div>
    </div>




























            <!-- <div id="results">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <table class="table_border" id="algo_results_table" style="margin-top:20px;">
                    
                                </table>
                            </td>
                            <td style="vertical-align:top;padding-left:50px;">
                                <div id="chart_div"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> -->


       </div>
        
        
            
    </body>
</html>