<?php 
    $pageTitle = 'Profile';
    session_start();

    if(isset($_SESSION['admin'])):
        include "ini.php";

        //get User info according session
        $sessionUser = $_SESSION['admin'];
        $getUser = $db ->prepare('SELECT * FROM users WHERE userID = ? ');
        $getUser ->execute(array($sessionUser));
        $info = $getUser ->fetch();


        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $updateid = $_POST['userid'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email =    $_POST['email'];
            $username = $_POST['username'];
            $newpassword = $_POST['newpassword'];
            $oldpassword = $_POST['oldpassword'];

            $img = img_upload('avatar','../data/uploads/avatars/');

            //password trick
            $pass= '';
            if(empty($newpassword)){
                $pass = $oldpassword ;
            }else{
                $pass = sha1($newpassword) ;
            }
            
            $stmt = $db ->prepare("UPDATE `users` SET `userName`= ?, `Email` = ? , `firstName` = ? , `lastName` = ?,  `password` = ?  ,  `avatar` = ?WHERE userID = ?");
            $stmt ->execute(array($username , $email , $firstname , $lastname , $pass ,$img,  $updateid ));

            if($stmt){
                ?>
                <script>alert('your profile has been updated');</script>
            <?php }
        }
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
                                    <img class="img-fluid" src="layout/images/auction_session.jpg" alt="Card image cap">
                                </div>
                                <div class="card-body pt-5">
                                    <?php imgEmptyCheck($info['avatar'],'profile','profile-image');?>
                                    <h5 class="card-title d-inline">Full Name : </h5><span><?php  echo $info['firstName'] . " " . $info['lastName']?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                                        <li class="nav-item">
                                            <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active"><i
                                            class="icon-user"></i> <span class="hidden-xs">Profile Info</span></a>
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
                                                <div>
                                                    <h6 class='d-inline'>User Name : </h6>
                                                    <span><?php  echo $info['userName']?></span>
                                                </div>
                                                <div>
                                                    <h6 class='d-inline'>Email : </h6>
                                                    <span><?php  echo $info['email']?></span>
                                                </div>
                                                <div>
                                                    <h6 class='d-inline'>Registerd date :</h6>
                                                    <span><?php  echo $info['date']?></span>
                                                </div>
                                                </div>
                                            </div>
                                            <!--/row-->
                                        </div>

                                        <div class="tab-pane" id="edit">
                                            <form action='<?php echo $_SERVER['PHP_SELF']?>' method="POST" id='edit'  enctype='multipart/form-data'>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="text" name ='firstname' value="<?php echo $info['firstName'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="text" name ='lastname' value="<?php echo $info['lastName'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="email" name ='email' value="<?php echo $info['email'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Change profile</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="file" name='avatar'>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="text" name ='username' value="<?php echo $info['userName'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                                    <div class="col-lg-9">
                                                        <input  type="hidden" name="oldpassword" value = "<?php echo $info['password']?>">
                                                        <input class="form-control" type="password" name ='newpassword' autocomplete = 'new-password' placeholder = "Leave Blank If You Don't Want to Change" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                                    <div class="col-lg-9">
                                                        <input type= 'hidden' name= 'userid' value='<?php echo $info['userID'] ?>'/> 
                                                        <input type="reset" class="btn btn-secondary" id='reset' value="Cancel">
                                                        <input type="submit" class="btn btn-primary" value="Save Changes">
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
                    
                    

                <!--start overlay-->
                <div class="overlay toggle-menu"></div>
                <!--end overlay-->
                </div>
                <!-- End container-fluid-->
            </div>
            <!--End content-wrapper-->
        </div> 
        <!-- end main Wraper -->
        <!-- footer -->
        <?php  include $tpl . 'footer.php';?>
        <script>
            $(document).on('click', '#reset',function(){
                $('#edit').trigger('reset')
            });
        </script>
<?php 
    // end session check 
    else:
        header('location:index.php');
    endif;
?>


    


    



