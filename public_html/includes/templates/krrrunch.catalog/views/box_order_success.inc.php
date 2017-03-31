<div id="box-order-success" class="box">
  <main class="main-error">
    <div class="k-workspace">
      <div class="k-wrap">
        <div class="k-error">
          <img class="k-error__img" src="{snippet:template_path}assets/images/empty-cart-icon.svg" alt="Error 404 - Página no encontrada" width="80px">
          <h1 class="k-error__title"><?php echo language::translate('title_order_completed', 'Your order is successfully completed!'); ?></h1>
          <p class="k-error__text"><?php echo language::translate('description_order_completed', 'Thank you for shopping in our store. We will process your order shortly.'); ?></p>
          <a class="k-btn" href="<?php echo htmlspecialchars($printable_link); ?>"  class="fancybox"><?php echo language::translate('description_click_printable_copy', 'Click here for a printable copy'); ?></a>
        </div>
      </div>
    </div>
  </main>
    <?php if ($payment_receipt) { ?>
    <?php echo $payment_receipt; ?>
    <?php } ?>
    
    <?php if ($order_success_modules_output) { ?>
    <?php echo $order_success_modules_output; ?>
    <?php } ?>
</div>
  