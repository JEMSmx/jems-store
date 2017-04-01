<main class="main-product-block">
    <div class="k-workspace">
        <div class="k-wrap k-wrap--fluid">
        <h3><?php echo language::translate('title_campaigns', 'Campaigns'); ?></h3>
            <ul class="k-prod-thumbs">
            	<?php foreach ($products as $product) echo functions::draw_listing_product($product, 'krrrunch'); ?>
            </ul>
        </div>
    </div>
</main>