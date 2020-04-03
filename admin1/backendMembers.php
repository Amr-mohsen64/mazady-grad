<?php 
    $pageTitle = 'members';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once 'connect.php' ;
        require_once 'includes/functions/functions.php';

        // view records table 
        if(isset($_POST['readrecord'])){

            $query = '';
            if(isset($_GET['page']) && $_GET['page'] == 'pending'){  
                // get request form dashboard
                $query = 'AND regStatues = 0';
            }

            // select all users exept admin
            $stmt = $db ->prepare("SELECT * FROM `users` WHERE `groupID` != 1 $query ");
            $stmt ->execute();
            $rows = $stmt ->fetchAll();

            // if the record is not empty
            if(!empty($rows)): ?>
                <table class="table table-hover text-center">
                    <thead>
                    <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">UserName</th>
                    <th scope="col">Email</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Regiesterd Date</th>
                    <th scope="col">control</th>
                    </tr>
                    </thead>
                    <?php foreach($rows as $row): ?>
                    <tbody>
                        <tr>
                        <td><?php echo $row['userID'];?></td>
                        <td><?php echo $row['avatar'];?></td>
                        <td><?php echo $row['userName'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['firstName']. ' ' .$row['lastName']  ;?></td>
                        <td><?php echo $row['date'];?></td>
                        <td>
                                <button type="submit" id='editMember-btn' data-id ='<?php echo $row['userID'];?>' class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#edit"><i
                                class="i fa fa-edit"></i>Edit</button>
                                <button href='javascript:void(0)' type="button" id ='delete-btn' data-id='<?php echo $row['userID'];?>' class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#delete">Delete <i
                                class="fa fa-trash-o"></i></button>
                                <?php 
                                if($row['regStatues'] == 0){ ?>
                                    <button type="button" id='activate-btn' data-id ='<?php echo $row['userID'];?>' class="btn btn-success waves-effect waves-light" >Activate 
                                    <i class="i fa fa-edit"></i></button>
                                <?php }
                                
                                ?>
                        </td>
                        </tr>
                    </tbody>
                    <?php endforeach ;?>
                </table>
        <?php else:
                echo "<div classs='container'>";
                    echo "<h5 class='text-primary'>there is No Members !</h5>";
                echo "</div>";
            endif;
        }

        // add records to database 
        if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['firstname']) 
        && isset($_POST['lastname']) && isset($_POST['password'])){

            $username       = filter_var($_POST['username'] , FILTER_SANITIZE_STRING) ;
            $email          = filter_var($_POST['email'] ,FILTER_SANITIZE_EMAIL);
            $firstname      = filter_var($_POST['firstname'],FILTER_SANITIZE_STRING) ;
            $lastname       = filter_var($_POST['lastname'],FILTER_SANITIZE_STRING) ;
            $password       = sha1($_POST['password']) ;
            
            $formErrors = array();
            if(strlen($username) < 4){
                $formErrors[] = 'User Name Must be more than 4 charchter';
            }
            if(empty($username) && empty($email) && empty($firstname) && empty($lastname) && empty($password)){
                $formErrors[] = 'Please fill all fields';
            }
            elseif(empty($username)){
                $formErrors[] = 'User Name is required';
            }
            elseif(empty($email)){
                $formErrors[] = 'Email is required';
            }
            elseif(empty($firstname)){
                $formErrors[] = 'First Name is required';
            }
            elseif(empty($lastname)){
                $formErrors[] = 'Last Name is required';
            }
            elseif(empty($password)){
                $formErrors[] = 'Password is required';
            }
            if(filter_var($email, FILTER_VALIDATE_EMAIL) != true){
                $formErrors[] = "enter valid email";
            }
            
            foreach($formErrors as $error){
                echo $error;
            }
            
            if(empty($formErrors)){
                $check = checkItem("email" ,"users" , $email);
                if($check > 0){
                    echo 'Email Already Exist email';
                }else{
                    $stmt = $db ->prepare("INSERT INTO users(userName , password , email , firstName ,lastName ,regStatues,Date)
                    VALUES(:zuser , :zpass , :zmail , :zfirst , :zlast ,1, now())");
                    $stmt ->execute(array(
                    'zuser'     => $username ,
                    'zpass'     => $password ,
                    'zmail'     => $email ,
                    'zfirst'     => $firstname ,
                    'zlast'     => $lastname  ));
                    echo 'added';
                }
            }
        }

        //edit memeber to database
        if(isset($_POST['editid'])){
            $editid = intval($_POST['editid']);
            $stmt = $db ->prepare('SELECT * FROM users WHERE userID = ?');
            $stmt ->execute(array($editid));
            $rows = $stmt->fetchAll();
            echo json_encode($rows);
        }

        // update record form database 
        if(isset($_POST['updateid'])){
            $updateid       = $_POST['updateid'];
            $username       = $_POST['username'];
            $email          = $_POST['email'];
            $firstname      = $_POST['firstname'];
            $lastname       = $_POST['lastname'];
            $password       = $_POST['password'];

            $stmt = $db ->prepare("UPDATE `users` SET `userName`= ?, `Email` = ? , `firstName` = ? , `lastName` = ?,  `password` = ?  WHERE userID = ?");
            $stmt ->execute(array($username , $email , $firstname , $lastname , $password , $updateid ));
        }

        // delete record form database 
        if(isset($_POST['deleteid'])){
            $userid = $_POST['deleteid'];
            $stmt = $db ->prepare("DELETE FROM users WHERE userID = ?");
            $stmt ->execute(array($userid));  
        }

        // activate record form database 
        if(isset($_POST['activateid'])){
            $userid = $_POST['activateid'];
            $stmt = $db ->prepare("UPDATE users SET regStatues = 1 WHERE userID = ?");
            $stmt ->execute(array($userid));  
        }
        
    }else {
        include 'ini.php';
        include $tpl . 'errorPage403.php';
    }


?>