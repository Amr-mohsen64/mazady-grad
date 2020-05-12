<!-- Start Initialization File -->
<?php
    /* ==Start Output Buffer== */
        ob_start();
        /* ==Start Open Session== */
            session_start();
        /* ==End Open Session== */
        /* ==Start Declare Page Title== */
            $pageTitle = 'Registeration Page';
        /* ==End Declare Page Title== */
        /* ==Start Session Check== */
            if (isset($_SESSION['USERSESSION'])) {
                header('Location: index.php');
                exit();
            }
        /* ==End Session Check== */
        /* ==Start Include ini== */
            include_once "ini.php";
        /* ==End Include ini== */
        /* ==Start HTTP Request Check== */
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                /* ==Start Bidder Check== */
                    if (isset($_POST['bidder-reg'])) {
                        /* ==Start Errors Array== */
                            $errors = array();
                        /* ==End Errors Array== */
                        /* ==Start Declare Input Variables== */
                            $bidderUsername = isset($_POST['bidder-reg-name']) ? $_POST['bidder-reg-name'] : '' ;   // Bidder Username.
                            $bidderUserPass = isset($_POST['bidder-reg-pass']) ? $_POST['bidder-reg-pass'] : '' ;   // Bidder Password.
                            $bidderConfPass = isset($_POST['bidder-reg-conf']) ? $_POST['bidder-reg-conf'] : '' ;   // Bidder Confirmation.
                            $bidderUserMail = isset($_POST['bidder-reg-mail']) ? $_POST['bidder-reg-mail'] : '' ;   // Bidder Email.
                            $bidderUserPhon = isset($_POST['bidder-reg-phon']) ? $_POST['bidder-reg-phon'] : '' ;   // Bidder Phone.
                            $bidderUserCoun = isset($_POST['bidder-reg-coun']) ? $_POST['bidder-reg-coun'] : '' ;   // Bidder Country.
                        /* ==End Declare Input Variables== */
                        /* ==Start Username isset Check== */
                            if (isset($bidderUsername)) {
                                /* ==Start Input Filter== */
                                    $bidderUsername = filter_var(
                                        $_POST['bidder-reg-name'],
                                        FILTER_SANITIZE_STRING
                                    );
                                /* ==End Input Filter== */
                                /* ==Start Empty Check== */
                                    if (empty($bidderUsername)) {
                                        $errors[] = 
                                            ':( Oops <strong>Username Mendatory</strong> Field. :(';
                                    }
                                /* ==End Empty Check== */
                                /* ==Start Length Check== */
                                    if (!empty($bidderUsername)  &&  strlen($bidderUsername) < 3) {
                                        $errors[] = 
                                            ':( Oops <strong>Username</strong> Must Be <strong>Greater Than Two Characters</strong>. :(';
                                    }
                                /* ==End Length Check== */
                            }
                        /* ==End Username isset Check== */
                        /* ==Start Password isset Check== */
                            if (isset($bidderUserPass)  &&  isset($bidderConfPass)) {
                                /* ==Start Length Check== */
                                    if ($bidderUserPass !== '' && strlen($bidderUserPass) < 4) {
                                        $errors[] = 
                                            ':( Oops Password Min. Length: "<strong>4 Characters</strong>". :(';
                                    } else {
                                        /* ==End Length Check== */
                                        /* ==Start Hash Inputs== */
                                            $bidderUserPass = sha1($bidderUserPass);
                                            $bidderConfPass = sha1($bidderConfPass);
                                        /* ==End Hash Inputs== */
                                        /* ==Start Empty Check== */
                                            if ($bidderUserPass === 'da39a3ee5e6b4b0d3255bfef95601890afd80709') {
                                                $errors[] = 
                                                    ':( Oops <strong>Password Mendatory</strong> Field. :(';
                                            }
                                        /* ==End Empty Check== */
                                        /* ==Start Not Identical Check== */
                                            if (($bidderUserPass !== 'da39a3ee5e6b4b0d3255bfef95601890afd80709') && ($bidderUserPass !== $bidderConfPass)) {
                                                $errors[] = 
                                                    ':( Oops <strong>Passwords Not Identical</strong>. :(';
                                            }
                                        /* ==End Not Identical Check== */
                                        /* ==Start Identical Check== */
                                            if (($bidderUserPass !== 'da39a3ee5e6b4b0d3255bfef95601890afd80709') && ($bidderUserPass === $bidderConfPass)) {
                                                /* ==Start Declare Succes Message== */
                                                    $successMsg =
                                                        ':) Congrats <strong>Passwords are Identical</strong>. :)';
                                                /* ==End Declare Success Message== */
                                            }
                                        /* ==End Identical Check== */
                                    }
                            }
                        /* ==End Password isset Check== */
                        /* ==Start Email isset Check== */
                            if (isset($bidderUserMail)) {
                                /* ==Start Declare Filtered Email== */
                                    $bidderUserMail = filter_var(
                                        $bidderUserMail,
                                        FILTER_SANITIZE_EMAIL
                                    );
                                /* ==End Declare Filtered Email== */
                                /* ==Start Empty Check== */
                                    if (empty($bidderUserMail)) {
                                        $errors[] = 
                                            ':( Oops <strong>Email Mendatory</strong> Field. :(';
                                    }
                                /* ==End Empty Check== */
                                /* ==Start Email Validate Check== */
                                    if (
                                        !
                                        empty($bidderUserMail)
                                        &&
                                        filter_var(
                                            $bidderUserMail,
                                            FILTER_VALIDATE_EMAIL
                                        )
                                        != true
                                    ) {
                                        $errors[] = ':( Oops <strong>Email Not Valid</strong>. :(';
                                    }
                                /* ==End Email Validate Check== */
                            }
                        /* ==End Email isset Check== */
                        /* ==Start Phone isset Check== */
                            if (isset($bidderUserPhon)) {
                                /* ==Start Empty Check== */
                                    if (empty($bidderUserPhon)) {
                                        $errors[] = 
                                            ':( Oops <strong>Phone Mendatory</strong> Field. :(';
                                    }
                                /* ==End Empty Check== */
                                /* ==Start Numeric Check== */
                                    if (!empty($bidderUserPhon)) {
                                        // allows plus sign (+) and hyphens (-) Added To Phone Number.
                                        if (!preg_match("/^[+0-9-]+$/", $bidderUserPhon)) {
                                            $errors[] = 
                                                    ':( Oops <strong>Phone Numbers</strong> Only. :(';
                                        }
                                    }
                                /* ==End Numeric Check== */
                                /* Start Filter Input */
                                $bidderUserPhon = filter_var(
                                    $bidderUserPhon,
                                    FILTER_SANITIZE_NUMBER_INT  // allows plus sign (+), hyphens (-), and dot(.) In Phone Number.
                                );
                                /* ==End Filter Input== */
                                /* ==Start Validation Check== */
                                    $bidderUserPhon = str_replace(
                                        '-',
                                        '',
                                        $bidderUserPhon
                                    );
                                /* ==End Validation Check== */
                                /* ==Start Length Check== */
                                    if (!empty($bidderUserPhon)) {
                                        if (is_numeric($bidderUserPhon) && (strlen($bidderUserPhon) <10 || strlen($bidderUserPhon) >13)) {
                                            $errors[] = ':( Oops <strong>Number Not Valid</strong>. :(';
                                        }
                                    }
                                /* ==End Length Check== */
                            }
                        /* ==End Phone isset Check== */
						/* ==Start Country isset Check== */
							if (isset($bidderUserCoun)) {
								/* ==Start Empty Check== */
									if (empty($bidderUserCoun)) {
										$errors[] = 
                                                    ':( Oops <strong>Country Mendatory</strong> Field. :(';
									}
								/* ==End Empty Check== */
								/* ==Start Filter Input== */
									$bidderUserCoun = filter_var(
										$bidderUserCoun,
										FILTER_SANITIZE_NUMBER_INT
									);
								/* ==End Filter Input== */
							}
                        /* ==End Country isset Check== */
                        /* ==Start Errors Empty Check== */
                            if (empty($errors)) {
                                /* ==Start Existance Statement== */
                                    $chck = checkDB(
                                        'userName',
                                        'users',
                                        $bidderUsername
                                    );
                                /* ==End Existance Statement== */
                                /* ==Start existance Check== */
                                    if ($chck == 1) {
                                        $errors[] =
                                            ':( Oops "<strong>' .$bidderUsername. '</strong>" Already Registered User Try <strong>Another Username</strong>. :(';
                                        /* ==Start Clear Input Value== */
                                        // header('Location: register.php');
                                            $bidderUsername = '';
                                        /* ==End Clear Input Value== */
                                    } else {
                                        /* ==Start PDO Insert Statement== */
                                            $stmt = $db->prepare('
                                                INSERT INTO
                                                    `users`
                                                        (
                                                            `userName`,
                                                            `phone_num`,
                                                            `password`,
                                                            `email`,
                                                            `country_id`,
                                                            `regStatues`,
                                                            `user_stat`,
                                                            `date`
                                                        )
                                                VAlUES
                                                    (
                                                        :username,
                                                        :userphon,
                                                        :userPassword,
                                                        :userEmail,
                                                        :userCountry,
                                                        0,
                                                        0,
                                                        NOW()
                                                    )
                                                ');
                                            $stmt->execute(
                                                array(
                                                    'username' 		=> $bidderUsername,
                                                    'userphon' 		=> $bidderUserPhon,
                                                    'userPassword' 	=> $bidderUserPass,
                                                    'userEmail' 	=> $bidderUserMail,
                                                    'userCountry' 	=> $bidderUserCoun
                                                )
                                            );
                                        /* ==End PDO Insert Statement== */
                                        /* ==Start Declare Succes Message== */
                                            $successMsg =
                                                ':) Congrats "<strong>' .$bidderUsername. '</strong>" <strong>Registeration Is Done</strong>. :)';
                                        /* ==End Declare Success Message== */
                                        /* ==Start Clear Form Values== */
                                            $bidderUsername = '';
                                            $bidderUserMail = '';
                                            $bidderUserPhon = '';
                                            $bidderUserCoun = '';
                                        /* ==End Clear Form Values== */
                                        // heade('Location: register.php');
                                    }
                                    
                                /* ==End existance Check== */
                            }
                        /* ==End Errors Empty Check== */
                    }
                /* ==End Bidder Check== */
                /* ==Start Seller Check== */
                    if (isset($_POST['seller-reg'])) {
                        /* ==Start Errors Array== */
                            $sellerErrors = array();
                        /* ==End Errors Array== */
                        /* ==Start Declare Input Variables== */
                            $sellerUsername = isset($_POST['seller-reg-name']) ? $_POST['seller-reg-name'] : '' ;   // Seller Username.
                            $sellerUserPass = isset($_POST['seller-reg-pass']) ? $_POST['seller-reg-pass'] : '' ;   // Seller Password.
                            $sellerConfPass = isset($_POST['seller-reg-conf']) ? $_POST['seller-reg-conf'] : '' ;   // Seller Confirmation.
                            $sellerUserMail = isset($_POST['seller-reg-mail']) ? $_POST['seller-reg-mail'] : '' ;   // Seller Email.
                            $sellerUserPhon = isset($_POST['seller-reg-phon']) ? $_POST['seller-reg-phon'] : '' ;   // Seller Phone.
                            $sellerUserCoun = isset($_POST['seller-reg-coun']) ? $_POST['seller-reg-coun'] : '' ;   // Seller Country.
                        /* ==End Declare Input Variables== */
                        /* ==Start Username isset Check== */
                            if (isset($sellerUsername)) {
                                /* ==Start Input Filter== */
                                    $sellerUsername = filter_var(
                                        $sellerUsername,
                                        FILTER_SANITIZE_STRING
                                    );
                                /* ==End Input Filter== */
                                /* ==Start Empty Check== */
                                    if (empty($sellerUsername)) {
                                        $sellerErrors[] = 
                                            ':( Oops <strong>Username Mendatory</strong> Field. :(';
                                    }
                                /* ==End Empty Check== */
                                /* ==Start Length Check== */
                                    if (!empty($sellerUsername)  &&  strlen($sellerUsername) < 3) {
                                        $sellerErrors[] = 
                                            ':( Oops <strong>Username</strong> Must Be <strong>Greater Than Two Characters</strong>. :(';
                                    }
                                /* ==End Length Check== */
                            }
                        /* ==End Username isset Check== */
                        /* ==Start Password isset Check== */
                            if (isset($sellerUserPass)  &&  isset($sellerConfPass)) {
                                /* ==Start Length Check== */
                                    if ($sellerUserPass !== '' && strlen($sellerUserPass) < 4) {
                                        $sellerErrors[] = 
                                            ':( Oops Password Min. Length: "<strong>4 Characters</strong>". :(';
                                    } else {
                                        /* ==End Length Check== */
                                        /* ==Start Hash Inputs== */
                                            $sellerUserPass = sha1($sellerUserPass);
                                            $sellerConfPass = sha1($sellerConfPass);
                                        /* ==End Hash Inputs== */
                                        /* ==Start Empty Check== */
                                            if ($sellerUserPass === 'da39a3ee5e6b4b0d3255bfef95601890afd80709') {
                                                $sellerErrors[] = 
                                                    ':( Oops <strong>Password Mendatory</strong> Field. :(';
                                            }
                                        /* ==End Empty Check== */
                                        /* ==Start Not Identical Check== */
                                            if (($sellerUserPass !== 'da39a3ee5e6b4b0d3255bfef95601890afd80709') && ($sellerUserPass !== $sellerConfPass)) {
                                                $sellerErrors[] = 
                                                    ':( Oops <strong>Passwords Not Identical</strong>. :(';
                                            }
                                        /* ==End Not Identical Check== */
                                        /* ==Start Identical Check== */
                                            if (($sellerUserPass !== 'da39a3ee5e6b4b0d3255bfef95601890afd80709') && ($sellerUserPass === $sellerConfPass)) {
                                                /* ==Start Declare Succes Message== */
                                                    $sellerSuccessMsg =
                                                        ':) Congrats <strong>Passwords are Identical</strong>. :)';
                                                /* ==End Declare Success Message== */
                                            }
                                        /* ==End Identical Check== */
                                    }
                            }
                        /* ==End Password isset Check== */
                        /* ==Start Email isset Check== */
                            if (isset($sellerUserMail)) {
                                /* ==Start Declare Filtered Email== */
                                    $sellerUserMail = filter_var(
                                        $sellerUserMail,
                                        FILTER_SANITIZE_EMAIL
                                    );
                                /* ==End Declare Filtered Email== */
                                /* ==Start Empty Check== */
                                    if (empty($sellerUserMail)) {
                                        $sellerErrors[] = 
                                            ':( Oops <strong>Email Mendatory</strong> Field. :(';
                                    }
                                /* ==End Empty Check== */
                                /* ==Start Email Validate Check== */
                                    if (
                                        !
                                        empty($sellerUserMail)
                                        &&
                                        filter_var(
                                            $sellerUserMail,
                                            FILTER_VALIDATE_EMAIL
                                        )
                                        != true
                                    ) {
                                        $sellerErrors[] = ':( Oops <strong>Email Not Valid</strong>. :(';
                                    }
                                /* ==End Email Validate Check== */
                            }
                        /* ==End Email isset Check== */
                        /* ==Start Phone isset Check== */
                            if (isset($sellerUserPhon)) {
                                /* ==Start Empty Check== */
                                    if (empty($sellerUserPhon)) {
                                        $sellerErrors[] = 
                                            ':( Oops <strong>Phone Mendatory</strong> Field. :(';
                                    }
                                /* ==End Empty Check== */
                                /* ==Start Numeric Check== */
                                    if (!empty($sellerUserPhon)) {
                                        // allows plus sign (+) and hyphens (-)
                                        if (!preg_match("/^[+0-9-]+$/", $sellerUserPhon)) {
                                            $sellerErrors[] = 
                                                    ':( Oops <strong>Phone Numbers</strong> Only. :(';
                                        }
                                    }
                                /* ==End Numeric Check== */
                                /* Start Filter Input */
                                $sellerUserPhon = filter_var(
                                    $sellerUserPhon,
                                    FILTER_SANITIZE_NUMBER_INT  // allows plus sign (+), hyphens (-), and dot(.) In Phone Number.
                                );
                                /* ==End Filter Input== */
                                /* ==Start Validation Check== */
                                    $sellerUserPhon = str_replace(
                                        '-',
                                        '',
                                        $sellerUserPhon
                                    );
                                /* ==End Validation Check== */
                                /* ==Start Length Check== */
                                    if (!empty($sellerUserPhon)) {
                                        if (is_numeric($sellerUserPhon) && (strlen($sellerUserPhon) <10 || strlen($sellerUserPhon) >13)) {
                                            $sellerErrors[] = ':( Oops <strong>Number Not Valid</strong>. :(';
                                        }
                                    }
                                /* ==End Length Check== */
                            }
                        /* ==End Phone isset Check== */
						/* ==Start Country isset Check== */
							if (isset($sellerUserCoun)) {
								/* ==Start Empty Check== */
									if (empty($sellerUserCoun)) {
										$sellerErrors[] = 
                                                    ':( Oops <strong>Country Mendatory</strong> Field. :(';
									}
								/* ==End Empty Check== */
								/* ==Start Filter Input== */
									$sellerUserCoun = filter_var(
										$sellerUserCoun,
										FILTER_SANITIZE_NUMBER_INT
									);
								/* ==End Filter Input== */
							}
                        /* ==End Country isset Check== */
                        /* ==Start Errors Empty Check== */
                            if (empty($sellerErrors)) {
                                /* ==Start Existance Statement== */
                                    $chck = checkDB(
                                        'userName',
                                        'users',
                                        $sellerUsername
                                    );
                                /* ==End Existance Statement== */
                                /* ==Start existance Check== */
                                    if ($chck == 1) {
                                        $sellerErrors[] =
                                            ':( Oops "<strong>' .$sellerUsername. '</strong>" Already Registered User Try <strong>Another Username</strong>. :(';
                                        // header('Location: register.php');
                                        /* ==Start Clear Input Value== */
                                            $sellerUsername = '';
                                        /* ==End Clear Input Value== */
                                    } else {
                                        /* ==Start PDO Insert Statement== */
                                            $stmt = $db->prepare('
                                                INSERT INTO
                                                    `users`
                                                        (
                                                            `userName`,
                                                            `phone_num`,
                                                            `password`,
                                                            `email`,
                                                            `country_id`,
                                                            `regStatues`,
                                                            `user_stat`,
                                                            `date`
                                                        )
                                                VAlUES
                                                    (
                                                        :username,
                                                        :userphon,
                                                        :userPassword,
                                                        :userEmail,
                                                        :userCountry,
                                                        0,
                                                        1,
                                                        NOW()
                                                    )
                                                ');
                                            $stmt->execute(
                                                array(
                                                    'username' 		=> $sellerUsername,
                                                    'userphon' 		=> $sellerUserPhon,
                                                    'userPassword' 	=> $sellerUserPass,
                                                    'userEmail' 	=> $sellerUserMail,
                                                    'userCountry' 	=> $sellerUserCoun
                                                )
                                            );
                                        /* ==End PDO Insert Statement== */
                                        /* ==Start Declare Succes Message== */
                                            $sellerSuccessMsg =
                                                ':) Congrats "<strong>' .$sellerUsername. '</strong>" <strong>Registeration Is Done</strong>. :)';
                                        /* ==End Declare Success Message== */
                                        /* ==Start Clear Form Values== */
                                            $sellerUsername = '';
                                            $sellerUserMail = '';
                                            $sellerUserPhon = '';
                                            $sellerUserCoun = '';
                                        /* ==End Clear Form Values== */
                                        // header('Location: register.php');
                                    }
                                    
                                /* ==End existance Check== */
                            }
                        /* ==End Errors Empty Check== */
                    }
                /* ==End Seller Check== */
            }
        /* ==End HTTP Request Check== */
        /* ==Start Page Content== */
?>
<!-- End Initialization File -->

<!-- Start Page Container -->
    <div class="container register">
        <!-- Start Bootstrap Row -->
            <div class="row">
                <!-- Start Grid Col-3 -->
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>You are 30 seconds away from gaining your desired Item!</p>
                        <!-- For Future Work -->
                        <!-- <input
                            type="submit"
                            name=""
                            value="Login"/> -->
                        <a href="login.php">Login</a><br/>
                    </div>
                <!-- End Grid Col-3 -->
                <!-- Start Grid Col-9 -->
                    <div class="col-md-9 register-right">
                        <!-- Start Registeration Nav -->
                            <ul
                                class="nav nav-tabs nav-justified reg-nav"
                                id="myTab"
                                role="tablist">
                                    <!-- Start Nav Item -->
                                        <li class="nav-item">
                                            <a
                                                class="nav-link active"
                                                id="home-tab"
                                                data-toggle="tab"
                                                href="#home"
                                                role="tab"
                                                aria-controls="home"
                                                aria-selected="true">Bidder</a>
                                        </li>
                                    <!-- End Nav Item -->
                                    <!-- Start Nav Item -->
                                        <li class="nav-item">
                                            <a
                                                class="nav-link"
                                                id="profile-tab"
                                                data-toggle="tab"
                                                href="#profile"
                                                role="tab"
                                                aria-controls="profile"
                                                aria-selected="false">Seller</a>
                                        </li>
                                    <!-- End Nav Item -->
                            </ul>
                        <!-- End Registeration Nav -->
                        <!-- Start Content Tab -->
                            <div
                                class="tab-content"
                                id="myTabContent">
                                    <!-- Start Panel Content -->
                                        <div
                                            class="tab-pane fade show active"
                                            id="home"
                                            role="tabpanel"
                                            aria-labelledby="home-tab">
                                                <!-- Start Content Heading -->
                                                    <h3 class="register-heading">Apply as Bidder</h3>
                                                <!-- End Content Heading -->
                                                <!-- Start From Row -->
                                                    <form
                                                        class="row register-form bidder-reg-form"
                                                        action="<?php
                                                            /* ==Start HTTP Request== */
                                                                echo $_SERVER['PHP_SELF'];
                                                            /* ==End HTTP Request== */
                                                        ?>"
                                                        method="POST">
                                                        <!-- Start Grid Col-12 -->
                                                            <div class="col-md-12">
                                                                <!-- Start Info Row -->
                                                                    <div class="row">
                                                                        <!-- Start Grid Col-12 -->
                                                                            <div class="col-md-12">
                                                                                <!-- Start Information Content -->
                                                                                    <div class="reg-info text-center">
                                                                                        <!-- Start Display Info -->
                                                                                        <?php
                                                                                            /* ==Start Errors Check== */
                                                                                                if (!empty($errors)) {
                                                                                                    /* ==Start Errors Loop== */
                                                                                                        foreach ($errors as $error) {
                                                                                            ?><div class="msg error"><?php
                                                                                                            /* ==Start Error Print== */
                                                                                                                echo $error;
                                                                                                            /* ==End Error Print== */
                                                                                            ?></div><?php
                                                                                                        }
                                                                                                    /* ==End Errors Loop== */
                                                                                                }
                                                                                            /* ==End Errors Check== */
                                                                                            /* ==Start Success Check== */
                                                                                                if (isset($successMsg)) {
                                                                                            ?><div class="msg success"><?php
                                                                                                            /* ==Start Success Print== */
                                                                                                                echo $successMsg;
                                                                                                            /* ==End Success Print== */
                                                                                            ?></div><?php
                                                                                                }
                                                                                            /* ==End Success Check== */
                                                                                        ?>
                                                                                        <!-- End Display Info -->
                                                                                    </div>
                                                                                <!-- End Information Content -->
                                                                            </div>
                                                                        <!-- End Grid Col-12 -->
                                                                    </div>
                                                                <!-- End Info Row -->
                                                                <!-- Start Form Username -->
                                                                    <div class="form-group">
                                                                        <input
                                                                            pattern=".{3,}"
                                                                            title="Username Must Be At Least 3 Characters"
                                                                            type="text"
                                                                            class="form-control valid-name"
                                                                            name="bidder-reg-name"
                                                                            id="bidder-reg-name"
                                                                            autocomplete="off"
                                                                            placeholder="Username *"
                                                                            value="<?php
                                                                                /* ==Start isset Check== */
                                                                                    if (isset($bidderUsername)) {
                                                                                        echo $bidderUsername;
                                                                                    }
                                                                                /* ==End isset Check== */
                                                                            ?>"
                                                                            required="required" />
                                                                        <small id="bidder-reg-name" class="form-text text-muted pull-right">
                                                                            <span>
                                                                                <strong>Mandatory</strong>
                                                                                <span> Field: At Least </span>
                                                                                <strong>3 Characters</strong><span>.</span>
                                                                            </span>
                                                                        </small>
                                                                        <!-- <i class="icon-user"></i> -->
                                                                        <!-- Start Front Error Validation -->
                                                                            <div class="alert alert-danger custom-alert">
                                                                                :( <strong>Mandatory</strong> Filed: Username must be At Least <strong>3 characters</strong>. :(
                                                                            </div>
                                                                        <!-- End Front Error Validation -->
                                                                    </div>
                                                                <!-- End Form Username -->
                                                                <!-- Start Form Password -->
                                                                    <div class="form-group">
                                                                        <input
                                                                            minlength="4"
                                                                            type="password"
                                                                            class="form-control valid-pass"
                                                                            name="bidder-reg-pass"
                                                                            id="bidder-reg-pass"
                                                                            autocomplete="new-password"
                                                                            placeholder="Password *"
                                                                            required="required" />
                                                                        <!-- <i class="icon-lock"></i> -->
                                                                        <small id="bidder-reg-name" class="form-text text-muted pull-right">
                                                                            <span>
                                                                                <strong>Mandatory</strong>
                                                                                <span> Field: At Least </span>
                                                                                <strong>4 Characters</strong><span>.</span>
                                                                            </span>
                                                                        </small>
                                                                        <!-- Font Icone -->
                                                                        <!-- Start Front Error Validation -->
                                                                            <div class="alert alert-danger custom-alert">
                                                                                :( <strong>Mandatory</strong> Filed: Password must be At Least <strong>4 characters</strong>. :(
                                                                            </div>
                                                                        <!-- End Front Error Validation -->
                                                                    </div>
                                                                <!-- End Form Password -->
                                                                <!-- Start Form Confirm -->
                                                                    <div class="form-group">
                                                                        <input
                                                                            minlength="4"
                                                                            type="password"
                                                                            class="form-control valid-conf"
                                                                            name="bidder-reg-conf"
                                                                            id="bidder-reg-conf"
                                                                            autocomplete="new-password"
                                                                            placeholder="Confirm Password *"
                                                                            required="required" />
                                                                        <!-- <i class="icon-lock"></i> -->
                                                                        <small id="bidder-reg-name" class="form-text text-muted pull-right">
                                                                            <span>
                                                                                <strong>Mandatory</strong>
                                                                                <span> Field: Must Be </span>
                                                                                <strong>Identical To Password</strong><span>.</span>
                                                                            </span>
                                                                        </small>
                                                                        <!-- Font Icone -->
                                                                        <!-- Start Front Error Validation -->
                                                                            <div class="alert alert-danger custom-alert">
                                                                                :( <strong>Mandatory</strong> Filed: Passwords must be <strong>identical</strong>. :(
                                                                            </div>
                                                                        <!-- End Front Error Validation -->
                                                                    </div>
                                                                <!-- End Form Confirm -->

                                                                <!-- Start Form Gender -->
                                                                    <!-- <div class="form-group">
                                                                        <div class="maxl">
                                                                            <label class="radio inline"> 
                                                                                <input
                                                                                    type="radio"
                                                                                    name="gender"
                                                                                    value="male"
                                                                                    checked />
                                                                                    <span> Male </span> 
                                                                            </label>
                                                                            <label class="radio inline"> 
                                                                                <input
                                                                                    type="radio"
                                                                                    name="gender"
                                                                                    value="female" />
                                                                                    <span>Female </span> 
                                                                            </label>
                                                                        </div>
                                                                    </div> -->
                                                                <!-- End Form Gender -->

                                                            </div>
                                                        <!-- End Grid Col-12 -->
                                                        <!-- Start Grid Col-12 -->
                                                            <div class="col-md-12">
                                                                <!-- Start Form Email -->
                                                                    <div class="form-group">
                                                                        <input
                                                                            type="email"
                                                                            class="form-control valid-mail"
                                                                            name="bidder-reg-mail"
                                                                            id="bidder-reg-mail"
                                                                            autocomplete="off"
                                                                            placeholder="Email *"
                                                                            value="<?php
                                                                                /* ==Start isset Check== */
                                                                                    if (isset($bidderUserMail)) {
                                                                                        echo $bidderUserMail;
                                                                                    }
                                                                                /* ==End isset Check== */
                                                                            ?>"
                                                                            required="required" />
                                                                        <!-- <i class="icon-envelope-open"></i> -->
                                                                        <small id="bidder-reg-name" class="form-text text-muted pull-right">
                                                                            <span>
                                                                                <strong>Mandatory</strong>
                                                                                <span> Field: Must Have </span>
                                                                                <strong>Valid Email</strong><span>.</span>
                                                                            </span>
                                                                        </small>
                                                                        <!-- Font Icone -->
                                                                        <!-- Start Front Error Validation -->
                                                                            <div class="alert alert-danger custom-alert">
                                                                                :( <strong>Mandatory</strong> Filed: Email must be <strong>vaild</strong>. :(
                                                                            </div>
                                                                        <!-- End Front Error Validation -->
                                                                    </div>
                                                                <!-- End Form Email -->
                                                                <!-- Start Form Phone -->
                                                                    <div class="form-group">
                                                                        <input
                                                                            type="tel"
                                                                            minlength="10"
                                                                            maxlength="13"
                                                                            name="bidder-reg-phon"
                                                                            id="bidder-reg-phon"
                                                                            autocomplete="off"
                                                                            class="form-control valid-phon"
                                                                            placeholder="Phone *"
                                                                            value="<?php
                                                                                /* ==Start isset Check== */
                                                                                    if (isset($bidderUserPhon)) {
                                                                                        echo $bidderUserPhon;
                                                                                    }
                                                                                /* ==End isset Check== */
                                                                            ?>"
                                                                            required="required" />
                                                                        <small id="bidder-reg-name" class="form-text text-muted pull-right">
                                                                            <span>
                                                                                <strong>Mandatory</strong>
                                                                                <span> Field: Must Have </span>
                                                                                <strong>Valid Number</strong><span>.</span>
                                                                            </span>
                                                                        </small>
                                                                        <!-- Font Icone -->
                                                                        <!-- Start Front Error Validation -->
                                                                            <div class="alert alert-danger custom-alert">
                                                                                :( <strong>Mandatory</strong> Filed: Phone number must be <strong>valid</strong>. :(
                                                                            </div>
                                                                        <!-- End Front Error Validation -->
                                                                    </div>
                                                                <!-- End Form Phone -->
                                                                <!-- Start Form Address -->
                                                                    <!-- <div class="form-group">
                                                                        <input
                                                                            type="text"
                                                                            class="form-control"
                                                                            placeholder="Address *"
                                                                            value="" />
                                                                    </div> -->
                                                                <!-- End Form Address -->
                                                                <!-- Start Form Country -->
                                                                    <div class="form-group">
                                                                        <select
                                                                            class="form-control valid-coun"
                                                                            name="bidder-reg-coun"
                                                                            id="bidder-reg-coun"
                                                                            required="required">
                                                                                <option
                                                                                    class="hidden"
                                                                                    selected
                                                                                    disabled
                                                                                    value="">Country *</option><?php
                                                                                        /* ==Start Select Countries== */
                                                                                            $countries = extractDB(
                                                                                                '*',
                                                                                                'countries',
                                                                                                '',
                                                                                                '',
                                                                                                'id',
                                                                                                'ASC'
                                                                                            );
                                                                                        /* ==End Select Countries== */
                                                                                        /* ==Start Countries Loop== */
                                                                                            foreach ($countries as $country) {
                                                                                    ?><option
                                                                                            value="<?php
                                                                                                /* ==Start Option Value== */
                                                                                                    echo $country['id'];
                                                                                                /* ==End Option Value== */
                                                                                    ?>"<?php
                                                                                        /* ==Start isset Check== */
                                                                                            if (isset($bidderUserCoun)) {
                                                                                                /* ==Start Identical Check== */
                                                                                                    if ($bidderUserCoun === $country['id']) {
                                                                                                        echo 'selected';
                                                                                                    }
                                                                                                /* ==End Identical Check== */
                                                                                            }
                                                                                        /* ==End isset Check== */
                                                                                    ?>><?php
                                                                                                /* ==Start Option Content== */
                                                                                                    echo $country['nicename'];
                                                                                                /* ==End Option Content== */
                                                                                    ?></option><?php
                                                                                            }
                                                                                        /* ==End Countries Loop== */
                                                                                    ?>
                                                                        </select>
                                                                        <small id="bidder-reg-name" class="form-text text-muted pull-right">
                                                                            <span>
                                                                                <strong>Mandatory</strong>
                                                                                <span> Field: </span>
                                                                                <strong>Country Of Residence</strong><span>.</span>
                                                                            </span>
                                                                        </small>
                                                                        <!-- Font Icone -->
                                                                        <!-- Start Front Error Validation -->
                                                                            <div class="alert alert-danger custom-alert">
                                                                                :( <strong>Mandatory</strong> Filed: Country must be <strong>selected</strong>. :(
                                                                            </div>
                                                                        <!-- End Front Error Validation -->
                                                                    </div>
                                                                <!-- Start Form County -->
                                                                <!-- Start Form Submit -->
                                                                    <input
                                                                        type="submit"
                                                                        class="btnRegister"
                                                                        name="bidder-reg"
                                                                        value="Register" />
                                                                <!-- End Form Submit -->
                                                                <!-- Start Front Error Validation -->
                                                                    <div class="alert alert-danger custom-alert" id="bidder-reg-form-alert">
                                                                        :( Make sure all <strong>inputs</strong> are <strong>filled</strong> as hinted. :(
                                                                    </div>
                                                                <!-- End Front Error Validation -->
                                                            </div>
                                                        <!-- End Grid Col-12 -->
                                                    </form>
                                                <!-- End Form Row -->
                                            </div>
                                        <!-- End Panel Content -->
                                    <!-- Start Panel Content -->
                                        <div
                                            class="tab-pane fade show"
                                            id="profile"
                                            role="tabpanel"
                                            aria-labelledby="profile-tab">
                                                <!-- Start Content Heading -->
                                                    <h3  class="register-heading">Apply as Seller</h3>
                                                <!-- End Content Heading -->
                                                <!-- Start Form Row -->
                                                <!-- <div class="row register-form"> -->
                                                    <form
                                                        class="row register-form seller-reg-form"
                                                        action="<?php
                                                            /* ==Start HTTP Request== */
                                                                $_SERVER['PHP_SELF']
                                                            /* ==End HTTP Request== */
                                                        ?>"
                                                        method="POST">
                                                        <!-- Start Grid Col-12 -->
                                                            <div class="col-md-12">
                                                                <!-- Start Info Row -->
                                                                    <div class="row">
                                                                        <!-- Start Grid Col-12 -->
                                                                            <div class="col-md-12">
                                                                                <!-- Start Information Content -->
                                                                                    <div class="reg-info text-center">
                                                                                        <!-- Start Display Info -->
                                                                                            <?php
                                                                                                    /* ==Start Errors Check== */
                                                                                                        if (!empty($sellerErrors)) {
                                                                                                            /* ==Start Errors Loop== */
                                                                                                                foreach ($sellerErrors as $error) {
                                                                                                ?><div class="msg error"><?php
                                                                                                                /* ==Start Error Print== */
                                                                                                                    echo $error;
                                                                                                                /* ==End Error Print== */
                                                                                                ?></div><?php
                                                                                                                }
                                                                                                            /* ==End Errors Loop== */
                                                                                                        }
                                                                                                    /* ==End Errors Check== */
                                                                                                    /* ==Start Success Check== */
                                                                                                        if (isset($sellerSuccessMsg)) {
                                                                                                ?><div class="msg success"><?php
                                                                                                                /* ==Start Success Print== */
                                                                                                                    echo $sellerSuccessMsg;
                                                                                                                /* ==End Success Print== */
                                                                                                ?></div><?php
                                                                                                        }
                                                                                                    /* ==End Success Check== */
                                                                                            ?>
                                                                                        <!-- End Display Info -->
                                                                                    </div>
                                                                                <!-- End Information Content -->
                                                                            </div>
                                                                        <!-- End Grid Col-12 -->
                                                                    </div>
                                                                <!-- End Info Row -->
                                                                <!-- Start Form Username -->
                                                                    <div class="form-group">
                                                                        <input
                                                                            pattern=".{3,}"
                                                                            title="Name Must Be At Least 3 Characters"
                                                                            type="text"
                                                                            class="form-control valid-name"
                                                                            name="seller-reg-name"
                                                                            id="seller-reg-name"
                                                                            autocomplete="off"
                                                                            placeholder="Username *"
                                                                            value="<?php
                                                                                /* ==Start isset Check== */
                                                                                    if (isset($sellerUsername)) {
                                                                                        echo $sellerUsername;
                                                                                    }
                                                                                /* ==End isset Check== */
                                                                            ?>"
                                                                            required="required" />
                                                                        <!-- <i class="icon-user"></i> -->
                                                                        <small id="seller-reg-name" class="form-text text-muted pull-right">
                                                                            <span>
                                                                                <strong>Mandatory</strong>
                                                                                <span> Field At Least </span>
                                                                                <strong>3 Characters</strong><span>.</span>
                                                                            </span>
                                                                        </small>
                                                                        <!-- Font Icon -->
                                                                        <!-- Start Front Error Validation -->
                                                                            <div class="alert alert-danger custom-alert">
                                                                                :( <strong>Mandatory</strong> Filed: Username must be At Least <strong>3 characters</strong>. :(
                                                                            </div>
                                                                        <!-- End Front Error Validation -->
                                                                    </div>
                                                                <!-- End Form Username -->
                                                                <!-- Start Form Email -->
                                                                    <div class="form-group">
                                                                        <input
                                                                            type="email"
                                                                            class="form-control valid-mail"
                                                                            name="seller-reg-mail"
                                                                            id="seller-reg-mail"
                                                                            autocomplete="off"
                                                                            placeholder="Email *"
                                                                            value="<?php
                                                                                /* ==Start isset Check== */
                                                                                    if (isset($sellerUserMail)) {
                                                                                        echo $sellerUserMail;
                                                                                    }
                                                                                /* ==End isset Check== */
                                                                            ?>"
                                                                            required="required" />
                                                                        <!-- <i class="icon-envelope-open"></i> -->
                                                                        <small id="seller-reg-name" class="form-text text-muted pull-right">
                                                                            <span>
                                                                                <strong>Mandatory</strong>
                                                                                <span> Field Must Have </span>
                                                                                <strong>Valid Email</strong><span>.</span>
                                                                            </span>
                                                                        </small>
                                                                        <!-- Font Icone -->
                                                                        <!-- Start Front Error Validation -->
                                                                            <div class="alert alert-danger custom-alert">
                                                                                :( <strong>Mandatory</strong> Filed: Email must be <strong>vaild</strong>. :(
                                                                            </div>
                                                                        <!-- End Front Error Validation -->
                                                                    </div>
                                                                <!-- End Form Email -->
                                                                <!-- Start Form Phone -->
                                                                    <div class="form-group">
                                                                        <input
                                                                            type="tel"
                                                                            minlength="10"
                                                                            maxlength="13"
                                                                            class="form-control valid-phon"
                                                                            name="seller-reg-phon"
                                                                            id="seller-reg-phon"
                                                                            autocomplete="off"
                                                                            placeholder="Phone *"
                                                                            value="<?php
                                                                                /* ==Start isset Check== */
                                                                                    if (isset($sellerUserPhon)) {
                                                                                        echo $sellerUserPhon;
                                                                                    }
                                                                                /* ==End isset Check== */
                                                                            ?>"
                                                                            required="required" />
                                                                        <small id="seller-reg-name" class="form-text text-muted pull-right">
                                                                            <span>
                                                                                <strong>Mandatory</strong>
                                                                                <span> Field Must Have </span>
                                                                                <strong>Valid Number</strong><span>.</span>
                                                                            </span>
                                                                        </small>
                                                                        <!-- Font Icone -->
                                                                        <!-- Start Front Error Validation -->
                                                                            <div class="alert alert-danger custom-alert">
                                                                                :( <strong>Mandatory</strong> Filed: Phone number must be <strong>valid</strong>. :(
                                                                            </div>
                                                                        <!-- End Front Error Validation -->
                                                                    </div>
                                                                <!-- End Form Phone -->
                                                            </div>
                                                        <!-- End Grid Col-12 -->
                                                        <!-- Start Grid Col-12 -->
                                                            <div class="col-md-12">
                                                                <!-- Start Form Password -->
                                                                    <div class="form-group">
                                                                        <input
                                                                            minlength="4"
                                                                            type="password"
                                                                            class="form-control valid-seller-pass"
                                                                            name="seller-reg-pass"
                                                                            id="seller-reg-pass"
                                                                            autocomplete="new-password"
                                                                            placeholder="Password *"
                                                                            required="required" />
                                                                        <!-- <i class="icon-lock"></i> -->
                                                                        <small id="seller-reg-name" class="form-text text-muted pull-right">
                                                                            <span>
                                                                                <strong>Mandatory</strong>
                                                                                <span> Field At Least </span>
                                                                                <strong>4 Characters</strong><span>.</span>
                                                                            </span>
                                                                        </small>
                                                                        <!-- Font Icone -->
                                                                        <!-- Start Front Error Validation -->
                                                                            <div class="alert alert-danger custom-alert">
                                                                                :( <strong>Mandatory</strong> Filed: Password must be At Least <strong>4 characters</strong>. :(
                                                                            </div>
                                                                        <!-- End Front Error Validation -->
                                                                    </div>
                                                                <!-- End Form Password -->
                                                                <!-- Start Form Confirm -->
                                                                    <div class="form-group">
                                                                        <input
                                                                            minlength="4"
                                                                            type="password"
                                                                            class="form-control  valid-seller-conf"
                                                                            name="seller-reg-conf"
                                                                            id="seller-reg-conf"
                                                                            autocomplete="new-password"
                                                                            placeholder="Confirm Password *"
                                                                            required="required" />
                                                                        <!-- <i class="icon-lock"></i> -->
                                                                        <small id="seller-reg-name" class="form-text text-muted pull-right">
                                                                            <span>
                                                                                <strong>Mandatory</strong>
                                                                                <span> Field Must Be </span>
                                                                                <strong>Identical To Password</strong><span>.</span>
                                                                            </span>
                                                                        </small>
                                                                        <!-- Font Icone -->
                                                                        <!-- Start Front Error Validation -->
                                                                            <div class="alert alert-danger custom-alert">
                                                                                :( <strong>Mandatory</strong> Filed: Passwords must be <strong>identical</strong>. :(
                                                                            </div>
                                                                        <!-- End Front Error Validation -->
                                                                    </div>
                                                                <!-- End Form Confirm -->
                                                                <!-- Start Form Country -->
                                                                    <div class="form-group">
                                                                        <select
                                                                            class="form-control valid-coun"
                                                                            name="seller-reg-coun"
                                                                            id="seller-reg-coun"
                                                                            required="required">
                                                                                <option
                                                                                    class="hidden"
                                                                                    selected
                                                                                    disabled
                                                                                    value="">Country *</option><?php
                                                                                        /* ==Start Select Countries== */
                                                                                            $countries = extractDB(
                                                                                                '*',
                                                                                                'countries',
                                                                                                '',
                                                                                                '',
                                                                                                'id',
                                                                                                'ASC'
                                                                                            );
                                                                                        /* ==End Select Countries== */
                                                                                        /* ==Start Countries Loop== */
                                                                                            foreach ($countries as $country) {
                                                                                    ?><option
                                                                                            value="<?php
                                                                                                /* ==Start Option Value== */
                                                                                                    echo $country['id'];
                                                                                                /* ==End Option Value== */
                                                                                    ?>"<?php
                                                                                        /* ==Start isset Check== */
                                                                                            if (isset($sellerUserCoun)) {
                                                                                                /* ==Start Identical Check== */
                                                                                                    if ($sellerUserCoun === $country['id']) {
                                                                                                        echo 'selected';
                                                                                                    }
                                                                                                /* ==End Identical Check== */
                                                                                            }
                                                                                        /* ==End isset Check== */
                                                                                    ?>><?php
                                                                                                /* ==Start Option Content== */
                                                                                                    echo $country['nicename'];
                                                                                                /* ==End Option Content== */
                                                                                    ?></option><?php
                                                                                            }
                                                                                        /* ==End Countries Loop== */
                                                                                    ?>
                                                                        </select>
                                                                        <small id="seller-reg-name" class="form-text text-muted pull-right">
                                                                            <span>
                                                                                <strong>Mandatory</strong>
                                                                                <span> Field </span>
                                                                                <strong>Country Of Residence</strong><span>.</span>
                                                                            </span>
                                                                        </small>
                                                                        <!-- Font Icone -->
                                                                        <!-- Start Front Error Validation -->
                                                                            <div class="alert alert-danger custom-alert">
                                                                                :( <strong>Mandatory</strong> Filed: Country must be <strong>selected</strong>. :(
                                                                            </div>
                                                                        <!-- End Front Error Validation -->
                                                                    </div>
                                                                <!-- End Form County -->
                                                                <!-- Start Form Submit -->
                                                                    <input
                                                                        type="submit"
                                                                        class="btnRegister"
                                                                        name="seller-reg"
                                                                        id="seller-reg"
                                                                        value="Register" />
                                                                <!-- End Form Submit -->
                                                                <!-- Start Front Error Validation -->
                                                                    <div class="alert alert-danger custom-alert" id="seller-reg-form-alert">
                                                                        :( Make sure all <strong>inputs</strong> are <strong>filled</strong> as hinted. :(
                                                                    </div>
                                                                <!-- End Front Error Validation -->
                                                            </div>
                                                        <!-- End Grid Col-12 -->
                                                    </form>
                                                <!-- End Form Row -->
                                            </div>
                                        <!-- End Panel Content -->
                                </div>
                            <!-- End Content Tab -->
                    </div>
                <!-- End Grid Col-9 -->
            </div>
        <!-- End Bootstrap Row -->
    </div>
<!-- End Page Container -->



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