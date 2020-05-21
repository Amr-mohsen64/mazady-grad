<?php 
    $hasFooter = '';
    $pageTitle = 'Manage Categories';
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
                        <h4 class="page-title"><i class="fa fa-edit"></i> Manage Categories</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">MAZADY</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Categories</li>
                        </ol>
                    </div>
                </div>
                <!-- End Breadcrumb-->

                <div class="card">
                    <div class="card-header">
                        <button href="" id='add_cat_btn' class='btn btn-info btn-round waves-effect waves-light m-2' data-toggle="modal"
                        data-target="#create_form_modal"><i class='fa fa-plus'></i> New Category</button>
                        <!-- start manage categories  -->
                        <div class="card">
                            <!-- start category body -->
                            <div class="card-body" id='categories' class='cat-div'>
                                    
                            </div>
                            <!-- start category body -->
                        </div>
                        <!-- end manage categories  -->
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
                            <h5 class="modal-title  text-white" id='form_title'><i class="fa fa-user fa-lg "></i> Add New Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                <span aria-hidden="true" class="close text-white">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="addMessge"></p>
                            <form id='create_form' enctype='multipart/form-data'>
                                <div class="form-group">
                                    <label for="catname">Name</label>
                                    <input type="text" class="form-control" id="catname" name='catname' placeholder="Type Category Name">
                                </div>
                                <div class="form-group">
                                    <label for="description">description</label>
                                    <textarea type="text" class="form-control" id="description" name='description' placeholder="Type Category description" style ='resize:none'></textarea>
                                </div>

                                <!-- start parent category field  -->
                                <div class="form-group">
                                    <label for="parent">Parent</label>
                                    <select name="parent" id="parent">
                                        <option value="0">None</option>
                                        <!-- get parent category in select -->
                                        <?php 
                                            $allCats = getAll('*' , 'categories' , 'WHERE parent =0','' ,'ID','ASC');      // main cat = 0
                                            foreach ($allCats as $cat) :
                                                echo "<option value='". $cat['ID']. "'>". $cat['Name']."</option>";
                                            endforeach;
                                        ?>
                                    </select>
                                </div>
                                <!-- end parent category field  -->

                                <div class="form-group">
                                    <input type="hidden" name='cat_id' id='cat_id'>
                                    <input type="hidden" name='action' value='create' id='action'>
                                    <button id='submit' type="submit" class="btn btn-primary px-5"><i class="fa fa-plus"></i> Add Category</button>
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
                    url    : 'backendCat.php',
                    data   : {action:action},
                    success:function(data){
                        // console.log(data);
                        $('#categories').html(data);
                    }
                });
            }

            //reset fields 
            $(document).on('click' , '#add_cat_btn' , function(){
                $('#create_form')[0].reset();
                $('#form_title').html("<i class='fa fa-plus'></i> Add New Category");
                $('#submit').html("<i class='fa fa-plus'></i> Add Category");
                $('#action').val('create');
            });

            // insert and update data 
            $('#action').val('create'); 
            $(document).on('submit', '#create_form' ,function(e){
                e.preventDefault();
                $.ajax({
                    method : 'post',
                    url    : 'backendCat.php',
                    data   : new FormData(this) ,
                    contentType : false ,
                    processData : false ,
                    success : function (data) {
                        if(data.trim() == 'created'){
                            $('#create_form')[0].reset();
                            swal('1 Category Added' , " ", "success");
                            $('#create_form_modal').modal('hide');
                            loadData();
                        }
                        if(data.trim() == 'updated'){
                            $('#create_form')[0].reset();
                            swal('1 Category updated' , " ", "success");
                            $('#create_form_modal').modal('hide');
                            loadData();
                        }
                    }
                });
                
            });

            // edit data 
            $(document).on('click' , '#edit-btn' , function(e){
                e.preventDefault();
                $('#create_form_modal').modal('show');
                var editid = $(this).attr('data-edit-id'),
                    action = "edit";

                $.ajax({
                    method : 'post',
                    url    : 'backendCat.php',
                    data   : {action:action , editid:editid},
                    success:function(data){
                        var myObj = JSON.parse(data);
                        $('#catname').val(myObj[0].Name);
                        $('#description').val(myObj[0].Description);
                        $('#parent').val(myObj[0].parent);
                        $('#form_title').html('<i class="fa fa-edit"></i> Edit Category');
                        $('#submit').html('<i class="fa fa-edit"></i> Update Category');
                        $('#action').val('update');
                        $('#cat_id').val(editid);                
                    }   
                });
            });

            // delete data 
            $(document).on('click', '#delete-btn', function(){
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover category",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var deleteid = $(this).attr('data-delete-id'),
                            action  = 'delete';
                            $.ajax({
                                method : 'post',
                                url    : 'backendCat.php',
                                data   : {action:action,deleteid:deleteid},
                                success:function(data){
                                    if(data.trim() == 'deleted'){
                                        swal("Your Category has been deleted!", {
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
    });

    </script>
    <!-- end ajax  calls -->

<!-- end session check -->
<?php }else{
        header('location:index.php');
        exit();
    }
?>
    




