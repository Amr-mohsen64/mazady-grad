<?php 
    $pageTitle = 'members';

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
                        <td>
                            <!-- check for empty records and display img -->
                            <?php
                                if(!empty($row['avatar'])): echo "<img src='../data/uploads/avatars/". $row['avatar'] ."' style='width: 50px;height:50px' alt = 'avatar'>";
                                else : echo "<img src='../data/uploads/avatars/src-default.jpg' style='width: 50px;height:50px' alt = 'default'>";
                                endif;
                            ?>
                        </td>
                        <td><?php echo $row['userName'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['firstName']. ' ' .$row['lastName']  ;?></td>
                        <td><?php echo $row['date'];?></td>
                        <td>
                                <button type="submit" id='editMember-btn' data-id ='<?php echo $row['userID'];?>' data-delete-img='<?php echo $row['avatar'];?>' class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#edit"><i
                                class="i fa fa-edit"></i>Edit</button>
                                <button href='javascript:void(0)' type="button" id ='delete-btn' data-id='<?php echo $row['userID'];?>' data-delete-img='<?php echo $row['avatar'];?>' class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#delete">Delete <i
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
        
        if(isset($_POST['action'])){
            //Add new Member
            if($_POST['action'] == 'insert'){

                //form variables
                $username       = filter_var($_POST['username'] , FILTER_SANITIZE_STRING) ;
                $email          = filter_var($_POST['email'] ,FILTER_SANITIZE_EMAIL);
                $firstname      = filter_var($_POST['firstname'],FILTER_SANITIZE_STRING) ;
                $lastname       = filter_var($_POST['lastname'],FILTER_SANITIZE_STRING) ;
                $password       = sha1($_POST['password']) ;
                $status                 = $_POST['status'];
                
                $check          = checkItem("email" ,"users" , $email);
                if($check > 0){
                    echo 'Email Already Exist';
                }else{
                    $userimg  = img_upload('user_image','../data/uploads/avatars/');        
                    $stmt = $db ->prepare("INSERT INTO users(userName , password , email , firstName ,lastName ,regStatues, user_stat ,Date , avatar)
                    VALUES(:zuser , :zpass , :zmail , :zfirst , :zlast ,1, :zstat,now(), :zavatar)");
                    $stmt ->execute(array(
                    'zuser'     => $username ,
                    'zpass'     => $password ,
                    'zmail'     => $email ,
                    'zfirst'     => $firstname ,
                    'zlast'     => $lastname ,
                    'zstat'    => $status ,
                    'zavatar'   => $userimg ));
                    echo 'created';
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
            $userstat       = $_POST['userstat'];
            $password       = sha1($_POST['password']);

            $stmt = $db ->prepare("UPDATE `users` SET `userName`= ?, `Email` = ? , `firstName` = ? , `lastName` = ?,  `password` = ? ,  `user_stat` = ?  WHERE userID = ?");
            $stmt ->execute(array($username , $email , $firstname , $lastname , $password ,$userstat,  $updateid ));
        }

        // delete record form database 
        if(isset($_POST['deleteid'])){
            $userid = $_POST['deleteid'];
            $deleteimage = $_POST['deleteimage'];

            $stmt = $db ->prepare("DELETE FROM users WHERE userID = ?");
            $stmt ->execute(array($userid)) ;
            unlink('../data/uploads/avatars/'.$deleteimage);
        }

        // activate record form database 
        if(isset($_POST['activateid'])){
            $userid = $_POST['activateid'];
            $stmt = $db ->prepare("UPDATE users SET regStatues = 1 WHERE userID = ?");
            $stmt ->execute(array($userid));  
        }

?>