<?php 
    $hasFooter = '';
    $pageTitle = 'Manage Members';
    require_once "ini.php";
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
        <h4 class="page-title">Manage Members</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">MAZADY</a></li>

            <li class="breadcrumb-item active" aria-current="page">Mange Members</li>
        </ol>
        </div>
        <div class="col-sm-3">
        <div class="btn-group float-sm-right">
            <button type="button" class="btn btn-light waves-effect waves-light"><i class="fa fa-cog mr-1"></i>
            Setting</button>
            <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split waves-effect waves-light"
            data-toggle="dropdown">
            <span class="caret"></span>
            </button>
            <div class="dropdown-menu">
            <a href="javaScript:void();" class="dropdown-item">Action</a>
            <a href="javaScript:void();" class="dropdown-item">Another action</a>
            <a href="javaScript:void();" class="dropdown-item">Something else here</a>
            <div class="dropdown-divider"></div>
            <a href="javaScript:void();" class="dropdown-item">Separated link</a>
            </div>
        </div>
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
                    <form id='addNewMember'>
                        <div class="form-group">
                            <label for="user_name">user Name</label>
                            <input type="text" class="form-control" id="username" placeholder="Type User Name">
                        </div>
                        <div class="form-group">
                            <label for="user_mail">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Type User Email">
                        </div>
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" id="firstname" placeholder="Type User first name">
                        </div>
                        <div class="form-group">
                            <label for="full_name">Last Name</label>
                            <input type="text" class="form-control" id="lastname" placeholder="Type User last ">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" placeholder="Type User Password">
                        </div>
                        <div class="form-group">
                            <label for="password">user Image</label>
                            <input type="file" class="form-control" id="u_image" >
                        </div>
                        <div class="form-group">
                            <button id='addMemberBtn' type="submit" class="btn btn-primary px-5" onclick='addRecord()'><i class="fa fa-plus"></i> Add Member</button>
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

<script>
    $(function(){
        viewRecord();
        deleteRecord();
        editRecord();
        updateRecord() ;
        activateRecord();
    });

    // function read record  
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

    // function add record
    function addRecord(){
        $(document).on('submit', "#addNewMember",function(e){
            e.preventDefault();
        });
        var userName        = $('#username').val(),
            email           = $('#email').val(),
            firstName        = $('#firstname').val(),
            lastName        = $('#lastname').val(),
            password        = $('#password').val();

            
        $.ajax({
            method : 'POST',
            url: 'backendMembers.php',
            data : {
                username  : userName ,
                email     : email ,
                firstname : firstName ,
                lastname  : lastName ,
                password  : password 
            },
            success : function(data){
                swal(data , " ", "error");
                if(data == 'added'){
                    swal(data , " ", "success");
                    $('#addNewMember').trigger("reset");
                    $('#add').modal('hide');
                }
                viewRecord();
            }
        });
    }


    // edit Member function

    function editRecord() {
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
                $('#Up_User_ID').val(myObj[0].userID);
                $('#Up_UserName').val(myObj[0].userName);
                $('#Up_User_Email').val(myObj[0].email);
                $('#Up_firstname').val(myObj[0].firstName);
                $('#Up_lastname').val(myObj[0].lastName);
                
            }
        });
    });
}


    // function update record 
    function updateRecord() {
        $(document).on('click', '#btn-update',function(){
            var updateid    = $('#Up_User_ID').val(),
                username    = $('#Up_UserName').val(),
                email       = $('#Up_User_Email').val(),
                firstname   = $('#Up_firstname').val(),
                lastname    = $('#Up_lasttname').val(),
                password    = $('#Up_lasttname').val();
                    
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
    }

    // function delete record :
    function deleteRecord(){

        $(document).on('click' ,'#delete-btn' ,function(){
            var deleteid = $(this).data('id');
            $(document).on('click','#btn-delete-modal' , function(){
                $.ajax({
                method : 'POST',
                url: 'backendMembers.php',
                data : {deleteid:deleteid},
                success : function(data){
                    viewRecord();
                    swal("1 Memebr Deleted " , " ", "success");
                    $('#delete').modal('hide');
                }
            });
        });
    });
}

    // function delete record :
    function activateRecord(){

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
}

</script>

<!-- end ajax  calls -->



