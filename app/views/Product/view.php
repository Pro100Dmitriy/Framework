	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<!--<li><a href="#">Home</a></li>
					<li class="active">Single</li>-->
					<?= $breadcrumbs ?>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-single-->
	<div class="single contact">
		<div class="container">
			<div class="single-main">
				<div class="col-md-9 single-main-left">
				<div class="sngl-top">
					<div class="col-md-5 single-top-left">	
						
						<div class="flexslider">
							  <ul class="slides">
								<?php if( $gallery ) : ?>
								<?php foreach( $gallery as $elem => $object) : ?>
									<li data-thumb="images/<?= $object->img ?>">
										<div class="thumb-image"> <img src="images/<?= $object->img ?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
									</li>
								<?php endforeach; ?>
								<?php else : ?>
								<li data-thumb="images/no-image.jpg">
									<div class="thumb-image"> <img src="images/no-image.jpg" data-imagezoom="true" class="img-responsive" alt=""/> </div>
								</li>
								<?php endif; ?>
							  </ul>
						</div>
						
					</div>	
					<div class="col-md-7 single-top-right">
						<div class="single-para simpleCart_shelfItem">
						<h2><?=$product->title; ?></h2>
							<div class="star-on">
								<ul class="star-footer">
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
									</ul>
								<div class="review">
									<a href="#"> 1 customer review </a>
									
								</div>
							<div class="clearfix"> </div>
							</div>

							<?php
							$value = fw\core\App::$app->getProperty('currency')['value'];

							if( !empty(fw\core\App::$app->getProperty('currency')['symbol_right'] ) ){
								$symbol_right = fw\core\App::$app->getProperty('currency')['symbol_right'];
							}else{
								$symbol_left = fw\core\App::$app->getProperty('currency')['symbol_left'];
							}
							?>
							<?php if( !empty( $symbol_right ) ) : ?>
								<h5><span id="base_price" data-base="<?= $product->price * $value ?>" data-symbolright="<?= $symbol_right ?>" class=" item_price"><?php echo $product->price * $value . ' ' . $symbol_right; ?></span></h5>
							<?php else : ?>
								<h5><span id="base_price" data-base="<?= $product->price * $value ?>" data-symbolleft="<?= $symbol_left ?>" class=" item_price"><?php echo $symbol_left . ' ' . $product->price * $value; ?></span></h5>
							<?php endif; ?>

							<?php if( $product->old_price ) : ?>

								<?php if( !empty( $symbol_right ) ) : ?>
									<small> <span id="new_price" class=" item_old_price"><?php echo $product->old_price * $value . ' ' . $symbol_right; ?></span></small>
								<?php else : ?>
									<small> <span id="new_price" class=" item_old_price"><?php echo $symbol_left . ' ' . $product->old_price * $value; ?></span></small>
								<?php endif; ?>

							<?php endif; ?>
							
							<p><?=$product->content?></p>
							<div class="available">
								<ul>
									<?php if( $modification ) : ?>
									<li>Color
										<select>
											<option value="default">Select color</option>
											<?php foreach($modification as $key => $mod) : ?>
												<option data-price="<?= $mod->price * $value ?>" data_title="<?= $mod->title ?>" value="<?= $mod->id ?>"><?= $mod->title ?></option>
											<?php endforeach; ?>
										</select>
									</li>
									<?php endif; ?>
								<div class="clearfix"> </div>
							</ul>
						</div>
							<ul class="tag-men">
								<?php $cats = fw\core\App::$app->getProperty('cats'); ?>
								<?php $brands = fw\core\App::$app->getProperty('brands'); ?>
								<li><span>CATEGOTY</span>
								<span class="women1">: <?=$cats[$product->category_id]['title']?>,</span></li>
								<li><span>BRAND</span>
								<span class="women1">: <?=$brands[$product->brand_id]['title']?></span></li>
							</ul>
								<a id="productAdd" data-id="<?=$product->id?>" href="cart/add/?id=<?=$product->id?>" class="add-cart addToCartLink">ADD TO CART</a>
							
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="tabs">
					<ul class="menu_drop">
				<li class="item1"><a href="#"><img src="images/arrow.png" alt="">Description</a>
					<ul>
						<li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
						<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
						<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
					</ul>
				</li>
				<li class="item2"><a href="#"><img src="images/arrow.png" alt="">Additional information</a>
					<ul>
					    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
						<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
					</ul>
				</li>
				<li class="item3"><a href="#"><img src="images/arrow.png" alt="">Reviews (10)</a>
					<ul>
						<li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
						<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
						<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
					</ul>
				</li>
				<li class="item4"><a href="#"><img src="images/arrow.png" alt="">Helpful Links</a>
					<ul>
					    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
						<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
					</ul>
				</li>
				<li class="item5"><a href="#"><img src="images/arrow.png" alt="">Make A Gift</a>
					<ul>
						<li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
						<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
						<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
					</ul>
				</li>
	 		</ul>
				</div>
				<?php if( !empty($related) ) : ?>
				<div class="latestproducts">
					<div class="product-one">
						<h4>C этим товаром также покупают:</h4>
						<?php foreach($related as $elem => $content) : ?>
						<div class="col-md-4 product-left p-left"> 
							<div class="product-main simpleCart_shelfItem">
								<a href="product/<?= $content['alias'] ?>" class="mask"><img class="img-responsive zoom-img" src="images/<?= $content['img'] ?>" alt="" /></a>
								<div class="product-bottom">
									<h3><?= $content['title']; ?></h3>
									<p>Explore Now</p>
									<h4><a class="item_add" href="#"><i></i></a> <span class=" item_price"><?= $content['price']; ?></span></h4>
									<?php if( $content['old_price'] ) : ?>

										<?php if( !empty( $symbol_right ) ) : ?>
											<small> <span class=" item_old_price"><?php echo $content['old_price'] * $value . ' ' . $symbol_right; ?></span></small>
										<?php else : ?>
											<small> <span class=" item_old_price"><?php echo $symbol_left . ' ' . $content['old_price'] * $value; ?></span></small>
										<?php endif; ?>

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
				<?php if( !empty($recentlyViewed) ) : ?>
				<div class="latestproducts">
					<div class="product-one">
						<h4>Просмотренные:</h4>
						<?php foreach($recentlyViewed as $elem => $content) : ?>
						<div class="col-md-4 product-left p-left"> 
							<div class="product-main simpleCart_shelfItem">
								<a href="product/<?= $content['alias'] ?>" class="mask"><img class="img-responsive zoom-img" src="images/<?= $content['img'] ?>" alt="" /></a>
								<div class="product-bottom">
									<h3><?= $content['title']; ?></h3>
									<p>Explore Now</p>
									<h4><a class="item_add" href="#"><i></i></a> <span class=" item_price"><?= $content['price']; ?></span></h4>
									<?php if( $content['old_price'] ) : ?>

										<?php if( !empty( $symbol_right ) ) : ?>
											<small> <span class=" item_old_price"><?php echo $content['old_price'] * $value . ' ' . $symbol_right; ?></span></small>
										<?php else : ?>
											<small> <span class=" item_old_price"><?php echo $symbol_left . ' ' . $content['old_price'] * $value; ?></span></small>
										<?php endif; ?>

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
				<div class="col-md-3 single-right">
					<div class="w_sidebar">
						<section  class="sky-form">
							<h4>Catogories</h4>
							<div class="row1 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>All Accessories</label>
								</div>
								<div class="col col-4">								
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Women Watches</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Kids Watches</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Men Watches</label>			
								</div>
							</div>
						</section>
						<section  class="sky-form">
							<h4>Brand</h4>
							<div class="row1 row2 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>kurtas</label>
								</div>
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sonata</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Titan</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Casio</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Omax</label>
									<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>shree</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fastrack</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sports</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fossil</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Maxima</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Yepme</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Citizen</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Diesel</label>			
								</div>
							</div>
						</section>
						<section class="sky-form">
							<h4>Colour</h4>
								<ul class="w_nav2">
									<li><a class="color1" href="#"></a></li>
									<li><a class="color2" href="#"></a></li>
									<li><a class="color3" href="#"></a></li>
									<li><a class="color4" href="#"></a></li>
									<li><a class="color5" href="#"></a></li>
									<li><a class="color6" href="#"></a></li>
									<li><a class="color7" href="#"></a></li>
									<li><a class="color8" href="#"></a></li>
									<li><a class="color9" href="#"></a></li>
									<li><a class="color10" href="#"></a></li>
									<li><a class="color12" href="#"></a></li>
									<li><a class="color13" href="#"></a></li>
									<li><a class="color14" href="#"></a></li>
									<li><a class="color15" href="#"></a></li>
									<li><a class="color5" href="#"></a></li>
									<li><a class="color6" href="#"></a></li>
									<li><a class="color7" href="#"></a></li>
									<li><a class="color8" href="#"></a></li>
									<li><a class="color9" href="#"></a></li>
									<li><a class="color10" href="#"></a></li>
								</ul>
						</section>
						<section class="sky-form">
							<h4>discount</h4>
							<div class="row1 row2 scroll-pane">
								<div class="col col-4">
									<label class="radio"><input type="radio" name="radio" checked=""><i></i>60 % and above</label>
									<label class="radio"><input type="radio" name="radio"><i></i>50 % and above</label>
									<label class="radio"><input type="radio" name="radio"><i></i>40 % and above</label>
								</div>
								<div class="col col-4">
									<label class="radio"><input type="radio" name="radio"><i></i>30 % and above</label>
									<label class="radio"><input type="radio" name="radio"><i></i>20 % and above</label>
									<label class="radio"><input type="radio" name="radio"><i></i>10 % and above</label>
								</div>
							</div>						
						</section>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--end-single-->