<?php

require_once __DIR__ . '/vendor/autoload.php';

use Binance\Client\BncClient;

$privateKey = 'xxxxa7ce4b35c5394dd4c602068c622ad25feb3d63a5e1445ba9b5ebc0b9d01xxx';
$bncClient = new BncClient('https://data-seed-pre-2-s1.binance.org');
// $bncClient = new BncClient('https://testnet-dex.binance.org');
$bncClient->chooseNetwork("testnet"); // or this can be "mainnet"
$bncClient->initChain();
$bncClient->setPrivateKey($privateKey);

$response = $bncClient->transfer(
    "tbnb1zka5265vhst0jf4jr3tnwcmxqg8he4myj6yu4u", //from
    "tbnb1yeqam4a4y9a3ht7hawzd5vtd4a59mu5j4gdy0v",  // to
    3, //amount
    "BNB", //asset
    "696969");

print_r($response) . PHP_EOL;
?>
