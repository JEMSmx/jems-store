 <?php  if (settings::get('promo_message')) { ?> 
<section class="k-home-alert" id="home-alert">
  <div class="k-home-alert-container">
    <div class="k-home-alert-container-center">
      <p><?php echo settings::get('promo_message'); ?></p>
    </div>
    <div class="k-home-alert-container-close" onclick="toggAlert()">
      <img src="{snippet:template_path}assets/images/times.svg" alt="">
    </div>
  </div>
</section>
<?php } ?>