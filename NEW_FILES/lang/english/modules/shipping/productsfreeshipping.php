<?php
/* -----------------------------------------------------------------------------------------
   $Id: freeamount.php 4855 2013-06-03 12:15:20Z Tomcraft $   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce( freeamount.php,v 1.01 2002/01/24 03:25:00); www.oscommerce.com 
   (c) 2003	 nextcommerce (freeamount.php,v 1.4 2003/08/13); www.nextcommerce.org
   (c) 2006 xt:Commerce; www.xt-commerce.com

   Released under the GNU General Public License 
   -----------------------------------------------------------------------------------------
   Third Party contributions:
   freeamountv2-p1         	Autor:	dwk

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_TEXT_TITLE', 'Free Shipping');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_TEXT_DESCRIPTION', 'Free Shipping w/ Minimum Order Amount');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_TEXT_WAY', 'Free Shipping');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_INVALID_ZONE', 'Unfortunately it is not possible to dispatch into this country');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_SORT_ORDER', 'Sort Order');

define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_ALLOWED_TITLE' , 'Allowed Zones');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_ALLOWED_DESC' , 'Please enter the zones <b>separately</b> which should be allowed to use this modul (e. g. AT,DE (leave empty if you want to allow all zones))');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_STATUS_TITLE' , 'Enable Free Shipping with Minimum Purchase');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_STATUS_DESC' , 'Do you want to offer free shipping?');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_DISPLAY_TITLE' , 'Enable Display');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_DISPLAY_DESC' , 'Do you want to display text way if the minimum amount is not reached?');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_ZONE_TITLE' , 'Shipping Zone');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_ZONE_DESC' , 'If you choose a zone only this shipping zones used.');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_SORT_ORDER_TITLE' , 'Display order');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_SORT_ORDER_DESC' , 'Lowest will be displayed first.');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_NUMBER_ZONES_TITLE' , 'Number of zones');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_NUMBER_ZONES_DESC' , 'Number of zones to use');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_DISPLAY_TITLE' , 'Enable Display');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_DISPLAY_DESC' , 'Do you want to display, if shipping to destination is not possible or if shipping costs cannot be calculated?');

?>
