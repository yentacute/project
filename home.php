		<?php 
		require_once"db.php";
		$sql="select *from categories where show_menu= 1";
		$stmt=$conn->prepare("$sql");
		$stmt->execute();
		$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

		$mysql="select *from slide";
		$stmt=$conn->prepare("$mysql");
		$stmt->execute();
		$sliders=$stmt->fetchAll(PDO::FETCH_ASSOC);

		$sql="SELECT * FROM product INNER JOIN categories ON product.id_cate=categories.id_cate";
		$stmt=$conn->prepare($sql);
		$stmt->execute();
		$join=$stmt->fetchAll(PDO::FETCH_ASSOC);



		if(isset($_POST['buttonSearch'])){
			$nameproduct =$_POST['nameproduct'];
			$sql = "select * from product where nameproduct like '%$nameproduct%'";
			$stmt=$conn->prepare("$sql");
			$stmt->execute();
			$searchproduct = $stmt->fetchAll(PDO::FETCH_ASSOC);
			header("Location:./electro/store.php");
		}
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

			<title>Electro - HTML Ecommerce Template</title>

			<!-- Google font -->
			<?php include("share/style.php"); ?>
			

		</head>
		<body>
			<!-- HEADER -->
			<?php include("share/header.php"); ?>
			<!-- /NAVIGATION -->

			<!-- SECTION -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- shop -->
						<div class="slideshow-container">

							<!-- Full-width images with number and caption text -->
							<?php foreach ($sliders as $value): ?>
								

								<div class="mySlides fade">
									<div class="numbertext"></div>
									<a href="" title=""><img src="img/<?= $value['image'] ?>" style="width:100%;height: 500px;background-size: cover"></a>
									<div class="text" ></div>
								</div>
							<?php endforeach; ?>


							<!-- Next and previous buttons -->
							<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
							<a class="next" onclick="plusSlides(1)">&#10095;</a>
							<!-- <div style="text-align:center;position: relative;">
								<span class="dot" onclick="currentSlide(1)"></span> 
								<span class="dot" onclick="currentSlide(2)"></span> 
								<span class="dot" onclick="currentSlide(3)"></span> 
								<span class="dot" onclick="currentSlide(4)"></span> 
								<span class="dot" onclick="currentSlide(5)"></span> 
								<span class="dot" onclick="currentSlide(6)"></span> 
							</div> -->
						</div>

						<br>

						<!-- The dots/circles -->
						<script>
							var slideIndex = 0;
							showSlides();

							function showSlides() {
								var i;
								var slides = document.getElementsByClassName("mySlides");
								var dots = document.getElementsByClassName("dot");
								for (i = 0; i < slides.length; i++) {
									slides[i].style.display = "none";
								}
								slideIndex++;
								if (slideIndex > slides.length) {slideIndex = 1}    
									for (i = 0; i < dots.length; i++) {
										dots[i].className = dots[i].className.replace(" active", "");
									}
									slides[slideIndex-1].style.display = "block";  
									dots[slideIndex-1].className += " active";
		  setTimeout(showSlides, 2000); // Change image every 2 seconds
		}
		</script>
		<!-- /row -->
		</div>
		<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
								<?php foreach ($cate as $value) { ?>
									<ul class="section-tab-nav tab-nav">
										<li class="active"><a href="home.php?id_cate=<?php echo $value['id_cate'] ?>"><?php echo $value['name_cate'] ?></a></li>
									</ul>
								<?php } ?>
							</div>

						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										<?php
										foreach ($join as $product) {

											?>
											<div class="product">
												<div class="product-img">
													<img src="img/<?=$product['image']?>" alt="">
													<div class="product-label">
														<span class="sale">-<?php echo $product['sale_price']; ?>%</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category"><?php echo $product['name_cate'] ?></p>
													<h3 class="product-name"><?php echo $product['nameproduct'] ?></h3>
													<h4 class="product-price"><?php echo $product['price'] ?>$-<?php echo $product['sale_price'] ?>%</h4>
													<div class="product-rating">
														<?php 
														for($i = 1; $i <= 5; $i++){
															if($product['rating'] >= $i){
																$starClass = "fa fa-star";
															}else{
																$starClass = "fa fa-star-o";
															}
															?>
															<i class="<?php echo $starClass ?>"></i>
															<?php
														}
														?>
													</div>
													<div class="product-btns">
														<a href="product.php?id=<?=$product['id']?>"><button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"> QUICK VIEW</span></button></a>
													</div>
												</div>
												<div class="add-to-cart">
													<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
												</div>
											</div>
											<?php
										}
										?>
										<!-- /product -->

										<!-- product -->

										<div id="slick-nav-1" class="products-slick-nav"></div>
									</div>
									<!-- /tab -->
								</div>
							</div>
						</div>
						<!-- Products tab & slick -->
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /SECTION -->

			<!-- HOT DEAL SECTION -->
			<div id="hot-deal" class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="hot-deal">
								<ul class="hot-deal-countdown">
									<li>
										<div>
											<h3>02</h3>
											<span>Days</span>
										</div>
									</li>
									<li>
										<div>
											<h3>10</h3>
											<span>Hours</span>
										</div>
									</li>
									<li>
										<div>
											<h3>34</h3>
											<span>Mins</span>
										</div>
									</li>
									<li>
										<div>
											<h3>60</h3>
											<span>Secs</span>
										</div>
									</li>
								</ul>
								<h2 class="text-uppercase">hot deal this week</h2>
								<p>New Collection Up to 50% OFF</p>
								<a class="primary-btn cta-btn" href="#">Shop now</a>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /HOT DEAL SECTION -->

			<!-- SECTION -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">

						<!-- section title -->
						<div class="col-md-12">
							<div class="section-title">
								<h3 class="title">Top selling</h3>
							</div>
						</div>
						<!-- /section title -->

						<!-- Products tab & slick -->
						<div class="col-md-12">
							<div class="row">
								<div class="products-tabs">
									<!-- tab -->
									<div id="tab2" class="tab-pane fade in active">
										<div class="products-slick" data-nav="#slick-nav-2">
											<!-- product -->
											<?php
											foreach ($join as $product):?>
												<div class="product">
													<div class="product-img">
														<img src="img/<?=$product['image']?>" alt="">
														<div class="product-label">
															<span class="sale">-<?php echo $product['sale_price']; ?>%</span>
														</div>
													</div>
													<div class="product-body">
														<p class="product-category"><?php echo $product['name_cate'] ?></p>
														<h3 class="product-name"><?php echo $product['nameproduct'] ?></h3>
														<h4 class="product-price"><?php echo $product['price'] ?>$<del class="product-old-price"><?php echo $product['sale_price'] ?>%</del></h4>
														<div class="product-rating">
															<?php 
															for($i = 1; $i <= 5; $i++){
																if($product['rating'] >= $i){
																	$starClass = "fa fa-star";
																}else{
																	$starClass = "fa fa-star-o";
																}
																?>
																<i class="<?php echo $starClass ?>"></i>
																<?php
															}
															?>
														</div>
														<div class="product-btns">
															<a href="product.php?id=<?=$product['id']?>"><button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"> QUICK VIEW</span></button></a>
														</div>
													</div>
													<div class="add-to-cart">
														<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
													</div>
												</div>
											<?php endforeach;?>

											<!-- /product -->

											<!-- product -->

											<!-- /product -->

											<!-- product -->

											<!-- /product -->

											<!-- product -->

											<!-- /product -->

											<!-- product -->

											<!-- /product -->
										</div>
										<div id="slick-nav-2" class="products-slick-nav"></div>
									</div>
									<!-- /tab -->
								</div>
							</div>
						</div>
						<!-- /Products tab & slick -->
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /SECTION -->

			<!-- SECTION -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="col-md-12">
								<div class="row">
									<div class="products-tabs">
										<!-- tab -->
										<div id="tab1" class="tab-pane active">
											<div class="products-slick" data-nav="#slick-nav-1">
												<!-- product -->
												<?php
												foreach ($join as $product) {

													?>
													<div class="product">
														<div class="product-img">
															<img src="img/<?=$product['image']?>" alt="">
															<div class="product-label">
																<span class="sale">-<?php echo $product['sale_price']; ?>%</span>
															</div>
														</div>
														<div class="product-body">
															<p class="product-category"><?php echo $product['name_cate'] ?></p>
															<h3 class="product-name"><?php echo $product['nameproduct'] ?></h3>
															<h4 class="product-price"><?php echo $product['sale_price'] ?>$<del class="product-old-price"><?php echo $product['price'] ?>$</del></h4>
															<div class="product-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
															</div>
															<div class="product-btns">
																<a href="product.php?id=<?=$product['id']?>"><button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"> QUICK VIEW</span></button></a>
															</div>
														</div>
														<div class="add-to-cart">
															<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
														</div>
													</div>
													<?php
												}
												?>
												<!-- /tab -->
											</div>
										</div>
									</div>
									<!-- Products tab & slick -->
								</div>
								<!-- /row -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>
		</div>

		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">View Cart</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

		</body>
		</html>
