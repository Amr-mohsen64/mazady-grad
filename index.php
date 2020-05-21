<?php 
    $hasFooter = '';
    session_start();
    $pageTitle = 'Home';
    if(isset($_SESSION['BIDDERID']) || isset($_SESSION['SELLERID'])): 
        include "ini.php";?>
    
    <!-- Start wrapper -->

    <div id="wrapper">
        <?php include $tpl . 'sidebar.php'; ?>
        <?php include $tpl . 'topnav.php'; ?>

    <div class="content-wrapper">
        <div class="container-fluid">
            <?php 
                if(isset($_SESSION['BIDDERID'])):
                    $bidderID = $_SESSION['BIDDERID'];
            ?>
                
                <!-- start carusal  -->
                <div class="row">
                    <div class="col-lg-12">
                    <div id="carousel-2" class="carousel slide main-slider" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100 main-slider-img" src="layout/images/electric_personal.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 main-slider-img" src="layout/images/electronics.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 main-slider-img" src="layout/images/sports.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel-2" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-2" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                        </a>
                    </div>
                    </div>
                </div>
                <!-- end carusal  -->

                <!-- start products sliders -->
                <div class="categoris-sliders">
                    <h2 class='card-title'>Hot Deals! </h2>
                    <div class="container">
                        <i class="fa fa-arrow-left prev prevSliderOne"></i>
                        <i class="fa fa-arrow-right next nextSliderOne"></i>
                        <div class="items">
                        <?php 
                            // get all items
                            $getItems = $db ->prepare('SELECT * FROM items ');
                            $getItems ->execute();
                            $items = $getItems ->fetchAll();
                            //lopping and print them
                            foreach($items as $item){ ?>
                                <div class="card item">
                                <?php 
                                    echo "<img src='data/uploads/items/".$item['Image'] ."' class='item-img m-auto' alt='Card image cap'>";
                                ?>
                                <div class="card-body">
                                <h4 class="card-title"><?php echo $item['Name']?></h4>
                                <h6 class="text-primary">Minmum Price : <?php echo $item['minBid']?>$</h6>
                                <p><?php echo $item['Desciription']?></p>
                                <hr>
                                <a href="showad.php?itemid=<?php echo $item['itemID']?>" class="btn btn-primary btn-sm text-white">View product Details</a>
                                
                                </div>
                            </div>
                        <?php }
                        ?>
                    
                        
                        </div>
                    </div>
                </div>  
                <!-- start products sliders -->
        <?php
            elseif(isset($_SESSION['SELLERID'])):
                $sellerID = $_SESSION['SELLERID']; ?>
                <div class="container-fluid">
                    <!-- start Products -->
                    <div class="products">
                    <a href="newad.php"><button class="btn-primary btn mb-4">Create New</button></a>
                        <h6 class="text-uppercase">My ADS </h6><hr>
                        <div class="row">
                            <!-- start show products -->
                            <?php
                                $items = getAll('*','items' ,'WHERE Memeber_ID  = '. $sellerID , 'AND approve = 1', 'itemID'); 
                                //looping on items
                                foreach($items as $item):?>
                                    <div class="col-12 col-lg-3">
                                        <div class="card">
                                        <?php 
                                            echo "<img src='data/uploads/items/".$item['Image'] ."' class='product-img m-auto' alt='Card image cap'>";
                                        ?>
                                            <div class="card-body">
                                                <h4 class="card-title"><?php echo $item['Name']?></h4>
                                                <h6 class="text-primary">Minmum Price : <?php echo $item['Price']?>$</h6>
                                                <p><?php echo $item['Desciription']?></p>
                                                <hr>
                                                <a href="showad.php?itemid=<?php echo $item['itemID']?>" class="btn btn-primary btn-sm text-white">View product Details</a>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                endforeach;
                            ?>
                            <!-- end col -->

                        <!-- start show products -->
                        </div>
                        <!-- end main row -->
                    </div>
                    <!-- end products -->
                    
                    <!--start overlay-->
                    <div class="overlay toggle-menu"></div>
                </div>
                <!-- End container-fluid-->
        <?php    
            // end $_SESSION['BIDDERID'] check 
            endif;
        ?>
            
        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        </div>
        <!-- End container-fluid-->
    </div>
    <!--End content-wrapper-->

<!-- footer -->
    <?php  include $tpl . 'footer.php';?>
    <script src='layout/plugins/slickslider/slick.min.js'></script>
    <script src='layout/plugins/slickslider/slick.js'></script>

</div> 
<!-- end main Wraper -->

<?php
    else:
        header('location:login.php');
    //end two seeiosn check if
    endif; ?>
    
    


    



