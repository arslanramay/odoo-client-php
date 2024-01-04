<?php
require_once 'includes.php';


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


$customers = $client->search('res.partner', $criteria1, $offset, $limit);
echo 'Customers:: <pre>' . print_r($customers, true);


// =======================
// Get Partners from Odoo
// =======================
$odoo_partners = $client->search_read( 'res.partner', array(), array( 'id', 'name', 'country_code' ), 5 );
echo 'Odoo Partners:: <pre>' . print_r($odoo_partners, true);


?>