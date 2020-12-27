<?php

require_once __DIR__ . '/vendor/autoload.php';

use Binance\Client\BncClient;
use Binance\Swap\Swap;

$recepientPKey = '7c9e0c3192bf537c082bd952e37d3b746d9e3d361525d74b1cc1234c90e65xxx'; // recipient pk
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
