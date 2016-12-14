# products_free_shipping

products_free_shipping module for modified eCommerce Shopsoftware 2.0.1.0 rev 10403 based on [MODUL: Zusatzfelder in der Artikel-Bearbeitung für versandkostenfreie Artikel](http://www.modified-shop.org/forum/index.php?topic=12704.0)

##Install

0. Make backup of your DB + FTP
1. Import products_free_shipping.sql
2. Transfer files from NEW_FILES folder into the root folder of your shop
3. Backend > Module > Klassenerweiterungen Module: install products_free_shipping (categories) and listing_product_extra (product)
4. Backend > Module > Versandart: install productsfreeshipping
5. In /templates/**\<your_template\>**/module/product_info/product_info_tabs_v1.html:

```
{if $PRODUCTS_SHIPPING_LINK}{$PRODUCTS_SHIPPING_LINK}{/if}
```
replace with
```
{if $PRODUCTS_FREE_SHIPPING != ""}{$PRODUCTS_FREE_SHIPPING}{else}{if $PRODUCTS_SHIPPING_LINK}{$PRODUCTS_SHIPPING_LINK}{/if}{/if}
```

##Usage
