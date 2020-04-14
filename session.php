<?php 

include "ini.php";

?>

    <section class="session">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-8">
                    <div class="session-info">
                        <h3 class="text-center">Session Time Left</h3>
                        <span class="counter text-primary text-center d-block mb-3">1 : 30 : 04</span>

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
                        <div class="card-body">
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
                        </div>
                        </div>
                        <!-- end session comptetion -->

                        <!-- start session product-->
                        <div class="session-body">
                        <div class="card ">
                            <div class="card-header">New Submition</div>
                            <div class="card-body d-flex">
                            <img src="layout/images/products/01.png" class=" mr-3" alt="img">
                            <ul class="product-info ml-4 list-unstyled">
                                <li>Product Name<strong> : air phone 230</strong></li>
                                <li>Product Seller<strong> : Amr Mohsen</strong></li>
                                <li>Minimum price<strong class="text-success"> : 2200 $</strong></li>
                                <li>
                                <!-- input -->
                                <form action="">
                                    <div class="form">
                                        <div class="name-section"></div>
                                        <input type="text" name="name" id="" required autocomplete="off">
                                        <label for="name" class="lable-name">
                                            <span class="content-name">price</span>
                                        </label>
                                    </div>
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
                <div class="col-sm-12 col-md-6 col-lg-3 offset-lg-1">
                <a href="#" class="btn btn-info float-right"><i class="fa fa-sign-out fa-lg"></i>Leave bid</a>
                <div class="clearfix"></div>

                <!-- start particaptes div -->
                <div class="particapates">
                    <div class="card ">
                    <div class="card-header">
                        Other Participate biders
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-group">
                        <li class="d-flex list-group-item list-group-item-action">
                            <span class="alert alert-info ordering">1</span>
                            <div class="user-info d-inline-block ml-3 ">
                            <span>Name : Amr</span>
                            <span class="d-block">Submited Price : <strong class="text-success">100$</strong></span>
                            </div>
                        </li>
                        <li class="d-flex list-group-item list-group-item-action">
                            <span class="alert alert-info ordering">2</span>
                            <div class="user-info d-inline-block ml-3 ">
                            <span>Name : Mohsen</span>
                            <span class="d-block">Submited Price : <strong class="text-success">565$</strong></span>
                            </div>
                        </li>
                        <li class="d-flex list-group-item list-group-item-action">
                            <span class="alert alert-info ordering">3</span>
                            <div class="user-info d-inline-block ml-3 ">
                            <span>Name : Amr</span>
                            <span class="d-block">Submited Price : <strong class="text-success">350$</strong></span>
                            </div>
                        </li>

                    </div>
                    </div>
                </div>
                <!-- start particaptes div -->
                </div>
            </div>
            <!-- start right col -->
            </div>
    </section>

    <!--start overlay-->
    <div class="overlay toggle-menu"></div>


<!-- footer -->
<?php  include $tpl . 'footer.php';?> 
<!-- end main Wraper -->








