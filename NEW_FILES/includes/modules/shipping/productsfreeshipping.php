<?php
/* -----------------------------------------------------------------------------------------
   $Id: productsfreeshipping.php 4856 2013-06-03 12:37:26Z Tomcraft $   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(productsfreeshipping.php,v 1.01 2002/01/24); www.oscommerce.com 
   (c) 2003  nextcommerce (productsfreeshipping.php,v 1.12 2003/08/24); www.nextcommerce.org
   (c) 2006 xt:Commerce; www.xt-commerce.com

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

  class productsfreeshipping {
    var $code, $title, $description, $icon, $enabled, $num_productsfreeshipping;

    function __construct() {
      global $order;

      $this->code = 'productsfreeshipping';
      $this->title = MODULE_SHIPPING_PRODUCTSFREESHIPPING_TEXT_TITLE;
      $this->description = MODULE_SHIPPING_PRODUCTSFREESHIPPING_TEXT_DESCRIPTION;
      $this->icon ='';   // change $this->icon =  DIR_WS_ICONS . 'shipping_ups.gif'; to some freeshipping icon
      $this->sort_order = MODULE_SHIPPING_PRODUCTSFREESHIPPING_SORT_ORDER;
      $this->enabled = ((MODULE_SHIPPING_PRODUCTSFREESHIPPING_STATUS == 'True') ? true : false);
      $this->no_mixed_products = ((MODULE_SHIPPING_PRODUCTSFREESHIPPING_SINGLE_PRODUCT == 'True') ? true : false);
    }

    function getValidCountries($products_id = 0) {
      $products_free_shipping_query = xtc_db_query("SELECT free_shipping_countries FROM ".TABLE_PRODUCTS_FREE_SHIPPING." WHERE products_id = '".$products_id."' AND free_shipping = '1'");
      $products_free_shipping = xtc_db_fetch_array($products_free_shipping_query);
      return $products_free_shipping['free_shipping_countries'];
    }

    function quote($method = '') {
      global $xtPrice, $order;

      $dest_country = $order->delivery['country']['iso_code_2'];
      $dest_zone = 0;

      $valid_products = array();

      foreach ($_SESSION["PRODUCTS_FREE_SHIPPING"] as $key => $value) {
        if($value["free_shipping"]) {
          $valid_products[] = array("products_id" => $value["products_id"]);
        }
      }

      

      for ($i=1; $i<=sizeof($valid_products); $i++) {
        $countries_table = $this->getValidCountries($valid_products[$i-1]["products_id"]);
        $countries_table  = preg_replace("'[\r\n\s]+'",'',$countries_table);
        $country_zones = explode(',', $countries_table);
        if (in_array($dest_country, $country_zones)) {
          $dest_zone = $i;
          break;
        }
        
      }

      $this->quotes = array('id'      => $this->code,
                            'module'  => $this->title);

      if($this->no_mixed_products) {
        $products_in_shopping_cart = sizeof($order->products);
        $free_products = sizeof($_SESSION["PRODUCTS_FREE_SHIPPING"]);
        if($free_products < $products_in_shopping_cart) {
          $this->enabled = false;
        }
      }

      if ($dest_zone == 0) {
        $this->enabled = false;
      } else {

        $this->quotes['methods'] = array(array('id' => $this->code,
                                                 'title' => MODULE_SHIPPING_PRODUCTSFREESHIPPING_TEXT_WAY,
                                                 'cost'  => 0));
      }

      if (xtc_not_null($this->icon)) $this->quotes['icon'] = xtc_image($this->icon, $this->title);
      
      if ($this->enabled)
        return $this->quotes;
    }

    function check() {
      if (!isset($this->_check)) {
        $check_query = xtc_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_SHIPPING_PRODUCTSFREESHIPPING_STATUS'");
        $this->_check = xtc_db_num_rows($check_query);
      }
      return $this->_check;
    }

    function install() {
      xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) values ('MODULE_SHIPPING_PRODUCTSFREESHIPPING_STATUS', 'True', '6', '7', 'xtc_cfg_select_option(array(\'True\', \'False\'), ', now())");
      xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) values ('MODULE_SHIPPING_PRODUCTSFREESHIPPING_DISPLAY', 'True', '6', '7', 'xtc_cfg_select_option(array(\'True\', \'False\'), ', now())");
      xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) values ('MODULE_SHIPPING_PRODUCTSFREESHIPPING_SINGLE_PRODUCT', 'True', '6', '7', 'xtc_cfg_select_option(array(\'True\', \'False\'), ', now())");
      xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) values ('MODULE_SHIPPING_PRODUCTSFREESHIPPING_SORT_ORDER', '0', '6', '4', now())");
    }

    function remove() {
      xtc_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      $keys = array('MODULE_SHIPPING_PRODUCTSFREESHIPPING_STATUS',
                    'MODULE_SHIPPING_PRODUCTSFREESHIPPING_SORT_ORDER',
                    'MODULE_SHIPPING_PRODUCTSFREESHIPPING_DISPLAY',
                    'MODULE_SHIPPING_PRODUCTSFREESHIPPING_SINGLE_PRODUCT'
                    );

      return $keys;
    }
  }
?>
