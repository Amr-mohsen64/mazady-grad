<?php 
    require_once 'connect.php' ;
    require_once 'includes/functions/functions.php'; 
    
    if(isset($_POST['action'])):
        if($_POST['action'] == 'load'):
            
            // arrangw according to Orderig row in the table
            $stmt2 = $db ->prepare("SELECT * FROM categories WHERE parent = 0 ORDER BY ID DESC");
            $stmt2 ->execute();
            $cats = $stmt2 ->fetchAll();
            
            ?>
            <ul class="list-group list-group-flush categories">
                <?php foreach ($cats as $cat):?>
                    <li class="list-group-item cat mange-table">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 class ='category-header mb-1'><?php echo $cat['Name'];?></h3>
                                <p>
                                    <?php
                                        $descr = $cat['Description'] ;
                                        if($descr == ''){echo "<p class='text-info'>This Category Has No Desscription !</p>";
                                        }else{echo "<p class='description'>".$descr."</p>";}
                                    ?>
                                </p>

                                <!-- start sub category -->
                                <?php 
                                    $childCats = getAll('*', 'categories',"WHERE parent ={$cat['ID']} ",'','ID' ,'DESC'); // get the childern of parent by parent ID 
                                    if(empty($childCats)):
                                        echo "<p class='mt-4 text-primary'>There are No Sub Categories !</p>";
                                    else: ?>                              
                                        <ul class="child ml-4 mt-4">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class='text-primary'>Sub-category</h5>
                                                    <?php
                                                        foreach ($childCats as $c):?>
                                                            <li class='text-danger ml-4  mb-1'>
                                                                <div class="row">  
                                                                    <div class="col-md-9">
                                                                        <?php   echo "<div>".$c['Name']."</div>";?>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <button type="submit" id='edit-btn' data-edit-id ='<?php echo $c['ID'];?>' class="btn btn-primary waves-effect waves-light btn-sm" ><i
                                                                        class="i fa fa-edit"></i></button>
                                                                        <button type="submit" id='delete-btn' data-delete-id ='<?php echo $c['ID'];?>' class="btn btn-danger waves-effect waves-light btn-sm" ><i
                                                                        class="i fa fa-trash-o"></i></button>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?php endforeach; ?>   
                                                </div>
                                            </div>
                                        </ul>
                                <?php endif;?>
                                <!-- end sub category -->
                            </div> 
                            <div class="col-md-3 mt-4">
                                <button type="submit" id='edit-btn' data-edit-id ='<?php echo $cat['ID'];?>' class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#edit"><i
                                class="i fa fa-edit"></i>Edit</button>
                                <button href='submit' type="button" id ='delete-btn' data-delete-id='<?php echo $cat['ID'];?>' class="btn btn-danger waves-effect waves-light">Delete <i
                                class="fa fa-trash-o"></i></button>
                            </div>
                        </div>
                    </li>
                <?php  endforeach ?>
                    <!-- end main looping -->
            </ul>
<?php   endif;

        // add category
        if($_POST['action'] == 'create'):
            // 1 ads disabled
            $catname            = $_POST['catname'];
            $description        = $_POST['description'];
            $parent             = $_POST['parent'];
            $stmt = $db ->prepare("INSERT INTO categories( Name , Description , parent )
                                                VALUES(:zname , :zdescription , :zparent)"); // regstatues 1 means activated and 0 means pending
            
            // excute statment 
            $stmt ->execute(array(
            'zname'         => $catname ,
            'zdescription'  => $description ,
            'zparent'       => $parent
            ));
        
            if($stmt){
                echo 'created';
            }
        endif;

        //edit category  
        if($_POST['action'] == 'edit'):
            $editid = intval($_POST['editid']);
            $stmt = $db ->prepare('SELECT * FROM categories WHERE ID = ?');
            $stmt ->execute(array($editid));
            $rows = $stmt->fetchAll();
            echo json_encode($rows);
        endif;
        
        
        //update category  
        if($_POST['action'] == 'update'):
            $catid = $_POST['cat_id'];
            $catname = $_POST['catname'];
            $description = $_POST['description'];
            $parent = $_POST['parent'];

            //query
            $stmt = $db ->prepare("UPDATE `categories` SET `Name`= ?, `Description` = ? , `parent` = ?   WHERE ID  = ?");
            $stmt ->execute(array($catname,$description,$parent,$catid));
            if($stmt){
                echo 'updated';
            }
        endif;
            // delete category 
        if($_POST['action'] == 'delete'):
            $deleteid =  $_POST['deleteid'];
            
            $stmt = $db ->prepare("DELETE FROM categories WHERE ID = ?");
            $stmt ->execute(array($deleteid));                
            if($stmt){
                echo 'deleted';
            }
        endif;

    //end main check for post action
    endif;
?>
