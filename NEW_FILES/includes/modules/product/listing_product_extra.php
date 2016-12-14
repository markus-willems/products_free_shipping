<?php

class listing_product_extra {
    function __construct() {
        $this->code = 'listing_product_extra';
        $this->title = 'Artikelisten Extra';
        $this->description = '';
        $this->name = 'MODULE_PRODUCT_'.strtoupper($this->code);
        $this->enabled = defined($this->name.'_STATUS') && constant($this->name.'_STATUS') == 'true' ? true : false;
        $this->sort_order = defined($this->name.'_SORT_ORDER') ? constant($this->name.'_SORT_ORDER') : '';
        $this->translate();
    }

    function translate() {
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

    function buildDataArray($productData, $array, $image) {

        // products free shipping - start
        if(MODULE_CATEGORIES_PRODUCTS_FREE_SHIPPING_STATUS == 'true') {
            $productData['PRODUCTS_SHIPPING_LINK'] = $this->get_products_free_shipping($array['products_id']);
        }
        // products free shipping - end
        
        return $productData;
    }

    // products free shipping - start
    function get_products_free_shipping($products_id) {
        global $main;
        $shipping = $main->getShippingLink();
        $products_free_shipping_query = xtc_db_query("SELECT free_shipping FROM ".TABLE_PRODUCTS_FREE_SHIPPING." WHERE products_id = '".$products_id."'");
        $products_free_shipping = xtc_db_fetch_array($products_free_shipping_query);
        if(!empty($products_free_shipping) && $products_free_shipping['free_shipping'] == '1') {
           $shipping = SHIPPING_NO_COSTS_PRODUCT;
        }
        return $shipping;
    }
    // products free shipping - end

}

?>