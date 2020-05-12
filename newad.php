<?php
    /* ==Start Ouput Buffer== */
        ob_start();
        /* ==Start Open Session== */
            session_start();
        /* ==End Open Session== */
        /* ==Start Declare Page Title== */
            $pageTitle = 'Create Ad';
        /* ==End Declare Page Title== */
        /* ==Start Include Initialization File== */
            include_once 'ini.php';
        /* ==End Include Initialization File== */
        /* ==Start Session Check== */
            if (isset($_SESSION['SELLERSESSION'])) {
                /* ==Start HTTP Request== */
                    if ($_SERVER['REQUEST_METHOD']  == 'POST') {
                        /* ==Start Declare Form Errors Array== */
                            $formErrors = array();
                        /* ==End Declare Form Errors Array== */
                        /* ==Start Declare Form Tags Array== */
                            // $tags = array();
                        /* ==End Declare Form Tags Array== */
                        /* ==Start Declare Form Images Array== */
                            $imgNames = array();
                        /* ==End Declare Form Images Array== */
                        /* ==Start Declare Form Inputs== */
                            $itemName   = isset($_POST['item-name']) ? $_POST['item-name'] : '';          // Item Name Varaible.
                            $itemPric   = isset($_POST['item-pric']) ? $_POST['item-pric'] : '';          // Item Buy Now Price Varaible.
                            $itemDesc   = isset($_POST['item-desc']) ? $_POST['item-desc'] : '';          // Item Description Varaible.
                            $itemCate   = isset($_POST['item-cate']) ? $_POST['item-cate'] : '';          // Item Category Varaible.
                            $itemStat   = isset($_POST['item-stat']) ? $_POST['item-stat'] : '';          // Item Status Varaible.
                            $itemMinBid = isset($_POST['item-min-bid']) ? $_POST['item-min-bid'] : '';    // Item Minimum Bidding Varaible.

                            $itemImgs    = isset($_FILES['item-imgs']) ? $_FILES['item-imgs'] : '';         // Item File Image Varaible.
                            
                            $itemMade   = isset($_POST['item-made']) ? $_POST['item-made'] : '';          // Item Manufacture Country Varaible.
                            $itemTags   = isset($_POST['item-tag']) ? $_POST['item-tag'] : '';            // Item Tags Varaible.
                        /* ==End Declare Form Inputs== */
                        /* ==Start Name Input Check== */
                            if (isset($itemName)) {
                                /* ==Start Filter Item Name== */
                                    $filtItemName = filter_var(
                                        $itemName,
                                        FILTER_SANITIZE_STRING
                                    );
                                /* ==End Filter Item Name== */
                                /* ==Start Empty Check== */
                                    if (empty($filtItemName)) {
                                        $formErrors[] =
                                            ':( Oops Item <strong>Name Is Mendatory</strong> It Must Be Filled In. :(';
                                    }
                                /* ==End Empty Check== */
                                /* ==Start Length Check== */
                                    if (!empty($filtItemName) && strlen($filtItemName) < 3) {
                                        $formErrors[] =
                                            ':( Oops Item <strong>Name</strong> Must Be <strong>Greater Than Two Characters</strong>. :(';
                                    }
                                /* ==End Length Check== */
                            }
                        /* ==End Name Input Check== */
                        /* ==Start Price Input Check== */
                            if (isset($itemPric)) {
                                /* ==Start Min Bid String Check== */
                                    if (!(empty($itemPric)) && !(is_numeric($itemPric))) {
                                        $formErrors[] =
                                            ':( Oops Item <strong>Price Must</strong> Be Only Filled With <Strong>Numbers</Strong>. :(';
                                    }
                                /* ==End Min Bid String Check == */
                                /* ==Start Filter Item Price== */
                                    else {
                                        $filtItemPric = filter_var(
                                            $itemPric,
                                            FILTER_SANITIZE_NUMBER_FLOAT,
                                            FILTER_FLAG_ALLOW_FRACTION
                                        );
                                    }
                                /* ==End Filter Item Price== */
                            }
                        /* ==End Price Input Check== */
                        /* ==Start Desc Input Check== */
                            if (isset($itemDesc)) {
                                /* ==Start Filter Item Desc== */
                                    $filtItemDesc = filter_var(
                                        $itemDesc,
                                        FILTER_SANITIZE_STRING
                                    );
                                /* ==End Filter Item Desc== */
                                /* ==Start Empty Check== */
                                    if (empty($filtItemDesc)) {
                                        $formErrors[] =
                                            ':( Oops Item <strong>Description Is Mendatory</strong> It Must Be Filled In. :(';
                                    }
                            /* ==End Empty Check== */
                            /* ==Start Length Check== */
                                if (!empty($filtItemDesc) && strlen($filtItemDesc) <= 11) {
                                    $formErrors[] =
                                        ':( Oops Item <strong>Description</strong> Must Be <strong>Greater Than Ten Characters</strong>. :(';
                                }
                                if (!empty($filtItemDesc) && strlen($filtItemDesc) > 50) {
                                    $formErrors[] =
                                        ':( Oops Item <strong>Description</strong> Must Be <strong>Less Than Fifty Characters</strong>. :(';
                                }
                            /* ==End Length Check== */
                            }
                        /* ==End Desc Input Check== */
                        /* ==Start Cate Input Check== */
                            if (isset($itemCate)) {
                                /* ==Start Filter Item Cate== */
                                    $filtItemCate = filter_var(
                                        $itemCate,
                                        FILTER_SANITIZE_NUMBER_INT
                                    );
                                /* ==End Filter Item Cate== */
                                /* ==Start Empty Check== */
                                    if (empty($filtItemCate)) {
                                        $formErrors[] =
                                            ':( Oops Item <strong>Category Is Mendatory</strong> It Must Be Selected. :(';
                                    }
                                /* ==End Empty Check== */
                            }
                        /* ==End Cate Input Check== */
                        /* ==Start Stat Input Check== */
                            if (isset($itemStat)) {
                                /* ==Start Filter Item Stat== */
                                    $filtItemStat = filter_var(
                                        $itemStat,
                                        FILTER_SANITIZE_NUMBER_INT
                                    );
                                /* ==End Filter Item Stat== */
                                /* ==Start Empty Check== */
                                    if (empty($filtItemStat)) {
                                        $formErrors[] =
                                            ':( Oops Item <strong>Status Is Mendatory</strong> It Must Be Selected. :(';
                                    }
                            /* ==End Empty Check== */
                            }
                        /* ==End Stat Input Check== */
                        /* ==Start Min Bid Input Check== */
                            if (isset($itemMinBid)) {
                                /* ==Start Empty Check== */
                                    if (empty($itemMinBid)) {
                                        $formErrors[] =
                                            ':( Oops Item <strong>Minimum Bid Is Mendatory</strong>. :(';
                                    }
                                /* ==End Empty Check== */
                                /* ==Start Min Bid String Check== */
                                    else if (!(empty($itemMinBid)) && !(is_numeric($itemMinBid))) {
                                        $formErrors[] =
                                            ':( Oops Item <strong>Minimum Bid Must</strong> Be Only Filled With <Strong>Numbers</Strong>. :(';
                                    }
                                /* ==End Min Bid String Check == */
                                /* ==Start Filter Item MinBid== */
                                    else {
                                        $filtItemMinBid = filter_var(
                                            $itemMinBid,
                                            FILTER_SANITIZE_NUMBER_FLOAT,
                                            FILTER_FLAG_ALLOW_FRACTION
                                        );
                                    }
                                /* ==End Filter Item MinBid== */
                            }
                        /* ==End Min Bid Input Check== */
                        /* ==Start Made IN Input Check== */
                            if (isset($itemMade)) {
                                /* ==Start Filter Item Made== */
                                    $filtItemMade = filter_var(
                                        $itemMade,
                                        FILTER_SANITIZE_STRING
                                    );
                                /* ==End Filter Item Made== */
                                /* ==Start Empty Check== */
                                    if (empty($filtItemMade)) {
                                        $formErrors[] =
                                            ':( Oops Item <strong>Country Is Mendatory</strong> It Must Be Filled In. :(';
                                    }
                                /* ==End Empty Check== */
                                /* ==Start Length Check== */
                                    if (!empty($filtItemMade) && strlen($filtItemMade) < 2) {
                                        $formErrors[] =
                                            ':( Oops Item <strong>Country</strong> Must Be <strong>At Least Two Characters</strong>. :(';
                                    }
                                /* ==End Length Check== */
                            }
                        /* ==End Made IN Input Check== */
                        /* ==Start Images Check== */
                            if (isset($itemImgs)) {
                                /* ==Start Declare Images Variables== */
                                    $itemImgNames    = $itemImgs['name'];      // Item File Image Name Varaible.
                                    $itemImgSizes    = $itemImgs['size'];      // Item File Image Size Varaible.
                                    $itemImgErrors   = $itemImgs['error'];     // Item File Image Error Varaible.
                                    $itemImgTmpNames = $itemImgs['tmp_name'];  // Item File Image Temporary Name Varaible.
                                    $itemImgTypes    = $itemImgs['type'];      // Item File Image Type Varaible.
                                /* ==End Declare Images Variables== */
                                /* ==Start Image Extensions Configuration== */
                                    $itemImgExtensions = array(
                                        'jpeg',
                                        'jpg',
                                        'png',
                                        'gif'
                                    );
                                /* ==End Image Extensions Configuration== */
                                /* ==Start Empty Upload Check== */
                                    if ($itemImgErrors[0] == 4) {
                                        $formErrors[] =
                                        ':( Oops Item <strong>Photos Is Mendatory</strong> Field. :(';
                                    } else {
                                        /* ==Start Count Uploaded Images== */
                                        $imgsCount = count($itemImgNames);
                                        /* ==End Count Uploaded Images== */
                                        /* ==Start Minimum Count Check== */
                                            if ($imgsCount < 3) {
                                                $formErrors[] =
                                                ':( Oops <strong>Minimum three Photos</strong> Must Be Uploaded. :(';
                                            }
                                        /* ==End Minimum Count Check== */
                                        /* ==Start Uploaded Images Loop== */
                                            for ($i=0; $i < $imgsCount; $i++) {
                                                // There is Error Here While Reloading After The Previous Error Mess. Is Appeared (count<3).
                                                // uninitialized string offset 0 php
                                                /* ==Start Extract Files Extensions== */
                                                    $splitExtension[$i] = explode('.', $itemImgNames[$i]);
                                                    $extractExtension[$i]= end($splitExtension[$i]);
                                                    $fileExtension[$i] = strtolower($extractExtension[$i]);
                                                /* ==End Extract Files Extensions== */
                                                /* ==Start DB Random Name== */
                                                    $imgRandName[$i] = rand(
                                                        0,
                                                        10000000
                                                    ). '_' .$itemImgNames[$i];
                                                /* ==End DB Random Name== */
                                                /* ==Start File Extension Check== */
                                                    if (
                                                        !in_array(
                                                            $fileExtension[$i],
                                                            $itemImgExtensions
                                                        )
                                                    ) {
                                                        $formErrors[] =
                                                        ':( Oops Allowed Extensions Are (<strong>jpeg, jpg, gif, and png</strong>) :(<br/>Uploaded File Number: "<strong>' .($i+1). '</strong>".<br />File Name: "<strong>' .$itemImgNames[$i]. '</strong>" Has "<strong>Invalid Extension</strong>".';
                                                    }
                                                /* ==End File Extension Check== */
                                                /* ==Start Size Check== */
                                                    if ($itemImgSizes[$i] > 4194304) {
                                                        $formErrors[] =
                                                            ':( Oops Maximum Size Must Be Less Than / Equal To <strong>4MB</strong>. :(<br />Uploaded File Number: "<strong>' .($i+1). '</strong>".<br />File Name: "<strong>' .$itemImgNames[$i]. '</strong>" Has Size Of: "<strong>' .readableBytes($itemImgSizes[$i]). '</strong>".';
                                                    }
                                                /* ==End Size Check== */
                                                /* ==Start Empty Errors Check== */
                                                    if (empty($formErrors)) {
                                                        /* ==Start File Upload Function== */
                                                            move_uploaded_file(
                                                                $itemImgTmpNames[$i],
                                                                getcwd(). '\data\uploads\\' .$imgRandName[$i]
                                                            );
                                                        /* ==End File Upload Function== */
                                                        /* ==Start Success Message== */
                                                        $successMsg = ':) Congrats Totally "<strong>' .$imgsCount. '</strong>" Photos Has Just Been Uploaded Successfully. :)';
                                                        /* ==End Success Message== */
                                                        /* ==Start Insert Random Names Into DB Array== */
                                                        $imgNames[] = $imgRandName[$i];
                                                        /* ==End Insert Random Names Into DB Array== */
                                                    }
                                                /* ==End Empty Errors Check== */
                                            }
                                        /* ==End Uploaded Images Loop== */
                                    }
                                /* ==End Empty Upload Check== */
                            }
                        /* ==End Images Check== */
                        /* ==Start Tags Input Check== */
                            if (isset($itemTags) && !empty($itemTags)) {
                                /* ==Start Filter Item Tag== */
                                    $filtItemTags = filter_var(
                                        $itemTags,
                                        FILTER_SANITIZE_STRING
                                    );
                                /* ==End Filter Item Tag== */
                                /* ==Start Empty Check== */
                                    if (!empty($filtItemTags)) {
                                        /* ==Start Declare Tag Variables== */
                                        $tokens = str_replace(' ', '', $filtItemTags);  // Remove Spaces.
                                        $tags = explode(',', $tokens);                  // Explode Into Array.
                                        $tags = array_unique($tags);                    // Remove Duplications.
                                        /* ==Start Tags Loop== */
                                            foreach ($tags as $tag) {
                                                /* ==Start Regular Expression Check== */
                                                    if (preg_match('/\^[0-9]\$/',$tag) === 1) {
                                                        $formErrors[] = ':( <strong>Oops Invalid Tag Input Values</strong>. :(';
                                                    }
                                                    else {
                                                        $tagsOK = implode(', ', $tags);
                                                    }
                                                /* ==End Regular Expression Check== */
                                            }
                                        /* ==End Tags Loop== */
                                    }
                                /* ==End Empty Check== */
                            }
                        /* ==End Tags Input Check== */
                        /* ==Start Convert DB File Names To String== */
                            $adImages = implode(
                                ', ',
                                $imgNames
                            );
                            // $tagsOK = implode(', ', $tags);
                        /* ==End Convert DB File Names To String== */
                        /* ==Start Form Errors Check== */
                            if (empty($formErrors)) {
                                /* ==Start DB Insert Statement== */
                                    $stmt = $db->prepare('
                                    INSERT INTO
                                        `items`
                                            (
                                                `Name`,
                                                `Desciription`,
                                                `Price`,
                                                `minBid`,
                                                `Country_Made`,
                                                `Statues`,
                                                `Add_Date`,
                                                `approve`,
                                                `tags`,
                                                `Image`,
                                                `Memeber_ID`,
                                                `Cat_ID`
                                            )
                                        VAlUES
                                            (
                                                :itemname,
                                                :itemdesc,
                                                :itempric,
                                                :itemminbid,
                                                :itemcoun,
                                                :itemstat,
                                                NOW(),
                                                0,
                                                :itemtags,
                                                :itemimages,
                                                :userid,
                                                :cateid
                                            )
                                    ');
                                    $stmt->execute(
                                        array(
                                            'itemname' 	=> $filtItemName,
                                            'itemdesc' 	=> $filtItemDesc,
                                            'itempric' 	=> $filtItemPric,
                                            'itemminbid'=> $filtItemMinBid,
                                            'itemcoun' 	=> $filtItemMade,
                                            'itemstat' 	=> $filtItemStat,
                                            'itemtags' 	=> $tagsOK,
                                            'itemimages'=> $adImages,
                                            'userid' 	=> $_SESSION['SELLERID'],
                                            'cateid' 	=> $filtItemCate
                                        )
                                    );
                                /* ==End DB Insert Statement== */
                            }                            
                        /* ==End Form Errors Check== */
                    }
                /* ==End HTTP Request== */
                /* ==Start Page Content== */
?>
<!-- Start Wrapper Section -->
    <div id="wrapper"><?php
                            /* ==Start Include Sidebar File== */
                                include $tpl . 'sidebar.php';
                            /* ==End Include Sidebar File== */
                            /* ==Start Include Top Navbar File== */
                                include $tpl . 'topnav.php';
                            /* ==End Include Top Navbar File== */
                        ?>
        <!-- Start Wrapper Content -->
            <div class="content-wrapper">
                <!-- Start Fluid Container -->
                    <div class="container-fluid">
                        <!-- Start Page Heading -->
                            <div class="head-style">
                                <h1 class="text-center">Create New Ad</h1>
                            </div>
                        <!-- Start Success Message Section -->
                            <?php
                                    /* ==Start Display Success Message== */
                                    if (isset($successMsg)) {
                                ?>
                                <div class="alert alert-success text-center"><?php
                                        echo $successMsg;
                                    }
                                /* ==End Display Success Message== */
                                                                                ?>
                            </div>
                        <!-- End Success Message Section -->
                        <!-- End Page Heading -->
                        <!-- Start Ad Section -->
                            <div class="ad info-block">
                                <!-- Start Bootstrap Panel -->
                                    <div class="card card-primary crd-ovr">
                                        <!-- Start Panel Heading -->
                                            <div class="card-heading info-heading">Item Details</div>
                                        <!-- End Panel Heading -->
                                        <!-- Start Panel Body -->
                                            <div class="card-body"><?php
                                                                        /* ==Start Empty Errors Check== */
                                                                            if (!empty($formErrors)) {
                                                                                /* ==Start Errors Loop== */
                                                                                    foreach ($formErrors as $error) {
                                                                        ?>
                                                <!-- Start Errors Alert -->
                                                    <div class="alert alert-danger text-center"><?php
                                                                                                    /* ==Start Display Error== */
                                                                                                        echo $error;
                                                                                                    /* ==End Display Error== */
                                                                                                    ?>
                                                    </div>
                                                <!-- End Errors Alert -->
                                                                    <?php
                                                                                    }
                                                                                /* ==End Errors Loop== */
                                                                            }
                                                                        /* ==End Empty Errors Check== */
                                                                    ?>
                                                <!-- Start Item Form -->
                                                    <form
                                                        class="item-form"
                                                        action="<?php
                                                                    /* ==Start Server Request== */
                                                                        echo $_SERVER['PHP_SELF'] ;
                                                                    /* ==End Server Request== */
                                                                ?>"
                                                        method="post"
                                                        enctype="multipart/form-data">
                                                        <!-- Start Form Row -->
                                                            <div class="form-row">
                                                                <!-- Start Name Group Col -->
                                                                    <div class="form-group col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                                                        <label for="item-name">Name</label>
                                                                        <input
                                                                            pattern=".{3,}"
                                                                            title="Name Must Be At Least 3 Characters"
                                                                            type="text"
                                                                            class="form-control form-control-lg valid-item-name"
                                                                            name="item-name"
                                                                            id="item-name"
                                                                            autocomplete="off"
                                                                            required="required"
                                                                            value="<?php
                                                                                        /* ==Start Initialization Check== */
                                                                                            if (isset($filtItemName) && !empty($filtItemName)) {
                                                                                                /* ==Start Display Written Name== */
                                                                                                    echo $filtItemName;
                                                                                                /* ==End Display Written Name== */
                                                                                            }
                                                                                        /* ==End Initialization Check== */
                                                                                    ?>"
                                                                            placeholder="Type Item Name..." />
                                                                            <small id="item-name" class="form-text text-muted text-center">
                                                                                <span><strong>Mandatory</strong> Field Must Have At Least <strong>3 Characters</strong>.</span>
                                                                            </small>
                                                                            <!-- Start Front Error Validation -->
                                                                                <div class="alert alert-danger text-center custom-alert" id="">
                                                                                    :( Oops <strong>Manadatory</strong> field: Item <strong>Name</strong> Must Be <strong>At Least 3 Characters</strong>. :(
                                                                                </div>
                                                                            <!-- End Front Error Validation -->
                                                                    </div>
                                                                <!-- End Name Group Col -->
                                                                <!-- Start Price Group Col -->
                                                                    <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                        <label for="item-pric">Price</label>
                                                                        <input
                                                                            type="Number"
                                                                            min="0"
                                                                            class="form-control form-control-lg valid-item-pric"
                                                                            name="item-pric"
                                                                            id="item-pric"
                                                                            autocomplete="off"
                                                                            value="<?php
                                                                                        /* ==Start Initialization Check== */
                                                                                            if (isset($filtItemPric) && !empty($filtItemPric)) {
                                                                                                /* ==Start Display Written Price== */
                                                                                                    echo $filtItemPric;
                                                                                                /* ==End Display Written Price== */
                                                                                            }
                                                                                        /* ==End Initialization Check== */
                                                                                    ?>"
                                                                            placeholder="Item [Buy Now] Price In Dollars..." />
                                                                            <small id="item-pric" class="form-text text-muted text-center">
                                                                                <span><strong>Optional</strong> Field For <strong>Buy Now</strong> Feature.</span>
                                                                            </small>
                                                                            <!-- Start Front Error Validation -->
                                                                                <div class="alert alert-danger text-center custom-alert" id="">
                                                                                    :( Oops Item <strong>Price</strong>: <strong>Only Positive Numbers</strong>. :(
                                                                                </div>
                                                                            <!-- End Front Error Validation -->
                                                                    </div>
                                                                <!-- End Price Group Col -->
                                                            </div>
                                                        <!-- End Form Row -->
                                                        <!-- Start Description Group -->
                                                            <div class="form-group">
                                                                <label for="item-desc">Description</label>
                                                                <textarea
                                                                    pattern=".{10,50}"
                                                                    title="Description Must Be At Least 10 But Not Greater Than 50 Characters"
                                                                    name="item-desc"
                                                                    class="form-control form-control-lg valid-item-desc"
                                                                    id="item-desc"
                                                                    autocomplete="off"
                                                                    required="required"
                                                                    cols=""
                                                                    rows=""
                                                                    placeholder="Type Brief Description Includes Main Features..."><?php
                                                                                                                                        /* ==Start Initialization Check== */
                                                                                                                                            if (isset($filtItemDesc) && !empty($filtItemDesc)) {
                                                                                                                                                /* ==Start Display Written Description== */
                                                                                                                                                    echo $filtItemDesc;
                                                                                                                                                /* ==End Display Written Description== */
                                                                                                                                            }
                                                                                                                                        /* ==End Initialization Check== */
                                                                                                                                    ?></textarea>
                                                                    <small id="item-desc" class="form-text text-muted text-center">
                                                                        <span><strong>Mandatory</strong> Field With Minimum <strong>10 Characters</strong> & Maximum <strong>50 Characters</strong>.</span>
                                                                    </small>
                                                                    <!-- Start Front Error Validation -->
                                                                        <div class="alert alert-danger text-center custom-alert" id="">
                                                                            :( Oops <strong>Manadatory</strong> field: Item <strong>Description</strong> Must Be <strong>At Least 10 To 50 Characters</strong>. :(
                                                                        </div>
                                                                    <!-- End Front Error Validation -->
                                                            </div>
                                                        <!-- End Description Group -->
                                                        <!-- Start Form Row -->
                                                            <div class="form-row">
                                                                <!-- Start Category Group Col -->
                                                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                        <label for="item-cate">Category</label>
                                                                        <select
                                                                            name="item-cate"
                                                                            id="item-cate"
                                                                            class="form-control form-control-lg valid-item-cate"
                                                                            required="required">
                                                                                <option value="" selected="selected">Choose...</option>
                                                                                <!-- Start Extract Categories -->
                                                                                <?php
                                                                                    /* ==Start Invoke getAll Function== */
                                                                                        $cates = extractDB(
                                                                                            'ID, Name',
                                                                                            'categories',
                                                                                            'WHERE `parent` = 0',
                                                                                            '',
                                                                                            'ID'
                                                                                        );
                                                                                    /* ==End Invoke getAll Function== */
                                                                                    /* ==Start Categories Display Loop== */
                                                                                        foreach ($cates as $cate) {
                                                                                ?>
                                                                                <option
                                                                                    value="<?php
                                                                                                /* ==Start Extract Category ID Value== */
                                                                                                    echo $cate['ID'];
                                                                                                /* ==Start Extract Category ID Value== */
                                                                                            ?>"<?php
                                                                                                    /* ==Start Equality Check== */
                                                                                                        if (isset($filtItemCate) && !empty($filtItemCate) && $filtItemCate == $cate['ID']) {
                                                                                                            /* ==Start Display Selected Value== */
                                                                                                                echo 'selected';
                                                                                                            /* ==End Display Selected Value== */
                                                                                                        }
                                                                                                    /* ==End Equality Check== */
                                                                                                ?>><?php
                                                                                                        /* ==Start Display category Name== */
                                                                                                            echo $cate['Name'];
                                                                                                        /* ==End Display category Name== */
                                                                                                    ?></option>
                                                                                                    <?php
                                                                                                        /* ==Start Child Categories Statement== */
                                                                                                            $childCates = extractDB(
                                                                                                                '`ID`, `Name`, `parent`',
                                                                                                                'categories',
                                                                                                                'WHERE `parent` = ' .$cate['ID']. '',
                                                                                                                '',
                                                                                                                'ID'
                                                                                                            );
                                                                                                        /* ==End Child Categories Statement== */
                                                                                                        /* ==Start Child Categories Loop== */
                                                                                                            foreach ($childCates as $childCate) {
                                                                                                    ?>
                                                                                                        <option
                                                                                                            value="<?php
                                                                                                                        /* ==Start Extract Child Category ID Value== */
                                                                                                                            echo $childCate['ID'];
                                                                                                                        /* ==Start Extract Child Category ID Value== */
                                                                                                                    ?>"<?php
                                                                                                                            /* ==Start Equality Check== */
                                                                                                                                if (isset($filtItemCate) && !empty($filtItemCate) && $filtItemCate == $childCate['ID']) {
                                                                                                                                    /* ==Start Display Selected Value== */
                                                                                                                                        echo 'selected';
                                                                                                                                    /* ==End Display Selected Value== */
                                                                                                                                }
                                                                                                                            /* ==End Equality Check== */
                                                                                                                    ?>><?php
                                                                                                                            /* ==Start Display Sub category Name== */
                                                                                                                                echo '--- ' .$childCate['Name']. ' Sub ' .$cate['Name'];
                                                                                                                            /* ==End Display Sub category Name== */
                                                                                                                        ?></option>
                                                                                                                            <?php
                                                                                                                                            }
                                                                                                                                        /* ==End Child Categories Loop== */
                                                                                                                                    }
                                                                                                                                /* ==End Categories Display Loop== */
                                                                                                                            ?>
                                                                                <!-- End Extract Categories -->
                                                                        </select>
                                                                        <small id="item-cate" class="form-text text-muted text-center">
                                                                            <span><strong>Mandatory</strong> Field Bidding Ad <strong>Must Be Related To Category</strong>.</span>
                                                                        </small>
                                                                        <!-- Start Front Error Validation -->
                                                                            <div class="alert alert-danger text-center custom-alert" id="">
                                                                                :( Oops <strong>Manadatory</strong> field: Item <strong>Category</strong> Must Be <strong>Selected</strong>. :(
                                                                            </div>
                                                                        <!-- End Front Error Validation -->
                                                                    </div>
                                                                <!-- End Category Group Col -->
                                                                <!-- Start Status Group Col -->
                                                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                            <label for="item-stat">Status</label>
                                                                            <select
                                                                                name="item-stat"
                                                                                id="item-stat"
                                                                                class="form-control form-control-lg valid-item-stat"
                                                                                required="required">
                                                                                    <option value="" selected="selected">Choose...</option>
                                                                                    <option
                                                                                        value="1"<?php
                                                                                                        /* ==Start Equality Check== */
                                                                                                            if (isset($filtItemStat) && !empty($filtItemStat) && $filtItemStat == 1) {
                                                                                                                /* ==Start Display Selected Value== */
                                                                                                                    echo 'selected';
                                                                                                                /* ==End Display Selected Value== */
                                                                                                            }
                                                                                                        /* ==End Equality Check== */
                                                                                                    ?>>New</option>
                                                                                    <option
                                                                                        value="2"<?php
                                                                                                        /* ==Start Equality Check== */
                                                                                                            if (isset($filtItemStat) && !empty($filtItemStat) && $filtItemStat == 2) {
                                                                                                                /* ==Start Display Selected Value== */
                                                                                                                    echo 'selected';
                                                                                                                /* ==End Display Selected Value== */
                                                                                                            }
                                                                                                        /* ==End Equality Check== */
                                                                                                    ?>>Like New</option>
                                                                                    <option
                                                                                        value="3"<?php
                                                                                                        /* ==Start Equality Check== */
                                                                                                            if (isset($filtItemStat) && !empty($filtItemStat) && $filtItemStat == 3) {
                                                                                                                /* ==Start Display Selected Value== */
                                                                                                                    echo 'selected';
                                                                                                                /* ==Start Display Selected Value== */
                                                                                                            }
                                                                                                        /* ==End Equality Check== */
                                                                                                    ?>>Used</option>
                                                                                    <option
                                                                                        value="4"<?php
                                                                                                        /* ==Start Equality Check== */
                                                                                                            if (isset($filtItemStat) && !empty($filtItemStat) && $filtItemStat == 4) {
                                                                                                                /* ==Start Display Selected Value== */
                                                                                                                    echo 'selected';
                                                                                                                /* ==Start Display Selected Value== */
                                                                                                            }
                                                                                                        /* ==End Equality Check== */
                                                                                                    ?>>Worn Out</option>
                                                                            </select>
                                                                            <small id="item-stat" class="form-text text-muted text-center">
                                                                                <span><strong>Mandatory</strong> Field Bidding Ad <strong>Must Have Descriptive Status</strong>.</span>
                                                                            </small>
                                                                            <!-- Start Front Error Validation -->
                                                                                <div class="alert alert-danger text-center custom-alert" id="">
                                                                                    :( Oops <strong>Manadatory</strong> field: Item <strong>Status</strong> Must Be <strong>Selected</strong>. :(
                                                                                </div>
                                                                            <!-- End Front Error Validation -->
                                                                        </div>
                                                                <!-- End Status Group Col -->
                                                            </div>
                                                        <!-- End Form Row -->
                                                        <!-- Start Form Row -->
                                                            <div class="form-row">
                                                                <!-- Start Min Bid Group Col -->
                                                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                        <label for="item-min-bid">Min. Bid</label>
                                                                        <input
                                                                            type="number"
                                                                            min="0"
                                                                            class="form-control form-control-lg valid-item-mbid"
                                                                            name="item-min-bid"
                                                                            id="item-min-bid"
                                                                            autocomplete="off"
                                                                            required="required"
                                                                            value="<?php
                                                                                        /* ==Start Value Check== */
                                                                                            if (isset($filtItemMinBid) && !empty($filtItemMinBid)) {
                                                                                                echo $filtItemMinBid;
                                                                                            }
                                                                                        /* ==End Value Check== */
                                                                                    ?>"
                                                                            placeholder="Item Minimum Bid In Dollars..." />
                                                                            <small id="item-min-bid" class="form-text text-muted text-center">
                                                                                <span><strong>Mandatory</strong> Field To <strong>Start Bidding</strong>.</span>
                                                                            </small>
                                                                            <!-- Start Front Error Validation -->
                                                                                <div class="alert alert-danger text-center custom-alert" id="">
                                                                                    :( Oops <strong>Mandatory Field</strong>: Item <strong>Mininmum Bid</strong> must be <strong>Only Positive Numbers</strong>. :(
                                                                                </div>
                                                                            <!-- End Front Error Validation -->
                                                                    </div>
                                                                <!-- End Min Bid Group Col -->
                                                                <!-- Start Image Group Col -->
                                                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                        <label for="item-imgs">Item Photos</label>
                                                                        <input
                                                                            type="file"
                                                                            class="form-control form-control-lg form-control-file valid-item-imgs"
                                                                            name="item-imgs[]"
                                                                            accept="image/.jpeg, .jpg, .gif, .png"
                                                                            max-size="4194304"
                                                                            id="item-imgs"
                                                                            autocomplete="off"
                                                                            multiple="multiple"
                                                                            required="required" />
                                                                            <small id="item-imgs" class="form-text text-muted text-center">
                                                                                <span><strong>Mandatory</strong> Field At Least <strong>3 "jpeg, jpg, gif, png" Files</strong> With max. <strong>size 4MB</strong>.</span>
                                                                            </small>
                                                                            <!-- Start Front Error Validation -->
                                                                                <div class="alert alert-danger text-center custom-alert" id="imgs-errs"></div>
                                                                            <!-- End Front Error Validation -->
                                                                    </div>
                                                            </div>
                                                        <!-- End Form Row -->
                                                        <!-- Start Form Row -->
                                                        <div class="form-row">
                                                            <!-- Start Country Group Col -->
                                                                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                    <label for="item-made">Made In</label>
                                                                    <input
                                                                        pattern=".{2,}"
                                                                        title="Name Must Be At Least 2 Characters"
                                                                        type="text"
                                                                        class="form-control form-control-lg valid-item-coun"
                                                                        name="item-made"
                                                                        id="item-made"
                                                                        autocomplete="off"
                                                                        required="required"
                                                                        value="<?php
                                                                                    /* ==Start Value Check== */
                                                                                        if (isset($filtItemMade) && !empty($filtItemMade)) {
                                                                                            echo $filtItemMade;
                                                                                        }
                                                                                    /* ==End Value Check== */
                                                                                ?>"
                                                                        placeholder="Type Country Of Manufacture..." />
                                                                        <small id="item-made" class="form-text text-muted text-center">
                                                                            <span><strong>Mandatory</strong> Field Must Have At Least <strong>2 Characters</strong>.</span>
                                                                        </small>
                                                                        <!-- Start Front Error Validation -->
                                                                            <div class="alert alert-danger text-center custom-alert" id="">
                                                                                :( Oops <strong>Manadatory</strong> field: Item <strong>Country</strong> Must Be <strong>At Least 2 Characters</strong>. :(
                                                                            </div>
                                                                        <!-- End Front Error Validation -->
                                                                </div>
                                                            <!-- End Country Group Col -->
                                                            <!-- Start Tags Group Col -->
                                                                <div class="form-group col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                                                    <label for="item-tags">Tags</label>
                                                                    <input
                                                                        type="text"
                                                                        class="form-control form-control-lg tags-factory"
                                                                        name="item-tags"
                                                                        id="item-tags"
                                                                        autocomplete="off"
                                                                        value=""
                                                                        placeholder="Type Item Tags Separated By Comma..." />
                                                                        <input
                                                                            type="hidden"
                                                                            name="item-tag"
                                                                            id="item-tag"
                                                                            value="<?php
                                                                                    // For Future Work Features.
                                                                                    /* ==Start Value Check== */
                                                                                        // if (isset($tagsOk) && !empty($tagsOk)) {
                                                                                        //     echo $tagsOk;
                                                                                        // }
                                                                                    /* ==End Value Check== */
                                                                                ?>" />
                                                                        <small id="item-tags" class="form-text text-muted text-center">
                                                                            <span><strong>Optional</strong> Field For<strong> Optimization</strong> Each Tag Must Be <strong>Separated By Comma</strong>.</span>
                                                                        </small>
                                                                        <!-- Start Show Tags -->
                                                                            <div class="tags text-center"></div>
                                                                        <!-- End Show Tags -->
                                                                </div>
                                                            <!-- End Tags Group Col -->
                                                        </div>
                                                        <!-- End Form Row -->
                                                        <!-- Start Submit Button -->
                                                            <input
                                                                class="btn btn-primary btn-lg btn-block bid-btn"
                                                                type="submit"
                                                                value="Add Item" />
                                                        <!-- End Submit Button -->
                                                        <!-- Start Front Error Validation -->
                                                            <div class="alert alert-danger custom-alert" id="item-form-alert">
                                                                :( Make sure <strong>inputs</strong> are <strong>filled</strong> as hinted. :(
                                                            </div>
                                                        <!-- End Front Error Validation -->
                                                    </form>
                                                <!-- End Item Form -->
                                            </div>
                                        <!-- End Panel Body -->
                                    </div>
                                <!-- End Bootstrap Panel -->
                            </div>
                        <!-- End Ad Section -->
                    </div>
                <!-- End Fluid Container -->
            </div>
        <!-- End Wrapper Content -->
    </div>
<!-- End Wrapper Section -->
<?php        
                /* ==End Page Content== */
            } else {
                header('Location: login.php');
                exit();
            }
        /* ==End Session Check== */
        /* ==Start Inclue Footer File== */
        include_once $tpl. 'footer.php';
        /* ==End Inclue Footer File== */
        ob_end_flush();
    /* ==End Ouput Buffer== */
?>