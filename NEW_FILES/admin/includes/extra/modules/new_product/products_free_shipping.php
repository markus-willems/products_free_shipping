<?php

if(defined('MODULE_CATEGORIES_PRODUCTS_FREE_SHIPPING_STATUS') && strtolower(MODULE_CATEGORIES_PRODUCTS_FREE_SHIPPING_STATUS) == 'true') {

	defined( '_VALID_XTC' ) or die( 'Direct Access to this location is not allowed.' );
	
	$products_free_shipping_query = xtc_db_query("SELECT * 
														FROM ".TABLE_PRODUCTS_FREE_SHIPPING."
														WHERE products_id = '".$pInfo->products_id."'");
	$products_free_shipping = xtc_db_fetch_array($products_free_shipping_query);

?>

<div style="padding:5px;">
	<div class="main div_header"><?php echo HEADING_PRODUCTS_FREE_SHIPPING; ?></div>
	<table class="tableInput">
	 	<tr>
	    	<td><span class="main"><?php echo TEXT_PRODUCTS_FREE_SHIPPING; ?></span></td>
	    	<td><span class="main"><?php echo xtc_draw_pull_down_menu('free_shipping', 'checkbox', (isset($products_free_shipping['free_shipping']) && $products_free_shipping['free_shipping']==1 ? true : false)); ?></span></td>
	    	<td><span class="main"><?php echo TEXT_PRODUCTS_FREE_SHIPPING_INFO; ?></span></td>
	  	</tr>
	  	<tr>
	    	<td><span class="main"><?php echo TEXT_PRODUCTS_FREE_SHIPPING_AMOUNT_1; ?></span></td>
	    	<td><span class="main"><?php echo xtc_draw_input_field('max_free_shipping_cart', $products_free_shipping['max_free_shipping_cart'] ,'style="width: 155px"'); ?></span></td>
	    	<td><span class="main"><?php echo TEXT_PRODUCTS_FREE_SHIPPING_AMOUNT_1_INFO; ?></span></td>
		</tr>
		<tr>
	    	<td><span class="main"><?php echo TEXT_PRODUCTS_FREE_SHIPPING_AMOUNT_2; ?></span></td>
	    	<td><span class="main"><?php echo xtc_draw_input_field('max_free_shipping_amount', $products_free_shipping['max_free_shipping_amount'] ,'style="width: 155px"'); ?></span></td>
	    	<td><span class="main"><?php echo TEXT_PRODUCTS_FREE_SHIPPING_AMOUNT_2_INFO; ?></span></td>
		</tr>
		<tr>
	    	<td><span class="main"><?php echo TEXT_PRODUCTS_FREE_SHIPPING_COUNTRIES; ?></span></td>
	    	<td><span class="main"><?php echo xtc_draw_input_field('free_shipping_countries', $products_free_shipping['free_shipping_countries'] ,'style="width: 155px"'); ?></span></td>
	    	<td><span class="main"><?php echo TEXT_PRODUCTS_FREE_SHIPPING_COUNTRIES_INFO; ?></span></td>
		</tr>
	</table>
</div>

<?php
}
?>