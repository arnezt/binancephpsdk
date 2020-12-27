<?php

// namespace Binance;

require_once __DIR__ . '/vendor/autoload.php';

use Binance\Client\BncClient;
use Binance\Swap\Swap;

$privateKey = '51e76325863bf65727feec21c1c5cb8c455751e14a34e21aa325d5fdb9fe2xxx';
$bncClient = new BncClient('https://data-seed-pre-2-s1.binance.org');
$bncClient->chooseNetwork("testnet"); // or this can be "mainnet"
$bncClient->initChain();
$bncClient->setPrivateKey($privateKey);

$swapClient = new Swap($bncClient);
$response = $swapClient->claimHTLT(
    "tbnb1yeqam4a4y9a3ht7hawzd5vtd4a59mu5j4gdy0v", //from
    "99b0f70b2ad2d84d9b26668a0ebc66af428a884c46123cac7c1f1985af1ebdf1", // swapId
    "35265acbbca6565fd490dc32a92f92d3e6aff2ab57b459440e1a0df847ecb24e" // random number
); 

print_r($response) . "\n";
