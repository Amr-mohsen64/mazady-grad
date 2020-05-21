<?php 
    $hasFooter = '';
    $pageTitle = 'Manage Sessions';
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
                            <h4 class="page-title"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo  "  ". $pageTitle ;?></h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">MAZADY</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo  $pageTitle;?></li>
                            </ol>
                        </div>
                    </div>
                    <!-- End Breadcrumb-->
                    <div class="card mange-table ">
                            <div class="card-body">
                                <button href="add-member.html" id='addMember' class='btn btn-info btn-round waves-effect waves-light m-2'
                                    data-toggle="modal" data-target="#add"><i class='fa fa-plus'></i>
                                    New Session</button>
                                <div class="table-responsive" id='manage-table'></div>
                            </div>
                    </div>
            <!--End Table -->
            <!---=========================================================================================================================================-->
                    <!-- start session modal -->
                    <!-- Modal -->
                    <div class="modal fade" id="add">
                        <div class="modal-dialog">
                            <div class="modal-content border-primary">
                                <div class="modal-header bg-primary ">
                                    <h5 class="modal-title  text-white"><i class="fa fa-clock-o" aria-hidden="true"></i> Add New Session</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                        <span aria-hidden="true" id='exit' class="close text-white">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id='add_modal'>
                                        <div class="form-group">
                                            <label for="data_picker">Session date</label>
                                            <input type="text" class="form-control" id="data_picker" name='sessiondate' placeholder="Choose session Date" autocomplete='off'>
                                        </div>
                                        <div class="form-group">
                                            <label for="timepkr" class='d-block '>Session Time</label>
                                            <input type="text" class="form-control d-inline" id="timepkr" name='sessiontime' placeholder="HH:MM" style='width:85%' autocomplete='off'>
                                            <button class="btn btn-primary " type='button' onclick="showpickers('timepkr,12')"><i class="fa fa-clock-o" aria-hidden="true"></i></button>
                                            <div class="timepicker"></div>
                                        </div>
                                    
                                        <div class="form-group">
                                            <input type="hidden" name='action' id='action'>
                                            <button id='add_session_btn' type="submit" value='insert' name ='insert' class="btn btn-primary px-5"><i class="fa fa-plus"></i> Add Session</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end session modal -->

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
        <script src='layout/plugins/timepicker/tpicker.js'></script>
        <script src='layout/js/jquery-ui.min.js'></script>

        <!-- start ajax calls -->
    
        <script>
            $('#data_picker').datepicker();
            $(document).on('click' , '#exit' , function(){
                $('#add_modal')[0].reset();
            });
            $(document).on('click' , '#add_session_btn' , function(e){
                e.preventDefault();
                date= $('#data_picker').val()
                console.log(date);
                
            });

        </script>

        <!-- end ajax  calls -->

    <!-- end session check -->
<?php }else{
        header('location:index.php');
        exit();
        }
?>  
    




