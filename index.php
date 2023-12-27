<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'src/Client.php';

use OdooClient\Client;

$url = 'https://beautytribe-odoo-sh-staging-woo-10965247.dev.odoo.com/xmlrpc/2';
$database = 'beautytribe-odoo-sh-staging-woo-10965247';
$user = 'login@beautytribe.com';
$password = '7706758b593da8dcca69be2ff39e265fba5e0773';

$client = new Client($url, $database, $user, $password);

// echo "Odoo Client:  ";
// print_r($client);

echo 'InfoXX: <pre>' . print_r($client, true);

$client->version();
print_r($client->version());


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


// SEARCH CUSTOMERS
// $criteria = [
//     ['customer', '=', true],
//   ];
//   $offset = 0;
//   $limit = 10;

//   $clients = $client->search('res.partner', $criteria, $offset, $limit);




$criteria = null;
$fields   = array( 'name', 'qty_available', 'barcode', 'list_price', 'default_code', 'barcode' );
//   $request = array(
//       'type'       => 'product.product',
//       'fields'     => $fields,
//       'conditions' => $criteria,
//       'limit'      => 1,
//   );

  $record = $client->search_read('product.product', $criteria, $fields, 5);

echo 'ProductsXXX: <pre>' . print_r($record, true);

// echo 'Customers: <pre>' . print_r($customers, true);
?>