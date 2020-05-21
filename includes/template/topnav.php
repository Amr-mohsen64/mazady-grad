
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

<!--Start topbar header-->
<header class="topbar-nav">
<nav id="header-setting" class="navbar navbar-expand fixed-top">
    <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
        <a class="nav-link toggle-menu" href="javascript:void();">
        <i class="icon-menu menu-icon"></i>
        </a>
    </li>
    <li class="nav-item">
        <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
        <a href="javascript:void();"><i class="icon-magnifier"></i></a>
        </form>
    </li>
    </ul>

    <ul class="navbar-nav align-items-center right-nav-link">
        <li class="nav-item dropdown-lg">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown"
            href="javascript:void();">
            <i class="fa fa-bell-o"></i><span class="badge badge-info badge-up">1</span></a>
            <div class="dropdown-menu dropdown-menu-right">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                You have 14 Notifications
                <span class="badge badge-info">1</span>
                </li>
                <li class="list-group-item">
                <a href="javaScript:void();">
                    <div class="media">
                    <i class="zmdi zmdi-accounts fa-2x mr-3 text-info"></i>
                    <div class="media-body">
                        <h6 class="mt-0 msg-title">New Registered Users</h6>
                        <p class="msg-info">Lorem ipsum dolor sit amet...</p>
                    </div>
                    </div>
                </a>
                </li>
            </ul>
            </div>
        </li>
    <li class="nav-item">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
            <span class="user-profile">
                <!-- check img -->
                
                <?php
                    if(!empty($info['avatar'])):
                        echo "<img class='img-circle' src='data/uploads/avatars/'>" ;
                    else:
                        echo "<img class='img-circle' src='layout/images/default.jpg'>" ;
                    endif;
                ?>
                
                <span id='user-name'> <?php echo $info ['firstName'] ?> </span><i class="fa fa-angle-down "></i>
            </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right">
        <li class="dropdown-item user-details">
            <a href="profile.php">
                <div class="media">
                    <div class="avatar">
                        <?php
                            imgEmptyCheck($info['avatar'] , 'align-self-start mr-3','user avatar');
                        ?>
                    </div>
                    <div class="media-body">
                    <h6 class="mt-2 user-title"><?php echo $info ['firstName'] ?></h6>
                    <p class="user-subtitle"><?php echo $info ['email'] ?> </p>
                    </div>
                </div>
            </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-divider"></li>
        <a  href = 'logout.php' class="dropdown-item"><i class="icon-power mr-2"></i>Logout</a>
        </ul>
    </li>
    </ul>
</nav>
</header>
<!--End topbar header-->
<div class="clearfix"></div>