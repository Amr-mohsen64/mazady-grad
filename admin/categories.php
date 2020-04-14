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
                        <h4 class="page-title">Manage Categories</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">MAZADY</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Categories</li>
                        </ol>
                    </div>
                </div>
                <!-- End Breadcrumb-->

                <div class="card">
                    <div class="card-header">
                        <button href="" id='addMember' class='btn btn-info btn-round waves-effect waves-light m-2' data-toggle="modal"
                        data-target="#add"><i class='fa fa-plus'></i> New Category</button>
                        <!-- start manage categories  -->
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-edit"></i>  Manage Cateories
                                <div class="option float-right">
                                    <i class ='fa fa-sort'></i>Ordering :[
                                    <a href="categories.php?sort=ASC">Ascending</a> |
                                    <a href="categories.php?sort=DESC">Descending</a> ] 

                                    <i class ='fa fa-eye'></i> View : [ 
                                    <span class = 'active' data-view ='full'>Full</span> |
                                    <span data-view ='classic'>Classic</span> ]
                                </div>  
                            </div>
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
            <div class="modal fade" id="add">
                <div class="modal-dialog">
                    <div class="modal-content border-primary">
                        <div class="modal-header bg-primary ">
                            <h5 class="modal-title  text-white"><i class="fa fa-user fa-lg "></i> Add New Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                <span aria-hidden="true" class="close text-white">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="addMessge"></p>
                            <form id='addNewMember' enctype='multipart/form-data'>
                                <div class="form-group">
                                    <label for="catname">Name</label>
                                    <input type="text" class="form-control" id="catname" name='catname' placeholder="Type Category Name">
                                </div>
                                <div class="form-group">
                                    <label for="description">description</label>
                                    <input type="text" class="form-control" id="description" name='description' placeholder="Type Category description">
                                </div>

                                <!-- start parent category field  -->
                                <div class="form-group">
                                    <label for="parent">Parent</label>
                                    <select name="parent" id="parent">
                                        <option value="0">None</option>
                                        
                                    </select>
                                </div>
                                <!-- end parent category field  -->
                                
                                <!-- start visibilt field  -->
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Visible</label>
                                    <div class="col-sm-9">
                                    <div class="icheck-material-info">
                                        <input type="radio" id="vs-yes" value = '0' name='visibilty' checked/>
                                        <label for="vs-yes">Yes</label>
                                    </div>
                                    <div class="icheck-material-danger">
                                        <input type="radio" id="vs-no"  value = '1' name='visibilty'>
                                        <label for="vs-no">No</label>
                                    </div>   
                                    </div>
                                </div>
                                <!-- end visibilty field  -->

                                <!-- start commenting field  -->
                                <div class="form-group row">
                                    <label for="input-29" class="col-sm-3 col-form-label">Allow Commenting</label>
                                    <div class="col-sm-9">
                                    <div class="icheck-material-info">
                                        <input type="radio" id="com-yes" value = '0' name='commenting' checked/>
                                        <label for="com-yes">Yes</label>
                                    </div>
                                    <div class="icheck-material-danger">
                                        <input type="radio" id="com-no"  value = '1' name='commenting'>
                                        <label for="com-no">No</label>
                                    </div>   
                                    </div>
                                </div>
                                <!-- end commenting field  -->

                                <!-- start allow adz field  -->
                                <div class="form-group row">
                                    <label for="input-29" class="col-sm-3 col-form-label">ads</label>
                                    <div class="col-sm-9">
                                    <div class="icheck-material-info">
                                        <input type="radio" id="ads-yes" value = '0' name='ads' checked/>
                                        <label for="ads-yes">Yes</label>
                                    </div>
                                    <div class="icheck-material-danger">
                                        <input type="radio" id="ads-no"  value = '1' name='ads'>
                                        <label for="ads-no">no</label>
                                    </div>   
                                    </div>
                                </div>
                                <!-- end allow adz field  -->

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
                        console.log(data);
                        $('#categories').html(data);
                    }
                });
            }
        });
    </script>
    <!-- end ajax  calls -->

<!-- end session check -->
<?php }else{
        header('location:index.php');
        exit();
    }
?>
    




