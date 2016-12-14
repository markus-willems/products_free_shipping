<?php

if(MODULE_CATEGORIES_PRODUCTS_FREE_SHIPPING_STATUS == 'true') {

	function free_shipping_status($products_id) {
	    $free_shipping = false;
	    $free_shipping_query = xtc_db_query("SELECT free_shipping FROM ".TABLE_PRODUCTS_FREE_SHIPPING." WHERE products_id = '".$products_id."'");
	    $free_shipping_result = xtc_db_fetch_array($free_shipping_query);
	    if(!empty($free_shipping_result) && $free_shipping_result["free_shipping"] == '1') {
	        $free_shipping = true;
	    }
	    return $free_shipping;
	}

	$products_free_shipping_text = "";
	if(free_shipping_status($product->data["products_id"]) == "1") {
		$products_free_shipping_text = SHIPPING_NO_COSTS_PRODUCT;
	}

	$info_smarty->assign("PRODUCTS_FREE_SHIPPING", $products_free_shipping_text);
}

?>