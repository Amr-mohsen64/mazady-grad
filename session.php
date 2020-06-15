<?php 



    session_start();
	$pageTitle = 'session';

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
        
        $endDate =  $item['end_date'];
        $endTime = $item['end_time'];
        $current_date    = date("Y-m-d");
        $current_time    = date("h:i:s");
        
        if( $current_date > $endDate){
            header('location:index.php');
        }

        

        
        // // time functions
        // $startDate  = date_create($item['start_date']);
        // $endDate    = date_create($item['end_date']);
        // $startTime  = strtotime($item['start_time']);
        // $endTime    = strtotime($item['end_time']);
        // $current_date    = date_create(date("Y-m-d"));
        // $current_time    = strtotime(date("h:i:sa"));
        // $leftDate   = date_diff($endDate,$current_date);
        // $leftTime   = $endTime - $current_time;
        // // $leftTime=$leftTime-;
        
        // $countDate=  $leftDate->format("%a days");
        // $countTime = strftime("%H:%M:%S", $leftTime-6000);
        



?>

        <section class="session">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-lg-8">
                        <div class="session-info">
                            <h3 class="text-center">Session Time Left</h3>
                            <span class="counter text-primary text-center d-block mb-3" id='counter'></span>

                            <!-- start session comptetion -->
                            <div class="card">
                                <div class="card-header">
                                    Wating Winner
                                    <!-- // loader -->
                                    <div id="dot-loader" class="ml-1">
                                        <div></div>
                                        <div></div>
                                        <div></div> 
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                <!-- <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="session-comptetion ">
                                                <img src="layout/images/auction_session.jpg " class="img-thumbnail" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="btn btn-danger mb-4">
                                                <h5>الحته دي هيظهر فيها اليوزرز الي موجودين في السيشن </h5>
                                            </div>
                                            <div class="btn btn-primary">
                                                <h5>الحته دي هيظهر فيها اليوزرز الي موجودين في السيشن </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <!-- end session comptetion -->

                            <!-- start session product-->
                            <div class="session-body">
                            <div class="card ">
                                <div class="card-header">New Submition</div>
                                <div class="card-body d-flex">
                                <?php 
                                    echo "<img src='data/uploads/items/".$item['Image'] ."' class='mr-3 bid-img' alt='Card image cap'>";
                                ?>
                                <ul class="product-info ml-4 list-unstyled">
                                    <li>Product Name<strong> : <?php echo $item['Name']?></strong></li>
                                    <li>Product Seller<strong> : <?php echo $item['userName']?></strong></li>
                                    <li>Minimum bidding price<strong class="text-success"> : <?php echo $item['minBid']?> $</strong></li>
                                    <li>
                                    <!-- input -->
                                    <form action="" method='post' id='sumbit-from'>
                                        <div class="form">
                                            <div class="name-section"></div>
                                            <input type="text" name="bid_price"id='bid_price' required autocomplete="off">
                                            <label for="name" class="lable-name">
                                                <span class="content-name"> sumbit price</span>
                                            </label>
                                        </div>
                                        
                                        <input type="hidden" name = 'userid' id = 'userid' value= <?php echo  $userid?>>
                                        <input type="hidden" name = 'minprice' id = 'minprice' value= <?php echo $item['minBid']?>>
                                        <input type="hidden" name = 'itemid' id = 'itemid' value= <?php echo $item['itemID']?>>
                                        <input type="hidden" name='action' id='action' >
                                        <button type='submit' name = 'sumbit' id= 'sumbit_price'  class="btn-primary btn" >sumbit</button>
                                        
                                    </form>
                                    </li>

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
                        <a href="index.php" class="btn btn-info float-right"><i class="fa fa-sign-out fa-lg"></i>Leave bid</a>
                        <div class="clearfix"></div>

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
    <script>
        
        //query
        $(function(){
            
            //set inteval every second
            setInterval(() => {
                loadData();
                loadTime();
            }, 1000);

            //load data
            function loadData(){
                var action = 'load';
                var  userid  =$('#userid').val(),
                    itemid  =$('#itemid').val();
                    
                $.ajax({
                    method : 'post',
                    url    : 'backendSession.php',
                    data   : {action:action ,userid:userid,itemid:itemid},
                    success:function(data){
                        $('.particapates').html(data);
                    }
                });
            }

             //load time function
            function loadTime(){
                var action = 'loadtime',
                itemid  =$('#itemid').val(),
                counter = $('#counter').html();

                $.ajax({
                        method : 'post',
                        url    : 'backendSession.php',
                        data   : {action:action,itemid:itemid} ,
                        success:function(data){
                            $('#counter').html(data);
                            }
                    });
            }

            // insert
            $(document).on('submit' , '#sumbit-from', function(e){
                e.preventDefault();
                var  userid  =$('#userid').val(),
                    itemid  =$('#itemid').val(),
                    bid_price = $('#bid_price').val();
                    $('#action').val('insert');
            
                $.ajax({
                        method : 'post',
                        url    : 'backendSession.php',
                        data   : new FormData(this) ,
                        contentType : false ,
                        processData : false ,
                        success:function(data){
                                console.log(data);
                                if(data.trim() == 'created'){
                                    swal('Submited succesfully' , " ", "success");
                                    $('#sumbit-from')[0].reset();
                                }
                            }
                    });
            });

            
            //end insert

            //prevent reload function
            /*
            window.onbeforeunload = function() {
            return "you can not refresh the page";
            }
            */
        }); 

    </script>

<?php 
    else:
        header('location:login.php');
    //end main session check condition
    endif;
?>








