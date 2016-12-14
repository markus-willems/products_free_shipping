CREATE TABLE `products_free_shipping` (
  `products_id` int(11) DEFAULT NULL,
  `free_shipping` tinyint(1) DEFAULT '0',
  `free_shipping_countries` text NOT NULL,
  `max_free_shipping_cart` int(11) DEFAULT '0',
  `max_free_shipping_amount` int(11) DEFAULT '0',
  KEY `idx_products_id` (`products_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;