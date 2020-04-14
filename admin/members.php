<?php 
    $hasFooter = '';
    $pageTitle = 'Manage Members';
    session_start();
    if(isset($_SESSION['admin'])){
        require_once "ini.php";?>

        <!-- Start wrapper -->
        <div id="wrapper">
                <?php include $tpl . 'sidebar.php'; ?>
                <?php include $tpl . 'topnav.php'; ?>
            
            <div class="content-wrapper">
                <div class="container-fluid">
                        <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                <h4 class="page-title">Manage Members</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">MAZADY</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mange Members</li>
                </ol>
                </div>
            </div>
            <!-- End Breadcrumb-->

                <div class="card mange-table ">
                <div class="card-body">
                <button href="add-member.html" id='addMember' class='btn btn-info btn-round waves-effect waves-light m-2'
                    data-toggle="modal" data-target="#add"><i class='fa fa-plus'></i>
                    New Member</button>
                <div class="table-responsive" id='manage-table'>

                </div>
                </div>

            </div>
            <!--End Table -->
            <!---=========================================================================================================================================-->
            <!-- modals  -->
            <!-- start new Member modal -->
            <!-- Modal -->
            <div class="modal fade" id="add">
                <div class="modal-dialog">
                    <div class="modal-content border-primary">
                        <div class="modal-header bg-primary ">
                            <h5 class="modal-title  text-white"><i class="fa fa-user fa-lg "></i> Add New Member</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                <span aria-hidden="true" class="close text-white">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="addMessge"></p>
                            <form id='addNewMember' enctype='multipart/form-data'>
                                <div class="form-group">
                                    <label for="user_name">user Name</label>
                                    <input type="text" class="form-control" id="username" name='username' placeholder="Type User Name">
                                </div>
                                <div class="form-group">
                                    <label for="user_mail">Email</label>
                                    <input type="text" class="form-control" id="email" name='email' placeholder="Type User Email">
                                </div>
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" id="firstname" name='firstname' placeholder="Type User first name">
                                </div>
                                <div class="form-group">
                                    <label for="full_name">Last Name</label>
                                    <input type="text" class="form-control" id="lastname" name='lastname' placeholder="Type User last ">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" id="password" name='password' placeholder="Type User Password">
                                </div>
                                <div class="form-group">
                                    <label for="password">user Image</label>
                                    <input type="file" class="form-control" id="u_image" name='user_image'>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name='action' id='action'>
                                    <button id='addMemberBtn' type="submit" value='insert' name ='insert' class="btn btn-primary px-5"><i class="fa fa-plus"></i> Add Member</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end new Member modal -->

            <!-- start edit Member modal -->
            <!-- Modal -->
            <div class="modal fade" id="edit">
                <div class="modal-dialog">
                <div class="modal-content border-primary">
                    <div class="modal-header bg-primary ">
                    <h5 class="modal-title  text-white"><i class="fa fa-edit fa-lg "></i> Edit Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close text-white">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form id='updateForm'>
                            <p id="update_msg"></p>
                            <input type="hidden" class="form-control" id="Up_User_ID">
                            <div class="form-group">
                            <label for="Up_UserName">User Name</label>
                            <input type="text" class="form-control" id="Up_UserName" placeholder="Type User Name">
                            </div>
                            <div class="form-group">
                            <label for="Up_User_Email">Email</label>
                            <input type="text" class="form-control" id="Up_User_Email" placeholder="Type User Email">
                            </div>
                            <div class="form-group">
                            <label for="Up_User_FullName">First Name</label>
                            <input type="text" class="form-control" id="Up_firstname" placeholder="Type User FullName ">
                            </div>
                            <div class="form-group">
                            <label for="Up_User_FullName">last Name</label>
                            <input type="text" class="form-control" id="Up_lastname" placeholder="Type User FullName ">
                            </div>
                            <div class="form-group">
                            <label for="Up_User_Password">Password</label>
                            <input type="text" class="form-control" id="Up_User_Password" placeholder="Leave blank if you want">
                            </div>
                            <div class="form-group">
                            <button type="button" id ='btn-update' class="btn btn-primary px-5"><i class="fa fa-plus"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            <!-- end edit Member modal -->

            <!-- start delete Member modal -->
            <!-- Modal -->
            <div class="modal fade" id="delete">
                <div class="modal-dialog">
                <div class="modal-content border-primary animated bounceIn">
                    <div class="modal-header bg-primary ">
                    <h5 class="modal-title  text-white"><i class="fa fa-edit fa-lg "></i> delete Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close text-white">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <form id='updateForm'>
                        <p id="update_msg">do you want to delete ?</p>
                        <input type="hidden" class="form-control" id="Up_User_ID">
                        <div class="form-group">
                        <button type="button" id ='btn-delete-modal' class="btn btn-danger px-5"> delete</button>
                        <button type="button" data-dismiss="modal" id ='btn-close' class="btn btn-primary px-5"> cancel</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            <!-- end edit Member modal -->

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

        <!-- start ajax calls -->
        <script>
            $(function(){
                viewRecord();
                $('#action').val('insert');

                // load data function 
                function viewRecord(){
                    var readrecord = 'readrecord' ;
                    $.ajax({
                        method : 'POST',
                        url: 'backendMembers.php',
                        data : {readrecord:readrecord},
                            success : function(data){
                                $('#manage-table').html(data);
                            }
                    }); 
                }

                //add new member
                $(document).on('submit' , '#addNewMember' , function(e){
                    e.preventDefault();
                    var userName            = $('#username').val(),
                    email                   = $('#email').val(),
                    firstName               = $('#firstname').val(),
                    lastName                = $('#lastname').val(),
                    password                = $('#password').val(),
                    u_img        = $('#u_image').val(),
                    u_img_extension         = $('#u_image').val().split('.').pop().toLowerCase(),
                    validEmail              = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                    // validation 
                    if(u_img_extension != ''){
                        if(jQuery.inArray(u_img_extension ,['png','jpg','jpeg','gif'] ) == -1){
                            swal("format invalid!" , " ", "warning");
                            $('#u_image').val('');
                            return false;
                        }
                    } 
                    if(userName == ''){
                        swal('User Name field required' , " ", "warning");
                    }else if(email == ''){
                        swal('Email field required' , " ", "warning");
                    }else if(firstName == ''){
                        swal('First Name required' , " ", "warning");
                    }else if(lastName == ''){
                        swal('Last Name required' , " ", "warning");
                    }else if(password == ''){
                        swal('Password field required' , " ", "warning");
                    }else{
                        $.ajax({
                            method:'post',
                            url:"backendMembers.php",
                            data : new FormData(this),
                            contentType: false ,
                            processData: false ,
                            success:function(data){
                                swal(data , " ", "warning");
                                if(data.trim() == 'created'){
                                    $('#addNewMember')[0].reset();
                                    swal('1 Member Added' , " ", "success");
                                    $('#add').modal('hide');
                                    viewRecord();
                                }
                            }
                        });
                    }
                });

                // edit Member function
                $(document).on('click', '#editMember-btn', function () {
                    var editid = $(this).attr('data-id');
                    
                    $.ajax({
                        method: 'POST',
                        url: 'backendMembers.php',
                        data: {
                            editid: editid
                        },
                        success: function (data) {
                            var myObj = JSON.parse(data);
                            console.log(data);
                            
                            $('#Up_User_ID').val(myObj[0].userID);
                            $('#Up_UserName').val(myObj[0].userName);
                            $('#Up_User_Email').val(myObj[0].email);
                            $('#Up_firstname').val(myObj[0].firstName);
                            $('#Up_lastname').val(myObj[0].lastName);
                            
                        }
                    });
                });

                //update members
                $(document).on('click', '#btn-update',function(){
                        var updateid    = $('#Up_User_ID').val(),
                            username    = $('#Up_UserName').val(),
                            email       = $('#Up_User_Email').val(),
                            firstname   = $('#Up_firstname').val(),
                            lastname    = $('#Up_lastname').val(),
                            password    = $('#Up_User_Password').val();
                                
                        $.ajax({
                            method : 'post',
                            url : 'backendMembers.php',
                            data:{
                                updateid    : updateid ,
                                username    : username,
                                email       : email ,
                                firstname   : firstname,
                                lastname    : lastname ,
                                password    : password
                            },
                            success : function(data){
                                swal("1 Memebr updated !" , " ", "success");
                                viewRecord();
                                $('#edit').modal('hide');
                            }
                        });
                    });

                //delete memebrs
                $(document).on('click' ,'#delete-btn' ,function(){
                    var deleteid = $(this).data('id');
                    var deleteimage = $(this).data('delete-img');

                    $(document).on('click','#btn-delete-modal' , function(){
                        $.ajax({
                            method : 'POST',
                            url: 'backendMembers.php',
                            data : {
                                deleteid:deleteid ,
                                deleteimage:deleteimage
                            },
                            success : function(data){
                                viewRecord();
                                swal("1 Memebr Deleted " , " ", "success");
                                $('#delete').modal('hide');
                            }
                        });
                    });
                });

                //activate members
                $(document).on('click' ,'#activate-btn' ,function(){
                    var activateid = $(this).data('id');            
                    $.ajax({
                        method : 'POST',
                        url: 'backendMembers.php',
                        data : {activateid:activateid},
                        success : function(data){
                            swal("1 Memebr Activated" , " ", "success");
                            viewRecord();
                        }
                    });
                });

            });
        </script>

        <!-- end ajax  calls -->

    <!-- end session check -->
<?php }else{
        header('location:index.php');
        exit();
    }
?>
    




