
<?php 

  //get User info according session
  $sessionUser = '';
  if(isset($_SESSION['BIDDERID'])){
      $sessionUser =  $_SESSION['BIDDERID'] ;
  }elseif(isset($_SESSION['SELLERID'])){
      $sessionUser =  $_SESSION['SELLERID'] ;
  }
  $getUser = $db ->prepare('SELECT * FROM users WHERE userID = ? ');
  $getUser ->execute(array($sessionUser));
  $info = $getUser ->fetch();

?>

<!--Start sidebar-wrapper-->  
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
<div class="brand-logo">
        <a href="index.php">
          <img src="layout/images/logo.png" class="logo-icon" alt="logo icon">
          <h5 class="logo-text">MAZADY</h5>
        </a>
      </div>
      <div class="user-details">
        <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
          <div class="avatar">
            <?php
                imgEmptyCheck($info['avatar'],'mr-3 side-user-img','profile-image'); ?>
          </div>
          <div class="media-body">
            <h6 class="side-user-name"><?php  echo $info['firstName'] . " " . $info['lastName']?></h6>
          </div>
        </div>
        <div id="user-dropdown" class="collapse">
          <ul class="user-setting-menu">
            <li><a href="profile.php"><i class="icon-user"></i> My Profile</a></li>
            <li><a href="logout.php"><i class="icon-power"></i> Logout</a></li>
          </ul>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="sidebar-header">categories</li>
        <?php
              $categoris =getAll('*', 'categories','WHERE parent =0','','ID' ,'ASC'); // parent 0 is main category not sub 
              foreach ($categoris as $category): ?>
                <li>
                  <!-- PARENT CATEGORY-->
                  <a href="javaScript:void();" class="waves-effect">
                    <i class="zmdi zmdi-view-dashboard"></i>
                      <span><?php echo $category['Name'];?> </span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>

                  <!-- SUB CATEG -->
                  <?php $childCat = getAll("*" , 'categories' , "WHERE parent = {$category['ID']}" , "" , "ID"); 
                        foreach ($childCat as $c) : ?>
                          <ul class="sidebar-submenu">
                            <li><a href="products.php?pageid=<?php echo $c['ID']?>"><i class="zmdi zmdi-dot-circle-alt"></i> <?php echo $c['Name']?></a></li>
                          </ul>
                  <!-- end sub for each -->
                  <?php endforeach; ?>
                </li>
            
              <!-- END PARENT CAT foreach -->
              <?php  endforeach;  ?>
      </ul>

    </div>
    <!--End sidebar-wrapper-->
