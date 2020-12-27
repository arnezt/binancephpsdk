<?php

require_once __DIR__ . '/vendor/autoload.php';

use Binance\Client\BncClient;

$privateKey = 'bb2912559ccbb861b4facd1e2c869bf9882f2ec0e2e40fd0311dff3f51613xxx';
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
