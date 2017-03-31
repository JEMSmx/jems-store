<?php

  $display_menu=array('store_info');
 
  $app_config = array(
    'name' => language::translate('site_settings_menu_title', 'Title menu settings'),
    'default' => 'store_info',
    'theme' => array(
      'color' => '#a3a3a3',
      'icon' => 'fa-cogs',
    ),
    'menu' => array(),
    'docs' => array(),
  );

  $settings_groups_query = database::query(
    "select * from ". DB_TABLE_SETTINGS_GROUPS ."
    order by priority, `key`;"
  );
  while ($group = database::fetch($settings_groups_query)) {
    if(!in_array($group['key'], $display_menu)) continue;
    $app_config['menu'][] = array(
      'title' => language::translate('site_settings_group:title_'.$group['key'], $group['name']),
      'doc' => $group['key'],
      'params' => array(),
    );
    $app_config['docs'][$group['key']] = 'site.inc.php';
  }

  $app_config['menu'][] = array(
      'title' => language::translate('title_slides', 'Slides'),
      'doc' => 'slides',
      'params' => array(),
    );
   $app_config['docs']['slides'] = '../slides.app/slides.inc.php';
   $app_config['docs']['edit_slide'] = '../slides.app/edit_slide.inc.php';

   $app_config['menu'][] = array(
      'title' => language::translate('title_pages', 'Pages'),
      'doc' => 'pages',
      'params' => array(),
    );
   $app_config['docs']['pages'] = '../pages.app/pages.inc.php';
   $app_config['docs']['edit_page'] = '../pages.app/edit_page.inc.php';
?>