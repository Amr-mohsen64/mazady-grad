<?php 
    $hasFooter = '';
    session_start();
    $pageTitle = 'products';

    if(isset($_SESSION['BIDDERID']) || isset($_SESSION['SELLERID'])): 
        include "ini.php";

        //get category id from post request
        $catID =  intval($_GET['pageid']);
?>
        <!-- Start wrapper -->

        <div id="wrapper">
            <?php include $tpl . 'sidebar.php'; ?>
            <?php include $tpl . 'topnav.php'; ?>

            <div class="content-wrapper">
                <div class="container-fluid">
                    <!-- start Products -->
                    <div class="products">
                        <h6 class="text-uppercase">products </h6><hr>
                        <div class="row">

                            <!-- start show products -->
                            <?php
                                if(isset($catID) && is_numeric($catID)): // 3shan mygblesh error bt2ket ano gay w m3a var pageid
                                    $items = getAll('*','items' ,'WHERE Cat_ID = '. $catID , 'AND approve = 1', 'itemID');
                                endif;

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
            </div>
            <!--End content-wrapper-->

            <!-- footer -->
            <?php  include $tpl . 'footer.php';?>
        </div> 
        <!-- end main Wraper -->
<?php 
    else:
        header('loaction:login.php');
    //end main session check condition
    endif;
?>








