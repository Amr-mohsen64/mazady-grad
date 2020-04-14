<?php 

include "ini.php";

?>

<!-- Start wrapper -->

<div id="wrapper">
    <div class="card-authentication2 mx-auto my-3">
            <div class="card-group">
                <div class="card mb-0">
                <div class="bg-signup2"></div>
                    <div class="card-img-overlay rounded-left my-5">
                        <h1 class="text-white">MAZADY</h1>
                        <p class="card-text text-white pt-3">The Fast And secure Online auction System</p>
                </div>
                </div>

                <div class="card mb-0">
                    <div class="card-body">
                        <div class="card-content p-3">
                            <div class="text-center">
                                <img src="layout/images/logo.png" alt="logo icon" style="width: 60px;height: 60px;">	
                            </div>
                        <div class="card-title text-uppercase text-center py-3">Sign Up</div>
                            <form>
                            <div class="form-group">
                            <div class="position-relative has-icon-left">
                                <label for="exampleInputName" class="sr-only">Name</label>
                                <input type="text" id="exampleInputName" class="form-control" placeholder="Name">
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="position-relative has-icon-left">
                                <label for="exampleInputEmailId" class="sr-only">Email ID</label>
                                <input type="text" id="exampleInputEmailId" class="form-control" placeholder="Email ID">
                                <div class="form-control-position">
                                    <i class="icon-envelope-open"></i>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="position-relative has-icon-left">
                                <label for="exampleInputPassword" class="sr-only">Password</label>
                                <input type="text" id="exampleInputPassword" class="form-control" placeholder="Password">
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="position-relative has-icon-left">
                                <label for="exampleInputRetryPassword" class="sr-only">Retry Password</label>
                                <input type="password" id="exampleInputRetryPassword" class="form-control" placeholder="Retry Password">
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="icheck-material-primary">
                                <input type="checkbox" id="user-checkbox" checked="" />
                                <label for="user-checkbox">I Accept terms & conditions</label>
                            </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-block waves-effect waves-light">Sign Up</button>
                            <div class="text-center pt-3">  
                            <hr>

                            <p class="text-dark">Already have an account? <a href="signin.php"> Sign In here</a></p>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            </div>
    <!--start overlay-->
    <div class="overlay toggle-menu"></div>
</div>
<!-- end wrapper -->

<!-- footer -->
<?php  include $tpl . 'footer.php';?>

<!-- end main Wraper -->








