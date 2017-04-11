<?php
//include('init.php');

//if(!isset($_SESSION['id']))
//{
//    if(isset($_COOKIE['acc_id']))
//    {
//        $query=mysql_query("SELECT id FROM users WHERE account_id='$_COOKIE[acc_id]' LIMIT 1");
//        if($query&&mysql_num_rows($query)==1)
//        {
//            $array=mysql_fetch_row($query);
//
//            $_SESSION['id']=$array[0];
//            header("Location: http://imagepxl.com/home");
//            exit();
//        }
//    }
//}
//else
//{
//    header("Location: http://imagepxl.com/home");
//    exit();
//}

include('universal_functions.php');

log_IP("index");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
   <head>
      <meta name="description" content="SmartSoftware is an Artificial Intelligence development project" />
        <meta name="keywords" content="A.I., AI, Artificial, Intelligence, Artificial Intelligence, Machine Learning, Neural Networks, Bot, " />
        <title>Smart Software - A.I. Development</title>
        <?php // include('required_header.php'); ?>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
      <?php include('code_header.php'); ?>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <script type="text/javascript" src="./main.js"></script>
      <script type="text/javascript">
         
//        function image_fades(index)
//        {
//            
//            //goes on forever
//            var index2=0;
//            
//            if(index!=3)
//                index2=index+1;
//            else
//                index2=0;
//
//            setTimeout(function(){
//                $('#index_image_'+index).animate({
//                    opacity: 0
//                }, 1000, function(){});
//
//                $('#index_image_'+index2).animate({
//                    opacity: 1
//                }, 1000, function(){});
//                setTimeout(function(){
//                    image_fades(index2);;
//                }, 1000);
//            }, 5000);
//        }
//        
//        function display_top_images(page)
//        {
//            $.post('top_query.php',
//            {
//                type:'rising',
//                page: page,
//                content_type: 'images',
//                timezone: get_timezone()
//            }, function(output)
//            {
//                var image_ids=output.image_ids;
//                var exts=output.exts;
//                var usernames=output.usernames;
//                var descriptions=output.descriptions;
//                var num_views=output.views;
//                var num_likes=output.num_likes;
//                var num_dislikes=output.num_dislikes;
//                var thumbnails=output.thumbnails;
//
//                var index=page*25-25;
//                for(var x = 0; x < image_ids.length; x++)
//                {
//                    var image="<a class='link' href='http://imagepxl.com/"+image_ids[x]+"' ><img id='index_image_preview_"+index+"' class='image_preview' src='"+thumbnails[x]+"' style='width:155px;' /></a>";
//                    var points_unit="<span class='function_text inside_function_text ' style='cursor:default;text-align:center;' >"+(num_likes[x]-num_dislikes[x])+" points</span>";
//                    var views_unit="<span class='function_text inside_function_text ' style='cursor:default;text-align:center;' >"+num_views[x]+" views</span>";
//                    var image_functions="<table class='functions_table' style='width:100%;'><tbody><tr><td class='left_functions_unit' ><div id='points_unit_"+index+"' class='left_function_disabled function_interior_disabled  ' style='border-left:none;'>"+points_unit+"</div></td><td class='middle_functions_unit' style='text-align:center;'><div id='views_unit_"+index+"' class='right_function_disabled function_interior_disabled ' style='border-right:none;'>"+views_unit+"</div></td></tr></tbody></table>";
//                    var image_body="<div class='image_body'>"+image+"<div class='interior_image_functions'>"+image_functions+"</div></div>"
//                    
////                    $('#index_unit_'+x).html("<table><tbody><tr><td><a class='link' href='http://imagepxl.com/"+image_ids[x]+"' ><img class='image_preview' id='index_image_preview_"+x+"' src='http://i.imagepxl.com/"+usernames[x]+"/thumbs/"+image_ids[x]+"."+exts[x]+"' /></a></td></tr></tbody></table>");
//                    $('#index_unit_'+index).html(image_body).css({'opacity': '0', 'width': '155px', 'height': '155px'});
//                    
//                    if(descriptions[x]!='')
//                        $("#index_image_preview_"+index).attr({'onmouseover': "display_title(this, '"+descriptions[x]+"');", 'onmouseout': "hide_title(this);"});
//                    else
//                        $("#index_image_preview_"+index).attr({'onmouseover': "display_title(this, '<i>No Caption</i>');", 'onmouseout': "hide_title(this);"});
//                   
//                   index++;
//                }
//                
//                if(page<4)
//                       $('#index_see_more').attr('onClick', "display_top_images("+(page+1)+")");
//                   else
//                       $('#index_see_more').hide();
//                   
//                animate(page*25-25)
//                
//                change_color();
//            }, "json");
//        }
//        
//        function animate_recursion(num)
//        {
//            $('#index_unit_'+num).animate({
//                opacity:1
//            }, 75, function(){
//                num++;
//                if($('#index_unit_'+(num+1)).length)
//                    animate_recursion(num);
//            });
//        }
//        
//        function animate(num)
//        {
//            setTimeout(function(){
//                animate_recursion(num);
//            }, 500);
//        }
        
         
         $(document).ready(function()
         {
         
//         initialize_input_boxes();
//            for(var x = 1; x < 4; x++)
//                $('#index_image_'+x).css('opacity', 0);
//            display_top_images(1);
            
            <?php
                include('required_jquery.php');
            ?>
         });
      </script>
      <script type="text/javascript">
        <?php include('required_google_analytics.js'); ?>
      </script>
   </head>
   <body>
        <?php include('index_header.php'); ?>
       
       <div class="content">
           <p>Artificial Intelligence development. </p>
       </div>


      <?php include('footer.php'); ?>
   </body>
</html>