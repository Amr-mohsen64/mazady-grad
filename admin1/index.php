<?php 
    $pageTitle = 'login';
    session_start();

    // keep signed in 
    if(isset($_SESSION['admin'])){
        header('location: dashboard.php');  
    }
    include "ini.php";
    
    
    // check if the user comes from post request 
    if($_SERVER['REQUEST_METHOD'] == 'POST'):
        // get varibals
        $email          = $_POST['email'];
        $password       = $_POST['password'];
        $rember         = $_POST['rember' ];
        $hashPassword   = sha1($password);
        
        // validate the form 
        $formErrors = array();
        
        // start validatin

        if(empty($email) || empty($password)){
            $formErrors[] = 'please fill all fields';
        }
    
        elseif(isset($email)){
            $filterdEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
            if(filter_var($filterdEmail , FILTER_VALIDATE_EMAIL) != true){
                $formErrors = ['enter valid email'];
            }   
        }



        // select user info
        $stmt = $db ->prepare('SELECT 
                                    userID ,email , password  
                                FROM 
                                    users 
                                WHERE 
                                    email = ?
                                AND
                                    password = ?
                                AND
                                    groupID = 1 ');
        $stmt ->execute(array($email ,$hashPassword));
        $row = $stmt ->fetch();
        $count = $stmt ->rowCount();
        
        // if the user exists in database login
        if($count > 0){
            $_SESSION['admin'] = $row['userID'];
            header("location: dashboard.php");
            exit();
        }
    endif;
?>


<!-- Start wrapper-->
<div id="wrapper">   

    <div class="card card-authentication1 mx-auto my-5">
			<div class="card-body">
				<div class="card-content p-2">
					<div class="text-center">
						<img src="layout/images/logo.png" style="width: 60px;height: 60px;" alt="logo icon">
					</div>
					<div class="card-title text-uppercase text-center py-3">Sign In <strong class='text-primary'>Admin</strong></div>
					<form class='login' action ='<?php $_SERVER['PHP_SELF']?>' method='POST'>
						<div class="form-group">
							<label for="exampleInputUsername" class="sr-only">email</label>
							<div class="position-relative has-icon-right">
                                <input type="text" 
                                id="form-mail" 
                                class="form-control input-shadow" 
                                placeholder="Enter Your Email"
                                name="email">
								<div class="form-control-position">
									<i class="icon-user"></i>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword" class="sr-only">Password</label>
							<div class="position-relative has-icon-right">
                                <input 
                                    type="password" 
                                    id="form-password" 
                                    class="form-control input-shadow"
                                    placeholder="Enter Password"
                                    name="password"
                                    >
								<div class="form-control-position">
									<i class="icon-lock"></i>
								</div>
                            </div>
                            <p class="form-error">
                                <?php
                                    if(!empty($formErrors)){
                                        foreach($formErrors as $error){
                                            echo $error;
                                        }
                                    }
                                ?>
                            </p>
						</div>
						<div class="form-row">
							<div class="form-group col-6">
								<div class="icheck-material-primary">
                                    <input 
                                    type="checkbox" 
                                    id="user-checkbox" 
                                    checked="" 
                                    name='rember' 
                                    />
									<label for="user-checkbox">Remember me</label>
								</div>
							</div>
							<div class="form-group col-6 text-right">
								<a href="reset.php">Reset Password</a>
							</div>
						</div>
						<button type="sumbit" class="btn btn-primary btn-block">Sign In</button>
					</form>
				</div>
			</div>
		</div>

	</div>
    <!--wrapper-->



<?php  include $tpl . 'footer.php';?>




