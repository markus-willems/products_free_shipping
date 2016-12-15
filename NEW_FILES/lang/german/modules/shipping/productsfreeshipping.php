<?php
/* -----------------------------------------------------------------------------------------
   $Id: productsfreeshipping.php 4855 2013-06-03 12:15:20Z Tomcraft $   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce( productsfreeshipping.php,v 1.01 2002/01/24 03:25:00); www.oscommerce.com 
   (c) 2003	 nextcommerce (productsfreeshipping.php,v 1.4 2003/08/13); www.nextcommerce.org
   (c) 2006 xt:Commerce; www.xt-commerce.com

   Released under the GNU General Public License 
   -----------------------------------------------------------------------------------------
   Third Party contributions:
   productsfreeshippingv2-p1         	Autor:	dwk

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_TEXT_TITLE', 'Versandkostenfrei');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_TEXT_DESCRIPTION', 'Versandkostenfreie Lieferung');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_TEXT_WAY', 'Versandkostenfreie Lieferung');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_INVALID_ZONE', 'Es ist leider kein Versand in dieses Land m&ouml;glich');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_SORT_ORDER', 'Sortierreihenfolge');

define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_ALLOWED_TITLE' , 'Erlaubte Versandzonen');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_ALLOWED_DESC' , 'Geben Sie <b>einzeln</b> die Zonen an, in welche ein Versand m&ouml;glich sein soll. (z.B. AT,DE (lassen Sie dieses Feld leer, wenn Sie alle Zonen erlauben wollen))');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_STATUS_TITLE' , 'Versandkostenfreie Lieferung aktivieren');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_STATUS_DESC' , 'M&ouml;chten Sie Versandkostenfreie Lieferung anbieten?');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_DISPLAY_TITLE' , 'Anzeige aktivieren');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_DISPLAY_DESC' , 'M&ouml;chten Sie anzeigen, wenn der Mindestbetrag zur VK-freien Lieferung nicht erreicht ist?');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_ZONE_TITLE' , 'Versand Zone');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_ZONE_DESC' , 'Wenn Sie eine Zone ausw&auml;hlen, wird diese Versandart nur in dieser Zone angeboten.');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_SORT_ORDER_TITLE' , 'Sortierreihenfolge');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_SORT_ORDER_DESC' , 'Reihenfolge der Anzeige');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_NUMBER_ZONES_TITLE' , 'Anzahl der Zonen');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_NUMBER_ZONES_DESC' , 'Anzahl der bereitgestellten Zonen');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_DISPLAY_TITLE' , 'Anzeige aktivieren');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_DISPLAY_DESC' , 'M&ouml;chten Sie anzeigen, wenn kein Versand in das Land m&ouml;glich ist bzw. keine Versandkosten berechnet werden konnten?');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_SINGLE_PRODUCT_TITLE' , 'Keine gemischten Artikel');
define('MODULE_SHIPPING_PRODUCTSFREESHIPPING_SINGLE_PRODUCT_DESC' , 'M&ouml;chten Sie, dass die Versandkostenfreiheit nicht f&uuml;r gemischte (versandkostenfreie und normale) Artikel im Warenkorb gilt?');
?>
