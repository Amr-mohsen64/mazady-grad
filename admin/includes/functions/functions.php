<?php


   /*
    * get All from database
    * function to get any records from data bas
   */

   function getAll($field , $table , $where = NULL , $and= NULL ,$orderFiled  , $ordering = 'DESC'){
      global $db ;
      $getAll = $db ->prepare("SELECT $field FROM $table $where $and ORDER BY $orderFiled $ordering ");  
      $getAll ->execute(); 
      $records = $getAll ->fetchAll();
      return $records;  
   }


   /**
    * check if user is not activated
    * function to check the reg staties of the user 
    */
      function checkUserStatues($user){
         global $db ;
      // check if the user exits in database  
      $stmtx = $db->prepare("SELECT
                                 userName, regStatues
                              FROM
                                 users
                              WHERE
                                 userName = ?
                              AND
                                 regStatues = 0");      // not activated 
      $stmtx ->execute(array($user));
      $staues = $stmtx->rowCount();
      return $staues ; // returns 1 or 0 
      // if rowcount == 1 means there are a records of regstatues zero wich means  disactivated 
    }


   /**
    ** title function that echo the page title  v1.0
    ** Has the variable $pageTitle and echo the default 
    */
   function getTitle(){
      global $pageTitle ;
      if(isset($pageTitle)){
         echo $pageTitle;
      }else{
         echo 'Default';
      }
   }; 

   /** Home Redirect function [accpets paremeters ]   v2.0
    * $theMsg = Echo the msg [error , sucsses  , warnning]
    * URL = the link you want to redirect
    * $seconds  = seconds before redirecting 
   **/
   function redirectHome($theMsg , $url = null, $seconds = 3){
      if($url === null){ // if we left the $url empty it asigns the default value 
         $url = "index.php";
         $link = 'Home Page';
      }else {
         // if the page that i get from exists and not empty
         if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){
            // HTTP_REFERER the page that i get from 
            $url = $_SERVER['HTTP_REFERER'];
            $link = 'Previous page';
         }else {
            $url = 'index.php';
            $link = 'home page';
         }
      }
      echo $theMsg;
      echo "<div class ='alert alert-info'>You Wil Be Directed to $link After seconds $seconds </div>";
      header("refresh:$seconds , URL=$url");
      exit();
   };

   /**
   * check item function v1.0 
   * Function to check Item in Database[accetpts parameters]
   * $select  = the item to select [Example : username, item , category ]
   * $from  = the Table to select from [Example : users , items]
   * $value = the value of selceted [Example : osama , box , electorcs] 
   */

   function checkItem($select , $from , $value){
      global $db ;
      $statment = $db ->prepare("SELECT $select FROM $from WHERE $select = ?");
      $statment ->execute(array($value));
      $count = $statment ->rowCount(); 
      return $count ;
   };
   /**
    * Count Number Of Items function v1.0 
    * Functions to Count Number Of Items Rows
    * $items  : items to count userid, username ,
    * $table : the name of table 
    */
      function countItems($item ,$table){
      global $db ;
      $stmt2 = $db ->prepare("SELECT COUNT($item) FROM $table ");    // COUNT(): The length , groupID= 0 not admin 
      $stmt2 ->execute();
      return $stmt2 ->fetchColumn();  // get the number of coulumns 
      }

      /**
    * Get the latest Item function v1.0 
    * Functions to Get the latest Item
    * $items  : items to count userid, username ,
    * $table : the name of table 
    * $limit the number of items to show
    * orderby :tarteeb bel [userid]
    */

   function getLatest($item , $table ,$order, $limit=5){
   global $db ;
   $getStmt = $db ->prepare("SELECT $item FROM $table ORDER BY $order DESC LIMIT $limit");  
   $getStmt ->execute();
   $rows = $getStmt ->fetchAll();
   return $rows;  
   }


   //function upoload single img 

   function img_upload($file,$destenation){

      //image
      $image      = $_FILES[$file];
      $imageName  = $image['name'];
      $imageType  = $image['type'];
      $imageTmp   = $image['tmp_name'];
      $imageSize  = $image['size'];
      $imageError  = $image['error'];
      // $filesCount = count($imageName); 

      //extract image extension 
      $imageExtension = explode('.' , $imageName);
      $lastElementExtension = strtolower(end($imageExtension));      
      $imgRand = rand(0,100000000000000000) . '.' . $lastElementExtension; 
      
      move_uploaded_file($imageTmp , $destenation . $imgRand); 
      return $imgRand; 
   }

   function deleteimg($path){
      unlink($path);
   }


   /**
    * function to check img is empty and print img if exist and print deafult if not exist
    * $dbImg : img name in database 
    * $alt   : atrnate name of img  
    */ 

   function imgEmptyCheck($dbImg,$class,$alt,$style = null){
         if(!empty($dbImg)):
            echo "<img class='".$class."' src='../data/uploads/avatars/". $dbImg. "' alt='".$alt."' style='". $style . "'>"  ;
         else:
            echo "<img class='".$class."' src='layout/images/default.jpg' alt='".$alt."' style='". $style . "' >" ;
         endif;
   }


?>




   

