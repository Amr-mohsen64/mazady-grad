<?php 

include "ini.php";

?>

<!-- Start wrapper -->

<div id="wrapper">

<!-- ------------------------------------------------------------------------------------------------------------------------------- -->
    <div class="card-authentication2 mx-auto my-5">
            <div class="card-group">
                <div class="card mb-0">
                    <div class="bg-signin2"></div>
                        <div class="card-img-overlay rounded-left my-5">
                            <h2 class="text-white">MAZADY</h2>
                            <h1 class="text-white">The Fast And secure Online auction System</h1>
                            <p class="card-text text-white pt-3">The Fast And secure Online auction System</p>
                    </div>
                </div>
                <div class="card mb-0 ">
                    <div class="card-body">
                        <div class="card-content p-3">
                            <div class="text-center">
                                <img src="layout/images/logo.png" alt="logo icon" style="width: 60px;height: 60px;">
                            </div>
                        <div class="card-title text-uppercase text-center py-3">Sign In</div>
                        <form>
                            <div class="form-group">
                            <div class="position-relative has-icon-left">
                                <label for="exampleInputUsername" class="sr-only">Username</label>
                                    <input type="text" id="exampleInputUsername" class="form-control" placeholder="Username">
                                    <div class="form-control-position">
                                        <i class="icon-user"></i>
                                    </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="position-relative has-icon-left">
                                <label for="exampleInputPassword" class="sr-only">Password</label>
                                <input type="password" id="exampleInputPassword" class="form-control" placeholder="Password">
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                            </div>
                            <div class="form-row mr-0 ml-0">
                                <div class="form-group col-6">
                                    <div class="icheck-material-primary">
                                        <input type="checkbox" id="user-checkbox" checked="" />
                                        <label for="user-checkbox">Remember me</label>
                                    </div>
                                </div>
                                <div class="form-group col-6 text-right">
                                    <a href="authentication-reset-password.php">Reset Password</a>
                                </div> 
                            </div>
                            <button type="button" class="btn btn-primary btn-block waves-effect waves-light">Sign In</button>
                            <div class="text-center pt-3">
                                <hr>
                                <p class="text-dark">Do not have an account? <a href="signup.php"> Sign Up here</a></p>
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


<!-- footer -->
<?php  include $tpl . 'footer.php';?>

<!-- end main Wraper -->








