<?php 
    date_default_timezone_set('Africa/Cairo');  

    /*
    date(format , timestamp) // format the time
    strtotime(date,timestamp);
   
    echo time(). "</br>";
    echo date('Y-m-d h:i:s');
    echo date_default_timezone_get() . "</br>";
    $nextmonth=  time() + (30*24*60*60) ;    // after month 
    $nextweek=  time() + (7*24*60*60) ;    // next week 
    echo date('Y-m-d h:i:s' , $nextmonth) . "</br>";
    echo date('Y-m-d h:i:s' , $nextweek). "</br>";
    echo date('l jS \of F h:m:sa'). "</br>";
 */
    $time = strtotime('now' ,time() - 3600);
    echo date('Y-m-d h:i:s' , $time) . "</br>";


?>