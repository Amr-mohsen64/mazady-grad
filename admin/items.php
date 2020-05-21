<?php 
    $hasFooter = '';
    $pageTitle = 'Manage Items';
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
                        <h4 class="page-title"><i class="fa fa-edit"></i> Manage items</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">MAZADY</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> items</li>
                        </ol>
                    </div>
                </div>
                <!-- End Breadcrumb-->

                <div class="card">
                    <div class="card-header">
                        <button href="" id='add_item_btn' class='btn btn-info btn-round waves-effect waves-light m-2' data-toggle="modal"
                        data-target="#create_form_modal"><i class='fa fa-plus'></i> New item</button>
                        <!-- start manage items  -->
                        <div class="table-responsive" id='items'>

                        </div>
                        <!-- end manage items  -->
                    </div>
                </div>
            <!---=========================================================================================================================================-->
            <!-- modals  -->
            <!-- start new category modal -->
            <!-- Modal -->
            <div class="modal fade" id="create_form_modal">
                <div class="modal-dialog">
                    <div class="modal-content border-primary">
                        <div class="modal-header bg-primary ">
                            <h5 class="modal-title  text-white" id='form_title'><i class="fa fa-user fa-lg "></i> Add New item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                <span aria-hidden="true" class="close text-white">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form id='create_form' enctype='multipart/form-data'>
                                <div class="form-group">
                                    <label for="itemname">Item Name</label>
                                    <input type="text" class="form-control" id="itemname" name='itemname' placeholder="Type item Name">
                                </div>
                                <div class="form-group">
                                    <label for="itemdesc">Item Description</label>
                                    <input type="text" class="form-control" id="itemdesc" name='itemdesc' placeholder="Type item Description">
                                </div>
                                <div class="form-group">
                                    <label for="itemprice">Item Price</label>
                                    <input type="text" class="form-control" id="itemprice" name='itemprice' placeholder="Type item Price">
                                </div>
                                <div class="form-group">
                                    <label for="country">Country Made</label>
                                    <input type="text" class="form-control" id="country" name='country' placeholder="Type item country Made">
                                </div>
                                
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select  name="status" id="status">
                                        <option value="0">...</option>
                                        <option value="1">New</option>
                                        <option value="2">Like New</option>
                                        <option value="3">Used</option>
                                        <option value="4">Very Old</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="member">Member</label>
                                    <select  name="member" id="member">
                                    <option value="0">...</option>
                                        <!-- the next options  -->
                                            <?php 
                                                $allMembers = getAll("*" , 'users' , "WHERE user_stat = 1" , "" , "userID");
                                                // looping on the array that i get from table users
                                                foreach($allMembers as $user){
                                                    echo "<option value='".$user['userID']."'>".$user['userName']."</option>";
                                                }
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="category">category</label>
                                    <select  name="category" id="category">
                                    <option value="0">...</option>
                                        <!-- the next options  -->
                                        <?php 
                                            $allCategories = getAll("*" , 'categories' , "WHERE parent = 0" , "" , "ID");
                                            // looping on the array that i get from table categories
                                            foreach($allCategories as $category){
                                                echo "<option value='".$category['ID']."'>".$category['Name']."</option>";

                                                // start child categoris
                                                $childCat = getAll("*" , 'categories' , "WHERE parent = {$category['ID']}" , "" , "ID");
                                                foreach($childCat as $cCat){
                                                    echo "<option value='{$cCat['ID']}'>". "----> " .$cCat['Name']."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name='itemimg' id='itemimg'>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name='itemid' id='item_id'>
                                    <input type="hidden" name='action' value='create' id='action'>
                                    <button id='submit' type="submit" class="btn btn-primary px-5"><i class="fa fa-plus"></i> Add Item</button>
                                    <button data-dismiss = 'modal' class='btn btn-danger'>Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end new cat modal -->


            <!--start overlay-->
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->
        </div>
        <!-- End container-fluid-->
    </div>
    <!--End content-wrapper-->
                    
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    </div>

    <!--End wrapper-->
    <?php  include $tpl . 'footer.php';?>

    <!-- start ajax calls -->
    <script>
        $(function(){

            //load data
            loadData();
            function loadData(){
                var action = 'load';
                $.ajax({
                    method : 'post',
                    url    : 'backendItems.php',
                    data   : {action:action},
                    success:function(data){
                        $('#items').html(data);
                    }
                });
            }

             //reset fields 
            $(document).on('click' , '#add_item_btn' , function(){
                $('#create_form')[0].reset();
                $('#form_title').html("<i class='fa fa-plus'></i> Add New item");
                $('#submit').html("<i class='fa fa-plus'></i> Add item");
                $('#action').val('create');
            });

             // insert and update data 
            $('#action').val('create'); 
            $(document).on('submit', '#create_form' ,function(e){
                e.preventDefault();
                var itemImg = $('#itemimg').val(),
                    itemname = $('#itemname').val(),
                    itemdesc = $('#itemdesc').val(),
                    itemprice = $('#itemprice').val(),
                    country = $('#country').val(),
                    member = $('#member').val(),
                    category = $('#category').val();
                    status = $('#status').val();



                //check
                if(itemImg == ''){
                    swal('please selcet item img' , " ", "warning");
                }else if(itemname == ''){
                    swal('please selcet item itemname' , " ", "warning");
                }else if (itemdesc == ''){
                    swal('please selcet item itemdesc' , " ", "warning");
                }else if(itemprice == ''){
                    swal('please selcet item itemprice' , " ", "warning");
                }else if(country == ''){
                    swal('please selcet item country' , " ", "warning");
                }else if(member == 0){
                    swal('please selcet item member' , " ", "warning");
                }else if(category == 0){
                    swal('please selcet item category' , " ", "warning");
                }else if(status == 0 ){
                    swal('please selcet item status' , " ", "warning");
                }else{
                    $.ajax({
                    method : 'post',
                    url    : 'backendItems.php',
                    data   : new FormData(this) ,
                    contentType : false ,
                    processData : false ,
                    success : function (data) {
                        console.log(data);
                        
                        if(data.trim() == 'created'){
                            $('#create_form')[0].reset();
                            swal('1 item Added' , " ", "success");
                            $('#create_form_modal').modal('hide');
                            loadData();
                        }
                        if(data.trim() == 'updated'){
                            $('#create_form')[0].reset();
                            swal('1 item updated' , " ", "success");
                            $('#create_form_modal').modal('hide');
                            loadData();
                        }
                    }
                });
                }
            });

            // edit data 
            $(document).on('click' , '#edit-btn' , function(e){
                e.preventDefault();
                $('#create_form_modal').modal('show');
                var editid = $(this).attr('data-edit-id'),
                    action = "edit";

                $.ajax({
                    method : 'post',
                    url    : 'backendItems.php',
                    data   : {action:action , editid:editid},
                    success:function(data){
                        var myObj = JSON.parse(data);
                        console.log(myObj);
                        $('#itemname').val(myObj[0].Name);
                        $('#itemdesc').val(myObj[0].Desciription);
                        $('#itemprice').val(myObj[0].Price);
                        $('#country').val(myObj[0].Country_Made);
                        $('#status').val(myObj[0].Statues);
                        $('#member').val(myObj[0].Memeber_ID );
                        $('#category').val(myObj[0].Cat_ID);
                        $('#action').val('update');
                        $('#item_id').val(editid); 
                    }   
                });
            });

            // delete data 
            $(document).on('click', '#delete-btn', function(){
                
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover item",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var deleteid = $(this).attr('data-delete-id'),
                            deleteimage = $(this).attr('data-delete-img'),
                            action  = 'delete';
                            
                            $.ajax({
                                method : 'post',
                                url    : 'backendCat.php',
                                data   : {action:action,deleteid:deleteid,deleteimage:deleteimage},
                                success:function(data){
                                    if(data.trim() == 'deleted'){
                                        swal("Your item has been deleted!", {
                                        icon: "success",
                                        });
                                        loadData();
                                    }
                                }
                            });
                    }else {
                        swal("Your Categoryis safe!");
                    }
                });
            });

    //end jquery 
    });

    </script>
    <!-- end ajax  calls -->

<!-- end session check -->
<?php }else{
        header('location:index.php');
        exit();
    }
?>
    




