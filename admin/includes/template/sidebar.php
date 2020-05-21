<?php 
    //get User info according session
    $sessionUser = $_SESSION['admin'];
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
        <li class="sidebar-header">MAIN NAVIGATION</li>
        <li>
          <a href="dashboard.php" class="waves-effect">
            <i class="zmdi zmdi-view-dashboard"></i> <span>dashboard</span>
          </a>
        </li>
        
        <li>
          <a href="javaScript:void();" class="waves-effect">
            <i class="fa fa-cog"></i> <span>Manage</span><i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="sidebar-submenu">
            <li><a href="members.php"><i class="fa fa-users" aria-hidden="true"></i> Members</a></li>
            <li><a href="categories.php"><i class="fa fa-window-maximize" aria-hidden="true"></i>Categories</a></li>
            <li><a href="items.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Items</a>
            <li><a href="session.php"><i class="fa fa-clock-o" aria-hidden="true"></i> Sessions</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!--End sidebar-wrapper-->
