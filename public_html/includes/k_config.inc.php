<?php

// Authorization
	define('K_USERS_AUTHORIZATION', serialize(array(
		'root' => array('*'),
    	'admin' => array('manage-product', 'load-app:catalog', 'load-app:customers', 'load-app:orders', 'load-app:reports', 'load-app:slides','load-app:users','load-app:pages'),
	)));

// Database
	define('DB_TABLE_K_PREFIX', 'k_');
	define('DB_TABLE_PRODUCTS_VIDEOS', 					 '`'. DB_DATABASE .'`.`'. DB_TABLE_PREFIX . 'products_videos`');
	define('DB_TABLE_K_PRODUCTS_SHOWCASES_ROW', '`'. DB_DATABASE .'`.`'. DB_TABLE_K_PREFIX . 'product_showcases_row`');
	define('DB_TABLE_K_PRODUCTS_SHOWCASES_COLUMN', '`'. DB_DATABASE .'`.`'. DB_TABLE_K_PREFIX . 'product_showcases_column`');