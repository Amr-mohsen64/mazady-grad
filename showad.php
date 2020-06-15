<?php 
	$hasFooter = '';
	/* ==Start Output Buffer== */
	ob_start();
	session_start();
	$pageTitle = 'Show Ads';

	if(isset($_SESSION['BIDDERID']) || isset($_SESSION['SELLERID'])): 
		include "ini.php";


		// check if the get userid is numeric and get inter value 
		$itemid= isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0 ; 
		// Select all the data from database depends on ID 
		$stmt = $db->prepare("SELECT items.* ,
									categories.Name AS Category_Name ,
									users.userName
								FROM items
								INNER JOIN categories 
								ON categories.ID = items.Cat_ID
	
								INNER JOIN users 
								ON users.userID = items.Memeber_ID 
								WHERE itemID = ?
								AND approve = 1");
		// Excute QUery 
		$stmt ->execute(array($itemid));        // all depends on item id 
		$count = $stmt ->rowCount();
		$item = $stmt ->fetch();

?>
		<!-- Start Wrapper Section -->
		<div id="wrapper">
			<?php
				include $tpl . 'sidebar.php';
				include $tpl . 'topnav.php';
			?>
			<!-- Start Wrapper Content -->
			<div class="content-wrapper">
				<div class="container-fluid">
					
					<?php 
					//count check
					if($count > 0): ?>
						<div class="container" id="product-section">
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<div class="slider">
									<div id="main-slider" class="carousel slide" data-ride="carousel">
										<ol class="carousel-indicators">
											<li data-target="#main-slider" data-slide-to="0" class="active"></li>
											<li data-target="#main-slider" data-slide-to="1"></li>
											<li data-target="#main-slider" data-slide-to="2"></li>
										</ol>
										<div class="carousel-inner">
											<div class="carousel-item carouselOne active">
												<?php 
													echo "<img src='data/uploads/items/".$item['Image'] ."' class='d-block w-100' alt='Card image cap'>";
												?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End First Main Column -->
							<!-- Start Second Main Column -->
							<div class="col-md-6">
								<!-- Start First Nested Row -->
								<div class="row product-details">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<h3 class='mb-2 gray-text'><?php echo $item['Name'];?></h3>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<h6 class="product-price mt-4 gray-text">minimum Bid : <span class="text-primary">$<?php echo $item['minBid'] ?></span></h6>
										<h6 class="product-price mt-4 gray-text">Added Date : <span class="text-primary"><?php echo $item['Add_Date'] ?></span></h6>
										<h6 class="product-price mt-4 gray-text">Category : <a href="products.php?pageid=<?php echo $item['Cat_ID'] ?>"><?php echo $item['Category_Name']?></a></span></h6>

										<h6 class="product-price mt-4 gray-text">Status : <span class="text-primary">
											<?php 
												$staus = $item['Statues'] ;
												if($staus== 1){echo 'New';}
												elseif($staus == 2){echo 'Like New';}
												elseif($staus == 3){echo 'Used';}
												elseif($staus == 4){echo 'Very Old';}
											?>
											</span>
										</h6>
										<h6 class="product-price mt-4 gray-text">country Made : <span class="text-primary"><?php echo $item['Country_Made'] ?></span></h6>
										<h6 class="product-price mt-4 gray-text">Seller Name: <span class="text-primary"><?php echo $item['userName'] ?></span></h6>
									</div>
								</div>
											
								<hr class="clearfix w-100 d-md-none">
								<a href="session.php?itemid=<?php echo $item['itemID']?>"><button class="btn btn-primary mt-4">Start Bidding</button></a>
		
								<div class="row text-center">
									<div class="col-md-12">
										<span class="monospaced">In Stock</span>
									</div>
									<div class="col-md-5 col-md-offset-1">
										<a class="monospaced" href="#">Add a Bidding Request</a>
									</div>
									<div class="col-md-2 col-md-offset-1">
										<span class="monospaced" href="#">OR</span>
									</div>
									<div class="col-md-5 col-md-offset-1">
										<a class="monospaced" href="#">Buy Now with</a>
										<h6 class="product-price">$<?php echo $item['Price'] ?></h6>
									</div>
								</div>
							</div>
							<!-- End Second Main Column -->
						</div>
						<!-- End Main Row -->

						<!-- Start Second Row  tbs-->
						<div class="row ">
							<!-- Start Column -->
							<div class="col-md-12">
								<!-- Start Nav Tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item" role="presentation">
										<a class="nav-link active" href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" href="#features" aria-controls="features" role="tab" data-toggle="tab">Features</a>
									</li>
								</ul>
								<!-- End Nav Tabs -->

								<!-- Start Tab Panes -->
								<div class="tab-content">
									<div class="tab-pane fade show active" id="description" role="tabpanel">
										<p class="top-10">
										<p class="desc"> </p>
										<?php echo $item['Desciription'] ?>
										</p>
									</div>
									<div class="tab-pane fade" id="features" role="tabpanel">
										<p class="top-10">
											Donec non massa lorem. Integer at velit non
										</p>
									</div>
								</div>
								<!-- End Tab Panes -->
							</div>
							<!-- End Column -->
						</div>
						<!-- End Second Row -->


					</div>
					<!-- End Product Container -->

					<?php 
						//end count item check in database
						else :
							echo "<h5 class='text-danger'>theres no such ID  Or Item Not Approved</5>";
						endif;
					?>

				</div>
				<!-- End Fluid Container -->
			</div>
		<!-- End Wrapper Content -->
		</div>
		<!-- End Wrapper Section -->
		<?php
			include $tpl . 'footer.php';
			ob_end_flush();
		/* ==End Output Buffer== */
	else:
        header('location:login.php');
    //end main session check condition
    endif;

?>