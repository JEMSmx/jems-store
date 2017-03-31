<?php
  if (settings::get('catalog_only_mode')) return;
  
  $box_cart_mobile = new view();
  $box_cart_mobile->snippets = array(
    'link' => document::ilink('checkout'),
    'num_items' => cart::$total['items'],
    'cart_total' => !empty(customer::$data['display_prices_including_tax']) ? currency::format(cart::$total['value'] + cart::$total['tax']) : currency::format(cart::$total['value']),
  );
  
  echo $box_cart_mobile->stitch('views/box_cart_mobile');
?>
