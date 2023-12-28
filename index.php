<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'src/Client.php';

use OdooClient\Client;

$url      = 'https://beautytribe-odoo-sh-staging-woo-10965247.dev.odoo.com/xmlrpc/2';
$database = 'beautytribe-odoo-sh-staging-woo-10965247';
$user     = 'login@beautytribe.com';
$password = '7706758b593da8dcca69be2ff39e265fba5e0773';

$client = new Client($url, $database, $user, $password);

// echo "Odoo Client:  ";
// print_r($client);

echo 'Odoo Client Info: <pre>' . print_r($client, true);

$client->version();
// print_r($client->version());


// ================
// CREATE CUSTOMER
// ================
// $data = [
//     'name' => 'John Doe',
//     'email' => 'foo@bar.com',
//   ];

//   $id = $client->create('res.partner', $data);

//   if($id) {
//     echo "ID:  " . $id;
//   } else {
//     echo "Error:  " . $client->last_error;
//   }

// =================
// SEARCH CUSTOMERS
// =================
$criteria1 = [
    ['email', '=', 'arslanramay104@gmail.com'],
];
// $criteria1 = null;
$offset = 0;
$limit = 5;


$clients = $client->search('res.partner', $criteria1, $offset, $limit);
echo 'Clients:: <pre>' . print_r($clients, true);


// Create Sale Order in the Odoo
// $order_odoo_id = $client->create( 'sale.order', $order_data );


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






// Sales Order data
$order_data = array(
    'partner_id' => 55, // Arslan Ramay BT
    'state'      => 'sale',
    'order_line' => array(
        array(0, 0, array(
            'product_id'      => 1,
            'product_uom_qty' => 1,
            'discount'        => 20  // 10% discount on this line
        )),
    ),
    'x_ecom_order_id'       => 2000006,
    'x_ecom_payment_method' => 'TAP',
);

// Create a new Sale Order in Odoo
$order_id = $client->create( 'sale.order', $order_data );

// echo "Created Sales Order with ID: " . $order_id;
echo 'Created Sales Order with ID: <pre>' . print_r($order_id, true);






// =============================================
// OK 100% Function Calls
// ============================================

// Get Partners from Odoo - OK
// $odoo_partners = $client->search_read( 'res.partner', array(), array( 'id', 'name', 'country_code' ), 5 );
// echo 'Odoo Partners:: <pre>' . print_r($odoo_partners, true);

// Get Product Categories from Odoo - OK
// $odoo_categories = $client->search_read( 'product.category', array(), array( 'id', 'name' ) );
// echo 'Odoo Categories: <pre>' . print_r($odoo_categories, true);


// Get Products from Odoo - OK
$criteria = null;
$fields   = array( 'name', 'qty_available', 'barcode', 'list_price', 'default_code', 'barcode' );
//   $request = array(
//       'type'       => 'product.product',
//       'fields'     => $fields,
//       'conditions' => $criteria,
//       'limit'      => 1,
//   );

// $record = $client->search_read('product.product', $criteria, $fields, 5);
// echo 'ProductsX: <pre>' . print_r($record, true);
?>