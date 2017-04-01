<?php if ($listing_type == 'column') { ?>
  <li class="product column shadow hover-light">
    <a class="link" href="<?php echo htmlspecialchars($link) ?>" title="<?php echo htmlspecialchars($name); ?>">
      <div class="image-wrapper">
        <img class="image" src="<?php echo htmlspecialchars($image['thumbnail']); ?>" srcset="<?php echo htmlspecialchars($image['thumbnail']); ?> 1x, <?php echo htmlspecialchars($image['thumbnail_2x']); ?> 2x" alt="<?php echo htmlspecialchars($name); ?>" />
        <?php echo $sticker; ?>
      </div>
      <div class="name"><?php echo $name; ?></div>
      <div class="manufacturer"><?php echo $manufacturer_name ? $manufacturer_name : '&nbsp;'; ?></div>
      <div class="price-wrapper">
        <?php if ($campaign_price) { ?>
        <s class="regular-price"><?php echo $price; ?></s> <strong class="campaign-price"><?php echo $campaign_price; ?></strong>
        <?php } else { ?>
        <span class="price"><?php echo $price; ?></span>
        <?php } ?>
      </div>
    </a>
    <?php if ($image) { ?>
    <a href="<?php echo htmlspecialchars($image['original']); ?>" class="fancybox zoomable" data-fancybox-group="product-listing" title="<?php echo htmlspecialchars($name); ?>" style="position: absolute; top: 15px; right: 15px; color: inherit;"><?php echo functions::draw_fonticon('fa-search'); ?></a>
    <?php } ?>
  </li>
<?php } else if ($listing_type == 'row') { ?>
  <li class="product row shadow hover-light">
    <a class="link" href="<?php echo htmlspecialchars($link) ?>" title="<?php echo htmlspecialchars($name); ?>">
      <div class="image-wrapper">
        <img class="image" src="<?php echo htmlspecialchars($image['thumbnail']); ?>" srcset="<?php echo htmlspecialchars($image['thumbnail']); ?> 1x, <?php echo htmlspecialchars($image['thumbnail_2x']); ?> 2x" alt="<?php echo htmlspecialchars($name); ?>" />
        <?php echo $sticker; ?>
      </div>
      <div class="name"><?php echo $name; ?></div>
      <div class="manufacturer"><?php echo $manufacturer_name ? $manufacturer_name : '&nbsp;'; ?></div>
      <div class="description"><?php echo $short_description; ?></div>
      <div class="price-wrapper">
        <?php if ($campaign_price) { ?>
        <s class="regular-price"><?php echo $price; ?></s> <strong class="campaign-price"><?php echo $campaign_price; ?></strong>
        <?php } else { ?>
        <span class="price"><?php echo $price; ?></span>
        <?php } ?>
      </div>
    </a>
    <?php if ($image) { ?>
    <a href="<?php echo htmlspecialchars($image['original']); ?>" class="fancybox zoomable" data-fancybox-group="product-listing" title="<?php echo htmlspecialchars($name); ?>" style="position: absolute; top: 15px; right: 15px; color: inherit;"><?php echo functions::draw_fonticon('fa-search'); ?></a>
    <?php } ?>
  </li>
  <?php } else if ($listing_type == 'krrrunch') { 
  $price=(strpos($price, ".")===false) ? (is_numeric($price[strlen($price)-1])) ? $price.".00":str_replace(" ", '.00', $price):preg_replace('/\.([0-9]*)/', '.$1', $price);
      if($campaign_price){
              $campaign_price=(strpos($campaign_price, ".")===false) ? (is_numeric($campaign_price[strlen($campaign_price)-1])) ? $campaign_price.".00":str_replace(" ", '.00', $campaign_price):preg_replace('/\.([0-9]*)/', '.$1', $campaign_price);
            } ?>
  <input type="hidden" id="cantidad" name="quantity" value="1">
  <input type="hidden" class="link" name="link" value="<?php echo htmlspecialchars($link) ?>">
 <li aria-labelledby="productID" class="k-prod-thumbs__item">
          <a href="<?php echo htmlspecialchars($link) ?>" class="k-prod-thumbs__details">
            <span class="k-prod-thumbs__img">
              <img src="<?php echo htmlspecialchars($image['thumbnail']); ?>" alt="<?php echo $name ?>" />
            </span>
            <span class="k-prod-thumbs__info">
              <span class="k-thumb-info-wrap">
                <h3 id="productID"><?php echo $name; ?></h3>
                <h4><?php echo (strlen($short_description)>55) ? substr($short_description, 0, 55).'...':$short_description; ?></h4>
                <p><?php echo ($campaign_price) ? $campaign_price:$price; ?></p>
              </span>
            </span>
          </a>
        </li>
  <?php } else if ($listing_type == 'listing_krrrunch') { ?>
      <li class="product-row">
        <a href="<?php echo htmlspecialchars($link) ?>">
          <span class="product-row__img"> <img src="<?php echo htmlspecialchars($image['thumbnail']); ?>" alt="<?php echo $name ?>" />
          </span>
          <span class="product-row__name"><?php echo $name; ?></span>
        </a>
      </li>
<?php } else trigger_error('Unknown product listing type definition ('. $listing_type .')', E_USER_WARNING); ?>