<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'products';
$route['product/(:any)'] = 'products/get_product_page/$1';
// $route['album_page/(:any)'] = 'albums/single_album_page/$1';
$route['product/add_to_cart/(:any)'] = 'products/add_to_cart/$1';
$route['delete_item'] = 'products/delete_item';
$route['cart'] = 'products/load_cart';

$route['payment'] = 'products/payment';
$route['shippings'] = 'products/shippings';
$route['addresses'] = 'products/addresses';

$route['review'] = 'products/review_info';
$route['complete_order'] = 'products/complete_order';
$route['complete'] = 'products/complete';
$route['destroy_sess'] = 'products/destroy_sess';

$route['add_addresses'] = 'products/add_addresses';







$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
