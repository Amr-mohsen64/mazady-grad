<?php
   session_start();     // start the session 
   session_unset();     // unset the session 
   session_destroy();   // destroy

   header('location:login.php');
   exit();


?>