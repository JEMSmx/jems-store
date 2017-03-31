<section class="nav-section nav-section--top">
	<ul class="k-list">
		<li class="nav-item"><a class="nav-link" href="<?php echo document::ilink(''); ?>">Inicio</a></li>
		<li class="nav-item"><a class="nav-link" id="productos-nav" href="<?php echo document::ilink('search'); ?>">Productos</a>
			<div aria-labelledby="productos-nav" class="product-pop-up">
				<ul>
				<?php foreach ($products as $value=>$product){
					if(count($products)==$value+1 && $num<5)
						echo str_replace('<li class="product-row">', '<li class="product-row" style="border-bottom:0">', functions::draw_listing_product($product, 'listing_krrrunch'));
					else
						echo functions::draw_listing_product($product, 'listing_krrrunch');
					}  ?>
				</ul>
				<?php if($num>4){ ?>
					<a href="<?php echo document::ilink('search'); ?>" class="k-btn k-btn--full">Todos los productos</a>
				<?php } ?>
			</div>
		</li>
		<?php include vmod::check(FS_DIR_HTTP_ROOT . WS_DIR_BOXES . 'box_cart.inc.php'); ?>
	</ul>
</section>