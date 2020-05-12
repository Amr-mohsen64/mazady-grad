<?php 
	$hasFooter = '';
	/* ==Start Output Buffer== */
		ob_start();
		/* ==Start Open Session== */
			session_start();
		/* ==End Open Session== */
		/* ==Start Declare Page Title== */
			$pageTitle = 'Show Ads';
		/* ==End Declare Page Title== */
		/* ==Start Include Initialization File== */
			include "ini.php";
		/* ==End Include Initialization File== */
		/* ==Start Page Content== */
?>
	<!-- Start Wrapper Section -->
		<div id="wrapper">
<?php
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
							




							<!-- Start Product Container -->
								<div class="container" id="product-section">
									<!-- Start Main Row -->
										<div class="row">
											<!-- Start First Main Column -->
												<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
													<!-- <img src="/images/4313.png" class="img-fluid image-responsive" alt=""> -->
													<div class="slider">

														<div id="main-slider" class="carousel slide" data-ride="carousel">
															<ol class="carousel-indicators">
																<li data-target="#main-slider" data-slide-to="0" class="active"></li>
																<li data-target="#main-slider" data-slide-to="1"></li>
																<li data-target="#main-slider" data-slide-to="2"></li>
															</ol>
															<div class="carousel-inner">
																<div class="carousel-item carouselOne active">
																	<img src="/layout/images/productOne.png" class="d-block w-100" alt="Product Alterantive Caption">
																</div>
																<div class="carousel-item carouselTwo">
																	<img src="/layout/images/productTwo.png" class="d-block w-100" alt="Product Alterantive Caption">
																</div>
																<div class="carousel-item carouselThree">
																	<img src="/layout/images/productThree.png" class="d-block w-100" alt="Product Alterantive Caption">
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
																<h1>Product Title</h1>
															</div>
															<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																<span class="badge badge-primary">Vintage</span>
																<span class="monospaced">No.1960140180</span>
																<!-- add the comming google font at head tag -->
																<!-- <link href='https://fonts.googleapis.com/css?family=Ubuntu+Mono' rel='stylesheet' type='text/css'> -->
																<!-- then add to style file -->
																<!-- .monospaced { font-family: 'Ubuntu Mono', monospaced ; } -->
															</div>
															<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																<p class="desc">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eget metus pharetra, porttitor nibh vel, vestibulum quam. Maecenas et sapien ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Praesent quis massa et quam volutpat scelerisque id vitae mauris. Pellentesque velit purus, malesuada sed nisl non, ultrices pulvinar nisi. Vivamus convallis quam orci.
																</p>
															</div>
															<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
																<span class="monospaced">Add Review </span>
																<span class="badge badge-success">61</span>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="far fa-star"></i>
															</div>
														</div>
													<!-- End First Nested Row -->
													<!-- Start Second Nested Row -->
													<div class="row text-center">
														<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 bottom-rule">
															<label class="btn btn-info" href="#">Minimum Bid</label>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 bottm-rule">
															<h3 class="product-price">$129.00</h3>
														</div>
													</div>
													<div class="row text-left">
														<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
															<p class="product-price">All prices include VAT <a href="#!">Details</a></p>
														</div>
													</div>
													<!-- End Second Nested Row -->

													<!-- Start Responsive line Separator -->
													<hr class="clearfix w-100 d-md-none">
													<!-- End Responsive line Separator -->

													<!-- Start Third Nested Row -->
													<div class="row add-to-cart text-center">
														<div class="col-md-12 product-qty">
															<span class="btn btn-outline-info btn-lg btn-qty text-center">
																<i class="fa fa-plus"></i>
															</span>
															<input class="btn btn-outline-secondary btn-lg btn-qty text-center" value="10" />
															<span class="btn btn-outline-info btn-lg btn-qty text-center">
																<i class="fa fa-minus"></i>
															</span>
														</div>
													</div>
													<!-- End Third Nested Row -->
													<!-- Start Fourth Nested Row -->
													<div class="row dv-btn">
														<div class="col-md-12">
															<button class="btn btn-success btn-block">Start Bidding</button>
														</div>
													</div>
													<!-- End Fourth Nested Row -->
													<!-- Start Fifth Nested Row -->
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
															<h6 class="product-price">$129.00</h6>
														</div>
													</div>
													<!-- End Fifth Nested Row -->

													<!-- Start Responsive line Separator -->
													<!-- <hr class="clearfix w-100"> -->
													<!-- End Responsive line Separator -->

													<!-- Start Sixth Nested Row -->
													<!-- <div class="row">
														<div class="col-md-12 top-10 text-center">
															<p>To order by telephone, <a href="tel:18005551212">please call 1-800-555-1212</a></p>
														</div>
													</div> -->
													<!-- End Sixth Nested Row -->
												</div>
											<!-- End Second Main Column -->

										</div>
									<!-- End Main Row -->

									<!-- Start Second Row -->
										<div class="row">
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
															<li class="nav-item" role="presentation">
																<a class="nav-link" href="#notes" aria-controls="notes" role="tab" data-toggle="tab">Notes</a>
															</li>
															<li class="nav-item" role="presentation">
																<a class="nav-link" href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Reviews</a>
															</li>
														</ul>
													<!-- End Nav Tabs -->

													<!-- Start Tab Panes -->
														<div class="tab-content">
															<div class="tab-pane fade show active" id="description" role="tabpanel">
																<p class="top-10">
																	Proin tempus felis quis pharetra mollis. Curabitur ac massa ut justo scelerisque feugiat. Maecenas ipsum nisi, consequat eu dolor vitae, maximus ornare lacus. Aenean faucibus, nisl et mollis lacinia, odio elit luctus odio, sit amet ultrices ex eros vitae ipsum. Nulla facilisi. Proin sodales tempus condimentum. Cras non luctus lorem. Donec sed sodales orci, quis commodo nibh. Aenean at tellus pulvinar, suscipit nisl nec, commodo ipsum. Nullam ut tortor suscipit, rutrum magna eget, laoreet nibh. Maecenas ultricies neque sit amet ipsum vestibulum fermentum. Fusce eu orci vel nisl aliquam sollicitudin at sed nisi. Sed congue finibus justo, et semper justo congue ut. Maecenas faucibus varius eros nec lacinia.
																</p>
															</div>
															<div class="tab-pane fade" id="features" role="tabpanel">
																<p class="top-10">
																	Donec non massa lorem. Integer at velit non nibh hendrerit pellentesque. Maecenas vel enim et dolor ullamcorper fringilla sed sit amet diam. Mauris molestie tristique hendrerit. Phasellus venenatis massa sit amet enim aliquam fermentum in eget sapien. Curabitur semper suscipit sapien et bibendum. Duis pretium arcu sed elit sollicitudin, in maximus neque tincidunt. Sed lectus dolor, pellentesque in consectetur ut, commodo laoreet tortor.
																</p>
															</div>
															<div class="tab-pane fade" id="notes" role="tabpanel">
																<p class="top-10">
																	Proin tempus felis quis pharetra mollis. Curabitur ac massa ut justo scelerisque feugiat. Maecenas ipsum nisi, consequat eu dolor vitae, maximus ornare lacus. Aenean faucibus, nisl et mollis lacinia, odio elit luctus odio, sit amet ultrices ex eros vitae ipsum. Nulla facilisi. Proin sodales tempus condimentum. Cras non luctus lorem. Donec sed sodales orci, quis commodo nibh. Aenean at tellus pulvinar, suscipit nisl nec, commodo ipsum. Nullam ut tortor suscipit, rutrum magna eget, laoreet nibh. Maecenas ultricies neque sit amet ipsum vestibulum fermentum. Fusce eu orci vel nisl aliquam sollicitudin at sed nisi. Sed congue finibus justo, et semper justo congue ut. Maecenas faucibus varius eros nec lacinia.
																</p>
															</div>
															<div class="tab-pane fade" id="reviews" role="tabpanel">
																<p class="top-10">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eget metus pharetra, porttitor nibh vel, vestibulum quam. Maecenas et sapien ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Praesent quis massa et quam volutpat scelerisque id vitae mauris. Pellentesque velit purus, malesuada sed nisl non, ultrices pulvinar nisi. Vivamus convallis quam orci.                            </p>
															</div>
														</div>
													<!-- End Tab Panes -->
												</div>
											<!-- End Column -->
										</div>
									<!-- End Second Row -->


								</div>
							<!-- End Product Container -->











						</div>
					<!-- End Fluid Container -->
				</div>
			<!-- End Wrapper Content -->
		</div>
	<!-- End Wrapper Section -->
<?php
		/* ==End Page Content== */
		/* ==Start Include Footer File== */
			include $tpl . 'footer.php';
		/* ==End Include Footer File== */
		ob_end_flush();
	/* ==End Output Buffer== */
?>