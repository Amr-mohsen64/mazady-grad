<?php 
    $pageTitle = 'Dashboard';
    session_start();
    if(isset($_SESSION['admin'])):
    include "ini.php";

      // get the latest users 
      $numUsers = 2;  // number of latest users
      $numItems = 5; // number of latest items 
      $numComments = 5 ; // number of latest items 
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
                            <a href="members.php">
                                <div class="card gradient-army">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body">
                                                <span class="text-white">Total Members</span>
                                                <h3 class="text-white"><?php echo countItems("userID","users");?></h3>
                                            </div>
                                            <div class="w-icon">
                                                <i class="fa fa-users text-white"></i>
                                            </div>
                                        </div>
                                        <div id="widget-chart-4"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-3">
                            <a href="members.php?page=pending">
                                <div class="card gradient-dusk">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body">
                                                <span class="text-white">Pending Members</span>
                                                <h3 class="text-white"><?php echo checkItem("regStatues" , 'users' , 0);?></h3>
                                            </div>
                                            <div class="w-icon">
                                                <i class="fa fa-user-plus text-white"></i>
                                            </div>
                                        </div>
                                        <div id="widget-chart-5"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-3">
                            <a href="items.php">
                                <div class="card gradient-orange">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body">
                                                <span class="text-white">Total Items</span>
                                                <h3 class="text-white"><?php echo countItems("itemID","items");?></h3>
                                            </div>
                                            <div class="w-icon">
                                                <i class="fa fa-tag text-white"></i>
                                            </div>
                                        </div>
                                        <div id="widget-chart-6"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-3">
                            <a href="comments.php">
                                <div class="card gradient-forest">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body">
                                                <span class="text-white">Total comptesion</span>
                                                <h3 class="text-white">22</h3>
                                            </div>
                                            <div class="w-icon">
                                                <i class="fa fa-comments text-white"></i>
                                            </div>
                                        </div>
                                        <div id="widget-chart-7"></div>
                                    </div>
                                </div>
                            </a>
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
                                <i class='fa fa-users'> Latest Registerd <?php echo $numUsers?> Users</i>
                                <span class='float-right toggle-info'>
                                <i class="fa fa-plus fa-lg"></i>
                                </span>
                            </div>
                            <div class="card-body">
                                <ul class='list-unstyled latest-users'>
                                    <?php 
                                        $theLatestUsers =  getLatest('*','users','userID',$numUsers);  // latest user array 
                                        if(!empty($theLatestUsers)):
                                            foreach($theLatestUsers as $user):
                                                echo "<li class='latest-registerd'>";
                                                    echo  $user['userName'];
                                                    echo "<a href='' class='ml-1 btn btn-primary btn-sm activate float-right'><i class='i fa fa-edit'></i>Activate</a>";
                                                    echo "<a href='' class='btn btn-info btn-sm activate float-right'><i class='i fa fa-edit'></i>Edit</a>";
                                                    echo "<div class='clearfix'></div>";
                                                echo "</li>";
                                            endforeach;
                                        else:
                                            echo "theres is no records to show";
                                        endif;
                                    ?>
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
                                <?php 
                                    $theLatestItems =  getLatest('*','items','itemID',$numItems);  // latest user array 
                                    if(!empty($theLatestItems)):
                                        foreach($theLatestItems as $item):
                                            echo "<li class='latest-registerd'>";
                                                echo  $item['Name'];
                                                echo "<a href='' class='ml-1 btn btn-primary btn-sm activate float-right'><i class='i fa fa-edit'></i>Activate</a>";
                                                echo "<a href='' class='btn btn-info btn-sm activate float-right'><i class='i fa fa-edit'></i>Edit</a>";
                                                echo "<div class='clearfix'></div>";
                                            echo "</li>";
                                        endforeach;
                                    else:
                                        echo "theres is no records to show";
                                    endif;
                                    ?>
                                </ul>
                            </div>
                            </div>
                        </div>
                    
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

<?php 
    //end session check
    else:
        header('location:index.php');
    endif;
?>



