<?php
use app\widgets\currency\Currency;
?>
<!DOCTYPE html>
<html>
<head>

	<?php if( !isset($slider) ){
		$slider = " ";
	} ?>

	<?php	if( strpos( $slider, 'MainController' ) || strpos( $slider, 'SearchController' )  ) : ?>
		<base href="../public/"/>
	<?php else : ?>
		<base href="../"/>
	<?php endif; ?>


	<!-- Meta tags -->
	<?= $this->getMeta(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="Luxury Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />

	
	
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
	<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/Mystyles.css" rel="stylesheet" type="text/css"/>
	<link href="css/flexslider.css" rel="stylesheet" type="text/css" media="screen" />
	<script>
		var path = '<?=PATH;?>';
	</script>		

</head>
<body> 
	
	<!--top-header-->
	<div class="top-header">
		<div class="container">
			<div class="top-header-main">
				<div class="col-md-6 top-header-left">
					<div class="drop">
						<div class="box">
							<select id="currency" tabindex="4" class="dropdown drop">
								<?php new app\widgets\currency\Currency(); ?>
							</select>
						</div>
						<div class="box1">
							<div class="btn-group">
								<a class="dropdown-toggle" data-toggle="dropdown">Account<span class="caret"></span>
									<ul class="dropdown-menu">
										<?php if( !empty($_SESSION['user']) ) : ?>
											<li><a href="user/profile">Добро пожаловать, <?= h($_SESSION['user']['name']); ?></a></li>
											<li><a href="user/logout">Log out</a></li>
										<?php else : ?>
											<li><a href="user/login">Log in</a></li>
											<li><a href="user/signup">Register</a></li>
										<?php endif; ?>
									</ul>
								</a>
							</div>
						</div>
						<!--<div class="box1">
							<select tabindex="4" class="dropdown">
								<option value="" class="label">English :</option>
								<option value="1">English</option>
								<option value="2">French</option>
								<option value="3">German</option>
							</select>
						</div>-->
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-6 top-header-left">
					<div class="cart box_1">
						<a href="cart/show" onclick="getCart(); return false;">
							<div class="total">
								<img src="images/cart-1.png" alt="" />
								<?php if( !empty($_SESSION['cart']) ) : ?>
									<span class="simpleCart_total"><?= $_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.summ'] . $_SESSION['cart.currency']['symbol_right']  ?></span>																
								<?php else : ?>
									<span class="simpleCart_total">Empty Cart</span>								
								<?php endif; ?>
							</div>
						</a>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--top-header-->
	<!--start-logo-->
	<div class="logo">
		<a href="#"><h1>Luxury Watches</h1></a>
	</div>
	<!--start-logo-->
	<!--bottom-header-->
	<div class="header-bottom">
		<div class="container"> 
			<div class="header">
				<div class="col-md-9 header-left">
					<div class="menu">
						<?php
						new app\widgets\menu\Menu([
							'tpl' => WWW . '/menu/menu.php',
							'container' => 'ul',
							'cache' => 0
						]);
						?>
					</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-3 header-right"> 
				<div class="search-bar">
					<form class="search" method="get" autocomplete="off">
						<input class="typeahead" id="typeahead" type="text" name="s" placeholder="Search">
						<input type="submit" value="">
					</form>
					<!--<div id="the-basics">
						<input class="typeahead" id="typeahead" type="text" placeholder="Search">
					</div>
					<!--<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
					<input type="submit" value="">-->
				</div>
			</div>
			<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--bottom-header-->

	<div class="container">
		<?php //debug($_SESSION); ?>
		<?= $content ?> 
	</div>

	<!--information-starts-->
	<div class="information">
		<div class="container">
			<div class="infor-top">
				<div class="col-md-3 infor-left">
					<h3>Follow Us</h3>
					<ul>
						<li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
						<li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
						<li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Information</h3>
					<ul>
						<li><a href="#"><p>Specials</p></a></li>
						<li><a href="#"><p>New Products</p></a></li>
						<li><a href="#"><p>Our Stores</p></a></li>
						<li><a href="contact.html"><p>Contact Us</p></a></li>
						<li><a href="#"><p>Top Sellers</p></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>My Account</h3>
					<ul>
						<li><a href="account.html"><p>My Account</p></a></li>
						<li><a href="#"><p>My Credit slips</p></a></li>
						<li><a href="#"><p>My Merchandise returns</p></a></li>
						<li><a href="#"><p>My Personal info</p></a></li>
						<li><a href="#"><p>My Addresses</p></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Store Information</h3>
					<h4>The company name,
						<span>Lorem ipsum dolor,</span>
						Glasglow Dr 40 Fe 72.</h4>
					<h5>+955 123 4567</h5>	
					<p><a href="mailto:example@email.com">contact@example.com</a></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--information-end-->
	<!--footer-starts-->
	<div class="footer">
		<div class="container">
			<div class="footer-top">
				<div class="col-md-6 footer-left">
					<form>
						<input type="text" value="Enter Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email';}">
						<input type="submit" value="Subscribe">
					</form>
				</div>
				<div class="col-md-6 footer-right">					
					<p>© 2015 Luxury Watches. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--footer-end-->	

	<div class="modal fade" id="cart" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Modal title</h4>
				</div>
				<div class="modal-body">
					<!-- body -->

					<!-- body -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<a href="cart/view" type="button" class="btn btn-primary">Checlout</a>
					<button type="button" class="btn btn-danger" onclick="clearCart()">Clear cart</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!--Scripts-->
	<script src="js/resours/jquery-1.11.0.min.js"></script>
	<script src="js/resours/typeahead.bundle.js"></script>
	<script src="js/resours/bootstrap.min.js"></script>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script src="js/resours/simpleCart.min.js"> </script>
	<script type="text/javascript" src="js/resours/memenu.js"></script>
	<script>$(document).ready(function(){$(".memenu").memenu();});</script>	
	<script src="js/resours/jquery.easydropdown.js"></script>	
	<script type="text/javascript">
		$(function() {
		
		    var menu_ul = $('.menu_drop > li > ul'),
		           menu_a  = $('.menu_drop > li > a');
		    
		    menu_ul.hide();
		
		    menu_a.click(function(e) {
		        e.preventDefault();
		        if(!$(this).hasClass('active')) {
		            menu_a.removeClass('active');
		            menu_ul.filter(':visible').slideUp('normal');
		            $(this).addClass('active').next().stop(true,true).slideDown('normal');
		        } else {
		            $(this).removeClass('active');
		            $(this).next().stop(true,true).slideUp('normal');
		        }
		    });
		
		});
	</script>		
	<script src="js/resours/imagezoom.js"></script>
	<script defer src="js/resours/jquery.flexslider.js"></script>
	<script>
	// Can also be used with $(document).ready()
	$(window).load(function() {
	  $('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	  });
	});
	</script>
	<!-- SLIDER -->
	<?php if( strpos( $slider, 'indexAction' ) ): ?>
		<script src="js/resours/responsiveslides.min.js"></script>
		<script>
		// You can also use "$(window).load(function() {"
		$(function () {
			// Slideshow 4
			$("#slider4").responsiveSlides({
			auto: true,
			pager: true,
			nav: true,
			speed: 500,
			namespace: "callbacks",
			before: function () {
				$('.events').append("<li>before event fired.</li>");
			},
			after: function () {
				$('.events').append("<li>after event fired.</li>");
			}
			});

		});
		</script>
	<?php endif; ?>
	
	<?php
			// вывод всех проводимых запросов
		$logs = R::getDatabaseAdapter()
		->getDatabase()
		->getLogger();

		debug( $logs->grep( 'SELECT' ) );
		?>

	<script src="js/main.js"></script>
</body>
</html>