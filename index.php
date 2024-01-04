<?php
require_once 'includes.php';


/**
 * Create a Sale Order in Odoo - v1
 *
 * @param array $order_data
 *
 * Disount --> At Line Item Level only
 */
// Sales Order data
// $order_data = array(
//     'partner_id' => 55, // Arslan Ramay BT
//     'state'      => 'sale',
//     'order_line' => array(
//         array(0, 0, array(
//             'product_id'      => 1,
//             'product_uom_qty' => 1,
//             'discount'        => 20  // 10% discount on this line
//         )),
//     ),
//     'x_ecom_order_id'       => 2000006,
//     'x_ecom_payment_method' => 'TAP',
// );

// // Create a new Sale Order in Odoo
// $order_id = $client->create( 'sale.order', $order_data );

// // echo "Created Sales Order with ID: " . $order_id;
// echo 'Created Sales Order with ID: <pre>' . print_r($order_id, true);



/**
 * Create a Sale Order in Odoo - v2
 *
 * @param array $order_data
 *
 * Disount --> Separate Discount Line Item and discount value attached to One Product
 */
// Defining order lines
// $order_lines = array(
//     array(0, 0, array(
//         'product_id'      => 1,
//         'product_uom_qty' => 1,
//         'discount'        => 10  // 10% discount on this line
//     )),
// );

// // Assuming the discount amount is known, for example, $20 discount
// $discount_amount = 20.0; // Discount value
// $discount_product_id = 1;

// // Add a discount line item
// $order_lines[] = array(0, 0, array(
//     'name'            => 'Discount',
//     'price_unit'      => -$discount_amount,             // Negative amount for the discount
//     'product_uom_qty' => 1,                             // Ensure you have a 'discount' product or a generic product that can be used for such purposes
//     'product_id'      => $discount_product_id,          // Replace with an actual product ID meant for discounts
//     'tax_id'          => array(array(6, 0, array())),   // Setting an empty array for taxes
// ));

// // Creating a Sales Order with the order lines
// $order_data = array(
//     'partner_id'            => 55,
//     'state'                 => 'sale',
//     'order_line'            => $order_lines,
//     'x_ecom_order_id'       => 2000013,
//     'x_ecom_payment_method' => 'TAP',
// );

// // Create a new Sale Order in Odoo
// $order_id = $client->create( 'sale.order', $order_data );

// // echo "Created Sales Order with ID: " . $order_id;
// echo 'Created Sales Order with ID: <pre>' . print_r($order_id, true);




/**
 * Create a Sale Order in Odoo - v2.1
 *
 * @param array $order_data
 * @param array $customer_data
 *
 * Disount --> Separate Discount Line Item and discount value attached to One Product
 * Create Customer record in Odoo + customer's addresses
 */
// Create a new Customer (Partner) in Odoo
// $customer_data = array(
//     'name'    => 'John Doe4',
//     'email'   => 'john.doe4@example.com',
//     'phone'   => '1234567890'
//     // Add other necessary customer fields here
// );
// $customer_id = $client->create('res.partner', $customer_data);

// // Create a Billing Address for the Customer
// $billing_address_data = array(
//     'type'       => 'invoice',
//     'parent_id'  => $customer_id,
//     'street'     => '123 Billing St',
//     'street2'    => 'Suite 100',
//     'city'       => 'Billing City',
//     'state_id'   => 1,                       // Replace with actual state ID
//     'zip'        => '12345',
//     'country_id' => 1,                       // Replace with actual country ID
//     'email'      => 'billing@example.com',
//     'phone'      => '9876543210',
//     'name'       => 'John4 Inv Addr',
//           // Add other billing address details here
// );
// $billing_address_id = $client->create('res.partner', $billing_address_data);

// // Create a Shipping Address for the Customer
// $shipping_address_data = array(
//     'type'          => 'delivery',
//     'parent_id'     => $customer_id,
//     'street'        => '456 Shipping Ave',
//     'street2'       => 'Apt 200',
//     'city'          => 'Dubai',
//     'state_id'      => 458,                      // Replace with actual state ID
//     'zip'           => '00000',
//     'country_id'    => 2,                        // Replace with actual country ID
//     'email'         => 'shipping@example.com',
//     'phone'         => '1234567890',
//     'name' => 'John4 Del Addr',
//         // Add other shipping address details here
// );
// $shipping_address_id = $client->create('res.partner', $shipping_address_data);

// // Define order lines
// $order_lines = [
//     [0, 0, [
//         'product_id'      => 1,
//         'product_uom_qty' => 1,
//         // 'discount'        => 10,   // 10% discount on this line
//     ]],
//       // Add other order lines here
// ];

// // Adding a discount line item, if applicable
// // $discount_amount     = 20.0;  // Discount value
// // $discount_product_id = 1;     // Replace with an actual product ID meant for discounts

// // $order_lines[] = [0, 0, [
// //     'name'            => 'Discount',
// //     'price_unit'      => -$discount_amount,      // Negative amount for the discount
// //     'product_uom_qty' => 1,
// //     'product_id'      => $discount_product_id,
// //     'tax_id'          => [[6, 0, []]],           // Setting an empty array for taxes
// // ]];

// // Creating a Sales Order with the order lines and the new customer
// $order_data = [
//     'partner_id'            => $customer_id,
//     'partner_invoice_id'    => $billing_address_id,
//     'partner_shipping_id'   => $shipping_address_id,
//     'state'                 => 'sale',
//     'order_line'            => $order_lines,
//     'x_ecom_order_id'       => 2000018,
//     'x_ecom_payment_method' => 'TAP',
// ];

// // Create a new Sale Order in Odoo
// $order_id = $client->create( 'sale.order', $order_data );

// // echo "Created Sales Order with ID: " . $order_id;
// echo 'Created Sales Order with ID: <pre>' . print_r($order_id, true);




/**
 * Create a Sale Order in Odoo - v2.2
 *
 * @param array $order_data
 * @param array $customer_data
 *
 * Disount:  No discounts
 * Customer: Create Customer record in Odoo + customer's addresses. Check for existing records.
 */
// Function to search for partner based on criteria
function find_partner($client, $criteria) {
    $partners = $client->search('res.partner', $criteria);
    return $partners ? reset($partners) : null;
}

// Function to search for partner's address
function find_address($client, $parent_id, $type, $email, $phone) {
    $criteria = [
        ['parent_id', '=', $parent_id],
        ['type', '=', $type],
        ['email', '=', $email],
        ['phone', '=', $phone]
    ];
    return find_partner($client, $criteria);
}

// Customer details
$customer_email = 'john.doe@example.com';
$customer_phone = '1234567890';

// Check for existing customer
$customer_criteria = [['email', '=', $customer_email], ['phone', '=', $customer_phone]];
$customer_id       = find_partner($client, $customer_criteria);

if (!$customer_id) {
    // Create a new Customer (Partner) in Odoo
    $customer_data = [
        'name'  => 'John Dxb',
        'email' => $customer_email,
        'phone' => $customer_phone,
    ];
    $customer_id = $client->create('res.partner', $customer_data);
}



// Billing address details
$billing_email = 'billing5@example.com';
$billing_phone = '9876543211';

// Check for existing billing address
$billing_address_id = find_address($client, $customer_id, 'invoice', $billing_email, $billing_phone);

if (!$billing_address_id) {
    // Create a Billing Address for the Customer
    $billing_address_data = array(
        'type'       => 'invoice',
        'parent_id'  => $customer_id,
        'street'     => '123 Billing St',
        'street2'    => 'Suite 100',
        'city'       => 'Billing City',
        'state_id'   => 1,                       // Replace with actual state ID
        'zip'        => '12345',
        'country_id' => 1,                       // Replace with actual country ID
        'email'      => $billing_email,
        'phone'      => $billing_phone,
        'name'       => 'John5 Inv Addr',
    );
    $billing_address_id = $client->create('res.partner', $billing_address_data);
}


// Delivery/Shipping address details
$shipping_email = 'shipping5@example.com';
$shipping_phone = '1234567891';

// Check for existing shipping address
$shipping_address_id = find_address($client, $customer_id, 'delivery', $shipping_email, $shipping_phone);

if (!$shipping_address_id) {
    // Create a Shipping Address for the Customer
    $shipping_address_data = array(
        'type'       => 'delivery',
        'parent_id'  => $customer_id,
        'street'     => '456 Shipping Ave',
        'street2'    => 'Apt 200',
        'city'       => 'Dubai',
        'state_id'   => 458,                      // Replace with actual state ID
        'zip'        => '00000',
        'country_id' => 2,                        // Replace with actual country ID
        'email'      => $shipping_email,
        'phone'      => $shipping_phone,
        'name'       => 'John5 Del Addr',
    );
    $shipping_address_id = $client->create('res.partner', $shipping_address_data);
}


// Define order lines
$order_lines = [
    [0, 0, [
        'product_id'      => 1,
        'product_uom_qty' => 1,
        'discount'        => 10,    // 10% discount on this line
        'price_unit'      => 50,
    ]],
      // Add other order lines here
];

// Adding a discount line item, if applicable
// $discount_amount     = 20.0;  // Discount value
// $discount_product_id = 1;     // Replace with an actual product ID meant for discounts

// $order_lines[] = [0, 0, [
//     'name'            => 'Discount',
//     'price_unit'      => -$discount_amount,      // Negative amount for the discount
//     'product_uom_qty' => 1,
//     'product_id'      => $discount_product_id,
//     'tax_id'          => [[6, 0, []]],           // Setting an empty array for taxes
// ]];

// Creating a Sales Order with the order lines and the new customer
$order_data = [
    'partner_id'            => $customer_id,
    'partner_invoice_id'    => $billing_address_id,
    'partner_shipping_id'   => $shipping_address_id,
    'state'                 => 'sale',
    'order_line'            => $order_lines,
    'x_ecom_order_id'       => 2000019,
    'x_ecom_payment_method' => 'TAP',
];

// Create a new Sale Order in Odoo
$odoo_order_id = $client->create( 'sale.order', $order_data );

// echo "Created Sales Order with ID: " . $order_id;
echo 'Created Sales Order with ID: <pre>' . print_r($odoo_order_id, true);






/**
 * Create a Sale Order in Odoo - v3
 *
 * @param array $order_data
 *
 * Disount --> Split Discount on each Product/Line Item
 */
// Product line items
// $order_lines = array(
//     array(0, 0, array(
//         'product_id'      => 1,   // Replace with actual product_id
//         'product_uom_qty' => 1,
//           'price_unit' => 100, // Example price
//     )),
//     array(0, 0, array(
//         'product_id'      => 4,   // Replace with actual product_id
//         'product_uom_qty' => 2,
//           'price_unit' => 50, // Example price
//     )),
//     array(0, 0, array(
//         'product_id'      => 48,   // Replace with actual product_id
//         'product_uom_qty' => 1,
//           'price_unit' => 150, // Example price
//     )),
//       // ... Add more products as needed ...
// );

// // Calculate the total amount of the order
// $total_amount = 0;
// foreach ($order_lines as $line) {
//     $total_amount += $line[2]['product_uom_qty'] * $line[2]['price_unit'];
// }

// // Assuming a global discount percentage, e.g., 10%
// $discount_percentage = 10;
// $discount_amount     = ($total_amount * $discount_percentage) / 100;
// $discount_product_id = 1;

// // Add a global discount line item
// $order_lines[] = array(0, 0, array(
//     'name'            => 'Global Discount',
//     'price_unit'      => -$discount_amount,             // Negative amount for the discount
//     'product_uom_qty' => 1,
//     'product_id'      => $discount_product_id,          // Replace with a product ID meant for discounts
//     'tax_id'          => array(array(6, 0, array())),   // No tax on discount
// ));

// // Creating a Sales Order with the order lines
// $order_data = array(
//     'partner_id'            => 55,
//     'state'                 => 'sale',
//     'order_line'            => $order_lines,
//     'x_ecom_order_id'       => 2000011,
//     'x_ecom_payment_method' => 'TAP',
// );


// // Create a new Sale Order in Odoo
// $order_id = $client->create( 'sale.order', $order_data );

// // echo "Created Sales Order with ID: " . $order_id;
// echo 'Created Sales Order with ID: <pre>' . print_r($order_id, true);



?>