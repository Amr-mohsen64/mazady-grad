<?php 
    
        require_once 'connect.php' ;
        require_once 'includes/functions/functions.php'; 
        
        if(isset($_POST['action'])):
            if($_POST['action'] == 'load'):
                
                // arrangw according to Orderig row in the table
                $stmt2 = $db ->prepare("SELECT * FROM categories WHERE parent = 0 ORDER BY Ordering DESC");
                $stmt2 ->execute();
                $cats = $stmt2 ->fetchAll();
                
                ?>
                <ul class="list-group list-group-flush categories">
                    <?php foreach ($cats as $cat):?>
                        <li class="list-group-item cat">
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
                                    <span class ='visibilty btn btn-danger btn-sm'><i class ='fa fa-eye'></i> Hidden!</span>
                                    <span class ='Commenting btn btn-success btn-sm'><i class ='i fas fa-times'></i> Comments Disabled!</span>
                                    <span class ='ads btn btn-info btn-sm'><i class ='fa fa-eye'></i> Ads Disabled!</span>

                                    <!-- start sub category -->
                                    <?php 
                                        $childCats = getAll('*', 'categories',"WHERE parent ={$cat['ID']} ",'','ID' ,'ASC'); // get the childern of parent by parent ID 
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
                                                                            <button type="submit" id='editMember-btn' data-id ='<?php echo $row['userID'];?>' data-delete-img='<?php echo $row['avatar'];?>' class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#edit"><i
                                                                            class="i fa fa-edit"></i></button>
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
                                    <button type="submit" id='editMember-btn' data-id ='<?php echo $row['userID'];?>' data-delete-img='<?php echo $row['avatar'];?>' class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#edit"><i
                                    class="i fa fa-edit"></i>Edit</button>
                                    
                                </div>
                            </div>
                        </li>
                    <?php  endforeach ?>
                        <!-- end main looping -->
                </ul>
            
<?php  
            endif;
        endif;
?>
