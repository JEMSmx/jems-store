<?php
  if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    header('Content-type: text/html; charset='. language::$selected['charset']);
    document::$layout = 'ajax';
    header('X-Robots-Tag: noindex');
  }
  
  if (empty(cart::$items)) { ?>
  <main class="main-error">
        <div class="k-workspace">
            <div class="k-wrap">
                <div class="k-error">
                  <img class="k-error__img" src="{snippet:template_path}assets/images/empty-cart-icon.svg" alt="Carrito de compras" width="80px"/>
                    <h1 class="k-error__title"><?php echo language::translate('title_cart_empty', 'Cart empty'); ?></h1>
                    <p class="k-error__text"><?php echo language::translate('title_description_cart_empty', 'Description cart empty'); ?></p>
                    <a class="k-btn" href="<?php echo document::ilink('search'); ?>"><?php echo language::translate('action_buttton_cart_empty', 'Action button cart'); ?></a>
                </div>
            </div>
        </div>
    </main>
  <?php
    return;
  }
  
  $box_checkout_cart = new view();
  
  $box_checkout_cart->snippets['items'] = array();
  foreach (cart::$items as $key => $item) {
    $box_checkout_cart->snippets['items'][$key] = array(
      'id' => $item['id'],
      'product_id' => $item['product_id'],
      'link' => document::ilink('product', array('product_id' => $item['product_id'])),
      'thumbnail' => functions::image_thumbnail(FS_DIR_HTTP_ROOT . WS_DIR_IMAGES . $item['image'], 320, 320, 'FIT_USE_WHITESPACING'),
      'name' => $item['name'],
      'sku' => $item['sku'],
      'options' => array(),
      'price' => $item['price'],
      'orderable' => $item['orderable'],
      'tax_class_id' => $item['tax_class_id'],
      'quantity' => (float)$item['quantity'],
      'quantity_unit' => $item['quantity_unit'],
    );
    if (!empty($item['options'])) {
      foreach ($item['options'] as $k => $v) {
        $box_checkout_cart->snippets['items'][$key]['options'][] = $k .': '. $v;
      }
    }
  }

  
  echo $box_checkout_cart->stitch('views/box_checkout_cart');
  
?>
