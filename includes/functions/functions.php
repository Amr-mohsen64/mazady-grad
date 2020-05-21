<?php

/* ==Start End User Pages== */




	/* ==Start Check Item In DB Function== */
		/*
		** ======================================
		** checkDB($colName, $tblName, $valName) v1.0
		** Used To Check The Indicated Item
		** Existance In Database.
		** --------------------------------------
		** Function Has Arguments:
		** $colName : The Item To Be Selected.
		** $tblName : The Table To Select From.
		** $valName : the Value Of Select.
		** ======================================
		*/

		function checkDB($colName, $tblName, $valName)
		{

			/* ==Start Declare DB Connect Variable== */
				global $db;
			/* ==End Declare DB Connect Variable== */
			
			/*==Start Connect To DB==*/
				$stmt = $db->prepare('
					SELECT
						`' .$colName. '`
					FROM
						`' .$tblName. '`
					WHERE
						`' .$colName. '` = ?
				');
			/*==End Connect To DB==*/

			/* ==Start Execute User Input Value== */
				$stmt->execute(
					array(
						$valName
					)
				);
			/* ==End Execute User Input Value== */

			/* ==Start Record Existance Count== */
				$count = $stmt->rowCount();
			/* ==End Record Existance Count== */

			return $count;
		}
	/* ==End Check Item In DB Function== */





   /* ==Start Bytes Converter Function== */
      /*
      ** ======================================
      ** Converts a long string of bytes into a
      ** readable format e.g KB, MB, GB, TB, YB.
      ** ======================================
      ** @param {Int} num The number of bytes.
      */

      function readableBytes($bytes) {
         $i = floor(
            log($bytes) / log(1024)
         );
         $sizes = array(
            'B',
            'KB',
            'MB',
            'GB',
            'TB',
            'PB',
            'EB',
            'ZB',
            'YB'
         );

         return sprintf(
            '%.02F',
            $bytes / pow(
               1024,
               $i)
            ) * 1 . ' ' . $sizes[$i];
      }
   /* ==End Bytes Converter Function== */

	/* ==Start Global Extraction Function== */

		/*
		** ==============================================
		** extractDB(
      **    $colName,
      **    $tblName,
      **    $stmtCond,
      **    $ordrName,
      **    $ordrCond
      ** ) v1.0
		** Selects All Records From Any DB Table.
		** ----------------------------------------------
		** Function Has Arguments:
		** $colName 	   : The DB Desired Column OF Extraction.
		** $tblName    	: The DB Desired Table Of Selection.
		** $stmtCond 	   : The DB Desired Condition Of Selection.
		** $stmtAndCond   : The DB Desired Additional Condition Of Selection.
		** $ordrName   	: The DB Desired column Of ordering.
		** $ordrCond 	   : The DB Desired Condition Of Ordering.
		** ==============================================
		*/

		function extractDB(
			$colName,
			$tblName,
			$stmtCond = NULL,
			$stmtAndCond = NULL,
			$ordrName,
			$ordrCond = 'DESC')
		{
			/* ==Start Declare Global DB Connect Variable== */
				global $db;
			/* ==End Declare Global DB Connect Variable== */
			/* ==Start Prepare Select Statement== */
				$stmt = $db->prepare('
					SELECT
						' .$colName. '
					FROM
						`' .$tblName. '`
					' .$stmtCond. '
					' .$stmtAndCond. '
					ORDER BY
						`' .$ordrName. '`
					' .$ordrCond. '
					');
			/* ==End Prepare Select Statement== */
				$stmt->execute();
			/* ==Start Execute Select Statement== */
			/* ==Start Fetch Select Statement== */
				$recs = $stmt->fetchAll();
			/* ==End Fetch Select Statement== */
			/* ==Start Return Records== */
				return $recs;
			/* ==End Return Records== */
      }
   /* ==End Global Extraction Function== */
   
/* ==End End User Pages== */


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

   /**
    * function to check img is empty and print img if exist and print deafult if not exist
    * $dbImg : img name in database 
    * $alt   : atrnate name of img  
    */ 

    function imgEmptyCheck($dbImg,$class,$alt,$style = null){
      if(!empty($dbImg)):
         echo "<img class='".$class."' src='data/uploads/avatars/". $dbImg. "' alt='".$alt."' style='". $style . "'>"  ;
      else:
         echo "<img class='".$class."' src='layout/images/default.jpg' alt='".$alt."' style='". $style . "' >" ;
      endif;
}


   
?> 