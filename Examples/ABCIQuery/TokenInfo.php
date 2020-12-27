<?php

require_once __DIR__ . '/../../../../autoload.php';

use Binance\RPC\RPC;
// use Binance\Crypto\Address;

$server = "https://data-seed-pre-2-s1.binance.org";

$rpc = new RPC();
$rpc->chooseNetwork("testnet");
$result = $rpc->GetTokenInfo($server, 'BNB');

print_r(json_decode($result));


?>