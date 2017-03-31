<?php  
  $box_site_menu_cache_id = cache::cache_id('box_site_menu', array('language', isset($_GET['category_id']) ? $_GET['category_id'] : 0, isset($_GET['page_id']) ? $_GET['page_id'] : 0));
  if (cache::capture($box_site_menu_cache_id, 'file')) {
    
    
    $products_query = functions::catalog_products_query(array('sort' => 'popularity', 'limit' => settings::get('box_most_popular_products_num_items')*2));
    
    if (database::num_rows($products_query)) {
    
      $listing_products = array();
      while ($listing_product = database::fetch($products_query)) {
        $listing_products[] = $listing_product;
      }
      
      shuffle($listing_products);
      
      $listing_products = array_slice($listing_products, 0, settings::get('box_most_popular_products_num_items'));
    
      $box_site_menu = new view();
      
      $box_site_menu->snippets['products'] = array();
      foreach ($listing_products as $listing_product) {
        $box_site_menu->snippets['products'][] = $listing_product;
      }

      $products_query_all = functions::catalog_products_query();
      $box_site_menu->snippets['num']=database::num_rows($products_query_all);
      
      echo $box_site_menu->stitch('views/box_site_menu');
    }
    
    cache::end_capture($box_site_menu_cache_id);
  }
?>