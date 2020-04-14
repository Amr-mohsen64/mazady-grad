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
                <!-- Breadcrumb-->
                <div class="row pt-2 pb-2">
                    <div class="col-sm-9">
                        <h4 class="page-title">Dashboard</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javaScript:void();">MAZADY</a></li>
                        </ol>
                    </div>
                </div>
                <!-- End Breadcrumb-->
                <h6 class="text-uppercase">Statistics</h6>
                <hr>

                <!-- start stat -->
                <div class="row">
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="card gradient-army">
                    <div class="card-body">
                        <div class="media d-flex">
                        <div class="media-body">
                            <span class="text-white">Total Members</span>
                            <h3 class="text-white">2050</h3>
                        </div>
                        <div class="w-icon">
                            <i class="fa fa-users text-white"></i>
                        </div>
                        </div>
                        <div id="widget-chart-4"></div>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="card gradient-dusk">
                    <div class="card-body">
                        <div class="media d-flex">
                        <div class="media-body">
                            <span class="text-white">Pending Members</span>
                            <h3 class="text-white">325</h3>
                        </div>
                        <div class="w-icon">
                            <i class="fa fa-user-plus text-white"></i>
                        </div>
                        </div>
                        <div id="widget-chart-5"></div>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="card gradient-orange">
                    <div class="card-body">
                        <div class="media d-flex">
                        <div class="media-body">
                            <span class="text-white">Total Items</span>
                            <h3 class="text-white">80</h3>
                        </div>
                        <div class="w-icon">
                            <i class="fa fa-tag text-white"></i>
                        </div>
                        </div>
                        <div id="widget-chart-6"></div>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="card gradient-forest">
                    <div class="card-body">
                        <div class="media d-flex">
                        <div class="media-body">
                            <span class="text-white">Total Comments</span>
                            <h3 class="text-white">2550</h3>
                        </div>
                        <div class="w-icon">
                            <i class="fa fa-comments text-white"></i>
                        </div>
                        </div>
                        <div id="widget-chart-7"></div>
                    </div>
                    </div>
                </div>
                </div>
                <!--End Row-->

                <!-- end stat -->

                <!-- start latest -->
                <div class="latest">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-md-6">
                        <div class="card card-default">
                        <div class="card-header">
                            <i class='fa fa-users'> Latest Registerd 5 Users</i>
                            <span class='float-right toggle-info'>
                            <i class="fa fa-plus fa-lg"></i>
                            </span>
                        </div>
                        <div class="card-body">
                            <ul class='list-unstyled latest-users'>
                            <li>
                                userr
                                <a href="" class='btn btn-primary btn-sm activate float-right'><i
                                    class='i fa fa-edit'></i>Activate</a>
                                <a href="" class='btn btn-info btn-sm activate float-right'><i class='i fa fa-edit'></i>Edit</a>
                            </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <!-- lates items -->
                    <div class="col-md-6">
                        <div class="card card-default">
                        <div class="card-header">
                            <i class='fa fa-tag'> Latest 5 Items</i>
                            <span class='float-right toggle-info'>
                            <i class="fa fa-plus fa-lg"></i>
                            </span>
                        </div>
                        <div class="card-body">
                            <ul class='list-unstyled latest-users'>
                            <li>
                                Item1
                                <a href="" class='btn btn-primary btn-sm activate float-right'><i
                                    class='i fa fa-edit'></i>Approve</a>
                                <a href="" class='btn btn-info btn-sm activate float-right'><i class='i fa fa-edit'></i>Edit</a>
                            </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <!-- latest comments -->
                    <div class="col-md-6">
                        <div class="card card-default">
                        <div class="card-header">
                            <i class='fa fa-tag'> Latest 5 comments</i>
                            <span class='float-right toggle-info'>
                            <i class="fa fa-plus fa-lg"></i>
                            </span>
                        </div>
                        <div class="card-body">
                            <ul class='list-unstyled latest-users'>
                            <li>
                                comments
                            </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <!-- end latest coments -->
                    </div>
                </div>
                <!-- end latest -->

                <!--start overlay-->
                <div class="overlay toggle-menu"></div>
                <!--end overlay-->
                </div>
                <!-- End container-fluid-->
            </div>
            <!--End content-wrapper-->
            
            <!--Start Back To Top Button-->
            <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
            <!--End Back To Top Button-->
        </div>
    <!--End wrapper-->
    <?php  include $tpl . 'footer.php';?>
</div>  





