<?php $detect = new Mobile_Detect; ?>
<main class="main-checkout-cart">
    <div class="k-workspace">
        <div class="k-wrap">
            <h1>Carrito</h1>
            <div class="k-cart-steps">
                <ol class="k-list">
                    <li class="current-step"><span class="k-cart-steps__text">Carrito</span></li>
                    <li><span class="k-cart-steps__text">Envío</span></li>
                    <li><span class="k-cart-steps__text">Pago</span></li>
                    <li><span class="k-cart-steps__text">Confirmación</span></li>
                </ol>
            </div>
            <div class="k-cart-products">
                <div class="k-cart-products__wrap">
                    <div class="k-cart-products__row k-cart-products__headings">
                        <h4 id="product-info">Producto</h4>
                        <h4 id="product-price">Precio</h4>
                        <h4 id="product-quantity">Cantidad</h4>
                        <h4 id="product-total">Total</h4>
                        <span aria-hidden="true" class="k-cart-products__col k-cart-remove"></span>
                    </div>
                    <?php $total=0; 
                     foreach ($items as $key => $item) { ?>
                    <div class="k-cart-products__row">
                        <a href="<?php echo $item['link']; ?>">
                            <span class="k-cart-products__col k-cart-item-info" aria-labelledby="product-info" >
                                <div class="k-cart-item-img"><img src="<?php echo htmlspecialchars($item['thumbnail']); ?>" alt="<?php echo $item['name']; ?>" /></div>
                                <div class="k-cart-item-text">
                                    <h4><?php echo $item['name']; ?></h4>
                                    <p><?php if($item['sku']) echo $item['sku']; ?></p>
                                    <p><?php if (!empty($item['options'])) echo '<p>'. implode('<br />', $item['options']) .'</p>' . PHP_EOL; ?></p>
                                </div>
                            </span>
                        </a>
                            <span class="k-cart-products__col k-cart-item-price" aria-labelledby="product-price">
                                <?php if($item['quantity']>0){ ?> 
                                <p><?php echo currency::format($item['price'], false); ?></p>
                                <?php }else{ 
                                 if ($detect->isMobile()){ ?> 
                                    <span style="font-size: 20px;font-weight: bold;" class="k-form__error-msg"><?php echo language::translate('title_cart_sold_out', 'Sold Out'); ?></span>
                                 <?php } ?>
                                <?php } ?>
                            </span>
                            <span class="k-cart-products__col k-cart-item-quantity" aria-labelledby="product-quantity">
                            <?php if($item['quantity']>0){ ?> 
                                <input onchange="updateQuantity('<?php echo $key ?>');" id="productQuantity-<?php echo $key ?>" value="<?php echo $item['quantity'] ?>" type="number" />
                                <?php } ?>
                            </span>
                            <span class="k-cart-products__col k-cart-item-total" aria-labelledby="product-total">
                                <?php if($item['quantity']>0 ){ ?>
                                    <p><?php echo currency::format($item['price']*$item['quantity'], false); ?></p>
                                <?php }else{ ?>
                                <span style="font-size: 20px;font-weight: bold;" class="k-form__error-msg">Agotado</span>
                                <?php } ?> 
                            </span>
                            <span class="k-cart-products__col k-cart-remove">
                            <?php echo functions::form_draw_form_begin('cart_form','post', false, false,'id="formCart-'.$key.'"') . functions::form_draw_hidden_field('key', $key); ?>
                            <a class="no_under" href="">
                            <button class="remove-product" aria-label="Remover producto"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" role="img"><title>Remover Producto</title><desc>Botón para remover el producto</desc><path d="M5.6 7l-4.3 4.3c-.4.4-.4 1 0 1.4.4.4 1 .4 1.4 0L7 8.4l4.3 4.3c.4.4 1 .4 1.4 0 .4-.4.4-1 0-1.4L8.4 7l4.3-4.3c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0L7 5.6 2.7 1.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4L5.6 7z"/></svg></button></a></span>
                            <input type="hidden" id="hdProduct-<?php echo $key ?>" name="remove_cart_item" value="Remove" />
                        </div>
                    <?php echo functions::form_draw_form_end(); ?>
                    <?php $total+=$item['price']*$item['quantity'];
                       } ?>
                </div>
                
            </div>
            <div class="k-cart-summary grid">
             <div class="k-cart-totals">
                <div class="k-cart-totals__titles"><h4 id="subtotal">Subtotal</h4> <?php if(isset($_COOKIE['codpostal'])){ echo '<h4 id="envio">Envío</h4>'; } ?><h4 id="total">Total</h4></div>
                <div class="k-cart-totals__numbers"><p aria-labelledby="subtotal"><?php echo currency::format($total, false); ?></p>  <?php if(isset($_COOKIE['codpostal'])){ $encry_price=unserialize($_COOKIE['codpostal'])['price']; echo '<p aria-labelledby="total">'.functions::fedex_decrypt($encry_price).'</p>'; } ?> 
                <?php if(isset($_COOKIE['codpostal'])){ $encry_price=str_replace("$", "", functions::fedex_decrypt($encry_price)); ?> 
                     <p aria-labelledby="total"><?php echo currency::format($total+$encry_price, false); ?></p>
                <?php } else { ?> 
                      <p aria-labelledby="total"><?php echo currency::format($total, false); ?></p>
                <?php } ?>
               </div>
            </div> 
        </div>
        <div class="k-cart-action grid">
            <a onclick="step1(); return false;" href="#" class="k-btn">Continuar compra</a>
            <a onclick="history.back(); return false;" href="#" class="regresar-link">&laquo; Regresar</a>
        </div>
    </div>
</div>
</main>