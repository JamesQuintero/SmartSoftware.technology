function center_image(image)
{
    var window_width=$(window).width();
    var window_height=$(window).height();
    
    var screen_width=screen.width;
    var screen_height=screen.height;
    
    var image_width=$(image).width();
    var image_height=$(image).height();
//    $(image).load(function() {
//        image_width = this.width;   // Note: $(this).width() will not
//        image_height = this.height; // work for in memory images.
//    });
   
//    console.log(window_width);
//    console.log(window_height);
//    console.log(screen_width);
//    console.log(screen_height);
//    console.log(image_width);
//    console.log(image_height);
   
    
    $(image).css('margin-top', (screen_height-image_height)/2);
    
//    $(image).css('left', Document_width-250);
    
}

//puts the data into a betting table
function make_betting_table(league, data)
{
    var stuff = $.csv.toObjects(data);

    var html="";

    //header for the headers
    html+="<tr>";
    html+="<td colspan='10'></td>";
    html+="<td colspan='3'><p style='text-align:center;'>Strategy 0.0</p></td>";
    html+="<td colspan='3' style='border-right:2px solid white;'><p style='text-align:center;'>Strategy 0.1</p></td>";
    html+="<td colspan='3'><p style='text-align:center;'>Strategy 1</p></td>";
    html+="<td colspan='3'><p style='text-align:center;'>Strategy 2</p></td>";
    html+="<td colspan='3'><p style='text-align:center;'>Strategy 3</p></td>";
    html+="<td colspan='3'><p style='text-align:center;'>Strategy 4</p></td>";
    html+="</tr>";

    //headers
    html+="<tr>";
    html+="<td><p style='font-size:12px;' >Date</p></td>";
    html+="<td><p style='font-size:12px;' >Away Team</p></td>";
    html+="<td><p style='font-size:12px;' >Home Team</p></td>";
    html+="<td><p style='font-size:12px;' >Algo proj</p></td>";
    html+="<td><p style='font-size:12px;' >Away Proj</p></td>";
    html+="<td><p style='font-size:12px;' >Home proj</p></td>";
    html+="<td><p style='font-size:12px;' >Away odds</p></td>";
    html+="<td><p style='font-size:12px;' >Home odds</p></td>";
    html+="<td><p style='font-size:12px;' >Diff Away</p></td>";
    html+="<td><p style='font-size:12px;' >Diff Home</p></td>";
    html+="<td><p style='font-size:12px;' >Bet</p></td>";
    html+="<td><p style='font-size:12px;' >To win</p></td>";
    html+="<td><p style='font-size:12px;' >Won</p></td>";
    html+="<td><p style='font-size:12px;' >Bet</p></td>";
    html+="<td><p style='font-size:12px;' >To win</p></td>";
    html+="<td style='border-right:2px solid white;'><p style='font-size:12px;' >Won</p></td>";
    html+="<td><p style='font-size:12px;' >Bet</p></td>";
    html+="<td><p style='font-size:12px;' >To win</p></td>";
    html+="<td><p style='font-size:12px;' >Won</p></td>";
    html+="<td><p style='font-size:12px;' >Bet</p></td>";
    html+="<td><p style='font-size:12px;' >To win</p></td>";
    html+="<td><p style='font-size:12px;' >Won</p></td>";
    html+="<td><p style='font-size:12px;' >Bet</p></td>";
    html+="<td><p style='font-size:12px;' >To win</p></td>";
    html+="<td><p style='font-size:12px;' >Won</p></td>";
    html+="<td><p style='font-size:12px;' >Bet</p></td>";
    html+="<td><p style='font-size:12px;' >To win</p></td>";
    html+="<td><p style='font-size:12px;' >Won</p></td>";
    html+="</tr>";



    console.log("stuff array length: "+stuff.length);

    //adds content
    var html_array=[];
    var single_day_html="";
    var strat_00={"profit": 0, "num_bets":0, "num_wins": 0, "num_losses": 0};
    var strat_01={"profit": 0, "num_bets":0, "num_wins": 0, "num_losses": 0};
    var strat_1={"profit": 0, "num_bets":0, "num_wins": 0, "num_losses": 0};
    var strat_2={"profit": 0, "num_bets":0, "num_wins": 0, "num_losses": 0};
    var strat_3={"profit": 0, "num_bets":0, "num_wins": 0, "num_losses": 0};
    var strat_4={"profit": 0, "num_bets":0, "num_wins": 0, "num_losses": 0};
    var strat_3_4={"bets": 0, "won":0, "num_bets":0, "num_wins": 0, "num_losses": 0};
    for(var x =0; x < stuff.length; x++)
    {
        //new row
        if( (x>0 && stuff[x-1]['date']=="") || x==0)
        {
            //adds day of data to array, then resets day
            html_array.push(single_day_html);
            single_day_html="";
            single_day_html+="<tr style='border-top:2px solid white;'>";
        }
        else
            single_day_html+="<tr>";

        single_day_html+="<td><p>"+stuff[x]['date']+"</p></td>";

        //underlines the favorable team
        if(parseInt(stuff[x]['algo_proj'].replace("%", ""))>0)
        {
            single_day_html+="<td><p style='color:rgb(150,240,250);' >"+convert_team(league, stuff[x]['away_team'])+"</p></td>";
            single_day_html+="<td><p>"+convert_team(league, stuff[x]['home_team'])+"</p></td>";
        }
        else
        {
            single_day_html+="<td><p>"+convert_team(league, stuff[x]['away_team'])+"</p></td>";
            single_day_html+="<td><p style='color:rgb(150,240,250);' >"+convert_team(league, stuff[x]['home_team'])+"</p></td>";
        }

        single_day_html+="<td><p>"+stuff[x]['algo_proj']+"</p></td>";
        single_day_html+="<td><p>"+stuff[x]['away_proj']+"</p></td>";
        single_day_html+="<td><p>"+stuff[x]['home_proj']+"</p></td>";

        //adds away_odds
        if(parseInt(stuff[x]['away_odds'])>=parseInt(stuff[x]['away_proj']))
            single_day_html+="<td><p class='good_odds' >"+stuff[x]['away_odds']+"</p></td>";
        else
            single_day_html+="<td><p class='bad_odds' >"+stuff[x]['away_odds']+"</p></td>";

        //adds home_odds
        if( parseInt(stuff[x]['home_odds'])>parseInt(stuff[x]['home_proj']))
            single_day_html+="<td><p class='good_odds' >"+stuff[x]['home_odds']+"</p></td>";
        else
            single_day_html+="<td><p class='bad_odds' >"+stuff[x]['home_odds']+"</p></td>";

        //adds diff_away
        if(parseInt(stuff[x]['away_odds'])>=parseInt(stuff[x]['away_proj']))
            single_day_html+="<td><p class='good_odds' >"+stuff[x]['diff_away']+"</p></td>";
        else
            single_day_html+="<td><p class='bad_odds' >"+stuff[x]['diff_away']+"</p></td>";

        //adds home_away
        if( parseInt(stuff[x]['home_odds'])>parseInt(stuff[x]['home_proj']))
            single_day_html+="<td><p class='good_odds' >"+stuff[x]['diff_home']+"</p></td>";
        else
            single_day_html+="<td><p class='bad_odds' >"+stuff[x]['diff_home']+"</p></td>";



        /* Strategy 0.0 */
        single_day_html+="<td nowrap><p>"+stuff[x]['strat_00_bet']+"</p></td>";
        single_day_html+="<td nowrap><p>"+stuff[x]['strat_00_to_win']+"</p></td>";
        if(stuff[x]['date']!="")
        {
            if(stuff[x]['strat_00_won']!="$0")
            {
                single_day_html+="<td nowrap><p class='won' >"+stuff[x]['strat_00_won']+"</p></td>";
                if(stuff[x]['strat_00_won']!="")
                {
                    strat_00['num_bets']++;
                    strat_00['num_wins']++;
                }

            }
            else
            {
                single_day_html+="<td nowrap><p class='lost' >"+stuff[x]['strat_00_won']+"</p></td>";
                strat_00['num_bets']++;
                strat_00['num_losses']++;
            }
        }
        //don't add classes if summary results row
        else
        {
            if(stuff[x]['strat_00_to_win']!=""&&stuff[x]['strat_00_to_win']!=undefined)
            {
                var profit=parseFloat(stuff[x]['strat_00_to_win'].replace("$", ""));
                strat_00['profit']+=profit;
            }
            single_day_html+="<td nowrap><p>"+stuff[x]['strat_00_won']+"</p></td>";
        }

        /* Strategy 0.1 */
        single_day_html+="<td nowrap><p>"+stuff[x]['strat_01_bet']+"</p></td>";
        single_day_html+="<td nowrap><p>"+stuff[x]['strat_01_to_win']+"</p></td>";
        if(stuff[x]['date']!="")
        {
            if(stuff[x]['strat_01_won']!="$0")
            {
                single_day_html+="<td nowrap style='border-right:2px solid white;'><p class='won' >"+stuff[x]['strat_01_won']+"</p></td>";
                if(stuff[x]['strat_01_won']!="")
                {
                    strat_01['num_bets']++;
                    strat_01['num_wins']++;
                }

            }
            else
            {
                single_day_html+="<td nowrap style='border-right:2px solid white;'><p class='lost' >"+stuff[x]['strat_01_won']+"</p></td>";
                strat_01['num_bets']++;
                strat_01['num_losses']++;
            }
        }
        //don't add classes if summary results row
        else
        {
            if(stuff[x]['strat_01_to_win']!=""&&stuff[x]['strat_01_to_win']!=undefined)
            {
                var profit=parseFloat(stuff[x]['strat_01_to_win'].replace("$", ""));
                strat_01['profit']+=profit;
            }
            single_day_html+="<td nowrap style='border-right:2px solid white;'><p>"+stuff[x]['strat_01_won']+"</p></td>";
        }


        /* Strategy 1 */
        single_day_html+="<td nowrap><p>"+stuff[x]['strat_1_bet']+"</p></td>";
        single_day_html+="<td nowrap><p>"+stuff[x]['strat_1_to_win']+"</p></td>";
        if(stuff[x]['date']!="")
        {
            if(stuff[x]['strat_1_won']!="$0")
            {
                single_day_html+="<td nowrap><p class='won' >"+stuff[x]['strat_1_won']+"</p></td>";
                if(stuff[x]['strat_1_won']!="")
                {
                    strat_1['num_bets']++;
                    strat_1['num_wins']++;
                }

            }
            else
            {
                single_day_html+="<td nowrap><p class='lost' >"+stuff[x]['strat_1_won']+"</p></td>";
                strat_1['num_bets']++;
                strat_1['num_losses']++;
            }
        }
        //don't add classes if summary results row
        else
        {
            if(stuff[x]['strat_1_to_win']!=""&&stuff[x]['strat_1_to_win']!=undefined)
            {
                var profit=parseFloat(stuff[x]['strat_1_to_win'].replace("$", ""));
                strat_1['profit']+=profit;
            }
            single_day_html+="<td nowrap><p>"+stuff[x]['strat_1_won']+"</p></td>";
        }

        /* Strategy 2 */
        single_day_html+="<td nowrap><p>"+stuff[x]['strat_2_bet']+"</p></td>";
        single_day_html+="<td nowrap><p>"+stuff[x]['strat_2_to_win']+"</p></td>";
        if(stuff[x]['date']!="")
        {
            if(stuff[x]['strat_2_won']!="$0")
            {
                single_day_html+="<td nowrap><p class='won' >"+stuff[x]['strat_2_won']+"</p></td>";
                if(stuff[x]['strat_2_won']!="")
                {
                    strat_2['num_bets']++;
                    strat_2['num_wins']++;
                }

            }
            else
            {
                single_day_html+="<td nowrap><p class='lost' >"+stuff[x]['strat_2_won']+"</p></td>";
                strat_2['num_bets']++;
                strat_2['num_losses']++;
            }
        }
        //don't add classes if summary results row
        else
        {
            if(stuff[x]['strat_2_to_win']!=""&&stuff[x]['strat_2_to_win']!=undefined)
            {
                var profit=parseFloat(stuff[x]['strat_2_to_win'].replace("$", ""));
                strat_2['profit']+=profit;
            }
            single_day_html+="<td nowrap><p>"+stuff[x]['strat_2_won']+"</p></td>";
        }


        single_day_html+="<td nowrap><p>"+stuff[x]['strat_3_bet']+"</p></td>";
        single_day_html+="<td nowrap><p>"+stuff[x]['strat_3_to_win']+"</p></td>";


        if(stuff[x]['date']!="")
        {
            if(stuff[x]['strat_3_won']!="$0")
            {
                single_day_html+="<td nowrap><p class='won' >"+stuff[x]['strat_3_won']+"</p></td>";
                if(stuff[x]['strat_3_won']!="")
                {
                    strat_3['num_bets']++;
                    strat_3['num_wins']++;
                }

            }
            else
            {
                single_day_html+="<td nowrap><p class='lost' >"+stuff[x]['strat_3_won']+"</p></td>";
                strat_3['num_bets']++;
                strat_3['num_losses']++;
            }
        }
        //don't add classes if summary results row
        else
        {
            if(stuff[x]['strat_3_to_win']!=""&&stuff[x]['strat_3_to_win']!=undefined)
            {
                var profit=parseFloat(stuff[x]['strat_3_to_win'].replace("$", ""));
                strat_3['profit']+=profit;
            }
            single_day_html+="<td nowrap><p>"+stuff[x]['strat_3_won']+"</p></td>";
        }


        single_day_html+="<td nowrap><p>"+stuff[x]['strat_4_bet']+"</p></td>";
        single_day_html+="<td nowrap><p>"+stuff[x]['strat_4_to_win']+"</p></td>";

        if(stuff[x]['date']!="")
        {
            if(stuff[x]['strat_4_won']!="$0")
            {
                single_day_html+="<td nowrap><p class='won' >"+stuff[x]['strat_4_won']+"</p></td>";
                if(stuff[x]['strat_4_won']!="")
                {
                    strat_4['num_bets']++;
                    strat_4['num_wins']++;

                    //if made a strategy 3 bet
                    if(stuff[x]['strat_3_won']!="")
                    {
                        if(stuff[x]['strat_3_won']!="$0")
                        {
                            //console.log(stuff[x]['strat_3_bet']);
                            var bet=parseFloat(stuff[x]['strat_3_bet'].replace("$", ""));
                            strat_3_4['num_bets']++;
                            strat_3_4['bets']+=bet;
                            strat_3_4['won']+=parseFloat(stuff[x]['strat_3_won'].replace("$", ""));
                            strat_3_4['num_wins']++;
                        }
                    }

                }

            }
            else
            {
                single_day_html+="<td nowrap><p class='lost' >"+stuff[x]['strat_4_won']+"</p></td>";
                strat_4['num_bets']++;
                strat_4['num_losses']++;

                if(stuff[x]['strat_3_bet']!="")
                {
                    var bet=parseFloat(stuff[x]['strat_3_bet'].replace("$", ""));
                    //console.log(bet);
                    strat_3_4['num_bets']++;
                    strat_3_4['bets']+=bet
                    strat_3_4['num_losses']++;
                }
            }
        }
        //don't add classes if summary results row
        else
        {
            if(stuff[x]['strat_4_to_win']!=""&&stuff[x]['strat_4_to_win']!=undefined)
            {
                var profit=parseFloat(stuff[x]['strat_4_to_win'].replace("$", ""));
                strat_4['profit']+=profit;
            }
            single_day_html+="<td nowrap><p>"+stuff[x]['strat_4_won']+"</p></td>";
        }




        single_day_html+="</tr>";
    }

    //appends remaining day
    html_array.push(single_day_html);
    single_day_html="";

    console.log("data array length: "+html_array.length);


    //for(var x =0; x < html_array.length; x++)
    for(var x =html_array.length-1; x >=0; x--)
    {
        for(var y =0; y < html_array[x].length; y++)
            html+=html_array[x][y];
    }

    $('#'+league+'_betting_table').html(html);




    //sets straty table's profit
    var base=5000;
    $('#strat_00_base').html("$"+base);
    $('#strat_01_base').html("$"+base);
    $('#strat_1_base').html("$"+base);
    $('#strat_2_base').html("$"+base);
    $('#strat_3_base').html("$"+base);
    $('#strat_4_base').html("$"+base);
    $('#strat_3_4_base').html("$"+base);
    var strat_00_rev=parseInt(base+strat_00['profit']);
    var strat_01_rev=parseInt(base+strat_01['profit']);
    var strat_1_rev=parseInt(base+strat_1['profit']);
    var strat_2_rev=parseInt(base+strat_2['profit']);
    var strat_3_rev=parseInt(base+strat_3['profit']);
    var strat_4_rev=parseInt(base+strat_4['profit']);
    //console.log("Won: "+strat_3_4['won']+" | bets: "+strat_3_4['bets']);
    var strat_3_4_rev=parseInt(base+(strat_3_4['won']-strat_3_4['bets']));
    $('#strat_00_revenue').html("$"+strat_00_rev);
    $('#strat_01_revenue').html("$"+strat_01_rev);
    $('#strat_1_revenue').html("$"+strat_1_rev);
    $('#strat_2_revenue').html("$"+strat_2_rev);
    $('#strat_3_revenue').html("$"+strat_3_rev);
    $('#strat_4_revenue').html("$"+strat_4_rev);
    $('#strat_3_4_revenue').html("$"+strat_3_4_rev);
    var strat_00_perc = strat_00_rev/base*100-100;
    var strat_01_perc = strat_01_rev/base*100-100;
    var strat_1_perc = strat_1_rev/base*100-100;
    var strat_2_perc = strat_2_rev/base*100-100;
    var strat_3_perc = strat_3_rev/base*100-100;
    var strat_4_perc = strat_4_rev/base*100-100;
    var strat_3_4_perc = strat_3_4_rev/base*100-100;
    $('#strat_00_perc').html(strat_00_perc.toFixed(2)+"%");
    $('#strat_01_perc').html(strat_01_perc.toFixed(2)+"%");
    $('#strat_1_perc').html(strat_1_perc.toFixed(2)+"%");
    $('#strat_2_perc').html(strat_2_perc.toFixed(2)+"%");
    $('#strat_3_perc').html(strat_3_perc.toFixed(2)+"%");
    $('#strat_4_perc').html(strat_4_perc.toFixed(2)+"%");
    $('#strat_3_4_perc').html(strat_3_4_perc.toFixed(2)+"%");
    $('#strat_00_record').html(strat_00['num_wins']+"-"+strat_00['num_losses']);
    $('#strat_01_record').html(strat_01['num_wins']+"-"+strat_01['num_losses']);
    $('#strat_1_record').html(strat_1['num_wins']+"-"+strat_1['num_losses']);
    $('#strat_2_record').html(strat_2['num_wins']+"-"+strat_2['num_losses']);
    $('#strat_3_record').html(strat_3['num_wins']+"-"+strat_3['num_losses']);
    $('#strat_4_record').html(strat_4['num_wins']+"-"+strat_4['num_losses']);
    $('#strat_3_4_record').html(strat_3_4['num_wins']+"-"+strat_3_4['num_losses']);
    $('#strat_00_avg_profit').html("$"+(strat_00['profit']/strat_00['num_bets']).toFixed(2));
    $('#strat_01_avg_profit').html("$"+(strat_01['profit']/strat_01['num_bets']).toFixed(2));
    $('#strat_1_avg_profit').html("$"+(strat_1['profit']/strat_1['num_bets']).toFixed(2));
    $('#strat_2_avg_profit').html("$"+(strat_2['profit']/strat_2['num_bets']).toFixed(2));
    $('#strat_3_avg_profit').html("$"+(strat_3['profit']/strat_3['num_bets']).toFixed(2));
    $('#strat_4_avg_profit').html("$"+(strat_4['profit']/strat_4['num_bets']).toFixed(2));
    $('#strat_3_4_avg_profit').html("$"+((strat_3_4['won']-strat_3_4['bets'])/strat_3_4['num_bets']).toFixed(2));
    if(strat_00_perc>0)
        $('#strat_00_perc').addClass("won");
    else
        $('#strat_00_perc').addClass("lost");
    if(strat_01_perc>0)
        $('#strat_01_perc').addClass("won");
    else
        $('#strat_01_perc').addClass("lost");
    if(strat_1_perc>0)
        $('#strat_1_perc').addClass("won");
    else
        $('#strat_1_perc').addClass("lost");
    if(strat_2_perc>0)
        $('#strat_2_perc').addClass("won");
    else
        $('#strat_2_perc').addClass("lost");
    if(strat_3_perc>0)
        $('#strat_3_perc').addClass("won");
    else
        $('#strat_3_perc').addClass("lost");
    if(strat_4_perc>0)
        $('#strat_4_perc').addClass("won");
    else
        $('#strat_4_perc').addClass("lost");
    if(strat_3_4_perc>0)
        $('#strat_3_4_perc').addClass("won");
    else
        $('#strat_3_4_perc').addClass("lost");
}



function get_timezone()
{
    var date = new Date();
    var timezone = date.getTimezoneOffset();
    return timezone;
}
function display_error(error, type)
{
    $('#errors').css('opacity', 0).html(error).attr('class', type).show();
    $('#errors').stop().animate({
        opacity :1
    }, 500, function()
    {
        setTimeout(function()
        {
            $('#errors').stop().animate({
                opacity:0
            }, 500, function()
            {
                $('#errors').html('').hide();
            });
        }, 5000);
    });
}
//id is id of element and string is message
function display_title(id, string)
{
    $(id).mousemove(function(e)
    {
        if($('.tool_tip').css('opacity')<'0.8')
        {
            $('.tool_tip').html("<p class='tool_tip_text'>"+string+"</p>").css({'left': (e.pageX-50), 'top': (e.pageY+20)});
            $('.tool_tip').stop().animate({
                opacity: 1
            }, 100, function()
            {});
        }
        else
            $('.tool_tip').css({'left': (e.pageX-50), 'top': (e.pageY+20)});
    });
}

//formats user textarea text like reddit's format
function text_format(text)
{
    var final_text=text;
    
    //continue until everything is converted
    while(1==1)
    {
        if(final_text.toLowerCase().indexOf('[b](')!=-1)
        {
            var prev_index=final_text.toLowerCase().indexOf('[b](');
            
            //gets "and this is going to be bold) whatever comes after"
            var start=prev_index+4;
            var temp=final_text.substring(start);
            
            
            if(temp.indexOf(')')!=-1)
            {
                //gets ")" of "and this is going to be bold)"
                var end=start+temp.indexOf(')');
                
                
                var body_text=final_text.substring(start, end);
                
                var front=final_text.substring(0,prev_index);
                var middle="<span style='font-weight:bold;'>"+body_text+"</span>";
                var back=final_text.substring(end+1);
                
                //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                final_text=front+middle+back;
            }
            else
            {
                //gets "and this is going to be bold"
                var front=final_text.substring(0,prev_index);
                var body_text=final_text.substring(start);
                
                //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                final_text=front+"<span style='font-weight:bold;'>"+body_text+"</span>";
            }
        }
        else if(final_text.toLowerCase().indexOf('[i](')!=-1)
        {
            var prev_index=final_text.toLowerCase().indexOf('[i](');
            
            //gets "and this is going to be bold) whatever comes after"
            var start=prev_index+4;
            var temp=final_text.substring(start);
            
            
            if(temp.indexOf(')')!=-1)
            {
                //gets ")" of "and this is going to be bold)"
                var end=start+temp.indexOf(')');
                
                
                var body_text=final_text.substring(start, end);
                
                var front=final_text.substring(0,prev_index);
                var middle="<span style='font-style:italic;'>"+body_text+"</span>";
                var back=final_text.substring(end+1);
                
                //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                final_text=front+middle+back;
            }
            else
            {
                //gets "and this is going to be bold"
                var front=final_text.substring(0,prev_index);
                var body_text=final_text.substring(start);
                
                //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                final_text=front+"<span style='font-style:italic;'>"+body_text+"</span>";
            }
        }
        
        else if(final_text.toLowerCase().indexOf('[u](')!=-1)
        {
            var prev_index=final_text.toLowerCase().indexOf('[u](');
            
            //gets "and this is going to be bold) whatever comes after"
            var start=prev_index+4;
            var temp=final_text.substring(start);
            
            
            if(temp.indexOf(')')!=-1)
            {
                //gets ")" of "and this is going to be bold)"
                var end=start+temp.indexOf(')');
                
                
                var body_text=final_text.substring(start, end);
                
                var front=final_text.substring(0,prev_index);
                var middle="<span style='text-decoration:underline;'>"+body_text+"</span>";
                var back=final_text.substring(end+1);
                
                //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                final_text=front+middle+back;
            }
            else
            {
                //gets "and this is going to be bold"
                var front=final_text.substring(0,prev_index);
                var body_text=final_text.substring(start);
                
                //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                final_text=front+"<span style='text-decoration:underline;'>"+body_text+"</span>";
            }
        }
            
        else if(final_text.toLowerCase().indexOf('[s](')!=-1)
        {
            var prev_index=final_text.toLowerCase().indexOf('[s](');
            
            //gets "and this is going to be bold) whatever comes after"
            var start=prev_index+4;
            var temp=final_text.substring(start);
            
            
            if(temp.indexOf(')')!=-1)
            {
                //gets ")" of "and this is going to be bold)"
                var end=start+temp.indexOf(')');
                
                
                var body_text=final_text.substring(start, end);
                
                var front=final_text.substring(0,prev_index);
                var middle="<span style='font-size:75%;'>"+body_text+"</span>";
                var back=final_text.substring(end+1);
                
                //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                final_text=front+middle+back;
            }
            else
            {
                //gets "and this is going to be bold"
                var front=final_text.substring(0,prev_index);
                var body_text=final_text.substring(start);
                
                //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                final_text=front+"<span style='font-size:75%;'>"+body_text+"</span>";
            }
        }
        
        else if(final_text.toLowerCase().indexOf('[box](')!=-1)
        {
            var prev_index=final_text.toLowerCase().indexOf('[box](');
            
            //gets "and this is going to be bold) whatever comes after"
            var start=prev_index+6;
            var temp=final_text.substring(start);
            
            
            if(temp.indexOf(')')!=-1)
            {
                //gets ")" of "and this is going to be bold)"
                var end=start+temp.indexOf(')');
                
                
                var body_text=final_text.substring(start, end);
                
                var front=final_text.substring(0,prev_index);
                var middle="<span style='border:1px solid black;'>"+body_text+"</span>";
                var back=final_text.substring(end+1);
                
                //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                final_text=front+middle+back;
            }
            else
            {
                //gets "and this is going to be bold"
                var front=final_text.substring(0,prev_index);
                var body_text=final_text.substring(start);
                
                //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                final_text=front+"<span style='border:1px solid black;'>"+body_text+"</span>";
            }
        }
        
        else if(final_text.toLowerCase().indexOf('[red](')!=-1)
        {
                    var prev_index=final_text.toLowerCase().indexOf('[red](');

                    //gets "and this is going to be bold) whatever comes after"
                    var start=prev_index+6;
                    var temp=final_text.substring(start);


                    if(temp.indexOf(')')!=-1)
                    {
                        //gets ")" of "and this is going to be bold)"
                        var end=start+temp.indexOf(')');


                        var body_text=final_text.substring(start, end);

                        var front=final_text.substring(0,prev_index);
                        var middle="<span style='color:red;'>"+body_text+"</span>";
                        var back=final_text.substring(end+1);

                        //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                        final_text=front+middle+back;
                    }
                    else
                    {
                        //gets "and this is going to be bold"
                        var front=final_text.substring(0,prev_index);
                        var body_text=final_text.substring(start);

                        //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                        final_text=front+"<span style='color:red;'>"+body_text+"</span>";
                    }
        }
        else if(final_text.toLowerCase().indexOf('[orange](')!=-1)
        {
                    var prev_index=final_text.toLowerCase().indexOf('[orange](');

                    //gets "and this is going to be bold) whatever comes after"
                    var start=prev_index+9;
                    var temp=final_text.substring(start);


                    if(temp.indexOf(')')!=-1)
                    {
                        //gets ")" of "and this is going to be bold)"
                        var end=start+temp.indexOf(')');


                        var body_text=final_text.substring(start, end);

                        var front=final_text.substring(0,prev_index);
                        var middle="<span style='color:orange;'>"+body_text+"</span>";
                        var back=final_text.substring(end+1);

                        //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                        final_text=front+middle+back;
                    }
                    else
                    {
                        //gets "and this is going to be bold"
                        var front=final_text.substring(0,prev_index);
                        var body_text=final_text.substring(start);

                        //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                        final_text=front+"<span style='color:orange;'>"+body_text+"</span>";
                    }
        }   
        else if(final_text.toLowerCase().indexOf('[yellow](')!=-1)
        {
                    var prev_index=final_text.toLowerCase().indexOf('[yellow](');

                    //gets "and this is going to be bold) whatever comes after"
                    var start=prev_index+9;
                    var temp=final_text.substring(start);


                    if(temp.indexOf(')')!=-1)
                    {
                        //gets ")" of "and this is going to be bold)"
                        var end=start+temp.indexOf(')');


                        var body_text=final_text.substring(start, end);

                        var front=final_text.substring(0,prev_index);
                        var middle="<span style='color:yellow;'>"+body_text+"</span>";
                        var back=final_text.substring(end+1);

                        //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                        final_text=front+middle+back;
                    }
                    else
                    {
                        //gets "and this is going to be bold"
                        var front=final_text.substring(0,prev_index);
                        var body_text=final_text.substring(start);

                        //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                        final_text=front+"<span style='color:yellow;'>"+body_text+"</span>";
                    }
        }
        else if(final_text.toLowerCase().indexOf('[green](')!=-1)
        {
                    var prev_index=final_text.toLowerCase().indexOf('[green](');

                    //gets "and this is going to be bold) whatever comes after"
                    var start=prev_index+8;
                    var temp=final_text.substring(start);


                    if(temp.indexOf(')')!=-1)
                    {
                        //gets ")" of "and this is going to be bold)"
                        var end=start+temp.indexOf(')');


                        var body_text=final_text.substring(start, end);

                        var front=final_text.substring(0,prev_index);
                        var middle="<span style='color:green;'>"+body_text+"</span>";
                        var back=final_text.substring(end+1);

                        //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                        final_text=front+middle+back;
                    }
                    else
                    {
                        //gets "and this is going to be bold"
                        var front=final_text.substring(0,prev_index);
                        var body_text=final_text.substring(start);

                        //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                        final_text=front+"<span style='color:green;'>"+body_text+"</span>";
                    }
        }
        else if(final_text.toLowerCase().indexOf('[blue](')!=-1)
        {
                    var prev_index=final_text.toLowerCase().indexOf('[blue](');

                    //gets "and this is going to be bold) whatever comes after"
                    var start=prev_index+7;
                    var temp=final_text.substring(start);


                    if(temp.indexOf(')')!=-1)
                    {
                        //gets ")" of "and this is going to be bold)"
                        var end=start+temp.indexOf(')');


                        var body_text=final_text.substring(start, end);

                        var front=final_text.substring(0,prev_index);
                        var middle="<span style='color:blue;'>"+body_text+"</span>";
                        var back=final_text.substring(end+1);

                        //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                        final_text=front+middle+back;
                    }
                    else
                    {
                        //gets "and this is going to be bold"
                        var front=final_text.substring(0,prev_index);
                        var body_text=final_text.substring(start);

                        //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                        final_text=front+"<span style='color:blue;'>"+body_text+"</span>";
                    }
        }
        else if(final_text.toLowerCase().indexOf('[purple](')!=-1)
        {
                    var prev_index=final_text.toLowerCase().indexOf('[purple](');

                    //gets "and this is going to be bold) whatever comes after"
                    var start=prev_index+9;
                    var temp=final_text.substring(start);


                    if(temp.indexOf(')')!=-1)
                    {
                        //gets ")" of "and this is going to be bold)"
                        var end=start+temp.indexOf(')');


                        var body_text=final_text.substring(start, end);

                        var front=final_text.substring(0,prev_index);
                        var middle="<span style='color:purple;'>"+body_text+"</span>";
                        var back=final_text.substring(end+1);

                        //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                        final_text=front+middle+back;
                    }
                    else
                    {
                        //gets "and this is going to be bold"
                        var front=final_text.substring(0,prev_index);
                        var body_text=final_text.substring(start);

                        //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                        final_text=front+"<span style='color:purple;'>"+body_text+"</span>";
                    }
        }
        else if(final_text.toLowerCase().indexOf('[pink](')!=-1)
        {
                    var prev_index=final_text.toLowerCase().indexOf('[pink](');

                    //gets "and this is going to be bold) whatever comes after"
                    var start=prev_index+7;
                    var temp=final_text.substring(start);


                    if(temp.indexOf(')')!=-1)
                    {
                        //gets ")" of "and this is going to be bold)"
                        var end=start+temp.indexOf(')');


                        var body_text=final_text.substring(start, end);

                        var front=final_text.substring(0,prev_index);
                        var middle="<span style='color:pink;'>"+body_text+"</span>";
                        var back=final_text.substring(end+1);

                        //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                        final_text=front+middle+back;
                    }
                    else
                    {
                        //gets "and this is going to be bold"
                        var front=final_text.substring(0,prev_index);
                        var body_text=final_text.substring(start);

                        //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                        final_text=front+"<span style='color:pink;'>"+body_text+"</span>";
                    }
        }
        else if(final_text.toLowerCase().indexOf('[brown](')!=-1)
        {
                    var prev_index=final_text.toLowerCase().indexOf('[brown](');

                    //gets "and this is going to be bold) whatever comes after"
                    var start=prev_index+8;
                    var temp=final_text.substring(start);


                    if(temp.indexOf(')')!=-1)
                    {
                        //gets ")" of "and this is going to be bold)"
                        var end=start+temp.indexOf(')');


                        var body_text=final_text.substring(start, end);

                        var front=final_text.substring(0,prev_index);
                        var middle="<span style='color:brown;'>"+body_text+"</span>";
                        var back=final_text.substring(end+1);

                        //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                        final_text=front+middle+back;
                    }
                    else
                    {
                        //gets "and this is going to be bold"
                        var front=final_text.substring(0,prev_index);
                        var body_text=final_text.substring(start);

                        //removes "[b](and this is going to be bold)" and replaces it with <span style='font-weight:bold;'>and this is going to be bold</span>
                        final_text=front+"<span style='color:brown;'>"+body_text+"</span>";
                    }
        }
        else
            break;
    }
    
    while(final_text.indexOf('3:)')!=-1)
        final_text=final_text.replace("3:)", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/7.png)'></span>");
    while(final_text.indexOf('(devil)')!=-1)
        final_text=final_text.replace("(devil)", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/7.png)'></span>");
    
    while(final_text.indexOf(':D')!=-1)
        final_text=final_text.replace(":D", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/1.png)'></span>");
    while(final_text.indexOf(':-D')!=-1)
        final_text=final_text.replace(":-D", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/1.png)'></span>");
    
    while(final_text.indexOf(':)')!=-1)
        final_text=final_text.replace(":)", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/2.png)'></span>");
    while(final_text.indexOf(':-)')!=-1)
        final_text=final_text.replace(":-)", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/2.png)'></span>");
    while(final_text.indexOf('(:')!=-1)
        final_text=final_text.replace("(:", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/2.png)'></span>");
    while(final_text.indexOf('(-:')!=-1)
        final_text=final_text.replace("(-:", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/2.png)'></span>");
   
    while(final_text.indexOf('-_-')!=-1)
        final_text=final_text.replace("-_-", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/3.png)'></span>");
    while(final_text.indexOf('(-_-)')!=-1)
        final_text=final_text.replace("(-_-)", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/3.png)'></span>");
    
    while(final_text.indexOf('*_*')!=-1)
        final_text=final_text.replace("*_*", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/4.png)'></span>");
    while(final_text.indexOf('*.*')!=-1)
        final_text=final_text.replace("*.*", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/4.png)'></span>");
    while(final_text.indexOf('O_O')!=-1)
        final_text=final_text.replace("O_O", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/4.png)'></span>");
    while(final_text.indexOf('O.O')!=-1)
        final_text=final_text.replace("O.O", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/4.png)'></span>");
    while(final_text.indexOf('0.0')!=-1)
        final_text=final_text.replace("0.0", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/4.png)'></span>");
    while(final_text.indexOf('0_0')!=-1)
        final_text=final_text.replace("0_0", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/4.png)'></span>");
    while(final_text.indexOf('(*_*)')!=-1)
        final_text=final_text.replace("(*_*)", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/4.png)'></span>");
    while(final_text.indexOf('(*.*)')!=-1)
        final_text=final_text.replace("(*.*)", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/4.png)'></span>");
    while(final_text.indexOf('(O_O)')!=-1)
        final_text=final_text.replace("(O_O)", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/4.png)'></span>");
    while(final_text.indexOf('(O.O)')!=-1)
        final_text=final_text.replace("(O.O)", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/4.png)'></span>");
    while(final_text.indexOf('(0.0)')!=-1)
        final_text=final_text.replace("(0.0)", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/4.png)'></span>");
    while(final_text.indexOf('(0_0)')!=-1)
        final_text=final_text.replace("(0_0)", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/4.png)'></span>");
    
    while(final_text.indexOf(":'(")!=-1)
        final_text=final_text.replace(":'(", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/5.png)'></span>");
    while(final_text.indexOf(")':")!=-1)
        final_text=final_text.replace(")':", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/5.png)'></span>");
    
    while(final_text.indexOf('(cool)')!=-1)
        final_text=final_text.replace("(cool)", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/6.png)'></span>");
    
    while(final_text.indexOf('XD')!=-1)
        final_text=final_text.replace("XD", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/8.png)'></span>");
    
    while(final_text.indexOf('&lt;3')!=-1)
        final_text=final_text.replace("&lt;3", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/9.png)'></span>");
    while(final_text.indexOf('<3')!=-1)
        final_text=final_text.replace("<3", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/9.png)'></span>");
    
    while(final_text.indexOf(":P")!=-1)
        final_text=final_text.replace(":P", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/10.png)'></span>");
    while(final_text.indexOf(':-P')!=-1)
        final_text=final_text.replace(":-P", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/10.png)'></span>");
    while(final_text.indexOf('d:')!=-1)
        final_text=final_text.replace("d:", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/10.png)'></span>");
    while(final_text.indexOf('d-:')!=-1)
        final_text=final_text.replace("d-:", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/10.png)'></span>");
    
    while(final_text.indexOf('(swear)')!=-1)
        final_text=final_text.replace("(swear)", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/11.png)'></span>");
    
    while(final_text.indexOf('&gt;:(')!=-1)
        final_text=final_text.replace("&gt;:(", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/12.png)'></span>");
    while(final_text.indexOf('&gt;:|')!=-1)
        final_text=final_text.replace("&gt;:|", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/12.png)'></span>");
    while(final_text.indexOf('>:(')!=-1)
        final_text=final_text.replace(">:(", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/12.png)'></span>");
    while(final_text.indexOf('>:|')!=-1)
        final_text=final_text.replace(">:|", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/12.png)'></span>");
    
    while(final_text.indexOf(';)')!=-1)
        final_text=final_text.replace(";)", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/13.png)'></span>");
    while(final_text.indexOf('(;')!=-1)
        final_text=final_text.replace("(;", "<span class='emoticon' style='background-image: url(http://pics.redlay.com/pictures/emoticons/13.png)'></span>");
    
    
    return final_text;
}


//outputs "10 seconds ago" if seconds=10
function convert_time(seconds)
{
    if(seconds<2678400)
    {
        if(seconds>=3600)
        {
            if(seconds>604800)
                //old number format
                var new_time=format_number((seconds/86400))+" days ago";
            else if(seconds>=86400&&seconds<604800)
            {
                //old number format
                var num_days=format_number((seconds/86400));
                var num_hours=format_number(((seconds%86400)/3600));

                if(num_days!=1)
                    var days=num_days+" days";
                else
                    var days="1 day";

                if(num_hours!=0)
                {
                    if(num_hours!=1)
                        var hours=num_hours+" hours ago";
                    else
                        var hours="1 hour ago";
                }
                else
                {
                    //old number format
                    var minutes=format_number(((seconds%3600)/60));
                    hours=minutes+" minutes ago";
                }

                var new_time=days+" "+hours;
            }
            else if(seconds>=7200)
            {
                //old number format
                var minutes=format_number((seconds%3600)/60);
                if(minutes!=0)
                    var new_time=format_number((seconds/3600))+" hours "+minutes+" minutes ago";
                else
                    var new_time=format_number((seconds/3600))+" hours ago";
            }
            else if(seconds>=3660&&seconds<7200)
            {
                //old number format
                var minutes=format_number((seconds%3600)/60);
                if(minutes!=0)
                    var new_time="1 hour and "+minutes+" minutes ago";
                else
                    var new_item="1 hour ago";
            }
            else
                var new_time="1 hour ago";
        }
        else
        {
            if(seconds>=120)
            {
                //old number format
                var new_time=format_number((seconds/60))+" minutes ago";
            }
            else if(seconds>=60&&seconds<120)
                var new_time="1 minute ago";
            else if(seconds<60)
                var new_time=seconds+" seconds ago";
        }
    } 
    
    return new_time;
}


function format_number(number)
{
    var temp=number;
    
    while(number>=1000)
        number-=1000;
    
    while(number>=100)
        number-=100;
    
    while(number>=10)
        number-=10;
    
    while(number>=1)
        number-=1;
    
    //gets overflow and subtracts to round
    return temp-number;   
}


function initialize_thumbnail_selection(image_id, width, height)
{
        //if image's width is bigger than its height
        if(width>=height)
        {
            if(width/height>=1.5)
            {
                var ratio=width/450;
                var new_width=format_number(width/ratio);
                var new_height=format_number(height/ratio);
                
                $('.draggable_thumbnail_selector').height(new_height);
                $('.draggable_thumbnail_selector').width(new_height);
            }
            else
            {
               var ratio=height/300;
                var new_width=format_number(width/ratio);;
                var new_height=format_number(height/ratio);
                
                $('.draggable_thumbnail_selector').height(300);
                $('.draggable_thumbnail_selector').width(300);
            }


            $('#thumbnail_image_preview').css('max-height', '150px');
        }

        //if image's height is bigger than its width
        else 
        {
               var ratio=height/300;
                var new_width=format_number(width/ratio);;
                var new_height=format_number(height/ratio);
                
                $('.draggable_thumbnail_selector').height(300);
                $('.draggable_thumbnail_selector').width(300);
                

            $('#thumbnail_image_preview').css('max-width', '150px');
        }
//        $('#picture_preview_body').width(new_width).height(new_height);


        $('.draggable_thumbnail_selector').draggable(
        {
            containment: '#picture_preview_body',
            drag: function()
            {
                if($('#upload_photo_preview_image').width()>$('#upload_photo_preview_image').height())
                {
                    var width=$('#upload_photo_preview_image').width();
                    var small_width=$('#thumbnail_image_preview').width();


                    var position=$('.draggable_thumbnail_selector').position();
                    var ratio=width/small_width;
                    $('#thumbnail_image_preview').css('left', Math.round(position.left/(ratio))*-1);
                }
                else
                {
                    var height=$('#upload_photo_preview_image').height();
                    var small_height=$('#thumbnail_image_preview').height();


                    var position=$('.draggable_thumbnail_selector').position();
                    var ratio=height/small_height;
                    $('#thumbnail_image_preview').css('top', Math.round(position.top/(ratio))*-1);
                }    

            }
        });

    $('#thumbnail_info').html("<p >Set the thumbnail for this picture</p><table><tbody><tr><td><input class='button red_button' type='button' onClick=set_picture_thumbnail('"+image_id+"'); value='Set'/></td><td><input class='button gray_button' type='button' value='Cancel' onClick='close_thumbnail_selection();'/></td></tr></tbody></table>");
}

//id is id of element and string is message
function display_title(id, string)
{
    $(id).mousemove(function(e)
    {
        if($('.tool_tip').css('opacity')<'0.8')
        {
            $('.tool_tip').html("<p class='tool_tip_text'>"+string+"</p>").css({'left': (e.pageX-50), 'top': (e.pageY+20)});
            $('.tool_tip').stop().animate({
                opacity: 1
            }, 100, function()
            {});
        }
        else
            $('.tool_tip').css({'left': (e.pageX-50), 'top': (e.pageY+20)});
    });
}
function hide_title(id)
{
    $('.tool_tip').stop().animate({
        opacity: '0'
    }, 100, function()
    {
        $('.tool_tip').html('').css({'left': '0px', 'top': '0px', 'opacity': '0'});
    });
}
