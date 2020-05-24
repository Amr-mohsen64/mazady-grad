<?php 

    require_once 'admin/connect.php' ;
    require_once 'includes/functions/functions.php'; 


    $formErrors = array();
    
    if(isset($_POST['action'])):
        //load data
        if($_POST['action'] == 'load'): 
            $itemid = $_POST['itemid'];
            $userid = $_POST['userid'];
            //query 
            $stmt = $db->prepare("SELECT item_bidding.* , users.userName

								FROM item_bidding
								INNER JOIN items
								ON itemID = item_id
	
								INNER JOIN users 
								ON users.userID = item_bidding.userid 

								WHERE item_id  = ?
                                ORDER BY bid_price DESC 
								");
		// Excute QUery 
		$stmt ->execute(array($itemid));        // all depends on item id 
		$count = $stmt ->rowCount();
		$items = $stmt ->fetchAll();
        
        ?>
            
            <div class="card ">
                <div class="card-header">Other Participate biders</div>
                <div class="card-body">
                    <ul class="list-unstyled list-group">
                        <?php 
                            $ordering = 0;
                            foreach($items as $item): ?>
                                <li class="d-flex list-group-item list-group-item-action ">
                                    <span class="alert alert-info ordering">
                                        <?php  echo ++ $ordering?>
                                    </span>
                                    <div class="user-info d-inline-block ml-3 ">
                                        <span> <?php echo $item['userName']?></span>
                                        <span class="d-block">Submited Price :<strong class="text-success"> $ <?php echo $item['bid_price']?></strong></span>
                                    </div>
                                </li>
                        <?php   endforeach; ?>
                    </ul>
                </div>
            </div>
            <!-- end particaptes div -->        
    <?php 
        //end load if 
        endif;


        //insert data
        if($_POST['action'] == 'insert'):
            $userid =       filter_var( $_POST['userid'], FILTER_VALIDATE_INT);
            $itemid =       filter_var( $_POST['itemid'], FILTER_VALIDATE_INT);
            $bidprice =     filter_var( $_POST['bid_price'], FILTER_VALIDATE_INT);
            $minprice =    filter_var( $_POST['minprice'], FILTER_VALIDATE_INT); ;

            if($bidprice < $minprice):
                $formErrors[] = "please select price";
            else:
                $stmt = $db ->prepare("INSERT INTO item_bidding( userid  , item_id  , bid_price )
                VALUES(:zuid , :zitemid , :zprice)"); 

                // excute statment 
                $stmt ->execute(array(
                'zuid'         => $userid ,
                'zitemid'  => $itemid ,
                'zprice'       => $bidprice
                ));

                if($stmt){
                    echo 'created';
                }

            endif;
        endif;

        if($_POST['action'] == 'loadtime'):
            $itemid = $_POST['itemid'];
            $stmt = $db->prepare("SELECT * FROM items WHERE itemID = ? AND approve = 1");

            // Excute QUery 
            $stmt ->execute(array($itemid));        // all depends on item id 
            $count = $stmt ->rowCount();
            $item = $stmt ->fetch();

            // time functions
            $startDate  = date_create($item['start_date']);
            $endDate    = date_create($item['end_date']);

            //start and end time
            $startTime  = strtotime($item['start_time']);
            $endTime    = strtotime($item['end_time']);
            //current date and time
            $current_date    = date_create(date("Y-m-d"));
            $current_time    = strtotime(date("h:i:sa"));

            //left date and time
            $leftDate   = date_diff($endDate,$current_date);
            $leftTime   = $endTime - $current_time;

            //count date
            $countDate=  $leftDate->format("%a days");
            $countTime = strftime("%H:%M:%S", $leftTime-6000);

            echo $countDate ."   And ".$countTime;
        endif;

    endif;

    

?>