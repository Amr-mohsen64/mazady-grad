
<!-- Start Initialization File -->
<?php 
    /* ==Start Output Buffer== */
        ob_start();
        /* ==Start Open Session== */
            session_start();
        /* ==End Open Session== */
        /* ==Start Declare Title== */
            $pageTitle = 'Login Page';
        /* ==End Declare Title== */
        /* ==Start Session Check== */
            if (isset($_SESSION['BIDDERSESSION']) || isset($_SESSION['SELLERSESSION'])) {
                /* ==Start Home Redirection== */
                    header('Location: index.php');
                    exit;
                /* ==End Home Redirection== */
            }
        /* ==End Session Check== */
        /* ==Start Include Ini== */
            include_once 'ini.php';
        /* ==Start Include Ini== */
        /* ==Start HTTP Request Check== */
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                /* ==Start Bidder Check== */
                    if (isset($_POST['bidder-log'])) {
                        /* ==Start Errors Array== */
                            $bidderErrors = array();
                        /* ==End Errors Array== */
                        /* ==Start Declare Input Varialbes== */
                            $bidderUsername = isset($_POST['bidder-log-name']) ? $_POST['bidder-log-name'] : '' ;
                            $bidderUserPass = isset($_POST['bidder-log-pass']) ? $_POST['bidder-log-pass'] : '' ;
                        /* ==End Declare Input Varialbes== */
                        /* ==Start isset Username Check== */
                            if (isset($_POST['bidder-log-name'])) {
                                /* ==Start Sanitize Username== */
                                    $bidderUsername = filter_var(
                                        $bidderUsername,
                                        FILTER_SANITIZE_STRING
                                    );
                                /* ==End Sanitize Username== */
                                /* ==Start Empty/Length Check== */
                                    if (empty($bidderUsername) || strlen($bidderUsername) < 3) {
                                        $bidderErrors[] =
                                            ':( Please Type The <strong>Username</strong> You Regsitered With. :(';
                                    }
                                /* ==End Empty/Length Check== */
                            } 
                        /* ==End isset Username Check== */
                        /* ==Start isset Password Check== */
                            if (isset($_POST['bidder-log-pass'])) {
                                /* ==Start Password Hash== */
                                    $bidderUserPass = sha1($bidderUserPass);
                                /* ==End Password Hash== */
                                /* ==Start Empty/Length Check== */
                                    if (empty($bidderUserPass) || strlen($_POST['bidder-log-pass']) < 4) {
                                        $bidderErrors[] =
                                            ':( Please Type The <strong>Password</strong> You Regsitered With. :(';
                                    }
                                /* ==End Empty/Length Check== */
                            }
                        /* ==End isset Password Check== */
                        /* ==Start Empty Errors Check== */
                            if (empty($bidderErrors)) {
                                /* ==Start Prepare DB Select Statement== */
                                    $stmt = $db->prepare('
                                        SELECT
                                            `userID`, `userName`, `password`
                                        FROM
                                            `users`
                                        WHERE
                                            `userName` = ?
                                        AND
                                            `password` = ?
                                        AND
                                            `user_stat` = 0
                                        LIMIT
                                            1
                                    ');
                                /* ==End Prepare DB Select Statement== */
                                /* ==Start Execute DB Select Statement== */
                                    $stmt->execute(
                                        array(
                                            $bidderUsername,
                                            $bidderUserPass
                                        )
                                    );
                                /* ==End Execute DB Select Statement== */
                                /* ==Start Fetch Db Select Statement== */
                                    $bidderUser = $stmt->fetch();
                                /* ==End Fetch Db Select Statement== */
                                /* ==Start Count DB Select Statement== */
                                    $count = $stmt->rowCount();
                                /* ==End Count DB Select Statement== */
                                /* ==Start Count/Letter Case Check== */
                                    if ($count > 0 && ($bidderUsername === $bidderUser['userName'])) {
                                        /* ==Start Session Set== */
                                            $_SESSION['BIDDERSESSION']  = $bidderUsername;
                                            $_SESSION['BIDDERID']       = $bidderUser['userID'];
                                            $_SESSION['BIDDERSTAT']     = $bidderUser['user_stat'];
                                        /* ==End Session Set== */
                                        /* ==Start Redired Home== */
                                            header('Location: index.php');
                                            exit();
                                        /* ==End Redired Home== */
                                    } else {
                                        $bidderErrors[] =
                                            ':( Oops <strong>Invalid</strong> Username <strong>and/or</strong> Password. :(';
                                    }
                                /* ==End Count Check== */
                            }
                        /* ==End Empty Errors Check== */
                    }
                /* ==End Bidder Check== */
                /* ==Start Seller Check== */
                    if (isset($_POST['seller-log'])) {
                        /* ==Start Errors Array== */
                            $sellerErrors = array();
                        /* ==End Errors Array== */
                        /* ==Start Declare Input Varialbes== */
                            $sellerUsername = isset($_POST['seller-log-name']) ? $_POST['seller-log-name'] : '' ;
                            $sellerUserPass = isset($_POST['seller-log-pass']) ? $_POST['seller-log-pass'] : '' ;
                        /* ==End Declare Input Varialbes== */
                        /* ==Start isset Username Check== */
                            if (isset($_POST['seller-log-name'])) {
                                /* ==Start Sanitize Username== */
                                    $sellerUsername = filter_var(
                                        $sellerUsername,
                                        FILTER_SANITIZE_STRING
                                    );
                                /* ==End Sanitize Username== */
                                /* ==Start Empty/Length Check== */
                                    if (empty($sellerUsername) || strlen($sellerUsername) < 3) {
                                        $sellerErrors[] =
                                            ':( Please Type The <strong>Username</strong> You Regsitered With. :(';
                                    }
                                /* ==End Empty/Length Check== */
                            }
                        /* ==End isset Username Check== */
                        /* ==Start isset Password Check== */
                            if (isset($_POST['seller-log-pass'])) {
                                /* ==Start Password Hash== */
                                    $sellerUserPass = sha1($sellerUserPass);
                                /* ==End Password Hash== */
                                /* ==Start Empty/Length Check== */
                                    if (empty($sellerUserPass) || strlen($_POST['seller-log-pass']) < 4) {
                                        $sellerErrors[] =
                                            ':( Please Type The <strong>Password</strong> You Regsitered With. :(';
                                    }
                                /* ==End Empty/Length Check== */
                            }
                        /* ==End isset Password Check== */
                        /* ==Start Empty Errors Check== */
                            if (empty($sellerErrors)) {
                                /* ==Start Prepare DB Select Statement== */
                                    $stmt = $db->prepare('
                                        SELECT
                                            `userID`, `userName`, `password`
                                        FROM
                                            `users`
                                        WHERE
                                            `userName` = ?
                                        AND
                                            `password` = ?
                                        AND
                                            `user_stat` = 1
                                        LIMIT
                                            1
                                    ');
                                /* ==End Prepare DB Select Statement== */
                                /* ==Start Execute DB Select Statement== */
                                    $stmt->execute(
                                        array(
                                            $sellerUsername,
                                            $sellerUserPass
                                        )
                                    );
                                /* ==End Execute DB Select Statement== */
                                /* ==Start Fetch Db Select Statement== */
                                    $sellerUser = $stmt->fetch();
                                /* ==End Fetch Db Select Statement== */
                                /* ==Start Count DB Select Statement== */
                                    $count = $stmt->rowCount();
                                /* ==End Count DB Select Statement== */
                                /* ==Start Count/Letter Case Check== */
                                    if ($count > 0 && ($sellerUsername === $sellerUser['userName'])) {
                                        /* ==Start Session Set== */
                                            $_SESSION['SELLERSESSION']  = $sellerUsername;
                                            $_SESSION['SELLERID']       = $sellerUser['userID'];
                                            $_SESSION['SELLERSTAT']     = $sellerUser['user_stat'];
                                        /* ==End Session Set== */
                                        /* ==Start Redired Home== */
                                            header('Location: index.php');
                                            exit();
                                        /* ==End Redired Home== */
                                    } else {
                                        $sellerErrors[] =
                                            ':( Oops <strong>Invalid</strong> Username <strong>and/or</strong> Password. :(';
                                    }
                                /* ==End Count Check== */
                            }
                        /* ==End Empty Errors Check== */
                    }
                /* ==End Seller Check== */
            }
        /* ==End HTTP Request Check== */
        /* ==Start Page Content== */
?>
<!-- End Initialization File -->
<!-- Start Content Wrapper -->
    <div id="wrapper">
        <!-- Start Content Container -->
            <div class="container login-container">
                <!-- Start Forms Heading -->
                    <h1 class="text-center">
                        <span
                            class="bidder-heading"
                            data-class="login-form-bidder">Bidder Login</span> | <span
                                class="seller-heading"
                                data-class="login-form-seller">Seller Login</span>
                    </h1>
                <!-- End Forms Heading -->
                <!-- Start Log Info  -->
                    <div class="log-info">
                        <!-- Start Bidder Errors Display -->
                            <?php
                                /* ==Start empty Check== */
                                    if (!empty($bidderErrors)) {
                                        /* ==Start Errors Loop== */
                                            foreach ($bidderErrors as $error) {
                                ?><div class="msg error"><?php
                                                /* ==Start Error Print== */
                                                    echo $error;
                                                /* ==End Error Print== */
                                ?></div><?php
                                            }
                                        /* ==End Errors Loop== */
                                    }
                                /* ==End empty Check== */
                            ?>
                        <!-- End Bidder Errors Display -->
                        <!-- Start Seller Errors Display -->
                            <?php
                                /* ==Start empty Check== */
                                    if (!empty($sellerErrors)) {
                                        /* ==Start Errors Loop== */
                                            foreach ($sellerErrors as $error) {
                                ?><div class="msg error sel-err"><?php
                                                /* ==Start Error Print== */
                                                    echo $error;
                                                /* ==End Error Print== */
                                ?></div><?php
                                            }
                                        /* ==End Errors Loop== */
                                    }
                                /* ==End empty Check== */
                            ?>
                        <!-- End Seller Errors Display -->
                    </div>
                <!-- End Log Info -->
                <!-- Start Bidder Form -->
                    <form
                        class="login-form-bidder"
                        action="<?php
                            /* ==Start HTTP Request== */
                                echo $_SERVER['PHP_SELF'];
                            /* ==End HTTP Request== */
                        ?>"
                        method="POST">
                            <!-- Start Username Input -->
                                <div class="form-group">
                                    <input
                                        pattern=".{3,}"
                                        title="Username Of Registeration With Min. 3 Characters"
                                        type="text"
                                        class="form-control valid-name"
                                        placeholder="Bidder Username:"
                                        name="bidder-log-name"
                                        id="bidder-log-name"
                                        autocomplete="off"
                                        value="<?php
                                            /* ==Start isset Check== */
                                                if (isset($bidderUsername)) {
                                                    echo $bidderUsername;
                                                }
                                            /* ==End isset Check== */
                                        ?>"
                                        required="required" />
                                    <!-- <i class="icon-user"></i> -->
                                    <!-- Start Front Error Validation -->
                                        <div class="alert alert-danger custom-alert">
                                            :( <strong>Mandatory</strong> Filed: Username must be At Least <strong>3 characters</strong>. :(
                                        </div>
                                    <!-- End Front Error Validation -->
                                </div>
                            <!-- End Username Input -->
                            <!-- Start Password Input -->
                                <div class="form-group">
                                    <input
                                        minlength="4"
                                        type="password"
                                        class="form-control valid-pass"
                                        placeholder="Bidder Password:"
                                        name="bidder-log-pass"
                                        id="bidder-log-pass"
                                        autocomplete="new-password"
                                        required="required" />
                                    <!-- Font Icone -->
                                    <!-- Start Front Error Validation -->
                                        <div class="alert alert-danger custom-alert">
                                            :( <strong>Mandatory</strong> Filed: Password must be At Least <strong>4 characters</strong>. :(
                                        </div>
                                    <!-- End Front Error Validation -->
                                </div>
                            <!-- End Password Input -->
                            <!-- Start Form Submit -->
                                <div class="form-group text-center">
                                    <input
                                        type="submit"
                                        class="btnSubmit"
                                        name="bidder-log"
                                        value="Login" />
                                    <!-- Start Front Error Validation -->
                                        <div class="alert alert-danger custom-alert" id="bidder-log-form-alert">
                                            :( Oops <strong>Invalid</strong> Username <strong>and/or</strong> Password. :(
                                        </div>
                                    <!-- End Front Error Validation -->
                                </div>
                            <!-- End Form Submit -->
                            <!-- Start Resest Link -->
                                <div class="form-group text-right">
                                <!-- for future work -->
                                <strong>New User ?</strong>
                                    <a
                                        href="register.php"
                                        class="ForgetPwd">Register</a>
                                </div>
                            <!-- End Reset Link -->
                    </form>
                <!-- End Bidder Form -->
                <!-- Start Seller Form -->
                    <form
                        class="login-form-seller"
                        action="<?php
                            /* ==Start HTTP Request== */
                                echo $_SERVER['PHP_SELF'];
                            /* ==End HTTP Request== */
                        ?>"
                        method="POST">
                            <!-- Start Username Input -->
                                <div class="form-group">
                                    <input
                                        pattern=".{3,}"
                                        title="Username Of Registeration With Min. 3 Characters"
                                        type="text"
                                        class="form-control valid-name"
                                        placeholder="Seller Username:"
                                        name="seller-log-name"
                                        id="seller-log-name"
                                        autocomplete="off"
                                        value="<?php
                                            /* ==Start isset Check== */
                                                if (isset($sellerUsername)) {
                                                    echo $sellerUsername;
                                                }
                                            /* ==End isset Check== */
                                        ?>"
                                        required="required" />
                                    <!-- <i class="icon-user"></i> -->
                                    <!-- Start Front Error Validation -->
                                        <div class="alert alert-danger custom-alert">
                                            :( <strong>Mandatory</strong> Filed: Username must be At Least <strong>3 characters</strong>. :(
                                        </div>
                                    <!-- End Front Error Validation -->
                                </div>
                            <!-- End Username Input -->
                            <!-- Start Password Input -->
                                <div class="form-group">
                                    <input
                                        minlength="4"
                                        type="password"
                                        class="form-control valid-seller-pass"
                                        placeholder="Seller Password:"
                                        name="seller-log-pass"
                                        id="seller-log-pass"
                                        autocomplete="new-password"
                                        required="required" />
                                    <!-- Font Icone -->
                                    <!-- Start Front Error Validation -->
                                        <div class="alert alert-danger custom-alert">
                                            :( <strong>Mandatory</strong> Filed: Password must be At Least <strong>4 characters</strong>. :(
                                        </div>
                                    <!-- End Front Error Validation -->
                                </div>
                            <!-- End Password Input -->
                            <!-- Start Form Submit -->
                                <div class="form-group text-center">
                                    <input
                                        type="submit"
                                        class="btnSubmit"
                                        name="seller-log"
                                        value="Login" />
                                    <!-- Start Front Error Validation -->
                                        <div class="alert alert-danger custom-alert" id="seller-log-form-alert">
                                            :( Oops <strong>Invalid</strong> Username <strong>and/or</strong> Password. :(
                                        </div>
                                    <!-- End Front Error Validation -->
                                </div>
                            <!-- End Form Submit -->
                            <!-- Start Reset Link -->
                                <div class="form-group text-right">
                                <!-- For Future Work -->
                                <strong class='text-white'>New User ? </strong>
                                    <a
                                        href="register.php"
                                        class="ForgetPwd"
                                        value="Login">Register</a>
                                </div>
                            <!-- End Reset Link -->
                    </form>
                <!-- End Seller Form -->
            </div>
        <!-- End Content Container -->
    </div>
<!-- End Content Wrapper -->
<!-- Start Footer File -->
<?php 
        /* ==End Page Content== */
        /* ==Start Include Footer== */
            include_once $tpl . 'footer.php';
        /* ==End Include Footer== */
    ob_end_flush();
    /* ==End Output Buffer== */
?>
<!-- End Footer File -->