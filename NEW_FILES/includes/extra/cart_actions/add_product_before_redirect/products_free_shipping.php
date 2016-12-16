<?php

if(MODULE_CATEGORIES_PRODUCTS_FREE_SHIPPING_STATUS == "true") {

    function free_shipping_status($products_id) {
        $free_shipping = false;
        $free_shipping_query = xtc_db_query("SELECT free_shipping FROM ".TABLE_PRODUCTS_FREE_SHIPPING." WHERE products_id = '".$products_id."'");
        $free_shipping_result = xtc_db_fetch_array($free_shipping_query);
        if(!empty($free_shipping_result) && $free_shipping_result["free_shipping"] == '1') {
            $free_shipping = true;
        }
        return $free_shipping;
    }

    function check_free_amount($products_id) {
        $free_amount = false;
        $free_amount_query = xtc_db_query("SELECT free_shipping, max_free_shipping_amount FROM ".TABLE_PRODUCTS_FREE_SHIPPING." WHERE products_id = '".$products_id."'");
        $free_amount_result = xtc_db_fetch_array($free_amount_query);
        if(!empty($free_amount_result) && $free_amount_result["max_free_shipping_amount"] > 0 && $free_amount_result["free_shipping"] == "1") {
            $free_amount = true;
        }
        return $free_amount;
    }

    function check_cart_amount($products_id) {
        $cart_amount = false;
        $cart_amount_query = xtc_db_query("SELECT free_shipping, max_free_shipping_cart FROM ".TABLE_PRODUCTS_FREE_SHIPPING." WHERE products_id = '".$products_id."'");
        $cart_amount_result = xtc_db_fetch_array($cart_amount_query);
        if(!empty($cart_amount_result) && $cart_amount_result["max_free_shipping_cart"] > 0 && $cart_amount_result["free_shipping"] == "1") {
            $cart_amount = true;
        }
        return $cart_amount;
    }

    function check_allowed_amount($products_id, $qty) {
        $check_products_query = xtc_db_query("SELECT free_shipping, max_free_shipping_cart FROM ".TABLE_PRODUCTS_FREE_SHIPPING." WHERE products_id = '".$products_id."'");
        $check_product = xtc_db_fetch_array($check_products_query);

        if (!empty($check_product) && ($check_product['max_free_shipping_cart'] > 0) && ($qty > $check_product['max_free_shipping_cart']) ){
            return $check_product['max_free_shipping_cart'];
        } else {
            return $qty;
        }
    }

    function get_max_free_amount($products_id) {
        $max_free_amount_query = xtc_db_query("SELECT max_free_shipping_amount FROM ".TABLE_PRODUCTS_FREE_SHIPPING." WHERE products_id = '".$products_id."'");
        $max_free_amount = xtc_db_fetch_array($max_free_amount_query);
        if(!empty($max_free_amount) && $max_free_amount["max_free_shipping_amount"] > 0) {
            return $max_free_amount["max_free_shipping_amount"];
        } else {
            return 0;
        }
    }

    // add cart - start

    $products_in_cart = $cart_object->get_products();

    $_SESSION["PRODUCTS_FREE_SHIPPING"] = array();

    foreach ($products_in_cart as $key => $value) {

        $products_id = $value["id"];

        // check if free shipping flag is set
        
        if(free_shipping_status($products_id)) {

            $_SESSION["PRODUCTS_FREE_SHIPPING"][] = array("products_id" => $products_id, "free_shipping" => free_shipping_status($products_id));

            // check if a max cart amount was defined

            if(check_cart_amount($products_id)) {

                $qty = check_allowed_amount($products_id, $value["qty"]);
                    
                $cart_object->update_quantity($products_id, $qty);

            } else {

                // if max cart amount was not set, check if max free amount was set
                // and update session in case threshold exceeded

                if(check_free_amount($products_id)) {

                    // if threshold exceeded, set free shipping to false

                    if(get_max_free_amount($products_id) > 0 && get_max_free_amount($products_id) < $value["qty"]) {

                        for($i = 0; $i < sizeof($_SESSION["PRODUCTS_FREE_SHIPPING"]); $i++) {

                            if($_SESSION["PRODUCTS_FREE_SHIPPING"][$i]["products_id"] == $products_id) {

                                $_SESSION["PRODUCTS_FREE_SHIPPING"][$i]["free_shipping"] = false;

                            }

                        }

                    }

                }

            }
           
        }
        
    }

    // add cart - end
}

?>