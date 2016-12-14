<?php
/* 
  admin/includes/modules/categories/products_free_shipping.php
*/
defined( '_VALID_XTC' ) or die( 'Direct Access to this location is not allowed.' );

class products_free_shipping {
  function __construct()
  {
    $this->code = 'products_free_shipping'; //Important same name as class name
    $this->title = 'products_free_shipping';
    $this->description = 'products_free_shipping';        
    $this->name = 'MODULE_CATEGORIES_'.strtoupper($this->code);
    $this->enabled = defined($this->name.'_STATUS') && strtolower(constant($this->name.'_STATUS')) == 'true' ? true : false;
    $this->sort_order = defined($this->name.'_SORT_ORDER') ? constant($this->name.'_SORT_ORDER') : '';
    
    $this->translate();
  }
  
  function translate() {
    switch ($_SESSION['language_code']) {
      case 'de':
        $this->description = 'Speichert die neuen Werte des products_free_shipping';
        break;
      default:
        $this->description = 'Saves the values of the products_free_shipping';
        break;
    }
  }
  
  function check() {
    if (!isset($this->_check)) {
      $check_query = xtc_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = '".$this->name."_STATUS'");
      $this->_check = xtc_db_num_rows($check_query);
    }
    return $this->_check;
  }
  
  function keys() {
    define($this->name.'_STATUS_TITLE', TEXT_DEFAULT_STATUS_TITLE);
    define($this->name.'_STATUS_DESC', TEXT_DEFAULT_STATUS_DESC);
    define($this->name.'_SORT_ORDER_TITLE', TEXT_DEFAULT_SORT_ORDER_TITLE);
    define($this->name.'_SORT_ORDER_DESC', TEXT_DEFAULT_SORT_ORDER_DESC);
    
    return array(
      $this->name.'_STATUS', 
      $this->name.'_SORT_ORDER'
    );
  }

  function install() {
    xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) values ('".$this->name."_STATUS', 'true','6', '1','xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
    xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) values ('".$this->name."_SORT_ORDER', '10','6', '2', now())");
  }

  function remove() {
    xtc_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key LIKE '".$this->name."_%'");
  }

  //--- BEGIN CUSTOM  CLASS METHODS ---//
  
  function insert_product_after($products_data,$products_id) {
    $products_add = array(
      'products_id'               => $products_id,
      'free_shipping'             => xtc_db_prepare_input($products_data['free_shipping']),
      'free_shipping_countries'   => xtc_db_prepare_input($products_data['free_shipping_countries']),
      'max_free_shipping_cart'  => xtc_db_prepare_input($products_data['max_free_shipping_cart']),
      'max_free_shipping_amount'    => xtc_db_prepare_input($products_data['max_free_shipping_amount']),
    );
    
    $query = xtc_db_query("SELECT COUNT(*) as count FROM ".TABLE_PRODUCTS_FREE_SHIPPING." WHERE products_id = '".xtc_db_input($products_id)."'");
    $query_count = xtc_db_fetch_array($query);
    if ($query_count['count']) {
      xtc_db_perform(TABLE_PRODUCTS_FREE_SHIPPING, $products_add, 'update', "products_id = '".xtc_db_input($products_id)."'");
    } else {
      xtc_db_perform(TABLE_PRODUCTS_FREE_SHIPPING, $products_add);
    }

    return $products_data;
  }
 
}
?>