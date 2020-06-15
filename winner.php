<?php 

    session_start();
	$pageTitle = 'winner';

    if(isset($_SESSION['BIDDERID'])): 

        include "ini.php";
        $userid = $_SESSION['BIDDERID'];

		// check if the get userid is numeric and get inter value 
		$itemid= isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0 ; 
		// Select all the data from database depends on ID 
		$stmt = $db->prepare("SELECT items.* ,
									categories.Name AS Category_Name ,
									users.userName
								FROM items
								INNER JOIN categories 
								ON categories.ID = items.Cat_ID
	
								INNER JOIN users 
								ON users.userID = items.Memeber_ID 
								WHERE itemID = ?
								AND approve = 1");
		// Excute QUery 
		$stmt ->execute(array($itemid));        // all depends on item id 
		$count = $stmt ->rowCount();
        $item = $stmt ->fetch();



?>

        <section class="session">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-lg-8">
                        <div class="session-info">
                            <h3 class="text-center">Winner</h3>
                            <span class="counter text-primary text-center d-block mb-3" id='counter'></span>


                            <!-- start session product-->
                            <div class="session-body">
                            <div class="card ">
                                <div class="card-header">Product submited</div>
                                <div class="card-body d-flex">
                                <?php 
                                    echo "<img src='data/uploads/items/".$item['Image'] ."' class='mr-3 bid-img' alt='Card image cap' >";
                                ?>
                                <ul class="product-info ml-4 list-unstyled">
                                    <li>Product Name<strong> : <?php echo $item['Name']?></strong></li>
                                    <li>Product Seller<strong> : <?php echo $item['userName']?></strong></li>
                                    <li>Minimum bidding price<strong class="text-success"> : <?php echo $item['minBid']?> $</strong></li>
                                </ul>
                                
                                <ul class="product-info ml-4 list-unstyled">
                                    <?php 
                                    
                                    //select * price
                                    $stmt0 = $db->prepare("SELECT * FROM item_bidding WHERE item_id = ?");
                                    $stmt0->execute(array($itemid));  
                                    $count = $stmt0->rowCount();

                                    //select maxmium price
                                    $stmt1 = $db->prepare("SELECT MAX(bid_price) FROM item_bidding WHERE item_id = ?");
                                    $stmt1->execute(array($itemid));  
                                    $max = $stmt1 ->fetch();
                                    $maxPrice =  $max['0'];
                                    
                                    if($count > 0){
                                        // select userid
                                        $stmt2 = $db->prepare("SELECT userid FROM item_bidding WHERE bid_price = ?");
                                        $stmt2 ->execute(array($maxPrice));  
                                        $user = $stmt2 ->fetch();
                                        $winnerid =  $user['0'];
                                        

                                        //get user info
                                        $stmt3 = $db->prepare("SELECT userName , avatar FROM users WHERE userid = ?");
                                        $stmt3 ->execute(array($winnerid));  
                                        $userinfo = $stmt3 ->fetch();
                                        
                                        ?>

                                        <li><h5>Winner :<?php echo $userinfo['userName']?></h5></li>
                                        <?php 
                                            echo "<img src='data/uploads/avatars/".$userinfo['avatar'] ."' class='mr-3 bid-img' alt='Card image cap' >";
                                        ?>

                                    <?php  } else{
                                    echo 'no bidders';
                                } ?>
                                        


                                    
                                </ul>
                                </div>
                                
                            </div>
                            </div>
                            <!-- end session body -->
                        </div>
                    </div>

                    <!-- end left col -->

                    <!-- start right col -->
                    <div class="col-sm-12 col-md-6 col-lg-4 mt-4">
                        <a href="index.php" class="btn btn-info float-right"><i class="fa fa-sign-out fa-lg"></i>Home</a>
                        <div class="clearfix"></div>
                        <div class="card ">
                            <div class="card-header">biders Participated in this product</div>
                            <div class="card-body">
                                <ul class="list-unstyled list-group">
                                    <?php
                                        $itemid = $_GET['itemid'];
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
                        <!-- start particaptes div -->
                        <div class="particapates"></div>
                    </div>
                    
                <!-- start right col -->
                </div>
        </section>

        <!--start overlay-->
        <div class="overlay toggle-menu"></div>


    <!-- footer -->
    <?php  include $tpl . 'footer.php';?> 
    <!-- end main Wraper -->

<?php 
    else:
        header('location:login.php');
    //end main session check condition
    endif;
?>








