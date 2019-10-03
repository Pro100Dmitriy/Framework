	<!--banner-starts-->
	<div class="bnr" id="home"> 
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider4">
			    <li>
					<img src="images/bnr-1.jpg" alt=""/>
				</li>
				<li>
					<img src="images/bnr-2.jpg" alt=""/>
				</li>
				<li>
					<img src="images/bnr-3.jpg" alt=""/>
				</li>
			</ul>
		</div> 
		<div class="clearfix"> </div>
	</div>
	<!--banner-ends--> 
	
	<!--about-starts-->
	<div class="about"> 
		<div class="container">
			<?php if( $brand ) : ?>
			<div class="about-top grid-1">
				<?php foreach( $brand as $brand ) : ?>
				<div class="col-md-4 about-left">
					<figure class="effect-bubba">
						<img class="img-responsive" src="images/<?= $brand->img; ?>" alt=""/>
						<figcaption>
							<h2><?= $brand->title; ?></h2>
							<p><?= $brand->description; ?></p>	
						</figcaption>			
					</figure>
				</div>
				<?php endforeach; ?>
				<div class="clearfix"></div>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<!--about-end-->
	<!--product-starts-->
	<?php
	$value = fw\core\App::$app->getProperty('currency')['value'];

	if( !empty(fw\core\App::$app->getProperty('currency')['symbol_right'] ) ){
		$symbol_right = fw\core\App::$app->getProperty('currency')['symbol_right'];
	}else{
		$symbol_left = fw\core\App::$app->getProperty('currency')['symbol_left'];
	}
	?>
	<div class="product"> 
		<div class="container">
			<?php if( $hit ) : ?>
			<div class="product-top">
				<div class="product-one">
					<?php foreach( $hit as $hit ) : ?>
					<div class="col-md-3 product-left">
						<div class="product-main simpleCart_shelfItem">
							<a href="product/<?php echo $hit->alias; ?>" class="mask"><img class="img-responsive zoom-img" src="images/<?= $hit->img; ?>" alt="" /></a>
							<div class="product-bottom">
								<h3><?= $hit->title; ?></h3>
								<p><?= $hit->content; ?></p>
								<?php if( !empty( $symbol_right ) ) : ?>
									<h4><a class="item_add" href="#"><i></i></a> <span class=" item_price"><?php echo $hit->price * $value . ' ' . $symbol_right; ?></span></h4>
								<?php else : ?>
									<h4><a class="item_add" href="#"><i></i></a> <span class=" item_price"><?php echo $symbol_left . ' ' . $hit->price * $value; ?></span></h4>
								<?php endif; ?>
							</div>
							<div class="srch">
								<span>-50%</span>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
					<div class="clearfix"></div>
				</div>				
			</div>
			<?php endif; ?>
		</div>
	</div>
	<!--product-end-->

<?php

if( !empty($_POST) ){
    
    //echo "POST<br>";
    //debug($_POST);
    //echo "GET<br>";
    //debug($_GET);
    //echo "SERVER<br>";
    //debug($_SERVER);
    //echo "REQUEST<br>";
    //debug($_REQUEST);
    //echo "COOKIE<br>";
    //debug($_COOKIE);
}

?>