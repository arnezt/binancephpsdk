<?php

require_once __DIR__ . '/vendor/autoload.php';

use Binance\Client\BncClient;
use Binance\Swap\Swap;

$recepientPKey = 'xxxxa7ce4b35c5394dd4c602068c622ad25feb3d63a5e1445ba9b5ebc0b9d0xxxx'; // sender pk
$bncClient = new BncClient('https://data-seed-pre-2-s1.binance.org');
$bncClient->chooseNetwork("testnet"); // or this can be "mainnet"
$bncClient->initChain();
$bncClient->setPrivateKey($recepientPKey);

$coins = array("denom" => "BUSD-BAF", "amount" => 100000000);

$swapClient = new Swap($bncClient);
$response = $swapClient->depositHTLT(
    "tbnb1yeqam4a4y9a3ht7hawzd5vtd4a59mu5j4gdy0v", //the recipient
    "99b0f70b2ad2d84d9b26668a0ebc66af428a884c46123cac7c1f1985af1ebdf1", // SwapID
    $coins //amount
);

print_r($response) . "\n";
?>
