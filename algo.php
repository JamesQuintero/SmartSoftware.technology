<?php
include('universal_functions.php');

log_IP("algo");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta name="description" content="SmartSoftware is an Artificial Intelligence development project" />
        <meta name="keywords" content="algorithm, stock trading, algo, algotrading" />
        <title>Smart Software - Algorithmic Trading</title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <?php include('code_header.php'); ?>
        <script type="text/javascript" src="./main.js"></script>
        <script type="text/javascript">
            
            function enlarge(image)
            {
                $('.overlay_background').show();
                $("#image_overlay").html("<img id='image' src='http://smartsoftware.technology/algo_content/"+image+"_large.png' style='width:100%;height:550px;' />");
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
           <!--<p style="font-size:16px;">Algorithm V1</p>-->
           <!--<p>Smart Software has a sophisticated algorithm that can predict future stock prices and trade accordingly. </p>-->
           <p>Algorithm V1 is a sophisticated algorithm that can predict future stock prices. </p>
           <p>We have been developing stock trading algorithms since 2014, and the current algorithm was developed in 2015. </p>
           
           
           <div class="graph_container">
               <img style="width:100%;border-top-left-radius:3px;border-top-right-radius:3px;" src="http://smartsoftware.technology/algo_content/algo_v1_dynamic2.png"/>
                <p style="padding:20px;">The above graph shows total account balance starting with $100,000 in 2003 and ending with $4,400,000 in 2015. That's an increase of 4400% over 13 years, or 36% annually. For reference, S&P500 averaged 8% annually from 2003 to 2015.</p>
           </div>
           
           <table style="margin-bottom:20px;">
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
           
           <p style="margin-top:20px;margin-bottom:20px;">Below is more in-depth data.</p>
           
           
           <table style="width:100%;">
               <tbody>
                   <tr>
                       <td style="vertical-align:top;">
                           <table class="table_border" style="margin-top:20px;text-align:center;width:100%;">
                               <tbody>
                                   <tr>
                                       <td><p>Year</p></td>
                                       <td><p>Annual profit %</p></td>
                                       <td><p># Trades</p></td>
                                   </tr>
                                   <tr>
                                       <td><p>2003</p></td>
                                       <td><p>94.5%</p></td>
                                       <td><p>1,140</p></td>
                                   </tr>
                                   <tr>
                                       <td><p>2004</p></td>
                                       <td><p>72.6%</p></td>
                                       <td><p>909</p></td>
                                   </tr>
                                   <tr>
                                       <td><p>2005</p></td>
                                       <td><p>75.5%</p></td>
                                       <td><p>1,804</p></td>
                                   </tr>
                                   <tr>
                                       <td><p>2006</p></td>
                                       <td><p>52.8%</p></td>
                                       <td><p>2,006</p></td>
                                   </tr>
                                   <tr>
                                       <td><p>2007</p></td>
                                       <td><p>23.0%</p></td>
                                       <td><p>3,016</p></td>
                                   </tr>
                                   <tr>
                                       <td><p>2008</p></td>
                                       <td><p>-2.0%</p></td>
                                       <td><p>3,253</p></td>
                                   </tr>
                                   <tr>
                                       <td><p>2009</p></td>
                                       <td><p>33.0%</p></td>
                                       <td><p>1,404</p></td>
                                   </tr>
                                   <tr>
                                       <td><p>2010</p></td>
                                       <td><p>25.1%</p></td>
                                       <td><p>2,710</p></td>
                                   </tr>
                                   <tr>
                                       <td><p>2011</p></td>
                                       <td><p>34.5%</p></td>
                                       <td><p>2,978</p></td>
                                   </tr>
                                   <tr>
                                       <td><p>2012</p></td>
                                       <td><p>31.8%</p></td>
                                       <td><p>2,875</p></td>
                                   </tr>
                                   <tr>
                                       <td><p>2013</p></td>
                                       <td><p>8.3%</p></td>
                                       <td><p>3,396</p></td>
                                   </tr>
                                   <tr>
                                       <td><p>2014</p></td>
                                       <td><p>5.1%</p></td>
                                       <td><p>3,098</p></td>
                                   </tr>
                                   <tr>
                                       <td><p>2015</p></td>
                                       <td><p>8.7%</p></td>
                                       <td><p>3,018</p></td>
                                   </tr>
                               </tbody>
                           </table>
                       </td>
                       <td>
                           <table class="table_border" style="margin-top:20px;width:100%;text-align:center;">
                           <tbody>
                               <tr>
                                   <td><p>Year</p></td>
                                   <td><p>Stock price</p></td>
                                   <td><p>Avg profit/trade %</p></td>
                                   <td><p># Trades</p></td>
                               </tr>
                               <tr>
                                   <td rowspan="8"><p>2003</p></td>
                                   <td style="padding-top:10px;"><p><$1</p></td>
                                   <td style="padding-top:10px;"><p>N/A</p></td>
                                   <td style="padding-top:10px;"><p>0</p></td>
                               </tr>
                               <tr>
                                   <td><p>$1-$5</p></td>
                                   <td><p>4.04%</p></td>
                                   <td><p>140</p></td>
                               </tr>
                               <tr>
                                   <td><p>$5-$10</p></td>
                                   <td><p>2.55%</p></td>
                                   <td><p>137</p></td>
                               </tr>
                               <tr>
                                   <td><p>$10s</p></td>
                                   <td><p>1.68%</p></td>
                                   <td><p>207</p></td>
                               </tr>
                               <tr>
                                   <td><p>$20s</p></td>
                                   <td><p>4.89%</p></td>
                                   <td><p>53</p></td>
                               </tr>
                               <tr>
                                   <td><p>$30-$50</p></td>
                                   <td><p>2.20%</p></td>
                                   <td><p>22</p></td>
                               </tr>
                               <tr>
                                   <td><p>$50-$100</p></td>
                                   <td><p>1.39%</p></td>
                                   <td><p>11</p></td>
                               </tr>
                               <tr>
                                   <td style="padding-bottom:10px;"><p>$100+</p></td>
                                   <td style="padding-bottom:10px;"><p>N/A</p></td>
                                   <td style="padding-bottom:10px;"><p>0</p></td>
                               </tr>


                               <tr>
                                   <td rowspan="8"><p>2004</p></td>
                                   <td style="padding-top:10px;"><p><$1</p></td>
                                   <td style="padding-top:10px;"><p>N/A</p></td>
                                   <td style="padding-top:10px;"><p>0</p></td>
                               </tr>
                               <tr>
                                   <td><p>$1-$5</p></td>
                                   <td><p>11.0%</p></td>
                                   <td><p>53</p></td>
                               </tr>
                               <tr>
                                   <td><p>$5-$10</p></td>
                                   <td><p>1.73%</p></td>
                                   <td><p>60</p></td>
                               </tr>
                               <tr>
                                   <td><p>$10s</p></td>
                                   <td><p>2.2%</p></td>
                                   <td><p>205</p></td>
                               </tr>
                               <tr>
                                   <td><p>$20s</p></td>
                                   <td><p>1.82%</p></td>
                                   <td><p>76</p></td>
                               </tr>
                               <tr>
                                   <td><p>$30-$50</p></td>
                                   <td><p>-2.18%</p></td>
                                   <td><p>39</p></td>
                               </tr>
                               <tr>
                                   <td><p>$50-$100</p></td>
                                   <td><p>0.56%</p></td>
                                   <td><p>8</p></td>
                               </tr>
                               <tr>
                                   <td style="padding-bottom:10px;"><p>$100+</p></td>
                                   <td style="padding-bottom:10px;"><p>1.6%</p></td>
                                   <td style="padding-bottom:10px;"><p>4</p></td>
                               </tr>


                               <tr>
                                   <td rowspan="8"><p>2005</p></td>
                                   <td style="padding-top:10px;"><p><$1</p></td>
                                   <td style="padding-top:10px;"><p>N/A</p></td>
                                   <td style="padding-top:10px;"><p>0</p></td>
                               </tr>
                               <tr>
                                   <td><p>$1-$5</p></td>
                                   <td><p>1.82%</p></td>
                                   <td><p>41</p></td>
                               </tr>
                               <tr>
                                   <td><p>$5-$10</p></td>
                                   <td><p>5.67%</p></td>
                                   <td><p>160</p></td>
                               </tr>
                               <tr>
                                   <td><p>$10s</p></td>
                                   <td><p>0.83%</p></td>
                                   <td><p>306</p></td>
                               </tr>
                               <tr>
                                   <td><p>$20s</p></td>
                                   <td><p>-0.52%</p></td>
                                   <td><p>159</p></td>
                               </tr>
                               <tr>
                                   <td><p>$30-$50</p></td>
                                   <td><p>1.20%</p></td>
                                   <td><p>161</p></td>
                               </tr>
                               <tr>
                                   <td><p>$50-$100</p></td>
                                   <td><p>0.31%</p></td>
                                   <td><p>32</p></td>
                               </tr>
                               <tr>
                                   <td style="padding-bottom:10px;"><p>$100+</p></td>
                                   <td style="padding-bottom:10px;"><p>2.16%</p></td>
                                   <td style="padding-bottom:10px;"><p>34</p></td>
                               </tr>

                               <tr>
                                   <td rowspan="8"><p>2006</p></td>
                                   <td style="padding-top:10px;"><p><$1</p></td>
                                   <td style="padding-top:10px;"><p>N/A</p></td>
                                   <td style="padding-top:10px;"><p>0</p></td>
                               </tr>
                               <tr>
                                   <td><p>$1-$5</p></td>
                                   <td><p>2.98%</p></td>
                                   <td><p>99</p></td>
                               </tr>
                               <tr>
                                   <td><p>$5-$10</p></td>
                                   <td><p>1.23%</p></td>
                                   <td><p>188</p></td>
                               </tr>
                               <tr>
                                   <td><p>$10s</p></td>
                                   <td><p>0.59%</p></td>
                                   <td><p>311</p></td>
                               </tr>
                               <tr>
                                   <td><p>$20s</p></td>
                                   <td><p>1.07%</p></td>
                                   <td><p>152</p></td>
                               </tr>
                               <tr>
                                   <td><p>$30-$50</p></td>
                                   <td><p>1.46%</p></td>
                                   <td><p>184</p></td>
                               </tr>
                               <tr>
                                   <td><p>$50-$100</p></td>
                                   <td><p>3.51%</p></td>
                                   <td><p>56</p></td>
                               </tr>
                               <tr>
                                   <td style="padding-bottom:10px;"><p>$100+</p></td>
                                   <td style="padding-bottom:10px;"><p>15.31%</p></td>
                                   <td style="padding-bottom:10px;"><p>9</p></td>
                               </tr>

                               <tr>
                                   <td rowspan="8"><p>2007</p></td>
                                   <td style="padding-top:10px;"><p><$1</p></td>
                                   <td style="padding-top:10px;"><p>N/A</p></td>
                                   <td style="padding-top:10px;"><p>0</p></td>
                               </tr>
                               <tr>
                                   <td><p>$1-$5</p></td>
                                   <td><p>3.91%</p></td>
                                   <td><p>121</p></td>
                               </tr>
                               <tr>
                                   <td><p>$5-$10</p></td>
                                   <td><p>-0.48%</p></td>
                                   <td><p>374</p></td>
                               </tr>
                               <tr>
                                   <td><p>$10s</p></td>
                                   <td><p>0.12%</p></td>
                                   <td><p>420</p></td>
                               </tr>
                               <tr>
                                   <td><p>$20s</p></td>
                                   <td><p>1.56%</p></td>
                                   <td><p>198</p></td>
                               </tr>
                               <tr>
                                   <td><p>$30-$50</p></td>
                                   <td><p>1.69%</p></td>
                                   <td><p>228</p></td>
                               </tr>
                               <tr>
                                   <td><p>$50-$100</p></td>
                                   <td><p>0.27%</p></td>
                                   <td><p>124</p></td>
                               </tr>
                               <tr>
                                   <td style="padding-bottom:10px;"><p>$100+</p></td>
                                   <td style="padding-bottom:10px;"><p>-4.52%</p></td>
                                   <td style="padding-bottom:10px;"><p>48</p></td>
                               </tr>

                               <tr>
                                   <td rowspan="8"><p>2008</p></td>
                                   <td style="padding-top:10px;"><p><$1</p></td>
                                   <td style="padding-top:10px;"><p>N/A</p></td>
                                   <td style="padding-top:10px;"><p>0</p></td>
                               </tr>
                               <tr>
                                   <td><p>$1-$5</p></td>
                                   <td><p>0.15%</p></td>
                                   <td><p>352</p></td>
                               </tr>
                               <tr>
                                   <td><p>$5-$10</p></td>
                                   <td><p>0.23%</p></td>
                                   <td><p>401</p></td>
                               </tr>
                               <tr>
                                   <td><p>$10s</p></td>
                                   <td><p>1.05%</p></td>
                                   <td><p>393</p></td>
                               </tr>
                               <tr>
                                   <td><p>$20s</p></td>
                                   <td><p>-0.82%</p></td>
                                   <td><p>170</p></td>
                               </tr>
                               <tr>
                                   <td><p>$30-$50</p></td>
                                   <td><p>-0.81%</p></td>
                                   <td><p>175</p></td>
                               </tr>
                               <tr>
                                   <td><p>$50-$100</p></td>
                                   <td><p>-0.26%</p></td>
                                   <td><p>101</p></td>
                               </tr>
                               <tr>
                                   <td style="padding-bottom:10px;"><p>$100+</p></td>
                                   <td style="padding-bottom:10px;"><p>0.29%</p></td>
                                   <td style="padding-bottom:10px;"><p>40</p></td>
                               </tr>

                               <tr>
                                   <td rowspan="8"><p>2009</p></td>
                                   <td style="padding-top:10px;"><p><$1</p></td>
                                   <td style="padding-top:10px;"><p>N/A</p></td>
                                   <td style="padding-top:10px;"><p>0</p></td>
                               </tr>
                               <tr>
                                   <td><p>$1-$5</p></td>
                                   <td><p>7.41%</p></td>
                                   <td><p>217</p></td>
                               </tr>
                               <tr>
                                   <td><p>$5-$10</p></td>
                                   <td><p>-1.23%</p></td>
                                   <td><p>209</p></td>
                               </tr>
                               <tr>
                                   <td><p>$10s</p></td>
                                   <td><p>2.72%</p></td>
                                   <td><p>162</p></td>
                               </tr>
                               <tr>
                                   <td><p>$20s</p></td>
                                   <td><p>1.63%</p></td>
                                   <td><p>66</p></td>
                               </tr>
                               <tr>
                                   <td><p>$30-$50</p></td>
                                   <td><p>3.25%</p></td>
                                   <td><p>20</p></td>
                               </tr>
                               <tr>
                                   <td><p>$50-$100</p></td>
                                   <td><p>1.13%</p></td>
                                   <td><p>22</p></td>
                               </tr>
                               <tr>
                                   <td style="padding-bottom:10px;"><p>$100+</p></td>
                                   <td style="padding-bottom:10px;"><p>1.07%</p></td>
                                   <td style="padding-bottom:10px;"><p>10</p></td>
                               </tr>

                               <tr>
                                   <td rowspan="8"><p>2010</p></td>
                                   <td style="padding-top:10px;"><p><$1</p></td>
                                   <td style="padding-top:10px;"><p>N/A</p></td>
                                   <td style="padding-top:10px;"><p>0</p></td>
                               </tr>
                               <tr>
                                   <td><p>$1-$5</p></td>
                                   <td><p>1.07%</p></td>
                                   <td><p>244</p></td>
                               </tr>
                               <tr>
                                   <td><p>$5-$10</p></td>
                                   <td><p>1.47%</p></td>
                                   <td><p>295</p></td>
                               </tr>
                               <tr>
                                   <td><p>$10s</p></td>
                                   <td><p>0.49%</p></td>
                                   <td><p>364</p></td>
                               </tr>
                               <tr>
                                   <td><p>$20s</p></td>
                                   <td><p>0.81%</p></td>
                                   <td><p>193</p></td>
                               </tr>
                               <tr>
                                   <td><p>$30-$50</p></td>
                                   <td><p>0.55%</p></td>
                                   <td><p>128</p></td>
                               </tr>
                               <tr>
                                   <td><p>$50-$100</p></td>
                                   <td><p>2.38%</p></td>
                                   <td><p>79</p></td>
                               </tr>
                               <tr>
                                   <td style="padding-bottom:10px;"><p>$100+</p></td>
                                   <td style="padding-bottom:10px;"><p>0.18%</p></td>
                                   <td style="padding-bottom:10px;"><p>47</p></td>
                               </tr>

                               <tr>
                                   <td rowspan="8"><p>2011</p></td>
                                   <td style="padding-top:10px;"><p><$1</p></td>
                                   <td style="padding-top:10px;"><p>N/A</p></td>
                                   <td style="padding-top:10px;"><p>0</p></td>
                               </tr>
                               <tr>
                                   <td><p>$1-$5</p></td>
                                   <td><p>4.93%</p></td>
                                   <td><p>346</p></td>
                               </tr>
                               <tr>
                                   <td><p>$5-$10</p></td>
                                   <td><p>1.36%</p></td>
                                   <td><p>393</p></td>
                               </tr>
                               <tr>
                                   <td><p>$10s</p></td>
                                   <td><p>-0.84%</p></td>
                                   <td><p>353</p></td>
                               </tr>
                               <tr>
                                   <td><p>$20s</p></td>
                                   <td><p>1.44%</p></td>
                                   <td><p>153</p></td>
                               </tr>
                               <tr>
                                   <td><p>$30-$50</p></td>
                                   <td><p>-2.67%</p></td>
                                   <td><p>115</p></td>
                               </tr>
                               <tr>
                                   <td><p>$50-$100</p></td>
                                   <td><p>0.88%</p></td>
                                   <td><p>56</p></td>
                               </tr>
                               <tr>
                                   <td style="padding-bottom:10px;"><p>$100+</p></td>
                                   <td style="padding-bottom:10px;"><p>-2.5%</p></td>
                                   <td style="padding-bottom:10px;"><p>62</p></td>
                               </tr>

                               <tr>
                                   <td rowspan="8"><p>2012</p></td>
                                   <td style="padding-top:10px;"><p><$1</p></td>
                                   <td style="padding-top:10px;"><p>N/A</p></td>
                                   <td style="padding-top:10px;"><p>0</p></td>
                               </tr>
                               <tr>
                                   <td><p>$1-$5</p></td>
                                   <td><p>1.46%</p></td>
                                   <td><p>298</p></td>
                               </tr>
                               <tr>
                                   <td><p>$5-$10</p></td>
                                   <td><p>0.61%</p></td>
                                   <td><p>287</p></td>
                               </tr>
                               <tr>
                                   <td><p>$10s</p></td>
                                   <td><p>1.59%</p></td>
                                   <td><p>365</p></td>
                               </tr>
                               <tr>
                                   <td><p>$20s</p></td>
                                   <td><p>-1.65%</p></td>
                                   <td><p>183</p></td>
                               </tr>
                               <tr>
                                   <td><p>$30-$50</p></td>
                                   <td><p>2.1%</p></td>
                                   <td><p>166</p></td>
                               </tr>
                               <tr>
                                   <td><p>$50-$100</p></td>
                                   <td><p>3.49%</p></td>
                                   <td><p>75</p></td>
                               </tr>
                               <tr>
                                   <td style="padding-bottom:10px;"><p>$100+</p></td>
                                   <td style="padding-bottom:10px;"><p>0.18%</p></td>
                                   <td style="padding-bottom:10px;"><p>56</p></td>
                               </tr>

                               <tr>
                                   <td rowspan="8"><p>2013</p></td>
                                   <td style="padding-top:10px;"><p><$1</p></td>
                                   <td style="padding-top:10px;"><p>N/A</p></td>
                                   <td style="padding-top:10px;"><p>0</p></td>
                               </tr>
                               <tr>
                                   <td><p>$1-$5</p></td>
                                   <td><p>-1.36%</p></td>
                                   <td><p>374</p></td>
                               </tr>
                               <tr>
                                   <td><p>$5-$10</p></td>
                                   <td><p>-0.16%</p></td>
                                   <td><p>331</p></td>
                               </tr>
                               <tr>
                                   <td><p>$10s</p></td>
                                   <td><p>2.11</p></td>
                                   <td><p>381</p></td>
                               </tr>
                               <tr>
                                   <td><p>$20s</p></td>
                                   <td><p>0.82%</p></td>
                                   <td><p>196</p></td>
                               </tr>
                               <tr>
                                   <td><p>$30-$50</p></td>
                                   <td><p>1.28%</p></td>
                                   <td><p>218</p></td>
                               </tr>
                               <tr>
                                   <td><p>$50-$100</p></td>
                                   <td><p>1.31%</p></td>
                                   <td><p>127</p></td>
                               </tr>
                               <tr>
                                   <td style="padding-bottom:10px;"><p>$100+</p></td>
                                   <td style="padding-bottom:10px;"><p>-1.76%</p></td>
                                   <td style="padding-bottom:10px;"><p>79</p></td>
                               </tr>

                               <tr>
                                   <td rowspan="8"><p>2014</p></td>
                                   <td style="padding-top:10px;"><p><$1</p></td>
                                   <td style="padding-top:10px;"><p>N/A</p></td>
                                   <td style="padding-top:10px;"><p>0</p></td>
                               </tr>
                               <tr>
                                   <td><p>$1-$5</p></td>
                                   <td><p>0.92%</p></td>
                                   <td><p>284</p></td>
                               </tr>
                               <tr>
                                   <td><p>$5-$10</p></td>
                                   <td><p>-1.61%</p></td>
                                   <td><p>249</p></td>
                               </tr>
                               <tr>
                                   <td><p>$10s</p></td>
                                   <td><p>1.04%</p></td>
                                   <td><p>334</p></td>
                               </tr>
                               <tr>
                                   <td><p>$20s</p></td>
                                   <td><p>-0.3%</p></td>
                                   <td><p>221</p></td>
                               </tr>
                               <tr>
                                   <td><p>$30-$50</p></td>
                                   <td><p>1.31%</p></td>
                                   <td><p>263</p></td>
                               </tr>
                               <tr>
                                   <td><p>$50-$100</p></td>
                                   <td><p>0.0%</p></td>
                                   <td><p>141</p></td>
                               </tr>
                               <tr>
                                   <td style="padding-bottom:10px;"><p>$100+</p></td>
                                   <td style="padding-bottom:10px;"><p>0.1%</p></td>
                                   <td style="padding-bottom:10px;"><p>57</p></td>
                               </tr>

                               <tr>
                                   <td rowspan="8"><p>2015</p></td>
                                   <td style="padding-top:10px;"><p><$1</p></td>
                                   <td style="padding-top:10px;"><p>N/A</p></td>
                                   <td style="padding-top:10px;"><p>0</p></td>
                               </tr>
                               <tr>
                                   <td><p>$1-$5</p></td>
                                   <td><p>1.38%</p></td>
                                   <td><p>286</p></td>
                               </tr>
                               <tr>
                                   <td><p>$5-$10</p></td>
                                   <td><p>-0.03%</p></td>
                                   <td><p>225</p></td>
                               </tr>
                               <tr>
                                   <td><p>$10s</p></td>
                                   <td><p>-0.61%</p></td>
                                   <td><p>353</p></td>
                               </tr>
                               <tr>
                                   <td><p>$20s</p></td>
                                   <td><p>1.27%</p></td>
                                   <td><p>208</p></td>
                               </tr>
                               <tr>
                                   <td><p>$30-$50</p></td>
                                   <td><p>1.58%</p></td>
                                   <td><p>211</p></td>
                               </tr>
                               <tr>
                                   <td><p>$50-$100</p></td>
                                   <td><p>-1.18%</p></td>
                                   <td><p>148</p></td>
                               </tr>
                               <tr>
                                   <td style="padding-bottom:10px;"><p>$100+</p></td>
                                   <td style="padding-bottom:10px;"><p>0.79%</p></td>
                                   <td style="padding-bottom:10px;"><p>71</p></td>
                               </tr>
            <!--                   <tr>
                                   <td rowspan="8"><p>2003</p></td>
                                   <td>
                                       <table style="width:100%;border:hidden;border-collapse:collapse;">
                                           <tbody>
                                               <tr>
                                                   <td><p><$1</p></td>
                                                   <td><p>N/A</p></td>
                                                   <td><p>0</p></td>
                                               </tr>
                                               <tr>
                                                   <td><p>$1-$5</p></td>
                                                   <td><p>4.04%</p></td>
                                                   <td><p>140</p></td>
                                               </tr>
                                               <tr>
                                                   <td><p>$5-$10</p></td>
                                                   <td><p>2.55%</p></td>
                                                   <td><p>137</p></td>
                                               </tr>
                                               <tr>
                                                   <td><p>$10s</p></td>
                                                   <td><p>1.68%</p></td>
                                                   <td><p>207</p></td>
                                               </tr>
                                               <tr>
                                                   <td><p>$20s</p></td>
                                                   <td><p>4.89%</p></td>
                                                   <td><p>53</p></td>
                                               </tr>
                                               <tr>
                                                   <td><p>$30-$50</p></td>
                                                   <td><p>2.20%</p></td>
                                                   <td><p>22</p></td>
                                               </tr>
                                               <tr>
                                                   <td><p>$50-$100</p></td>
                                                   <td><p>1.39%</p></td>
                                                   <td><p>11</p></td>
                                               </tr>
                                               <tr>
                                                   <td><p>$100+</p></td>
                                                   <td><p>N/A</p></td>
                                                   <td><p>0</p></td>
                                               </tr>
                                           </tbody>
                                       </table>
                                   </td>
                               </tr>-->

                           </tbody>
                       </table>
                       </td>
                   </tr>
               </tbody>
           </table>
           
           
           
           
           
<!--           <table style="margin-top:20px;">
               <tbody>
                   <tr>
                       <td>
                           <img class="graph small_graph" src="http://smartsoftware.technology/algo_content/algo_v1_dynamic2_2003.png" onClick="enlarge('algo_v1_dynamic_2003');" style="cursor:pointer;"/>
                       </td>
                       <td>
                           <img class="graph small_graph" src="http://smartsoftware.technology/algo_content/algo_v1_dynamic2_2004.png" onClick="enlarge('algo_v1_dynamic_2004');" style="cursor:pointer;"/>
                       </td>
                       <td>
                           <img class="graph small_graph" src="http://smartsoftware.technology/algo_content/algo_v1_dynamic2_2005.png" onClick="enlarge('algo_v1_dynamic_2005');" style="cursor:pointer;"/>
                       </td>
                   </tr>
                   <tr>
                       <td>
                           <img class="graph small_graph" src="http://smartsoftware.technology/algo_content/algo_v1_dynamic2_2006.png" onClick="enlarge('algo_v1_dynamic_2006');" style="cursor:pointer;"/>
                       </td>
                       <td>
                           <img class="graph small_graph" src="http://smartsoftware.technology/algo_content/algo_v1_dynamic2_2007.png" onClick="enlarge('algo_v1_dynamic_2007');" style="cursor:pointer;"/>
                       </td>
                       <td>
                           <img class="graph small_graph" src="http://smartsoftware.technology/algo_content/algo_v1_dynamic2_2008.png" onClick="enlarge('algo_v1_dynamic_2008');" style="cursor:pointer;"/>
                       </td>
                   </tr>
                   <tr>
                       <td>
                           <img class="graph small_graph" src="http://smartsoftware.technology/algo_content/algo_v1_dynamic2_2009.png" onClick="enlarge('algo_v1_dynamic_2009');" style="cursor:pointer;"/>
                       </td>
                       <td>
                           <img class="graph small_graph" src="http://smartsoftware.technology/algo_content/algo_v1_dynamic2_2010.png" onClick="enlarge('algo_v1_dynamic_2010');" style="cursor:pointer;"/>
                       </td>
                       <td>
                           <img class="graph small_graph" src="http://smartsoftware.technology/algo_content/algo_v1_dynamic2_2011.png" onClick="enlarge('algo_v1_dynamic_2011');" style="cursor:pointer;"/>
                       </td>
                   </tr>
                   <tr>
                       <td>
                           <img class="graph small_graph" src="http://smartsoftware.technology/algo_content/algo_v1_dynamic2_2012.png" onClick="enlarge('algo_v1_dynamic_2012');" style="cursor:pointer;"/>
                       </td>
                       <td>
                           <img class="graph small_graph" src="http://smartsoftware.technology/algo_content/algo_v1_dynamic2_2013.png" onClick="enlarge('algo_v1_dynamic_2013');" style="cursor:pointer;"/>
                       </td>
                       <td>
                           <img class="graph small_graph" src="http://smartsoftware.technology/algo_content/algo_v1_dynamic2_2014.png" onClick="enlarge('algo_v1_dynamic_2014');" style="cursor:pointer;"/>
                       </td>
                   </tr>
                   <tr>
                       <td>
                           <img class="graph small_graph" src="http://smartsoftware.technology/algo_content/algo_v1_dynamic2_2015.png" onClick="enlarge('algo_v1_dynamic_2015');" style="cursor:pointer;"/>
                       </td>
                       <td></td>
                       <td></td>
                   </tr>
               </tbody>
           </table>-->
           
           
       </div>
        
        <div class="overlay_background" onClick="$('.overlay_background').hide();" style="display:none;">
            <div id="image_overlay" ></div>
        </div>
        
            
        <?php include("./footer.php"); ?>
    </body>
</html>