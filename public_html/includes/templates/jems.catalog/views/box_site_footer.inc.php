<footer class="k-footer">
    <div class="wrap wider grid">

      <div class="k-sitemap unit half">
       <?php foreach ($items as $item) { ?> 
        <div class="k-container">
        <a href="<?php echo htmlspecialchars($item['link']); ?>">
          <h5 class="k-heading"><?php echo $item['title'] ?></h5>
        </a>
          <ul>
            <?php foreach ($item['subitems'] as $subcategory){ ?> 
             <li><a href="<?php echo htmlspecialchars($subcategory['link']); ?>"><?php echo $subcategory['title']; ?></a></li>
            <?php } ?>
          </ul>
        </div>
      <?php } ?> 

        
      </div>

      <div class="k-address unit half">
        <address>
          <h5 class="k-heading">Contact us H5</h5>
          <?php foreach ($pages as $page) echo '<small><a href="'. htmlspecialchars($page['link']) .'">'. $page['title'] .'</a></small>' . PHP_EOL; ?>
          <?php if(settings::get('url_facebook')){ ?>
            <a href="<?php echo settings::get('url_facebook'); ?>" alt="Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
          <?php } ?>
          <?php if(settings::get('url_google')){ ?>
            <a href="<?php echo settings::get('url_google'); ?>" alt="Google +"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
          <?php } ?>
          <?php if(settings::get('url_twitter')){ ?>
            <a href="<?php echo settings::get('url_twitter'); ?>" alt="Twitter"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
          <?php } ?>
          <?php if(settings::get('url_pinterest')){ ?>
            <a href="<?php echo settings::get('url_pinterest'); ?>" alt="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
          <?php } ?>
          <?php if(settings::get('url_instagram')){ ?>
            <a href="<?php echo settings::get('url_instagram'); ?>" alt="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
          <?php } ?>  
        </address>
      </div>

      <div class="k-details">
        <small>&copy; <?php echo date('Y'); ?></small>

        <ul>
        <?php foreach ($customer_service_pages as $number=>$service_page) {
            echo '<li><a href="'. htmlspecialchars($service_page['link']) .'">'. $service_page['title'] .'</a><li>'. PHP_EOL;
          } ?>
        </ul>
      </div>

    </div>
  </footer>