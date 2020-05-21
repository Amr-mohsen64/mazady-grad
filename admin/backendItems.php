<?php 
    require_once 'connect.php' ;
    require_once 'includes/functions/functions.php'; 
    
    if(isset($_POST['action'])):
        //load data
        if($_POST['action'] == 'load'):
            
            // arrangw according to Orderig row in the table
            $stmt2 = $db ->prepare("SELECT * FROM items  ORDER BY itemID  DESC");
            $stmt2 ->execute();
            $items = $stmt2 ->fetchAll();


            // if the record is not empty
            if(!empty($items)): ?>
                <table class="table table-hover text-center">
                    <thead>
                    <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">image</th>
                    <th scope="col">name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Added Date</th>
                    <th scope="col">control</th>
                    </tr>
                    </thead>
                    <?php foreach($items as $item): ?>
                    <tbody>
                        <tr>
                        <td><?php echo $item['itemID'];?></td>
                        <td>
                            <?php echo "<img src='../data/uploads/items/". $item['Image'] ."' style='width: 50px;height:50px' alt = 'image'>";?>
                        </td>
                        <td><?php echo $item['Name'];?></td>
                        <td><?php echo $item['Desciription'];?></td>
                        <td><?php echo $item['Price'] ;?></td>
                        <td><?php echo $item['Add_Date'];?></td>
                        <td>
                            <button type="submit" id='edit-btn' data-edit-id ='<?php echo $item['itemID'];?>' class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#edit"><i
                            class="i fa fa-edit"></i>Edit</button>
                            <button type="submit" id='delete-btn' data-delete-id ='<?php echo $item['itemID'];?>' data-delete-img = '<?php echo $item['image'];?>' class="btn btn-danger waves-effect waves-light" ><i
                            class="i fa fa-trash-o"></i>Delete</button>
                            
                        </td>
                        </tr>
                    </tbody>
                    <?php endforeach ;?>
                </table>
        <?php else:
                echo "<div classs='container'>";
                    echo "<h5 class='text-primary'>there is No items !</h5>";
                echo "</div>";
            endif;
            
        ?>

            
<?php   endif;

            // add item
            if($_POST['action'] == 'create'):
                
                $itemname               = $_POST['itemname'];
                $itemdesc               = $_POST['itemdesc'];
                $itemprice              = $_POST['itemprice'];
                $country                = $_POST['country'];
                $status                 = $_POST['status'];
                $member                 = $_POST['member'];
                $category               = $_POST['category'];

                $itemimg  = img_upload('itemimg','../data/uploads/items/');   
                // insert Item info into data base
                $stmt = $db ->prepare("INSERT INTO items(Name , Desciription , Price , Country_Made , image , Statues, Cat_ID , Memeber_ID, Add_Date)
                                                VALUES(:zname , :zdesc , :zprice , :zcountry , :zimg, :zstatues , :zcat , :zmember , now() )"); 
                $stmt ->execute(array(
                    'zname'       => $itemname ,
                    'zdesc'       => $itemdesc ,
                    'zprice'      => $itemprice ,
                    'zcountry'    => $country ,
                    'zimg'        => $itemimg ,
                    'zstatues'    => $status ,
                    'zcat'        => $category ,
                    'zmember'     => $member 
                ));
            
                if($stmt){
                    echo 'created';
                }
            endif;

            //edit items  
            if($_POST['action'] == 'edit'):
                $editid = intval($_POST['editid']);
                $stmt = $db ->prepare('SELECT * FROM items WHERE itemID = ?');
                $stmt ->execute(array($editid));
                $rows = $stmt->fetchAll();
                echo json_encode($rows);
            endif;

            //update item  
            if($_POST['action'] == 'update'):
                $itemid                 = $_POST['itemid'];
                $itemname               = $_POST['itemname'];
                $itemdesc               = $_POST['itemdesc'];
                $itemprice              = $_POST['itemprice'];
                $country                = $_POST['country'];
                $status                 = $_POST['status'];
                $member                 = $_POST['member'];
                $category               = $_POST['category'];

                //query
                $stmt = $db ->prepare("UPDATE `items` SET `Name`= ?, `Desciription` = ? , `Price` = ? , `Country_Made` = ? , `Statues` = ?  , `Cat_ID` = ?  , `Memeber_ID` = ? WHERE itemID = ?");
                $stmt ->execute(array($itemname , $itemdesc , $itemprice ,$country,$status ,$category,$member,$itemid));
                if($stmt){
                    echo 'updated';
                }
            endif;

            // delete item 
            if($_POST['action'] == 'delete'):
                $deleteid =  $_POST['deleteid'];
                $deleteimage = $_POST['deleteimage'];
                unlink('../data/uploads/items/'.$deleteimage);
                
                $stmt = $db ->prepare("DELETE FROM items WHERE itemID = ?");
                $stmt ->execute(array($deleteid));                
                if($stmt){
                    echo 'deleted';
                }
            endif;
        

    //end main check for post action
    endif;
?>
