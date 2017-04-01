<?php if(count($products)==0){ ?>
  <main class="main-error">
        <div class="k-workspace">
            <div class="k-wrap">
                <div class="k-error">
                    <img class="k-error__img" src="{snippet:template_path}assets/images/no-results-icon.svg" alt="Busqueda" width="80px"/>
                    <h1 class="k-error__title"><?php echo $no_results; ?></h1>
                    <p class="k-error__text"><?php echo language::translate('description_no_results', 'Description no results found') ?></p>
                    <a class="k-btn" href="<?php echo document::ilink('search'); ?>"><?php echo language::translate('button_action_no_results','Button action no results'); ?></a>
                </div>
            </div>
        </div>
    </main>
 <?php return; } ?> 
 <main class="main-products-list">
    <div class="k-workspace">
      <div class="k-wrap">
        <section class="products-list-wrap">
          <h1><?php echo $title; ?></h1>
          <?php if ($products) { ?>
            <ul class="k-prod-thumbs">
              <?php foreach ($products as $product) echo functions::draw_listing_product($product, 'krrrunch'); ?>
             </ul>
            <?php } ?>
          <?php echo $pagination; ?>
        </section>
      </div>
    </div>
  </main>
