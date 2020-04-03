<?php
    require_once 'connect.php';
    // Routes
    $tpl        = 'includes/template/';         // template directory
    $css        = 'layout/css/';                // css directroy
    $js         = 'layout/js/';                 // js directory
    $images     = 'layout/images/';             // imges directory
    $plugins    = 'layout/plugins/';            // plugins directory
    $func       = 'includes/functions/';        // functions directroy 

    

    // // include the imprtant files 
    require_once $func . 'functions.php';
    require_once $tpl . 'header.php';


    // include navbar in All the pages except the one who has navbar variable 

    // if variable navbar is not exist in the pages 
    // if(!isset($noNavBar)){
    //     include $tpl . 'navbar.php';
    // }



?>