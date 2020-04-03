<?php 
$hasFooter = '';
include "ini.php";

?>

<!-- Start wrapper -->

<div id="wrapper">
<?php include $tpl . 'sidebar.php'; ?>
<?php include $tpl . 'topnav.php'; ?>

<div class="content-wrapper">
    <div class="container-fluid">
<!-- ------------------------------------------------------------------------------------------------------------------------------- -->
        

        <!-- start Products -->
        <div class="products">
            <h6 class="text-uppercase">Products</h6>
            <hr>
            <div class="row">

            <!-- start filter -->
            <div class="col-12 col-lg-3">
                <div class="card filter-card">
                <div class="card-header">Filter</div>
                <div class="card-body">
                    <ul class="list-unstyled categories-container">
                    <a href="" class="filter-categories waves-effect active">T-shirt</a>
                    <a href="" class="filter-categories waves-effect active">Electronics</a>
                    <a href="" class="filter-categories waves-effect active">Sports</a>
                    <a href="" class="filter-categories waves-effect active">Homes</a>
                    <a href="" class="filter-categories waves-effect active">Mobile</a>
                    <!-- start price -->
                    <h6 class="card-title mt-2">Price</h6>
                    <li class="filter-price">
                        <div class="icheck-material-primary">
                        <input type="radio" id="200$" value="200" name="filterprice" checked="/">
                        <label for="200$">200 or more</label>
                        </div>
                        <div class="icheck-material-primary">
                        <input type="radio" id="1000$" value="1000" name="filterprice">
                        <label for="1000$">1000$ or more</label>
                        </div>
                        <div class="icheck-material-primary">
                        <input type="radio" id="2000$" value="2000" name="filterprice">
                        <label for="2000$">2000$ or more</label>
                        </div>
                        <div class="icheck-material-primary">
                        <input type="radio" id="5000$" value="5000" name="filterprice">
                        <label for="5000$">5000$ or more</label>
                        </div>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
            <!-- end filter -->

            <!-- start show products -->
            <div class="col-lg-9">
                <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card">
                    <img src="layout/images/products/05.png" class="product-img m-auto" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Shoe 0e1</h4>
                        <h6 class="text-primary">Minmum Price : 230$</h6>
                        <p>this is so good product and usful</p>
                        <hr>
                        <a href="javascript:void();" class="btn btn-primary btn-sm text-white">View product Details</a>
                    </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-12 col-lg-4">
                    <div class="card">
                    <img src="layout/images/products/05.png" class="product-img m-auto" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Shoe 0e1</h4>
                        <h6 class="text-primary">Minmum Price : 230$</h6>
                        <p>this is so good product and usful</p>
                        <hr>
                        <a href="javascript:void();" class="btn btn-primary btn-sm text-white">View product Details</a>
                    </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-12 col-lg-4">
                    <div class="card">
                    <img src="layout/images/products/05.png" class="product-img m-auto" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Shoe 0e1</h4>
                        <h6 class="text-primary">Minmum Price : 230$</h6>
                        <p>this is so good product and usful</p>
                        <hr>
                        <a href="javascript:void();" class="btn btn-primary btn-sm text-white">View product Details</a>
                    </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-12 col-lg-4">
                    <div class="card">
                    <img src="layout/images/products/05.png" class="product-img m-auto" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Shoe 0e1</h4>
                        <h6 class="text-primary">Minmum Price : 230$</h6>
                        <p>this is so good product and usful</p>
                        <hr>
                        <a href="javascript:void();" class="btn btn-primary btn-sm text-white">View product Details</a>
                    </div>
                    </div>
                </div>
                <!-- end col -->
                
                </div>
            </div>
            <!-- start show products -->
            </div>
            <!-- end main row -->
        </div>
        <!-- end products -->


<!-- ------------------------------------------------------------------------------------------------------------------------------- -->


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








