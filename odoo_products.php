<?php
require_once 'includes.php';


// Create a Product in Odoo

// CREATE PRODUCT
// $data = array(
//     'name'                  => 'Test Product 111',,
//     'sale_ok'               => true,
//     'type'                  => 'product',
//     $this->odoo_sku_mapping => $product_data->get_sku(),
//     'description_sale'      => 'Test Product 111 description goes here',
//     // 'attribute_line_ids'    => $this->get_attributes_line_ids( $odoo_attrs, $product_data->get_attributes() ),
//     // 'weight'                => $product_data->get_weight(),
//     // 'volume'                => (int) ( (int) $product_data->get_height() * (int) $product_data->get_length() * (int) $product_data->get_width() ),
// );


// Product data
$product_data = array(
    'name'          => 'New Product', // Replace with your product name
    'type'          => 'product', // Can be 'product', 'consu', or 'service'
    'sale_ok'       => true,
    'list_price'    => 50.0, // Replace with your product price
    // 'cost' => 30.0, // Replace with your product cost
    'description_sale'      => 'Test Product 111 description goes here',
    // Add other necessary fields as per your Odoo configuration
);
// Create a new Product in Odoo
// $product_id = $client->create( 'product.product', $product_data );

// echo "New Product ID: " . $product_id;
// echo 'New Product ID: <pre>' . print_r($product_id, true);





// Get Product Categories from Odoo
// $odoo_categories = $client->search_read( 'product.category', array(), array( 'id', 'name' ) );
// echo 'Odoo Product Categories:: <pre>' . print_r($odoo_categories, true);


// Get Products from Odoo - OK
$criteria = null;
$fields   = array( 'name', 'qty_available', 'barcode', 'list_price', 'default_code', 'barcode' );

$request = array(
    'type'       => 'product.product',
    'fields'     => $fields,
    'conditions' => $criteria,
    'limit'      => 1,
);

$record = $client->search_read('product.product', $criteria, $fields, 5);
echo 'Odoo Products:: <pre>' . print_r($record, true);






?>