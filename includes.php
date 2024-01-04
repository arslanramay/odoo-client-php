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

// echo 'Odoo Client Info: <pre>' . print_r($client, true);

$client->version();
// print_r($client->version());