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
            <!-- start carusal  -->
            <div class="row">
                <div class="col-lg-12">
                <div id="carousel-2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="layout/images/electric_personal.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="layout/images/electronics.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="layout/images/sports.jpg" alt="Third slide">
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
                    <div class="card item">
                        <img src="layout/images/products/05.png" class="item-img m-auto" alt="Card image cap">
                        <div class="card-body">
                        <h4 class="card-title">Shoe 0e1</h4>
                        <h6 class="text-primary">Minmum Price : 230$</h6>
                        <p>this is so good product and usful</p>
                        <hr>
                        <a href="javascript:void();" class="btn btn-primary btn-sm text-white">View product Details</a>
                        </div>
                    </div>
                    <div class="card item">
                        <img src="layout/images/products/05.png" class="item-img m-auto" alt="Card image cap">
                        <div class="card-body">
                        <h4 class="card-title">Shoe 0e1</h4>
                        <h6 class="text-primary">Minmum Price : 230$</h6>
                        <p>this is so good product and usful</p>
                        <hr>
                        <a href="javascript:void();" class="btn btn-primary btn-sm text-white">View product Details</a>
                        </div>
                    </div>
                    <div class="card item">
                        <img src="layout/images/products/05.png" class="item-img m-auto" alt="Card image cap">
                        <div class="card-body">
                        <h4 class="card-title">Shoe 0e1</h4>
                        <h6 class="text-primary">Minmum Price : 230$</h6>
                        <p>this is so good product and usful</p>
                        <hr>
                        <a href="javascript:void();" class="btn btn-primary btn-sm text-white">View product Details</a>
                        </div>
                    </div>
                    <div class="card item">
                        <img src="layout/images/products/05.png" class="item-img m-auto" alt="Card image cap">
                        <div class="card-body">
                        <h4 class="card-title">Shoe 0e1</h4>
                        <h6 class="text-primary">Minmum Price : 230$</h6>
                        <p>this is so good product and usful</p>
                        <hr>
                        <a href="javascript:void();" class="btn btn-primary btn-sm text-white">View product Details</a>
                        </div>
                    </div>
                    <div class="card item">
                        <img src="layout/images/products/05.png" class="item-img m-auto" alt="Card image cap">
                        <div class="card-body">
                        <h4 class="card-title">Shoe 0e1</h4>
                        <h6 class="text-primary">Minmum Price : 230$</h6>
                        <p>this is so good product and usful</p>
                        <hr>
                        <a href="javascript:void();" class="btn btn-primary btn-sm text-white">View product Details</a>
                        </div>
                    </div>
                    <div class="card item">
                        <img src="layout/images/products/05.png" class="item-img m-auto" alt="Card image cap">
                        <div class="card-body">
                        <h4 class="card-title">Shoe 0e1</h4>
                        <h6 class="text-primary">Minmum Price : 230$</h6>
                        <p>this is so good product and usful</p>
                        <hr>
                        <a href="javascript:void();" class="btn btn-primary btn-sm text-white">View product Details</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>  
            <!-- start products sliders -->


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
    
    


    



