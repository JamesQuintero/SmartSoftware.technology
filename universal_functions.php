<?php

function log_IP($file_name)
{
    //counts view
    $path = "./IP_addresses/".$file_name."_IPs.txt";
    $contents=file_get_contents($path);
    $contents=explode('|', $contents);

    $date=time();
    $IP = $_SERVER['REMOTE_ADDR'];
    
    $timezone=8;
    $new_date=date('F j, Y g:iA', ($date-($timezone*60*60)));
    $contents[]=($new_date."<>".$IP);
    
    
    $contents=implode("|", $contents);
    file_put_contents($path, $contents);
    
}


