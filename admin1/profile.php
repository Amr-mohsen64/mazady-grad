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

                <!-- start profile -->
                <div class="row">
                    <div class="col-lg-4">
                    <div class="card profile-card-2">
                        <div class="card-img-block">
                        <img class="img-fluid" src="layout/images/gallery/31.jpg" alt="Card image cap">
                        </div>
                        <div class="card-body pt-5">
                        <img src="layout/images/avatars/amr.jpg" alt="profile-image" class="profile">
                        <h5 class="card-title">Mark Stern</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <div class="icon-block">
                            <a href="javascript:void();"><i class="fa fa-facebook bg-facebook text-white"></i></a>
                            <a href="javascript:void();"> <i class="fa fa-twitter bg-twitter text-white"></i></a>
                            <a href="javascript:void();"> <i class="fa fa-google-plus bg-google-plus text-white"></i></a>
                        </div>
                        </div>


                    </div>

                    </div>

                    <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                            <li class="nav-item">
                            <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active"><i
                                class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
                            </li>
                            <li class="nav-item">
                            <a href="javascript:void();" data-target="#messages" data-toggle="pill" class="nav-link"><i
                                class="icon-envelope-open"></i> <span class="hidden-xs">Messages</span></a>
                            </li>
                            <li class="nav-item">
                            <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i
                                class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                            </li>
                        </ul>
                        <div class="tab-content p-3">
                            <div class="tab-pane active" id="profile">
                            <h5 class="mb-3">User Profile</h5>
                            <div class="row">
                                <div class="col-md-6">
                                <h6>About</h6>
                                <p>
                                    Web Designer, UI/UX Engineer
                                </p>
                                <h6>Hobbies</h6>
                                <p>
                                    Indie music, skiing and hiking. I love the great outdoors.
                                </p>
                                </div>
                            </div>
                            <!--/row-->
                            </div>
                            <div class="tab-pane" id="messages">
                            <div class="alert alert-info alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <div class="alert-icon">
                                <i class="icon-info"></i>
                                </div>
                                <div class="alert-message">
                                <span><strong>Info!</strong> Lorem Ipsum is simply dummy text.</span>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                <tbody>
                                    <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">3 hrs ago</span> Here is your a link to the
                                        latest summary report from the..
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">Yesterday</span> There has been a request on
                                        your account since that was..
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">9/10</span> Porttitor vitae ultrices quis,
                                        dapibus id dolor. Morbi venenatis lacinia rhoncus.
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">9/4</span> Vestibulum tincidunt ullamcorper
                                        eros eget luctus.
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">9/4</span> Maxamillion ais the fix for tibulum
                                        tincidunt ullamcorper eros.
                                    </td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            </div>
                            <div class="tab-pane" id="edit">
                            <form>
                                <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="Amr">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="Mohen">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="email" value="Amr@example.com">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Change profile</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="file">
                                </div>
                                </div>

                                <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="jhonsanmark">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="password" value="11111122333">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="password" value="11111122333">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">
                                    <input type="reset" class="btn btn-secondary" value="Cancel">
                                    <input type="button" class="btn btn-primary" value="Save Changes">
                                </div>
                                </div>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- end prof info -->

                <!-- start my comments -->
                <div class="row">
                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">MyComments</div>
                        <div class="card-body">
                        <div class="media">
                            <img class="mr-3 img-circle rounded img-fluid" src="layout/images/avatars/amr.jpg"
                            alt="Generic placeholder image" style="width:50px;">
                            <div class="media-body">
                            <h5 class="mt-0">Media heading</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                            purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                            vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        </div>
                        <hr>
                        <div class="card-body mt-2">
                        <div class="media">
                            <img class="mr-3 img-circle rounded img-fluid" src="layout/images/avatars/amr.jpg"
                            alt="Generic placeholder image" style="width:50px;">
                            <div class="media-body">
                            <h5 class="mt-0">Amr Mohsen</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                            purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                            vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- end my comments -->

            <!--start overlay-->
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->
            </div>
            <!-- End container-fluid-->
        </div>
        <!--End content-wrapper-->
    
        <!-- footer -->
        <?php  include $tpl . 'footer.php';?>
    </div> 
    <!-- end main Wraper -->
    
    


    



