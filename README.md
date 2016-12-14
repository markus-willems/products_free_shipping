# products_free_shipping

products_free_shipping module for modified eCommerce Shopsoftware 2.0.1.0 rev 10403 based on [MODUL: Zusatzfelder in der Artikel-Bearbeitung für versandkostenfreie Artikel](http://www.modified-shop.org/forum/index.php?topic=12704.0)

##Install

0. Make backup of DB + FTP
1. Import products_free_shipping.sql
2. Transfer files from NEW_FILES folder into the root folder of the shop
3. Backend > Modules > Class Extensions Modules: install products_free_shipping (categories) and listing_product_extra (product)
4. Backend > Modules > Shipping Methods: install productsfreeshipping
5. In /templates/**\<active_template\>**/module/product_info/product_info_tabs_v1.html:

search for
```
{if $PRODUCTS_SHIPPING_LINK}{$PRODUCTS_SHIPPING_LINK}{/if}
```
and replace with
```
{if $PRODUCTS_FREE_SHIPPING != ""}{$PRODUCTS_FREE_SHIPPING}{else}{if $PRODUCTS_SHIPPING_LINK}{$PRODUCTS_SHIPPING_LINK}{/if}{/if}
```

##Usage

In "Edit Product" there will be a new "Free shipping options" box. There, four options are available:
### Free shipping allowed?
If this option is set, the product will be eligible for free shipping and will be affected by the next options.
### Max. cart amount
This option defines the maximum amount or quantity that can be ordered. If the quantity for this product in the shopping cart exceeds this threshold, it will be automatically set to the defined amount.
### Max. free shipping amount
This option defines the maximum amount or quantity that will be available for free shipping. If the quantity for this product in the shopping cart exceeds this threshold, it will not be eligible for free shipping anymore. This option will be ignored if "Max. cart amount" is defined (i.e. > `0`).
### Valid for the following countries
Comma-separated country codes ([ISO 3166-1 alpha-3](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-3)) define for which countries free shipping is valid (e.g. `DE,AT,CH` for Germany, Austria, and Switzerland).
