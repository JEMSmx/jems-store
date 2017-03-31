<section class="nav-section nav-section--bottom">
  <div class="inner-nav-wrap">
    <ul class="k-list">
      <?php foreach ($pages as $page) echo '<li><a href="'.htmlspecialchars($page['link']).'">'.$page['title'].'</a></li>'?>
      <li><a href="<?php echo document::ilink('contact'); ?>">Contacto</a></li>
    </ul>
    <ul class="k-social k-list">
       <?php if(settings::get('url_facebook')){ ?>
            <li><a href="<?php echo settings::get('url_facebook'); ?>" target="_blank" rel="noopener"><img src="{snippet:template_path}assets/images/mobile-fb-icon.svg" alt="Dale like a nuestra página en Facebook - Ecoled"></a></li>
          <?php } ?>
          <?php if(settings::get('url_twitter')){ ?>
            <li><a href="<?php echo settings::get('url_twitter'); ?>" target="_blank" rel="noopener"><img src="{snippet:template_path}assets/images/mobile-tw-icon.svg" alt="Siguenos en Twitter -Ecoled"></a></li>
          <?php } ?>
          <?php if(settings::get('url_google')){ ?>
           <li><a href="<?php echo settings::get('url_google'); ?>" target="_blank" rel="noopener"><img src="{snippet:template_path}assets/images/mobile-gplus-icon.svg" alt="Siguenos en Google plus - Ecoled"></a></li>

          <?php } ?>
          <?php if(settings::get('url_instagram')){ ?>
           <li><a href="<?php echo settings::get('url_instagram'); ?>" target="_blank" rel="noopener"><img src="{snippet:template_path}assets/images/mobile-instagram-icon.svg" alt="Siguenos en Instagram - Ecoled"></a></li>

          <?php } ?>
          <?php if(settings::get('url_pinterest')){ ?>
            <li><a href="<?php echo settings::get('url_pinterest'); ?>" target="_blank" rel="noopener"><img src="{snippet:template_path}assets/images/mobile-pinterest-icon.svg" alt="Mira las fotos y sigue nuestros productos en Pinterest - Ecoled"></a></li>
          <?php } ?>
    </ul>
  </div>
</section>